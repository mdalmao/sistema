<?php

/**
 * This is the model class for table "datospersonales".
 *
 * The followings are the available columns in table 'datospersonales':
 * @property integer $idUsuario
 * @property string $CIUsuario
 * @property string $NombreUsuario
 * @property string $ApellidoUsuario
 * @property string $DireccionUsuario
 * @property string $Telefono
 * @property string $FechaNacimiento
 *
 * The followings are the available model relations:
 * @property Cliente $cliente
 * @property Inmueble[] $inmuebles
 */
class Datospersonales extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'datospersonales';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('CIUsuario, NombreUsuario, ApellidoUsuario', 'length', 'max'=>45),
			array('DireccionUsuario', 'length', 'max'=>90),
			array('Telefono', 'length', 'max'=>20),
			array('FechaNacimiento', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idUsuario, CIUsuario, NombreUsuario, ApellidoUsuario, DireccionUsuario, Telefono, FechaNacimiento', 'safe', 'on'=>'search'),
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
			'cliente' => array(self::HAS_ONE, 'Cliente', 'idUsuario'),
			'inmuebles' => array(self::HAS_MANY, 'Inmueble', 'idUsuario'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idUsuario' => 'Id Usuario',
			'CIUsuario' => 'CI',
			'NombreUsuario' => 'Nombre',
			'ApellidoUsuario' => 'Apellido',
			'DireccionUsuario' => 'Direccion',
			'Telefono' => 'Telefono',
			'FechaNacimiento' => 'Fecha Nacimiento',
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

		$criteria->compare('idUsuario',$this->idUsuario);
		$criteria->compare('CIUsuario',$this->CIUsuario,true);
		$criteria->compare('NombreUsuario',$this->NombreUsuario,true);
		$criteria->compare('ApellidoUsuario',$this->ApellidoUsuario,true);
		$criteria->compare('DireccionUsuario',$this->DireccionUsuario,true);
		$criteria->compare('Telefono',$this->Telefono,true);
		$criteria->compare('FechaNacimiento',$this->FechaNacimiento,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Datospersonales the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
