<?php

/**
 * This is the model class for table "{{stuff}}".
 *
 * The followings are the available columns in table '{{stuff}}':
 * @property integer $id
 * @property string $image
 * @property string $title
 * @property string $short_desc
 * @property integer $status
 * @property integer $sort
 * @property integer $create_time
 * @property integer $update_time
 */
class Stuff extends EActiveRecord
{
	public function tableName()
	{
		return '{{stuff}}';
	}

	
	public function rules()
	{
		return array(
			array('title', 'required'),
			array('status, sort, create_time, update_time', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>255),
			array('short_desc', 'safe'),
			// The following rule is used by search().
			array('id, image, title, short_desc, status, sort, create_time, update_time', 'safe', 'on'=>'search'),
		);
	}

	
	public function relations()
	{
		return array(
			'sites' => array(self::HAS_MANY, 'Objectrelations', 'post_id','condition'=>"post_type = 'Stuff'"),
			'site' => array(self::HAS_ONE, 'Objectrelations', 'post_id', 'order'=>'site.id_site ASC','condition'=>"post_type = 'Stuff'"),
		);
	}

	
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'image' => 'Фотография сотрудника',
			'title' => 'Фамилия Имя Отчество',
			'short_desc' => 'Занимаемая должность',
			'status' => 'Статус',
			'sort' => 'Вес для сортировки',
			'create_time' => 'Дата создания',
			'update_time' => 'Дата последнего редактирования',
		);
	}
	
	
	public function behaviors()
	{
		return CMap::mergeArray(parent::behaviors(), array(
			'UploadableImageBehavior' => array(
				'class' => 'admin.behaviors.UploadableImageBehavior',
				'versions' => array(
					'small' => array(
						'centeredpreview' => array(90, 90),
					),
					'medium' => array(
						'centeredpreview' => array(234, 144),
					)
				),
			),
		));
	}

	
	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('short_desc',$this->short_desc,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('sort',$this->sort);
		$criteria->compare('create_time',$this->create_time);
		$criteria->compare('update_time',$this->update_time);

		if(Yii::app()->user->id_site!=0)
		{
			$criteria->with = array('site' => array('condition'=>"id_site = :id_site",'params'=>array(':id_site'=>Yii::app()->controller->id_site)) );
		}

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
		return 'Сотрудники';
	}
	
	
	public function getModelName()
	{
		return __CLASS__;
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
	
	public function getStuff()
	{
		$model = self::model()->with( array('sites' => array('condition' => "(id_site = :id_site or id_site=0)",'params'=>array(':id_site'=>Yii::app()->controller->id_site))) )->findAll(array('condition'=>'t.status=1','order'=>'t.sort ASC'));	
		
		return $model;
	}


}
