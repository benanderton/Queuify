<?php
App::uses('AppModel', 'Model');
/**
 * Vote Model
 *
 * @property Track $Track
 */
class Vote extends AppModel {
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'track_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'rule' => array('limitVotes'),
			'message' => 'duplicate'			
		),
		'user' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),				
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Track' => array(
			'className' => 'Track',
			'foreignKey' => 'track_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	/**
	* Validation method to ensure each track is only added once.
	*/

	public function limitVotes($check) {


		if(isset($_SERVER['REMOTE_USER'])) {
			$user = $_SERVER['REMOTE_USER'];
		} else {
			$user = 'Undefined';
		}

		$check['user'] = $user;

		$voteCount = $this->find('count', array(
		    'conditions' => $check,
		    'recursive' => -1
		));


		if($voteCount > 0) 
			return false;

		return true;
	}
}
