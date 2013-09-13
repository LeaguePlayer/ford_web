<?php

/**
 * This is the model class for table "{{complectation_values}}".
 *
 * The followings are the available columns in table '{{complectation_values}}':
 * @property integer $id
 * @property integer $id_complectation
 * @property integer $id_category_public
 * @property string $param
 * @property integer $value
 * @property integer $status
 * @property integer $sort
 * @property integer $create_time
 * @property integer $update_time
 */
class Complectationvalues extends EActiveRecord
{
	public function tableName()
	{
		return '{{complectation_values}}';
	}

	
	public function rules()
	{
		return array(
			array('param, value', 'required'),
			array('id_complectation, id_category_public, status, sort, create_time, update_time', 'numerical', 'integerOnly'=>true),
			array('param, property, value', 'length', 'max'=>255),
			// The following rule is used by search().
			array('id, id_complectation, id_category_public, param, value, status, sort, create_time, update_time', 'safe', 'on'=>'search'),
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
			'id_complectation' => 'Соотвествует комплектации',
			'id_category_public' => 'Отображать в кратком обзоре в разделе',
			'param' => 'Опция',
			'value' => 'Значение опции',
			'status' => 'Статус',
			'sort' => 'Вес для сортировки',
			'create_time' => 'Дата создания',
			'update_time' => 'Дата последнего редактирования',
			'property'=>'Свойство',
		);
	}
	
	

	
	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('id_complectation',$this->id_complectation);
		$criteria->compare('id_category_public',$this->id_category_public);
		$criteria->compare('param',$this->param,true);
		$criteria->compare('value',$this->value);
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
		return 'Опции комплектации';
	}
	
	public static function getValues($n=false)
	{
		
		$array = array(
							0=>'Не имеет значение',
							1=>'Идет в комплектации',
							2=>'Возможна установка',
						);
		
		
		
		if(is_numeric($n))
			return $array[$n];
		else
			return $array;
	}
	
	
	public static function getCategory($n=false)
	{
		
		$array = array(
							'Не показывается в кратком обзоре',
							'Расход в городе',
							'Расход на трассе',
							'Разгон 0-100 км/ч',
							'Выбросы CO2',
							'Число дверей',
							'Количество мест',
							
						);
		
		
		
		if(is_numeric($n))
			return $array[$n];
		else
			return $array;
	}
	
	public static function getOptions($id_car)
	{
		$avail_compl = Carcomplecations::model()->findAll("id_car = :id_car", array( ':id_car'=>$id_car ));
		$array_avail_compl = CHtml::listData($avail_compl, 'id', 'id');
		$string_avail_compl = implode(', ', $array_avail_compl);
	
		$models = self::model()->findAll( array( 'condition'=>"id_category_public!=0 and id_complectation in ({$string_avail_compl})", 'select'=>'IF( min( CAST(value as Unsigned) )!=max( CAST(value as Unsigned) ), Concat( min( CAST(value as Unsigned) ),"-", max( CAST(value as Unsigned) ) ), min( CAST(value as Unsigned) )) as value, id_category_public', 'group'=>'id_category_public' ) );
		
		$result = CHtml::listData($models, 'id_category_public', 'value');
		
		
		return $result;
			
	}
	
	public function beforeDelete()
    {
        return true;
    }

}
