<?php

class CarsController extends AdminController
{
	
	
	public function actionUpdate($id)
	{
		
		
			
		$model = Cars::model()->findByPk($id);
		

		
		
		if(isset($_POST['Cars']))
		{
		
			
			$model->attributes=$_POST['Cars'];
			
			
			
			if($model->save())
			{
				
				$this->redirect(array('/admin/cars/list/'));	
			}
		}
		
		
		$data['complectations'] = Carcomplecations::getComplectations($model->id);
		$data['akpp'] = Carakpp::getAkpp($model->id);
		$data['body'] = Carbody::getBody($model->id);
		
		
		$this->render('update',array('model'=>$model, 'data'=>$data));
	}
	
	
	
	public function actionDelete($id)
	{
		if(Yii::app()->user->id_site!=0) return false;
		
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$model=Cars::model()->findByPk($id);
			
		
			
			
			$model->delete();
			
			
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}
	
	
	
	
}
