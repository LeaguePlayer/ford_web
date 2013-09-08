<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'complectationvalues-form',
	'enableAjaxValidation'=>false,
)); ?>

<?php echo $form->errorSummary($model);?>

	

	
	

	<?php echo $form->textFieldControlGroup($model,'param',array('class'=>'span8','maxlength'=>255)); ?>
    
    <?php echo $form->textFieldControlGroup($model,'value',array('class'=>'span8','maxlength'=>255)); ?>
    
	<?php echo $form->dropDownListControlGroup($model, 'property', Complectationvalues::getValues(), array('class'=>'span8', 'displaySize'=>1)); ?>

	
<?php echo $form->dropDownListControlGroup($model, 'id_category_public', Complectationvalues::getCategory(), array('class'=>'span8', 'displaySize'=>1)); ?>
	
	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Сохранить',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
