<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'slider-form',
	'enableAjaxValidation'=>false,
		'htmlOptions' => array('enctype'=>'multipart/form-data'),
)); ?>

<?php echo $form->errorSummary($model);?>

	<?php echo $form->groupSitesControlGroup($model, 'id_site', "Показывать на сайтах"); ?>

	<div class='control-group'>
    
		<?php echo CHtml::activeLabelEx($model, 'image'); ?>
		<?php 
			if($model->image)
				echo TbHtml::imageRounded($model->getThumb('medium')); 
		?><br>
		<?php echo $form->fileField($model,'image', array('class'=>'span8')); ?>
		<?php echo $form->error($model, 'image'); ?>
	</div>
    <div class="help_tip">Слайды показываются только с загруженным изображением! В ином случае, даже если слайд опубликован - он показываться не будет.
    </div>

	<?php echo $form->textFieldControlGroup($model,'title',array('class'=>'span8','maxlength'=>255)); ?>

	<div class='control-group'>
		<?php echo CHtml::activeLabelEx($model, 'html_content'); ?>
		<?php $this->widget('admin_ext.ckeditor.CKEditorWidget', array('model' => $model, 'attribute' => 'html_content',
		)); ?>
		<?php echo $form->error($model, 'html_content'); ?>
	</div>

	<div class="merge_divs">
    	<?php echo $form->textFieldControlGroup($model,'link',array('class'=>'span8','maxlength'=>255)); ?>
    </div>
    <div class="help_tip">Если вы указываете ссылку на сторонний ресурс - обязательно вначале укажите http://. Если ссылка внутри сайта указывать http:// и название домена - не нужно. 
    <br /> Примеры:
    <ul>
    	<li><strong>http://yandex.ru</strong> - ведет на страницу яндекса</li>
        <li><strong>/</strong> - ведет на главную страницу существующего сайта</li>
        <li><strong>/postavnovka-na-uchet-v-gibdd</strong> - ведет на страницу постановки на учет внутри сайта</li>
    </ul>
    Ссылку так же можно оставить пустой, тогда кнопка на слайдере показываться не будет!
    </div>

	<?php echo $form->dropDownListControlGroup($model, 'status', Slider::getStatusAliases(), array('class'=>'span8', 'displaySize'=>1)); ?>
	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Сохранить',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
