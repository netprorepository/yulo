<?php

namespace App\Controller;

use Cake\Network\Email\Email;
use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Utility\Security;
use Cake\I18n\Time;
use Cake\Network\Response;
use Cake\Network\Session;
use Cake\ORM\TableRegistry;
use Cake\Network\Exception\NotFoundException;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[] paginate($object = null, array $settings = [])
 */
class UsersController extends AppController {

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $user = $this->Users->get($id, [
            'contain' => ['Agents', 'YuloTransactions']
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    //usre login method
    public function login() {
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

//user registeration method
    public function register() {
        $agents_table = TableRegistry::get('Agents');
        $newagent = $agents_table->newEntity();
        $message = "";
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $verification_key = crypt($this->request->getData('username'));
            $fullname = $this->request->getData('fullname');
            $user->verificationkey = str_ireplace('/', '-',$verification_key);
            if ($this->Users->save($user)) {
                //create agent account if user is an agent
                if (($user->accounttype === "Agent") || ($user->accounttype === "Property Owner")) {
                    $newagent = $agents_table->patchEntity($newagent, $this->request->getData());
                    $newagent->user_id = $user->id;
                    $agents_table->save($newagent);
                    //create basic subscription plan for the agent
                    $this->createbasicplan($newagent->id);
                }

                //send a verification link to the user
                $this->newuserMail($this->request->getData('username'),  $fullname, $user->verificationkey);
                $this->Flash->success(__('Your account has been created. Please login to : ' .
                                $this->request->getData('username') . ', check your inbox/spam folders and click on the link we sent you to verify your account'));

                return $this->redirect(['action' => 'login']);
            }
            $this->Flash->error(__('The user account could not be created. Please, try again.'));
            // return $this->redirect(['action' => 'register']);
        }

        $states = $agents_table->States->find('list', ['limit' => 200])->where(['country_id' => 160]);
        $this->set(compact('states'));
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

//function that creats the basic free plan for all agents
    public function createbasicplan($agent_id) {
        $subscriptions_table = TableRegistry::get('Subscriptions');
        $basicplan = $subscriptions_table->newEntity();
        $basicplan->agent_id = $agent_id;
        $basicplan->enddate = Date('Y:m:d H:i:s', strtotime("+ 90 days"));
        $basicplan->no_of_properties_available = 35;
        $basicplan->no_of_properties_uploaded = 0;
        $basicplan->plan_id = 1;
        $basicplan->amountpaid = 0;
        //debug(json_encode( $basicplan, JSON_PRETTY_PRINT)); exit;
        $subscriptions_table->save($basicplan);
        return;
    }

//user method for verifying account
    public function verifyaccount($verification_key) {
        $user = $this->Users->find()->where(['verificationkey' => $verification_key])->first();
        if ($user) {
            if ($user->verificationstatus == 'verified') {
                $this->Flash->success(__('This account has already been verified. Please login to continue'));
                return $this->redirect(['action' => 'login']);
            }
            $user->verificationstatus = 'verified';
            $this->Users->save($user);
            $this->Flash->success(__('Your account has been verified. Please login to continue'));
        } else {
            $this->Flash->error(__('Sorry, user not find. Please, try again.'));
            return $this->redirect(['action' => 'login']);
        }

        return $this->redirect(['action' => 'login']);
    }

    //sends a link to the newly registered job seeker to verify his/her account
    public function newuserMail($destination, $name, $verification_key) {
        $email = new Email('default');
        $message = "Hello " . $name . ", <p>Thank you for registering with Yulo. </p><p><br /> Please click the following link to "
                . "verify your account. <a href='https://www.yulo.ng/users/verifyaccount/" . $verification_key .
                "' ><b> verify account</b> </a><br /> or copy and"
                . " paste the link above in your browser address bar.</p><br />";
        $message .= "<br /><p>Regards,<br /> Yulo Team</p>";
        $email->from(['no-reply@yulo.ng' => 'Yulo']);
        $email->to('chukwudi@netpro.com.ng');
        $email->addBcc($destination);
        $email->addHeaders(['Content-type: text/html; charset=iso 8859-1', 'MIME-Version: 1.0' . '\r\n']);
        //$email->addHeaders("Content-type: text/html; charset=iso 8859-1");
        $email->emailFormat('html');
        $email->subject('Agent Account Verification');
        $email->send($message);
        return;
    }

    public function reportproperty() {
        $email = new Email('default');
        $message = $this->request->getData('reason');
        $fullname = $this->request->getData('fullname');
        $senderEmail = $this->request->getData('email');
        $comment = $this->request->getData('comment');

        $message .= "<br/><br/><br/>";
        $message .= $comment;
        $message .= "<br/><br/><br/>";
        $message .= $fullname;
        $message .= "<br/><br/><br/>";
        $message .= "Thanks";

        $title = $this->request->getData('reason');
        $email->from($senderEmail);
        $email->to('help@yulo.ng');
        $email->addBcc('austin.itua@netpro.com.ng');
        $email->emailFormat('html');
        // $email->addBcc('chukwudi@yulo.com');
        $email->subject($title);
        $email->send($message);
        //debug(json_encode( $email, JSON_PRETTY_PRINT)); exit;
    }

    //user method for contacting a property owner
    public function contactowner() {
        $email = new Email('default');
        $message = $this->request->getData('message');
        $phone = $this->request->getData('phone');
        $property_owner_email = $this->request->getData('owner_email');
        //echo  $property_owner_email; exit;
        $message .= '<br /><br />' . $phone;
        $title = $this->request->getData('title');
        $email->from(['no-reply@yulo.ng' => 'Yulo Nigeria']);
        $email->to($property_owner_email);
        $email->emailFormat('html');
        $email->addBcc('chukwudi@netpro.com.ng');
        $email->addBcc('austin.itua@netpro.com.ng');
        $email->subject($title);
        $email->send($message);
        $this->Flash->error('Mail has been sent to the property owner');
        return $this->redirect(['controller' => 'Properties', 'action' => 'index']);
    }

    public function displayuserpage() {
        //$this->viewBuilder()->layout('UserDashboard');
    }

    //forgot password method
    public function forgotpassword() {
        if ($this->request->is('post')) {
            $user = $this->Users->find('all')->where(['username' => $this->request->data('username')])->first();
            if ($user) {
                $key = $user->verificationkey;
                $this->changePasswordMail($user->username, $key);
                $this->Flash->success('We have sent a link to your email address. Please follow the link to change your password.');
                // $this->redirect(['controller'=>'Jobs', 'action'=>'index']);
            } else {
                $this->Flash->error('Email account does not exist');
                $this->redirect(['controller' => 'Users', 'action' => 'forgotpassword']);
            }
        }

        //sets the page title
        $this->set('title', "Password Reset");
    }

    //method that changes the password
    public function changepassword($key) {
        $user = $this->Users->find('all')->where(['verificationkey' => $key])->first();
        if (!$user) {
            $this->Flash->error('Sorry, Unknown User');
            return $this->redirect(['controller' => 'Users', 'action' => 'register']);
        }
        if ($this->request->is(['patch', 'post', 'put'])) {//verifies passwords
            $password = $this->request->data['password'];
            $confirm_password = $this->request->data['cpassword'];
            if (( $password != $confirm_password) && (strlen($password) < 6)) {
                $this->Flash->error('Password mismatch. Passwords must be the same and not less than 6 characters.');
                return;
            }
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success('Your password has been changed successfully.');
                $this->redirect(['controller' => 'Users', 'action' => 'login']);
            } else {
                $this->Flash->error('Unable to change your password. Please try again.');
            }
        }
        $this->set('user', $user);
        $this->set('key', $key);
        //sets the page title
        $this->set('title', "Reset Password");
    }

    //sends an email with a link to change password
    public function changePasswordMail($destination, $key) {
        $email = new Email('default');
        $message = "Hello,<p> You have requested to change your password. </p> <p> Please click the following link to change your password <a href='https://www.yulo.ng/Users/changepassword/" . $key .
                "'>Change Password </a></p><p>Regards, <br />Yulo Nigeria</p>";
        $email->from(['no-reply@yulo.ng' => 'Yulo NIGERIA']);
        $email->to($destination);
        $email->emailFormat('html');
        $email->subject('Change Password');
        $email->send($message);
        return;
    }

    public function bookmark() {
        $userdata = $this->request->session()->read('userdetails');
        // echo $userdata['id']; exit;
        $booktable = TableRegistry::get('Bookmarks');
        $mybookmarks = $booktable->find()
                ->contain(['Properties', 'Properties.Images', 'Properties.Categories', 'Properties.States'])
                ->where(['user_id' => $userdata['id']]);
        $this->set('mybookmarks', $mybookmarks);
        //debug(json_encode( $mybookmarks, JSON_PRETTY_PRINT)); exit;
    }

    // allow unrestricted pages
    public function beforeFilter(Event $event) {
        $this->Auth->allow(['login', 'newuserMail', 'verifyaccount', 'register', 'changepasswordMail',
            'changepassword', 'forgotpassword', 'changePasswordMail', 'contactowner', 'reportproperty', 'createbasicplan',
            'gotopaystack','uniqidReal']);
    }

    public function logout() {
        $this->request->session()->destroy();
        return $this->redirect(['controller' => 'properties', 'action' => 'index']);
    }

    
    
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
  

      public function gotopaystack(){
	//generate a reference
	//echo $ref; exit;
	 $baseurl = "www.livingtempleacademy.ng";
	 $amount = 600000;
	
	 $reference = $this->uniqidReal();
	
            $subacc = 'ACCT_u3r5z0o9bco6yon'; // sub-account code, you get this when you set up a split account.
            $cancel_url = $baseurl.'cancel/'.$reference.'/';
			
            //initialize transaction
								
								//arrange and go to paystack
 
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
                'callback_url'=>'https://livingtempleacademy.ng/paymentverification.php?ref='.$reference,
                'amount'=> $postAmount,
                'email'=>$email = "pretychuks@yahoo.co.uk",
                'first_name'=>$fname = "chukwudi",
                'last_name'=>$lname = "aniegboka",
                'reference'=> $reference,
                'metadata'=>json_encode([
                  'cancel_action'=>$cancel_url,
                  'personal_id'=>$applicant_id  = 9,
                  'lname'=>$lname = "aniegboka",
                  'fname'=>$fname = "chukwudi",
                  'email'=> $email = "pretychuks@yahoo.co.uk",
                  'phone'=>$phone = "0980786954",
				  //'course_applied'=>$course_applied,
                ]),
              ]), 
              CURLOPT_HTTPHEADER => [
                "authorization: Bearer sk_test_864a602540b83cd6e52a59a67f5252905155bbbb",
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
            $this->redirect($tranx->data->authorization_url);
           // header('Location: ' . $tranx->data->authorization_url);
            
          
           
           }
    
    
    
    
    
}
