<?php

class OrdersController extends AdminController
{
	public function actionCreate()
	{
		throw new CHttpException(404, 'Unable to find the requested object.');
	}
	
	
	public function actionUpdate($id)
	{
		
		
			
		$model = Orders::model()->findByPk($id,array( 'condition' => "id_site = :id_site",'params'=>array(':id_site'=>Yii::app()->user->id_site) ));
		
		
		// fnc::mpr($model->site->attributes);die();
		
		// проверяем может ли он редактировать
		
		//if($model->validForEdit())
		//	throw new CHttpException(404, 'Unable to find the requested object.');
		// end
		
		if(isset($_POST['Orders']))
		{
			
			
			
			$model->attributes=$_POST['Menu'];
			
			
			
			
			
			if($model->save())
			{
				
				$this->redirect(array('/admin/orders/list/'));	
			}
		}
		
		
		
		
		
		$this->render('update',array('model'=>$model));
	}
	
	
	public function actionList()
	{
		
		
		$model=new Orders('search');
		
		$model->unsetAttributes();  // clear any default values
		
		if(isset($_GET['Orders']))
			$model->attributes=$_GET['Orders'];
			
	if($model->id_site==0) unset($model->id_site);

		$this->render('list',array(
			'model'=>$model, 
			
			
		));
	}
}
