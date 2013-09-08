<?php

class CarssitespublicController extends AdminController
{
	public function actionCreate($id_category)
	{
		
			
		$model = new Carssitespublic;
		
		$model->id_category = $id_category;
		$model->id_site = Yii::app()->controller->currentSiteId;
		
		if(isset($_POST['Carssitespublic']))
		{
			
			
			$model->attributes=$_POST['Carssitespublic'];
			
			
			
			if($model->save())
			{
				
				$this->redirect(array("/admin/carssitespublic/list/id_category/{$model->id_category}"));
			}
		}
		
		
		$data['cars'] = Cars::getCars();
		
		$data['complecations'][0] = "Не выбрана категория";
		$data['akpp'][0] = "Не выбрана категория";
		$data['body'][0] = "Не выбрана категория";
		$data['engine'][0] = "Не выбрана категория";
		
		$this->render('create',array('model'=>$model, 'id_category'=>$id_category, 'data'=>$data));
	}
	
	
	public function actionUpdate($id)
	{
		
		
			
		$model = Carssitespublic::model()->findByPk($id,array( 'condition' => "id_site = :id_site",'params'=>array(':id_site'=>Yii::app()->user->currentSiteId) ));
		
		
		
		
		if(isset($_POST['Carssitespublic']))
		{
			
			
			
			$model->attributes=$_POST['Carssitespublic'];
			
			
			
			
			
			if($model->save())
			{
				
				$this->redirect(array("/admin/carssitespublic/list/id_category/{$model->id_category}"));	
			}
		}
		
		$data['cars'] = Cars::getCars();
		
			$model_a=Carcomplecations::model()->findAll('id_car=:parent_id',array(':parent_id'=>$model->id_car));
			if( count($model_a) == 0) 
			{
				$data['complecations']=array("Не выбрана категория");
			}
			else
				$data['complecations']=CHtml::listData($model_a,'id','title');
			$data['complecations'][0] = "Не выбрана категория";
			ksort($data['complecations']);
			
			
			$model_b=Carakpp::model()->findAll('id_car=:parent_id',array(':parent_id'=>$model->id_car));
			if( count($model_b) == 0) 
			{
				$data['akpp']=array("Не выбрана категория");
			}
			else
				$data['akpp']=CHtml::listData($model_b,'id','title');
			$data['akpp'][0] = "Не выбрана категория";
			ksort($data['akpp']);
			
			
			$model_c=Carbody::model()->findAll('id_car=:parent_id',array(':parent_id'=>$model->id_car));
			if( count($model_c) == 0) 
			{
				$data['body']=array("Не выбрана категория");
			}
			else
				$data['body']=CHtml::listData($model_c,'id','title');
			$data['body'][0] = "Не выбрана категория";
			ksort($data['body']);
			
			
			$model_d=Engine::model()->findAll('id_car=:parent_id',array(':parent_id'=>$model->id_car));
			if( count($model_d) == 0) 
			{
				$data['engine']=array("Не выбрана категория");
			}
			else
				$data['engine']=CHtml::listData($model_d,'id','title');
			$data['engine'][0] = "Не выбрана категория";
			ksort($data['engine']);
			
			
		
		
		if(Yii::app()->request->isAjaxRequest)
			$this->renderPartial('update',array('model'=>$model, 'data'=>$data));
		else
			$this->render('update',array('model'=>$model, 'data'=>$data));
	}
	
	
	
	
	public function actionList($id_category)
	{
		
		
		$model=new Carssitespublic('search');
		
		$model->unsetAttributes();  // clear any default values
		$model->id_category = $id_category;
		if(isset($_GET['Carssitespublic']))
			$model->attributes=$_GET['Carssitespublic'];
			
	
		
		

		$this->render('list',array(
			'model'=>$model, 
			'id_category'=>$id_category,
			
		));
	}
	
	
	public function actionSort()
    {
		
         if (isset($_POST['items']) && is_array($_POST['items'])) {
			 
			 
			echo $actual_values = implode(", ",$_POST['items']);
			 
			 
				 $get_all_menus_for_this_site = Carssitespublic::model()->findAll(array('condition'=>"id in ({$actual_values})", 'order'=>'sort ASC'));
			
			 $a = CHtml::listData($get_all_menus_for_this_site, 'id', 'sort');
			  $a = array_values($a);
			 
			fnc::mpr($_POST['items']);
			 
				$i = 0;
				foreach ($_POST['items'] as $item) {
					//echo $item;
					$project = Carssitespublic::model()->findByPk($item);
					
					echo $project->sort = $a[$i];
					
					if($project->update()) echo "OK";
					$i++;
				}
			}
    }
	
	
	public function actionParts($param=false, $id=false)
	{
		if($param and Yii::app()->request->isAjaxRequest)
		{
			$param = false;
			switch($_POST['data']['type'])
			{
				case 'complectations':
					$data = Carcomplecations::getComplectations($_POST['data']['id_car']);
					$param = true;
				break;	
				case 'akpp':
					$data = Carakpp::getAkpp($_POST['data']['id_car']);
				break;	
				case 'body':
					$data = Carbody::getBody($_POST['data']['id_car']);
				break;	
				case 'engine':
					$data = Engine::getEngine($_POST['data']['id_car']);
				break;
			}
			
			
			
			echo $this->renderPartial('/cars/_parts',array('data'=>$data, 'edit'=>$param));
			return true;
		}
		
		if(is_numeric($id) and isset($_POST['data']['type']) and Yii::app()->request->isAjaxRequest)
		{
			$param = false;
			switch($_POST['data']['type'])
			{
				case 'complectations':
					$model = Carcomplecations::model()->findByPk($id);
				break;	
				case 'akpp':
					$model = Carakpp::model()->findByPk($id);
					
				break;	
				case 'body':	
					$model = Carbody::model()->findByPk($id);
				break;	
				case 'engine':
					$model = Engine::model()->findByPk($id);
				break;
			}
			$id_car = $model->id_car;
			$model->delete();
			
			
			switch($_POST['data']['type'])
			{
				case 'complectations':
					$data = Carcomplecations::getComplectations($id_car);
					$param =true;
				break;	
				case 'akpp':
					$data = Carakpp::getAkpp($id_car);
				break;	
				case 'body':
					$data = Carbody::getBody($id_car);
				break;	
				case 'engine':
					$data = Engine::getEngine($id_car);
				break;
			}
			
			
			//$data['complectations'] = Carcomplecations::getComplectations($id_car);
			echo $this->renderPartial('/cars/_parts',array('data'=>$data, 'edit'=>$param));
			
			
			return true;
		}
			
		if(isset($_POST['data']) and Yii::app()->request->isAjaxRequest)
		{
			
			$data = $_POST['data'];
			if($data['title']=="") die("Поле не может быть пустым");
			
			
			switch($data[type])
			{
				case 'complectations':
					$model = new Carcomplecations;
				break;	
				case 'akpp':
					$model = new Carakpp;
					
				break;	
				case 'body':	
					$model = new Carbody;
				break;	
				case 'engine':
					$model = new Engine;
				break;
			}
			
			
			$model->attributes=$data;
			if($model->save())
			{
				echo "SUCCESS";	
				return true;
			}
		}
		 
			throw new CHttpException(404,'Страница не существует!');
	}
	
	
	public function actionAddparams($type)
	{
		if(isset($_POST['data']) and Yii::app()->request->isAjaxRequest)
		{
			switch($type)
			{
				case 'complectation':
					$data=Carcomplecations::model()->findAll('id_car=:parent_id',array(':parent_id'=>(int) $_POST['data']['id_car']));
				break;	
				case 'akpp':
					$data=Carakpp::model()->findAll('id_car=:parent_id',array(':parent_id'=>(int) $_POST['data']['id_car']));
				break;	
				case 'body':
					$data=Carbody::model()->findAll('id_car=:parent_id',array(':parent_id'=>(int) $_POST['data']['id_car']));
				break;	
				case 'engine':
					$data=Engine::model()->findAll('id_car=:parent_id',array(':parent_id'=>(int) $_POST['data']['id_car']));
				break;	
			}
			
			
			if( count($data) == 0) 
			{
				echo CHtml::tag('option',
						   array('value'=>0),CHtml::encode("Не выбрана категория"),true);
				return false;	
			}
			
			
			$data=CHtml::listData($data,'id','title');
			$data[0] = "Не выбрана категория";
			ksort($data);
			foreach($data as $value=>$title)
			{
				echo CHtml::tag('option',
						   array('value'=>$value),CHtml::encode($title),true);
			}
		}
		else 
			throw new CHttpException(404,'Страница не существует!');
		
	}
	
	
	
	
}
