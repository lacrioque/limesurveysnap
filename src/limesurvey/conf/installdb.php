<?php

$config = include "./config.php";

try {
   $dbh = new PDO($config['components']['db']['connectionString'], $config['components']['db']['username'], $config['components']['db']['password']);
   $structure = file_get_contents('./create-mysql.sql');
   $preparedStatement = $dbh->prepare($structure);
   $preparedStatement->execute();
   $preparedStatement = null;
   $dbh = null;
} catch (PDOException $e) {
   print "Error!: " . $e->getMessage() . "<br/>";
   die();
}
