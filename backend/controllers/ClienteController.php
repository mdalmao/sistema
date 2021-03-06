<?php

//Yii::app()->clientScript->registerCoreScript('jquery');

class ClienteController extends Controller
{

	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
			'model2'=>$this->loadModel2($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Cliente;
		$model2=new Datospersonales;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Cliente']))
		{
			$model->attributes=$_POST['Cliente'];
			$model2->attributes=$_POST['Datospersonales'];

			//$model->idUsuario =1;
			

			$model2->save(); 
			//si se guardo datospersonales agrego los datos de cliente (id)
			if($model2->save()){
				$model->idUsuario= $model2->idUsuario;
				$model->save();
				$this->redirect(array('view','id'=>$model->idUsuario));
			}
		}

		$this->render('create',array(
			'model'=>$model,
			'model2'=>$model2,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=new Cliente;
		$model2=new Datospersonales;

		$model=$this->loadModel($id);
		$model2=$this->loadModel2($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Cliente']))
		{
			$model->attributes=$_POST['Cliente'];
			$model2->attributes=$_POST['Datospersonales'];


			if($model->save()){
				$model->idUsuario= $model2->idUsuario;
				$model2->save(); 
				$this->redirect(array('view','id'=>$model->idUsuario));
			}	
		}

		$this->render('update',array(
			'model'=>$model,
			'model2'=>$model2,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$model=new Cliente;
		$model2=new Datospersonales;
		$model3=new Inmueble;

		$Criteria = new CDbCriteria();
		//Los string estan en comillas simples sino no lo toma S
    	$Criteria->condition = "idUsuario = $id";

    	$estaId = Inmueble::model()->findAll($Criteria);

		$model->idUsuario = $id;
		$model2->idUsuario = $id;
		$model3->idUsuario = $id;

		//if($model->$id == $model2->$id){
		//($model->idUsuario == $model2->idUsuario){
		if(empty($estaId)){
			$this->loadModel($id)->delete();
			$this->loadModel2($id)->delete();

			//$this->redirect(array('view'));	
			$this->redirect(array('admin'));	
		}
		else{
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		//	$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		//if(!isset($_GET['ajax'])){
			//$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}		

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{		
		//$dataProvider=new CActiveDataProvider('Cliente');
		$dataProvider=new CActiveDataProvider('Datospersonales');

		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Cliente('search');
		$model->unsetAttributes();


		$model2=new Datospersonales('search');
		$model2->unsetAttributes(); 
		  // clear any default values
		

		$model->idUsuario= $model2->idUsuario;

		if(isset($_GET['Cliente'])){
			$model->attributes=$_GET['Cliente'];
			
		}

	if(isset($_GET['Datospersonales'])){
		$model2->attributes=$_GET['Datospersonales'];
	}

		$this->render('admin',array(
			'model'=>$model,
			'model2'=>$model2,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Cliente the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Cliente::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}


	//agrego esta funcion
	public function loadModel2($id)
	{
		$model2=Datospersonales::model()->findByPk($id);
		if($model2===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model2;
	}
	/**
	 * Performs the AJAX validation.
	 * @param Cliente $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='cliente-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
