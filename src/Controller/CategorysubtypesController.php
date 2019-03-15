<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Categorysubtypes Controller
 *
 * @property \App\Model\Table\CategorysubtypesTable $Categorysubtypes
 *
 * @method \App\Model\Entity\Categorysubtype[] paginate($object = null, array $settings = [])
 */
class CategorysubtypesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['YuloCategorytype']
        ];
        $categorysubtypes = $this->paginate($this->Categorysubtypes);

        $this->set(compact('categorysubtypes'));
        $this->set('_serialize', ['categorysubtypes']);
    }

    /**
     * View method
     *
     * @param string|null $id Categorysubtype id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $categorysubtype = $this->Categorysubtypes->get($id, [
            'contain' => ['YuloCategorytype']
        ]);

        $this->set('categorysubtype', $categorysubtype);
        $this->set('_serialize', ['categorysubtype']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $categorysubtype = $this->Categorysubtypes->newEntity();
        if ($this->request->is('post')) {
            $categorysubtype = $this->Categorysubtypes->patchEntity($categorysubtype, $this->request->getData());
            if ($this->Categorysubtypes->save($categorysubtype)) {
                $this->Flash->success(__('The categorysubtype has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The categorysubtype could not be saved. Please, try again.'));
        }
        $yuloCategorytype = $this->Categorysubtypes->YuloCategorytype->find('list', ['limit' => 200]);
        $this->set(compact('categorysubtype', 'yuloCategorytype'));
        $this->set('_serialize', ['categorysubtype']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Categorysubtype id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $categorysubtype = $this->Categorysubtypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $categorysubtype = $this->Categorysubtypes->patchEntity($categorysubtype, $this->request->getData());
            if ($this->Categorysubtypes->save($categorysubtype)) {
                $this->Flash->success(__('The categorysubtype has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The categorysubtype could not be saved. Please, try again.'));
        }
        $yuloCategorytype = $this->Categorysubtypes->YuloCategorytype->find('list', ['limit' => 200]);
        $this->set(compact('categorysubtype', 'yuloCategorytype'));
        $this->set('_serialize', ['categorysubtype']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Categorysubtype id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $categorysubtype = $this->Categorysubtypes->get($id);
        if ($this->Categorysubtypes->delete($categorysubtype)) {
            $this->Flash->success(__('The categorysubtype has been deleted.'));
        } else {
            $this->Flash->error(__('The categorysubtype could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
