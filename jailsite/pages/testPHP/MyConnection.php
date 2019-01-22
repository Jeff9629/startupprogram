<?php
class MyConnection {

   private $conn = null;
   private $host ="bus1.pointpark.edu";
   private $user = "fred";
   private $psw = "fredk147";
   private $db = "fred";
   private $schema = "premiere";
   private $name = "Default";
   private $query = null;
   private $result = null;
   private $sucess = null;
   
   function __construct() {
       //print "In constructor\n";
       $this->name = "Connection values for a Database";
   }
   function __destruct()
   {
       //echo("Destroying object<br>");
       if( $this->isConnected() == true)
       {
           //echo ("Closing connection");
           pg_close($this->conn);
       }
   }
   function setConn()
   {
    $this->conn = pg_connect("host= $this->host dbname= $this->db user= $this->user password=$this->psw")
     or die('Could not connect: ' . pg_last_error());
     
   }
   function getConn()
   {
     return $this->conn;
    }
    function closeConn()
    {
      pg_close($this->getConn());
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
     return $this->host;
   }
   function setHost($h)
   {
     $this->host = $h;
    }
     
   function getUser()
   {
     return  $this->user;
    }
   function setUser($u)
   {
     $this->user = $u;
   }
   function getPsw()
   {
     return  $this->psw;
   }
   function setPsw($p)
   {
      $this->psw = $p;
    }
   function getDb()
   {
     return  $this->db;
    }
   function setDb($d)
   {
      $this->db = $d;
   }
   function getSchema()
   {
     return  $this->schema;
   }
   function setSchema($s)
   {
      $this->schema = $s;
    }
   function displayValues()
   {
     echo "Current Values of Connection Object\n<br>";
     echo ("Host: ".$this->getHost()."\n<br>");
     echo ("User: ".$this->getUser()."\n<br>");  
     echo ("Password: "."secret shhhh. \n<br>");   
     echo ("Database: ".$this->getDb()."\n<br>");  
     echo ("Schema: ".$this->getSchema()."\n<br>"); 
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
