<?php

class NewsController extends Controller
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
				'actions'=>array('index','view','spisok'),
				'users'=>array('*'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	
	public function actionView($id)
	{
		
		if(is_numeric($id))
		{
			$model = News::model()->with(array('site' => array('condition' => "(id_site = :id_site or id_site=0)",'params'=>array(':id_site'=>Yii::app()->controller->id_site))))->findByPk($id);
			
				
		
				if(is_object($model))
				{
					$news_stocks = new News;
					$menu = new Menu;
					
					$data['menu'] = $menu->getMenu();
				
			
					if($model->id_type==0)
					{
						$this->bottom_list['title'] = "АКЦИИ";
						$this->bottom_list['data'] = $news_stocks->getStock(true);
						$this->bottom_list['link'] = "stock";
						$this->bottom_list['link_text'] = "Архив акция";
					}
					else
					{
						$this->bottom_list['title'] = "НОВОСТИ";
						$this->bottom_list['data'] = $news_stocks->getNews();
						$this->bottom_list['link'] = "news";
						$this->bottom_list['link_text'] = "Архив новостей";
					}
					
					
					$this->render('/staticpage/view',array(
						'model'=>$model,
						'data'=>$data,
						'show_interest'=>true,
					));
				}
				else 
					throw new CHttpException(404, 'Страница не существует.');
		}
		else throw new CHttpException(404, 'Страница не существует.');
			
		
		
	}

	
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('News');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}
	
	public function actionSpisok($id_type)
	{
			if(is_numeric($id_type))
			{
				$news_stocks = new News;
				$menu = new Menu;
				
				
				$data['menu'] = $menu->getMenu();
				$data['id_type']=$id_type;
				
				if($data['id_type']==1) 
				{
					$data['spisok'] =  $news_stocks->getStock(true);
					$data['super_stock'] = $news_stocks->super_stock;
					$data['title'] =  "Другие предложения";
					$this->bottom_list['title'] = "НОВОСТИ";
					$this->bottom_list['data'] = $news_stocks->getNews();
					$this->bottom_list['link'] = "news";
					$this->bottom_list['link_text'] = "Архив новостей";
				}
				else
				{
					$data['spisok'] =  $news_stocks->getNews();
					$data['title'] =  "Список новостей";
					$this->bottom_list['title'] = "АКЦИИ";
					$this->bottom_list['data'] = $news_stocks->getStock(true);
					$this->bottom_list['link'] = "stock";
					$this->bottom_list['link_text'] = "Архив акция";
					
				}
					
				
			
		
				
				
				$this->render('list',array('data'=>$data));
			}
			else throw new CHttpException(404, 'Страница не существует.');
			
			
	}
}
