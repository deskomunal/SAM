<?php
class query
{
 	var $query;
	function makequery($sql)
	{
		$result = mysql_query($sql);
		unset($sql);
		return $result;
	}
	
	function getRows($sql) //recibe los valores a ser seleccionados, la tabla y las condiciones, retorna un array bidimensional con los resultados obtenidos
	{
		$row = array();
		$query = $this->makequery($sql);
		while($temp = mysql_fetch_assoc($query))
			$row[] = $temp;
		return $row;
	}
	
	
	function getRow($sql) // recibe los valores a ser seleccionados, la tabla y las condiciones, retorna un array unidimensional con el primer resultado obtenido
	{
		$query = $this->makequery($sql);		
		$row = mysql_fetch_assoc($query);
		return $row;
	}
        
        function dbDelete($table,$sql_sub) //recibe el nombre de la tabla y las condiciones
	{
		$sql = "DELETE FROM ".$table." ".$sql_sub;
		$this->makequery($sql);
		return true;
	}
	
}
?>