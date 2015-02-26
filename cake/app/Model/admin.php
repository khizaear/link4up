<?php

class admin extends Model {
	
	var $displayField ="admin_name";
	 var $useTable = 'admin';
	 var $primaryKey = 'admin_id';
	 //var $hasMany = array('subcat' => array('className'    => 'subcat','foreignKey'   => 'subcat_cat_id'));
}
