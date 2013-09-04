<?
	if( count($data) > 0 )
	{
		foreach ($data as $id => $title)
		{
			echo "<li>{$title} (<a href='/admin/carssitespublic/parts/id/{$id}'>Удалить</a>)</li>";
		}
	}
?>