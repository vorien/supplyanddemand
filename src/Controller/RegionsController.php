<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Regions Controller
 *
 * @property \App\Model\Table\RegionsTable $Regions
 */
class RegionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $regions = $this->paginate($this->Regions);

        $this->set(compact('regions'));
        $this->set('_serialize', ['regions']);
    }

    /**
     * View method
     *
     * @param string|null $id Region id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $region = $this->Regions->get($id, [
            'contain' => ['Users', 'Locations', 'Routes']
        ]);

        $this->set('region', $region);
        $this->set('_serialize', ['region']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $region = $this->Regions->newEntity();
        if ($this->request->is('post')) {
            $region = $this->Regions->patchEntity($region, $this->request->data);
            if ($this->Regions->save($region)) {
                $this->Flash->success(__('The region has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The region could not be saved. Please, try again.'));
            }
        }
        $users = $this->Regions->Users->find('list', ['limit' => 200]);
        $this->set(compact('region', 'users'));
        $this->set('_serialize', ['region']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Region id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $region = $this->Regions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $region = $this->Regions->patchEntity($region, $this->request->data);
            if ($this->Regions->save($region)) {
                $this->Flash->success(__('The region has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The region could not be saved. Please, try again.'));
            }
        }
        $users = $this->Regions->Users->find('list', ['limit' => 200]);
        $this->set(compact('region', 'users'));
        $this->set('_serialize', ['region']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Region id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $region = $this->Regions->get($id);
        if ($this->Regions->delete($region)) {
            $this->Flash->success(__('The region has been deleted.'));
        } else {
            $this->Flash->error(__('The region could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
