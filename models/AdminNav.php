<?php
namespace dashboard\models;

class AdminNav extends \lithium\data\Model {
	
	protected $_schema = array(
		'_id' => array('type' => 'id'),
		'parent' => array('type' => 'id', 'null' => true),
		'hierarchy' => array('type' => 'string', 'array' => 'true', 'null' => true),
		'title' => array('type' => 'string', 'null' => false),
		'link' => array('type' => 'boolean', 'default' => true, 'null' => false),
		'ctrl' => array('type'=>'string', 'null' => true),
		'act' => array ('type' => 'string', 'null' => true),
		'weight' => array('type'=>'integer', 'default' => 10, 'null' => false),
	);
}
?>