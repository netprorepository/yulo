<?php
namespace App\Controller;

use Cake\ORM\TableRegistry;
use App\Controller\AppController;
use Cake\I18n\Time;
use Cake\Event\Event;
use Cake\Network\Email\Email;

/**
 * Adverts Controller
 *
 * @property \App\Model\Table\AdvertsTable $Adverts
 *
 * @method \App\Model\Entity\Advert[] paginate($object = null, array $settings = [])
 */
class AdvertsController extends AppController
{

    
    //function that creates ads account for a user
    public function createadaccount(){
            $users_table = TableRegistry::get('Users');
            $advertisers_table = TableRegistry::get('Advertisers');
            
            $user = $users_table->newEntity();
            $advertiser = $advertisers_table->newEntity();
            if ($this->request->is('post')) {
               $verification_key = md5($this->request->getData('username'));
               $user = $users_table->patchEntity($user, $this->request->getData());
              $user->verificationkey = $verification_key;
              $user->verificationstatus = "verified";
              $user->accounttype = "Advertiser";
             $users_table->save($user);
              $duser = $this->Auth->identify();
              $this->Auth->setUser($duser);
              $advertiser = $advertisers_table->patchEntity($advertiser, $this->request->getData());
             $advertiser->user_id =  $user->id;
             $advertisers_table->save($advertiser );
             $this->Flash->success('The Account Has been Created.');
            return $this->redirect(['controller'=>'Adverts','action' => 'selectadd']);
               
               
            }
        
        
    }

    



//advertiser method for creating an ad
    public function selectadd(){
           //ensure admin is loggedin
         $advertisers_table = TableRegistry::get('Advertisers');
        $advertiser =  $advertisers_table->find('all')->contain(['Users'])->where(['user_id' => $this->Auth->user('id')])->first();

        if (!$advertiser) {
            $this->Flash->error('Please login to continue.');
            return $this->redirect(['controller'=>'Adverts','action' => 'login']);
        }
        
        $advert = $this->Adverts->newEntity();
        if ($this->request->is('post')) {
            
               $size = getimagesize($this->request->data['advert_url']['tmp_name']);
 // $mimetype = stripslashes($size['mime']); 
if ((empty($size) || ($size[0] === 0) || ($size[1] === 0))) {
    throw new \Exception('this is unacceptable! image must be of type : gif, jpeg, png or jpg and less than 2mb .');
            }
            
         $extension = strrchr($this->request->data['advert_url']['name'],'.');
      
      if (!empty($this->request->data['advert_url']['tmp_name'])
      && is_uploaded_file($this->request->data['advert_url']['tmp_name'])
      && ($this->request->data['advert_url']['size']<2000000) && (
            ($this->request->data['advert_url']['type']=="image/gif") 
            || ($this->request->data['advert_url']['type']=="image/png")
              || ($this->request->data['advert_url']['type']=="image/jpeg")
          || ($this->request->data['advert_url']['type']=="image/pjpeg")
	  ||($extension==='.pdf')
          || ($this->request->data['advert_url']['type']=="image/x-png"))){
    // encripts the username to be saved as logo name in the db
         $image_name = md5($this->request->data['advert_url']['name']).time(); 
         $image_name = $image_name.$extension; 
 
  //upload file
         move_uploaded_file(h($this->request->data['advert_url']['tmp_name']), "ad_images/" . $image_name);
         
         chmod("ad_images/".$image_name, 0644); 
         $file_error = 'Image uploaded successfully';
         
             }
             else{ //unlink("company_staff_ids/".$staff_id); 
             $file_error = 'wrong file format,upload failed';
             
             }
   
  
            $advert = $this->Adverts->patchEntity($advert, $this->request->getData());
             $advert->user_id = $advertiser->user->id;
            $advert->advert_url = $image_name;
            $advert->status = "pending";
            $advert->aprovedby = "pending";
           $advert->adsize = $this->request->data['advert_url']['size'];
          $advert->adtype = $this->request->data['advert_url']['type'];
         $advert->trnxstatus = "initialized";
         $advert->trnxref = "initialized";
            if ($this->Adverts->save($advert)){
                $this->Flash->success(__('The advert has been saved and will go live once verified by our admin.'));
                
             $this->proceedtopayment( $advertiser->user->username,$advert->amount,$advertiser->fname,$advertiser->lname,
                  $advertiser->phone,   $advert->id);

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The advert could not be saved. Please, try again.'));
        }
        
       // $users = $this->Adverts->Users->find('list', ['limit' => 200]);
        $this->set(compact('advert', 'users'));
        $this->set('_serialize', ['advert']);
        
    }

    
    
     
    //function that goes to paystack for payment
    public function proceedtopayment($username,$amount,$fname,$lname,$phone,$advert_id){
       
           $baseurl= "/yulo/plans";
      
            $ref = $this->uniqidReal();
            $subacc = 'ACCT_ry1eqlclyfx5u54'; // sub-account code, you get this when you set up a split account.
            $cancel_url = $baseurl.'cancel/'.$ref.'/';
           
             
            $extCharge = 0; // extra charge if amount is greater than 2500
            $fixedCharge = 0; // fixed charge by paystack 1.5 % of $amount
            $postAmount = 0; // final amount to send to paystack
            $percentageCharge = 1.538129; // percentage charge by paystack for every transaction (1.5223 %)|(2.0223%)1.538129
            //$transaction_charge = 20000;

            $fixedCharge = ($percentageCharge/100) * $amount;

            // transaction charge must be capped at 2000
            // so we check to make sure charge doent exceed this value
            if($fixedCharge > 2000){
                //$imp_charge = (0.5/100) * $amount;
                //$fixedCharge = 2000 + $imp_charge;
                $fixedCharge = 2000;
            }

            // for transaction amount greater than 2500 a fee of NGN 100 is added
            // so we check the amount to ensure this is enforced
            if($amount > 2500){
                $extCharge = 100;
            }

            // Amount to finally post to the payment gateway
            $postAmount = $amount + $fixedCharge + $extCharge;
            //echo $postAmount;exit;
           // $postAmount = $postAmount * 100;
             
             
            /**************************************/
/*initialize transaction*/
/*************************************/
             $curl = curl_init();
              curl_setopt_array($curl, array(
              CURLOPT_URL => "https://api.paystack.co/transaction/initialize",
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_CUSTOMREQUEST => "POST",
              CURLOPT_POSTFIELDS => json_encode([
                'callback_url'=>'  http://localhost/yulo/adverts/paymentverification/'.$ref,
                'amount'=> $amount.'00',
                'email'=>$username,
                'first_name'=>$fname,
                'last_name'=>$lname,
                'reference'=>$ref,
                'metadata'=>json_encode([
                  'cancel_action'=>$cancel_url,
                  'advert_id'=>$advert_id,
                 // 'user_id'=>$agent_id,
                  //'period'=>$period,
                 // 'trans_id'=> $new_transaction->id,
                  'phone'=>$phone,
                ]),
              ]),
              CURLOPT_HTTPHEADER => [
                "authorization: Bearer sk_test_7d5d515418c31cf203abbe3f753b1487b7d2a5e2",
                "content-type: application/json",
                "cache-control: no-cache"
              ],
            ));


            $response = curl_exec($curl);
            $err = curl_error($curl);
           // debug(json_encode( $response, JSON_PRETTY_PRINT));exit;

            if($err){
              // there was an error contacting the Paystack API
              die('Curl returned error: ' . $err);
            }

            $tranx = json_decode($response);

            if(!$tranx->status){
              // there was an error from the API
              die('API returned error: ' . $tranx->message);
            }

            // store transaction reference so we can query in case user never comes back
            // perhaps due to network issue
            //save_last_transaction_reference($tranx->data->reference);

            // redirect to page so User can pay
            //debug($tranx); exit;
           // return $this->redirect(['controller'=>'Plans','action' => 'paymentverification',$tranx->data->reference]); 
            header('Location: ' . $tranx->data->authorization_url);
            
            
            /**************************************/
            /*initialize transaction*/
            /*************************************/
             // $curl = curl_init();
              curl_setopt_array($curl, array(
              CURLOPT_URL => "https://api.paystack.co/transaction/initialize",
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_CUSTOMREQUEST => "POST",
              CURLOPT_POSTFIELDS => json_encode([
                'callback_url'=>'https://www./yulo.ng/plans/paymentverification/'.$ref,
               'amount'=> $amount,
                'email'=>$username,
                'first_name'=>$fname,
                'last_name'=>$lname,
                'reference'=>$ref,
                'metadata'=>json_encode([
                  'cancel_action'=>$cancel_url,
                  'advert_id'=>$advert_id,
                 // 'user_id'=>$agent_id,
                  //'period'=>$period,
                 // 'trans_id'=> $new_transaction->id,
                  'phone'=>$phone,
                ]),
              ]),
              CURLOPT_HTTPHEADER => [
                "authorization: Bearer sk_test_7d5d515418c31cf203abbe3f753b1487b7d2a5e2",
                "content-type: application/json",
                "cache-control: no-cache"
              ],
            ));


            $response = curl_exec($curl);
            $err = curl_error($curl);
           // debug(json_encode( $response, JSON_PRETTY_PRINT));exit;

            if($err){
              // there was an error contacting the Paystack API
              die('Curl returned error: ' . $err);
            }

            $tranx = json_decode($response);

            if(!$tranx->status){
              // there was an error from the API
              die('API returned error: ' . $tranx->message);
            }

            // store transaction reference so we can query in case user never comes back
            // perhaps due to network issue
            //save_last_transaction_reference($tranx->data->reference);

            // redirect to page so User can pay
            //debug($tranx); exit;
           // return $this->redirect(['controller'=>'Plans','action' => 'paymentverification',$tranx->data->reference]); 
            header('Location: ' . $tranx->data->authorization_url);
           
           
        
    }

    
    
    
    
  //method that confirms payment and creates subscrition for the agent
  public function paymentverification($ref){
   
      $curl = curl_init();
                curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.paystack.co/transaction/verify/" . rawurlencode($ref),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => [
              "accept: application/json",
              "authorization: Bearer sk_test_7d5d515418c31cf203abbe3f753b1487b7d2a5e2",
              "cache-control: no-cache"
            ],
          ));

          $response = curl_exec($curl);
          $err = curl_error($curl);

          if($err){
                  // there was an error contacting the Paystack API
            die('Curl returned error: ' . $err);
          }

          $tranx = json_decode($response);
         // debug( $tranx);
          if(!$tranx->status){
            // there was an error from the API
            die('API returned error: ' . $tranx->message);
          }
             $adverts_table = TableRegistry::get('Adverts');
          // debug($tranx); exit;
             $advert = $adverts_table->get($tranx->data->metadata->advert_id);
             $advert->trnxstatus = $tranx->data->status;
             $advert->trnxref = $tranx->data->reference;
             $adverts_table->save($advert);
           //$plan_id = $tranx->data->metadata->plan_id;
             $this->set('advert', $advert);
        $dresponse = $this->advertisermail($advert);
          $this->Flash->success($dresponse);
          
         
         //$this->viewBuilder()->layout('userbackend');
      
  }
    
    
  
  //email function that sends a mail to an advertiser after a successful payment
  public function advertisermail($advert){
      $users_table = TableRegistry::get('Users');
        $email = new Email('default');
        $usermail = $users_table->get($advert->user_id);
        $message = " ";
        
       // debug(json_encode($property, JSON_PRETTY_PRINT)); exit;
     
        $advertiser_email = $usermail->username;
        $message .= "<br/>";
       // $message .= "Hello ".ucwords($usermail->username).',<br /><br/>';
        $message .= "Hello, we wish to inform you that your payment of N".$advert->amount."  "
                . "for a banner ad on yulo.ng for a period of ".$advert->duration." months has been recieved.<br /> "
                . "Your add would be processed and would go live shortly.<br />";
        $message .= '<br /><br />';
        $message .= "Best Regards<br /> Yulo Team";
        $email->from(['no-reply@yulo.ng' => 'Yulo Nigeria']);
        $email->to($advertiser_email);
        $email->addBcc('austin.itua@netpro.com.ng');
        $email->emailFormat('html');
        $email->addBcc('chukwudi@netpro.com.ng');
        $email->subject('Payment For Banner Ad');
        $email->send($message);
       // $this->Flash->success(__('The property has been disapproved and a mail sent to the agent : '.$agent_name));

        return 'Your Banner ad payment has been recieved and a mail sent to the agent : '.$usermail->username;
  }








  //function that generates a unique id for each transaction

    public function uniqidReal($lenght = 13) {
      // uniqid gives 13 chars, but you could adjust it to your needs.
      if (function_exists("random_bytes")) {
          $bytes = random_bytes(ceil($lenght / 2));
      } elseif (function_exists("openssl_random_pseudo_bytes")) {
          $bytes = openssl_random_pseudo_bytes(ceil($lenght / 2));
      } else {
          throw new Exception("no cryptographically secure random function available");
      }
      return substr(bin2hex($bytes), 0, $lenght);
  }
  
  
  
    
    //login function for advertisers
    public function login(){
         if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                //sets the user in session
                $this->Auth->setUser($user);
                //checks that this account has been verified
                if ($this->Auth->user('accounttype') === "Agent" || $this->Auth->user('accounttype') === "Property Owner") {
                    if ($this->Auth->user('verificationstatus') !== "verified") {
                        $this->newuserMail($this->Auth->user('username'), $this->Auth->user('verification_key'));
                        $this->Flash->error('Hello, your account has not been verified. Please go to your mailbox and click on the link to verify your account.');
                        return $this->redirect(['controller' => 'users', 'action' => 'login']);
                    } elseif ($this->Auth->user('verificationstatus') === "verified") {
                        // $this->Flash->success(__('Welcome.'));
                        $this->request->session()->write('user_account_type', $this->Auth->user('accounttype'));
                        return $this->redirect(['controller' => 'Agents', 'action' => 'agentdashboard']);
                    }
                } elseif ($this->Auth->user('accounttype') === "Admin") {
                    $adminstable = TableRegistry::get('Admins');
                    // $admin = $adminstable->find('all')->where(['user_id' => $this->Auth->user('id')])->first();
                    //   debug(json_encode($user, JSON_PRETTY_PRINT)); exit;
                    if ($this->Auth->user('verificationstatus') === "false") {
                        $this->Flash->error('Hello, your account has not been verified. Please go to your mailbox and click on the link we sent you so you can verify your account!.');
                        return $this->redirect(['controller' => 'users', 'action' => 'login']);
                    } elseif ($this->Auth->user('verificationstatus') === "verified") {
                        //$this->request->session()->write('userdetails', $user);
                        return $this->redirect(['controller' => 'Admins', 'action' => 'admindashboard']);
                    }
                } elseif ($this->Auth->user('accounttype') === "User") {
                    $this->request->session()->write('userdetails', $user);
                    // redirect to user UI
                    return $this->redirect(['controller' => 'Properties', 'action' => 'index']);
                }
                elseif ($this->Auth->user('accounttype') === "Advertiser") {
                    $this->request->session()->write('userdetails', $user);
                    // redirect to user UI
                    return $this->redirect(['controller' => 'Adverts', 'action' => 'selectadd']);
                }
            } else {
                $this->Flash->error('Invalid login details.');
                // $this->redirect(['controller'=>'Users', 'action'=>'login']);
            }
        }
        $agents_table = TableRegistry::get('Agents');
        $states = $agents_table->States->find('list', ['limit' => 200])->where(['country_id' => 160]);
        $this->set(compact('states'));
        //sets the page title
        $this->set('title', "User Login");

        //$this->viewBuilder()->layout('blank');
    
        
    }
    
    
   
    

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
//        $this->paginate = [
//            'contain' => ['Users']
//        ];
//        $adverts = $this->paginate($this->Adverts);
//
//        $this->set(compact('adverts'));
//        $this->set('_serialize', ['adverts']);
    }

    /**
     * View method
     *
     * @param string|null $id Advert id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $advert = $this->Adverts->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('advert', $advert);
        $this->set('_serialize', ['advert']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $advert = $this->Adverts->newEntity();
        if ($this->request->is('post')) {
            $advert = $this->Adverts->patchEntity($advert, $this->request->getData());
            if ($this->Adverts->save($advert)) {
                $this->Flash->success(__('The advert has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The advert could not be saved. Please, try again.'));
        }
        $users = $this->Adverts->Users->find('list', ['limit' => 200]);
        $this->set(compact('advert', 'users'));
        $this->set('_serialize', ['advert']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Advert id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $advert = $this->Adverts->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $advert = $this->Adverts->patchEntity($advert, $this->request->getData());
            if ($this->Adverts->save($advert)) {
                $this->Flash->success(__('The advert has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The advert could not be saved. Please, try again.'));
        }
        $users = $this->Adverts->Users->find('list', ['limit' => 200]);
        $this->set(compact('advert', 'users'));
        $this->set('_serialize', ['advert']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Advert id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $advert = $this->Adverts->get($id);
        if ($this->Adverts->delete($advert)) {
            $this->Flash->success(__('The advert has been deleted.'));
        } else {
            $this->Flash->error(__('The advert could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    
    
    
     // allow unrestricted pages
     public function beforeFilter(Event $event)
        {
              $this->Auth->allow(
                  [
                      'index',
                      'createadaccount',
                      'selectadd',
                      'login'
                      
                  ]
             );
        }
}
