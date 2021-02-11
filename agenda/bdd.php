<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=funtraining_db;charset=utf8', 'kqrfqf50m3f0', 'dxtw1K4*Sj2%');
}
catch(Exception $e)
{
        die('Error : '.$e->getMessage());
}
