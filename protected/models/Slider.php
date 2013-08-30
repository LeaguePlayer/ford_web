<?php

/**
 * This is the model class for table "{{slider}}".
 *
 * The followings are the available columns in table '{{slider}}':
 * @property integer $id
 * @property string $image
 * @property string $title
 * @property string $html_content
 * @property string $link
 * @property integer $status
 * @property integer $sort
 * @property integer $create_time
 * @property integer $update_time
 */
class Slider extends EActiveRecord
{
	public function tableName()
	{
		return '{{slider}}';
	}

	
	public function rules()
	{
		return array(
			array('title', 'required'),
			array('status, sort, create_time, update_time', 'numerical', 'integerOnly'=>true),
			array('title, link', 'length', 'max'=>255),
			array('html_content', 'safe'),
			// The following rule is used by search().
			array('id, image, title, html_content, link, status, sort, create_time, update_time', 'safe', 'on'=>'search'),
		);
	}

	
	public function relations()
	{
		return array(
				'sites' => array(self::HAS_MANY, 'Objectrelations', 'post_id','condition'=>"post_type = 'Slider'"),
			'site' => array(self::HAS_ONE, 'Objectrelations', 'post_id', 'order'=>'site.id_site ASC','condition'=>"post_type = 'Slider'"),
		);
	}

	
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'image' => 'Изображение',
			'title' => 'Заголовок',
			'html_content' => 'Текст',
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
						'centeredpreview' => array(121, 69),
					),
					'big' => array(
						'centeredpreview' => array(1280, 548),
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
		$criteria->compare('html_content',$this->html_content,true);
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
		return 'Слайдер';
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
	
	public static function getSliders()
	{
		
		$model = self::model()->with( array('site' => array('condition' => "(id_site = :id_site or id_site=0)",'params'=>array(':id_site'=>Yii::app()->controller->id_site))) )->findAll(array('condition'=>'t.status=1','order'=>'t.sort ASC'));	
		
		
		
		
		
		return $model;
	}

}
