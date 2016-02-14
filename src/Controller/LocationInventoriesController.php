<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * LocationInventories Controller
 *
 * @property \App\Model\Table\LocationInventoriesTable $LocationInventories
 */
class LocationInventoriesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Locations', 'Items', 'Grades']
        ];
        $locationInventories = $this->paginate($this->LocationInventories);

        $this->set(compact('locationInventories'));
        $this->set('_serialize', ['locationInventories']);
    }

    /**
     * View method
     *
     * @param string|null $id Location Inventory id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $locationInventory = $this->LocationInventories->get($id, [
            'contain' => ['Users', 'Locations', 'Items', 'Grades']
        ]);

        $this->set('locationInventory', $locationInventory);
        $this->set('_serialize', ['locationInventory']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $locationInventory = $this->LocationInventories->newEntity();
        if ($this->request->is('post')) {
            $locationInventory = $this->LocationInventories->patchEntity($locationInventory, $this->request->data);
            if ($this->LocationInventories->save($locationInventory)) {
                $this->Flash->success(__('The location inventory has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The location inventory could not be saved. Please, try again.'));
            }
        }
        $users = $this->LocationInventories->Users->find('list', ['limit' => 200]);
        $locations = $this->LocationInventories->Locations->find('list', ['limit' => 200]);
        $items = $this->LocationInventories->Items->find('list', ['limit' => 200]);
        $grades = $this->LocationInventories->Grades->find('list', ['limit' => 200]);
        $this->set(compact('locationInventory', 'users', 'locations', 'items', 'grades'));
        $this->set('_serialize', ['locationInventory']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Location Inventory id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $locationInventory = $this->LocationInventories->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $locationInventory = $this->LocationInventories->patchEntity($locationInventory, $this->request->data);
            if ($this->LocationInventories->save($locationInventory)) {
                $this->Flash->success(__('The location inventory has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The location inventory could not be saved. Please, try again.'));
            }
        }
        $users = $this->LocationInventories->Users->find('list', ['limit' => 200]);
        $locations = $this->LocationInventories->Locations->find('list', ['limit' => 200]);
        $items = $this->LocationInventories->Items->find('list', ['limit' => 200]);
        $grades = $this->LocationInventories->Grades->find('list', ['limit' => 200]);
        $this->set(compact('locationInventory', 'users', 'locations', 'items', 'grades'));
        $this->set('_serialize', ['locationInventory']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Location Inventory id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $locationInventory = $this->LocationInventories->get($id);
        if ($this->LocationInventories->delete($locationInventory)) {
            $this->Flash->success(__('The location inventory has been deleted.'));
        } else {
            $this->Flash->error(__('The location inventory could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
