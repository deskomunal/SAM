<?php
class login
{
  function validate($login,$password) //recives the strings with username & password, returns the user id if the user is registered & false if there were not coincidences in the database
  {
    $query = new query;
    $pass = md5($password);
    $row = $query->getRows("select u.iduser,u.login,u.password,u.estado from usuario u where estado='1'");
    foreach($row as $key)
    {
        if ($key['login'] == $login){  
            if ($key['password'] == $pass){
      		return $key['iduser'];
            }
            return 'f1';
        }
    }
    return 'f2';
  }
  
	function loginUser($user_id)
	{
            session_start();
            $query = new query;
            $row = $query->getRow("select u.iduser,u.login,u.password,u.estado from usuario u where u.iduser ='$user_id'");
            
            $_SESSION['logeado'] = 1;
            $_SESSION['iduser'] = $row['iduser'];
            $_SESSION['login'] = $row['login'];
	}

}
?>