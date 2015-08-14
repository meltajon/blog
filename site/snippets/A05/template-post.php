<?php snippet($site->theme() . '/module-header'); ?>
<div id="main-wrapper" class="wrapper">
<?php
$item = $page;
snippet($site->theme() . '/module-post', array('item' => $item)); 
snippet($site->theme() . '/module-related');
?>
</div><!-- wrapper -->
<?php snippet($site->theme() . '/module-footer'); ?>