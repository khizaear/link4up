<?php

class cat extends Model {
	
	var $displayField ="cat_name";
	 var $useTable = 'cat';
	 var $primaryKey = 'cat_id';
	 var $hasMany = array('subcat' => array('className'    => 'subcat','foreignKey'   => 'subcat_cat_id'));
}
