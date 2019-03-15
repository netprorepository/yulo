<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Categorytypes Controller
 *
 * @property \App\Model\Table\CategorytypesTable $Categorytypes
 *
 * @method \App\Model\Entity\Categorytype[] paginate($object = null, array $settings = [])
 */
class CategorytypesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Categories']
        ];
        $categorytypes = $this->paginate($this->Categorytypes);

        $this->set(compact('categorytypes'));
        $this->set('_serialize', ['categorytypes']);
    }

    /**
     * View method
     *
     * @param string|null $id Categorytype id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $categorytype = $this->Categorytypes->get($id, [
            'contain' => ['Categories']
        ]);

        $this->set('categorytype', $categorytype);
        $this->set('_serialize', ['categorytype']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $categorytype = $this->Categorytypes->newEntity();
        if ($this->request->is('post')) {
            $categorytype = $this->Categorytypes->patchEntity($categorytype, $this->request->getData());
            if ($this->Categorytypes->save($categorytype)) {
                $this->Flash->success(__('The categorytype has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The categorytype could not be saved. Please, try again.'));
        }
        $categories = $this->Categorytypes->Categories->find('list', ['limit' => 200]);
        $this->set(compact('categorytype', 'categories'));
        $this->set('_serialize', ['categorytype']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Categorytype id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $categorytype = $this->Categorytypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $categorytype = $this->Categorytypes->patchEntity($categorytype, $this->request->getData());
            if ($this->Categorytypes->save($categorytype)) {
                $this->Flash->success(__('The categorytype has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The categorytype could not be saved. Please, try again.'));
        }
        $categories = $this->Categorytypes->Categories->find('list', ['limit' => 200]);
        $this->set(compact('categorytype', 'categories'));
        $this->set('_serialize', ['categorytype']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Categorytype id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $categorytype = $this->Categorytypes->get($id);
        if ($this->Categorytypes->delete($categorytype)) {
            $this->Flash->success(__('The categorytype has been deleted.'));
        } else {
            $this->Flash->error(__('The categorytype could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
