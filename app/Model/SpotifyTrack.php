<?php
App::uses('AppModel', 'Model');
/**
 * SpotifyTrack Model
 *
 * @property User $User
 */
class SpotifyTrack extends AppModel {
/**
 * Validation rules
 *
 * @var array
 */
	var $useTable = false;

	public $validate = array(
		'artist' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
}
