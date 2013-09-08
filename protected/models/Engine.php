<?php

/**
 * This is the model class for table "{{engine}}".
 *
 * The followings are the available columns in table '{{engine}}':
 * @property integer $id
 * @property integer $id_car
 * @property string $title
 * @property integer $status
 * @property integer $sort
 * @property integer $create_time
 * @property integer $update_time
 */
class Engine extends EActiveRecord
{
	public function tableName()
	{
		return '{{engine}}';
	}

	
	public function rules()
	{
		return array(
			array('id_car, status, sort, create_time, update_time', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>255),
			// The following rule is used by search().
			array('id, id_car, title, status, sort, create_time, update_time', 'safe', 'on'=>'search'),
		);
	}

	
	public function relations()
	{
		return array(
		);
	}

	
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_car' => 'Выбрать автомобиль',
			'title' => 'Мощность двигателя',
			'status' => 'Статус',
			'sort' => 'Вес для сортировки',
			'create_time' => 'Дата создания',
			'update_time' => 'Дата последнего редактирования',
		);
	}
	
	

	
	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('id_car',$this->id_car);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('sort',$this->sort);
		$criteria->compare('create_time',$this->create_time);
		$criteria->compare('update_time',$this->update_time);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function translition()
	{
		return 'Мощность двигателя';
	}
	
	public static function getEngine($id_car)
	{
		
		$model = self::model()->findAll(array('condition'=>'id_car = :id_car','order'=>'t.create_time DESC','params'=>array(':id_car'=>$id_car)));	
		
		
		$array = CHtml::listData($model, 'id', 'title');
		return $array;
	}
	
	public static function getForList($n=false)
	{
		
		$model = self::model()->findAll();	
		
		
		$array = CHtml::listData($model, 'id', 'title');
		if(is_numeric($n))
			return $array[$n];
		else
			return $array;
	}

}
