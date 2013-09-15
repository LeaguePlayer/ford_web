<?php

class CarsController extends Controller
{
	public $layout='//layouts/main';

	
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	
	

	
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Cars');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}
	
	
	public function actionView($id_car,$avail_now=false)
	{
			
			$car = Cars::getCar($id_car);
			
			if(is_object($car))
			{
				Yii::app()->clientScript->registerScriptFile( $this->getAssetsUrl()."/js/jquery.jrumble.1.3.min.js" );
				
				if($avail_now and $avail_now=="yes") $avail_now = true; // смотрим, есть ли якорь - если да, то будем показывать авто только те, что в наличии 
				
				$news_stocks = new News;
				$menu = new Menu;
				//$stuff = new Stuff;
				$public_car_site = Carssitespublic::model()->find("id_car=$id_car");
				
				$data['menu'] = $menu->getMenu();
				//$data['stuff'] = $stuff->getStuff();
				$data['complectations'] = Carssitespublic::getComplectationsByCar($car->id, $avail_now);
				
				$data['options'] = Complectationvalues::getOptions($car->id);
				
				$data['car_menu'] = $car; 
				fnc::registredSEO($car);
				
				if($avail_now) $value = "avtomobili-v-nalichii";
				else
				{
					switch($public_car_site->id_category)
					{
						case 1:
							$value = "avtomobili";
						break;	
						
						case 3:
							$value = "kommercheskie-avtomobili";
						break;	
					}
				}
				
				$data['return_link'] = "/{$value}";
				
				
					if(Yii::app()->request->isAjaxRequest)
					{
					
						$this->renderPartial('/cars/_about_car',array('data'=>$data));
						return true;	
					}
		
		
				
				
			
		
				$this->bottom_list['title'] = "НОВОСТИ";
				$this->bottom_list['data'] = $news_stocks->getNews();
				$this->bottom_list['link'] = "news";
				$this->bottom_list['link_text'] = "Архив новостей";
				
				$this->render('/site/cars',array('data'=>$data));
			}
			else throw new CHttpException(404, 'Страница не существует.');
			
	}
}
