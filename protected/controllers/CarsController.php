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
	
	
	public function actionView($car_model)
	{
			$public_car_site = Carssitespublic::model()->findByPk($car_model);
			
			if(is_object($public_car_site))
			{
				$news_stocks = new News;
				$menu = new Menu;
				//$stuff = new Stuff;
		
				$car = Cars::getCar($public_car_site->id_car);
				$data['menu'] = $menu->getMenu();
				//$data['stuff'] = $stuff->getStuff();
				$data['complectations'] = Carssitespublic::getComplectationsByCar($car->id);
				
				$data['options'] = Complectationvalues::getOptions($car->id);
				
				$data['car_menu'] = $car; 
				fnc::registredSEO($car);
				
				switch($public_car_site->id_category)
				{
					case 1:
						$value = "avtomobili";
					break;	
					case 2:
						$value = "avtomobili-v-nalichii";
					break;	
					case 3:
						$value = "kommercheskie-avtomobili";
					break;	
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
