<?php

/**
 * This is the model class for table "inmcao".
 *
 * The followings are the available columns in table 'inmcao':
 * @property integer $idInmbueble
 * @property integer $AnioConstruccion
 * @property double $MetrosCuadrados
 * @property integer $Dormitorios
 * @property integer $Banios
 * @property integer $Garage
 * @property integer $Calefaccion
 * @property integer $TanqueAgua
 * @property string $Cerramiento
 *
 * The followings are the available model relations:
 * @property Inmapartoficina $inmapartoficina
 * @property Inmueble $idInmbueble0
 * @property Inmcasa $inmcasa
 */
class Inmcao extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'inmcao';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idInmbueble', 'required'),
			array('idInmbueble, AnioConstruccion, Dormitorios, Banios, Garage, Calefaccion, TanqueAgua', 'numerical', 'integerOnly'=>true),
			array('MetrosCuadrados', 'numerical'),
			array('Cerramiento', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idInmbueble, AnioConstruccion, MetrosCuadrados, Dormitorios, Banios, Garage, Calefaccion, TanqueAgua, Cerramiento', 'safe', 'on'=>'search'),
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
			'inmapartoficina' => array(self::HAS_ONE, 'Inmapartoficina', 'idInmueble'),
			'idInmbueble0' => array(self::BELONGS_TO, 'Inmueble', 'idInmbueble'),
			'inmcasa' => array(self::HAS_ONE, 'Inmcasa', 'idinmueble'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idInmbueble' => 'Id Inmbueble',
			'AnioConstruccion' => 'Anio Construccion',
			'MetrosCuadrados' => 'Metros Cuadrados',
			'Dormitorios' => 'Dormitorios',
			'Banios' => 'Banios',
			'Garage' => 'Garage',
			'Calefaccion' => 'Calefaccion',
			'TanqueAgua' => 'Tanque Agua',
			'Cerramiento' => 'Cerramiento',
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

		$criteria->compare('idInmbueble',$this->idInmbueble);
		$criteria->compare('AnioConstruccion',$this->AnioConstruccion);
		$criteria->compare('MetrosCuadrados',$this->MetrosCuadrados);
		$criteria->compare('Dormitorios',$this->Dormitorios);
		$criteria->compare('Banios',$this->Banios);
		$criteria->compare('Garage',$this->Garage);
		$criteria->compare('Calefaccion',$this->Calefaccion);
		$criteria->compare('TanqueAgua',$this->TanqueAgua);
		$criteria->compare('Cerramiento',$this->Cerramiento,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Inmcao the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
