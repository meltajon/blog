<?php snippet($site->theme() . '/module-header'); ?>
<?php 
if ($page->intendedTemplate() == 'home' && c::get('is_personal', false) == true):
	$items = $site->index(); 
elseif ($page->intendedTemplate() == 'smart-category'): 
	$items = $site->children()->filterBy('section', $page->uid())->children();
elseif ($page->intendedTemplate() == 'category'): 
	$items = $page->children()->index();
else:
	// only display posts that belong to visible categories
	$items = $site->children()->visible()->index(); 
endif;

$items = $items->sortBy($sort='date', $direction='desc');

if($tag = param('category')) {
	$items = $items->filterBy('categories', $tag, ',');
}
if($tag = param('tag')) {
	$items = $items->filterBy('hashtags', $tag, ',');
}
if($tag = param('with')) {
	$items = $items->filterBy('mentions', $tag, ',');
}

if (c::get('is_dev', false) != true):
	$items = $items->visible();
endif; 

$items = $items->paginate(10);
?>
		<section>
			<div id="main-wrapper" class="wrapper">
				<?php
				foreach($items as $item) {
					snippet($site->theme() . '/module-post', array('item' => $item));
				}

				snippet($site->theme() . '/module-pagination', array('items' => $items));

				if ($page->isHomepage() == true && c::get('is_personal', false) == true):
					snippet($site->theme() . '/module-related'); 
				endif;
				?>
			</div><!-- wrapper -->
		</section>

<?php snippet($site->theme() . '/module-footer'); ?>