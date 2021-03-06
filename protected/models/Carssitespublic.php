<?php

/**
 * This is the model class for table "{{cars_sites_public}}".
 *
 * The followings are the available columns in table '{{cars_sites_public}}':
 * @property integer $id
 * @property integer $id_car
 * @property integer $id_site
 * @property integer $id_category
 * @property integer $status
 * @property integer $sort
 * @property integer $create_time
 * @property integer $update_time
 */
class Carssitespublic extends EActiveRecord
{
	public $sync;
	
	public function tableName()
	{
		return '{{cars_sites_public}}';
	}

	
	public function rules()
	{
		return array(
			array('id_car, id_site, id_engine, id_category, avail_now, price, status, sort, create_time, id_complecations, id_akpp, id_body, update_time', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			array('id, id_car, id_site, avail_now, id_category, status, sort, create_time, update_time', 'safe', 'on'=>'search'),
		);
	}

	
	public function relations()
	{
		return array(
			'car' => array(self::HAS_ONE, 'Cars', '', 'on'=>'t.id_car = car.id'),
			'complectation' => array(self::HAS_ONE, 'Carcomplecations', '', 'on'=>'t.id_complecations = complectation.id'),
			'akpp' => array(self::HAS_ONE, 'Carakpp', '', 'on'=>'t.id_akpp = akpp.id'),
			'body' => array(self::HAS_ONE, 'Carbody', '', 'on'=>'t.id_body = body.id'),
			'engine' => array(self::HAS_ONE, 'Engine', '', 'on'=>'t.id_engine = engine.id'),
		);
	}

	
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_car' => 'Автомобиль',
			'id_site' => 'ID_site',
			'id_category' => 'Относится к',
			'status' => 'Статус',
			'sort' => 'Вес для сортировки',
			'create_time' => 'Дата создания',
			'update_time' => 'Дата последнего редактирования',
			'avail_now'=>'В салоне есть в наличии',
			'id_complecations' => 'Комплектация',
			'id_akpp' => 'Коробка передач',
			'id_body' => 'Кузов',
			'price'=>'Стоимость',
			'id_engine'=>'Мощность двигателя',
			'sync'=>'Создать запись для всех сайтов',
		);
	}
	
	

	
	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('id_car',$this->id_car);
		$criteria->compare('id_site',$this->id_site);
		$criteria->compare('id_category',$this->id_category);
		$criteria->compare('status',$this->status);
		$criteria->compare('sort',$this->sort);
		$criteria->compare('create_time',$this->create_time);
		$criteria->compare('update_time',$this->update_time);
		$criteria->compare('id_complecations',$this->id_complecations);
		$criteria->compare('id_akpp',$this->id_akpp);
		$criteria->compare('id_body',$this->id_body);
		$criteria->compare('price',$this->price);
		$criteria->compare('avail_now',$this->avail_now);
		
		$id = Yii::app()->controller->currentSiteId;
		$criteria->addCondition("id_site = {$id}");
		
	//	$criteria->params = array(':id_site'=>Yii::app()->controller->currentSiteId);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination' => array(
                'pageSize'=>1000,
            ),
			'sort'=>array(
				'defaultOrder'=>'t.sort ASC',
			  )
		));
	}
	
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function translition()
	{
		$array = array(1=>'Автомобили', 2=>'Автомобили в наличии', 3=>'Коммерческие автомобили');
		
		return $array[$this->id_category];
	}
	
	public function beforeSave()
	{
		parent::beforeSave();
		
		if($this->isNewRecord)
		{
			$get_last_sort_value = self::model()->find(array('order'=>'sort DESC'))->sort;
			$this->sort = $get_last_sort_value+1;
		}
		
		
		return true;
	}
	
	
	public static function getAvailCars($id_category)
	{
		$avail_now = "0, 1";
		if($id_category==2)
		{
				$id_category = "1,3";
				$avail_now = "1";
		}
		//echo Yii::app()->controller->id_site;die();
		
		
		$model = self::model()->with('car')->findAll(array('condition'=>"t.status=1 and car.big_image!='' and image!='' and id_site = :id_site and id_category in ({$id_category}) and avail_now in ({$avail_now})",'order'=>'t.price ASC', 'select'=>'*,min(t.price) as price', 'group'=>'id_car', 'params'=>array(':id_site'=>Yii::app()->controller->id_site)));	
		
	
		
		return $model;
	}
	
	public static function getComplectationsByCar($id, $avail_now=false)
	{
		if($avail_now) $ADD_QUERY = "and avail_now = 1";
		
		$models = self::model()->with('complectation','akpp','body','engine')->findAll(array( 'condition'=>"t.id_car=:id_car and t.status=1 and t.id_site=:id_site {$ADD_QUERY}", 'order'=>'t.sort ASC', 'params'=>array( ':id_car'=>$id, ':id_site'=>Yii::app()->controller->id_site ) ));
		
		return $models;	
	}

}
