<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Bookmarks Controller
 *
 * @property \App\Model\Table\BookmarksTable $Bookmarks
 *
 * @method \App\Model\Entity\Bookmark[] paginate($object = null, array $settings = [])
 */
class BookmarksController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Properties']
        ];
        $bookmarks = $this->paginate($this->Bookmarks);

        $this->set(compact('bookmarks'));
        $this->set('_serialize', ['bookmarks']);
    }

    /**
     * View method
     *
     * @param string|null $id Bookmark id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $bookmark = $this->Bookmarks->get($id, [
            'contain' => ['Users', 'Properties']
        ]);

        $this->set('bookmark', $bookmark);
        $this->set('_serialize', ['bookmark']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
  public function add($userid, $propertyid)
    {
        $bookmark = $this->Bookmarks->newEntity();
        if ($this->request->is('post')) {
              //ensure has not bookmarked this property before
            $already_bookmarked =  $this->Bookmarks->find()
                    ->where(['user_id'=>$userid,'property_id'=>$propertyid])
                    ->first();
            if(empty($already_bookmarked)){ //this property has not yet been bookmarked by the user so bookmark it now
             $bookmark->user_id = $userid;
             $bookmark->property_id = $propertyid;
            // debug(json_encode($property, JSON_PRETTY_PRINT)); exit;
             $this->Bookmarks->save($bookmark);
             return json_encode($bookmark);
            }
            else{ //this property has already been bookmarked by this user
                return;
                
            }
             
        }
    }

    
    
    //user method for bookmarking a similar property added by chukwudi
     public function bookmarksimilarproperty($userid, $propertyid)
    {
        $bookmark = $this->Bookmarks->newEntity();
        if ($this->request->is('post')) {
            //ensure has not bookmarked this property before
            $already_bookmarked =  $this->Bookmarks->find()
                    ->where(['user_id'=>$userid,'property_id'=>$propertyid])
                    ->first();
            if(empty( $already_bookmarked)){ //this property has not yet been bookmarked by the user so bookmark it now
             $bookmark->user_id = $userid;
             $bookmark->property_id = $propertyid;
            // debug(json_encode($property, JSON_PRETTY_PRINT)); exit;
             $this->Bookmarks->save($bookmark);
             return json_encode($bookmark);
            }
            else{ //this property has already been bookmarked by this user
                return;
                
            }
             
        }
    }
    
    
    /**
     * Edit method
     *
     * @param string|null $id Bookmark id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $bookmark = $this->Bookmarks->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $bookmark = $this->Bookmarks->patchEntity($bookmark, $this->request->getData());
            if ($this->Bookmarks->save($bookmark)) {
                $this->Flash->success(__('The bookmark has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The bookmark could not be saved. Please, try again.'));
        }
        $users = $this->Bookmarks->Users->find('list', ['limit' => 200]);
        $properties = $this->Bookmarks->Properties->find('list', ['limit' => 200]);
        $this->set(compact('bookmark', 'users', 'properties'));
        $this->set('_serialize', ['bookmark']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Bookmark id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $bookmark = $this->Bookmarks->get($id);
        if ($this->Bookmarks->delete($bookmark)) {
            $this->Flash->success(__('The bookmark has been deleted.'));
        } else {
            $this->Flash->error(__('The bookmark could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
