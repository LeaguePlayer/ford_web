<?php

/**
 * This is the model class for table "{{news}}".
 *
 * The followings are the available columns in table '{{news}}':
 * @property integer $id
 * @property integer $id_type
 * @property string $title
 * @property string $html_content
 * @property integer $id_car
 * @property string $image
 * @property string $super_img
 * @property string $super_title
 * @property string $super_short_desc
 * @property string $super_full_desc
 * @property string $super_work_to
 * @property string $meta_title
 * @property string $meta_keys
 * @property string $meta_desc
 * @property integer $status
 * @property integer $sort
 * @property integer $create_time
 * @property integer $update_time
 */
class News extends EActiveRecord
{
	public $super_stock;
	
	public function tableName()
	{
		return '{{news}}';
	}

	
	public function rules()
	{
		return array(
			array('html_content, title', 'required'),
			array('id_type, id_car, status, sort, super_show, create_time, update_time', 'numerical', 'integerOnly'=>true),
			array('title, super_img, super_title, super_work_to, meta_title', 'length', 'max'=>255),
			array('html_content, super_short_desc, super_full_desc, meta_keys, meta_desc', 'safe'),
			// The following rule is used by search().
			array('id, id_type, title, html_content, id_car, image, super_img, super_title, super_short_desc, super_full_desc, super_work_to, meta_title, meta_keys, super_show, meta_desc, status, sort, create_time, update_time', 'safe', 'on'=>'search'),
		);
	}

	
	public function relations()
	{
		return array(
			'sites' => array(self::HAS_MANY, 'Objectrelations', 'post_id','condition'=>"post_type = 'News'"),
			'site' => array(self::HAS_ONE, 'Objectrelations', 'post_id', 'order'=>'site.id_site ASC','condition'=>"post_type = 'News'"),
		);
	}

	
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_type' => 'Относится к',
			'title' => 'Заголовок',
			'html_content' => 'Текст',
			'id_car' => 'Привязать автомобиль',
			'image' => 'Изображение',
			'super_show' => 'Поместить в спецразмещение',
			'super_img' => 'Большое изображение для спецразмещения',
			'super_title' => 'Заголовок для спецразмещения',
			'super_short_desc' => 'Краткое описание',
			'super_full_desc' => 'Полное описание для спецразмещения',
			'super_work_to' => 'Действует до',
			'meta_title' => 'META_TITLE',
			'meta_keys' => 'META_KEYS',
			'meta_desc' => 'META_DESC',
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
				'attributeName'=>'image',
				'versions' => array(
					'small' => array(
						'centeredpreview' => array(110, 77),
					),
					'medium' => array(
						'resize' => array(270, 190),
					),
					'for_list' => array(
						'resize' => array(375, 210),
					),
					
					'big' => array(
						'centeredpreview' => array(1280, 516),
						//'cropFromCenter' => array(1280, 516),
						
					),
				),
			),
			'super_image_behaver' => array(
				'class' => 'admin.behaviors.UploadableImageBehavior',
				'attributeName'=>'super_img',
				'versions' => array(
					'small' => array(
						'centeredpreview' => array(90, 90),
					),
					'medium' => array(
						'resize' => array(270, 190),
					),
					'for_list' => array(
						'resize' => array(507, 301),
					),
				),
			),
		));
	}

	
	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('id_type',$this->id_type);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('html_content',$this->html_content,true);
		$criteria->compare('id_car',$this->id_car);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('super_show',$this->super_show,true);
		$criteria->compare('super_img',$this->super_img,true);
		$criteria->compare('super_title',$this->super_title,true);
		$criteria->compare('super_short_desc',$this->super_short_desc,true);
		$criteria->compare('super_full_desc',$this->super_full_desc,true);
		$criteria->compare('super_work_to',$this->super_work_to,true);
		$criteria->compare('meta_title',$this->meta_title,true);
		$criteria->compare('meta_keys',$this->meta_keys,true);
		$criteria->compare('meta_desc',$this->meta_desc,true);
		$criteria->compare('t.status',$this->status);
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
		
		return ($this->id_type == 1 ? "Акции" : "Новости");
	}
	
	public static function getCategories($n=false)
	{
		$result = array('Новость', 'Акция');
		
		if(is_numeric($n))
			return $result[$n];
		else
			return $result;	
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
		
		$this->super_work_to = date("Y-m-d H:i",strtotime($this->super_work_to));
		
		return true;
	}
	
	public function afterSave()
	{
		parent::afterSave();
		
		
		if($this->super_show == 1)
		{
			if(Yii::app()->controller->id_site==0)
			{
				$sites = $this->getRelated('sites');
				$array_for_sites = CHtml::listData($sites, 'id', 'id_site');
				asort($array_for_sites);
				
				if(count($array_for_sites)>0)
				{
					if($array_for_sites[0]==0)
					{
						self::model()->updateAll(array('super_show'=>0),'id != :id',array(':id'=>$this->id));
					}
					else
					{
						$string_for_sites = implode(", ",$array_for_sites);
						self::model()->with( array('site'=>array( 'condition'=>"id_site in :id_site",'params'=>array(':id_site'=>$string_for_sites) )) )->updateAll(array('super_show'=>0),'id != :id',array(':id'=>$this->id));
					}
				}
			}
			else
			{
				self::model()->with( array('site'=>array( 'condition'=>"id_site = :id_site",'params'=>array(':id_site'=>Yii::app()->controller->id_site) )) )->updateAll(array('super_show'=>0),'id != :id',array(':id'=>$this->id));
			}
		}
		
		
			
		
			
		
		
		
		return true;
	}
	
	
	public function getStock($unlimited = false)
	{
		
		if(!$unlimited)
		{
			if(!is_numeric(Yii::app()->controller->settings->rows_stock_in_main)) $rows = 2;
				else $rows = Yii::app()->controller->settings->rows_stock_in_main;
		}
		else $rows = 9999999;
		
		
		
		$model = self::model()->with( array('site' => array('condition' => "(id_site = :id_site or id_site=0)",'params'=>array(':id_site'=>Yii::app()->controller->id_site))) )->findAll(array('condition'=>'id_type=1 and super_show=0 and t.status=1 and (super_work_to>=NOW() or super_work_to = "1970-01-01 06:00:00")','order'=>'t.sort ASC','limit'=>$rows));	
		
		$this->super_stock = self::model()->with( array('site' => array('condition' => "(id_site = :id_site or id_site=0)",'params'=>array(':id_site'=>Yii::app()->controller->id_site))) )->find(array('condition'=>'id_type=1 and super_show=1  and t.status=1 and (super_work_to>=NOW() or super_work_to = "1970-01-01 06:00:00")'));
		
		
	
		
		return $model;
	}
	
	
	public function getNews()
	{
		
		$model = self::model()->with( array('site' => array('condition' => "(id_site = :id_site or id_site=0)",'params'=>array(':id_site'=>Yii::app()->controller->id_site))) )->findAll(array('condition'=>'id_type=0 and t.status=1','order'=>'t.create_time DESC','limit'=>4));	
		
		
		
		
		
		return $model;
	}

}
