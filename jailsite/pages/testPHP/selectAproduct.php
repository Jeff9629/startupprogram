<?php 
header('Content-type: text/xml');
echo '<?xml version="1.0" encoding="UTF-8" standalone="yes" ?>';

require("MyConnection.php");
require("MyCode.php");

$obj = new MyConnection();
$obj->setSchema("example");
$obj->setConn();

$qObj = new MyCode();
$qObj->setConn( $obj->getConn() );

$item = $_GET['value'];
//$item="WR3/TT3";
$item = trim($item);
$query = "select *  from ".$obj->getSchema().".product where p_code='$item'";
//echo($query);
$qObj->setQuery($query);
$qObj->setResult( pg_query( $qObj->getQuery()));
     if ( $qObj->getResult() == null)
       {
          die('Query failed in display table:' . pg_lasterror());
        }
     print "<parts>\n";
     while ( $row = $qObj->getRow())
     {
      $fieldNames = $qObj->getFields();
      foreach ($fieldNames as $name)  
       {
         $a = htmlspecialchars($row[$name]);
         print("<field name=\"$name\" value=\" $a \"></field>\n");
       }
      }
     print "</parts>\n";
	 $obj->closeConn();
?>
