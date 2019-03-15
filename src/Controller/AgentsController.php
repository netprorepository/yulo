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

/**
 * Agents Controller
 *
 * @property \App\Model\Table\AgentsTable $Agents
 *
 * @method \App\Model\Entity\Agent[] paginate($object = null, array $settings = [])
 */
class AgentsController extends AppController
{

    
    
    //agents and properties owners dashboard
    public function agentdashboard(){
        //ensure this user is logged in
         $agent = $this->Agents->find('all')->where(['user_id' =>$this->Auth->user('id')])->first();
        
        if(!$agent){
       $this->Flash->error('Please login to continue.');
       return $this->redirect(['controller'=>'Users','action' => 'login']);   
      }
      $this->set('agent', $agent);
       $subscriptions_table = TableRegistry::get('Subscriptions');
       $properties_table = TableRegistry::get('Properties');
       $active_subscription = $subscriptions_table->find()
               ->where(['agent_id'=>$agent->id,'date(enddate) >'=> date('Y-m-d'),'sub_status'=>'active'])
               ->contain(['Plans'])->first();
       $myproperties = $properties_table->find()->where(['agent_id'=>$agent->id])->count();
       $live_properties = $properties_table->find()->where(['agent_id'=>$agent->id,'listing_status !='=>'pending'])->count();
       $allproperties = $properties_table->find()->where(['agent_id'=>$agent->id])->contain(['Categories']);       
     // debug(json_encode( $allproperties, JSON_PRETTY_PRINT)); exit;
      
      
       $this->set('allproperties', $allproperties);
      $this->set(compact('myproperties', 'live_properties' ));
      $this->set('active_subscription', $active_subscription );
      //  $this->set('_serialize', ['company']);
        
        
        $this->viewBuilder()->layout('userbackend'); 
    }

    
    
    //agents method for creating a banner ad
    public function createad(){
          //ensure this user is logged in
            $agent = $this->Agents->find('all')->contain(['Users'])->where(['user_id' =>$this->Auth->user('id')])->first();
            if(!$agent){
            $this->Flash->error('Please login to continue.');
            return $this->redirect(['controller'=>'Users','action' => 'login']);   
            }
            $this->set('agent', $agent);
            $adverts_table = TableRegistry::get('Adverts');
               $advert = $adverts_table->newEntity();
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
   
            $advert = $adverts_table->patchEntity($advert, $this->request->getData());
             $advert->user_id = $agent->user_id;
            $advert->advert_url = $image_name;
            $advert->status = "pending";
            $advert->aprovedby = "pending";
           $advert->adsize = $this->request->data['advert_url']['size'];
          $advert->adtype = $this->request->data['advert_url']['type'];
         $advert->trnxstatus = "initialized";
         $advert->trnxref = "initialized";
            if ($adverts_table->save($advert)){
                $this->Flash->success(__('The advert has been saved and will go live once verified by our admin.'));
               $agent_names = explode(' ',$agent->fullname); 
                $fname = $agent_names[0];
            $lname = $agent_names[1];
            //call the payment handler
            $adverts = new AdvertsController();
            
             $adverts->proceedtopayment( $agent->user->username,$advert->amount,$fname,$lname,$agent->phone,$advert->id);

                return $this->redirect(['controller'=>'Adverts','action' => 'index']);
            }
            $this->Flash->error(__('The advert could not be saved. Please, try again.'));
        }
        
