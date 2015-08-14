<?php
if (isset($_GET['p']) && $_GET['p'] != ''):
	if (c::get('is_personal', false) == true):
		if ($site->children()->invisible()->index()->findBy('legacy_id', $_GET['p']) != ''):
			go($site->children()->invisible()->index()->findBy('legacy_id', $_GET['p'])->url());
		else:
			go(page('error'));
		endif;
	else:
		if ($site->children()->visible()->index()->findBy('legacy_id', $_GET['p']) != ''):
			go($site->children()->visible()->index()->findBy('legacy_id', $_GET['p'])->url());
		else:
			go(page('error'));
		endif;
	endif;
endif;

?><!DOCTYPE html>
<html id="<?php echo $page->intendedTemplate(); ?>" lang="en-US" prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#" data-theme="<?php echo $site->theme(); ?> ">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="alternate" type="application/rss+xml" title="<?php echo c::get('site_name', "Mel's Site"); ?>" href="/feed/" />
<?php if ( $page->template() == 'category' ): ?>
<link rel="alternate" type="application/rss+xml" title="<?php echo $page->title() . ' - ' . c::get('site_name', "Mel's Site"); ?>" href="/<?php echo $page; ?>/feed/" />
<?php endif; ?>

<!-- Stylesheets -->
<link rel="stylesheet" media="all" href="/assets/<?php echo $site->theme(); ?>/style.php/style.scss" />
<?php
$template_css_url = "assets/" . $site->theme() . "/template-" . $page->template() . ".scss";
if (file_exists($template_css_url)) { ?>
<link rel="stylesheet" media="all" href="<?php echo "/assets/" . $site->theme() . "/style.php/template-" . $page->template() . ".scss"; ?>" />
<?php } ?>

<!-- Google Web Fonts -->
<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Droid+Sans:400,700|Rambla|Source+Sans+Pro:200,300,400,600,200italic,300italic,400italic" />

<!-- Javascripts -->
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript" src="/assets/<?php echo $site->theme(); ?>/smooth-page-scroll.js"></script>

<!-- Prefetch -->
<link rel="dns-prefetch" href="//ajax.googleapis.com" />
<link rel="dns-prefetch" href="//fonts.googleapis.com" />

<link rel="prefetch" href="/assets/<?php echo $site->theme(); ?>/style.php/style.scss" />
<link rel="prefetch" href="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" />

<!-- SEO -->
<title><?php 
	if ( $page->isHomePage() ):
		$pageTitle = '';
	elseif ( $page->meta_title() != ''):
		$pageTitle = $page->meta_title() . ' - ';
	elseif ( $page->title() != ''):
		$pageTitle = $page->title() . ' - ';
	endif; 
	
	echo $pageTitle . html( c::get('site_name', 'Mel') ); 
?>
</title>
<?php if ($page->meta_title() == '' && $page->meta_description() == '' && $page->meta_keywords() == '' && c::get('is_personal', false) == true ): ?>
<meta name="robots" content="noindex,noarchive,nosnippet" />
<?php endif; ?>
<?php if ( $page->meta_description() != ''): ?>
<meta name="description" content="<?php echo html($page->meta_description()) ?>" />
<?php endif; ?>
<?php if ( $page->meta_keywords() != ''): ?>
<meta name="keywords" content="<?php echo html($page->meta_keywords()) ?>" />
<?php endif; ?>
<?php if ( c::get('is_personal', false) == false ): ?>
<meta name="google-site-verification" content="KFn4ajR42WUJ_ZRTosJx3IxZHvIIu9U8IvHyFPQJdCs" />
<?php endif; ?>

<?php if ($page->template() == 'default'): ?>
<!-- Schema.org -->
<meta itemprop="name headline" content="<?php echo $pageTitle . html( c::get('site_name', 'Mel') ); ?>">
<?php if (c::get('is_personal', false) == true): ?>
<meta itemprop="author" content="melmyfinger">
<?php else: ?>
<meta itemprop="author" content="Mel Tajon">
<?php endif; // if site is_personal ?>
<meta itemprop="dateCreated datePublished" content="<?php echo $page->date('Y-m-d'); ?>">
<meta itemprop="dateModified" content="<?php echo $page->modified('Y-m-d'); ?>">
<?php if ( $page->meta_description() != ''): ?>
<meta itemprop="description" content="<?php echo html($page->meta_description()); ?>" />
<?php else: ?>
<meta itemprop="description" content="<?php echo excerpt($page->body(), 155); ?>" />
<?php endif; ?>
<?php if ( $page->meta_keywords() != ''): ?>
<meta itemprop="keywords" content="<?php echo html($page->meta_keywords()); ?>" />
<?php endif; ?>
<meta itemprop="url" content="<?php echo $page->tinyurl(); ?>">
<?php if($page->hasImages()) { ?> 
<?php foreach($page->images() as $image): ?>
<meta itemprop="image" content="<?php echo $image->url(); ?>" />
<meta itemprop="thumbnailUrl" content="<?php echo $image->url(); ?>" />
<?php endforeach ?>
<?php } // if page has images ?>
<?php endif; // if page is using default template ?>

