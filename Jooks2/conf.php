<?php
$kasutaja='maksymmiska';
$serverinimi='localhost';
$parool='123456';
$andmebaas='maksymmisk';
$yhendus=new mysqli($serverinimi, $kasutaja, $parool, $andmebaas);
$yhendus->set_charset('UTF8');