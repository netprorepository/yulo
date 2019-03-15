<?php

namespace App\Controller;

use Cake\ORM\TableRegistry;
use App\Controller\AppController;
use Cake\I18n\Time;
use Cake\Network\Email\Email;

/**
 * Admins Controller
 *
 * @property \App\Model\Table\AdminsTable $Admins
 *
 * @method \App\Model\Entity\Admin[] paginate($object = null, array $settings = [])
 */
class AdminsController extends AppController {

    //admin dashboard
    public function admindashboard() {
        //ensure admin is loggedin
        $admin = $this->Admins->find('all')->where(['user_id' => $this->Auth->user('id')])->first();

        if (!$admin) {
            $this->Flash->error('Please login to continue.');
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }
        $this->set('admin', $admin);
        $properties_table = TableRegistry::get('Properties');
         $users_table = TableRegistry::get('Users');
         $users = $users_table->find();
        $allproperties = $properties_table->find()->contain(['Categories']);
        $this->set('allproperties', $allproperties);
        $this->set('users', $users);
        //debug(json_encode($allproperties, JSON_PRETTY_PRINT)); exit;
        $this->viewBuilder()->layout('adminbackend');
    }

    //admin function that displays all properties on the site
    public function allproperties() {

        //ensure admin is loggedin
        $admin = $this->Admins->find('all')->where(['user_id' => $this->Auth->user('id')])->first();

        if (!$admin) {
            $this->Flash->error('Please login to continue.');
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }
        $this->set('admin', $admin);
        $properties_table = TableRegistry::get('Properties');
        $allproperties = $properties_table->find()
                ->contain(['States', 'Cities', 'Images', 'Categories', 'Categorysubtypes', 'Categorytypes'])
                ->order(['listing_date_added' => 'DESC']);
        $this->set('allproperties', $this->paginate($allproperties));


        $this->viewBuilder()->layout('adminbackend');
    }

    //admin function for viewing and managing all plans
    public function viewplans() {
        //ensure admin is loggedin
        $admin = $this->Admins->find('all')->where(['user_id' => $this->Auth->user('id')])->first();

        if (!$admin) {
            $this->Flash->error('Please login to continue.');
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }
        $this->set('admin', $admin);
        $plans_table = TableRegistry::get('Plans');
        $all_plans = $plans_table->find();

        $this->set('all_plans', $all_plans);
        $this->viewBuilder()->layout('adminbackend');
    }

