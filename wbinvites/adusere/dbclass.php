<?php
class db
{
	function mysql_connect()
	{
	$connection=null;		
try {
  $dns = 'mysql:host=localhost;dbname=wbinvitedcustomers';
  //$utilisateur = 'flightfeed';
  //$motDePasse = '#p)s-d@20%17!';
  $utilisateur = 'root';
  $motDePasse = '';
 $connection = new PDO( $dns, $utilisateur, $motDePasse );
} catch ( Exception $e ) {
  echo "Connection � MySQL impossible : ", $e->getMessage();
  die();
}
	
	return $connection;
	}
}

?>