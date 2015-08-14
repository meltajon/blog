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
<?php if ( $page->template() == 'channel' ): ?>
<link rel="alternate" type="application/rss+xml" title="<?php echo $page->title() . ' - ' . c::get('site_name', "Mel's Site"); ?>" href="/feed/<?php echo $page; ?>" />
<?php endif; ?>

<style>
/* MEDIA QUERIES
------------------------------------------------------------------------------
------------------------------------------------------------------------------*/
html { font-size: 12px; line-height: 1.357142857142857em; }
@media (max-width: 450px) {
	body { padding: 40px 0 0; }
}
@media (max-width: 570px) {
	body { font-weight: 400; }
}
@media (min-width: 571px) and (max-width: 900px) {
	html { font-size: 14px; line-height: 1.6em; }
	body { font-weight: 300; }
}
@media (min-width: 901px) {
	html { font-size: 16px; line-height: 1.5em; }
	body { color: #777; font-weight: 300; }
}
/* GLOBALS
------------------------------------------------------------------------------
------------------------------------------------------------------------------*/
html { box-sizing: border-box; }
*, *:before, *:after { box-sizing: inherit; }

.clearfix:before,
.clearfix:after {
	display: table;
	content: "";
}
.clearfix:after { clear: both; }

body {
	display: -webkit-flex; display: flex; 
	-webkit-flex-flow: row wrap; flex-flow: row wrap; 
	justify-content: space-between; align-items: stretch; align-content: stretch;
	height: 100%; min-height: 100vh; margin: 0;
	color: #777; 
	vertical-align: top; 
}
@media (max-width: 620px) {
	body { flex-direction: column; }
}
.wrapper { width: 100%; margin: 0 auto; }
@media (max-width: 321px) {
	.wrapper { width: 320px; }
}
@media (min-width: 601px) {
	.wrapper { max-width: 600px; }
}

a:link,
a:visited { 
	text-decoration: none; 
	border: none;
	transition: all 0.3s ease;
}
a:hover { border-width: 0 0 1px 0; }

strong { font-weight: 500; }

ul { list-style-type: square; }

.inline-block,
.no-wrap { display: inline-block; }
.hidden { display: none; }

.float-right { float: right; }
.float-left { float: left; }

.text-align-center { text-align: center; }

/* HEADER
------------------------------------------------------------------------------
------------------------------------------------------------------------------*/
#header { 
	order: 1; 
	color: rgba(182, 175, 169, 1); font-size: .9rem; text-align: center; 
}
#header-wrapper {
	padding: 0;
	position: relative; 
}

#header-title { text-align: center; }
.title { padding: 0; margin: 0; }
#header-panel1,
#header-panel2 { display: inline-block; vertical-align: middle; }
#header-panel2 { width: calc(100% - 85px); height: 60px; padding: 0 0 0 0.5555555555555556rem; }
#avatar { 
	height: 4rem; width: auto; 
	border-radius: 50%; 
}
#logo {
	display: inline-block; 
	padding: .390625em 0 0; margin: 0; 
	font-size: 1rem; line-height: 1.4em; text-transform: uppercase; 
	border: none; 
}
#logo span { font-size: 1.2em; }

#header-description { font-size: .8rem; line-height: 1.2em; }

@media (max-width: 450px) {
	#header { 
		display: block; 
		width: 100%; padding: 0; 
	}
	#header-wrapper { 
		padding: 0; 
		position: relative; 
	}
	#avatar { display: none; }
	#logo { 
		display: inline-block;
		line-height: 40px; 
		padding: 0; 
	}
	#header-title { display: none; }
	#header-description { display: none; }
}
@media (min-width: 451px) and (max-width: 620px) {
	#header { width: 100%; padding: 2.56rem 0 0; }
	#header-wrapper { padding: 0 10px; }
}
@media (min-width: 621px) and (max-width: 730px) {
	#header { width: 100%; padding: 2.56rem 0 0; }
}
@media (min-width: 731px) and (max-width: 800px) {
	#header { width: 100%; padding: 4.096rem 20px 0; }
}
@media (min-width: 801px) and (max-width: 890px) {
	#header { 
		-webkit-flex: 1; flex: 1; min-width: 200px; max-width: 250px; 
		padding: 4.096rem 20px 0; 
	}
}
@media (min-width: 891px) {
	#header { 
		flex: 1; min-width: 200px; max-width: 250px; 
		padding: 4.096rem 1.1111111111111112rem 0; 
	}
}

