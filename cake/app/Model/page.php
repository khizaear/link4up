<?php

class page extends Model {
	
	var $displayField ="page_name";
	var $useTable = 'pages';
	var $primaryKey = 'page_id';
	//var $belongsTo = array('cat' => array('className'    => 'cat','foreignKey'   => 'con_cat_id'));
}
