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
   <div class="help_tip">Если вы указываете ссылку на сторонний ресурс - обязательно вначале укажите http://. Если ссылка внутри сайта указывать http:// и название домена - не нужно. 
    <br /> Примеры:
    <ul>
    	<li><strong>http://yandex.ru</strong> - ведет на страницу яндекса</li>
        <li><strong>/</strong> - ведет на главную страницу существующего сайта</li>
        <li><strong>/postavnovka-na-uchet-v-gibdd</strong> - ведет на страницу постановки на учет внутри сайта</li>
    </ul>
    Ссылку так же можно оставить пустой!
    </div>

	<?php echo $form->dropDownListControlGroup($model, 'status', Partners::getStatusAliases(), array('class'=>'span8', 'displaySize'=>1)); ?>
	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Сохранить',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
