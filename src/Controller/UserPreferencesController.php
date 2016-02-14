<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * UserPreferences Controller
 *
 * @property \App\Model\Table\UserPreferencesTable $UserPreferences
 */
class UserPreferencesController extends AppController
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
        $userPreferences = $this->paginate($this->UserPreferences);

        $this->set(compact('userPreferences'));
        $this->set('_serialize', ['userPreferences']);
    }

    /**
     * View method
     *
     * @param string|null $id User Preference id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $userPreference = $this->UserPreferences->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('userPreference', $userPreference);
        $this->set('_serialize', ['userPreference']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $userPreference = $this->UserPreferences->newEntity();
        if ($this->request->is('post')) {
            $userPreference = $this->UserPreferences->patchEntity($userPreference, $this->request->data);
            if ($this->UserPreferences->save($userPreference)) {
                $this->Flash->success(__('The user preference has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user preference could not be saved. Please, try again.'));
            }
        }
        $users = $this->UserPreferences->Users->find('list', ['limit' => 200]);
        $this->set(compact('userPreference', 'users'));
        $this->set('_serialize', ['userPreference']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User Preference id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $userPreference = $this->UserPreferences->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $userPreference = $this->UserPreferences->patchEntity($userPreference, $this->request->data);
            if ($this->UserPreferences->save($userPreference)) {
                $this->Flash->success(__('The user preference has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user preference could not be saved. Please, try again.'));
            }
        }
        $users = $this->UserPreferences->Users->find('list', ['limit' => 200]);
        $this->set(compact('userPreference', 'users'));
        $this->set('_serialize', ['userPreference']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User Preference id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $userPreference = $this->UserPreferences->get($id);
        if ($this->UserPreferences->delete($userPreference)) {
            $this->Flash->success(__('The user preference has been deleted.'));
        } else {
            $this->Flash->error(__('The user preference could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
