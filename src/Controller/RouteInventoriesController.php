<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * RouteInventories Controller
 *
 * @property \App\Model\Table\RouteInventoriesTable $RouteInventories
 */
class RouteInventoriesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Routes', 'Items', 'Grades']
        ];
        $routeInventories = $this->paginate($this->RouteInventories);

        $this->set(compact('routeInventories'));
        $this->set('_serialize', ['routeInventories']);
    }

    /**
     * View method
     *
     * @param string|null $id Route Inventory id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $routeInventory = $this->RouteInventories->get($id, [
            'contain' => ['Users', 'Routes', 'Items', 'Grades']
        ]);

        $this->set('routeInventory', $routeInventory);
        $this->set('_serialize', ['routeInventory']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $routeInventory = $this->RouteInventories->newEntity();
        if ($this->request->is('post')) {
            $routeInventory = $this->RouteInventories->patchEntity($routeInventory, $this->request->data);
            if ($this->RouteInventories->save($routeInventory)) {
                $this->Flash->success(__('The route inventory has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The route inventory could not be saved. Please, try again.'));
            }
        }
        $users = $this->RouteInventories->Users->find('list', ['limit' => 200]);
        $routes = $this->RouteInventories->Routes->find('list', ['limit' => 200]);
        $items = $this->RouteInventories->Items->find('list', ['limit' => 200]);
        $grades = $this->RouteInventories->Grades->find('list', ['limit' => 200]);
        $this->set(compact('routeInventory', 'users', 'routes', 'items', 'grades'));
        $this->set('_serialize', ['routeInventory']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Route Inventory id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $routeInventory = $this->RouteInventories->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $routeInventory = $this->RouteInventories->patchEntity($routeInventory, $this->request->data);
            if ($this->RouteInventories->save($routeInventory)) {
                $this->Flash->success(__('The route inventory has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The route inventory could not be saved. Please, try again.'));
            }
        }
        $users = $this->RouteInventories->Users->find('list', ['limit' => 200]);
        $routes = $this->RouteInventories->Routes->find('list', ['limit' => 200]);
        $items = $this->RouteInventories->Items->find('list', ['limit' => 200]);
        $grades = $this->RouteInventories->Grades->find('list', ['limit' => 200]);
        $this->set(compact('routeInventory', 'users', 'routes', 'items', 'grades'));
        $this->set('_serialize', ['routeInventory']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Route Inventory id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $routeInventory = $this->RouteInventories->get($id);
        if ($this->RouteInventories->delete($routeInventory)) {
            $this->Flash->success(__('The route inventory has been deleted.'));
        } else {
            $this->Flash->error(__('The route inventory could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
