<?php

class SliderController extends AdminController
{
	public function actionCreate($page=false)
	{
		
			
		$model = new Slider;
		
		if(isset($_POST['Slider']))
		{
			$relationsSites = $_POST['Slider']['id_site'];
			unset($_POST['Slider']['id_site']);
			
			$model->attributes=$_POST['Slider'];
			
			
			
			if($model->save())
			{
				if(empty($relationsSites)) $relationsSites=array(Yii::app()->user->id_site);
				$model->relationsSites($relationsSites, $model->getModelName());
				$this->redirect(array('/admin/slider/list/'));
			}
		}
		
		
		
		if(is_numeric($page))
			{
				$find_page = Staticpage::model()->findByPk($page);
				if(is_object($find_page))
				{
					if($find_page->validForEdit())
						throw new CHttpException(404, 'Unable to find the requested object.');
					$model->title = $find_page->title;
					$model->link = "/{$find_page->meta_alias}";
					$model->status = 1;
				}
			}
		
		$this->render('create',array('model'=>$model));
	}
	
	
	public function actionUpdate($id)
	{
		
		
			
		$model = Slider::model()->with( array('sites' => array('condition' => "id_site = :id_site and post_id = {$id}",'params'=>array(':id_site'=>Yii::app()->user->id_site))) )->findByPk($id);
		
		if(!is_object($model)) $model = Slider::model()->findByPk($id);
		// fnc::mpr($model->site->attributes);die();
		
		// проверяем может ли он редактировать
		
		if($model->validForEdit())
			throw new CHttpException(404, 'Unable to find the requested object.');
		// end
		
		if(isset($_POST['Slider']))
		{
			$relationsSites = $_POST['Slider']['id_site'];
			unset($_POST['Slider']['id_site']);
			
			
			
			$model->attributes=$_POST['Slider'];
			
			
			
			
			
			if($model->save())
			{
				$model->relationsSites($relationsSites, $model->getModelName());
				$this->redirect(array('/admin/slider/list/'));	
			}
		}
		
		
		
		
		
		$this->render('update',array('model'=>$model));
	}
	
	
	public function actionSort()
    {
		
         if (isset($_POST['items']) && is_array($_POST['items'])) {
			 
			 
			echo $actual_values = implode(", ",$_POST['items']);
			 
			 
				 $get_all_menus_for_this_site = Slider::model()->findAll(array('condition'=>"id in ({$actual_values})", 'order'=>'sort ASC'));
			
			 $a = CHtml::listData($get_all_menus_for_this_site, 'id', 'sort');
			 $a = array_values($a);
			 
			
			 
				$i = 0;
				foreach ($_POST['items'] as $item) {
					
					$project = Slider::model()->findByPk($item);
					$project->sort = $a[$i];
					
					if($project->update()) echo "OK";
					$i++;
				}
			}
    }
}