/* MAIN NAV
--------------------------------------------------------------------------------*/
#main-nav { margin: 0.8333333333333333rem 0 0; }
.main-nav-item { padding: 5px; }
.main-nav-item:link,
.main-nav-item:visited { border: 1px solid #FFF; border-width: 0; }
.main-nav-item:first-of-type { border-radius: 3px 0 0 0; }
.main-nav-item:last-of-type { border-radius: 0 3px 0 0; }
.main-nav-item del,
.main-nav-item ins { text-decoration: none; }

@media (max-width: 450px) {
	#main-nav { 
		width: 100%; margin: 0; 
		position: fixed; top: 0; z-index: 99;
	}
	.main-nav-item {
		display: none; 
		font-size: 1.2rem; text-align: center; 
	}
	.main-nav-item_active { 
		display: inline-block; 
		height: 40;
		padding: 15px 40px;
	}
	#menu-button { 
		display: inline-block; 
		padding: 6px 10px;
		position: absolute; right: 0; 
		color: #FFF; text-align: center;
	}
	.hamburger { 
		width: 20px; height: 20px; margin: 5px;
		fill: currentColor; 
	}
	.main-nav-item del { display: inline; }
	.main-nav-item ins { display: none; }
}
@media (min-width: 451px) and (max-width: 800px) {
	#main-nav { 
		display: -webkit-flex;
		display: flex; 
		justify-content: space-between; align-items: flex-end; align-content: stretch; 
	}
	.main-nav-item {
		-webkit-flex-grow: 1;
		flex-grow: 1; 
		padding: 5px;
		text-align: center; 
	}
	.main-nav-item[href='#menu'] { display: none; }
	.main-nav-item del { display: none; }
	.main-nav-item ins { display: inline; }
}
@media (min-width: 801px) {
	.main-nav-item { 
		display: block; 
		text-align: left; 
	}
	.main-nav-item[href='#menu'] { display: none; }
	.main-nav-item del { display: none; }
	.main-nav-item ins { display: inline; }
}
</style>

<!-- Stylesheets -->
<link rel="stylesheet" media="all" href="/assets/<?php echo $site->theme(); ?>/style.php/style.scss" />
<link rel="stylesheet" media="all" href="//cloud.typography.com/7950712/692046/css/fonts.css" />

<!-- Javascripts -->
<script defer src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script defer src="/assets/<?php echo $site->theme(); ?>/smooth-page-scroll.js"></script>

<!-- Prefetch -->
<link rel="dns-prefetch" href="//ajax.googleapis.com" />
<link rel="dns-prefetch" href="//fonts.googleapis.com" />
<link rel="dns-prefetch" href="//cloud.typography.com" />

<link rel="prefetch" href="/assets/<?php echo $site->theme(); ?>/style.php/style.scss" />
<link rel="prefetch" href="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" />
<link rel="prefetch" href="//cloud.typography.com/7950712/692046/css/fonts.css" />
<link rel="prefetch" href="//fonts.googleapis.com/css?family=Source+Sans+Pro:300,300italic,400,400italic" />


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
<?php 
	$noindex = true;

	if ( ($page->meta_title() != '' || $page->meta_description() != '' || $page->meta_keywords() != '') ) { $noindex = false; }
	if ( (param('category') || param('tag') || param('with')) ) { $noindex = true; }
	if ( c::get('is_personal', false) == true) { $noindex = true; }

	e($noindex == true, "<meta name=\"robots\" content=\"noindex,noarchive,nosnippet\" />\n"); 
?>
<?php if ( $page->meta_description() != ''): ?>
<meta name="description" content="<?php echo html($page->meta_description()) ?>" />
<?php endif; ?>
<?php if ( c::get('is_personal', false) == true ): ?>
<meta name="google-site-verification" content="17ppfVl_HtZmuUlX3815zc95Her5yVEjAZH27LJAMpk" />
<?php else: ?>
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
	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		<?php if (c::get('is_personal', false) == true): ?>
		ga('create', 'UA-40072680-1', 'auto');
		<?php else: ?>
		ga('create', 'UA-40072680-3', 'auto');
		<?php endif; ?>

		ga('require', 'linkid', 'linkid.js');
		ga('send', 'pageview');
	</script>

	<div id="top"></div>
	<header id="header">
		<div id="header-wrapper" class="wrapper">
			<?php if (c::get('is_personal', false) == true): ?>
			<img id="avatar" src="/assets/<?php echo $site->theme(); ?>/avatar-melmyfinger-400x400.png" />
			<?php else: ?>
			<img id="avatar" src="/assets/<?php echo $site->theme(); ?>/avatar-meltajon-400x400.jpg" />
			<?php endif; ?>
			<h1 id="header-title" class="title">
				<a id="logo" href="/" onClick="ga('send', 'event', 'logo', 'click');">
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
					$nav_items = $pages->find('home', 'tech', 'design', 'wisdom', 'buzz', 'personal');
				endif;
				?>
				<?php foreach($nav_items as $item): ?>
				<a class="main-nav-item<?php e($item->isOpen(), ' main-nav-item_active') ?>" href="<?php echo $item->url() ?>" data-name="<?php echo html($item->title()) ?>" onClick="ga('send', 'event', 'main-nav-item', 'click', '<?php echo html($item->title()); ?>');">
					<?php echo html($item->title()); ?>
				</a>
				<?php endforeach; ?>
				<a id="menu-button" class="main-nav-item" href="#menu" onClick="ga('send', 'event', 'hamburger', 'click');">
					<svg class="hamburger" height="32px" id="Layer_1" style="enable-background:new 0 0 32 32;" version="1.1" viewBox="0 0 32 32" width="32px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
						<path d="M4,10h24c1.104,0,2-0.896,2-2s-0.896-2-2-2H4C2.896,6,2,6.896,2,8S2.896,10,4,10z M28,14H4c-1.104,0-2,0.896-2,2  s0.896,2,2,2h24c1.104,0,2-0.896,2-2S29.104,14,28,14z M28,22H4c-1.104,0-2,0.896-2,2s0.896,2,2,2h24c1.104,0,2-0.896,2-2  S29.104,22,28,22z"/>
					</svg>
				</a>
			</nav><!-- nav -->
		</div><!-- wrapper -->
	</header>

	<main class="main" role="main">