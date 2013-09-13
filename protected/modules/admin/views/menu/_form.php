<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'menu-form',
	'enableAjaxValidation'=>false,
)); ?>

<?php echo $form->errorSummary($model);?>

	<?php echo $form->groupSitesControlGroup($model, 'id_site', "Показывать на сайтах"); ?>

	<?php echo $form->dropDownListControlGroup($model,'id_category', fnc::menuCategories(), array('class'=>'span8', 'displaySize'=>1)); ?>

	<?php echo $form->textFieldControlGroup($model,'title',array('class'=>'span8','maxlength'=>255)); ?>

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
    </div>

	
		<?php echo $form->dropDownListControlGroup($model,'show_on_main', fnc::returnYesNo(), array('class'=>'span8', 'displaySize'=>1)); ?>
        
  <div class="help_tip">На главной страницы меню отличается от меню на других страницах, чтобы этот пункт появился на главной странице сайта - выберите "Да", в ином случае, данный пункт не будет отображаться на главной странице.
    </div>

	<?php echo $form->dropDownListControlGroup($model, 'status', Menu::getStatusAliases(), array('class'=>'span8', 'displaySize'=>1)); ?>
	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Сохранить',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