    public function editplan($id = null) {
        //ensure admin is loggedin
        $admin = $this->Admins->find('all')->where(['user_id' => $this->Auth->user('id')])->first();

        if (!$admin) {
            $this->Flash->error('Please login to continue.');
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }
        $this->set('admin', $admin);
        $plans_table = TableRegistry::get('Plans');
        $plan = $plans_table->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            //  debug(json_encode( $this->request->getData(), JSON_PRETTY_PRINT)); exit;
            $plan = $plans_table->patchEntity($plan, $this->request->getData());
            if ($plans_table->save($plan)) {
                $this->Flash->success(__('The plan has been updated.'));

                return $this->redirect(['action' => 'viewplans']);
            }
            $this->Flash->error(__('The plan could not be updated. Please, try again.'));
        }
        $this->set(compact('plan'));
        $this->set('_serialize', ['plan']);
        $this->viewBuilder()->layout('adminbackend');
    }

    //admin method for creating new plans
    public function addnewplan() {
        //ensure admin is loggedin
        $admin = $this->Admins->find('all')->where(['user_id' => $this->Auth->user('id')])->first();
        if (!$admin) {
            $this->Flash->error('Please login to continue.');
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }
        $this->set('admin', $admin);
        $plans_table = TableRegistry::get('Plans');
        $plan = $plans_table->newEntity();
        if ($this->request->is('post')) {
            $plan = $plans_table->patchEntity($plan, $this->request->getData());
            $plan->admin_id = $admin->id;
            if ($plans_table->save($plan)) {
                $this->Flash->success(__('The plan has been created.'));

                return $this->redirect(['action' => 'viewplans']);
            }
            $this->Flash->error(__('The plan could not be created. Please, try again.'));
        }
        $this->set(compact('plan'));
        $this->set('_serialize', ['plan']);
        $this->viewBuilder()->layout('adminbackend');
    }

    //admin method for viewing users
    public function viewusers() {
        //ensure admin is loggedin
        $admin = $this->Admins->find('all')->where(['user_id' => $this->Auth->user('id')])->first();

        if (!$admin) {
            $this->Flash->error('Please login to continue.');
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }
        $this->set('admin', $admin);
        $users_table = TableRegistry::get('Users');
        $users = $users_table->find()->order(['createdon' => 'DESC']);
        // $this->paginate($users);
        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
        $this->viewBuilder()->layout('adminbackend');
    }

    //admin method for verifying a user account
    public function verifyuser($user_id = null) {
        $users_table = TableRegistry::get('Users');
        $user = $users_table->get($user_id);
        $user->verificationstatus = "verified";
        if ($users_table->save($user)) {
            $this->verifyuserMail($user->username);
            $this->Flash->success(__('The user account has been verifed and can now login.'));
        } else {
            $this->Flash->error(__('Unable to verify account, please try again.'));
        }
        return $this->redirect(['action' => 'viewusers']);
    }

    
      //sends a link to the newly registered job seeker to verify his/her account
    public function verifyuserMail($destination) {
        $email = new Email('default');
        $message = "Hello, <p>Thank you for registering with Yulo. </p><p><br /> Your account has now been verified "
                . "<br />.You can now login and start uploading your properties for Rent, Sale and Lease <a href='https://www.yulo.ng/users/login/" .
                "' ><b> login </b> </a> </p><br />";
        $message .= "<br /><p>Regards,<br /> Yulo Team</p>";
        $email->from(['no-reply@yulo.ng' => 'Yulo']);
        $email->to($destination);
        $email->addBcc('chukwudi@netpro.com.ng');
        $email->addHeaders(['Content-type: text/html; charset=iso 8859-1', 'MIME-Version: 1.0' . '\r\n']);
        //$email->addHeaders("Content-type: text/html; charset=iso 8859-1");
        $email->emailFormat('html');
        $email->subject('Agent Account Verification');
        $email->send($message);
        return;
    }
    
    
