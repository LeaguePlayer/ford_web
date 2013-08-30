<?php

/**
 * This is the model class for table "{{orders}}".
 *
 * The followings are the available columns in table '{{orders}}':
 * @property integer $id
 * @property integer $id_type
 * @property string $car
 * @property string $name
 * @property string $phone
 * @property string $email
 * @property string $comment
 * @property integer $status
 * @property integer $sort
 * @property integer $create_time
 * @property integer $update_time
 */
class Orders extends EActiveRecord
{
	public $verifyCode;
	
	
	

	public static function getStatusAliases($status = -1)
	{
		$aliases = array(
			self::STATUS_CLOSED => 'Новая заявка',
			self::STATUS_PUBLISH => 'Обработана',
            self::STATUS_REMOVED => 'Удалена',
			);

		if ($status > -1)
			return $aliases[$status];
		
		return $aliases;
	}

	
	
	public function tableName()
	{
		return '{{orders}}';
	}

	
	public function rules()
	{
		return array(
			array(
					'verifyCode',
					'captcha',
					// авторизованным пользователям код можно не вводить
					'allowEmpty'=>array_search(Yii::app()->controller->getAction()->getId(), array( 1=>"testdrive", 2=>"update" ) )  || !CCaptcha::checkRequirements(),
				),
			array('phone, name', 'required'),
			array('email', 'email','message'=>"Введеный Вами электронный адрес - неверный"),
			array('id_type, id_site, status, sort, create_time, update_time', 'numerical', 'integerOnly'=>true),
			array('car, name, phone, email', 'length', 'max'=>255),
			array('comment', 'safe'),
			// The following rule is used by search().
			array('id, id_site, id_type, car, name, phone, email, comment, status, sort, create_time, update_time', 'safe', 'on'=>'search'),
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
			'id_type' => 'Заявка относится к',
			'car' => 'Автомобиль',
			'id_site'=>'Принадлежит сайту',
			'name' => 'Имя',
			'phone' => 'Телефон',
			'email' => 'E-Mail',
			'comment' => 'Комментарий',
			'status' => 'Статус',
			'sort' => 'Вес для сортировки',
			'create_time' => 'Дата создания',
			'update_time' => 'Дата последнего редактирования',
			'verifyCode' => 'Код проверки',
		);
	}
	
	

	
	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('id_type',$this->id_type);
		$criteria->compare('id_site',$this->id_site);
		$criteria->compare('car',$this->car,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('comment',$this->comment,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('sort',$this->sort);
		$criteria->compare('create_time',$this->create_time);
		$criteria->compare('update_time',$this->update_time);

		
		$criteria->addCondition("id_site = :id_site");
		
		$criteria->params = array(':id_site'=>Yii::app()->controller->currentSiteId);

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
		return 'Заявки';
	}
	
	
	public static function returnOrderTypes($n=false)
	{
		
		$result = array(
							'Тест-Драйв',
							'Обратная связь',
							'Страхование',
							'Кредит',
		);
		
		
		if(is_numeric($n))
			return $result[$n];
		else return $result;
	}

}
