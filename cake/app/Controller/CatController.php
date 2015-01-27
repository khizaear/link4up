<?php

class CatController extends AppController {
	

	var $uses=array('cat','subcat','precat');
	var $scaffold;

	public function  getcat(){
		
		$this->autoRender=false;
		$this->cat->recursive=2;
		$data=$this->cat->find('all');		
		echo json_encode($data);
		//echo "<pre>" .pr($data);
	}
}
