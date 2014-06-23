<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Ventas';
$this->breadcrumbs=array(
	'Venta',
);
?>

<h1>Ventas</h1>



<div class="inmueble">
	
	<?php foreach ($model as $Ventas): ?>
		 <form action="CasasGenerico"  method="post">
		<div class="resultado">
			
			<p class="descripcion"> 
				<p> Descripcion:
				<?php echo CHtml::decode($Ventas['Descripcion']);  ?> 
				</p>
			</p>
			<p class="estado">
				<p> Estado:
				 <?php echo CHtml::decode($Ventas['Estado']);  ?> 
				</P>
			</p>
			<p class="precio"> 
				<p> Precio:
				<?php echo CHtml::decode($Ventas['Precio']);  ?> 
				</p>
			</p>
			<p class="departamento"> 
				<p>Departamento:
				<?php echo CHtml::decode($Ventas['Departamento']);  ?> 
				</p>


			</p>
			<p class="ciudad">
				<p>Ciudad:
				 <?php echo CHtml::decode($Ventas['Ciudad']);  ?>
				</p>
			 </p>
			<p class="direccion"> 
				<p>
					Zona: 
					<?php echo CHtml::decode($Ventas['Zona']); ?>
				</p>
				<p> Direccion: 	

				<?php echo CHtml::decode($Ventas['Direccion']);  ?> 

				</p>
			</p>
			<?php $id = $Ventas['idInmueble']; ?>
 			<img class ="imagen" src="<?php echo Yii::app()->ImagenesInmueble->imagenprincipal($id); ?>" /> 
 				<?php if ($Ventas['TipoInmueble'] == 'CASA'): ?>
				 <a href="/yii/sistema/site/CasasGenerico" class="btn btn-success btn-mini"><i class="icon-white"></i> Ver Mas</a>
				<?php endif; ?>
				<?php if ($Ventas['TipoInmueble'] == 'CAMPO'): ?>
				 <a href="/yii/sistema/site/CampoGenerico" class="btn btn-success btn-mini"><i class="icon-white"></i> Ver Mas</a>
				<?php endif; ?>
				<?php if ($Ventas['TipoInmueble'] == 'APARTAMENTO'): ?>
				 <a href="/yii/sistema/site/ApartamentoGenerico" class="btn btn-success btn-mini"><i class="icon-white"></i> Ver Mas</a>
				<?php endif; ?>
			 
			
			</div>

		</div>
		</form>
	<?php endforeach; ?>

</div>
