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
		 
		 $this->render('index', array('inmuebles' => $inmuebles));

        /*
		$dataProvider=new CActiveDataProvider('Inmueble');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
        */
	  //	$this->render('index');
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

	   $model=new Inmueble();
	   $this->render('buscar',array('model'=>$model));
	}
	public function actionApartamentos()
	{

		//obtener los apartamentos de la base
		$Criteria = new CDbCriteria();
		//Los string estan en comillas simples sino no lo toma S
    	$Criteria->condition = "TipoInmueble = 'APARTAMENTO'";
    	$Apartamentos = Inmueble::model()->findAll($Criteria);	

    	//como devuelvo ,$Inmueble
	   	$this->render('apartamentos',array('model'=>$Apartamentos));
	}
	public function actionCasas()
	{

	   //obtener los apartamentos de la base
		$Criteria = new CDbCriteria();
		//Los string estan en comillas simples sino no lo toma S
    	$Criteria->condition = "TipoInmueble = 'CASA'";
    	$Casas = Inmueble::model()->findAll($Criteria);	

    	
	   	$this->render('casas',array('model'=>$Casas));
	   
	}
	public function actionCampos()
	{

	   //obtener los apartamentos de la base
		$Criteria = new CDbCriteria();
		//Los string estan en comillas simples sino no lo toma S
    	$Criteria->condition = "TipoInmueble = 'CAMPO'";
    	$Campos = Inmueble::model()->findAll($Criteria);	

    	
	   	$this->render('campos',array('model'=>$Campos));
	}
	public function actionAlquileres()
	{

	   //$model=new Alquileres();
	   $this->render('alquileres');
	}
	public function actionVentas()
	{

	   //$model=new Alquileres();
	   $this->render('ventas');
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