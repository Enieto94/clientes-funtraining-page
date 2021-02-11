<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=funtraining_db;charset=utf8', 'funtraining_u', 'HSwWDr*uCVl7');
}
catch(Exception $e)
{
        die('Error : '.$e->getMessage());
}
