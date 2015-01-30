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
	
	public function getcats(){
		$this->autoRender=false;
		$categ=$this->cat->find('list');
		$html= "<select name='category' class='input'>";
		$html.="<option value='' selected>Select Category</option>";
		foreach($categ as $catkey=>$catval){
			$html.= "<option value='".$catkey."'>" .$catval ."</option>";
		}
		$html.= "</select>";
		//pr($subcat);
		return $html;
	}
}
