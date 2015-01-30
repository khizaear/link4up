<?php

class SubcatController extends AppController {
	

	var $uses=array('cat','subcat');
	var $scaffold;
	var $ext=".html";
	public function getcats(){
		$this->autoRender=false;
		$categ=$this->cat->find('list');
		$html= "<select name='category' class='input'>";
		$html.="<option value='' selected>Select Category</option>";
		foreach($categ as $catkey=>$catval){
			$html.= "<option value='".$catkey."'>" .$catval ."</option>";
			/*$subcateg=$this->subcat->find('list',array('conditions'=>array('subcat_cat_id'=>$catkey)));
			foreach($subcateg as $subcategkey=>$subcategval){
				$html.= "<option value='".$subcategkey."'>&nbsp;&nbsp;&nbsp;&nbsp;".$subcategval."</option>";				
			} */
		}
		$html.= "</select>";
		//pr($subcat);
		return $html;
	}
		public function addsubcat(){
		if($_POST){
			$data['subcat_cat_id']=$_POST['category'];
			$data['subcat_name']=$_POST['precatname'];
			if($this->subcat->save($data)){
				echo "New Precategory Added ". $_POST['precatname'];
			}
		}
		$datas=$this->getcats();
		$this->set('datas',$datas);
		$this->render('/product/precat');

		
	}
}
