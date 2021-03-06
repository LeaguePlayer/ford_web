<?php

class ComplectationvaluesController extends AdminController
{
	public function actionCreate($id_complectation)
	{
		
			
		$model = new Complectationvalues;
		$model->id_complectation = $id_complectation;
		$model->status = 1;
		if(isset($_POST['Complectationvalues']))
		{
			
			
			$model->attributes=$_POST['Complectationvalues'];
			
			
			
			if($model->save())
			{
				
				$this->redirect(array("/admin/complectationvalues/list/id_complectation/{$model->id_complectation}"));
			}
		}
		
		
		
		
		
		
			$this->renderPartial('create',array('model'=>$model, 'id_complectation'=>$id_complectation),false,true);
		
	}
	
	
	
	public function actionList($id_complectation)
	{
		
		
		$model=new Complectationvalues('search');
		
		$model->unsetAttributes();  // clear any default values
		$model->id_complectation = $id_complectation;
		if(isset($_GET['Complectationvalues']))
			$model->attributes=$_GET['Complectationvalues'];
			
	
		
		
		if(Yii::app()->request->isAjaxRequest)
			$this->render('list',array(
				'model'=>$model, 
				'id_complectation'=>$id_complectation,
				
			));
		else
			$this->renderPartial('list',array(
				'model'=>$model, 
				'id_complectation'=>$id_complectation,
				
			),false,true);
	}
	
	public function actionDelete($id)
	{
		//die('stoped!');
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$model=Complectationvalues::model()->findByPk($id);
			$model->delete();
			
			
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}
}
