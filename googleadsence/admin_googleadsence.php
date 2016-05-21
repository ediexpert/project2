<?php

if($con = mysql_connect("localhost","root","")){
	//echo "Database Connected";
	if(mysql_select_db("tinycent01", $con)){
		//echo "DB Selected";
	}else{
		echo mysql_error();
	}
}


function online_users(){
	$sql = mysql_query("SELECT * FROM online_users");
	return mysql_num_rows($sql);
}

if($_REQUEST['clk']){
	
	echo $online_users = online_users();
	echo $rand_no = rand(1,$online_users);
	$num = $rand_no-1;
	$r2 = mysql_query("SELECT * FROM online_users LIMIT $num,1 ");
	$r = mysql_fetch_assoc($r2);
	echo $sess = $r['session'];
	echo $ip = $r['ip'];


	$r3 = mysql_query("SELECT * FROM clicked WHERE ip = '$ip'");
	if(mysql_num_rows($r3) == 0){
		if(mysql_query("INSERT INTO clickme (session, ip) VALUES ('$sess', '$ip');")){
			echo "Click is generated!";
		}
	}
}
?>
<form method="post" action="">
	<input type="submit" name="clk" value="create click">
</form>
<?php echo  $r_cnt =  mysql_result(mysql_query("SELECT count(ip) FROM clickme"), 0);?>
