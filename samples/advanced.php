<?php
require_once '../lib/MicroTemplate.php';

$view = new MicroTemplate();

$view->assign('title', '"Advanced" template');
$view->assign('numbers', array(1,2,3));

$view->assign('features', array(
    'We have the full power of PHP',
    'We also have a clean seperation between the view and the controller part'
));

$view->assign('content', $view->fetch('advanced'));

$view->display('site');