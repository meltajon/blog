				<?php if($items->pagination()->hasPages()): ?>
				<nav class="pagination">
					<?php if($items->pagination()->hasPrevPage()): ?>
					<a class="pagination-link pagination-link_newer" href="<?php echo $items->pagination()->prevPageURL() ?>">&lsaquo; Newer</a>
					<?php endif ?>
					
					<?php if(!$items->pagination()->isFirstPage()): ?>
					<a class="pagination-link pagination-link_first" href="<?php echo $items->pagination()->firstPageUrl(); ?>"><?php echo $items->pagination()->firstPage(); ?></a> ... 
					<?php endif; ?>
					
					<?php foreach($items->pagination()->range(5) as $r): ?>
					<a class="pagination-link<?php if($items->pagination()->page() == $r) echo ' pagination-link_active' ?>" href="<?php echo $items->pagination()->pageURL($r) ?>"><?php echo $r ?></a>
					<?php endforeach ?>
					
					<?php if(!$items->pagination()->isLastPage()): ?>
					 ... <a class="pagination-link pagination-link_last" href="<?php echo $items->pagination()->lastPageUrl(); ?>"><?php echo $items->pagination()->lastPage(); ?></a>
					<?php endif; ?>
					
					<?php if($items->pagination()->hasNextPage()): ?>
					<a class="pagination-link pagination-link_older" href="<?php echo $items->pagination()->nextPageURL() ?>">Older &rsaquo;</a>
					<?php endif ?>
				</nav><!-- pagination -->
				<?php endif ?>