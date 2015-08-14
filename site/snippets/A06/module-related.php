<?php 
if ($page->isHomepage() != true && $page->uid() != 'error'):
	$siblings_featured = $page->siblings()->filterBy('author', '*=', c::get('author'))->filterBy('is_featured', '1');
	$siblings = $page->siblings()->filterBy('author', '*=', c::get('author'))->filterBy('is_featured', '!=', '1');
else:
	$siblings_featured = $site->index()->filterBy('author', '*=', c::get('author'))->filterBy('is_featured', '1');
	$siblings = $site->index()->filterBy('author', '*=', c::get('author'))->filterBy('is_featured', '!=', '1')->sortBy('date', 'desc');
endif;

$siblings_featured = $siblings_featured->visible()->flip()->limit('10');
$siblings = $siblings->visible()->filterBy('date', '<=', $page->date())->not($page->uid())->flip()->limit('5');
?>
<?php if ($siblings > '1'): ?>
	<aside class="related">
		<h1 class="related-title">
			<?php
			if ($page->isHomepage() == true):
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