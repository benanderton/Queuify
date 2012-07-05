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

	public function ajaxretrieve() {

		$this->layout = 'ajax';

		$this->Track->recursive = 0;
		$this->set('tracks', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function ajaxadd() {

		$this->layout = 'ajax';

		if ($this->request->is('post')) {

			// Create our data array
			$data = array(
				'Track' => array(
					'artist' => $this->request->data['artist'],
					'title' => $this->request->data['title'],
					'album' => $this->request->data['album'],
					'spotifyid' => $this->request->data['trackid'],
					'release_date' => $this->request->data['year'],					
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

	public function gettrack() {

		$this->layout = 'ajax';

		$items = $this->Track->find('all', array(
		    'conditions'=> array(
		        'Track.playing =' => 1,
		    )
		));

		foreach($items as $key => $val) {
			$this->Track->id = $val['Track']['id'];
			$this->Track->saveField('playing', 0);
		}

        $random = $this->Track->find('first', array(
            'order' => 'rand()',
            'conditions' => array('Track.played' => 0)
        ));

        if($random) {
			$data = array(
				'Track' => array(
					'id' => $random['Track']['id'],
					'played' => 1,	
					'playing' => 1,			
				)
			);

			$this->Track->save($data);
        } else {

			$random = $this->Track->find('first', array(
	            'order' => 'rand()',	            
	        ));        	

			$data = array(
				'Track' => array(
					'id' => $random['Track']['id'],
					'playing' => 1,			
				)
			);

			$this->Track->save($data);	        
        }

       	$this->set('json', $random['Track']);
	}

}
