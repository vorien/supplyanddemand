<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * RoutesTransports Controller
 *
 * @property \App\Model\Table\RoutesTransportsTable $RoutesTransports
 */
class RoutesTransportsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Routes', 'Transports']
        ];
        $routesTransports = $this->paginate($this->RoutesTransports);

        $this->set(compact('routesTransports'));
        $this->set('_serialize', ['routesTransports']);
    }

    /**
     * View method
     *
     * @param string|null $id Routes Transport id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $routesTransport = $this->RoutesTransports->get($id, [
            'contain' => ['Users', 'Routes', 'Transports']
        ]);

        $this->set('routesTransport', $routesTransport);
        $this->set('_serialize', ['routesTransport']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $routesTransport = $this->RoutesTransports->newEntity();
        if ($this->request->is('post')) {
            $routesTransport = $this->RoutesTransports->patchEntity($routesTransport, $this->request->data);
            if ($this->RoutesTransports->save($routesTransport)) {
                $this->Flash->success(__('The routes transport has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The routes transport could not be saved. Please, try again.'));
            }
        }
        $users = $this->RoutesTransports->Users->find('list', ['limit' => 200]);
        $routes = $this->RoutesTransports->Routes->find('list', ['limit' => 200]);
        $transports = $this->RoutesTransports->Transports->find('list', ['limit' => 200]);
        $this->set(compact('routesTransport', 'users', 'routes', 'transports'));
        $this->set('_serialize', ['routesTransport']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Routes Transport id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $routesTransport = $this->RoutesTransports->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $routesTransport = $this->RoutesTransports->patchEntity($routesTransport, $this->request->data);
            if ($this->RoutesTransports->save($routesTransport)) {
                $this->Flash->success(__('The routes transport has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The routes transport could not be saved. Please, try again.'));
            }
        }
        $users = $this->RoutesTransports->Users->find('list', ['limit' => 200]);
        $routes = $this->RoutesTransports->Routes->find('list', ['limit' => 200]);
        $transports = $this->RoutesTransports->Transports->find('list', ['limit' => 200]);
        $this->set(compact('routesTransport', 'users', 'routes', 'transports'));
        $this->set('_serialize', ['routesTransport']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Routes Transport id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $routesTransport = $this->RoutesTransports->get($id);
        if ($this->RoutesTransports->delete($routesTransport)) {
            $this->Flash->success(__('The routes transport has been deleted.'));
        } else {
            $this->Flash->error(__('The routes transport could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
