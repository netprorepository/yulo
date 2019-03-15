<?php
namespace App\Controller;
use Cake\ORM\TableRegistry; 
use App\Controller\AppController;

/**
 * Plans Controller
 *
 * @property \App\Model\Table\PlansTable $Plans
 *
 * @method \App\Model\Entity\Plan[] paginate($object = null, array $settings = [])
 */
class PlansController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
         //ensure this user is logged in
         $agents_table = TableRegistry::get('Agents');
         $agent = $agents_table->find('all')->where(['user_id' =>$this->Auth->user('id')])->first();
        
        if(!$agent){
            $this->Flash->error('Please login to continue.');
            return $this->redirect(['controller'=>'Users','action' => 'login']);   
      }
           $this->set('agent', $agent);
          $plans = $this->paginate($this->Plans);

          $this->set(compact('plans'));
          $this->set('_serialize', ['plans']);
          $this->viewBuilder()->layout('userbackend');
    }

    
    

    //agent's method for subscribing to a plan
    public function subscribe($plan_id){ 
           //ensure this user is logged in
         $agents_table = TableRegistry::get('Agents');
         $agent = $agents_table->find('all')->where(['user_id' =>$this->Auth->user('id')])
                 ->contain(['Users'])
                 ->first();
        
        if(!$agent){
            $this->Flash->error('Please login to continue.');
            return $this->redirect(['controller'=>'Users','action' => 'login']);   
      }
              $this->set('agent', $agent);
              $plan = $this->Plans->get($plan_id);
         
                $this->set('plan', $plan);
                $this->viewBuilder()->layout('userbackend');
    }

    
    
    //function that goes to paystack for payment
    public function proceedtopayment(){
         //ensure this user is logged in
         $agents_table = TableRegistry::get('Agents');
         $agent = $agents_table->find('all')->where(['user_id' =>$this->Auth->user('id')])
                 ->contain(['Users'])
                 ->first();
        
        if(!$agent){
            $this->Flash->error('Please login to continue.');
            return $this->redirect(['controller'=>'Users','action' => 'login']);   
      }
              $this->set('agent', $agent);
           $baseurl= "/yulo/plans";
           if ($this->request->is('post')) {
            //split agent's name
               
             $agent_names = explode(' ',$agent->fullname); 
              //debug(json_encode($agent_names[0], JSON_PRETTY_PRINT));exit;
              //get customer email
            $email = $agent->user->username;
            $amount = $this->request->getData('amountpaid');
            $fname = $agent_names[0];
            $lname = $agent_names[1];
            $plan_id = $this->request->getData('plan_id');
            $agent_id = $agent->id;
            $period = $this->request->getData('enddate');
            $ref = $this->uniqidReal();
            $subacc = 'ACCT_ry1eqlclyfx5u54'; // sub-account code, you get this when you set up a split account.
            $cancel_url = $baseurl.'cancel/'.$ref.'/';
            //initialize transaction
            $agents_table = TableRegistry::get('Transactions');
            $new_transaction = $agents_table->newEntity();
            $new_transaction->agent_id = $agent->id;
            $new_transaction->amount = $amount;
            $new_transaction->description = 'payment process';
            $new_transaction->gateway_response = 'initiated by yulo user';
            $new_transaction->reference = $ref;
             $agents_table->save($new_transaction);
             
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
                'callback_url'=>'https://www.yulo.ng/plans/paymentverification/'.$ref,
                'amount'=> $postAmount,
                'email'=>$email,
                'first_name'=>$fname,
                'last_name'=>$lname,
                'reference'=>$ref,
                'metadata'=>json_encode([
                  'cancel_action'=>$cancel_url,
                  'plan_id'=>$plan_id,
                  'agent_id'=>$agent_id,
                  'period'=>$period,
                  'trans_id'=> $new_transaction->id,
                  'phone'=>$agent->phone,
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
                'amount'=>$postAmount,
                'email'=>$email,
                'first_name'=>$fname,
                'last_name'=>$lname,
                'reference'=>$ref,
                'metadata'=>json_encode([
                  'cancel_action'=>$cancel_url,
                  'plan_id'=>$plan_id,
                  'agent_id'=>$agent_id,
                  'period'=>$period,
                  'trans_id'=> $new_transaction->id,
                  'phone'=>$agent->phone,
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
  
  
  
  
  
  //method that confirms payment and creates subscrition for the agent
  public function paymentverification($ref){
     // echo $ref; exit;
         $agents_table = TableRegistry::get('Agents');
         $agent = $agents_table->find('all')->where(['user_id' =>$this->Auth->user('id')])->first();
         
           $this->set('agent', $agent);
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
           
          // debug($tranx); exit;
           $plan_id = $tranx->data->metadata->plan_id;
          $choosen_plan = $this->Plans->get($plan_id);
          $sub_duration = ($tranx->data->metadata->period*30);
          //check for existing subscription
          $days_left = $this->checkexistingsub($agent->id,$plan_id);
          //add left over days from previous subscription
           $new_duration =   $sub_duration+ $days_left;
          
          //create the paid subscription for the agent
          $subscriptions_table = TableRegistry::get('Subscriptions');
          $subscription =  $subscriptions_table->newEntity();
          $subscription->agent_id = $agent->id;
          $subscription->enddate = Date('Y:m:d H:i:s', strtotime("+ ".$new_duration ." days"));
          $subscription->no_of_properties_available = $choosen_plan->number_of_properties*$tranx->data->metadata->period;
          $subscription->no_of_properties_uploaded = 0;
          $subscription->plan_id =   $plan_id;
          $subscription->amountpaid = ($tranx->data->amount/100);
         //debug(json_encode( $basicplan, JSON_PRETTY_PRINT)); exit;
         $subscriptions_table->save( $subscription);
         //update transaction
          $transactions_table = TableRegistry::get('Transactions');
          $trans_id = $tranx->data->metadata->trans_id;
         // echo $trans_id; exit;
          $transaction = $transactions_table->get($trans_id);
          $transaction->gateway_response = $tranx->data->status;
          $transaction->reference = $tranx->data->reference;
          $transaction->description = 'completed';
          $transactions_table->save($transaction);
          $this->Flash->success('Success : Your subscription was successful.');
          $this->set('subscription', $transaction);
          $this->set('plan_id', $plan_id);
        // debug($tranx); exit;
         $this->viewBuilder()->layout('userbackend');
      
  }



//function that checks for an exisiting subscription
    public function checkexistingsub($agent_id,$plan_id){
        $subscriptions_table = TableRegistry::get('Subscriptions'); 
        $remaining_days = 0;
        $active_subscriptions = $subscriptions_table->find()
                ->where(['agent_id'=>$agent_id,'date(enddate) >'=> date('Y-m-d'),'sub_status'=>'active']);
        foreach ($active_subscriptions  as $active_subscription){
            $active_subscription->sub_status = 'deactivated';
            $days_left = date_diff(date_create($active_subscription->enddate), date_create(date('Y-m-d')));
            if(($days_left->days>0) && ($active_subscription->plan_id ==$plan_id)){
                $remaining_days = $remaining_days+$days_left->days;
                
            }
               $subscriptions_table->save($active_subscription);      
        }
        //echo  $remaining_days; exit;
        return $remaining_days;
        
    }


    //function that returns the agent's active subscription
    public function activesubscription(){
             //ensure this user is logged in
         $agents_table = TableRegistry::get('Agents');
         $agent = $agents_table->find('all')->where(['user_id' =>$this->Auth->user('id')])->first();
        
           if(!$agent){
           $this->Flash->error('Please login to continue.');
           return $this->redirect(['controller'=>'Users','action' => 'login']);   
            }
       $this->set('agent', $agent);
       $subscriptions_table = TableRegistry::get('Subscriptions');
       $active_subscription = $subscriptions_table->find()
               ->where(['agent_id'=>$agent->id,'date(enddate) >'=> date('Y-m-d'),'sub_status'=>'active'])
               ->contain(['Plans'])->first();
        $this->set('active_subscription' ,$active_subscription);
         $this->viewBuilder()->layout('userbackend');
        
    }
    
    
    
    
      //function that returns the agent's active subscription
    public function mysubscriptions(){
             //ensure this user is logged in
         $agents_table = TableRegistry::get('Agents');
         $agent = $agents_table->find('all')->where(['user_id' =>$this->Auth->user('id')])->first();
        
           if(!$agent){
           $this->Flash->error('Please login to continue.');
           return $this->redirect(['controller'=>'Users','action' => 'login']);   
          }
       $this->set('agent', $agent);
       $subscriptions_table = TableRegistry::get('Subscriptions');
       $active_subscription = $subscriptions_table->find()
               ->where(['agent_id'=>$agent->id])
               ->contain(['Plans'])
               ->order(['startdate'=>'DESC','enddate'=>'DESC']);
       $this->set('subscriptions' ,$this->paginate($active_subscription));
       $this->viewBuilder()->layout('userbackend');
        
    }



// function that creates a subscription after a successful payment at paystack
    public function newsubscription($agent_id, $plan_id, $no_of_properties,$duration,$amount){
          $subscriptions_table = TableRegistry::get('Subscriptions');
         $basicplan =  $subscriptions_table->newEntity();
         $basicplan->agent_id = $agent_id;
         $basicplan->enddate = Date('Y:m:d H:i:s', strtotime("+" .$duration. " days"));
         $basicplan->no_of_properties_available = $no_of_properties;
         $basicplan->no_of_properties_uploaded = 0;
         $basicplan->plan_id = $plan_id;
         $basicplan->amountpaid = $amount;
         //debug(json_encode( $basicplan, JSON_PRETTY_PRINT)); exit;
         if($subscriptions_table->save($basicplan)){
         $this->Flash->success('Success: your subscription eas successful.');
         return $this->redirect(['controller'=>'Plans','action' => 'activescription']);
         }
         else{
             $this->Flash->error('Unable to subscribe, please try again.');
            return $this->redirect(['controller'=>'Plans','action' => 'mysubscription']);
         }
        
    }

    
    /**
     * View method
     *
     * @param string|null $id Plan id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $plan = $this->Plans->get($id, [
            'contain' => ['YuloUsersplan']
        ]);

        $this->set('plan', $plan);
        $this->set('_serialize', ['plan']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $plan = $this->Plans->newEntity();
        if ($this->request->is('post')) {
            $plan = $this->Plans->patchEntity($plan, $this->request->getData());
            if ($this->Plans->save($plan)) {
                $this->Flash->success(__('The plan has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The plan could not be saved. Please, try again.'));
        }
        $this->set(compact('plan'));
        $this->set('_serialize', ['plan']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Plan id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $plan = $this->Plans->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $plan = $this->Plans->patchEntity($plan, $this->request->getData());
            if ($this->Plans->save($plan)) {
                $this->Flash->success(__('The plan has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The plan could not be saved. Please, try again.'));
        }
        $this->set(compact('plan'));
        $this->set('_serialize', ['plan']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Plan id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $plan = $this->Plans->get($id);
        if ($this->Plans->delete($plan)) {
            $this->Flash->success(__('The plan has been deleted.'));
        } else {
            $this->Flash->error(__('The plan could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
