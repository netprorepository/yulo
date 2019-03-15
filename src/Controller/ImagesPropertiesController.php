<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ImagesProperties Controller
 *
 * @property \App\Model\Table\ImagesPropertiesTable $ImagesProperties
 *
 * @method \App\Model\Entity\ImagesProperty[] paginate($object = null, array $settings = [])
 */
class ImagesPropertiesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Images', 'Properties']
        ];
        $imagesProperties = $this->paginate($this->ImagesProperties);

        $this->set(compact('imagesProperties'));
        $this->set('_serialize', ['imagesProperties']);
    }

    /**
     * View method
     *
     * @param string|null $id Images Property id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $imagesProperty = $this->ImagesProperties->get($id, [
            'contain' => ['Images', 'Properties']
        ]);

        $this->set('imagesProperty', $imagesProperty);
        $this->set('_serialize', ['imagesProperty']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $imagesProperty = $this->ImagesProperties->newEntity();
        if ($this->request->is('post')) {
            $imagesProperty = $this->ImagesProperties->patchEntity($imagesProperty, $this->request->getData());
            if ($this->ImagesProperties->save($imagesProperty)) {
                $this->Flash->success(__('The images property has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The images property could not be saved. Please, try again.'));
        }
        $images = $this->ImagesProperties->Images->find('list', ['limit' => 200]);
        $properties = $this->ImagesProperties->Properties->find('list', ['limit' => 200]);
        $this->set(compact('imagesProperty', 'images', 'properties'));
        $this->set('_serialize', ['imagesProperty']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Images Property id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $imagesProperty = $this->ImagesProperties->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $imagesProperty = $this->ImagesProperties->patchEntity($imagesProperty, $this->request->getData());
            if ($this->ImagesProperties->save($imagesProperty)) {
                $this->Flash->success(__('The images property has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The images property could not be saved. Please, try again.'));
        }
        $images = $this->ImagesProperties->Images->find('list', ['limit' => 200]);
        $properties = $this->ImagesProperties->Properties->find('list', ['limit' => 200]);
        $this->set(compact('imagesProperty', 'images', 'properties'));
        $this->set('_serialize', ['imagesProperty']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Images Property id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $imagesProperty = $this->ImagesProperties->get($id);
        if ($this->ImagesProperties->delete($imagesProperty)) {
            $this->Flash->success(__('The images property has been deleted.'));
        } else {
            $this->Flash->error(__('The images property could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
