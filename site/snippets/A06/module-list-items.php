<?php foreach($page->children() as $list_item): ?>
	<div class="list-item">
		<h2 id="<?php echo $list_item->uid(); ?>" class="list-item-title"><?php e($page->list_type() == 'ordered', $list_item->num() . '. '); ?><?php echo $list_item->title(); ?></h2>
		<div class="list-item-body">
			<?php
			if($list_item->hasImages() && $list_item->embed() == '') {
				foreach($list_item->images() as $image):
					echo thumb($image, array('width' => 600, 'class' => 'post-thumb'));
				endforeach;
			} 
			?>
			<?php echo kirbytext($list_item->body()); ?>
		</div><!-- list-item-body -->
	</div><!-- list-item -->
<?php endforeach; ?>