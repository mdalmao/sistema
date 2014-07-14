<?php if(count($model)>0) { ?>

    <?php foreach ($model as $inmueble): ?>
        <div  class="resultado">
          <p class="descripcion"> 
            Descripcion:
            <?php echo CHtml::decode($inmueble['Descripcion']);  ?> 
          </p>
          
          <?php $url = "http://localhost:90/yii/sistema/index.php/site/DescripcionInmueble?idinmueble=". $inmueble['idInmueble']; ?>
         <a href="<?php echo $url; ?>">
         <img class ="imagen" src="<?php echo Yii::app()->ImagenesInmueble->imagenprincipal($inmueble['idInmueble']); ?>" /> 
         </a> 

          <p class="estado">
            </p> Estado:
             <?php echo CHtml::decode($inmueble['Estado']);  ?> 
            </p>
          </p>
          <p class="precio"> 
            </p> Precio:
            <?php echo CHtml::decode($inmueble['Precio']);  ?> 
            </p>
          </p>
          <p class="departamento"> 
            </p>Departamento:
            <?php echo CHtml::decode($inmueble['Departamento']);  ?> 
            </p>


          </p>
          <p class="ciudad">
            </p>Ciudad:
             <?php echo CHtml::decode($inmueble['Ciudad']);  ?>
            </p>
           </p>
          <p class="direccion"> 
            </p>
              Zona: 
              <?php echo CHtml::decode($inmueble['Zona']); ?>
            </p>
            </p> Direccion:  

            <?php echo CHtml::decode($inmueble['Direccion']);  ?> 

            </p>
          </p>
          

          </div>
    <?php endforeach; 
  }
else{ 
?>
  <div  class="resultado">
     <span> No hay resultados para los filtros aplicados </span>
  </div>
  <div id="espacio">

  </div>
<?php
}
?>