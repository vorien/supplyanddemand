<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Transfers Controller
 *
 * @property \App\Model\Table\TransfersTable $Transfers
 */
class TransfersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Steps', 'Locations', 'Items', 'Grades']
        ];
        $transfers = $this->paginate($this->Transfers);

        $this->set(compact('transfers'));
        $this->set('_serialize', ['transfers']);
    }

    /**
     * View method
     *
     * @param string|null $id Transfer id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $transfer = $this->Transfers->get($id, [
            'contain' => ['Users', 'Steps', 'Locations', 'Items', 'Grades']
        ]);

        $this->set('transfer', $transfer);
        $this->set('_serialize', ['transfer']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $transfer = $this->Transfers->newEntity();
        if ($this->request->is('post')) {
            $transfer = $this->Transfers->patchEntity($transfer, $this->request->data);
            if ($this->Transfers->save($transfer)) {
                $this->Flash->success(__('The transfer has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The transfer could not be saved. Please, try again.'));
            }
        }
        $users = $this->Transfers->Users->find('list', ['limit' => 200]);
        $steps = $this->Transfers->Steps->find('list', ['limit' => 200]);
        $locations = $this->Transfers->Locations->find('list', ['limit' => 200]);
        $items = $this->Transfers->Items->find('list', ['limit' => 200]);
        $grades = $this->Transfers->Grades->find('list', ['limit' => 200]);
        $this->set(compact('transfer', 'users', 'steps', 'locations', 'items', 'grades'));
        $this->set('_serialize', ['transfer']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Transfer id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $transfer = $this->Transfers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $transfer = $this->Transfers->patchEntity($transfer, $this->request->data);
            if ($this->Transfers->save($transfer)) {
                $this->Flash->success(__('The transfer has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The transfer could not be saved. Please, try again.'));
            }
        }
        $users = $this->Transfers->Users->find('list', ['limit' => 200]);
        $steps = $this->Transfers->Steps->find('list', ['limit' => 200]);
        $locations = $this->Transfers->Locations->find('list', ['limit' => 200]);
        $items = $this->Transfers->Items->find('list', ['limit' => 200]);
        $grades = $this->Transfers->Grades->find('list', ['limit' => 200]);
        $this->set(compact('transfer', 'users', 'steps', 'locations', 'items', 'grades'));
        $this->set('_serialize', ['transfer']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Transfer id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $transfer = $this->Transfers->get($id);
        if ($this->Transfers->delete($transfer)) {
            $this->Flash->success(__('The transfer has been deleted.'));
        } else {
            $this->Flash->error(__('The transfer could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
