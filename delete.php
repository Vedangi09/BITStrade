
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<?php

session_start();
$output='';
	
	$nick=$_SESSION['nick'];
	
	if($nick)
	{
		mysql_connect("127.0.0.1","root","") or die("Could not connect");
		mysql_select_db("bitstrade");
		$query= mysql_query("SELECT * FROM sell WHERE nick='$nick'");
		$count= mysql_num_rows($query);
		
		if($count == 0)
		{
			echo "sorry you have no ad's";
		}
		
		else
		{
			while($l=mysql_fetch_array($query))
			{
				$nick=$l['nick'];
				$product=$l['product'];
				$hostel=$l['hostel'];
				$details=$l['details'];
				$number=$l['contact'];
				$name=$l['name'];
				$price=$l['price'];
				
				
				$output.='<div><form action="del.php" method="POST">nick: '.$nick.'<br> product: '.$product.'<input type="hidden" name="product" value="'.$product.'"><br>details: '.$details.'<br>price: '.$price.'<br> contact: '.$number.'<br>hostel:
				'.$hostel.' <br><input type="submit" name="delete" value="delete" class="classname"> </form></div><br><br>';
			}
		}
	}	
		
	else
	{
		header("location:BITSsell.php?notify=Enter a valid search term");
	}

?>
<?php

print("$output"); 
?>




</body>
</html>

