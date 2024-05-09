<?php
$server = '127.0.0.1' ;
$username = 'root' ;
$password = '';

//The name of the schema we created earlier in MySQL workbench
$schema = 'universitymanagment' ;
$pdo = new PDO( 'mysql:dbname='  . $schema . ';host='  . $server, $username, $password);
$pdo->exec('SET CHARACTER SET utf8');


if($pdo)
{
 // echo "connected";
}
else
{
  echo "Error";
}

?>