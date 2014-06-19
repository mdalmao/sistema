<?php

/**
 * This is the model class for table "inmueble".
 *
 * The followings are the available columns in table 'inmueble':
 * @property integer $idInmueble
 * @property string $TipoInmueble
 * @property string $QueHacer
 * @property integer $Disponible
 * @property string $Estado
 * @property double $Precio
 * @property string $Descripcion
 * @property string $Departamento
 * @property string $Ciudad
 * @property string $Zona
 * @property string $Direccion
 * @property integer $Portada
 * @property integer $idUsuario
 * @property double $x
 * @property double $y
 *
 * The followings are the available model relations:
 * @property Alquiler[] $alquilers
 * @property Cliente[] $clientes
 * @property Compraventa[] $compraventas
 * @property Imagenes[] $imagenes
 * @property Inmcampos $inmcampos
 * @property Inmcao $inmcao
 * @property Datospersonales $idUsuario0
 */
class Inmueble extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'inmueble';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idUsuario', 'required'),
			array('Disponible, Portada, idUsuario', 'numerical', 'integerOnly'=>true),
			array('Precio, x, y', 'numerical'),
			array('TipoInmueble, QueHacer, Estado, Departamento, Ciudad, Zona', 'length', 'max'=>45),
			array('Descripcion', 'length', 'max'=>300),
			array('Direccion', 'length', 'max'=>60),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idInmueble, TipoInmueble, QueHacer, Disponible, Estado, Precio, Descripcion, Departamento, Ciudad, Zona, Direccion, Portada, idUsuario', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'alquilers' => array(self::HAS_MANY, 'Alquiler', 'IdInmueble'),
			'clientes' => array(self::MANY_MANY, 'Cliente', 'clienteinmueble(IdInmueble, IdUsuario)'),
			'compraventas' => array(self::HAS_MANY, 'Compraventa', 'IdInmueble'),
			'imagenes' => array(self::HAS_MANY, 'Imagenes', 'Idinmueble'),
			'inmcampos' => array(self::HAS_ONE, 'Inmcampos', 'idInmueble'),
			'inmcao' => array(self::HAS_ONE, 'Inmcao', 'idInmbueble'),
			'idUsuario0' => array(self::BELONGS_TO, 'Datospersonales', 'idUsuario'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idInmueble' => 'Id Inmueble',
			'TipoInmueble' => 'Tipo Inmueble',
			'QueHacer' => 'Que Hacer',
			'Disponible' => 'Disponible',
			'Estado' => 'Estado',
			'Precio' => 'Precio',
			'Descripcion' => 'Descripcion',
			'Departamento' => 'Departamento',
			'Ciudad' => 'Ciudad',
			'Zona' => 'Zona',
			'Direccion' => 'Direccion',
			'Portada' => 'Portada',
			'idUsuario' => 'Id Usuario',
			'x' => 'X',
			'y' => 'Y',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('idInmueble',$this->idInmueble);
		$criteria->compare('TipoInmueble',$this->TipoInmueble,true);
		$criteria->compare('QueHacer',$this->QueHacer,true);
		$criteria->compare('Disponible',$this->Disponible);
		$criteria->compare('Estado',$this->Estado,true);
		$criteria->compare('Precio',$this->Precio);
		$criteria->compare('Descripcion',$this->Descripcion,true);
		$criteria->compare('Departamento',$this->Departamento,true);
		$criteria->compare('Ciudad',$this->Ciudad,true);
		$criteria->compare('Zona',$this->Zona,true);
		$criteria->compare('Direccion',$this->Direccion,true);
		$criteria->compare('Portada',$this->Portada);
		$criteria->compare('idUsuario',$this->idUsuario);
		$criteria->compare('x',$this->x);
		$criteria->compare('y',$this->y);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Inmueble the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
