<?php
require 'pdo.php';
class phptestcodeclass{

//find function
  
public function find( $pdo, $table, $field, $value) {
 $stmt = $pdo->prepare( 'SELECT * FROM '  . $table . ' WHERE '  . $field . ' = :value' );
 $criteria = [
 'value'  => $value
 ];
 $stmt->execute( $criteria);
 return $stmt->fetch();
 }

 public function findID( $pdo, $table, $field, $value) {
 $stmt = $pdo->prepare( 'SELECT id FROM '  . $table . ' WHERE '  . $field . ' = :value' );
 $criteria = [
 'value'  => $value
 ];
 $stmt->execute( $criteria);
 return $stmt->fetch();
 }


 // insert function

function insert( $pdo, $table, $record) {
 $keys = array_keys( $record);
 $values = implode( ', ' , $keys);
 $valuesWithColon = implode( ', :' , $keys);
 $query = 'INSERT INTO '  . $table . ' ('  . $values . ') VALUES (:'  . $valuesWithColon . ')' ;
 $stmt = $pdo->prepare( $query);
 $stmt->execute( $record);
 return $stmt;
}


//delete function

public function delete( $pdo, $table, $field, $value) {
 $stmt = $pdo->prepare( 'DELETE FROM '  . $table . ' WHERE '  . $field . ' = :value' );
 $criteria = [
 'value'  => $value
 ];
 $stmt->execute( $criteria);
 return $stmt->fetch();
 }

 function update( $pdo, $table, $record, $primaryKey) {
 $query = 'UPDATE '  . $table . ' SET ' ;
 $parameters = [];
 foreach ( $record as $key => $value) {
 $parameters[] = $key . ' = :'  . $key;
 }
 $query .= implode( ', ' , $parameters);
 $query .= ' WHERE '  . $primaryKey . ' = :primaryKey' ;
 $record[ 'primaryKey' ] = $record[ $primaryKey];
 $stmt = $pdo->prepare( $query);
 $stmt->execute( $record);
 return $stmt;
}





 }



?>