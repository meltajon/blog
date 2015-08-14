<?php
$slug = $page->uid();
$items = $pages->find($slug)->children()->filterBy('author', '*=', c::get('author'));
$items = $items->sortBy($sort='num', $direction='desc')->visible()->limit(10); 

snippet($site->theme() . '/module-feed', array(
	// 'link' => url('tech'),
	'items' => $items,
	'descriptionField'  => 'body',
	'descriptionLength' => false
)); 
?>