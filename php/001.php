<?php
include 'lib.php';
include 'db.php';

$total = 67;
$limit = 6;
$page_limit = 4;
$page = (isset($_GET['page']) && $_GET['page'] != '' && is_numeric($_GET['page'])) ? $_GET['page'] : 1;

$rs_str = pagination($total, $limit, $page_limit, $page);

echo $rs_str;
