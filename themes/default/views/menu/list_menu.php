<div class="content fix_width">
				<div class="scol-1">
					<div class="divide">
						<a href="/avtomobili" class="head">Легковые автомобили</a>
						<?
						 	if( count($menu[1]) > 0 )
							{
								foreach ( $menu[1] as $object_menu )
								{
									echo "<a href='{$object_menu[link]}'>{$object_menu[title]}</a>";
								}
							}
						?>
                        </div>
                        	<a href="/avtomobili-v-nalichii" class="head">Автомобили в наличии</a>
                        
					
				</div>
				<div class="scol-2">
					
					<a href="/kommercheskie-avtomobili" class="head">Коммерческие автомобили</a>
					<?
						 	if( count($menu[3]) > 0 )
							{
								foreach ( $menu[3] as $object_menu )
								{
									echo "<a href='{$object_menu[link]}'>{$object_menu[title]}</a>";
								}
							}
						?>

				</div>
				<div class="scol-3">
					<div class="divide">
						<a class="head">Гид покупателя</a>
						<?
						 	if( count($menu[7]) > 0 )
							{
								foreach ( $menu[7] as $object_menu )
								{
									echo "<a href='{$object_menu[link]}'>{$object_menu[title]}</a>";
								}
							}
						?>
					</div>
					<a href="/korporativnym-klientam" class="head">Корпоративным
клиентам</a>
					<?
						 	if( count($menu[4]) > 0 )
							{
								foreach ( $menu[4] as $object_menu )
								{
									echo "<a href='{$object_menu[link]}'>{$object_menu[title]}</a>";
								}
							}
						?>
				</div>
				<div class="scol-4">
					<div class="divide">
						<a href="/dealer" class="head">О дилере</a>
						<?
						 	if( count($menu[5]) > 0 )
							{
								foreach ( $menu[5] as $object_menu )
								{
									echo "<a href='{$object_menu[link]}'>{$object_menu[title]}</a>";
								}
							}
						?>
					</div>
					<a class="head">О FORD</a>
					<?
						 	if( count($menu[6]) > 0 )
							{
								foreach ( $menu[6] as $object_menu )
								{
									echo "<a href='{$object_menu[link]}'>{$object_menu[title]}</a>";
								}
							}
						?>
				</div>