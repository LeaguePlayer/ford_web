<?php

class SiteController extends Controller
{
	public $layout = '//layouts/main';
	
	const TYPE_TEST_DRIVE = 0;
	const TYPE_FEEDBACK = 1;
	const TYPE_STRAHOVANIE = 2;
	const TYPE_CREDIT = 3;
	
	
	
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
		
	
		$this->bottom_list['title'] = "НОВОСТИ123";
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
			$data['page'] = Staticpage::getSystemPage(6);
			fnc::registredSEO($data['page']);
	
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
			
	
			$this->bottom_list['title'] = "НОВОСТИ";
			$this->bottom_list['data'] = $news_stocks->getNews();
			$this->bottom_list['link'] = "news";
			$this->bottom_list['link_text'] = "Архив новостей";
			
			$this->render('owner',array('data'=>$data));
	}
	
	public function actionCars($car_model = false)
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
	
	
	public function actionTestDrive()
	{
		//fnc::mpr($_POST);
		
		$mail = ( !empty($this->settings->email_test_drive) ? $this->settings->email_test_drive : $this->settings->email_main_admin );
		
		$fnc = new Fnc;
		$domains = $fnc->returnDomains();
		$current_domain = $domains[$this->id_site];
		$subject = "Заявка с сайта";
		$message = "Вам пришла заявка с сайта перейдите по <a href='http://{$current_domain}/admin/orders/list/'>ссылке</a>";
		
		SiteHelper::sendMail($subject,$message,$mail,$from='robot@agrad.ru');
		
		$model = new Orders;
		
		if(isset($_POST['data']))
		{
			
			$model->attributes=$_POST['data'];
			$model->status = 0;
			$model->id_type = self::TYPE_TEST_DRIVE;
			$model->id_site = $this->id_site;
			
			if($model->save())
			{
				// отправляем письмо 
				
				
				
				
				$this->redirect(array('/thanks?test_drive'));
			}
		}
		
		if(Yii::app()->request->isAjaxRequest)
		{
			$this->renderPartial('/modal_views/test_drive', array('model'=>$model));
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
			
			$this->render('/modal_views/test_drive', array('model'=>$model));	
		}
		
	}
}