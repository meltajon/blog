<?php snippet('A03/module-header'); ?>
<?php 
if ($page->intendedTemplate() == 'home' && c::get('is_personal', false) == true):
	$items = $site->index(); 
elseif ($page->intendedTemplate() == 'category' && c::get('is_personal', false) == true): 
	$items = $page->index();
elseif ($page->intendedTemplate() == 'category'): 
	$items = $page->index()->filterBy('is_listed', '1');
else:
	$items = $site->children()->visible()->children()->filterBy('is_listed', '1'); 
endif;

$items = $items->sortBy($sort='num', $direction='desc');
if($tag = param('tag')) {
	$items = $items->filterBy('hashtags', $tag, ',');
}
if($tag = param('with')) {
	$items = $items->filterBy('mentions', $tag, ',');
}
$items = $items->visible()->paginate(10)
?>
		<section>
			<div class="wrapper">
				<?php foreach($items as $item) {
					snippet('A03/module-post', array('item' => $item));
				} ?>

				<?php snippet('A03/module-pagination', array('items' => $items)); ?>
			</div><!-- wrapper -->
		</section>

<?php snippet('A03/module-footer'); ?>