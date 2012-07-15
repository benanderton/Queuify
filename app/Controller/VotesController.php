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

		if ($this->request->is('get')) {

			$trackId = $this->request->params['pass'][0];				

			// Create our data array
			$data = array(
				'Vote' => array(
					'track_id' => $trackId,
					'user' => $this->getUser(),	
				)
			);

			$this->Vote->create();
		
			if($this->Vote->save($data)) {

				$voteCount = $this->Vote->find('count', array(
					'conditions' => array('Vote.track_id' => $trackId)
					));

				if($voteCount >= 3) {

					$this->loadModel('Track');

					$data = array(
						'Track' => array(
							'id' => $trackId,
							'voted_down' => 1,			
						)
					);

					$this->Track->save($data);	

				}


				$this->set('status', 'success');
			} else {
				$this->set('status', $this->Vote->invalidFields());
			}
		} else {
			$this->set('status', 'error');
		}

	}

}
