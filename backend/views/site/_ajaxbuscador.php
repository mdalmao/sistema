<?php foreach ($model as $inmueble): ?>
   <div class="resultado">
   <p class="reserva-titulo"><?php echo $inmueble['idInmueble']; ?></p>
   <p class="descripcion"> <?php echo CHtml::decode($inmueble['Descripcion']);  ?> </p>
   <?php $id = $inmueble['idInmueble']; ?> 
   <img class ="imagen" src="<?php echo Yii::app()->ImagenesInmueble->imagenprincipal($inmueble['idInmueble']); ?>" /> 
   <div class="mapainmueble">
          <?php 
          echo Yii::app()->Mapas->mapa_inmueble($inmueble['idInmueble']);

          ?>
      </div>
   </div>
<?php endforeach; ?>