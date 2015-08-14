<?php 
if ($page->isHomepage() == true && c::get('is_personal', false) == true):
	$siblings_featured = $site->index()->filterBy('is_featured', '1');
	$siblings = $site->index()->filterBy('is_featured', '!=', '1')->sortBy('date', 'desc');
elseif ($page->uid() == 'error' && c::get('is_personal', false) == true):
	$siblings_featured = $site->index()->filterBy('is_featured', '1');
	$siblings = $site->index()->filterBy('is_featured', '!=', '1')->sortBy('date', 'desc');
elseif ($page->uid() == 'error' && c::get('is_personal', false) == false):
	$siblings_featured = $site->children()->visible()->children()->filterBy('is_featured', '1');
	$siblings = $site->children()->visible()->children()->filterBy('is_featured', '!=', '1')->sortBy('date', 'desc');
else:
	$siblings_featured = $page->siblings()->filterBy('is_featured', '1'); 
	$siblings = $page->siblings()->filterBy('is_featured', '!=', '1')->sortBy('date', 'desc')->filterBy('date', '<', $page->date());
endif;

$siblings_featured = $siblings_featured->visible()->flip()->limit('10');
$siblings = $siblings->visible()->limit('5');

?>
<?php if ($siblings > '1'): ?>
	<aside class="related">
		<h1 class="related-title">
			<?php
			if ($page->isHomepage() == true && c::get('is_personal', false) == true):
				echo 'Popular Posts';
			else:
				echo 'Previous Posts';
			endif;
			?>
		</h1>
		<ul class="related-list">
		<?php
		foreach($siblings_featured as $sibling):
			$sibling_type = 'Most Read';
			snippet($site->theme() . '/module-related-item', array('sibling' => $sibling, 'sibling_type' => $sibling_type));
		endforeach;

		if ($page->isHomepage() != true):
			foreach($siblings as $sibling):
				$sibling_type = '';
				snippet($site->theme() . '/module-related-item', array('sibling' => $sibling, 'sibling_type' => $sibling_type));
			endforeach;
		endif;
		?>
		</ul>
	</aside><!-- related-posts -->
<?php endif; // if page has featured related posts ?>