<div class="fix_width">
    <div id="test-drive-box">
    
    <?php 
	if($model->hasErrors()){
  echo CHtml::errorSummary($model);
}
 ?>
            <form method="POST" action="/site/testdrive" class="form">
                <div class="drive-col left">
                    <h3 id="drive-header">Запись на тест-драйв</h3>
                        <div class="row">
                            <label for="input0">Выбранная модель</label>
                            <input name="data[car]" id="input0" class="blue_text" type="text" value="<?=$model->car?>" value="select">
                        </div>
                        <div class="row">
                            <label for="input1">Как Вас зовут</label>
                            <input name="data[name]" id="input1" class="blue_text" type="text" value="<?=$model->name?>" placeholder="Иван Иванов">
                        </div>
                        <div class="row">
                            <label for="input2">Ваш телефон</label>
                            <input name="data[phone]" id="input2" class="blue_text" type="text" value="<?=$model->phone?>" placeholder="8-922-000-00-00">
                        </div>
                        <div class="row">
                            <label for="input3">Ваш e-mail</label>
                            <input name="data[email]" id="input3" class="blue_text" type="text" value="<?=$model->email?>" placeholder="mail@example.ru">
                            <div class="arrow">
                                Сюда мы направим всю информацию по тест-драйву
                            </div>
                        </div>
                        
                        
                </div>
                <div class="drive-col right">
                    <img src="<?php echo $this->getAssetsUrl() ?>/img/drive-car.png" alt="">
                    <p class="comment">
                        Комментарий
                        </p>
                        <textarea name="data[comment]" id="comment" cols="30" rows="4">
                        	<?=$model->comment?>
                        </textarea>
                </div>
                <div class="button-row">
                    <div class="write">
                        <img src="<?php echo $this->getAssetsUrl() ?>/img/24.png" alt="">
                        <p class="24text">Мы свяжемся с вами в течение 24 часов</p>
                        <input class="green_button" type="submit" value="Записаться">
    
                    </div>
                    <div class="secured">
                        <div class="texts">
                            <p id="text1">Ваши данные в безопасности</p>
                            <p id="text2">Мы используем защищенное соединение</p>
                        </div>	
                    </div>
            </div>
            </form>
                
        </div>
</div>