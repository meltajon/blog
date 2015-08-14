				<article class="post post_<?php echo $item->intendedTemplate() ?>">
					<header class="post-header">

						<div class="post-categories">
							<a href="<?php echo "/" . $item->parent(); ?>"><?php echo $item->parent()->title(); ?></a>
						</div><!-- post-categories -->

						<?php if($item->hasImages()) { ?> 
						<?php foreach($item->images() as $image): ?>
						<a class="post-thumb-link" href="<?php echo $item->url(); ?>" rel="bookmark">
							<img class="post-thumb" src="<?php echo $image->url() ?>" width="<?php echo $image->width() ?>" height="<?php echo $image->height() ?>" alt="<?php echo $image->title() ?>" />
							<?php if ( $item->featured_name() != "" || $item->featured_title() != "" || $item->featured_source_name() != "" ): ?>
							<span class="post-thumb-caption">
								<?php if ( $item->featured_name() ): ?><span class="post-featured-name post-featured-meta"><?php echo $item->featured_name(); ?></span><?php endif; ?>
								<?php if ( $item->featured_title() ): ?><span class="post-featured-title post-featured-meta"><?php echo $item->featured_title(); ?></span><?php endif; ?>
								<?php if ( $item->featured_source_name() ): ?><span class="post-featured-source post-featured-meta"><?php echo $item->featured_source_name(); ?></span><?php endif; ?>
							</span>
							<?php endif; ?>
						</a>
						<?php endforeach ?>
						<?php } ?>

						<?php 
						switch( $item->intendedTemplate() ){
							// hide these formats
							case 'chat':
								$hideTitle = true;
								$hideBody = false;
								break;
							case 'wp-chat':
								$hideTitle = true;
								$hideBody = false;
								break;
							case 'status':
								$hideTitle = true;
								$hideBody = false;
								break;
							case 'wp-status':
								$hideTitle = true;
								$hideBody = false;
								break;
							case 'quote':
								$hideTitle = true;
								$hideBody = false;
								break;
							case 'wp-quote':
								$hideTitle = true;
								$hideBody = false;
								break;
							case 'status':
								$hideTitle = true;
								$hideBody = false;
								break;
							case 'wp-status':
								$hideTitle = true;
								$hideBody = false;
								break;
							case 'video':
								$hideTitle = true;
								$hideBody = true;
								break;
							case 'wp-video':
								$hideTitle = true;
								$hideBody = true;
								break;

							// show these formats
							case 'link':
								$hideTitle = false;
								$hideBody = false;
								break;
							case 'wp-link':
								$hideTitle = false;
								$hideBody = false;
								break;
							default:
								$hideTitle = false;
								$hideBody = false;
						}
						?>

						<?php if ($hideTitle == false): ?>
						<h1 class="post-title"><a class="post-title-link" href="<?php if ($item->source_url() != '') { echo $item->source_url(); } else { echo $item->url(); } ?>" rel="bookmark"><?php echo html($item->title()) ?><?php if($item->source_url() != '') { ?> →<?php } ?></a></h1>
						<?php endif; ?>

					</header><!-- post-header -->
					<?php if ($hideBody != true): ?>
					<div class="post-body">
						<?php if ($item->excerpt() != '' && $page->template() != 'default'):
						echo kirbytext($item->excerpt()); ?>
						<p class="more-button"><a class="more-link" href="<?php echo $item->url(); ?>">Read More</a></p>
						<?php else: 
							echo kirbytext($item->body()); 
						endif; ?>
					</div><!-- post-body -->
					 <?php endif; ?>
					<footer class="post-footer">
						<div class="post-byline post-meta">
							Posted <a class="post-permalink" href="<?php echo $item->url(); ?>"><?php echo $item->date('F j, Y'); ?></a> 
							<?php if ( $item->source_name() != '' && $item->source_url() != '' ): ?>
							by <a class="post-source-link" href="<?php echo $item->source_url(); ?>"><?php echo $item->source_name(); ?></a> 
							<?php elseif ( $item->source_name() != '' && $item->source_url() == '' ): ?>
							by <?php echo $item->source_name(); ?>
							<?php endif; ?>
							<?php if ( $item->via_name() != '' && $item->via_url() != '' ): ?>
							via <a class="post-via-link" href="<?php echo $item->via_url(); ?>"><?php echo $item->via_name(); ?></a> 
							<?php elseif ( $item->via_name() != '' && $item->via_url() == '' ): ?>
							via <?php echo $item->via_name(); ?>
							<?php endif; ?>
							<?php if (c::get('is_dev', false) == true): ?>
							 - 
							<a href="/panel/#/pages/show/<?php echo $item->uri(); ?>">Edit Post</a>
							<?php if ($item->legacy_id() != ''): ?> - 
							<a href="http://melmyfinger-wp/?p=<?php echo $item->legacy_id(); ?>">WP Permalink</a> - 
							<a href="http://melmyfinger-wp/wp-admin/post.php?post=<?php echo $item->legacy_id(); ?>&action=edit">WP Edit</a>
							<?php endif; ?>
							<?php endif; // end is_dev ?>
						</div><!-- post-byline -->

						<?php if ($item->hashtags() != ''): ?>
						<div class="post-hashtags post-meta">
							<?php $hashtags = $item->hashtags()->split(','); ?>
							<?php foreach($hashtags as $hashtag): ?>
							<a class="hashtag" href="<?php echo url('/tag:' . $hashtag); ?>">#<?php echo html($hashtag) ?></a>
							<?php endforeach; ?>
						</div>
						<?php endif; ?>

					</footer><!-- post-byline -->
				</article><!-- post -->