       // $users = $this->Adverts->Users->find('list', ['limit' => 200]);
        $this->set(compact('advert', 'users'));
        $this->set('_serialize', ['advert']);
        
    }






    //agents method for verifying their account
    public function verifyaccount(){
          //ensure this user is logged in
            $agent = $this->Agents->find('all')->where(['user_id' =>$this->Auth->user('id')])->first();
            if(!$agent){
            $this->Flash->error('Please login to continue.');
            return $this->redirect(['controller'=>'Users','action' => 'login']);   
            }
            $this->set('agent', $agent);
        
            if ($this->request->is('post')) {
              $extension = ["jpeg","jpg","png","gif"];  
              $size = getimagesize($this->request->data['verificationfile']['tmp_name']);
              $image_size = $this->request->data['verificationfile']['size'];
              //allow only images less than 2mb
              if( $image_size>2000000){
                   throw new \Exception('File must be less than 2mb!.'); 
              }
          //$mimetype = stripslashes($size['mime']); exit;;
            if ((empty($size) || ($size[0] === 0) || ($size[1] === 0))) {
               throw new \Exception('this is unacceptable!.');
                       }
  
                $file_name= $this->request->data['verificationfile']['name'] ; 
                $ext=pathinfo($file_name,PATHINFO_EXTENSION); 
                if(in_array($ext,$extension))
                {
                   $file_name = uniqid(md5($this->request->data['verificationfile']['name']), true);
                  
                    if(!file_exists("verification_files/".$file_name))
                    {   
                   $file_name =  $file_name.'.'.$ext; 
                       move_uploaded_file($this->request->data['verificationfile']["tmp_name"],"verification_files/".$file_name);
                       chmod("verification_files/".$file_name, 0644); 
                       $agent->verification_file_url = $file_name;
                       $agent->verification_status = 'file_uploaded';
                       $this->Agents->save($agent);
                       $this->Flash->success(__('Image uploaded successfully. '));
                       return $this->redirect(['action' => 'myprofile']);
                       }
                    else
                    {
                        $filename =basename($file_name,$ext);
                        $newFileName=$filename.time().".".$ext;
                        move_uploaded_file($this->request->data['verificationfile']["tmp_name"],"verification_files/".$newFileName);
                       chmod("verification_files/".$newFileName, 0644); 
                       $agent->verification_file_url = $file_name;
                       $agent->verification_status = 'file_uploaded';
                       $this->Agents->save($agent);
                       $this->Flash->success(__('Image uploaded successfully. '));
                      return $this->redirect(['action' => 'myprofile']);
                       //return $this->redirect(['action' => 'managemyproperties']);
                    }
                }
                else{
                    $this->Flash->error(__('Unable to upload file, invalid file format. Please upload only jpg,png,gif or Jpeg file'));
                }
          }
        
          $this->viewBuilder()->layout('userbackend'); 
        
    }

    

    //agent method for viewing his profile
    public function myprofile(){
        //ensure this user is logged in
            $agent = $this->Agents->find('all')->where(['user_id' =>$this->Auth->user('id')])
                    ->contain(['Users','States'])->first();
        
          if(!$agent){
            $this->Flash->error('Please login to continue.');
            return $this->redirect(['controller'=>'Users','action' => 'login']);   
      }
      $this->set('agent', $agent);
        
         $this->viewBuilder()->layout('userbackend');
    }

    




    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'States']
        ];
        $agents = $this->paginate($this->Agents);

        $this->set(compact('agents'));
        $this->set('_serialize', ['agents']);
    }

    /**
     * View method
     *
     * @param string|null $id Agent id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $agent = $this->Agents->get($id, [
            'contain' => ['Users', 'States']
        ]);

        $this->set('agent', $agent);
        $this->set('_serialize', ['agent']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $agent = $this->Agents->newEntity();
        if ($this->request->is('post')) {
            $agent = $this->Agents->patchEntity($agent, $this->request->getData());
            if ($this->Agents->save($agent)) {
                $this->Flash->success(__('The agent has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The agent could not be saved. Please, try again.'));
        }
        $users = $this->Agents->Users->find('list', ['limit' => 200]);
        $states = $this->Agents->States->find('list', ['limit' => 200]);
        $this->set(compact('agent', 'users', 'states'));
        $this->set('_serialize', ['agent']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Agent id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function updateprofile($id = null)
    {
        $agent = $this->Agents->get($id, [
            'contain' => ['Users','States']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
          $file_name = '';
              $extension = ["jpeg","jpg","png","gif"];  
              if(is_uploaded_file($this->request->data['pix_url']['tmp_name'])){
              $size = getimagesize($this->request->data['pix_url']['tmp_name']);
              $image_size = $this->request->data['pix_url']['size'];
              //allow only images less than 2mb
        if( $image_size>2000000){
                   throw new \Exception('File must be less than 2mb!.'); 
              }
          //$mimetype = stripslashes($size['mime']); exit;;
        if ((empty($size) || ($size[0] === 0) || ($size[1] === 0))) {
                   throw new \Exception('this is unacceptable!.');
              }
  
                $file_name= $this->request->data['pix_url']['name'] ; 
                $ext=pathinfo($file_name,PATHINFO_EXTENSION); 
                if(in_array($ext,$extension))
                {
                   $file_name = uniqid(md5($this->request->data['pix_url']['name']), true);
                  
                    if(!file_exists("profile_pix/".$file_name))
                    {   
                   $file_name =  $file_name.'.'.$ext; 
                       move_uploaded_file($this->request->data['pix_url']["tmp_name"],"profile_pix/".$file_name);
                       chmod("profile_pix/".$file_name, 0644); 
                     }
                    else
                    {
                        $filename =basename($file_name,$ext);
                        $newFileName=$filename.time().".".$ext;
                        move_uploaded_file($this->request->data['pix_url']["tmp_name"],"profile_pix/".$newFileName);
                       chmod("verification_files/".$newFileName, 0644); 
                       
                    }
                }
                else{
                    $this->Flash->error(__('Unable to upload file, invalid file format. Please upload only jpg,png,gif or Jpeg file'));
                }
              }
                $agent = $this->Agents->patchEntity($agent, $this->request->getData());
                $agent->pix_url = $file_name;
                $agent->gender = $this->request->getData('gender');
              if ($this->Agents->save($agent)) {
                $this->Flash->success(__('Your data has been updated.'));

                 return $this->redirect(['action' => 'myprofile']);
            }
            $this->Flash->error(__('Unable to update data. Please, try again.'));
        }
       // $users = $this->Agents->Users->find('list', ['limit' => 200]);
        $states = $this->Agents->States->find('list', ['limit' => 200])->where(['country_id'=>160]);
        $this->set(compact('agent', 'users', 'states'));
        $this->set('_serialize', ['agent']);
        $this->viewBuilder()->layout('userbackend');
    }

    /**
     * Delete method
     *
     * @param string|null $id Agent id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $agent = $this->Agents->get($id);
        if ($this->Agents->delete($agent)) {
            $this->Flash->success(__('The agent has been deleted.'));
        } else {
            $this->Flash->error(__('The agent could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
     public function displayagents(){
        $propertiesagents = $this->Agents->find()
        ->contain(['Users','States']);
        $this->set('propertiesagents', $propertiesagents);
        //debug(json_encode( $propertiesagents, JSON_PRETTY_PRINT)); 
    }

    public function agentproperties($id = null){
         $agent = $this->Agents->get($id);
         $propertiestable = TableRegistry::get('Properties');
         $propertiesagents = $propertiestable->find()
         ->where(['agent_id'=>$id])
         ->order(['push_up_date'=>'DESC', 'listing_premium'=>'DESC'])
         ->contain(['Images','Agents','States','Categories','Cities','Categorysubtypes','Categorytypes']);
         $this->set('agentproperties',$this->paginate($propertiesagents));
         $this->set('agent', $agent);

        $agents_table = TableRegistry::get('Agents');
        $states = $agents_table->States
        ->find('list')
        ->where(['country_id'=>160]);
        $this->set(compact('states'));

        $categoriestable = TableRegistry::get('Categories');
        $categories = $categoriestable->find('list');
        $this->set(compact('categories'));

        $categorytypestable = TableRegistry::get('Categorytypes');
        $categoriestypes = $categorytypestable->find('list');
        $this->set(compact('categoriestypes'));

        $citiestable = TableRegistry::get('Cities');
        $cities = $citiestable->find('list', ['limit' => 500]);
        $this->set(compact('cities'));

    }

    
    
    //shows an agent's pending property
    public function mypendingproperties(){
        //ensure this user is logged in
            $agent = $this->Agents->find('all')->where(['user_id' =>$this->Auth->user('id')])
        ->contain(['Subscriptions.Plans','Subscriptions'=>function($q){return $q->where(['date(enddate) >'=>date('Y-m-d'),'sub_status'=>'active']);}])
        ->first();
            if(!$agent){
            $this->Flash->error('Please login to continue.');
            return $this->redirect(['controller'=>'Users','action' => 'login']);   
            }
            $this->set('agent', $agent);
           $properties_table = TableRegistry::get('Properties');
           $pending_properties =  $properties_table->find()
                   ->contain(['Images','States','Categories'])
                   ->where(['listing_display_status'=>'true','listing_market_status'=>'Available','listing_status !=' =>'approved']);
            
         $this->set('pending_properties', $this->paginate($pending_properties));
         $this->viewBuilder()->layout('userbackend');
    }






    public function filteragent($text = null){
         $propertiesagents = $this->Agents->find()
        ->contain(['Users','States'])
        ->where(['fullname like'=> '%'.$text.'%']);
        $this->set('propertiesagents', $propertiesagents);
        //debug(json_encode( $propertiesagents, JSON_PRETTY_PRINT)); 
    }
    
    // allow unrestricted pages
     public function beforeFilter(Event $event){
              $this->Auth->allow(['displayagents','agentproperties','filteragent']);
     }
}
