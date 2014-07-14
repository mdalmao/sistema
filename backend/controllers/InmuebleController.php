<?php

class InmuebleController extends Controller
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
				'users'=>array('admin'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','pictures'),
				'users'=>array('admin'),
			),			
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			//PARA QUE TODOS LOS EMPLEADOS PUEDAN MANIPULAR LOS INMUEBLES
			//array('deny',  // deny all users
			//	'users'=>array('*'),
			//),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$casapo=new Inmcao;
		$imagenes=new Imagenes;
		$campo = new Inmcampos;
		$model = $this->loadModel($id);

		if($model->TipoInmueble == 'CASA'  || $model->TipoInmueble == 'APARTAMENTO' || $model->TipoInmueble == 'OFICINA')
			{
				$this->render('view',array(
					'model'=>$this->loadModel($id),
					'casapo'=>$this->loadModelImcao($id)							
					//'imagenes'=>$this->loadModelImagenes($id),
				));
			}
		if($model->TipoInmueble == 'CAMPO' || $model->TipoInmueble == 'TERRENO')	
			{
				$this->render('view',array(
					'model'=>$this->loadModel($id),		
					'campo'=>$this->loadModelCampos($id),
				));
			}
		
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Inmueble;
		$datosp=new Datospersonales;
		$casapo=new Inmcao;
		$imagenes=new Imagenes;
		$campo = new Inmcampos;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Inmueble']))
		{
			$model->attributes=$_POST['Inmueble'];
			$model->Disponible = '1';	

			if($model->save()){	
				if($model->TipoInmueble == 'CAMPO' || $model->TipoInmueble == 'TERRENO' )
				{
					$model->attributes=$_POST['Inmcampos'];
					$campo->idInmueble=$model->idInmueble;	
					$campo->save();	
				}		
				else
				{
					$casapo->attributes=$_POST['Inmcao'];
			    	$casapo->idInmbueble=$model->idInmueble;
			    	$casapo->save();
				}	                
				
			   	    				
				/////Imagen///////////////
				  $rnd = rand(0,9999);  // generate random number between 0-9999
                  $imagenes->attributes=$_POST['Imagenes'];				
  
  				  if(isset($imagenes->Ubicacion))
  				  {  				  	 
	  				$uploadedFile=CUploadedFile::getInstance($imagenes,'Ubicacion');

	  				if(is_object($uploadedFile)){
		                  $nombre= $uploadedFile->getName();
		                  $fileName = "{$rnd}-{$nombre}";                                         		       
		                  $uploadedFile->saveAs( Yii::app()->basePath.'/../imagenes/' .$fileName);                 
		                  
		                  $imagenes->Idinmueble = $model->idInmueble;
		                  $imagenes->IdImagen='1';                 
		                  $imagenes->Ubicacion = $fileName;
		               	  $imagenes->save();		                      
	                }	                
  				  }                                               
				////////FIN IMAGEN////////////////////////
  				  
  				  $this->redirect(array('view','id'=>$model->idInmueble));
			}
		}

		$this->render('create',array(
			'model'=>$model,
			'datosp'=>$datosp,
			'casapo'=>$casapo,
			'imagenes'=>$imagenes,
			'campo'=>$campo,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		if($model->TipoInmueble == 'CASA' || $model->TipoInmueble == 'APARTAMENTO' || $model->TipoInmueble == 'OFICINA')
		{
			$casapo=$this->loadModelImcao($id);	
		}
		if($model->TipoInmueble == 'CAMPO' || $model->TipoInmueble == 'TERRENO')
		{
			$campo=$this->loadModelCampos($id);
		}
		
		$datosp=$this->loadModelDatosPersonales($id);
		$imagenes = new Imagenes;
		$imagenes2 = new Imagenes;				
		$imagenes3 = new Imagenes;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Inmueble']))
		{
			$model->attributes=$_POST['Inmueble'];
			if($model->save()){
				if($model->TipoInmueble == 'CASA' || $model->TipoInmueble == 'APARTAMENTO' || $model->TipoInmueble == 'OFICINA')
				{
					$casapo->attributes=$_POST['Inmcao'];
			        $casapo->idInmbueble=$model->idInmueble;
			        $casapo->save();
				}

				if($model->TipoInmueble == 'CAMPO' || $model->TipoInmueble == 'TERRENO')
				{
					$campo->attributes=$_POST['Inmcampos'];
			        $campo->idInmueble=$model->idInmueble;
			        $campo->save();
				}					
			/////Imagen///////////////
				  $rnd = rand(0,9999);  // generate random number between 0-9999
                  $imagenes->attributes=$_POST['Imagenes'];		


  				  if(isset($imagenes->Ubicacion))
  				  {
  				  	//cuento la cantidad de imagenes
  				  	$consulta2 = new CDbCriteria();
				    $consulta2->condition = "Idinmueble = $id";
					$imagenes2 = Imagenes::model()->findAll($consulta2);
					$count = count($imagenes2);

					
  				  	 $uploadedFile=CUploadedFile::getInstance($imagenes,'Ubicacion');
	                 
  				  	 if(is_object($uploadedFile))
  				  	 {	

	  				  	 	//obtengo el numero 1
						$consulta3 = new CDbCriteria();
					    $consulta3->condition = "Idinmueble = $id and IdImagen = 1";
						$imagenes3 = Imagenes::model()->find($consulta3);
						$imagenes3->IdImagen = $count + '1';
						$imagenes3->save(); 


  				  	 	 $nombre= $uploadedFile->getName();
		                 $fileName = "{$rnd}-{$nombre}";                                         		       
		                 $uploadedFile->saveAs( Yii::app()->basePath.'/../imagenes/' .$fileName);                 
		                  
		                 $imagenes->Idinmueble = $model->idInmueble;
		                 $imagenes->IdImagen='1';                 
		                 $imagenes->Ubicacion = $fileName;
		               	 $imagenes->save(); 
  				  	 }
	                
  				  }	
  				  else
  				  {
  				  	$uploadedFile=CUploadedFile::getInstance($imagenes,'Ubicacion');
	                 $nombre= $uploadedFile->getName();
	                 $fileName = "{$rnd}-{$nombre}";                                         		       
	                 $uploadedFile->saveAs( Yii::app()->basePath.'/../imagenes/' .$fileName);                 
	                  
	                 $imagenes->Idinmueble = $model->idInmueble;
	                 $imagenes->IdImagen='1';                 
	                 $imagenes->Ubicacion = $fileName;
	               	 $imagenes->save(); 
  				  }
                              
			////////FIN IMAGEN////////////////////////			
				if($model->TipoInmueble == 'CASA' || $model->TipoInmueble == 'APARTAMENTO' || $model->TipoInmueble == 'OFICINA' )
				{
					$this->redirect(array('view','id'=>$model->idInmueble,'anio'=>$casapo->AnioConstruccion));               	 			
				}
				if($model->TipoInmueble == 'CAMPO' || $model->TipoInmueble == 'TERRENO')
				{
					$this->redirect(array('view','id'=>$model->idInmueble));               	 			
				}
				
			}				
		}

		if($model->TipoInmueble == 'CASA' || $model->TipoInmueble == 'APARTAMENTO' || $model->TipoInmueble == 'OFICINA')
		{
			$this->render('update',array(
			'model'=>$model,			
			'casapo'=>$casapo,	
			'datosp'=>$datosp,	
			'imagenes'=>$imagenes,	
			
		));
		}
		
		if($model->TipoInmueble == 'CAMPO' || $model->TipoInmueble == 'TERRENO')
		{
			$this->render('updatecampo',array(
			'model'=>$model,						
			'datosp'=>$datosp,	
			'campo'=>$campo,
			'imagenes'=>$imagenes,	
			
		));
		}
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$Criteria = new CDbCriteria();
		$inmcliente = new clienteinmueble;
		$imagenes=new Imagenes;

		//$casapo=new Inmcao;
		//Los string estan en comillas simples sino no lo toma S
    	$Criteria->condition = "idInmueble = $id";				
		$inmcliente=clienteinmueble::model()->findAll($Criteria);

		$consulta = new CDbCriteria();
		$consulta->condition = "Idinmueble = $id";
		$imagenes = Imagenes::model()->findAll($consulta);

		if($inmcliente==NULL){			
		    

			$casapo=$this->loadModelImcao($id)->delete();			
			$this->loadModel($id)->delete();	
		}		
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Inmueble');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Inmueble('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Inmueble']))
			$model->attributes=$_GET['Inmueble'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function actionPictures($id)
	{			
		$model=$this->loadModel($id);
		$imagenes=new Imagenes;
		$imagenes2=new Imagenes;

		if(isset($_POST['Inmueble']))
		{
			$model->attributes=$_POST['Inmueble'];
			
			$rnd = rand(0,9999);  // generate random number between 0-9999
			$imagenes->attributes=$_POST['Imagenes'];
           
			if(isset($imagenes->Ubicacion))
  				  {
  				  	//cuento la cantidad de imagenes
  				  	$consulta2 = new CDbCriteria();
				    $consulta2->condition = "Idinmueble = $id";
					$imagenes2 = Imagenes::model()->findAll($consulta2);
					$count = count($imagenes2);
					
  				  	 $uploadedFile=CUploadedFile::getInstance($imagenes,'Ubicacion');
	                 
  				  	 if(is_object($uploadedFile))
  				  	 {		

  				  	 	 $nombre= $uploadedFile->getName();
		                 $fileName = "{$rnd}-{$nombre}";                                         		       
		                 $uploadedFile->saveAs( Yii::app()->basePath.'/../imagenes/' .$fileName);                 
		                  
		                 $imagenes->Idinmueble = $model->idInmueble;
		                 $imagenes->IdImagen=$count + '1';                 
		                 $imagenes->Ubicacion = $fileName;
		               	 $imagenes->save(); 
		               	 
						$this->render('pictures',array(
							'model'=>$model,
							'imagenes'=>$imagenes,
						));

  				  	 }	                
  				  }
  		}	

		$this->render('pictures',array(
			'model'=>$model,
			'imagenes'=>$imagenes,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Inmueble the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Inmueble::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function loadModelImcao($id)
	{
		$model=Inmcao::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function loadModelDatosPersonales($id)
	{
		$model=Datospersonales::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function loadModelCampos($id)
	{
		$model=Inmcampos::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function loadModelImagenes($id)
	{
		$model=Imagenes::model()->findByPk($id);

		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Inmueble $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='inmueble-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	 
}