<!-- Facebook Open Graph -->
<meta property="fb:admins" content="15101498" />
<meta property="og:locale" content="en_US" />
<?php if ( $page->template() == 'default' ): ?>
<meta property="og:type" content="article" />
<?php elseif ( $page->template() == 'home'): ?>
<meta property="og:type" content="website" />
<?php endif; ?>
<meta property="og:title" content="<?php echo $pageTitle . html( c::get('site_name', 'Mel') ); ?>" />
<meta property="og:url" content="<?php echo $page->tinyurl(); ?>" />
<meta property="og:site_name" content="<?php echo html( c::get('site_name', 'Mel') ); ?>" />
<?php 
if($page->hasImages()) { ?> 
<?php foreach($page->images() as $image): ?>
<meta property="og:image" content="<?php echo $image->url(); ?>" />
<?php endforeach ?>
<?php } // if page has images ?>

<?php if ($page->template() == 'default'): ?>
<!-- Twitter Cards -->
<meta name="twitter:card" content="summary_large_image" />
<?php if ( $page->meta_title() != ''): ?>
<meta name="twitter:title" content="<?php echo $page->meta_title(); ?>" />
<?php else: ?>
<meta name="twitter:title" content="<?php echo $page->title(); ?>" />
<?php endif; ?>
<?php if ( $page->meta_description() != ''): ?>
<meta name="twitter:description" content="<?php echo html($page->meta_description()); ?>" />
<?php else: ?>
<meta name="twitter:description" content="<?php echo excerpt($page->body(), 200); ?>" />
<?php endif; ?>
<?php if (c::get('is_personal', false) == true): ?>
<meta name="twitter:site" content="@melmyfinger" />
<meta name="twitter:creator" content="@melmyfinger" />
<?php else: ?>
<meta name="twitter:site" content="@MelTajon" />
<meta name="twitter:creator" content="@MelTajon" />
<?php endif; // if site is_personal ?>
<?php if($page->hasImages()) { ?>
<?php foreach($page->images() as $image): ?>
<meta name="twitter:image:src" content="<?php echo $image->url(); ?>" />
<?php endforeach ?>
<?php } // if page has images ?>
<?php endif; // if page is using default template  ?>

</head>
<body>
	<div id="top"></div>
	<header id="header">
		<div id="header-wrapper" class="wrapper">
			<?php if (c::get('is_personal', false) == true): ?>
			<img id="avatar" src="/assets/<?php echo $site->theme(); ?>/avatar-melmyfinger-400x400.png" />
			<?php else: ?>
			<img id="avatar" src="/assets/<?php echo $site->theme(); ?>/avatar-meltajon-400x400.jpg" />
			<?php endif; ?>
			<h1 id="header-title" class="title">
				<a id="logo" href="/">
					<?php if (c::get('is_personal', false) == true): ?>
					<span>M</span>el <span>M</span>y <span>F</span>inger
					<?php else: ?>
					<span>M</span>el <span>T</span>ajon
					<?php endif; ?>
				</a>
			</h1>
			<div id="header-description">
				<?php if (c::get('is_personal', false) == true): ?>
				I live my life one <span class="inline-block">quarter-pounder</span> at a time. For those <span class="inline-block">five bites or less...</span><span class="inline-block">I'M FREE.</span>
				<?php else: ?>
				Web Developer • Product Designer • UX Designer
				<?php endif; ?>
			</div>
			<nav id="main-nav">
				<?php
				if (c::get('is_personal', false) == true):
					$nav_items = $pages->find('home', 'personal', 'friends','buzz', 'tech', 'design', 'wisdom');
				else: 
					$nav_items = $pages->find('home', 'tech', 'design');
				endif;
				?>
				<?php foreach($nav_items as $item): ?>
				<a class="main-nav-item<?php e($item->isOpen(), ' main-nav-item_active') ?>" href="<?php echo $item->url() ?>" data-name="<?php echo html($item->title()) ?>">
					<?php 
					if ($item->title_short() != ''): 
						echo '<del>' . html($item->title_short()) . '</del>';
						echo '<ins>' . html($item->title()) . '<ins>';
					else:
						echo html($item->title());
					endif; 
					?>
				</a>
				<?php endforeach; ?>
				
			</nav><!-- nav -->
		</div><!-- wrapper -->
	</header>

	<main class="main" role="main">