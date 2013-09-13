<?php 
$form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'carssitespublic-form',
	'enableAjaxValidation'=>false,
)); ?>

<?php echo $form->errorSummary($model);?>

	<? if($model->isNewRecord) echo "<div id='new_record'></div>"; ?>
    
    <?php echo $form->dropDownListControlGroup($model, 'id_car', $data['cars'], array('class'=>'span8', 'displaySize'=>1)); ?>

	
    <?php echo $form->dropDownListControlGroup($model, 'id_complecations', $data['complecations'], array('class'=>'span8', 'displaySize'=>1)); ?>
    <?php echo $form->dropDownListControlGroup($model, 'id_engine', $data['engine'], array('class'=>'span8', 'displaySize'=>1)); ?>
    <?php echo $form->dropDownListControlGroup($model, 'id_akpp', $data['akpp'], array('class'=>'span8', 'displaySize'=>1)); ?>
    <?php echo $form->dropDownListControlGroup($model, 'id_body', $data['body'], array('class'=>'span8', 'displaySize'=>1)); ?>
	
    
    <?php echo $form->textFieldControlGroup($model,'price',array('class'=>'span8','maxlength'=>255)); ?>
    
    <?php echo $form->dropDownListControlGroup($model, 'avail_now', fnc::returnYesNo(), array('class'=>'span8', 'displaySize'=>1)); ?>
     <div class="help_tip">В случае положительного выбора - данная комплектация появится в разделе "Автомобили в наличии".
    </div>
    
    <?php 
		if($model->isNewRecord and Yii::app()->user->id_site==0 )
		{
			
			echo $form->dropDownListControlGroup($model, 'sync', fnc::returnYesNo(), array('class'=>'span8', 'displaySize'=>1));
			echo ' <div class="help_tip">Эта опция доступна толького главным администраторам. Если Вы выберите опцию "Да" - данная запись создаться на всех 3х сайтах сразу.
    </div>';
		}
		
	 ?>

	<?php echo $form->dropDownListControlGroup($model, 'status', Carssitespublic::getStatusAliases(), array('class'=>'span8', 'displaySize'=>1)); ?>
	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Сохранить',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
