<?php

/**
 * This is the model class for table "inmcasa".
 *
 * The followings are the available columns in table 'inmcasa':
 * @property integer $idinmueble
 * @property double $MetrosCuadradosTerreno
 * @property integer $Piso
 * @property integer $Fondo
 * @property integer $Frente
 * @property integer $Barbacoa
 * @property integer $Rejas
 * @property integer $Estufa
 * @property integer $Saneamiento
 *
 * The followings are the available model relations:
 * @property Inmcao $idinmueble0
 */
class Inmcasa extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'inmcasa';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idinmueble', 'required'),
			array('idinmueble, Piso, Fondo, Frente, Barbacoa, Rejas, Estufa, Saneamiento', 'numerical', 'integerOnly'=>true),
			array('MetrosCuadradosTerreno', 'numerical'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idinmueble, MetrosCuadradosTerreno, Piso, Fondo, Frente, Barbacoa, Rejas, Estufa, Saneamiento', 'safe', 'on'=>'search'),
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
			'idinmueble0' => array(self::BELONGS_TO, 'Inmcao', 'idinmueble'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idinmueble' => 'Idinmueble',
			'MetrosCuadradosTerreno' => 'Metros Cuadrados Terreno',
			'Piso' => 'Piso',
			'Fondo' => 'Fondo',
			'Frente' => 'Frente',
			'Barbacoa' => 'Barbacoa',
			'Rejas' => 'Rejas',
			'Estufa' => 'Estufa',
			'Saneamiento' => 'Saneamiento',
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

		$criteria->compare('idinmueble',$this->idinmueble);
		$criteria->compare('MetrosCuadradosTerreno',$this->MetrosCuadradosTerreno);
		$criteria->compare('Piso',$this->Piso);
		$criteria->compare('Fondo',$this->Fondo);
		$criteria->compare('Frente',$this->Frente);
		$criteria->compare('Barbacoa',$this->Barbacoa);
		$criteria->compare('Rejas',$this->Rejas);
		$criteria->compare('Estufa',$this->Estufa);
		$criteria->compare('Saneamiento',$this->Saneamiento);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Inmcasa the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
