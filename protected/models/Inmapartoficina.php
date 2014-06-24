<?php

/**
 * This is the model class for table "inmapartoficina".
 *
 * The followings are the available columns in table 'inmapartoficina':
 * @property integer $idInmueble
 * @property double $GastosComunes
 * @property integer $Terrazas
 * @property integer $Piso
 * @property integer $Ascensor
 * @property integer $Portero
 *
 * The followings are the available model relations:
 * @property Inmcao $idInmueble0
 */
class Inmapartoficina extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'inmapartoficina';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idInmueble', 'required'),
			array('idInmueble, Terrazas, Piso, Ascensor, Portero', 'numerical', 'integerOnly'=>true),
			array('GastosComunes', 'numerical'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idInmueble, GastosComunes, Terrazas, Piso, Ascensor, Portero', 'safe', 'on'=>'search'),
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
			'idInmueble0' => array(self::BELONGS_TO, 'Inmcao', 'idInmueble'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idInmueble' => 'Id Inmueble',
			'GastosComunes' => 'Gastos Comunes',
			'Terrazas' => 'Terrazas',
			'Piso' => 'Piso',
			'Ascensor' => 'Ascensor',
			'Portero' => 'Portero',
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
		$criteria->compare('GastosComunes',$this->GastosComunes);
		$criteria->compare('Terrazas',$this->Terrazas);
		$criteria->compare('Piso',$this->Piso);
		$criteria->compare('Ascensor',$this->Ascensor);
		$criteria->compare('Portero',$this->Portero);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Inmapartoficina the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
