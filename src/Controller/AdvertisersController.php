<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Advertisers Controller
 *
 * @property \App\Model\Table\AdvertisersTable $Advertisers
 *
 * @method \App\Model\Entity\Advertiser[] paginate($object = null, array $settings = [])
 */
class AdvertisersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $advertisers = $this->paginate($this->Advertisers);

        $this->set(compact('advertisers'));
        $this->set('_serialize', ['advertisers']);
    }

    /**
     * View method
     *
     * @param string|null $id Advertiser id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $advertiser = $this->Advertisers->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('advertiser', $advertiser);
        $this->set('_serialize', ['advertiser']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $advertiser = $this->Advertisers->newEntity();
        if ($this->request->is('post')) {
            $advertiser = $this->Advertisers->patchEntity($advertiser, $this->request->getData());
            if ($this->Advertisers->save($advertiser)) {
                $this->Flash->success(__('The advertiser has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The advertiser could not be saved. Please, try again.'));
        }
        $users = $this->Advertisers->Users->find('list', ['limit' => 200]);
        $this->set(compact('advertiser', 'users'));
        $this->set('_serialize', ['advertiser']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Advertiser id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $advertiser = $this->Advertisers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $advertiser = $this->Advertisers->patchEntity($advertiser, $this->request->getData());
            if ($this->Advertisers->save($advertiser)) {
                $this->Flash->success(__('The advertiser has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The advertiser could not be saved. Please, try again.'));
        }
        $users = $this->Advertisers->Users->find('list', ['limit' => 200]);
        $this->set(compact('advertiser', 'users'));
        $this->set('_serialize', ['advertiser']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Advertiser id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $advertiser = $this->Advertisers->get($id);
        if ($this->Advertisers->delete($advertiser)) {
            $this->Flash->success(__('The advertiser has been deleted.'));
        } else {
            $this->Flash->error(__('The advertiser could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
