<?php

/**
 * This is the model class for table "{{static_page}}".
 *
 * The followings are the available columns in table '{{static_page}}':
 * @property integer $id
 * @property string $title
 * @property string $html_content
 * @property string $image
 * @property integer $status
 * @property string $meta_title
 * @property string $meta_keys
 * @property string $meta_desc
 * @property integer $sort
 * @property integer $create_time
 * @property integer $update_time
 */
class Staticpage extends EActiveRecord
{
	public function tableName()
	{
		return '{{static_page}}';
	}

	
	public function rules()
	{
		return array(
			array('meta_alias','unique'),
			array('title, html_content', 'required'),
			array('status, system_group, system_page,  sort, create_time, update_time', 'numerical', 'integerOnly'=>true),
			array('title, meta_title, meta_alias', 'length', 'max'=>255),
			array('html_content, meta_keys, meta_desc', 'safe'),
			// The following rule is used by search().
			array('id, system_group, title, system_page, html_content, image, status, meta_title, meta_keys, meta_desc, sort, create_time, update_time', 'safe', 'on'=>'search'),
		);
	}

	
	public function relations()
	{
		return array(
				'sites' => array(self::HAS_MANY, 'Objectrelations', 'post_id','condition'=>"post_type = 'Staticpage'"),
			'site' => array(self::HAS_ONE, 'Objectrelations', 'post_id', 'order'=>'site.id_site ASC','condition'=>"post_type = 'Staticpage'"),
		);
	}

	
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Заголовок страницы',
			'html_content' => 'Текст',
			'image' => 'Изображение',
			'status' => 'Статус',
			'meta_title' => 'META_TITLE',
			'meta_keys' => 'META_KEYS',
			'meta_desc' => 'META_DESC',
			'meta_alias'=>'META_ALIAS',
			'sort' => 'Вес для сортировки',
			'create_time' => 'Дата создания',
			'update_time' => 'Дата последнего редактирования',
			'system_page' => 'Использовать как системную страницу',
			'system_group' => 'Системная группа',
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
					
					'big' => array(
						'centeredpreview' => array(1280, 516),
						//'cropFromCenter' => array(1280, 516),
						
					),
				),
			),
		));
	}

	
	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('html_content',$this->html_content,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('t.status',$this->status);
		$criteria->compare('meta_title',$this->meta_title,true);
		$criteria->compare('meta_keys',$this->meta_keys,true);
		$criteria->compare('meta_desc',$this->meta_desc,true);
		$criteria->compare('sort',$this->sort);
		$criteria->compare('create_time',$this->create_time);
		$criteria->compare('update_time',$this->update_time);
		$criteria->compare('system_page',$this->system_page);
		
		
		
			$criteria->with = array('site' => array('condition'=>"(id_site = :id_site or id_site = 0)",'params'=>array(':id_site'=>Yii::app()->controller->currentSiteId)) );
		

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination' => array(
                'pageSize'=>1000,
            ),
		));
	}
	
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function translition()
	{
		return 'Страницы';
	}
	
	public function getModelName()
	{
		return __CLASS__;
	}
	
	
	public static function getSystemPage($id)
	{
		$page = self::model()->with(array('site' => array('condition'=>"id_site = :id_site",'params'=>array(':id_site'=>Yii::app()->controller->id_site)) ))->find("system_page = 1 and system_group = :id_system_group",array(':id_system_group'=>$id));	
		
		return $page;
	}

}
