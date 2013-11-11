<?php
//header('Content-type: text/plain; charset=utf-8');
global $db;

try {

  $db = new PDO(DB_CONSTRING, DB_USER, DB_PASS);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
  $db->exec("SET CHARACTER SET utf8");


} catch(PDOException $e) {
  echo $e->getMessage();
}
