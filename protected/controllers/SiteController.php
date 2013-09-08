<?php

class SiteController extends Controller
{
	public $layout = '//layouts/main';
	
	const TYPE_TEST_DRIVE = 0;
	const TYPE_FEEDBACK = 1;
	const TYPE_STRAHOVANIE = 2;
	const TYPE_CREDIT = 3;
	const TYPE_BUY = 4;

 
  
	
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	 /*
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		$news_stocks = new News;
		$menu = new Menu;
		
		$data['stock'] = $news_stocks->getStock();
		$data['super_stock'] = $news_stocks->super_stock;
		$data['menu'] = $menu->getMenu(true);
		$data['slider'] = Slider::getSliders();
		
		
					if($this->settings->meta_desc)
						Yii::app()->clientScript->registerMetaTag($this->settings->meta_desc, 'description');            
					if($this->settings->meta_keys)
						Yii::app()->clientScript->registerMetaTag($this->settings->meta_keys, 'keywords');
					if($this->settings->meta_title) Yii::app()->controller->title=$this->settings->meta_title;
						else Yii::app()->controller->title = Yii::app()->name;
		
	
		$this->bottom_list['title'] = "НОВОСТИ";
		$this->bottom_list['data'] = $news_stocks->getNews();
		$this->bottom_list['link'] = "news";
		$this->bottom_list['link_text'] = "Архив новостей";
		
		
		
		
		$this->render('index',array('data'=>$data));
	}
	
	public function actionDealer()
	{
			$news_stocks = new News;
			$menu = new Menu;
			$stuff = new Stuff;
			
			$data['menu'] = $menu->getMenu();
			$data['stuff'] = $stuff->getStuff();
			$data['partners'] = Partners::getPartners();
			$data['page'] = Staticpage::getSystemPage(26);
			fnc::registredSEO($data['page']);
			
			$data['camera'] = Staticpage::getSystemPage(1);
	
			$this->bottom_list['title'] = "НОВОСТИ";
			$this->bottom_list['data'] = $news_stocks->getNews();
			$this->bottom_list['link'] = "news";
			$this->bottom_list['link_text'] = "Архив новостей";
			
			$this->render('dealer',array('data'=>$data));
	}
	
	public function actionOwner()
	{
			$news_stocks = new News;
			$menu = new Menu;
			$stuff = new Stuff;
			
			$data['menu'] = $menu->getMenu();
			$data['stuff'] = $stuff->getStuff();
			
			$data['page'] = Staticpage::getSystemPage(19);
			fnc::registredSEO($data['page']);
			
	
			$this->bottom_list['title'] = "НОВОСТИ";
			$this->bottom_list['data'] = $news_stocks->getNews();
			$this->bottom_list['link'] = "news";
			$this->bottom_list['link_text'] = "Архив новостей";
			
			$this->render('owner',array('data'=>$data));
	}
	
	public function actionCars($id_category)
	{
			$cars = new Carssitespublic;
			$data['avail_cars'] = $cars->getAvailCars($id_category); 
		
			if(Yii::app()->request->isAjaxRequest)
			{
				$this->renderPartial('/cars/_cars',array('cars'=>$data['avail_cars']));
				return true;	
			}
			
			$news_stocks = new News;
			$menu = new Menu;
		//	$stuff = new Stuff;
			
			
			$data['menu'] = $menu->getMenu();
		//	$data['stuff'] = $stuff->getStuff();
			
			
			
		
	
			$this->bottom_list['title'] = "НОВОСТИ";
			$this->bottom_list['data'] = $news_stocks->getNews();
			$this->bottom_list['link'] = "news";
			$this->bottom_list['link_text'] = "Архив новостей";
			
			$this->render('cars',array('data'=>$data));
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			$news_stocks = new News;
			$this->bottom_list['title'] = "НОВОСТИ";
			$this->bottom_list['data'] = $news_stocks->getNews();
			$this->bottom_list['link'] = "news";
			$this->bottom_list['link_text'] = "Архив новостей";
		
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}
	
	
	
	public function actionThanks()
	{
		
			$news_stocks = new News;
			$menu = new Menu;
			$stuff = new Stuff;
			
			
			$data['menu'] = $menu->getMenu();
			$data['stuff'] = $stuff->getStuff();
			
			$data['page'] = Staticpage::getSystemPage(2);
			fnc::registredSEO($data['page']);
		
	
			$this->bottom_list['title'] = "НОВОСТИ";
			$this->bottom_list['data'] = $news_stocks->getNews();
			$this->bottom_list['link'] = "news";
			$this->bottom_list['link_text'] = "Архив новостей";
			
			$this->render('thanks',array('data'=>$data));	
	}
	
	
	public function actionTestDrive($car= false)
	{
		//fnc::mpr($_POST);
		
	
		$this->settings->access_to_test_drive = unserialize($this->settings->access_to_test_drive);
			
		
		
		$model = new Orders;
		
		
		
		if(isset($_POST['data']))
		{
			
			$model->attributes=$_POST['data'];
			$model->status = 0;
			$model->id_type = self::TYPE_TEST_DRIVE;
			$model->id_site = $this->id_site;
			
			if(is_numeric($car)) 
			{
				
				$model->car = Cars::model()->findByPk($car)->title;
				
			}
			
			if($model->save())
			{
				// отправляем письмо 
				$mail = ( !empty($this->settings->email_test_drive) ? $this->settings->email_test_drive : $this->settings->email_main_admin );
				$fnc = new Fnc;
				$domains = $fnc->returnDomains();
				$current_domain = $domains[$this->id_site];
				$subject = "Заявка с сайта";
				$message = "Вам пришла заявка с сайта перейдите по <a href='http://{$current_domain}/admin/orders/list/'>ссылке</a>";
				SiteHelper::sendMail($subject,$message,$mail);
				
				
				
				$this->redirect(array('/thanks?test_drive'));
			}
		}
		
		
		
		if(Yii::app()->request->isAjaxRequest)
		{
			$this->renderPartial('/modal_views/test_drive', array('model'=>$model, 'car'=>$car));
		}
		else
		{
			$news_stocks = new News;
			$menu = new Menu;
			$stuff = new Stuff;
			
			$data['menu'] = $menu->getMenu();
			$data['stuff'] = $stuff->getStuff();
			
			
		
	
			$this->bottom_list['title'] = "НОВОСТИ";
			$this->bottom_list['data'] = $news_stocks->getNews();
			$this->bottom_list['link'] = "news";
			$this->bottom_list['link_text'] = "Архив новостей";
			
			Yii::app()->clientScript->registerCssFile( $this->getAssetsUrl()."/css/bootstrap.min.css" );
			
			$this->render('/modal_views/test_drive', array('model'=>$model, 'car'=>$car));	
		}
		
	}
	
	
	public function actionFeedback()
	{
		//fnc::mpr($_POST);
		
		
		
		$model = new Orders;
		
		if(isset($_POST['Orders']))
		{
			
			$model->attributes=$_POST['Orders'];
			$model->status = 0;
			$model->id_type = self::TYPE_FEEDBACK;
			$model->id_site = $this->id_site;
			
			if($model->save())
			{
				// отправляем письмо 
				$mail = ( !empty($this->settings->email_feedback) ? $this->settings->email_feedback : $this->settings->email_main_admin );
				$fnc = new Fnc;
				$domains = $fnc->returnDomains();
				$current_domain = $domains[$this->id_site];
				$subject = "Заявка с сайта";
				$message = "Вам пришла заявка с сайта перейдите по <a href='http://{$current_domain}/admin/orders/list/'>ссылке</a>";
				SiteHelper::sendMail($subject,$message,$mail);
				
				
				
				$this->redirect(array('/thanks?feedback'));
			}
		}
		
		if(Yii::app()->request->isAjaxRequest)
		{
			$this->renderPartial('/modal_views/feedback', array('model'=>$model, 'type'=>'feedback'));
		}
		else
		{
			$news_stocks = new News;
			$menu = new Menu;
			$stuff = new Stuff;
			
			$data['menu'] = $menu->getMenu();
			$data['stuff'] = $stuff->getStuff();
			
			$data['car_menu'] = $car_model; // потом исправить эту штуку
		
	
			$this->bottom_list['title'] = "НОВОСТИ";
			$this->bottom_list['data'] = $news_stocks->getNews();
			$this->bottom_list['link'] = "news";
			$this->bottom_list['link_text'] = "Архив новостей";
			
			Yii::app()->clientScript->registerCssFile( $this->getAssetsUrl()."/css/bootstrap.min.css" );
			
			$this->render('/modal_views/feedback', array('model'=>$model, 'type'=>'feedback'));	
		}
		
	}
	
	
	
	public function actionStrahovanie()
	{
		//fnc::mpr($_POST);
		
		
		
		$model = new Orders;
		
		if(isset($_POST['Orders']))
		{
			
			$model->attributes=$_POST['Orders'];
			$model->status = 0;
			$model->id_type = self::TYPE_STRAHOVANIE;
			$model->id_site = $this->id_site;
			
			if($model->save())
			{
				// отправляем письмо 
				$mail = ( !empty($this->settings->email_strahovanie) ? $this->settings->email_strahovanie : $this->settings->email_main_admin );
				$fnc = new Fnc;
				$domains = $fnc->returnDomains();
				$current_domain = $domains[$this->id_site];
				$subject = "Заявка с сайта";
				$message = "Вам пришла заявка с сайта перейдите по <a href='http://{$current_domain}/admin/orders/list/'>ссылке</a>";
				SiteHelper::sendMail($subject,$message,$mail);
				
				
				
				$this->redirect(array('/thanks?strahovanie'));
			}
		}
		
		if(Yii::app()->request->isAjaxRequest)
		{
			$this->renderPartial('/modal_views/feedback', array('model'=>$model, 'type'=>'strahovanie'));
		}
		else
		{
			$news_stocks = new News;
			$menu = new Menu;
			$stuff = new Stuff;
			
			$data['menu'] = $menu->getMenu();
			$data['stuff'] = $stuff->getStuff();
			
			$data['car_menu'] = $car_model; // потом исправить эту штуку
		
	
			$this->bottom_list['title'] = "НОВОСТИ";
			$this->bottom_list['data'] = $news_stocks->getNews();
			$this->bottom_list['link'] = "news";
			$this->bottom_list['link_text'] = "Архив новостей";
			
			Yii::app()->clientScript->registerCssFile( $this->getAssetsUrl()."/css/bootstrap.min.css" );
			
			$this->render('/modal_views/feedback', array('model'=>$model, 'type'=>'strahovanie'));	
		}
		
	}
	
	
	
	public function actionCredit($id_car=false)
	{
		//fnc::mpr($_POST);
		
		
		
		$model = new Orders;
		
		if(isset($_POST['Orders']))
		{
			
			$model->attributes=$_POST['Orders'];
			$model->status = 0;
			$model->id_type = self::TYPE_CREDIT;
			$model->id_site = $this->id_site;
			
			if(is_numeric($id_car)) $model->car = Cars::model()->findByPk($id_car)->title;
			
			if($model->save())
			{
				// отправляем письмо 
				$mail = ( !empty($this->settings->email_credit) ? $this->settings->email_credit : $this->settings->email_main_admin );
				$fnc = new Fnc;
				$domains = $fnc->returnDomains();
				$current_domain = $domains[$this->id_site];
				$subject = "Заявка с сайта";
				$message = "Вам пришла заявка с сайта перейдите по <a href='http://{$current_domain}/admin/orders/list/'>ссылке</a>";
				SiteHelper::sendMail($subject,$message,$mail);
				
				
				
				$this->redirect(array('/thanks?credit'));
			}
		}
		
		if(Yii::app()->request->isAjaxRequest)
		{
			$this->renderPartial('/modal_views/feedback', array('model'=>$model, 'type'=>'credit'));
		}
		else
		{
			$news_stocks = new News;
			$menu = new Menu;
			$stuff = new Stuff;
			
			$data['menu'] = $menu->getMenu();
			$data['stuff'] = $stuff->getStuff();
			
			$data['car_menu'] = $car_model; // потом исправить эту штуку
		
	
			$this->bottom_list['title'] = "НОВОСТИ";
			$this->bottom_list['data'] = $news_stocks->getNews();
			$this->bottom_list['link'] = "news";
			$this->bottom_list['link_text'] = "Архив новостей";
			
			Yii::app()->clientScript->registerCssFile( $this->getAssetsUrl()."/css/bootstrap.min.css" );
			
			$this->render('/modal_views/feedback', array('model'=>$model, 'type'=>'credit'));	
		}
		
	}
	
	
	public function actionBuy($id_car=false)
	{
		//fnc::mpr($_POST);
		
		
		$model = new Orders;
		
		if(isset($_POST['Orders']))
		{
			
			$model->attributes=$_POST['Orders'];
			$model->status = 0;
			$model->id_type = self::TYPE_BUY;
			$model->id_site = $this->id_site;
			
			if(is_numeric($id_car)) $model->car = Cars::model()->findByPk($id_car)->title;
			
			
			if($model->save())
			{
				// отправляем письмо 
				$mail = ( !empty($this->settings->email_buy) ? $this->settings->email_buy : $this->settings->email_main_admin );
				$fnc = new Fnc;
				$domains = $fnc->returnDomains();
				$current_domain = $domains[$this->id_site];
				$subject = "Заявка с сайта";
				$message = "Вам пришла заявка с сайта перейдите по <a href='http://{$current_domain}/admin/orders/list/'>ссылке</a>";
				SiteHelper::sendMail($subject,$message,$mail);
				
				
				
				$this->redirect(array('/thanks?buy'));
			}
		}
		
		if(Yii::app()->request->isAjaxRequest)
		{
			$this->renderPartial('/modal_views/feedback', array('model'=>$model, 'type'=>'buy'));
		}
		else
		{
			$news_stocks = new News;
			$menu = new Menu;
			$stuff = new Stuff;
			
			$data['menu'] = $menu->getMenu();
			$data['stuff'] = $stuff->getStuff();
			
			$data['car_menu'] = $car_model; // потом исправить эту штуку
		
	
			$this->bottom_list['title'] = "НОВОСТИ";
			$this->bottom_list['data'] = $news_stocks->getNews();
			$this->bottom_list['link'] = "news";
			$this->bottom_list['link_text'] = "Архив новостей";
			
			Yii::app()->clientScript->registerCssFile( $this->getAssetsUrl()."/css/bootstrap.min.css" );
			
			$this->render('/modal_views/feedback', array('model'=>$model, 'type'=>'buy'));	
		}
		
	}
	
	public function actionVideodealer($position)
	{
			
					
					switch($position)	
					{
						case 1:
						
							if(!empty($this->settings->video1))
								$video = $this->settings->video1;
						break;	
						case 2:
							if(!empty($this->settings->video2))
								$video = $this->settings->video2;
						break;	
						
					}
					
			
			
			if( !isset($video) ) throw new CHttpException(404, 'Страница не существует.');
			
			$data['video'] = $video;
			//$data['title'] = "О";
			
			if(Yii::app()->request->isAjaxRequest)
			{
				$this->renderPartial('/modal_views/video', array( 'data'=>$data ) );
			}
			else
			{
				$news_stocks = new News;
				$menu = new Menu;
				
				
				$data['menu'] = $menu->getMenu();
				
				
				
			
		
				$this->bottom_list['title'] = "НОВОСТИ";
				$this->bottom_list['data'] = $news_stocks->getNews();
				$this->bottom_list['link'] = "news";
				$this->bottom_list['link_text'] = "Архив новостей";
				
			
				
				$this->render('/modal_views/video', array( 'data'=>$data ));	
			}
	}
	
	public function actionVideo($car=false, $position = false)
	{
		if( is_numeric($car) and is_numeric($position) )
		{
			$get_car_model = Cars::model()->findByPk($car);
			
			if(is_object($get_car_model))
			{
				
				switch($position)	
				{
					case 1:
					
						if(!empty($get_car_model->video1))
							$video = $get_car_model->video1;
					break;	
					case 2:
						if(!empty($get_car_model->video2))
							$video = $get_car_model->video2;
					break;	
					case 3:
						if(!empty($get_car_model->video3))
							$video = $get_car_model->video3;
					break;	
				}
				
			}
		}
		
		if( !isset($video) ) throw new CHttpException(404, 'Страница не существует.');
		
		$data['video'] = $video;
		$data['title'] = $get_car_model->title;
		
		if(Yii::app()->request->isAjaxRequest)
		{
			$this->renderPartial('/modal_views/video', array( 'data'=>$data ) );
		}
		else
		{
			$news_stocks = new News;
			$menu = new Menu;
			
			
			$data['menu'] = $menu->getMenu();
			
			
			
		
	
			$this->bottom_list['title'] = "НОВОСТИ";
			$this->bottom_list['data'] = $news_stocks->getNews();
			$this->bottom_list['link'] = "news";
			$this->bottom_list['link_text'] = "Архив новостей";
			
		
			
			$this->render('/modal_views/video', array( 'data'=>$data ));	
		}
		
	}
}