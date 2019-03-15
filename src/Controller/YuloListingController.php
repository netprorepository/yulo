<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * YuloListing Controller
 *
 * @property \App\Model\Table\YuloListingTable $YuloListing
 *
 * @method \App\Model\Entity\YuloListing[] paginate($object = null, array $settings = [])
 */
class YuloListingController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Listings']
        ];
        $yuloListing = $this->paginate($this->YuloListing);

        $this->set(compact('yuloListing'));
        $this->set('_serialize', ['yuloListing']);
    }

    /**
     * View method
     *
     * @param string|null $id Yulo Listing id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $yuloListing = $this->YuloListing->get($id, [
            'contain' => ['Listings']
        ]);

        $this->set('yuloListing', $yuloListing);
        $this->set('_serialize', ['yuloListing']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $yuloListing = $this->YuloListing->newEntity();
        if ($this->request->is('post')) {
            $yuloListing = $this->YuloListing->patchEntity($yuloListing, $this->request->getData());
            if ($this->YuloListing->save($yuloListing)) {
                $this->Flash->success(__('The yulo listing has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The yulo listing could not be saved. Please, try again.'));
        }
        $listings = $this->YuloListing->Listings->find('list', ['limit' => 200]);
        $this->set(compact('yuloListing', 'listings'));
        $this->set('_serialize', ['yuloListing']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Yulo Listing id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $yuloListing = $this->YuloListing->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $yuloListing = $this->YuloListing->patchEntity($yuloListing, $this->request->getData());
            if ($this->YuloListing->save($yuloListing)) {
                $this->Flash->success(__('The yulo listing has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The yulo listing could not be saved. Please, try again.'));
        }
        $listings = $this->YuloListing->Listings->find('list', ['limit' => 200]);
        $this->set(compact('yuloListing', 'listings'));
        $this->set('_serialize', ['yuloListing']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Yulo Listing id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $yuloListing = $this->YuloListing->get($id);
        if ($this->YuloListing->delete($yuloListing)) {
            $this->Flash->success(__('The yulo listing has been deleted.'));
        } else {
            $this->Flash->error(__('The yulo listing could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
