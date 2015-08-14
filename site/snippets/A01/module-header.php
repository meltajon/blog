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
<html id="<?php echo $page->intendedTemplate(); ?>" lang="en-US" prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#" data-theme="<?php echo $page->theme(); ?> ">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="alternate" type="application/rss+xml" title="<?php echo c::get('site_name', "Mel's Site"); ?>" href="/feed/" />
<?php if ( $page->template() == 'category' ): ?>
<link rel="alternate" type="application/rss+xml" title="<?php echo $page->title() . ' - ' . c::get('site_name', "Mel's Site"); ?>" href="/<?php echo $page; ?>/feed/" />
<?php endif; ?>

<!-- Stylesheets -->
<link rel="stylesheet" media="all" href="/assets/A01/style.php/normalize.scss" />
<link rel="stylesheet" media="all" href="/assets/A01/style.php/style.scss" />
<link rel="stylesheet" media="all" href="/assets/A01/style.php/module-categories.scss" />
<link rel="stylesheet" media="all" href="/assets/A01/style.php/module-post.scss" />
<?php
$template_css_url = "assets/A01/template-" . $page->template() . ".scss";
if (file_exists($template_css_url)) { ?>
<link rel="stylesheet" media="all" href="<?php echo "/assets/A01/style.php/template-" . $page->template() . ".scss"; ?>" />
<?php } ?>

<!-- Google Web Fonts -->
<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Droid+Sans:400,700|Droid+Sans+Mono|Droid+Serif:400,700,400italic|Rambla" />

<!-- SEO -->
<?php if ($page->meta_title() == '' && $page->meta_description() == '' && $page->meta_keywords() == '' ): ?>
<meta name="robots" content="noindex,noarchive,nosnippet" />
<?php endif; ?>
<?php 
	if ( $page->isHomePage() ):
		$pageTitle = '';
	elseif ( $page->meta_title() != ''):
		$pageTitle = $page->meta_title() . ' - ';
	elseif ( $page->title() != ''):
		$pageTitle = $page->title() . ' - ';
	endif; 
?>
<title><?php echo $pageTitle . html( c::get('site_name', 'Mel') ); ?></title>
<?php if ( $page->meta_description() != ''): ?>
<meta name="description" content="<?php echo html($page->meta_description()) ?>" />
<?php endif; ?>
<?php if ( $page->meta_keywords() != ''): ?>
<meta name="keywords" content="<?php echo html($page->meta_keywords()) ?>" />
<?php endif; ?>

<!-- Prefetch -->
<link rel="dns-prefetch" href="//ajax.googleapis.com" />
<link rel="dns-prefetch" href="//fonts.googleapis.com" />

<!-- Facebook Open Graph -->
<meta property="fb:admins" content="15101498"/>
<meta property="og:locale" content="en_US"/>
<?php if ( $page->template() == 'default' ): ?>
<meta property="og:type" content="article"/>
<?php else: ?>
<meta property="og:type" content="website"/>
<?php endif; ?>
<meta property="og:title" content="<?php echo $pageTitle . html( c::get('site_name', 'Mel') ); ?>"/>
<meta property="og:url" content="<?php echo $page->url(); ?>"/>
<meta property="og:site_name" content="<?php echo html( c::get('site_name', 'Mel') ); ?>"/>
<meta property="twitter:account_id" content="38048625"/>

</head>
<body>

	<header id="header">
		<div id="header-wrapper" class="wrapper">
			<h1 id="header-title" class="title" >
				<a id="logo" href="/">
					<?php if (c::get('is_personal', false) == true): ?>
					<span>M</span>el <span>M</span>y <span>F</span>inger
					<?php else: ?>
					<span>M</span>el <span>T</span>ajon
					<?php endif; ?>
				</a>
			</h1>
		</div><!-- wrapper -->
	</header>

	<main class="main" role="main">