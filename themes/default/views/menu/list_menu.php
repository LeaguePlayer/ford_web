<div class="content fix_width">
				<div class="scol-1">
					<div class="divide">
						<a href="/cars/" class="head">Легковые автомобили</a>
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
                        	<a href="#" class="head">Автомобили в наличии</a>
                        
					
				</div>
				<div class="scol-2">
					
					<a href="#" class="head">Коммерческие автомобили</a>
					<?
						 	if( count($menu[3]) > 0 )
							{
								foreach ( $menu[1] as $object_menu )
								{
									echo "<a href='{$object_menu[link]}'>{$object_menu[title]}</a>";
								}
							}
						?>

				</div>
				<div class="scol-3">
					<div class="divide">
						<a href="#" class="head">Гид покупателя</a>
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
					<a href="#" class="head">Корпоративным
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
					<a href="#" class="head">О FORD</a>
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