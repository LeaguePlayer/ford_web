<?php

class StaticpageController extends AdminController
{
	public function actionCreate($system_page)
	{
		
			
		$model = new Staticpage;
		
		if(isset($_POST['Staticpage']))
		{
			$relationsSites = $_POST['Staticpage']['id_site'];
			unset($_POST['Staticpage']['id_site']);
			
			$model->attributes=$_POST['Staticpage'];
			
			if(empty($model->meta_alias))
				$model->meta_alias = fnc::str2url($model->title);
				
			
			//fnc::mpr($relationsSites);die();
			
			if($model->save())
			{
				if(empty($relationsSites)) $relationsSites=array(Yii::app()->user->id_site);
				$model->relationsSites($relationsSites, $model->getModelName());
				$this->redirect(array("/admin/staticpage/list/system_page/{$model->system_page}"));
			}
		}
		
		
		$model->system_page = $system_page;
		
		
		$this->render('create',array('model'=>$model , 'system_page'=>$system_page));
	}
	
	
	public function actionUpdate($id)
	{
		
		
			
		$model = Staticpage::model()->with( array('sites' => array('condition' => "id_site = :id_site and post_id = {$id}",'params'=>array(':id_site'=>Yii::app()->user->id_site))) )->findByPk($id);
		
		if(!is_object($model)) $model = Staticpage::model()->findByPk($id);
		// fnc::mpr($model->site->attributes);die();
		
		// проверяем может ли он редактировать
		
		if($model->validForEdit())
			throw new CHttpException(404, 'Unable to find the requested object.');
		// end
		
		
		
		if(isset($_POST['Staticpage']))
		{
			$relationsSites = $_POST['Staticpage']['id_site'];
			unset($_POST['Staticpage']['id_site']);
			
			
			
			$model->attributes=$_POST['Staticpage'];
			
			
			if(empty($model->meta_alias))
				$model->meta_alias = fnc::str2url($model->title);
			
			if($model->save())
			{
				$model->relationsSites($relationsSites, $model->getModelName());
				$this->redirect(array("/admin/staticpage/list/system_page/{$model->system_page}"));	
			}
		}
		
		
		
		$this->render('update',array('model'=>$model));
	}
	
	
	
	public function actionList($system_page)
	{
		
		
		$model=new Staticpage('search');
		
		$model->unsetAttributes();  // clear any default values
		$model->system_page = $system_page;
		if(isset($_GET['Staticpage']))
			$model->attributes=$_GET['Staticpage'];
			
	
		
		

		$this->render('list',array(
			'model'=>$model, 
			'system_page'=>$system_page,
			
		));
	}
	
	
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$model=Staticpage::model()->findByPk($id);
			
			if($model->system_page == 1)die('imposible!');
			else
			
			
			$model->delete();
			
			
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}
}
