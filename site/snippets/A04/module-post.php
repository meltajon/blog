				<article class="post post_<?php echo $item->intendedTemplate(); ?><?php if ($item->isVisible() != true ) { echo ' post_draft'; } ?>" itemscope itemtype="http://schema.org/BlogPosting">
					<header class="post-header">

						<?php if ($page->uid() != 'error'): ?>
						<div class="post-categories">
							<span class="post-category-item"><a class="post-category-link" href="<?php echo "/" . $item->parent()->uid(); ?>"><?php echo $item->parent()->title(); ?></a></span>
						</div><!-- post-categories -->
						<?php endif; ?>

						<?php if($item->embed() != ''): ?>
						<div class="post-embed">
						<?php echo $item->embed()->kirbytext(); ?>
						</div><!-- post-embed -->
						<?php endif; ?>

						<?php if($item->hasImages() && $item->embed() == '') { ?> 
						<?php foreach($item->images() as $image): ?>
						<a class="post-thumb-link" href="<?php echo $item->tinyurl(); ?>" rel="bookmark">
							<figure class="post-thumb-wrapper">
								<?php 
								if ($image->width() > 600):
									echo thumb($image, array('width' => 600, 'class' => 'post-thumb')); 
								else:
									echo '<img class="post-thumb" src="' . $image->url() . '" />';
								endif;
								?>
								<?php if ( $item->featured_name() != "" || $item->featured_title() != "" || $item->featured_source_name() != "" ): ?>
								<figcaption class="post-thumb-caption">
									<?php if ( $item->featured_name() ): ?><span class="post-featured-meta post-featured-name"><?php echo $item->featured_name(); ?></span><?php endif; ?>
									<?php if ( $item->featured_title() ): ?><span class="post-featured-meta post-featured-title"><?php echo $item->featured_title(); ?></span><?php endif; ?>
									<?php if ( $item->featured_source_name() ): ?><span class="post-featured-meta post-featured-source"><?php echo $item->featured_source_name(); ?></span><?php endif; ?>
								</figcaption>
								<?php endif; ?>
							</figure>
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
							case 'wp-video':
								if ( $item->hasImages() && $page->template() != 'default' ):
									$hideTitle = false;
									$hideBody = true;
								else:
									$hideTitle = true;
									$hideBody = false;
								endif;
								break;

							// show these formats
							case 'embed':
								$hideTitle = false;
								$hideBody = false;
								break;
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
						<h1 class="post-title"><a class="post-title-link" href="<?php if ($item->source_url() != '') { echo $item->source_url(); } else { echo $item->tinyurl(); } ?>" rel="bookmark"><?php echo html($item->title()) ?><?php if($item->source_url() != '') { ?> →<?php } ?></a></h1>
						<?php endif; ?>

					</header><!-- post-header -->
					<?php if ($hideBody != true): ?>
					<div class="post-body" itemprop="articleBody">
						<?php if ($item->excerpt() != '' && $page->template() != 'default'):
						echo kirbytext($item->excerpt()); ?>
						<p class="more-button"><a class="more-link" href="<?php echo $item->tinyurl(); ?>">Read More</a></p>
						<?php elseif ($item->intendedTemplate() == 'quote' || $item->intendedTemplate() == 'wp-quote'): ?>
						<figure>
							<blockquote>
								<?php echo kirbytext($item->body()); ?>
								<?php e($item->source_name() != '', '<figcaption>—' . $item->source_name() . '</figcaption>'); ?>
							</blockquote>
						</figure>
						<?php else: 
							echo kirbytext($item->body()); 
							if ($page->intendedTemplate() == 'list') { snippet($site->theme() . '/module-list-items'); }
						endif; ?>
					</div><!-- post-body -->
					 <?php endif; ?>
					<?php if ($page->uid() != 'error'): ?>
					<footer class="post-footer">
						<div class="post-byline post-meta">
							<?php if(c::get('is_dev', false) == true && $item->isVisible() != true ): ?>
							Dated 
							<?php else: ?>
							Posted 
							<?php endif; ?>
							<a class="post-permalink" href="<?php echo $item->tinyurl(); ?>"><time datetime="<?php echo $item->date('Y-m-d'); ?>"><?php echo $item->date('F j, Y'); ?></time></a> 
							<?php if ( $item->via_name() != '' && $item->via_url() != '' ): ?>
							(via <a class="post-via-link" href="<?php echo $item->via_url(); ?>"><?php echo $item->via_name(); ?></a>) 
							<?php elseif ( $item->via_name() != '' && $item->via_url() == '' ): ?>
							(via <?php echo $item->via_name(); ?>)
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

						<?php if ($item->mentions() != ''): ?>
						<div class="post-mentions post-meta">
							<?php $mentions = $item->mentions()->split(','); ?>
							<?php foreach($mentions as $mention): ?>
							<a class="mention" href="<?php echo url('/with:' . $mention); ?>">@<?php echo html($mention) ?></a>
							<?php endforeach; ?>
						</div>
						<?php endif; ?>
						<?php if ($item->hashtags() != ''): ?>
						<div class="post-hashtags post-meta">
							<?php $hashtags = $item->hashtags()->split(','); ?>
							<?php foreach($hashtags as $hashtag): ?>
							<a class="hashtag" href="<?php echo url('/tag:' . $hashtag); ?>">#<?php echo html($hashtag) ?></a>
							<?php endforeach; ?>
						</div>
						<?php endif; ?>

					</footer><!-- post-byline -->
					<?php endif; // if page is not Error page ?>
				</article><!-- post -->