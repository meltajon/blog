
				<article class="post post_<?php echo $item->intendedTemplate(); ?><?php if ($item->isVisible() != true && $item->depth() != 1 ) { echo ' post_draft'; } ?>" itemscope itemtype="http://schema.org/BlogPosting">
					<header class="post-header">

						<?php if ($page->uid() != 'error'): ?>
						<div class="post-categories">
							<?php if ($item->categories() != ''): ?>
							<?php foreach ($item->categories()->split() as $category): ?>
							<?php if (c::get('categories.' . $category) != null): ?>
							<span class="post-category-item"><a class="post-category-link" href="<?php echo "/category:" . $category; ?>" onClick="ga('send', 'event', 'post-category-link', 'click', '<?php echo c::get('categories.' . $category); ?>');"><?php echo c::get('categories.' . $category); ?></a></span>
							<?php endif; ?>
							<?php endforeach; ?>
							<?php else: ?>
							<span class="post-category-item"><a class="post-category-link" href="<?php echo "/" . $item->parent()->uid(); ?>" onClick="ga('send', 'event', 'post-category-link', 'click', '<?php echo $item->parent()->title(); ?>');"><?php echo $item->parent()->title(); ?></a></span>
							<?php endif; ?>
						</div><!-- post-categories -->
						<?php endif; ?>

						<?php if($item->embed() != ''): ?>
						<div class="post-embed">
						<?php echo $item->embed()->kirbytext(); ?>
						</div><!-- post-embed -->
						<?php endif; ?>

						<?php if($item->hasVideos() == true): ?>
						<figure class="video">
							<video preload="metadata" controls="controls" loop="loop">
								<source type="video/mp4" src="<?php echo $item->file()->url(); ?>" />
								Your browser does not support the <code>video</code> element.
							</video>
						</figure><!-- post-video -->
						<?php endif; ?>

						<?php if($item->hasImages() && $item->embed() == '') { ?> 
						<?php foreach($item->images() as $image): ?>
						<a class="post-thumb-link" href="<?php echo $item->tinyurl(); ?>" rel="bookmark" onClick="ga('send', 'event', 'post-thumb-link', 'click', '<?php echo $image->url(); ?>');">
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
							case 'image':
								$hideTitle = true;
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
						<h1 class="post-title"><a class="post-title-link" href="<?php if ($item->source_url() != '') { echo $item->source_url(); } else { echo $item->tinyurl(); } ?>" rel="bookmark" onClick="ga('send', 'event', 'post-title', 'click', '<?php echo html($item->title()) ?>');"><?php echo html($item->title()) ?><?php if($item->source_url() != '') { ?> →<?php } ?></a></h1>
						<?php endif; ?>

					</header><!-- post-header -->
					<?php if ($hideBody != true): ?>
					<div class="post-body" itemprop="articleBody">
						<?php if ($page->template() != 'default' && $item->intendedTemplate() == 'list'): ?>
						<?php echo kirbytext($item->body()); ?>
						<p class="more-button"><a class="more-link" href="<?php echo $item->tinyurl(); ?>" onClick="ga('send', 'event', 'more-button', 'click', '<?php echo html($item->title()) ?>');">Read More</a></p>
						<?php elseif ($item->excerpt() != '' && $page->template() != 'default'): ?>
						<?php echo kirbytext($item->excerpt()); ?>
						<p class="more-button"><a class="more-link" href="<?php echo $item->tinyurl(); ?>" onClick="ga('send', 'event', 'more-button', 'click', '<?php echo html($item->title()) ?>');">Read More</a></p>
						<?php elseif ($item->intendedTemplate() == 'quote' || $item->intendedTemplate() == 'wp-quote'): ?>
						<figure>
							<blockquote>
								<?php echo kirbytext($item->body()); ?>

								<?php if ( $item->source_name() != '' && $item->source_url() != '' ): ?>
								<figcaption>—<a href="<?php echo $item->source_url(); ?>" onClick="ga('send', 'event', 'figcaption-link', 'click', '—<?php echo $item->source_name(); ?>');"><?php echo $item->source_name(); ?></a></figcaption> 
								<?php elseif ( $item->source_name() != '' && $item->source_url() == '' ): ?>
								<figcaption>—<?php echo $item->source_name(); ?></figcaption>
								<?php endif; ?>
							</blockquote>
						</figure>
						<?php elseif($item->body_personal() != '' && c::get('is_personal') == true): ?>
							<?php echo kirbytext($item->body_personal()); ?>
						<?php else: ?>
							<?php echo kirbytext($item->body()); ?>
							<?php if ($page->intendedTemplate() == 'list') { snippet($site->theme() . '/module-list-items'); } ?>
						<?php endif; ?>
					</div><!-- post-body -->
					 <?php endif; ?>
					<?php if ($page->uid() != 'error'): ?>
					<footer class="post-footer">
						<div class="post-byline post-meta">
							<?php if(c::get('is_personal') == true && $item->author() == 'melmyfinger, meltajon' ): ?>
							Reposted <a class="post-permalink" href="<?php echo '/p/' . $item->hash(); ?>" onClick="ga('send', 'event', 'post-permalink', 'click', 'Reposted');"><time datetime="<?php echo $item->date('Y-m-d'); ?>"><?php echo $item->date('F j, Y'); ?></time></a> 
							(via <a href="<?php echo 'https://blog.meltajon.com/p/' . $item->hash(); ?>" onClick="ga('send', 'event', 'via-link', 'click', 'via MelTajon.com');">MelTajon.com</a>) 
							<?php else: ?>
							Posted <a class="post-permalink" href="<?php echo $item->tinyurl(); ?>" onClick="ga('send', 'event', 'post-permalink', 'click', '<?php echo html($item->title()) ?>');"><time datetime="<?php echo $item->date('Y-m-d'); ?>"><?php echo $item->date('F j, Y'); ?></time></a> 
							<?php if ($item->via_name() != '' && $item->via_url() != ''): ?>
							(via <a class="post-via-link" href="<?php echo $item->via_url(); ?>" onClick="ga('send', 'event', 'post-via-link', 'click', '<?php echo $item->via_name(); ?>');"><?php echo $item->via_name(); ?></a>) 
							<?php elseif ( $item->via_name() != '' && $item->via_url() == ''): ?>
							(via <?php echo $item->via_name(); ?>)
							<?php endif; // if ($item->via_name() != '' && $item->via_url() != '') ?>
							<?php endif; // if(c::get('is_personal') == true && $item->author() == 'melmyfinger, meltajon' ) ?>

							<?php if ($site->user() != false): ?>
							 - 
							<a href="/panel/#/pages/show/<?php echo $item->uri(); ?>">Edit Post</a>
							<?php if ($item->legacy_id() != ''): ?> - 
							<a href="http://melmyfinger-wp/?p=<?php echo $item->legacy_id(); ?>">WP Permalink</a> - 
							<a href="http://melmyfinger-wp/wp-admin/post.php?post=<?php echo $item->legacy_id(); ?>&action=edit">WP Edit</a>
							<?php endif; ?>
							<?php endif; // if user is logged in ?>
						</div><!-- post-byline -->

						<?php if ($item->mentions() != '' && c::get('is_personal') == true): ?>
						<div class="post-mentions post-meta">
							<?php $mentions = $item->mentions()->split(','); ?>
							<?php foreach($mentions as $mention): ?>
							<a class="mention" href="<?php echo url('/with:' . $mention); ?>" onClick="ga('send', 'event', 'mention', 'click', '@<?php echo html($mention) ?>');">@<?php echo html($mention) ?></a>
							<?php endforeach; ?>
						</div>
						<?php endif; ?>
						<?php if ($item->hashtags() != ''): ?>
						<div class="post-hashtags post-meta">
							<?php $hashtags = $item->hashtags()->split(','); ?>
							<?php foreach($hashtags as $hashtag): ?>
							<a class="hashtag" href="<?php echo url('/tag:' . $hashtag); ?>" onClick="ga('send', 'event', 'hashtag', 'click', '#<?php echo html($hashtag) ?>');">#<?php echo html($hashtag) ?></a>
							<?php endforeach; ?>
						</div>
						<?php endif; ?>

						<?php if ($show_browse_button == true): ?>
						<div class="post-browse">
							<a class="post-browse-channel" href="<?php echo '/' . $item->parent()->uri(); ?>" onClick="ga('send', 'event', 'browse-button', 'click', '<?php echo $item->parent()->title(); ?>');"><?php if ($item->parent()->browse_more_label() !='') { echo $item->parent()->browse_more_label(); } else { echo 'More in ' . $item->parent()->title(); } ?> &raquo;</a>
						</div>
						<?php endif; ?>

					</footer><!-- post-byline -->
					<?php endif; // if page is not Error page ?>
				</article><!-- post -->