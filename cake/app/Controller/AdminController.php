<?php

class AdminController extends AppController {
	
	var $ext=".html";
	var $uses=array('prods','cat','subcat','precat','admin');
	//var $scaffold;
	//public $components = array('ImageCropResize.Image');
	public function login(){
		$datas="Enter UserId & Password to Access Application";
		if($this->data){
			$user=$this->admin->find('first',array('conditions'=>array('admin_userid'=>$this->data['userid'],'admin_password'=>$this->data['password'])));
			if(count($user)>0){
				$this->Session->write('user', $user);
				$this->redirect(array('controller' => 'admin', 'action' => 'index'));
			}else{
				//pr($user);
				$datas="<div class='alert alert-danger'><h2>Invalid Login</h2> Provide Valid Login Details</div>";
			}
		}
		$this->set('datas',$datas);
		
		//$this->render('index');
	}
	public function index(){	
		$datas=$this->cat->find('list');
		$this->set('datas',$datas);
		//$this->render('index');
	}
	public function catlog(){
		//$this->autoRender=false;
		$this->cat->recursive=2;
		$maincat=$this->cat->find('all');
		//pr($maincat);
		$this->set('data',$maincat);
		$this->render("catalog");
	}
	
	public function get_subcat($id=1){	
		$this->autoRender=false;
		$data="<div class='form-group'><label >Select Sub Category</label><select class='form-control' onchange='pop_precat(this.value)' id='subcat' name='subcat' required><option value=''>Select Sub category</option>";
		$subcat=$this->subcat->find('list',array('conditions'=>array('subcat_cat_id' => $id)));
		foreach($subcat as $key=>$val){
			$data.="<option value='".$key."'>".$val."</option>";
		}
		$data.="</select></div>";
		return $data;
	}
	public function get_precat($id=1){
	
		$this->autoRender=false;
		$data="<div class='form-group'><label >Select Sub Pre Category</label><select class='form-control' id='precat' name='precat' required><option value=''>Select Pre category</option>";
		$subcat=$this->precat->find('list',array('conditions'=>array('pre_subcat_id' => $id)));
		foreach($subcat as $key=>$val){
			$data.="<option value='".$key."'>".$val."</option>";
		}
		$data.="</select></div>";
		return $data;
	}
	public function add(){	
	
		$this->autoRender=false;
		$cat=$this->data['category'];
		$subcat=$this->data['subcat'];
		$precat=$this->data['precat'];
		$file=$_FILES['image'];
		$imagename=str_replace(" ","-",$file["name"]);
		$data['prod_cat_id']=$cat;
		$data['prod_subcat_id']=$subcat;
		$data['prod_precat_id']=$precat;
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
		return $this->redirect(array('controller' => 'admin', 'action' => 'index') );
		/*
		$MyImageCom->prepare("prodimg/".$imagename);
		$MyImageCom->resize(92,92);//width,height,Red,Green,Blue
		$MyImageCom->save("prodimg/"."92".$imagename);
		
		$MyImageCom->prepare("prodimg/".$imagename);
		$MyImageCom->resize(103,103);//width,height,Red,Green,Blue
		$MyImageCom->save("prodimg/"."103".$imagename);
		*/
	}
	public function update(){	
	
		$this->autoRender=false;
		$this->prods->id=$this->data['prod'];
		$data['prod_cat_id']=$this->data['category'];
		$data['prod_subcat_id']=$this->data['subcat'];
		$data['prod_precat_id']=$this->data['precat'];
		if($_FILES['image']!=''){
			$file=$_FILES['image'];
			$imagename=str_replace(" ","-",$file["name"]);
			$data['prod_img']=$imagename;
			move_uploaded_file($file['tmp_name'], "prodimg/".$imagename);		
			App::import('Component', 'Image');
			$MyImageCom = new ImageComponent();                
			$MyImageCom->prepare("prodimg/".$imagename);
			$MyImageCom->resize(250,230);//width,height,Red,Green,Blue
			$MyImageCom->save("prodimg/"."thumb-".$imagename);
		}
		$this->prods->save($data);

		pr($data);
		//return $this->redirect(array('controller' => 'admin', 'action' => 'index') );
	}
	public function newcat(){
		if($this->data){
			$data['cat_name']=$this->data['category'];
				if($this->cat->save($data)){	
					$this->set('msg','Created New Category');
				}
		}
		$this->render('create-cat');
	}
	public function newsubcat(){
		$datas=$this->cat->find('list');
		if($this->data){
			$data['subcat_cat_id']=$this->data['category'];
			$data['subcat_name']=$this->data['subcategory'];
				if($this->subcat->save($data)){}
		}
		$this->set('datas',$datas);
		$this->render('create-subcat');
	}
	public function newprecat(){
		$datas=$this->cat->find('list');
		if($this->data){
			//$cat=$this->data['category'];
			$subcat=$this->data['subcat'];
			$precat=$this->data['precat'];
			//$data['prod_cat_id']=$cat;
			$data['pre_subcat_id']=$subcat;
			$data['pre_catname']=$precat;
				if($this->precat->save($data)){}
		}
		$this->set('datas',$datas);
		$this->render('create-precat');
	}
	public function getprod(){	
		$this->autoRender=false;
		$subcat=$this->request->params['pass'][0];
		$this->prods->recursive=-1;
		$data=$this->prods->find('all',array('conditions' => array('prod_precat_id' => $subcat)));
		echo json_encode($data);
	}
	
