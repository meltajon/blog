<?php snippet($site->theme() . '/module-header'); ?>
<?php 
if ($page->intendedTemplate() == 'home'):
	if ( param('category') || param('tag') || param('with') ):
		$items = $site->index()->filterBy('author', '*=', c::get('author') )->visible();
	else:
		$items = $pages->find( 
			$pages->find('personal')->children()->filterBy('author', '*=', c::get('author'))->visible()->last(), 
			$pages->find('friends')->children()->filterBy('author', '*=', c::get('author'))->visible()->last(), 
			$pages->find('buzz')->children()->filterBy('author', '*=', c::get('author'))->visible()->last(), 
			$pages->find('tech')->children()->filterBy('author', '*=', c::get('author'))->visible()->last(), 
			$pages->find('design')->children()->filterBy('author', '*=', c::get('author'))->visible()->last(), 
			$pages->find('wisdom')->children()->filterBy('author', '*=', c::get('author'))->visible()->last() 
		);
	endif;
elseif ($page->intendedTemplate() == 'channel'): 
	$items = $page->children()->filterBy('author', '*=', c::get('author'))->visible();
else:
	$items = $site->index()->filterBy('author', '*=', 'meltajon')->visible();
endif;

$items = $items->sortBy($sort='date', $direction='desc');

if($tag = param('category')) { $items = $items->filterBy('categories', $tag, ','); }
if($tag = param('tag')) { $items = $items->filterBy('hashtags', $tag, ','); }
if($tag = param('with')) { $items = $items->filterBy('mentions', $tag, ','); }

if (c::get('is_dev', false) != true) { $items = $items->visible(); }

$items = $items->paginate(10);
?>
		<section>
			<div id="main-wrapper" class="wrapper">
				<?php
					if ($page->intendedTemplate() == 'home' && !(param('category') || param('tag') || param('with'))):
						foreach($items as $item):
							$items_same_day = $item->siblings()->filterBy('date', $item->date());
							$show_browse_button = false;
							foreach($items_same_day as $item_same_day):
								if ($item_same_day->is($items_same_day->last())):
									$show_browse_button = true;
								endif;
								snippet($site->theme() . '/module-post', array('item' => $item_same_day, 'show_browse_button' => $show_browse_button));
							endforeach;
						endforeach;
					else:
						foreach($items as $item):
							$show_browse_button = false;
							snippet($site->theme() . '/module-post', array('item' => $item, 'show_browse_button' => $show_browse_button));
						endforeach;
					endif;

					snippet($site->theme() . '/module-pagination', array('items' => $items));

					if ($page->isHomepage() == true):
						snippet($site->theme() . '/module-related'); 
					endif;
				?>
			</div><!-- wrapper -->
		</section>

<?php snippet($site->theme() . '/module-footer'); ?>