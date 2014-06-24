<?php

/**
 * This is the model class for table "inmcampos".
 *
 * The followings are the available columns in table 'inmcampos':
 * @property integer $idInmueble
 * @property double $Hectareas
 * @property double $MetrosCuadradosTerreno
 * @property double $MetrosConstruidos
 * @property integer $Luz
 * @property integer $ViviendaPatronal
 * @property integer $ViviendaCapataz
 * @property string $EstadoAlambrado
 * @property double $IndiceCONEAT
 * @property integer $Tajamar
 * @property integer $Caniada
 * @property integer $PozoAgua
 * @property integer $Galpones
 * @property string $Extras
 *
 * The followings are the available model relations:
 * @property Inmueble $idInmueble0
 */
class Inmcampos extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'inmcampos';
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
			array('idInmueble, Luz, ViviendaPatronal, ViviendaCapataz, Tajamar, Caniada, PozoAgua, Galpones', 'numerical', 'integerOnly'=>true),
			array('Hectareas, MetrosCuadradosTerreno, MetrosConstruidos, IndiceCONEAT', 'numerical'),
			array('EstadoAlambrado', 'length', 'max'=>50),
			array('Extras', 'length', 'max'=>500),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idInmueble, Hectareas, MetrosCuadradosTerreno, MetrosConstruidos, Luz, ViviendaPatronal, ViviendaCapataz, EstadoAlambrado, IndiceCONEAT, Tajamar, Caniada, PozoAgua, Galpones, Extras', 'safe', 'on'=>'search'),
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
			'idInmueble0' => array(self::BELONGS_TO, 'Inmueble', 'idInmueble'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idInmueble' => 'Id Inmueble',
			'Hectareas' => 'Hectareas',
			'MetrosCuadradosTerreno' => 'Metros Cuadrados Terreno',
			'MetrosConstruidos' => 'Metros Construidos',
			'Luz' => 'Luz',
			'ViviendaPatronal' => 'Vivienda Patronal',
			'ViviendaCapataz' => 'Vivienda Capataz',
			'EstadoAlambrado' => 'Estado Alambrado',
			'IndiceCONEAT' => 'Indice Coneat',
			'Tajamar' => 'Tajamar',
			'Caniada' => 'Caniada',
			'PozoAgua' => 'Pozo Agua',
			'Galpones' => 'Galpones',
			'Extras' => 'Extras',
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
		$criteria->compare('Hectareas',$this->Hectareas);
		$criteria->compare('MetrosCuadradosTerreno',$this->MetrosCuadradosTerreno);
		$criteria->compare('MetrosConstruidos',$this->MetrosConstruidos);
		$criteria->compare('Luz',$this->Luz);
		$criteria->compare('ViviendaPatronal',$this->ViviendaPatronal);
		$criteria->compare('ViviendaCapataz',$this->ViviendaCapataz);
		$criteria->compare('EstadoAlambrado',$this->EstadoAlambrado,true);
		$criteria->compare('IndiceCONEAT',$this->IndiceCONEAT);
		$criteria->compare('Tajamar',$this->Tajamar);
		$criteria->compare('Caniada',$this->Caniada);
		$criteria->compare('PozoAgua',$this->PozoAgua);
		$criteria->compare('Galpones',$this->Galpones);
		$criteria->compare('Extras',$this->Extras,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Inmcampos the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
