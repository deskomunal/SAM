<?php
class login
{
  function validate($login,$password) //recives the strings with username & password, returns the user id if the user is registered & false if there were not coincidences in the database
  {
    $query = new query;
    $pass = md5($password);
    $row = $query->getRows("login,password,iduser","usuario");
    foreach($row as $key){
      if ($key['login'] == $login)
      	if ($key['password'] == $pass)
      		return $key['iduser'];
    }
    return "false";
  }
  
	function loginUser($user_id)
	{
		$query = new query;
		$row = $query->getRow("iduser,login,password,tipo","usuario","WHERE iduser = $user_id");
		$_SESSION['logeado'] = 1;
		$_SESSION['nombre'] = $row['login'];
		$_SESSION['idusuario'] = $row['iduser'];
		$_SESSION['tipo'] = $row['tipo'];
	}

}
?>