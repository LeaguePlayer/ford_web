<?
	if( count($data) > 0 )
	{
		foreach ($data as $id => $title)
		{
			if($edit) 
				$html = " <a class='options_b' href='/admin/complectationvalues/list/id_complectation/{$id}'>Управление опциями</a>";
			else 
				$html = "";
			
			echo "<li>{$title}{$html} (<a class='del_b' href='/admin/carssitespublic/parts/id/{$id}'>Удалить</a>)</li>";
		}
	}
?>