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


   public function actionWebServiceHipoteca(){
   	   $filtros1=$_GET['valor1'];
   	   $filtros2=$_GET['valor2'];
   	   $filtros3=$_GET['valor3'];
   	   $res=Yii::app()->WebService->consumir($filtros1,$filtros2,$filtros3);
   	   echo  $res;

   }

        public function actionResultDatos()
	{
		$Criteria = new CDbCriteria(); 
		$filtros=$_GET['filtros'];
        $condicion = "";
        $valores=split(";",$filtros);
        for($i=0;$i<count($valores);$i++){
           if ( $valores[$i] == "Apartamento"){
           	 if ($condicion != ""){
                 $condicion = $condicion . " and ";
              } 
             $condicion = $condicion . " TipoInmueble = 'APARTAMENTO' AND Disponible = 1 ";   	
           }
           if ( $valores[$i] == "Casa"){
           	 if ($condicion != ""){
                 $condicion = $condicion . " and ";
              } 
             $condicion = $condicion . " TipoInmueble = 'CASA' AND Disponible = 1 ";  	
           }
           if ( $valores[$i] == "Campo"){
           	 if ($condicion != ""){
                 $condicion = $condicion . " and ";
              } 
             $condicion = $condicion . " TipoInmueble = 'CAMPO' AND Disponible = 1 ";  	
           }

           if ( $valores[$i] == "Alquiler"){
           	 if ($condicion != ""){
                 $condicion = $condicion . " and ";
              } 	 
             $condicion =$condicion . " QueHacer = 'ALQUILAR' AND Disponible = 1 ";	
           }

           if ( $valores[$i] == "Venta"){
           	 if ($condicion != ""){
                 $condicion = $condicion . " and ";
              } 
            $condicion = $condicion . " QueHacer = 'VENDER' AND Disponible = 1 ";
           }          
        }
        
        $Criteria->condition = $condicion;
    	$model = Inmueble::model()->findAll($Criteria);	
		$this->renderPartial('_ajaxbuscador', array('model' => $model));
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

     public function actionPrincipal()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'

		 $inmuebles = Inmueble::model()->findAll();
		 
		// $this->render('index', array('inmuebles' => $inmuebles));

	   $this->render('principal',array('model'=>$inmuebles));

       
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
	public function actionHome()
	{

	  
	   $this->render('home');
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
	public function actionDescripcionInmueble()
	{

		//ver como obtener el id del inmueble enviado por post
		//setie con id = 1 a modo de como quedaria la vista
		$Criteria = new CDbCriteria();
		if (isset($_POST['idinmueble'])){
		$id =$_POST['idinmueble'];
	    }else{
	    	$id =$_GET['idinmueble'];
	    } 
		$Criteria->condition = "idinmueble = $id";
    	$Inmueble = Inmueble::model()->findAll($Criteria);
    	$Imagenes = Imagenes::model()->findAll($Criteria);
    	foreach ($Inmueble as $aux ){
	    	
			if ( $aux['TipoInmueble']== 'CASA') {
				$Casas = Inmcasa::model()->findAll($Criteria);
	    	   	
	    	   $this->render('descripcionInmueble',array('model' =>$Casas, 'model2' =>$Inmueble,'model3'=>$Imagenes));
			}
			elseif ($aux['TipoInmueble']== 'CAMPO') {
				$Campo = Inmcampos::model()->findAll($Criteria);
				$this->render('descripcionInmueble',array('model' =>$Campo, 'model2' =>$Inmueble,'model3'=>$Imagenes));
			}
			else
			{
				$Apartamento = Inmapartoficina::model()->findAll($Criteria);
    		   	$this->render('descripcionInmueble',array('model' =>$Apartamento, 'model2' =>$Inmueble,'model3'=>$Imagenes));
	
			}
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

				Yii::app()->user->setFlash('contact','Gracias por contactarte con nuestra empresa. Recibirás una respuesta a la brevedad.');
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