<?php
App::uses('AppController', 'Controller');
/**
 * Votes Controller
 *
 * @property Vote $Vote
 */
class VotesController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Vote->recursive = 0;
		$this->set('votes', $this->paginate());
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {

		$this->layout = 'ajax';
		
		if(isset($_SERVER['REMOTE_USER'])) {
			$user = $_SERVER['REMOTE_USER'];
		} else {
			$user = 'Undefined';
		}

		if ($this->request->is('get')) {

			$trackId = $this->request->params['pass'][0];				

			// Create our data array
			$data = array(
				'Vote' => array(
					'track_id' => $trackId,
					'user' => $user,	
				)
			);

			$this->Vote->create();
		
			if($this->Vote->save($data)) {
				$this->set('status', 'success');
			} else {
				$this->set('status', $this->Vote->invalidFields());
			}
		} else {
			$this->set('status', 'error');
		}

	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Vote->id = $id;
		if (!$this->Vote->exists()) {
			throw new NotFoundException(__('Invalid vote'));
		}
		if ($this->Vote->delete()) {
			$this->Session->setFlash(__('Vote deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Vote was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
