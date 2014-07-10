
<?php foreach ($model as $inmueble): ?>
    <div  class="resultado">
      


      <p class="descripcion"> 
        Descripcion:
        <?php echo CHtml::decode($inmueble['Descripcion']);  ?> 
      </p>
      
      <img class ="imagen" src="<?php echo Yii::app()->ImagenesInmueble->imagenprincipal($inmueble['idInmueble']); ?>" /> 

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
<?php endforeach; ?>