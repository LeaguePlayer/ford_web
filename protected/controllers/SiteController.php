<?php

class SiteController extends Controller
{
	public $layout = '//layouts/main';
	
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

	/** dsds
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
}