<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Steps Controller
 *
 * @property \App\Model\Table\StepsTable $Steps
 */
class StepsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Routes', 'Locations']
        ];
        $steps = $this->paginate($this->Steps);

        $this->set(compact('steps'));
        $this->set('_serialize', ['steps']);
    }

    /**
     * View method
     *
     * @param string|null $id Step id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $step = $this->Steps->get($id, [
            'contain' => ['Users', 'Routes', 'Locations', 'Transfers']
        ]);

        $this->set('step', $step);
        $this->set('_serialize', ['step']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $step = $this->Steps->newEntity();
        if ($this->request->is('post')) {
            $step = $this->Steps->patchEntity($step, $this->request->data);
            if ($this->Steps->save($step)) {
                $this->Flash->success(__('The step has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The step could not be saved. Please, try again.'));
            }
        }
        $users = $this->Steps->Users->find('list', ['limit' => 200]);
        $routes = $this->Steps->Routes->find('list', ['limit' => 200]);
        $locations = $this->Steps->Locations->find('list', ['limit' => 200]);
        $this->set(compact('step', 'users', 'routes', 'locations'));
        $this->set('_serialize', ['step']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Step id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $step = $this->Steps->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $step = $this->Steps->patchEntity($step, $this->request->data);
            if ($this->Steps->save($step)) {
                $this->Flash->success(__('The step has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The step could not be saved. Please, try again.'));
            }
        }
        $users = $this->Steps->Users->find('list', ['limit' => 200]);
        $routes = $this->Steps->Routes->find('list', ['limit' => 200]);
        $locations = $this->Steps->Locations->find('list', ['limit' => 200]);
        $this->set(compact('step', 'users', 'routes', 'locations'));
        $this->set('_serialize', ['step']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Step id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $step = $this->Steps->get($id);
        if ($this->Steps->delete($step)) {
            $this->Flash->success(__('The step has been deleted.'));
        } else {
            $this->Flash->error(__('The step could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
