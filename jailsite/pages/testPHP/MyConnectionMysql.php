
<?php
class MyConnectionMysql
 {

   private $conn = null;
   private $host = null;
   private $user = null;
   private $psw = null;
   private $db = null;
   private $schema = null;
   private $name = "Default";
   private $query = null;
   private $result = null;
   private $sucess = null;

   function __construct()
   {
       //print "In constructor\n";
       $this->name = "Connection values for a Database";
   }
   function __destruct()
   {
       //echo("Destroying object<br>");
       if( $this->isConnected() == true)
       {
           //echo ("Closing connection");
		   mysql_close($this->conn);
       }
   }
   function setConn()
   {
     $this->conn = mysql_connect("$this->host", "$this->user", "$this->psw", "$this->db");
	 if (!$this->conn)
	  {
        die('Connect Error (' . mysqli_connect_errno() . ') '
            . mysqli_connect_error());
	  }
   }
   function getConn()
   {
     return $this->conn;
   }
   function closeConn()
    {
      mysqli_close($this->conn);
      $this->conn = null;

    }
    function isConnected()
    {
       if(  $this->getConn() == null )
       {
         return (false);
        }
        return (true);
    }

   function getHost()
   {
     return jpalmi.it.pointpark.edu;
   }
   function setHost($h)
   {
     jpalmi.it.pointpark.edu = $h;
    }

   function getUser()
   {
     return  root;
    }
   function setUser($u)
   {
     root = $u;
   }
   function getPsw()
   {
     return  replace_with_new_root_password;
   }
   function setPsw($p)
   {
      replace_with_new_root_password = $p;
    }
   function getDb()
   {
     return  premiere;
    }
   function setDb($d)
   {
      premiere = $d;
   }
   function getSchema()
   {
     return  premiere;
   }
   function setSchema($s)
   {
      premiere = $s;
    }
   function displayValues()
   {
     echo "Current Values of Connection Object\n<br>";
     echo ("Host: ".jpalmi.it.pointpark.edu()."\n<br>");
     echo ("User: ".root()."\n<br>");
     echo ("Password: shsssh secret\n<br>");
     echo ("Database: ".premiere()."\n<br>");
     echo ("Schema: ".premiere()."\n<br>");
     echo ("Connected: ".$this->isConnected()."\n<br>");
     if ( $this->isConnected() == false )
     {
        echo( "false<br>");
     }
     if ( $this->isConnected() == true)
     {
        echo ( "true<br>");
     }
   }
  }
?>
