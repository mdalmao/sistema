<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */

	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('admin'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('admin'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			//array('deny',  // deny all users
			//	'users'=>array('*'),
			//),
		);
	}



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

		 if (Yii::app()->user->isGuest){  
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
	   } else{
	   	 $this->render('index', array('muestro'=> '1'));
	   }
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

	public function actionCargarCalendario()
	{
		/*
		$id=$_GET['id'];
		Yii::app()->Calendario-> mostrar($id);
        */
		$this->renderPartial('_ajaxviewcalendario', array('idinmueble' => $_GET['id']));
	}

    

    public function actionResultDatos()
	{
		$Criteria = new CDbCriteria(); 
		$filtros=$_GET['filtros'];
        $condicion = "";
        $valores=split(";",$filtros);
        $condicion = Yii::app()->Datos->filtros($valores);
        $Criteria->condition = $condicion;
    	$model = Inmueble::model()->findAll($Criteria);	
		$this->renderPartial('_ajaxbuscador', array('model' => $model));
	}

	public function actionResultDatosTexto()
	{
		$Criteria = new CDbCriteria(); 
		$condicion = "";
		$filtros=$_GET['filtros'];
		$valor= $_GET['valor'];
        if ($filtros != ""){
        	$valores=split(";",$filtros);
            $condicion = Yii::app()->Datos-> filtros($valores);
        }
	    if ( $valor != "" ){
            if ($condicion != ""){
	    	$condicion = $condicion . " and Descripcion like '%" . $valor ."%'"; 
	        }else{
	        	$condicion = $condicion . " Descripcion like '%" . $valor ."%'";
	        }
	    }
        
        $Criteria->condition = $condicion;
    	$model = Inmueble::model()->findAll($Criteria);	
		$this->renderPartial('_ajaxbuscador', array('model' => $model));
	}


	public function actionCalendario(){
         
         $model= Inmueble::model()->findAll();
        if(isset($_POST['inmueble']))
		{
			$idinmueble= $_POST['inmueble'];
			$cliente= (int) $_POST['cliente'];
            $horas=  (int) $_POST['hora'];
			$fecha = $_POST['fecha'];
			
            $mensaje= Yii::app()->Calendario-> alta($idinmueble,$cliente,$fecha,$horas);
           // $mensaje= " Se agendo correctamente ";
            $this->render('calendario',array('model'=>$model, 'mensaje'=>$mensaje));
            
		}else{
			$this->render('calendario',array('model'=>$model));
           
		}
         
	}


    public function actionCargarCalendario2()
	{
		
		$this->renderPartial('_ajaxviewcalendariofecha', array('fecha' => $_GET['fecha']));
	}

	public function actionCargarCalendario3()
	{
		$this->renderPartial('_ajaxviewcalendariocedula', array('cedula' => $_GET['cedula']));
	}

}