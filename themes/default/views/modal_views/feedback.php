<div id="feedback-box">
		<form action="" class="form">
			<div class="feedback-col left">
				<h3 id="drive-header">Отправить заявку</h3>
					<div class="row">
						<label for="dear">Выбор обращения</label>
						<input id="dear" class="blue_text" value="select" type="text">
					</div>
					<div class="row">
						<label for="name">Представтесь</label>
						<input id="name" class="blue_text" value="Александр Иванович" type="text">
					</div>
					<div class="row">
						<label for="email">Ваш e-mail</label>
						<input id="email" class="blue_text" value="me@iveles.ru" type="text">
					</div>
					<div class="row">
						<label for="feed_comment">Комментарий</label>
						<textarea name="" id="feed_comment" cols="30" rows="3">Небольшой комментарий в три строки, чтобы показать межстрочное расстояние и отступы.</textarea>
					</div>
			</div>
			<div class="feedback-col right">
				<div id="timer">Мы свяжемся с вами в течение 1 часа</div>
				<div class="code">
					<div class="captcha">
						<img src="<?php echo $this->getAssetsUrl() ?>/img/tmp/CODE.png" alt="">
					</div>
					<div class="verify">
						<label for="enter_ferify">Введите код:</label>
						<input id="enter_ferify" class="blue_text" type="text">
					</div>
					<p id="capt_text">
						Докажите, что вы не робот. Введите проверочный код слева в окно
					</p>
				</div>
				<a href="#" class="green_button send">Отправить заявку</a>
			</div>
		</form>
	</div>