	public function listprod(){
		$datas=$this->prods->find('all');
		$this->set('datas',$datas);
		$this->render('products');
	}	
	public function editprod($id=1){
		$datas=$this->prods->findByprod_id($id);
		$datas['cat']=$this->cat->find('list');
		$datas['subcat']=$this->subcat->find('list');
		$this->set('datas',$datas);
		$this->render('editprod');
	}
	public function editcat($id=null){		
		//$this->autoRender=false;
		$this->cat->recursive=-1;				
		$datas=$this->cat->findBycat_id($id);
		if($this->data){
			$this->cat->id=$this->data['cat'];
			$data['cat_name']=$this->data['category'];
			$this->cat->save($data);
			$this->redirect(array('controller' => 'admin', 'action' => 'catlog'));
		}
		$this->set('datas',$datas);
	}
	public function editsubcat($id=null){		
		//$this->autoRender=false;
		$this->subcat->recursive=1;				
		$datas=$this->subcat->findBysubcat_id($id);
		$datas['ccc']['cat']=$this->cat->find('list');
		if($this->data){
			$this->subcat->id=$this->data['sub'];
			$data['subcat_name']=$this->data['subcat'];
			$data['subcat_cat_id']=$this->data['cat'];
			$this->subcat->save($data);
			$this->redirect(array('controller' => 'admin', 'action' => 'catlog'));
		}
		$this->set('datas',$datas);
	}
	public function editprecat($id=null){		
		//$this->autoRender=false;
		$this->precat->recursive=2;		
		$datas=$this->precat->findByprecat_id($id);
		$datas['ccc']['cat']=$this->cat->find('list');
		if($this->data){
			$this->precat->id=$this->data['pre'];
			$data['pre_catname']=$this->data['precat'];
			$data['pre_subcat_id']=$this->data['subcat'];
			$this->precat->save($data);
			$this->redirect(array('controller' => 'admin', 'action' => 'catlog'));
		}
		$this->set('datas',$datas);
	}
	public function pageabout(){
		$data=$file = file_get_contents('/aboustus.txt', true);
		if($this->data){
			$file = 'aboustus.txt';
			file_put_contents($file,$this->data['content']);
		}
		$this->set('data',$data);
	}
	public function pagefinishedleather(){
		$data=$file = file_get_contents('/finished-leather.txt', true);
		if($this->data){
			$file = 'finished-leather.txt';
			file_put_contents($file,$this->data['content']);
		}
		$this->set('data',$data);
		$this->render("finishedleather");
	}
	public function  get_pagefinishedleather(){
		$this->autoRender=false;
		$data['about']=$file = file_get_contents('/finished-leather.txt', true);		
		echo json_encode($data);
		//return $data;
	}
	public function get_pageabout(){
		$this->autoRender=false;
		$data['about']=$file = file_get_contents('/aboustus.txt', true);		
		echo json_encode($data);
		//return $data;
	}
	
	
	public function getall(){
		$this->autoRender=false;
		$this->prods->recursive=-1;
		$data=$this->prods->find('all');
		echo json_encode($data);
	}		
	
	public function getcatname($id){
		$this->autoRender=false;
		$datas=$this->cat->findBycat_id($id);
		return $datas['cat']['cat_name'];
	}	
	public function getsubcatname($id){
		$this->autoRender=false;
		$datas=$this->subcat->findBysubcat_id($id);
		return $datas['subcat']['subcat_name'];
	}
	public function getprecatname($id){
		$this->autoRender=false;
		$datas=$this->precat->findByprecat_id($id);
		return $datas['precat']['pre_catname'];
	}
}
