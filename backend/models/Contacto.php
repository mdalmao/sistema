<?php

/**
 * This is the model class for table "contacto".
 *
 * The followings are the available columns in table 'contacto':
 * @property integer $idContacto
 * @property string $NombreContacto
 * @property string $Email
 * @property string $Telefono
 * @property string $MesajeContacto
 *
 * The followings are the available model relations:
 * @property Ingresacontacto $ingresacontacto
 */
class Contacto extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'contacto';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('NombreContacto, Email, Telefono', 'length', 'max'=>45),
			array('MesajeContacto', 'length', 'max'=>300),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idContacto, NombreContacto, Email, Telefono, MesajeContacto', 'safe', 'on'=>'search'),
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
			'ingresacontacto' => array(self::HAS_ONE, 'Ingresacontacto', 'IdContacto'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idContacto' => 'Id Contacto',
			'NombreContacto' => 'Nombre Contacto',
			'Email' => 'Email',
			'Telefono' => 'Telefono',
			'MesajeContacto' => 'Mesaje Contacto',
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

		$criteria->compare('idContacto',$this->idContacto);
		$criteria->compare('NombreContacto',$this->NombreContacto,true);
		$criteria->compare('Email',$this->Email,true);
		$criteria->compare('Telefono',$this->Telefono,true);
		$criteria->compare('MesajeContacto',$this->MesajeContacto,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Contacto the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
