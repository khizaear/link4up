<?php

class PrecatController extends AppController {
	
	var $name="precat";
	var $uses=array('precat','prods','cat','subcat');
	var $scaffold;
	var $ext=".html";

	
	public function getcats(){
		$this->autoRender=false;
		$categ=$this->cat->find('list');
		$html= "<select name='category' class='input' required>";
		$html.="<option value='' selected>Select Category</option>";
		foreach($categ as $catkey=>$catval){
			$html.= "<option value='".$catkey."' disabled>" .$catval ."</option>";
			$subcateg=$this->subcat->find('list',array('conditions'=>array('subcat_cat_id'=>$catkey)));
			foreach($subcateg as $subcategkey=>$subcategval){
				$html.= "<option value='".$subcategkey."' >&nbsp;&nbsp;&nbsp;&nbsp;".$subcategval."</option>";
				/*$precateg=$this->precat->find('list',array('conditions'=>array('pre_subcat_id'=>$subcategkey)));
				foreach($precateg as $precatkey=>$precatval){
					$html.= "<option value='".$precatkey."' >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$precatval."</option>";
				} */
			}
		}
		$html.= "</select>";
		//pr($subcat);
		return $html;
	}
	
	public function addprecat(){
		if($_POST){
			$data['pre_subcat_id']=$_POST['category'];
			$data['pre_catname']=$_POST['precatname'];
			if($this->precat->save($data)){
				echo "New Precategory Added ". $_POST['precatname'];
			}
		}
		$datas=$this->getcats();
		$this->set('datas',$datas);
		$this->render('/product/precat');

		
	}
	
	public function get_precat($id=1){
	
		$this->autoRender=false;
		$data="<select id='precat' name='precat' required><option value=''>Select Pre category</option>";
		$subcat=$this->precat->find('list',array('conditions'=>array('pre_subcat_id' => $id)));
		foreach($subcat as $key=>$val){
			$data.="<option value='".$key."'>".$val."</option>";
		}
		$data.="</select>";
		return $data;
	}
}
