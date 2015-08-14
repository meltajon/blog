<?php
$items = $site->index()->filterBy('author', '*=', c::get('author'));
$items = $items->sortBy($sort='num', $direction='desc')->visible()->limit(10);

snippet($site->theme() . '/module-feed', array(
	'link' => url(),
	'items' => $items,
	'descriptionField'  => 'body',
	'descriptionLength' => false
)); 
?>