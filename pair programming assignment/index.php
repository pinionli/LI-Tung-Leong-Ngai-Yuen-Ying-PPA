<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Salaries Tax Computation</title>

<style>
body {
	background-color:rgba(120,207,255,0.6);
}
table {
	margin:1em auto;
}

th, td {
  border: 1.5px solid white;
  border-collapse: collapse;
  text-align:center;
  padding: 15px;
  color:black;
}

article {
  -webkit-flex: 3;
  -ms-flex: 3;
  flex: 3;
  background-color: rgba(50,180,255,0.4);
  padding: 10px;
}
</style>

</head>




<body>
<img src="image\01.png" alt="Girl in a jacket">

<header>
<h1 style="text-align:center;">Salaries Tax Computation 2018/19</h1>
</header>
<hr>

<section>
<nav></nav>

<article>


<form method="POST" action="<?php echo $_SERVER["PHP_SELF"];?>">
<table><tr>
<td>Marital status&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </td>
<td><input type="radio" name="status" value="single">&nbsp;Single </td>
<td><input type="radio" name="status" value="married">&nbsp; Married</td>
</tr>
<br><br>
<tr>
<th></th>
<th>Self &nbsp;HK$</th>
<th>Spouse &nbsp;HK$</th>
</tr>
<tr>
<td>Income for the year of assessment &nbsp; &nbsp; </td>
<td><input type="text" name="self_income" value=""></td>
<td><input type="text" name="spouse_income" value=""></td>
</tr>
<tr>
</tr>


<tr>
<td><input type="submit" value="submit">
<input type="reset" value="reset"></td>
</tr>
</table></form>

</article>
</section>

<?php

$status = "";
$self_income = 0;
$spouse_income = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $status = $_POST["status"];
  $self_income = $_POST["self_income"];
  $spouse_income = $_POST["spouse_income"];
}


function MPF($a) {  
	$i = $a;
	$i = $i *0.05;
	if ($a <= "85200") {
		echo "0";
	} elseif ($i >= "18000") {
		echo "18000";
	} else { 
		echo $i; 
	}
}

function MPF_spouse($a, $s) {  
	$i = $a;
	$i = $i *0.05;
	if ( $s == "single") {
		echo "0";
	}  	elseif ($a <= "85200") {
		echo "0";
	} 	elseif ($i >= "18000") {
		echo "18000";
	} else { 
		echo $i; 
	}
}


function tax($i) { 
	$a = $i;
	$a = $a *0.05;
	if ($i <= "85200") {
		$a = 0;
	} elseif ($a >= "18000") {
		$a = 18000;
	} 
	if ($i >= "2022000") {
		$i = ($i - $a) *0.15;
		echo $i;
		return;
	}	
	$i = $i - $a - 132000;
	if ($i <= "0") {
			 echo "0";
	}	elseif ( $i >= "200000") {
			$i = ($i - 200000) * 0.17;
			$i = $i + 16000;
			echo $i;
	}	elseif ( $i >= "150000") {
			$i = ($i - 150000) * 0.14;
			$i = $i + 9000;
			echo $i;
	}	elseif ( $i >= "100000") {
			$i = ($i - 100000) * 0.1;
			$i = $i + 4000;
			echo $i;
	}	elseif ( $i >= "50000") {
			$i = ($i - 50000) * 0.06;
			$i = $i + 1000;
			echo $i;
	}	else {	
			$i = $i * 0.02;
			echo $i;
	}
}

function tax_spouse($i, $s) {  
	$a = $i;
	$a = $a *0.05;
	
	if ($i <= "85200") {
		$a = 0;
	} elseif ($a >= "18000") {
		$a = 18000;
	} 	
		if ( $s == "single") {
		echo "0";
	}	elseif ($i >= "2022000") {
		$i = ($i - $a) *0.15;
		echo $i;
		return;
	}	
	
	$i = $i - $a - 132000;
	if ( $s == "single") {
		echo "0";
	} 	elseif ($i <= "0") {
			 echo "0";
	} 	elseif ( $i >= "200000") {
			$i = ($i - 200000) * 0.17;
			$i = $i + 16000;
			echo $i;
	}	elseif ( $i >= "150000") {
			$i = ($i - 150000) * 0.14;
			$i = $i + 9000;
			echo $i;
	}	elseif ( $i >= "100000") {
			$i = ($i - 100000) * 0.1;
			$i = $i + 4000;
			echo $i;
	}	elseif ( $i >= "50000") {
			$i = ($i - 50000) * 0.06;
			$i = $i + 1000;
			echo $i;
	}	else {	
			$i = $i * 0.02;
			echo $i;
	}
}


function joint_tax($x, $y, $s) { 
	$a = $x * 0.05;
	$c = $y * 0.05;
	if ($x <= "85200") {
		$a = 0;
	} elseif ($a >= "18000") {
		$a = 18000;
	}
	if ($y <= "85200") {
		$c = 0;
	} elseif ($c >= "18000") {
		$c = 18000;
	}
	$b = 0;
	$e = $a + $c;
	$b = $x + $y;
	
	if ( $s == "single") {
		echo "0";
	}	elseif ($b >= "3144000") {
		$b = ($b - $e) *0.15;
		echo $b;
		return;
	}	
	$b = $b - $a - $c - 264000;
	if ( $s == "single") {
		echo "0";
	}  	elseif ($b <= "0") {
			 echo "0";
	}	elseif ( $b >= "200000") {
			$b = ($b - 200000) * 0.17;
			$b = $b + 16000;
			echo $b;
	}	elseif ( $b >= "150000") {
			$b = ($b - 150000) * 0.14;
			$b = $b + 9000;
			echo $b;
	}	elseif ( $b >= "100000") {
			$b = ($b - 100000) * 0.1;
			$b = $b + 4000;
			echo $b;
	}	elseif ( $b >= "50000") {
			$b = ($b - 50000) * 0.06;
			$b = $b + 1000;
			echo $b;
	}	else {	
			$b = $b * 0.02;
			echo $b;
	}
}


?>


<table>
<tr>
<th>Your MPF</th>
<th>Spouse MPF</th>
<th>Your Tax</th>
<th>Spouse Tax</th>
<th>Joint Assessment Tax Payble</th>
</tr>
<tr>
<td><?php echo MPF($self_income); ?></td>
<td><?php echo MPF_spouse($spouse_income, $status); ?></td>
<td><?php echo tax($self_income); ?></td>
<td><?php echo tax_spouse($spouse_income, $status); ?></td>
<td><?php echo joint_tax($self_income, $spouse_income, $status); ?></td>
</tr>
</table>





</body>
</html>

