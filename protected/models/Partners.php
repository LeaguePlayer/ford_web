<?php

/**
 * This is the model class for table "{{partners}}".
 *
 * The followings are the available columns in table '{{partners}}':
 * @property integer $id
 * @property string $title
 * @property string $image
 * @property string $link
 * @property integer $status
 * @property integer $sort
 * @property integer $create_time
 * @property integer $update_time
 */
class Partners extends EActiveRecord
{
	public function tableName()
	{
		return '{{partners}}';
	}

	
	public function rules()
	{
		return array(
			array('title', 'required'),
			array('status, sort, create_time, update_time', 'numerical', 'integerOnly'=>true),
			array('title, link', 'length', 'max'=>255),
			// The following rule is used by search().
			array('id, title, image, link, status, sort, create_time, update_time', 'safe', 'on'=>'search'),
		);
	}

	
	public function relations()
	{
		return array(
			'sites' => array(self::HAS_MANY, 'Objectrelations', 'post_id','condition'=>"post_type = 'Partners'"),
			'site' => array(self::HAS_ONE, 'Objectrelations', 'post_id', 'order'=>'site.id_site ASC','condition'=>"post_type = 'Partners'"),
		);
	}

	
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Заголовок партнера',
			'image' => 'Логотип партнера',
			'link' => 'Ссылка',
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
						'resize' => array(90, 90),
					),
					'medium' => array(
						'resize' => array(101, 87),
					)
				),
			),
		));
	}

	
	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('link',$this->link,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('sort',$this->sort);
		$criteria->compare('create_time',$this->create_time);
		$criteria->compare('update_time',$this->update_time);
		
		$criteria->with = array('site' => array('condition'=>"(id_site = :id_site or id_site=0)",'params'=>array(':id_site'=>Yii::app()->controller->currentSiteId)) );

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
		return 'Партнеры';
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
	
	public static function getPartners()
	{
		
		
		
		$models = self::model()->with( array('site' => array('condition' => "(id_site = :id_site or id_site=0)",'params'=>array(':id_site'=>Yii::app()->controller->id_site))) )->findAll(array('condition'=>"t.status=1 and image!=''",'order'=>'t.sort ASC'));	
		
	
		
		return $models;
	}

}