//admin method for approving a property
    public function approveproperty($id = null) {
        $properties_table = TableRegistry::get('Properties');
        $property = $properties_table->get($id);
        $property->listing_status = 'approved';
        if ($properties_table->save($property)) {
            $message = $this->approvepropertymail($property->id);
            $this->Flash->success(__($message));
            return $this->redirect(['action' => 'allproperties']);
        } else {
            $this->Flash->error(__('Unable to aprove property, please try again.'));
            return $this->redirect(['action' => 'allproperties']);
        }
    }

    //approve property email
    public function approvepropertymail($property_id) {
        $properties_table = TableRegistry::get('Properties');
        $email = new Email('default');
        $message = " ";
        $property = $properties_table->get($property_id, ['contain' => ['Agents', 'Agents.Users']]);
        // debug(json_encode($property, JSON_PRETTY_PRINT)); exit;
        $property_title = $property->listing_title;
        $agent = $property->agent->fullname;
        $agent_email = $property->agent->user->username;
        $message .= "<br/>";
        $message .= "Hello " . ucwords($agent) . ',<br /><br/>';
        $message .= " We wish to inform you that your property, " . $property_title . " has been approved and gone live.<br />";
        $message .= '<br /><br /><br />';
        $message .= "Best Regards<br /> Yulo Team";
        $email->from(['no-reply@yulo.ng' => 'Yulo Nigeria']);
        $email->to($agent_email);
        $email->addBcc('austin.itua@netpro.com.ng');
        $email->emailFormat('html');
        $email->addBcc('chukwudi@netpro.com.ng');
        $email->subject('Property Approval');
        $email->send($message);
        // $this->Flash->success(__('The property has been disapproved and a mail sent to the agent : '.$agent_name));

        return 'The property has been disapproved and a mail sent to the agent : ' . $agent;
    }

    //admin metod for viewing all agents
    public function allagents() {
        //ensure admin is loggedin
        $admin = $this->Admins->find('all')->where(['user_id' => $this->Auth->user('id')])->first();

        if (!$admin) {
            $this->Flash->error('Please login to continue.');
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }
        $this->set('admin', $admin);
        $agents_table = TableRegistry::get('Agents');
        $all_agents = $agents_table->find()
                ->contain(['Users', 'Properties'])
                ->order(['created' => 'DESC']);
        $this->set('all_agents', $this->paginate($all_agents));
        $this->viewBuilder()->layout('adminbackend');
    }

    //admin method for viewing an agent's properties
    public function viewagentproperties($id = null) {
        //ensure admin is loggedin
        $admin = $this->Admins->find('all')->where(['user_id' => $this->Auth->user('id')])->first();

        if (!$admin) {
            $this->Flash->error('Please login to continue.');
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }
        $this->set('admin', $admin);
        $properties_table = TableRegistry::get('Properties');
        $agents_table = TableRegistry::get('Agents');
        $agent = $agents_table->get($id);
        $agent_properties = $properties_table->find()
                ->contain(['Categories', 'Images', 'States'])
                ->where(['agent_id' => $id]);
        $this->set('agent_properties', $this->paginate($agent_properties));
        $this->set('agent', $agent);
        $this->viewBuilder()->layout('adminbackend');
    }

    //admin method for updating a property
    public function update($id = null) {
        //ensure this user is logged in
        $properties_table = TableRegistry::get('Properties');
        $category_subtypes_stable = TableRegistry::get('Categorysubtypes');
        $category_types_table = TableRegistry::get('Categorytypes');
        //ensure admin is loggedin
        $admin = $this->Admins->find('all')->where(['user_id' => $this->Auth->user('id')])->first();

        if (!$admin) {
            $this->Flash->error('Please login to continue.');
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }
        $this->set('admin', $admin);
        $property = $properties_table->get($id, ['contain' => ['Agents', 'Images', 'States', 'Categories', 'Cities', 'Categorysubtypes', 'Categorytypes']]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            // debug(json_encode( $this->request->getData(), JSON_PRETTY_PRINT)); exit;
            $property = $properties_table->patchEntity($property, $this->request->getData());
            if ($this->Properties->save($property)) {
                $this->Flash->success(__('The property has been updated.'));

                return $this->redirect(['action' => 'managemyproperties']);
            }
            $this->Flash->error(__('The property could not be updated. Please, try again.'));
        }
        $categories = $properties_table->Categories->find('list', ['limit' => 200]);
        $states = $properties_table->States->find('list', ['limit' => 200])
                ->where(['country_id' => 160]);
        $cities = $properties_table->Cities->find('list', ['limit' => 200])->where(['state_id' => $property->state->id]);
        $categorysubtypes = $category_subtypes_stable->find('list', ['limit' => 200]);
        $category_types = $category_types_table->find('list', ['limit' => 200]);
        // $agents = $this->Properties->Agents->find('list', ['limit' => 200]);
        $this->set(compact('property', 'categories', 'categorysubtypes', 'states', 'cities', 'category_types', 'agents'));
        $this->set('_serialize', ['property']);
        $this->viewBuilder()->layout('adminbackend');
    }

    //agent method for previewing their properties
    public function preview($id = null) {
        //ensure admin is loggedin
        $admin = $this->Admins->find('all')->where(['user_id' => $this->Auth->user('id')])->first();

        if (!$admin) {
            $this->Flash->error('Please login to continue.');
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }
        $this->set('admin', $admin);
        $properties_table = TableRegistry::get('properties');
        $property = $properties_table->get($id, [
            'contain' => ['Categories', 'States', 'Cities', 'Images', 'Agents', 'Agents.Users']]);

        $this->set('property', $property);
        $this->set('_serialize', ['property']);
        // debug(json_encode($property, JSON_PRETTY_PRINT)); exit;
        $this->viewBuilder()->layout('adminbackend');
    }

    //sends a mail to an agent giving the reason for disapproving his property
    public function propertydisapprovalmail() {
        $email = new Email('default');
        $message = " ";
        $reason = $this->request->getData('reason');
        $comment = $this->request->getData('comment');
        $property_id = $this->request->getData('property_id');
        $agent_name = $this->request->getData('agent_name');
        $agent_mail = $this->request->getData('agent_email');
        $listing_title = $this->request->getData('listing_title');

        //call the function to disapprove the property
        if (!empty($property_id) && is_numeric($property_id)) {
            $this->disapproveproperty($property_id);
        } else {
            $this->Flash->error(__('Invalid property data, please try again '));

            return $this->redirect(['action' => 'preview', $property_id]);
        }

        $message .= "<br/>";
        $message .= "Hello " . ucwords($agent_name) . '<br />';
        $message .= " We wish to inform you that your property " . $listing_title . " could not be approved for the below reasons.<br />";
        $message .= $reason . "<br/>";
        $message .= $comment . '<br />';
        $message .= "<br />Best Regards<br /> Yulo Team";
        $email->from(['no-reply@yulo.ng' => 'Yulo Nigeria']);
        $email->to($agent_mail);
        $email->addBcc('austin.itua@netpro.com.ng');
        $email->emailFormat('html');
        $email->addBcc('chukwudi@netpro.com.ng');
        $email->subject('Property Disapproval');
        $email->send($message);
        $this->Flash->success(__('The property has been disapproved and a mail sent to the agent : ' . $agent_name));

        return $this->redirect(['action' => 'allproperties']);

        //debug(json_encode( $email, JSON_PRETTY_PRINT)); exit;
    }

    //admin method for viewing all subscriptions
    public function subscriptions() {
        //ensure admin is loggedin
        $admin = $this->Admins->find('all')->where(['user_id' => $this->Auth->user('id')])->first();

        if (!$admin) {
            $this->Flash->error('Please login to continue.');
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }
        $this->set('admin', $admin);
        $subscriptions_table = TableRegistry::get('Subscriptions');
        $subscriptions = $subscriptions_table->find()
                ->contain(['Agents', 'Plans'])
                ->order(['startdate' => 'DESC']);

        $this->set('subscriptions', $subscriptions);
        $this->viewBuilder()->layout('adminbackend');
    }

