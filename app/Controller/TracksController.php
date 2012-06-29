<?php
App::uses('AppController', 'Controller');
/**
 * Tracks Controller
 *
 * @property Track $Track
 */
class TracksController extends AppController {

public $helpers = array('Js' => array('Jquery'));

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Track->recursive = 0;
		$this->set('tracks', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Track->id = $id;
		if (!$this->Track->exists()) {
			throw new NotFoundException(__('Invalid track'));
		}
		$this->set('track', $this->Track->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Track->create();
			if ($this->Track->save($this->request->data)) {
				$this->Session->setFlash(__('The track has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The track could not be saved. Please, try again.'));
			}
		}
		$users = $this->Track->User->find('list');
		$this->set(compact('users'));
	}

	public function ajaxadd() {

		$this->layout = 'ajax';

		if ($this->request->is('post')) {

			// Create our data array
			$data = array(
				'Track' => array(
					'artist' => 'test artist',
					'title' => $this->request->data['trackid'],
					'album' => 'Test album',
				)
			);

			$this->Track->create();
		
			if($this->Track->save($data)) {
				$this->set('status', 'success');
			} else {
				$this->set('status', $this->Track->invalidFields());
			}

		} else {
			$this->set('status', 'error');
		}
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Track->id = $id;
		if (!$this->Track->exists()) {
			throw new NotFoundException(__('Invalid track'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Track->save($this->request->data)) {
				$this->Session->setFlash(__('The track has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The track could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Track->read(null, $id);
		}
		$users = $this->Track->User->find('list');
		$this->set(compact('users'));
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
		$this->Track->id = $id;
		if (!$this->Track->exists()) {
			throw new NotFoundException(__('Invalid track'));
		}
		if ($this->Track->delete()) {
			$this->Session->setFlash(__('Track deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Track was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
