<?php

class precat extends Model {
	

	 var $useTable = 'precat';
	 var $displayField ="pre_catname";
	 var $primaryKey = 'precat_id';
	 var $belongsTo = array('subcat' => array('className'    => 'subcat','foreignKey'   => 'pre_subcat_id'));
	 var $hasMany = array('prods' => array('className'    => 'prods','foreignKey'   => 'prod_precat_id'));
}
