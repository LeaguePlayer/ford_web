<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'partners-form',
	'enableAjaxValidation'=>false,
		'htmlOptions' => array('enctype'=>'multipart/form-data'),
)); ?>

<?php echo $form->errorSummary($model);?>

	<?php echo $form->groupSitesControlGroup($model, 'id_site', "Показывать на сайтах"); ?>

	<?php echo $form->textFieldControlGroup($model,'title',array('class'=>'span8','maxlength'=>255)); ?>

	<div class='control-group'>
		<?php echo CHtml::activeLabelEx($model, 'image'); ?>
		<?php echo TbHtml::imageRounded($model->getThumb('medium')); ?><br>
		<?php echo $form->fileField($model,'image', array('class'=>'span8')); ?>
		<?php echo $form->error($model, 'image'); ?>
	</div>

	<?php echo $form->textFieldControlGroup($model,'link',array('class'=>'span8','maxlength'=>255)); ?>
    <?php echo TbHtml::alert(TbHtml::ALERT_COLOR_WARNING, 'Если вы указываете ссылку на сторонний ресурс - обязательно вначале укажите http://. Если ссылка внутри сайта указывать http:// и название домена - не нужно.'); ?>

	<?php echo $form->dropDownListControlGroup($model, 'status', Partners::getStatusAliases(), array('class'=>'span8', 'displaySize'=>1)); ?>
	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Сохранить',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
