<div id="content">
    <div class="fix_width">
        <div id="feedback-box">
                    <?php 
        if($model->hasErrors()){
      echo CHtml::errorSummary($model, null, null, array('class'=>'alert alert-block alert-error'));
    }
     ?>
                <form method="POST" action="/site/<?=$type?>" class="form">
                    <div class="feedback-col left">
                        <h3 id="drive-header">Отправить заявку</h3>
                           <div class="row">
                                <label for="name">Как Вас зовут?<span>*</span></label>
                                <input id="name" name="Orders[name]" class="blue_text" value="<?=$model->name?>" placeholder="Иван Иванович" type="text">
                            </div>
                            <div class="row">
                                <label for="input2">Ваш телефон<span>*</span></label>
                                <input name="Orders[phone]" id="input2" class="blue_text" type="text" value="<?=$model->phone?>" placeholder="8-922-000-00-00">
                            </div>
                            <div class="row">
                                <label for="email">Ваш e-mail</label>
                                <input id="email" name="Orders[email]" class="blue_text" value="<?=$model->email?>" placeholder="example@mail.ru" type="text">
                            </div>
                            <div class="row">
                                <label for="feed_comment">Комментарий</label>
                                <textarea name="Orders[comment]" id="feed_comment" cols="30" rows="3">
                                    <?=$model->comment?>
                                </textarea>
                            </div>
                    </div>
                    <div class="feedback-col right">
                        <div id="timer">Мы свяжемся с вами в течение 1 часа</div>
                        <div class="code">
                        
                            <div class="captcha">
                                <? if(CCaptcha::checkRequirements() && Yii::app()->user->isGuest):?>
                            <?=CHtml::activeLabelEx($model, 'verifyCode')?>
                            <?$this->widget('CCaptcha')?>
                            
                        <? endif?>
                            </div>
                            <div class="verify">
                                <label for="enter_ferify">Введите код:</label>
                                <?=CHtml::activeTextField($model, 'verifyCode', array('id'=>'enter_ferify','class'=>'blue_text'))?>
                                
                            </div>
                            <p id="capt_text">
                                Докажите, что вы не робот. Введите проверочный код слева в окно
                            </p>
                        </div>
                        <input class="green_button send" type="submit" value="Отправить заявку">
                    </div>
                </form>
            </div>
    </div>
</div>