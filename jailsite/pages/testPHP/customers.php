
<?PHP
require("MyConnectionMysql.php");
require("MyCodeMysql.php");

$obj = new MyConnectionMysql();
$obj->setHost("student.it.pointpark.edu");
$obj->setUser("student");
$obj->setPsw("!4u2use");
$obj->setDb("HSD");
$obj->setSchema("HSD");
$obj->setConn();    
$qObj = new MyCodeMysql();
$qObj->setConn( $obj->getConn());

  //cus_code numeric NOT NULL,
  //cus_lname character varying(15) NOT NULL,
  //cus_fname character varying(15) NOT NULL,
  //cus_initial character(1),
  //cus_areacode character(3) NOT NULL DEFAULT '615',
  //cus_phone character(8) NOT NULL,
  //cus_balance numeric(9,2) DEFAULT 0.00,

$q ="SELECT
 cus_code as \"code\",
 cus_lname as \"Lname\",
 cus_fname as \"Fname\",
 cus_initial as \"Mi\",
 cus_areacode as \"Acode\",
 cus_phone as \"Phone\",
 cus_balance as \"Balance\"
  FROM
    example.customer";

$qObj->setQuery($q);
 $data = $qObj->jsonTable();
 echo($data);
?>
