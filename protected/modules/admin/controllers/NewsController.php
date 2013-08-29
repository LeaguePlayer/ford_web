<?php

class NewsController extends AdminController
{
	public function actionCreate($id_type)
	{
		
			
		$model = new News;
		
		if(isset($_POST['News']))
		{
			$relationsSites = $_POST['News']['id_site'];
			unset($_POST['News']['id_site']);
			
			$model->attributes=$_POST['News'];
			
			
			
			if($model->save())
			{
				if(empty($relationsSites)) $relationsSites=array(Yii::app()->user->currentSiteId);
				$model->relationsSites($relationsSites, $model->getModelName());
				$this->redirect(array("/admin/news/list/id_type/{$model->id_type}"));
			}
		}
		
		$model->id_type = $id_type;
		
		
		
		$this->render('create',array('model'=>$model, 'id_type'=>$id_type,));
	}
	
	
	public function actionUpdate($id)
	{
		
		
			 
		$model = News::model()->with( array('sites' => array('condition' => "id_site = :id_site and post_id = {$id}",'params'=>array(':id_site'=>Yii::app()->user->id_site))) )->findByPk($id);
		
		if(!is_object($model)) $model = News::model()->findByPk($id);
		// fnc::mpr($model->site->attributes);die();
		
		// проверяем может ли он редактировать
		
		if($model->validForEdit())
			throw new CHttpException(404, 'Unable to find the requested object.');
		// end
		
		if(isset($_POST['News']))
		{
			$relationsSites = $_POST['News']['id_site'];
			unset($_POST['News']['id_site']);
			
			
			
			$model->attributes=$_POST['News'];
			
			
			
			
			
			if($model->save())
			{
				$model->relationsSites($relationsSites, $model->getModelName());
				$this->redirect(array("/admin/news/list/id_type/{$model->id_type}"));	
			}
		}
		
		
		
		
		
		$this->render('update',array('model'=>$model,'id_type'=>$model->id_type,));
	}
	
	
	public function actionSort()
    {
		
         if (isset($_POST['items']) && is_array($_POST['items'])) {
			 
			 
			echo $actual_values = implode(", ",$_POST['items']);
			 
			 
				 $get_all_menus_for_this_site = News::model()->findAll(array('condition'=>"id in ({$actual_values})", 'order'=>'sort ASC'));
			
			 $a = CHtml::listData($get_all_menus_for_this_site, 'id', 'sort');
			 $a = array_values($a);
			 
			
			 
				$i = 0;
				foreach ($_POST['items'] as $item) {
					
					$project = News::model()->findByPk($item);
					$project->sort = $a[$i];
					
					if($project->update()) echo "OK";
					$i++;
				}
			}
    }
	
	
	public function actionList($id_type)
	{
		
		
		$model=new News('search');
		
		$model->unsetAttributes();  // clear any default values
		$model->id_type = $id_type;
		if(isset($_GET['News']))
			$model->attributes=$_GET['News'];
			
	
		
		

		$this->render('list',array(
			'model'=>$model, 
			'id_type'=>$id_type,
			
		));
	}
	
	
}
