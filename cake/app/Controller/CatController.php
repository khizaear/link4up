<?php

class CatController extends AppController {
	

	var $uses=array('cat','subcat','precat','prods');
	var $scaffold;

	public function  getcat(){
		
		$this->autoRender=false;
		$this->cat->recursive=2;
		$data=$this->cat->find('all');		
		echo json_encode($data);
		//echo "<pre>" .pr($data);
	}
	
	public function getprods($id=1){
		$this->autoRender=false;
		$this->prods->recursive=-1;
		$data=$this->prods->find('all',array('conditions'=>array('prod_cat_id' => $id)));
		echo json_encode($data);
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
