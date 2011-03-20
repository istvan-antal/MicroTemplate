<?php
require_once '../lib/MicroTemplate.php';

$view = new MicroTemplate();
$view->assign('title', 'Basic template');
$view->assign('subject', 'World');

$view->display('basic');