<?php

class StaticpageController extends Controller
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

	
	public function actionView($alias)
	{
		
		$model = Staticpage::model()->find( array( 'condition'=>"meta_alias = :meta_alias", 'params'=>array( ':meta_alias'=>$alias ) ) );
		
		if($model->system_page==1 and $model->system_group!=0)
			$model = Staticpage::getSystemPage($model->system_group);
			fnc::registredSEO($model);
		
		if(is_object($model))
		{
			
			if(Yii::app()->request->isAjaxRequest)
			{
				$this->renderPartial('view',array(
					'model'=>$model,
					'data'=>$data,
				));
			}
			else
			{
				$news_stocks = new News;
				$menu = new Menu;
				
				$data['menu'] = $menu->getMenu();
			
		
				$this->bottom_list['title'] = "АКЦИИ";
				$this->bottom_list['data'] = $news_stocks->getStock();
				$this->bottom_list['link'] = "stock";
				$this->bottom_list['link_text'] = "Архив акция";
				
				$this->render('view',array(
						'model'=>$model,
						'data'=>$data,
					));
			}
			
			
		}
		else 
			throw new CHttpException(404, 'Страница не существует.');
		
	}

	
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Staticpage');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}
}
