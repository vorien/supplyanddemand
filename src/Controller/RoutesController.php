<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Routes Controller
 *
 * @property \App\Model\Table\RoutesTable $Routes
 */
class RoutesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Regions', 'Locations']
        ];
        $routes = $this->paginate($this->Routes);

        $this->set(compact('routes'));
        $this->set('_serialize', ['routes']);
    }

    /**
     * View method
     *
     * @param string|null $id Route id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $route = $this->Routes->get($id, [
            'contain' => ['Users', 'Regions', 'Locations', 'Transports', 'RouteInventories', 'Steps']
        ]);

        $this->set('route', $route);
        $this->set('_serialize', ['route']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $route = $this->Routes->newEntity();
        if ($this->request->is('post')) {
            $route = $this->Routes->patchEntity($route, $this->request->data);
            if ($this->Routes->save($route)) {
                $this->Flash->success(__('The route has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The route could not be saved. Please, try again.'));
            }
        }
        $users = $this->Routes->Users->find('list', ['limit' => 200]);
        $regions = $this->Routes->Regions->find('list', ['limit' => 200]);
        $locations = $this->Routes->Locations->find('list', ['limit' => 200]);
        $transports = $this->Routes->Transports->find('list', ['limit' => 200]);
        $this->set(compact('route', 'users', 'regions', 'locations', 'transports'));
        $this->set('_serialize', ['route']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Route id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $route = $this->Routes->get($id, [
            'contain' => ['Transports']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $route = $this->Routes->patchEntity($route, $this->request->data);
            if ($this->Routes->save($route)) {
                $this->Flash->success(__('The route has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The route could not be saved. Please, try again.'));
            }
        }
        $users = $this->Routes->Users->find('list', ['limit' => 200]);
        $regions = $this->Routes->Regions->find('list', ['limit' => 200]);
        $locations = $this->Routes->Locations->find('list', ['limit' => 200]);
        $transports = $this->Routes->Transports->find('list', ['limit' => 200]);
        $this->set(compact('route', 'users', 'regions', 'locations', 'transports'));
        $this->set('_serialize', ['route']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Route id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $route = $this->Routes->get($id);
        if ($this->Routes->delete($route)) {
            $this->Flash->success(__('The route has been deleted.'));
        } else {
            $this->Flash->error(__('The route could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
