<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>

<head>
  <title>Database Login Screen</title>
  <meta http-equiv="Content-Type" content="text/html; charset=">
</head>
<body>

<?PHP
require("MyConnectionMysql.php");
require("MyCodeMysql.php");

$obj = new MyConnectionMysql();
$obj->setHost('student.it.pointpark.edu');
$obj->setUser('student');
$obj->setPsw('');
$obj->setDb('premiere');
$obj->setSchema('premiere');
$obj->setConn();
$obj->displayValues();
$qObj = new MyCodeMysql();
$qObj->setConn( $obj->getConn());
$q ="SELECT
  customernumber as \"Customer Number\",
  rtrim(customername) as \"Name\",
  rtrim(street) as \"Street\",
  rtrim(city) as \"City\",
  state as \"State\",
  zip as \"Zip\",
  format(balance, 2) as \"Balance\",
  format(creditlimit, 2) as \"Credit Limit\"
  FROM
    premiere.customer";
$qObj->setQuery($q);
$qObj->displayTable();
echo("<br><br>");


?>
<style>
body {background-color: powderblue;}
h1   {color: blue;}


tbody tr:nth-child(odd) {
   background-color: yellow;
}


</style>
</body>
</html>
