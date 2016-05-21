<?php 
if($con = mysql_connect("localhost","root","")){
	//echo "Database Connected";
	if(mysql_select_db("tinycent01", $con)){
		//echo "DB Selected";
	}else{
		echo mysql_error();
	}
}
?>