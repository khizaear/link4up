<?php

class content extends Model {
	
	var $displayField ="con_id";
	var $useTable = 'contents';
	var $primaryKey = 'con_id';
	var $belongsTo = array('cat' => array('className'    => 'cat','foreignKey'   => 'con_cat_id'));
}
