<?php

/**
 * This is the model class for table "{{cars}}".
 *
 * The followings are the available columns in table '{{cars}}':
 * @property integer $id
 * @property string $title
 * @property string $image
 * @property integer $price
 * @property string $video1
 * @property string $video2
 * @property string $video3
 * @property integer $gallery
 * @property string $meta_title
 * @property string $meta_keys
 * @property string $meta_desc
 * @property integer $status
 * @property integer $sort
 * @property integer $create_time
 * @property integer $update_time
 */
class Cars extends EActiveRecord
{
	public function tableName()
	{
		return '{{cars}}';
	}

	
	public function rules()
	{
		return array(
			array('title', 'required'),
			array('price, gallery, status, sort, create_time, update_time', 'numerical', 'integerOnly'=>true),
			array('title, path, big_image, image_video1, image_video2, image_video3, meta_title, link', 'length', 'max'=>255),
			array('video1, video2, video3, meta_keys, meta_desc, configurator', 'safe'),
			// The following rule is used by search().
			array('id, title, image, price, video1, video2, video3, gallery, meta_title, meta_keys, meta_desc, status, sort, create_time, update_time', 'safe', 'on'=>'search'),
		);
	}

	
	public function relations()
	{
		return array(
			'relativeCars' => array(self::STAT, 'Carssitespublic', 'id_car', 'condition'=>"status = 1"),
		);
	}

	
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Название автомобиля',
			'image' => 'Изображение автомобиля',
			'big_image'=>'Изображение в ленте',
			'price' => 'Выгода до',
			'video1' => 'Видео №1 код с youtube',
			'video2' => 'Видео №2 код с youtube',
			'video3' => 'Видео №3 код с youtube',
			'gallery' => 'Фотогалерея',
			'meta_title' => 'META_TITLE',
			'meta_keys' => 'META_KEYS',
			'meta_desc' => 'META_DESC',
			'status' => 'Статус',
			'sort' => 'Вес для сортировки',
			'create_time' => 'Дата создания',
			'update_time' => 'Дата последнего редактирования',
			'path'=>'PDF-брошюра',
			'link'=>'Ссылка на официальный сайт на данную модель',
			'configurator'=>'Ссылка на конфигуратор',
			'image_video1'=>'Заглушка изображение №1',
			'image_video2'=>'Заглушка изображение №2',
			'image_video3'=>'Заглушка изображение №3',
		);
	}
	
	
	public function behaviors()
	{
		return CMap::mergeArray(parent::behaviors(), array(
			'UploadableImageBehavior' => array(
				'class' => 'admin.behaviors.UploadableImageBehavior',
				'attributeName'=>'image',
				'versions' => array(
					'small' => array(
						'resize' => array(90, 90),
					),
					'medium' => array(
						'resize' => array(238, 233),
					)
				),
			),
			'promo1' => array(
				'class' => 'admin.behaviors.UploadableImageBehavior',
				'attributeName'=>'image_video1',
				'versions' => array(
					'small' => array(
						'centeredpreview' => array(294, 140),
					),
					
				),
			),
			
			'promo2' => array(
				'class' => 'admin.behaviors.UploadableImageBehavior',
				'attributeName'=>'image_video2',
				'versions' => array(
					'small' => array(
						'centeredpreview' => array(294, 140),
					),
					
				),
			),
			
			'promo3' => array(
				'class' => 'admin.behaviors.UploadableImageBehavior',
				'attributeName'=>'image_video3',
				'versions' => array(
					'small' => array(
						'centeredpreview' => array(294, 140),
					),
					
				),
			),
			
			'big_image_im' => array(
				'class' => 'admin.behaviors.UploadableImageBehavior',
				'attributeName'=>'big_image',
				'versions' => array(
					'small' => array(
						'centeredpreview' => array(200, 90),
					),
					'medium' => array(
						'centeredpreview' => array(1280, 423),
					)
				),
			),
			'galleryManager' => array(
				'class' => 'admin.extensions.imagesgallery.GalleryBehavior',
				'idAttribute' => 'gallery',
				'versions' => array(
					'small' => array(
						'adaptiveResize' => array(121, 69),
					),
					'medium' => array(
						'resize' => array(800, 700),
					)
				),
				'name' => true,
				'description' => true,
			),
		));
	}

	
	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('price',$this->price);
		$criteria->compare('video1',$this->video1,true);
		$criteria->compare('video2',$this->video2,true);
		$criteria->compare('video3',$this->video3,true);
		$criteria->compare('gallery',$this->gallery);
		$criteria->compare('meta_title',$this->meta_title,true);
		$criteria->compare('meta_keys',$this->meta_keys,true);
		$criteria->compare('meta_desc',$this->meta_desc,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('sort',$this->sort);
		$criteria->compare('create_time',$this->create_time);
		$criteria->compare('update_time',$this->update_time);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination' => array(
                'pageSize'=>1000,
            ),
			'sort'=>array(
				'defaultOrder'=>'t.create_time DESC',
			  )
		));
	}
	
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function translition()
	{
		return 'Автомобили';
	}
	
	public static function getCars($n = false)
	{
		
		$model = self::model()->findAll(array('condition'=>'t.status=1','order'=>'t.sort ASC'));	
		
		
		$array = CHtml::listData($model, 'id', 'title');
		$array[0] = "Не привязывать автомобиль";
		ksort($array);
		if(is_numeric($n))
			return $array[$n];
		else
			return $array;
	}
	
	
	public static function getCar($id)
	{
		
		$model = self::model()->with('relativeCars')->findByPk($id,"t.status=1");	
		
		if($model->relativeCars>0)
			return $model;
		else return false;
	}
	

}
