<?php

class subcat extends Model {
	var $name="subcat";
	 var $displayField ="subcat_name";
	 var $useTable = 'subcat';
	 var $primaryKey = 'subcat_id';
	 var $belongsTo = array('cat' => array('className'    => 'cat','foreignKey'   => 'subcat_cat_id'));
	 var $hasMany = array('precat' => array('className'    => 'precat','foreignKey'   => 'pre_subcat_id'));
}
