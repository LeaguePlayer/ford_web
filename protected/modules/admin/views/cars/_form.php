<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'cars-form',
	'enableAjaxValidation'=>false,
		'htmlOptions' => array('enctype'=>'multipart/form-data'),
)); ?>

<?php echo $form->errorSummary($model);?>

	<?php echo $form->textFieldControlGroup($model,'title',array('class'=>'span8','maxlength'=>255)); ?>

	<div class='control-group'>
		<?php echo CHtml::activeLabelEx($model, 'image'); ?>
		<?php 
			if($model->image)
				echo TbHtml::imageRounded($model->getThumb('medium')); 
		?><br>
		<?php echo $form->fileField($model,'image', array('class'=>'span8')); ?>
		<?php echo $form->error($model, 'image'); ?>
	</div>
    <div class='control-group'>
		<?php echo CHtml::activeLabelEx($model, 'big_image'); ?>
		<?php 
			if($model->big_image)
				echo TbHtml::imageRounded($model->big_image_im->getThumb('small')); 
		?><br>
		<?php echo $form->fileField($model,'big_image', array('class'=>'span8')); ?>
		<?php echo $form->error($model, 'big_image'); ?>
	</div>
	
     <?php echo $form->textFieldControlGroup($model,'price',array('class'=>'span8')); ?>
    	
	<fieldset>
    	<legend>Промо Ролик 1</legend>
       
    
         <div class='control-group'>
            <?php echo CHtml::activeLabelEx($model, 'image_video1'); ?>
            <?php 
                if($model->image_video1)
                    echo TbHtml::imageRounded($model->promo1->getThumb('small')); 
            ?><br>
            <?php echo $form->fileField($model,'image_video1', array('class'=>'span8')); ?>
            <?php echo $form->error($model, 'image_video1'); ?>
        </div>
    
        <?php echo $form->textAreaControlGroup($model,'video1',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>
    
    </fieldset>

	<fieldset>
    	<legend>Промо Ролик 2</legend>
       
    
         <div class='control-group'>
            <?php echo CHtml::activeLabelEx($model, 'image_video2'); ?>
            <?php 
                if($model->image_video2)
                    echo TbHtml::imageRounded($model->promo2->getThumb('small')); 
            ?><br>
            <?php echo $form->fileField($model,'image_video2', array('class'=>'span8')); ?>
            <?php echo $form->error($model, 'image_video2'); ?>
        </div>
    
        <?php echo $form->textAreaControlGroup($model,'video2',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>
    
    </fieldset>
    
    <fieldset>
    	<legend>Промо Ролик 3</legend>
       
    
         <div class='control-group'>
            <?php echo CHtml::activeLabelEx($model, 'image_video3'); ?>
            <?php 
                if($model->image_video3)
                    echo TbHtml::imageRounded($model->promo3->getThumb('small')); 
            ?><br>
            <?php echo $form->fileField($model,'image_video3', array('class'=>'span8')); ?>
            <?php echo $form->error($model, 'image_video3'); ?>
        </div>
    
        <?php echo $form->textAreaControlGroup($model,'video3',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>
    
    </fieldset>
    
    
    <?php echo $form->textFieldControlGroup($model,'link',array('class'=>'span8')); ?>
    
    <div class="control-group">
	  <?php echo $form->labelEx($model, 'path'); ?>
      <?php 
                    $this->widget('ext.elFinder.ServerFileInput', array(
                    'model'=>$model,
                    'attribute'=>'path',
                    //'path' => '/uploads', // path to your uploads directory, must be writeable 
                    //'url' => 'http://mbevents.loc/uploads/', // url to uploads directory 
                    //'action' => $this->createUrl('/elfinder/connector') // the connector action (we assume we are pasting this code in the sitecontroller view file)
                    'connectorRoute'=>'/admin/elfinder/connector',
                    'htmlOptions'=>array(
                    'value'=>'123'
                ),
               
            )); 
                    ?>
      <?php echo $form->error($model,'path'); ?>
     </div>

	<div class='control-group'>
		<?php echo CHtml::activeLabelEx($model, 'gallery'); ?>
		<?php if ($model->galleryManager->getGallery() === null) {
			echo '<p class="help-block">Прежде чем загружать изображения, нужно сохранить текущее состояние</p>';
		} else {
			$this->widget('admin_ext.imagesgallery.GalleryManager', array(
				'gallery' => $model->galleryManager->getGallery(),
				'controllerRoute' => '/admin/gallery',
			));
		} ?>
	</div>
    
    
    <? if(!$model->isNewRecord) { ?>
    
        <fieldset>
            <legend>КОМПЛЕКТАЦИИ</legend>
            <div class="results">
            	<ul>
                	<? echo $this->renderPartial('_parts',array('data'=>$data['complectations'], 'edit'=>true)); ?>
                	
                </ul>
            </div>
            <div class="object">
            	 <input id="data_type" name="data[type]" type="hidden" value="complectations" />
                 <input id="data_id_car" name="data[id_car]" type="hidden" value="<?=$model->id?>" />
                 <input id="data_title" name="data[title]" type="text" />
                 <a href="javascript:void(0);">Добавить</a>
            </div>
           
        
        </fieldset>
        
        <fieldset>
            <legend>МОЩНОСТЬ ДВИГАТЕЛЯ (Л.С.)</legend>
            <div class="results">
            	<ul>
                	<? echo $this->renderPartial('_parts',array('data'=>$data['engine'])); ?>
                	
                </ul>
            </div>
            <div class="object">
            	 <input id="data_type" name="data[type]" type="hidden" value="engine" />
                 <input id="data_id_car" name="data[id_car]" type="hidden" value="<?=$model->id?>" />
                 <input id="data_title" name="data[title]" type="text" />
                 <a href="javascript:void(0);">Добавить</a>
            </div>
           
        
        </fieldset>
        
        
        <fieldset>
            <legend>КОРОБКА ПЕРЕДАЧ</legend>
            <div class="results">
            	<ul>
                	<? echo $this->renderPartial('_parts',array('data'=>$data['akpp'])); ?>
                	
                </ul>
            </div>
            <div class="object">
            	 <input id="data_type" name="data[type]" type="hidden" value="akpp" />
                 <input id="data_id_car" name="data[id_car]" type="hidden" value="<?=$model->id?>" />
                 <input id="data_title" name="data[title]" type="text" />
                 <a href="javascript:void(0);">Добавить</a>
            </div>
           
        
        </fieldset>
        
        
         <fieldset>
            <legend>КУЗОВ</legend>
            <div class="results">
            	<ul>
                	<? echo $this->renderPartial('_parts',array('data'=>$data['body'])); ?>
                	
                </ul>
            </div>
            <div class="object">
            	 <input id="data_type" name="data[type]" type="hidden" value="body" />
                 <input id="data_id_car" name="data[id_car]" type="hidden" value="<?=$model->id?>" />
                 <input id="data_title" name="data[title]" type="text" />
                 <a href="javascript:void(0);">Добавить</a>
            </div>
           
        
        </fieldset>
    
    <? } ?>


	<fieldset>
    	<legend>ДЛЯ SEO-СПЕЦИАЛИСТА</legend>
        
      
        
        <?php echo $form->textFieldControlGroup($model,'meta_title',array('class'=>'span8','maxlength'=>255)); ?>

		<?php echo $form->textAreaControlGroup($model,'meta_keys',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

		<?php echo $form->textAreaControlGroup($model,'meta_desc',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>
    
    </fieldset>

	<?php echo $form->dropDownListControlGroup($model, 'status', Cars::getStatusAliases(), array('class'=>'span8', 'displaySize'=>1)); ?>
	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Сохранить',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
