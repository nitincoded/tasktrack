<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Network\Exception\NotAcceptableException;

/**
 * Tickets Controller
 *
 * @property \App\Model\Table\TicketsTable $Tickets
 */
class TicketsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Projects', 'Sites', 'Types', 'Statuses', 'Milestones']
        ];
        $tickets = $this->paginate($this->Tickets);

        $this->set(compact('tickets'));
        $this->set('_serialize', ['tickets']);
    }

    /**
     * View method
     *
     * @param string|null $id Ticket id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ticket = $this->Tickets->get($id, [
            'contain' => ['Projects', 'Sites', 'Types', 'Statuses', 'Milestones']
        ]);

        $this->set('ticket', $ticket);
        $this->set('_serialize', ['ticket']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ticket = $this->Tickets->newEntity();
        if ($this->request->is('post')) {
            $ticket = $this->Tickets->patchEntity($ticket, $this->request->data);

	$types_full = $this->Tickets->Types->find('all')->all()->toArray();
for ($i=0; $i<count($types_full); $i++) {
 if ($this->request->data['type_id'] == $types_full[$i]['id']) {
    if ($types_full[$i]['is_site_needed'] && $this->request->data['site_id']=='') {
throw new NotAcceptableException("Site must be selected for this ticket type");
    }
    if ($types_full[$i]['is_project_needed'] && $this->request->data['project_id']=='') {
throw new NotAcceptableException("Project must be selected for this ticket type");
    }
  }
}
            if ($this->Tickets->save($ticket)) {
                $this->Flash->success(__('The ticket has been saved.' )); //.var_export($this->request->data, TRUE) ));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The ticket could not be saved. Please, try again.'));
            }
        }
        $projects = $this->Tickets->Projects->find('list', ['limit' => 200]);
        $sites = $this->Tickets->Sites->find('list', ['limit' => 200]);
        $types = $this->Tickets->Types->find('list', ['limit' => 200]);
        $statuses = $this->Tickets->Statuses->find('list', ['limit' => 200]);
        $milestones = $this->Tickets->Milestones->find('list', ['limit' => 200]);

	$types_full = $this->Tickets->Types->find('all')->all()->toArray();

        $this->set(compact('ticket', 'projects', 'sites', 'types', 'statuses', 'milestones', 'types_full'));
        $this->set('_serialize', ['ticket']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Ticket id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ticket = $this->Tickets->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ticket = $this->Tickets->patchEntity($ticket, $this->request->data);

	$types_full = $this->Tickets->Types->find('all')->all()->toArray();
for ($i=0; $i<count($types_full); $i++) {
 if ($this->request->data['type_id'] == $types_full[$i]['id']) {
    if ($types_full[$i]['is_site_needed'] && $this->request->data['site_id']=='') {
throw new NotAcceptableException("Site must be selected for this ticket type");
    }
    if ($types_full[$i]['is_project_needed'] && $this->request->data['project_id']=='') {
throw new NotAcceptableException("Project must be selected for this ticket type");
    }
  }
}
            if ($this->Tickets->save($ticket)) {
                $this->Flash->success(__('The ticket has been saved.' )); //.var_export($this->request->data, TRUE).'TTT' ));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The ticket could not be saved. Please, try again.'));
            }
        }
        $projects = $this->Tickets->Projects->find('list', ['limit' => 200]);
        $sites = $this->Tickets->Sites->find('list', ['limit' => 200]);
        $types = $this->Tickets->Types->find('list', ['limit' => 200]);
        $statuses = $this->Tickets->Statuses->find('list', ['limit' => 200]);
        $milestones = $this->Tickets->Milestones->find('list', ['limit' => 200]);
        $this->set(compact('ticket', 'projects', 'sites', 'types', 'statuses', 'milestones'));
        $this->set('_serialize', ['ticket']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Ticket id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ticket = $this->Tickets->get($id);
        if ($this->Tickets->delete($ticket)) {
            $this->Flash->success(__('The ticket has been deleted.'));
        } else {
            $this->Flash->error(__('The ticket could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
