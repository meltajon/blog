<?php 
if(!isset($descriptionExcerpt)) $descriptionExcerpt = true; 
header('Content-type: text/xml; charset="utf-8"');
echo '<?xml version="1.0" encoding="utf-8"?>';
?><!-- generator="<?php echo c::get('feed.generator', 'Kirby') ?>" -->
<rss version="2.0" xmlns:content="http://purl.org/rss/1.0/modules/content/" xmlns:wfw="http://wellformedweb.org/CommentAPI/" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:atom="http://www.w3.org/2005/Atom">
<channel>
	<title><?php echo (isset($title)) ? xml($title) : xml($page->title_public()) ?></title>
	<link><?php echo (isset($link)) ? xml($link) : xml(url()) ?></link>
	<generator><?php echo c::get('feed.generator', 'Kirby') ?></generator>
	<lastBuildDate><?php echo (isset($modified)) ? date('r', $modified) : date('r', $site->modified()) ?></lastBuildDate>
	<atom:link href="<?php echo xml($page->url()) ?>" rel="self" type="application/rss+xml" />
<?php if($page->description() || isset($description)): ?>
	<description><?php echo (isset($description)) ? xml($description) : xml($page->description()) ?></description>
<?php endif ?>
	<language>en-US</language>
<?php foreach($items as $item): ?>
	<item>
		<title><?php echo xml($item->title()) ?></title>
		<link><?php echo xml($item->tinyurl()) ?></link>
		<guid><?php echo xml($item->tinyurl()) ?></guid>
		<pubDate><?php echo ($item->date()) ? date('r', $item->date()) : date('r', $item->modified()) ?></pubDate>
		<dc:creator>
		<![CDATA[ Mel ]]>
		</dc:creator>
		<description><![CDATA[
<?php 
if($item->hasImages()):
	foreach($item->images() as $image):
		echo '<p>' . thumb($image, array('width' => 600)) . '</p>';
	endforeach;
endif; ?>
<?php
if($item->embed() != ''):
echo $item->embed()->kirbytext();
endif;
?>
<?php echo kirbytext($item->body()) ?>
<?php if ( $item->source_name() != '' && $item->source_url() != '' ): ?>
<p>(Source: <a href="<?php echo $item->source_url(); ?>"><?php echo $item->source_name(); ?></a>)</p>
<?php elseif ( $item->source_name() != '' && $item->source_url() == '' ): ?>
<p>(Source: <?php echo $item->source_name(); ?>)</p>
<?php endif; ?>
]]></description>
	</item>
<?php endforeach ?>
</channel>
</rss>