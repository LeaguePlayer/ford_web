<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'setting-site-form',
	'enableAjaxValidation'=>false,
)); ?>

<?php echo $form->errorSummary($model);?>
	
    <?php echo $form->textFieldControlGroup($model,'title',array('class'=>'span8','maxlength'=>255)); ?>
    
    <?php echo $form->textFieldControlGroup($model,'date_begin',array('class'=>'span8','maxlength'=>255)); ?>

	<?php echo $form->textFieldControlGroup($model,'link_on_facebook',array('class'=>'span8','maxlength'=>255)); ?>

	<?php echo $form->textFieldControlGroup($model,'link_on_vk',array('class'=>'span8','maxlength'=>255)); ?>

	<?php echo $form->textFieldControlGroup($model,'link_on_twitter',array('class'=>'span8','maxlength'=>255)); ?>
    
    <?php echo $form->textFieldControlGroup($model,'link_on_insta',array('class'=>'span8','maxlength'=>255)); ?>

	<?php echo $form->textFieldControlGroup($model,'link_on_webcam',array('class'=>'span8','maxlength'=>255)); ?>

	<?php echo $form->textFieldControlGroup($model,'email_main_admin',array('class'=>'span8','maxlength'=>255)); ?>
    <div class="help_tip">
     	В случае, если почта для направлений не указана - письмо будет приходить главному администратору.
     </div>

	<?php echo $form->textFieldControlGroup($model,'email_test_drive',array('class'=>'span8','maxlength'=>255)); ?>

	<?php echo $form->textFieldControlGroup($model,'email_feedback',array('class'=>'span8','maxlength'=>255)); ?>

	<?php echo $form->textFieldControlGroup($model,'email_strahovanie',array('class'=>'span8','maxlength'=>255)); ?>

	<?php echo $form->textFieldControlGroup($model,'email_service',array('class'=>'span8','maxlength'=>255)); ?>

	<?php echo $form->textFieldControlGroup($model,'email_credit',array('class'=>'span8','maxlength'=>255)); ?>
    
    <?php echo $form->textFieldControlGroup($model,'email_buy',array('class'=>'span8','maxlength'=>255)); ?>

	<?php echo $form->textFieldControlGroup($model,'phone_code_city',array('class'=>'span8','maxlength'=>255)); ?>

	<?php echo $form->textFieldControlGroup($model,'phone_sales',array('class'=>'span8','maxlength'=>255)); ?>

	<?php echo $form->textFieldControlGroup($model,'phone_service',array('class'=>'span8','maxlength'=>255)); ?>

	<?php echo $form->textFieldControlGroup($model,'street',array('class'=>'span8','maxlength'=>255)); ?>
    
     <?php echo $form->textAreaControlGroup($model,'image_map',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>
     <div class="help_tip">
     	Чтобы получить статическую карту, необходимо: 
        <ul>
        	<li>1. Перейти по <a href="http://api.yandex.ru/maps/tools/constructor/" target="_blank">ссылке</a> и ввести адрес</li>
            <li>2. Введите в строку поиска нужный адрес</li>
            <li>3. Далее нажимайте "Сохранить и получить код"</li>
            <li>4. Переключаете карту на Статическую</li>
        	<li>5. Копируете код встравки и вставляете в поле расположенное выше</li>
        </ul>
     </div>

	<?php echo $form->textAreaControlGroup($model,'access_to_test_drive',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>
    <div class="help_tip">
     	Название каждой новой модели должно начинаться с новой строки.
     </div>

	<?php echo $form->textFieldControlGroup($model,'rows_stock_in_main',array('class'=>'span8')); ?>
    
    <?php echo $form->textAreaControlGroup($model,'video1',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>
    <div class="help_tip">
    		Чтобы вставить видео файл с <a href="http://youtube.ru" target="_blank">ютуба</a> - требуется:
            <ul>
            	<li>1. Найти нужный ролик</li>
                <li>2. Кликнуть правой кнопкой мышки на видео</li>
                <li>3. Выберите Копировать HTML-код</li>
                <li>4. Вставте скопированный код в поле, которое распологается выше</li>
            </ul>
            Данное видео находится по следующему адресу <a target="_blank" href="/site/videodealer/position/1">/site/videodealer/position/1</a>
        </div>
    
    <?php echo $form->textAreaControlGroup($model,'video2',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>
     <div class="help_tip">
    		Чтобы вставить видео файл с <a href="http://youtube.ru" target="_blank">ютуба</a> - требуется:
            <ul>
            	<li>1. Найти нужный ролик</li>
                <li>2. Кликнуть правой кнопкой мышки на видео</li>
                <li>3. Выберите Копировать HTML-код</li>
                <li>4. Вставте скопированный код в поле, которое распологается выше</li>
            </ul>
            Данное видео находится по следующему адресу <a target="_blank" href="/site/videodealer/position/2">/site/videodealer/position/2</a>
        </div>

	
    
    <fieldset>
    	<legend>ДЛЯ SEO-СПЕЦИАЛИСТА - эти данные для главной странице сайта</legend>
        
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
