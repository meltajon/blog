<?php
require "scss.inc.php";
$scss = new scssc();
$scss->setFormatter("scss_formatter_compressed");
$scss->setImportPaths("css/");

$server = new scss_server("css", null, $scss);
$server->serve();
?>