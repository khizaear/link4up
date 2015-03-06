<?php

class ProductController extends AppController {
	
	var $ext=".html";
	var $uses=array('prods','cat','subcat','precat');
	//var $scaffold;
	//public $components = array('ImageCropResize.Image');
	public function index(){	
		$datas=$this->cat->find('list');
		$this->set('datas',$datas);
		//$this->render('index');
	}
	public function getprod(){
	
		$this->autoRender=false;
		$subcat=$this->request->params['pass'][0];
		$this->prods->recursive=-1;
		$data['prods']=$this->prods->find('all',array('conditions' => array('prod_precat_id' => $subcat)));
		/* pr($data[0]['prods']['prod_cat_id']);
 

		echo json_encode($det); */
		$data['det']['cat']=$this->requestAction('/admin/getcatname/'.$data['prods'][0]['prods']['prod_cat_id']);
		$data['det']['subcat']=$this->requestAction('/admin/getsubcatname/'.$data['prods'][0]['prods']['prod_subcat_id']);
		$data['det']['precat']=$this->requestAction('/admin/getprecatname/'.$data['prods'][0]['prods']['prod_precat_id']);
		echo json_encode($data);
	}
	
	public function catprod($id=1){	
		$this->autoRender=false;
		//$subcat=$this->request->params['pass'][0];
		$this->prods->recursive=-1;		
		$data=$this->prods->find('all',array('conditions' => array('prod_cat_id' => $id)));
		echo json_encode($data);
	}
	
	public function add(){	
		$this->autoRender=false;
		$title=$this->data['title'];
		$cat=$this->data['precat'];
		$file=$_FILES['image'];
		$imagename=str_replace(" ","-",$file["name"]);
		$data['prod_title']=$title;
		$data['prod_precat_id']=$cat;
		$data['prod_img']=$imagename;
		if($this->prods->save($data)){		
			move_uploaded_file($file['tmp_name'], "prodimg/".$imagename);		
			App::import('Component', 'Image');
			$MyImageCom = new ImageComponent();                
			$MyImageCom->prepare("prodimg/".$imagename);
			$MyImageCom->resize(250,230);//width,height,Red,Green,Blue
			$MyImageCom->save("prodimg/"."thumb-".$imagename);
			echo 'inserted';
		}
		
		/*
		$MyImageCom->prepare("prodimg/".$imagename);
		$MyImageCom->resize(92,92);//width,height,Red,Green,Blue
		$MyImageCom->save("prodimg/"."92".$imagename);
		
		$MyImageCom->prepare("prodimg/".$imagename);
		$MyImageCom->resize(103,103);//width,height,Red,Green,Blue
		$MyImageCom->save("prodimg/"."103".$imagename);
		*/
	}
	
	public function getall(){
		$this->autoRender=false;
		$this->prods->recursive=-1;
		$data=$this->prods->find('all');
		echo json_encode($data);
	}		

}
