<?php

include_once('idiormUse.php');

$person = ORM::for_table('person')->create();

$person->name = 'Joe Bloggs';
$person->age = 40;

$person->save();

include_once('util.php');

// PRIMJETI KAKO NEMA ZATVARAJUĆEG TAGA (ovaj PHP se isključivo includea)
