<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,

			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'

		 $inmuebles = Inmueble::model()->findAll();
		 
		// $this->render('index', array('inmuebles' => $inmuebles));

	   $this->render('index',array('model'=>$inmuebles));

       
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	public function actionBuscar()
	{

	  $inmuebles = Inmueble::model()->findAll();
	   $this->render('buscar',array('model'=>$inmuebles));
	}
	public function actionMision()
	{

	  
	   $this->render('mision');
	}
	public function actionVision()
	{

	  
	   $this->render('vision');
	}

   	public function actionApartamentos()
	{

		//obtener los apartamentos de la base
		$Criteria = new CDbCriteria();
		//Los string estan en comillas simples sino no lo toma S
    	$Criteria->condition = "TipoInmueble = 'APARTAMENTO' AND Disponible = 1";
    	$Apartamentos = Inmueble::model()->findAll($Criteria);	

    	//como devuelvo ,$Inmueble
	   	$this->render('apartamentos',array('model'=>$Apartamentos));
	}
	public function actionCasas()
	{

	   //obtener los apartamentos de la base
		$Criteria = new CDbCriteria();
		//Los string estan en comillas simples sino no lo toma S
    	$Criteria->condition = "TipoInmueble = 'CASA' AND Disponible = 1";
    	$Casas = Inmueble::model()->findAll($Criteria);	

    	
	   	$this->render('casas',array('model'=>$Casas));
	   
	}
	public function actionCampos()
	{

	   //obtener los apartamentos de la base
		$Criteria = new CDbCriteria();
		//Los string estan en comillas simples sino no lo toma S
    	$Criteria->condition = "TipoInmueble = 'CAMPO' AND Disponible = 1";
    	$Campos = Inmueble::model()->findAll($Criteria);	

    	
	   	$this->render('campos',array('model'=>$Campos));
	}
	public function actionAlquileres()
	{

	   //obtener los apartamentos de la base
		$Criteria = new CDbCriteria();
		//Obtener los inmuebles que son para alquilar
    	$Criteria->condition = "QueHacer = 'ALQUILAR' AND Disponible = 1";
    	$Alquileres = Inmueble::model()->findAll($Criteria);
    	

	   $this->render('alquileres',array('model'=>$Alquileres));
	}
	public function actionVentas()
	{
	   //obtener los apartamentos de la base
		$Criteria = new CDbCriteria();
		//Obtener los inmuebles que son para alquilar
    	$Criteria->condition = "QueHacer = 'VENDER' AND Disponible = 1";
    	$Ventas = Inmueble::model()->findAll($Criteria);
    	

	   $this->render('ventas',array('model'=>$Ventas));


	}
	public function actionCasasGenerico()
	{

		//ver como obtener el id del inmueble enviado por post
		//setie con id = 1 a modo de como quedaria la vista
		$Criteria = new CDbCriteria();
		$id =$_POST['idinmueble'];
		$Criteria->condition = "idinmueble = $id";
    	
    	$Casas = Inmcasa::model()->findAll($Criteria);
    	$Inmueble = Inmueble::model()->findAll($Criteria);
    	$Imagenes = Imagenes::model()->findAll($Criteria);
    	

	   $this->render('casasGenerico',array('model' =>$Casas, 'model2' =>$Inmueble,'model3'=>$Imagenes));
	}
	public function actionCampoGenerico()
	{
		//ver como obtener el id del inmueble enviado por post
		//setie con id = 5 a modo de como quedaria la vista
		$Criteria = new CDbCriteria();
		$id =$_POST['idinmueble'];
		$Criteria->condition = "idinmueble = $id";
    	$Campo = Inmcampos::model()->findAll($Criteria);
    	$Inmueble = Inmueble::model()->findAll($Criteria);
    	$Imagenes = Imagenes::model()->findAll($Criteria);
    	

	   $this->render('campoGenerico',array('model' =>$Campo, 'model2' =>$Inmueble,'model3'=>$Imagenes));
	
    	
		
	}
	public function actionApartamentoGenerico()
	{
		//ver como obtener el id del inmueble enviado por post
		//setie con id = 3 a modo de como quedaria la vista
		$Criteria = new CDbCriteria();
		$id =$_POST['idinmueble'];
		$Criteria->condition = "idinmueble = $id";
    	$Campo = Inmapartoficina::model()->findAll($Criteria);
    	$Inmueble = Inmueble::model()->findAll($Criteria);
    	$Imagenes = Imagenes::model()->findAll($Criteria);
    	

	   $this->render('apartamentoGenerico',array('model' =>$Campo, 'model2' =>$Inmueble,'model3'=>$Imagenes));
	
	
    	
		 //$this->render('apartamentoGenerico');
	}
	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);

                $model2 = new Contacto();
                $model2->NombreContacto = $model->name;
                $model2->MesajeContacto=  $model->body;
                $model2->Email = $model->email;
                $model2->Telefono= $model->telefono;
                $model2->save();

				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}