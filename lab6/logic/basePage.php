<?php

include_once('idiormUse.php');

$vijesti = ORM::for_table('vijesti')
    ->select('vijesti.*')
    ->find_array();

$app->view()->setData('vijesti', $vijesti);

include_once('util.php');

// PRIMJETI KAKO NEMA ZATVARAJUĆEG TAGA (ovaj PHP se isključivo includea)