//admin method for approving a property
    public function disapproveproperty($id = null) {
        $properties_table = TableRegistry::get('Properties');
        $property = $properties_table->get($id);
        $property->listing_status = 'disapproved';
        if ($properties_table->save($property)) {
            return;
        } else {
            $this->Flash->error(__('Unable to disaprove property, please try again.'));
            return $this->redirect(['action' => 'preview', $id]);
        }
        return;
    }

    //admin method for viewing pending properties
    public function pendingproperties() {

        //ensure admin is loggedin
        $admin = $this->Admins->find('all')->where(['user_id' => $this->Auth->user('id')])->first();

        if (!$admin) {
            $this->Flash->error('Please login to continue.');
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }
        $this->set('admin', $admin);
        $properties_table = TableRegistry::get('Properties');
        $pending_properties = $properties_table->find()
                ->where(['listing_status !=' => 'approved'])
                ->contain(['States', 'Cities', 'Images', 'Categories', 'Categorysubtypes', 'Categorytypes'])
                ->order(['listing_date_added' => 'DESC']);
        $this->set('pending_properties', $this->paginate($pending_properties));

        $this->viewBuilder()->layout('adminbackend');
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $admins = $this->paginate($this->Admins);

        $this->set(compact('admins'));
        $this->set('_serialize', ['admins']);
    }

    /**
     * View method
     *
     * @param string|null $id Admin id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $admin = $this->Admins->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('admin', $admin);
        $this->set('_serialize', ['admin']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $admin = $this->Admins->newEntity();
        if ($this->request->is('post')) {
            $admin = $this->Admins->patchEntity($admin, $this->request->getData());
            if ($this->Admins->save($admin)) {
                $this->Flash->success(__('The admin has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The admin could not be saved. Please, try again.'));
        }
        $users = $this->Admins->Users->find('list', ['limit' => 200]);
        $this->set(compact('admin', 'users'));
        $this->set('_serialize', ['admin']);
    }

    //admin method for editing a subecription
    public function editsubscription($id) {
        //ensure admin is loggedin
        $admin = $this->Admins->find('all')->where(['user_id' => $this->Auth->user('id')])->first();

        if (!$admin) {
            $this->Flash->error('Please login to continue.');
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }
        $this->set('admin', $admin);
        $subscriptions_table = TableRegistry::get('Subscriptions');
        $subscription = $subscriptions_table->get($id, ['contain' => ['Agents', 'Plans']]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $enddate = new Time(str_replace('-', '', $this->request->getData('enddate')));
            $startdate = new Time(str_replace('-', '', $this->request->getData('startdate')));
            $subscription = $subscriptions_table->patchEntity($subscription, $this->request->getData());
            $subscription->startdate = Date('Y:m:d H:i:s', strtotime($startdate));
            $subscription->enddate = Date('Y:m:d H:i:s', strtotime($enddate));
            //ensure date is selected
            if ((date('Y', strtotime($startdate)) == '1970') || (date('y', strtotime($enddate)) == '1970')) {
                $this->Flash->error(__('Error, please select the start and end dates for this subscription.'));

                return $this->redirect(['action' => 'editsubscription', $id]);
            }
            if ($subscriptions_table->save($subscription)) {
                // debug(json_encode($subscription, JSON_PRETTY_PRINT)); exit;
                $this->Flash->success(__('The subscription data has been updated.'));

                return $this->redirect(['action' => 'subscriptions']);
            }
            $this->Flash->error(__('The admin could not be saved. Please, try again.'));
        }


        $this->set('subscription', $subscription);
        $this->set('_serialize', ['subscription']);
        $this->viewBuilder()->layout('adminbackend');
    }

//admin method for managing banner ads
    public function managebannerads() {
        //ensure admin is loggedin
        $admin = $this->Admins->find('all')->where(['user_id' => $this->Auth->user('id')])->first();

        if (!$admin) {
            $this->Flash->error('Please login to continue.');
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }
        $this->set('admin', $admin);
        $adverts_table = TableRegistry::get('Adverts');
        $adverts = $adverts_table->find()->contain(['Users'])->order(['uploaddate' => 'DESC']);
        $this->set('adverts', $adverts);
        $this->viewBuilder()->layout('adminbackend');
    }

    //admin method for approving an ad
    public function approvead($advert_id, $admin_id, $expirydate) {
        $adverts_table = TableRegistry::get('Adverts');
        $advert = $adverts_table->get($advert_id);
        $advert->status = "Aproved";
        $advert->aprovedby = $admin_id;
        $advert->startdate = date('Y-m-d');
        $advert->enddate = $expirydate;
        if ($adverts_table->save($advert)) {
            $this->Flash->success('The Banner Ad has Been Aproved.');
        } else {
            $this->Flash->error('Soryy, unable to aprove banner ad. Please try again.');
        }
        return $this->redirect(['action' => 'managebannerads']);
    }

    //admin method for approving an ad
    public function rejectad($advert_id, $admin_id, $expirydate) {
        $adverts_table = TableRegistry::get('Adverts');
        $advert = $adverts_table->get($advert_id);
        $advert->status = "Rejected";
        $advert->aprovedby = $admin_id;
        $advert->startdate = date('Y-m-d');
        $advert->enddate = $expirydate;
        if ($adverts_table->save($advert)) {
            $this->Flash->success('The Banner Ad has Been Rejected.');
        } else {
            $this->Flash->error('Soryy, unable to reject banner ad. Please try again.');
        }
        return $this->redirect(['action' => 'managebannerads']);
    }

    //admin method for deleting an ad
    public function deletead($advert_id, $admin_id, $expirydate) {

        $adverts_table = TableRegistry::get('Adverts');
        if ($this->request->is(['post', 'delete'])) {
            $advert = $adverts_table->get($advert_id);
            if ($adverts_table->delete($advert)) {
                if (file_exists("ad_images/" . $advert->advert_url)) {
                    @unlink("ad_images/" . $advert->advert_url);
                    $this->Flash->success(__('The banner ad has been deleted.'));
                    // return $this->redirect(['action' => 'managebannerads']);
                } else {
                    $this->Flash->error(__('The image could not be deleted. Please, try again.'));
                    //  return $this->redirect(['action' => 'managebannerads']);
                }
            }

            return $this->redirect(['action' => 'managebannerads']);
        }
    }

    //admin method for editing an ad
    public function editad($advert_id) {
        //ensure admin is loggedin
        $admin = $this->Admins->find('all')->where(['user_id' => $this->Auth->user('id')])->first();

        if (!$admin) {
            $this->Flash->error('Please login to continue.');
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }
        $this->set('admin', $admin);
        $adverts_table = TableRegistry::get('Adverts');

        $advert = $adverts_table->get($advert_id, ['contain' => []]);
        if ($this->request->is(['patch', 'post', 'put'])) {

            $size = getimagesize($this->request->data['advert_url']['tmp_name']);
            // $mimetype = stripslashes($size['mime']); 
            if ((empty($size) || ($size[0] === 0) || ($size[1] === 0))) {
                throw new \Exception('this is unacceptable! image must be of type : gif, jpeg, png or jpg and less than 2mb .');
            }

            $extension = strrchr($this->request->data['advert_url']['name'], '.');

            if (!empty($this->request->data['advert_url']['tmp_name']) && is_uploaded_file($this->request->data['advert_url']['tmp_name']) && ($this->request->data['advert_url']['size'] < 2000000) && (
                    ($this->request->data['advert_url']['type'] == "image/gif") || ($this->request->data['advert_url']['type'] == "image/png") || ($this->request->data['advert_url']['type'] == "image/jpeg") || ($this->request->data['advert_url']['type'] == "image/pjpeg") || ($extension === '.pdf') || ($this->request->data['advert_url']['type'] == "image/x-png"))) {
                // encripts the username to be saved as logo name in the db
                $image_name = md5($this->request->data['advert_url']['name']) . time();
                $image_name = $image_name . $extension;
                //delete old file
                if (file_exists("ad_images/" . $advert->advert_url)) {
                    @unlink("ad_images/" . $advert->advert_url);
                }

                //upload file
                move_uploaded_file(h($this->request->data['advert_url']['tmp_name']), "ad_images/" . $image_name);

                chmod("ad_images/" . $image_name, 0644);
                $file_error = 'Image uploaded successfully';
            } else { //unlink("company_staff_ids/".$staff_id); 
                $file_error = 'wrong file format,upload failed';
            }

            $advert = $adverts_table->patchEntity($advert, $this->request->getData());

            // $advert->user_id = $advertiser->user->id;
            $advert->advert_url = $image_name;
            //  $advert->status = "pending";
            // $advert->aprovedby = "pending";
            $advert->adsize = $this->request->data['advert_url']['size'];
            $advert->adtype = $this->request->data['advert_url']['type'];
            if ($adverts_table->save($advert)) {
                $this->Flash->success(__('The advert has been updated.'));

                return $this->redirect(['action' => 'managebannerads']);
            }
            $this->Flash->error(__('The advert could not be saved. Please, try again.'));
        }
        $users = $adverts_table->Users->find('list', ['limit' => 200]);
        $this->set(compact('advert', 'users'));
        $this->set('_serialize', ['advert']);
        $this->viewBuilder()->layout('adminbackend');
    }

    //admin method for creating new banner ads 
    public function newbannerad() {
        //ensure admin is loggedin
        $admin = $this->Admins->find('all')->where(['user_id' => $this->Auth->user('id')])->first();

        if (!$admin) {
            $this->Flash->error('Please login to continue.');
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }
        $this->set('admin', $admin);
        $adverts_table = TableRegistry::get('Adverts');

        $advert = $adverts_table->newEntity();
        if ($this->request->is('post')) {

            $size = getimagesize($this->request->data['advert_url']['tmp_name']);
            // $mimetype = stripslashes($size['mime']); 
            if ((empty($size) || ($size[0] === 0) || ($size[1] === 0))) {
                throw new \Exception('this is unacceptable! image must be of type : gif, jpeg, png or jpg and less than 2mb .');
            }

            $extension = strrchr($this->request->data['advert_url']['name'], '.');

            if (!empty($this->request->data['advert_url']['tmp_name']) && is_uploaded_file($this->request->data['advert_url']['tmp_name']) && ($this->request->data['advert_url']['size'] < 2000000) && (
                    ($this->request->data['advert_url']['type'] == "image/gif") || ($this->request->data['advert_url']['type'] == "image/png") || ($this->request->data['advert_url']['type'] == "image/jpeg") || ($this->request->data['advert_url']['type'] == "image/pjpeg") || ($extension === '.pdf') || ($this->request->data['advert_url']['type'] == "image/x-png"))) {
                // encripts the username to be saved as logo name in the db
                $image_name = md5($this->request->data['advert_url']['name']) . time();
                $image_name = $image_name . $extension;

                //upload file
                move_uploaded_file(h($this->request->data['advert_url']['tmp_name']), "ad_images/" . $image_name);

                chmod("ad_images/" . $image_name, 0644);
                $file_error = 'Image uploaded successfully';
            } else { //unlink("company_staff_ids/".$staff_id); 
                $file_error = 'wrong file format,upload failed';
            }
            $advert = $adverts_table->patchEntity($advert, $this->request->getData());
            $advert->user_id = $admin->user_id;
            $advert->advert_url = $image_name;
            $advert->status = "Aproved";
            $advert->aprovedby = $admin->id;
            $advert->adsize = $this->request->data['advert_url']['size'];
            $advert->adtype = $this->request->data['advert_url']['type'];
            $advert->trnxstatus = "admin_completed";
            $advert->trnxref = date('y-m-d') . '_' . $admin->name;
            if ($adverts_table->save($advert)) {
                $this->Flash->success(__('The advert has been saved.'));

              //  $this->proceedtopayment($advertiser->user->username, $advert->amount, $advertiser->fname, $advertiser->lname, $advertiser->phone, $advert->id);

                return $this->redirect(['action' => 'managebannerads']);
            }
            $this->Flash->error(__('The advert could not be saved. Please, try again.'));
        }

        //$users = $adverts_table->Users->find('list', ['limit' => 200]);
        $this->set(compact('advert', 'users'));
        $this->set('_serialize', ['advert']);
        $this->viewBuilder()->layout('adminbackend');
    }

    //admin method that puts a property off line
    public function putoffline($property_id) {
        $properties_table = TableRegistry::get('Properties');
        $property = $properties_table->get($property_id);
        $property->listing_display_status = "false";

        if ($properties_table->save($property)) {
            $this->Flash->success(__('The property has been put offline has been updated.'));
        } else {
            $this->Flash->error(__('Unable to Update property. Please try again'));
        }
        return $this->redirect(['action' => 'allproperties']);
    }

    //admin method that puts a property off line
    public function putonline($property_id) {
        $properties_table = TableRegistry::get('Properties');
        $property = $properties_table->get($property_id);
        $property->listing_display_status = "true";

        if ($properties_table->save($property)) {
            $this->Flash->success(__('The property has been put back online.'));
        } else {
            $this->Flash->error(__('Unable to Update property. Please try again'));
        }
        return $this->redirect(['action' => 'allproperties']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Admin id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $admin = $this->Admins->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $admin = $this->Admins->patchEntity($admin, $this->request->getData());
            if ($this->Admins->save($admin)) {
                $this->Flash->success(__('The admin has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The admin could not be saved. Please, try again.'));
        }
        $users = $this->Admins->Users->find('list', ['limit' => 200]);
        $this->set(compact('admin', 'users'));
        $this->set('_serialize', ['admin']);
    }

    //agents method for deleting a property's image
    public function viewimages($property_id) {
        //ensure admin is loggedin
        $admin = $this->Admins->find('all')->where(['user_id' => $this->Auth->user('id')])->first();

        if (!$admin) {
            $this->Flash->error('Please login to continue.');
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }
        $this->set('admin', $admin);
        $properties_table = TableRegistry::get('Properties');
        $property = $properties_table->get($property_id, ['contain' => ['Images']]);
        $this->set('property', $property);
        $this->set('_serialize', ['property']);
        $this->viewBuilder()->layout('adminbackend');
    }

//method that deletes a property's image
    public function deleteimage($image_id) {
        //ensure admin is loggedin
        $admin = $this->Admins->find('all')->where(['user_id' => $this->Auth->user('id')])->first();

        if (!$admin) {
            $this->Flash->error('Please login to continue.');
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }
        $this->set('admin', $admin);
        $images_table = TableRegistry::get('Images');
        if ($this->request->is(['post', 'delete'])) {
            $image = $images_table->get($image_id);
            if ($images_table->delete($image)) {
                if (file_exists("property_images/" . $image->imageurl)) {
                    @unlink("property_images/" . $image->imageurl);
                    // $file_error = 'Current document has been deleted';
                }
                $this->Flash->success(__('The image has been deleted.'));
            } else {
                $this->Flash->error(__('The image could not be deleted. Please, try again.'));
            }

            return $this->redirect(['controller' => 'Admins', 'action' => 'viewimages', $image->property_id]);
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id Admin id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function deleteuser($id = null) {
        //ensure admin is loggedin
        $admin = $this->Admins->find('all')->where(['user_id' => $this->Auth->user('id')])->first();

        if (!$admin) {
            $this->Flash->error('Please login to continue.');
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }
        $this->set('admin', $admin);
        //get users table
        $users_table = TableRegistry::get('Users');
        $this->request->allowMethod(['post', 'delete']);
        $user = $users_table->get($id);
        if ($users_table->delete($user)) {
            $this->Flash->success(__('The user account has been deleted successfully.'));
        } else {
            $this->Flash->error(__('The user account could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'viewusers']);
    }

    //admin method for creating a subscription for an agent
    public function createsubscrition() {
        //ensure admin is loggedin
        $admin = $this->Admins->find('all')->where(['user_id' => $this->Auth->user('id')])->first();

        if (!$admin) {
            $this->Flash->error('Please login to continue.');
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }
        $this->set('admin', $admin);
        //get users table
        $subscritions_table = TableRegistry::get('Subscriptions');
        $subscription = $subscritions_table->newEntity();
        if ($this->request->is('post')) {
            $enddate = new Time(str_replace('-', '', $this->request->getData('enddate')));
            $startdate = new Time(str_replace('-', '', $this->request->getData('startdate')));
            //ensure date is selected
            if ((date('Y', strtotime($startdate)) == '1970') || (date('y', strtotime($enddate)) == '1970')) {
                $this->Flash->error(__('Error, please select the start and end dates for this subscription.'));

                return $this->redirect(['action' => 'createsubscrition']);
            }
            $subscription = $subscritions_table->patchEntity($subscription, $this->request->getData());
            $subscription->startdate = Date('Y:m:d H:i:s', strtotime($startdate));
            $subscription->enddate = Date('Y:m:d H:i:s', strtotime($enddate));
            if ($subscritions_table->save($subscription)) {
                $this->Flash->success(__('The subscription has been created.'));

                return $this->redirect(['action' => 'allagents']);
            }
            $this->Flash->error(__('The subscription could not be created. Please, try again.'));
        }
        $plans = $subscritions_table->Plans->find('list', ['limit' => 20]);
        $agents = $subscritions_table->Agents->find('list', ['limit' => 20000])->order(['fullname' => 'DESC']);
        $this->set(compact('subscription', 'plans', 'agents'));
        $this->set('_serialize', ['subscription']);

        $this->viewBuilder()->layout('adminbackend');
    }

}
