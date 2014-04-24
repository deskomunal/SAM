<?php
session_start();
class includeLibs{

    public function conectaDb(){
    try {
        $parm = parse_ini_file("../conf/connect.ini");
                            $url1 = $parm["01"];
                            $url2 = $parm["01.1"];
                            $user = $parm["02"];
                            $pass = $parm["03"];
                            $db   = $parm["04"];
        $db = new PDO("mysql:host=$url1;dbname=$db",$user,$pass);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return($db);
    } catch (PDOException $e) {
        cabecera("Error grave");
        print "<p>Error: No puede conectarse con la base de datos.</p>\n";
      print "<p>Error: " . $e->getMessage() . "</p>\n";
        //pie();
        exit();
    }

      
    }
    
    public function coneccion(){
        $parm = parse_ini_file("../conf/connect.ini");
				$url1 = $parm["01"];
                                $url2 = $parm["01.1"];
				$user = $parm["02"];
				$pass = $parm["03"];
                                $db   = $parm["04"];
                              
    if(isset($_SERVER['HTTPS']))
	$protocol = 'https';
    else
	$protocol = 'http';
    
    switch($_SERVER['HTTP_HOST'])
    {
	case 'www.samsoft.bl.ee':
		$_cfg['host'] = $url1;
		$_cfg['user'] = $user;
		$_cfg['pass'] = $pass;
		$_cfg['db'] = $db;
		break;
	default:
		$_cfg['host'] = $url2;
		$_cfg['user'] = $user;
		$_cfg['pass'] = $pass;
		$_cfg['db'] = $db;
		break;
    }
    mysql_connect($_cfg['host'],$_cfg['user'],$_cfg['pass']) or die(mysql_error());
    mysql_select_db($_cfg['db']) or die(mysql_error());
    
    require_once('email.lib.php');
    require_once('login.lib.php');
    require_once('paging.lib.php');
    require_once('query.lib.php');
    require_once('template.lib.php');
    require_once('time.lib.php');
    require_once('upload.lib.php');
    require_once('navigation.lib.php');

   } 
}