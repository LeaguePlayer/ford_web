<div id="content">

<? if(!$data['car_menu']) { ?>
    <section class="car-list fix_width">
        <h2 class="list_header">Выбери свой FORD!</h2>
            <?=$this->renderPartial( '/cars/_cars' )?>
    </section>
<? } ?>

<section class="car-selected fix_width">
	<h3 class="car-header">Ford Focus 2013</h3>
	<img src="<?php echo $this->getAssetsUrl() ?>/img/tmp/car_selected.png" alt="">
</section>

<section class="parameters fix_width">
	<div class="gallery">
		<h2>Фотогалерея</h2>
		<img src="<?php echo $this->getAssetsUrl() ?>/img/tmp/gallery.png" alt="">
		<div class="more">
			<h2>Хотите узнать больше о Ford Focus ST?</h2>
			<p>Посетите <a href="#">официальный сайт Ford</a></p>
		</div>
	</div>
	<div class="review">
		<h2>Краткий обзор</h2>
		<div class="rev">
			<div class="parameter track">
				<p>Расход в городе</p>
				<p class="track_val">9.4-10.5</p>
			</div>
			<div class="parameter city">
				<p>Расход на трассе</p>
				<p class="city_val">7.0-10.0</p>
			</div>
			<div class="parameter accel">
				<p>Разгон 0-100 Км/ч</p>
				<p class="accel_val">5.0-12.5</p>
			</div>
			<div class="parameter out">
				<p>Выбросы CO2</p>
				<p class="out_val">136-321</p>
			</div>
			<div class="parameter doors">
				<p>Число дверей</p>
				<p class="doors_val">5</p>
			</div>
			<div class="parameter places">
				<p>Количество мест</p>
				<p class="places_val">5</p>
			</div>
		</div>
		<a href="#" class="pdf">Скачать брошюру</a>
	</div>
</section>

<section class="equip fix_width">
	<h2>Доступные комплектации</h2>
	<table>
		<tr>
			<th>Название комплектации</th>
			<th>Мощность двигателя</th>
			<th>Тип кузова</th>
			<th>Тип КПП</th>
			<th>Цена</th>
		</tr>
		<tr>
			<td>Название комплектации</td>
			<td>Мощность двигателя</td>
			<td>Тип кузова</td>
			<td>Тип КПП</td>
			<td>Цена</td>
		</tr>
		<tr>
			<td>Название комплектации</td>
			<td>Мощность двигателя</td>
			<td>Тип кузова</td>
			<td>Тип КПП</td>
			<td>Цена</td>
		</tr>
		<tr>
			<td>Название комплектации</td>
			<td>Мощность двигателя</td>
			<td>Тип кузова</td>
			<td>Тип КПП</td>
			<td>Цена</td>
		</tr>
		<tr>
			<td>Название комплектации</td>
			<td>Мощность двигателя</td>
			<td>Тип кузова</td>
			<td>Тип КПП</td>
			<td>Цена</td>
		</tr>
	</table>
	<p class="benefit">
		Выгода до 100 000 рублей!
	</p>
	<a href="#" class="gray_button"><img src="<?php echo $this->getAssetsUrl() ?>/img/compare.png" alt="">Сравнить комплектации</a>
	<a href="" class="orange_button">Взять в кредит</a>
	<a href="" class="orange_button">Купить</a>
	<a class="green_button fancybox" href="#test-drive-box"><img src="<?php echo $this->getAssetsUrl() ?>/img/test_drive.png" alt=""><span>Записаться на тест-драйв</span></a>
</section>

<section class="promises fix_width">
	<h3>Автоград гарантирует</h3>
	<div class="promise-1">
		<p class="pheader">Страхование автомобилей</p>
		<p class="p-desc">
		FordСтрахование — специальная программа страхования для тех, кто собирается приобрести новый автомобиль или уже</p>
	</div>
	<div class="promise-2">
		<p class="pheader">Техническое обслуживание</p>
		<p class="p-desc">
			Все специалисты компании проходят обязательное обучение, сертификацию и стажировку в учебных центрах компаний-производителей.
		</p>
	</div>
	<div class="promise-3">
		<p class="pheader">Кредитование от <b>FORD</b></p>
		<p class="p-desc">Наша компания (ООО "Эскорт-Финанс") предлагает Вам приобрести в кредит новые автомобили представленных в Автограде</p>
	</div>
</section>

<!--END-content-->

	<section class="site_map four">
			<?=$this->renderPartial('/menu/list_menu',array('menu'=>$data['menu']))?>
	</section>

</div>