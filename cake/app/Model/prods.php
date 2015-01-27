<?php

class prods extends Model {
	var $name="prods";
	 var $displayField ="prod_title";
	 var $useTable = 'product';
	 var $primaryKey = 'prod_id';
	 var $belongsTo = array('precat' => array('className'    => 'precat','foreignKey'   => 'prod_precat_id'));
	 //var $hasMany = array('precat' => array('className'    => 'precat','foreignKey'   => 'pre_subcat_id'));
}
