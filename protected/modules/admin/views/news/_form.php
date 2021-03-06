<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'news-form',
	'enableAjaxValidation'=>false,
		'htmlOptions' => array('enctype'=>'multipart/form-data'),
)); ?>

<?php echo $form->errorSummary($model);?>

	<?php echo $form->groupSitesControlGroup($model, 'id_site', "Показывать на сайтах"); ?>
	
    <?php echo $form->dropDownListControlGroup($model, 'id_type', News::getCategories(), array('class'=>'span8', 'displaySize'=>1)); ?>

    
	<?php echo $form->textFieldControlGroup($model,'title',array('class'=>'span8','maxlength'=>255)); ?>
    
   
    	<?php echo $form->textAreaControlGroup($model,'super_short_desc',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>
	

	<div class='control-group'>
		<?php echo CHtml::activeLabelEx($model, 'html_content'); ?>
		<?php $this->widget('admin_ext.ckeditor.CKEditorWidget', array('model' => $model, 'attribute' => 'html_content',
		)); ?>
		<?php echo $form->error($model, 'html_content'); ?>
	</div>



	

	<div class='control-group'>
		<?php echo CHtml::activeLabelEx($model, 'image'); ?>
        <?php 
			if($model->image)
				echo TbHtml::imageRounded($model->getThumb('medium'));
		 ?>
		<br>
		<?php echo $form->fileField($model,'image', array('class'=>'span8')); ?>
		<?php echo $form->error($model, 'image'); ?>
	</div>
    <div class="help_tip">
     	Изображение должно быть минимум 1280 пикселей по ширине и 516 пикселей по высоте - это важно! Иначе изображение будет отображаться не корректно.
     </div>
    
    <div class="for_stock">
    <?
		echo $form->labelEx($model,'super_work_to');
    	Yii::import('application.extensions.datetimepicker.BJuiDateTimePicker');
		$this->widget('BJuiDateTimePicker',array('model'=>$model,'attribute'=>'super_work_to'));
	?>
     <div class="help_tip">Если поле оставить пустым, акция будет показываться бесконечно пока вы ее не уберете с публикации. Если указать фиксированное время, то после того как эта дата пройдет, акция автоматически снимется с публикации.
    </div>
    
    
    
    <?php echo $form->dropDownListControlGroup($model, 'id_car', $data['cars'], array('class'=>'span8', 'displaySize'=>1)); ?>
    
     <div class="help_tip">Если привязать автомбиль - то в акции появится ссылка на данную модель.
    </div>
    
    </div>
    
    <fieldset class='for_stock'>
    	<legend>ГЛАВНАЯ АКЦИЯ</legend>
        
        
        <?php echo $form->dropDownListControlGroup($model, 'super_show', fnc::returnYesNo(), array('class'=>'span8', 'displaySize'=>1)); ?>
         <div class="help_tip">Спецразмерешение - это отдельный блок, который показывается на главной странице и на странице списка акций. В спецразмещении может участвовать только одна акция.
    </div>
    
     <div class='control-group'>
		<?php echo CHtml::activeLabelEx($model, 'super_img'); ?>
		<?php 
			if($model->super_img)
				echo TbHtml::imageRounded($model->super_image_behaver->getThumb('medium'));
		 ?>
         <br>
		<?php echo $form->fileField($model,'super_img', array('class'=>'span8')); ?>
		<?php echo $form->error($model, 'super_img'); ?>
	</div>
    
 <div class="help_tip">Если акция будет в спецразмещении - обязательно заполните это поле.
    </div>


	<?php echo $form->textFieldControlGroup($model,'super_title',array('class'=>'span8','maxlength'=>255)); ?>
<div class="help_tip">Если акция будет в спецразмещении - обязательно заполните это поле.
    </div>
	

	<?php echo $form->textAreaControlGroup($model,'super_full_desc',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>
<div class="help_tip">Если акция будет в спецразмещении - обязательно заполните это поле.
    </div>
	
	<?php //echo $form->textFieldControlGroup($model,'super_work_to',array('class'=>'span8','maxlength'=>255)); ?>
    
  <?php echo $form->dropDownListControlGroup($model, 'status', News::getStatusAliases(), array('class'=>'span8', 'displaySize'=>1)); ?>
	

	</fieldset>
	
    <fieldset>
    	<legend>ДЛЯ SEO-СПЕЦИАЛИСТА</legend>
        
    	<?php echo $form->textFieldControlGroup($model,'meta_title',array('class'=>'span8','maxlength'=>255)); ?>

		<?php echo $form->textAreaControlGroup($model,'meta_keys',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>
    
        <?php echo $form->textAreaControlGroup($model,'meta_desc',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>
        
    </fieldset>
    

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Сохранить',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
