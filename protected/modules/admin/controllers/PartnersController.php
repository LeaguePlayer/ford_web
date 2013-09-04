<?php

class PartnersController extends AdminController
{
	public function actionCreate()
	{
		
			
		$model = new Partners;
		
		if(isset($_POST['Partners']))
		{
			$relationsSites = $_POST['Partners']['id_site'];
			unset($_POST['Partners']['id_site']);
			
			$model->attributes=$_POST['Partners'];
			
			
			
			if($model->save())
			{
				if(empty($relationsSites)) $relationsSites=array(Yii::app()->user->currentSiteId);
				$model->relationsSites($relationsSites, $model->getModelName());
				$this->redirect(array('/admin/partners/list/'));
			}
		}
		
		
		
	
		
		$this->render('create',array('model'=>$model));
	}
	
	
	public function actionUpdate($id)
	{
		
		
			
		$model = Partners::model()->with( array('sites' => array('condition' => "id_site = :id_site and post_id = {$id}",'params'=>array(':id_site'=>Yii::app()->user->id_site))) )->findByPk($id);
		
		if(!is_object($model)) $model = Partners::model()->findByPk($id);
		// fnc::mpr($model->site->attributes);die();
		
		// проверяем может ли он редактировать
		
		if($model->validForEdit())
			throw new CHttpException(404, 'Unable to find the requested object.');
		// end
		
		if(isset($_POST['Partners']))
		{
			$relationsSites = $_POST['Partners']['id_site'];
			unset($_POST['Partners']['id_site']);
			
			
			
			$model->attributes=$_POST['Partners'];
			
			
			
			
			
			if($model->save())
			{
				$model->relationsSites($relationsSites, $model->getModelName());
				$this->redirect(array('/admin/partners/list/'));	
			}
		}
		
		
		
		
		
		$this->render('update',array('model'=>$model));
	}
	
	
	public function actionSort()
    {
		
         if (isset($_POST['items']) && is_array($_POST['items'])) {
			 
			 
			echo $actual_values = implode(", ",$_POST['items']);
			 
			 
				 $get_all_menus_for_this_site = Partners::model()->findAll(array('condition'=>"id in ({$actual_values})", 'order'=>'sort ASC'));
			
			 $a = CHtml::listData($get_all_menus_for_this_site, 'id', 'sort');
			 $a = array_values($a);
			 
			
			 
				$i = 0;
				foreach ($_POST['items'] as $item) {
					
					$project = Partners::model()->findByPk($item);
					$project->sort = $a[$i];
					
					if($project->update()) echo "OK";
					$i++;
				}
			}
    }
}
