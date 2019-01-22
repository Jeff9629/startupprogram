<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>

<head>
  <title>Database Login Screen</title>
  <meta http-equiv="Content-Type" content="text/html; charset=">
</head>
<body>

<?PHP
require("MyConnection.php");
require("MyCode.php");

$obj = new MyConnection();
$obj->setConn();
$obj->displayValues();
$qObj = new MyCode();
$qObj->setConn( $obj->getConn());
$q ="SELECT
  customernumber as \"Customer Number\",
  rtrim(customername) as \"Name\",
  rtrim(street) as \"Street\",
  rtrim(city) as \"City\",
  state as \"State\",
  zip as \"Zip\",
  to_char(balance, '$99,000.99') as \"Balance\",
  to_char(creditlimit, '$99,000.99') as \"Credit Limit\"
  FROM
    premiere.customer";
$qObj->setQuery($q);
$qObj->displayTable();
echo("<br><br>");


?>

</body>
</html>
