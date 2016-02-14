<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Alla Controller
 *
 * @property \App\Model\Table\AllaTable $Alla
 */
class AllaController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $alla = $this->paginate($this->Alla);

        $this->set(compact('alla'));
        $this->set('_serialize', ['alla']);
    }

    /**
     * View method
     *
     * @param string|null $id Alla id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $alla = $this->Alla->get($id, [
            'contain' => []
        ]);

        $this->set('alla', $alla);
        $this->set('_serialize', ['alla']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $alla = $this->Alla->newEntity();
        if ($this->request->is('post')) {
            $alla = $this->Alla->patchEntity($alla, $this->request->data);
            if ($this->Alla->save($alla)) {
                $this->Flash->success(__('The alla has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The alla could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('alla'));
        $this->set('_serialize', ['alla']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Alla id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $alla = $this->Alla->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $alla = $this->Alla->patchEntity($alla, $this->request->data);
            if ($this->Alla->save($alla)) {
                $this->Flash->success(__('The alla has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The alla could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('alla'));
        $this->set('_serialize', ['alla']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Alla id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $alla = $this->Alla->get($id);
        if ($this->Alla->delete($alla)) {
            $this->Flash->success(__('The alla has been deleted.'));
        } else {
            $this->Flash->error(__('The alla could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
