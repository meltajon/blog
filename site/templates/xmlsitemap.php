<?php 
header('Content-type: text/xml; charset="utf-8"');

echo '<?xml version="1.0" encoding="utf-8"?>';

$ignore = array('sitemap', 'error');
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
<?php foreach($site->index()->filterBy('author', '*=', c::get('author'))->visible() as $item): ?>
	<?php if(in_array($item->uri(), $ignore)) continue ?>
	<?php if ($item->meta_title() != '' && $item->meta_description() != '' && $item->meta_keywords() != '' ): ?>
	<url>
		<loc><?php echo html($item->tinyurl()); ?></loc>
		<lastmod><?php echo $item->modified('c'); ?></lastmod>
		<priority><?php echo ($item->isHomePage()) ? 1 : number_format(0.5/$item->depth(), 1); ?></priority>
	</url>
	<?php endif; // if item has SEO meta data ?>
<?php endforeach ?>
</urlset>