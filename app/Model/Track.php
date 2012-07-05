<?php
App::uses('AppModel', 'Model');
/**
 * Track Model
 *
 */
class Track extends AppModel {


	var $order = array('Track.playing' => 'DESC', 'Track.played' => 'ASC', 'Track.id' => 'DESC');

	
	/**
	 * Validation rules
	 *
	 * @var array
	 */
	public $validate = array(
		'artist' => array(
			'notempty' => array(
				'rule' => array('notempty'),
			),
		),
		'title' => array(
			'notempty' => array(
				'rule' => array('notempty'),
			),
		),
		'spotifyid' => array(
			'notempty' => array(
				'rule' => array('notempty'),
			),
			'rule' => array('limitTracks'),
			'message' => 'duplicate'			
		),
		'album' => array(
			'notempty' => array(
				'rule' => array('notempty'),
			),
		),
	);

	/**
	* Validation method to ensure each track is only added once.
	*/

	public function limitTracks($check) {

		$titleCount = $this->find('count', array(
		    'conditions' => $check,
		    'recursive' => -1
		));

		if($titleCount > 0) 
			return false;

		return true;
	}
}
