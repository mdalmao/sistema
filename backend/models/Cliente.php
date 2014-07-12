<?php

/**
 * This is the model class for table "cliente".
 *
 * The followings are the available columns in table 'cliente':
 * @property integer $idUsuario
 * @property string $Nacionalidad
 *
 * The followings are the available model relations:
 * @property Alquiler[] $alquilers
 * @property Datospersonales $idUsuario0
 * @property Inmueble[] $inmuebles
 * @property Compraventa[] $compraventas
 */
class Cliente extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cliente';
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
			array('idUsuario', 'numerical', 'integerOnly'=>true),
			array('Nacionalidad', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idUsuario, Nacionalidad', 'safe', 'on'=>'search'),
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
			'alquilers' => array(self::HAS_MANY, 'Alquiler', 'IdCliente'),
			'idUsuario0' => array(self::BELONGS_TO, 'Datospersonales', 'idUsuario'),
			'inmuebles' => array(self::MANY_MANY, 'Inmueble', 'clienteinmueble(IdUsuario, IdInmueble)'),
			'compraventas' => array(self::HAS_MANY, 'Compraventa', 'IdCliente'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idUsuario' => 'Id Usuario',
			'Nacionalidad' => 'Nacionalidad',
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
		$criteria->compare('Nacionalidad',$this->Nacionalidad,true);
	//	$criteria->compare('NombreUsuario'),$this->NombreUsuario,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Cliente the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
