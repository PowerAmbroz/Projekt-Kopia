<?php

	session_start(); //funkcja pozwalająca dokumentowi korzystać z sesji. Sesja jest to globalny pojemnik na dane

	if(!isset($_SESSION['zalogowany'])  && ($_SESSION['zalkont']==false))//zwróci TRUE jeśli nie jest ustawiona
	{
		header('Location: index.php');
		exit();
	}
	
	elseif(isset($_SESSION['zalogowany']) && ($_SESSION['zalkont']==false))
	{
		header('Location: bramka.php');
		exit();
		
	}


?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8"/>
	<title>Bramka sms</title>
	<meta name="description" content="bramka sms"/>
	<meta name="keywords" content="bramka, sms"/>
	<meta http-equiv="X-UA-Compatible" content="IE-edge,chrome=1"/>
	<link rel="stylesheet" href="css/style.css">
	
	<script src="http://code.jquery.com/jquery-1.5.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	
	<script>
	function myFunction() {
    <?php $_SESSION['zalkont']=false;?>
}
</script>

<script>
$(function schowana(){
    $("#div2").hide();
    $("#preview").on("click", function(){
        $("#div2").toggle();
    });
});

</script>


</head>

<body onbeforeunload="return myFunction()">
<br />
<button id="preview">Dodaj Studenta</button>
<div id="div2">

<form action="" method="post">
Imię  <input type="text" name="imie"  id="imie"/><br />
Nazwisko <input type="text" name="nazwisko" id="nazwisko" ><br />
Grupa <input type="text" name="grupa" id="grupa"><br />
Nr. Tel. <input type="tel" name="nr_tel" id="tel"/><br />
ID Wykładowcy <input type="text" name="ID" value="<?php echo $_SESSION['id']; ?>" readonly><br /><br />


<input type="submit" value="Dodaj" />


</div>
<br />




<form action="adresy.php" method="post">
Metoda Wyszukiwania <br />
<select name="metoda_szukania">
<option value="Imie">Imię</option>
<option value="Nazwisko">Nazwisko</option>
<option value="Grupa">Grupa</option>
</select>
<input name="wyrazenie" type="search" size="40">
<input type="submit" name="submit" value="Szukaj">
</form>

<br />
<br />


<table width="900" align="center" border="1" bordercolor="#d5d5d5" cellpadding="0" cellspacing="0">     
<tr>

<?php 

//ini_set("display_errors", 0);
require_once 'dbconnect.php';
$polaczenie = mysqli_connect($host, $user, $password, $database);
mysqli_query($polaczenie, "SET CHARSET utf8")
or die('Brak połączenia z serwerem MySQL.<br />Błąd: '.mysqli_error());

mysqli_query($polaczenie, "SET NAMES 'utf8' COLLATE 'utf8_polish_ci'");
mysqli_select_db($polaczenie, $database);

//$zapytanietxt = mysqli_query($polaczenie,"SELECT `Imię`,`Nazwisko` FROM `studenci`");

$rezultat = mysqli_query($polaczenie, "SELECT `Imie`,`Nazwisko`, `Grupa`,`Telefon` FROM `studenci`");
$ile = mysqli_num_rows($rezultat);

if ($ile>0) 
{
echo<<<END

<td width="100" align="center" bgcolor="e5e5e5">Imie</td>
<td width="100" align="center" bgcolor="e5e5e5">Nazwisko</td>
<td width="100" align="center" bgcolor="e5e5e5">Grupa</td>
<td width="100" align="center" bgcolor="e5e5e5">Telefon</td>
</tr><tr>
END;
}
	for ($i = 1; $i <= $ile; $i++) 
	{
		
		$row = mysqli_fetch_assoc($rezultat);
		//$ID_student= $row['ID_student'];
		$Imie = $row['Imie'];
		$Nazwisko = $row['Nazwisko'];
		$Grupa = $row['Grupa'];
		$Telefon = $row['Telefon'];
		/*$odpd = $row['odpd'];
		$answer = $row['answer'];
		$kategoria = $row['kategoria'];
		$rok = $row['rok'];		*/
		
echo<<<END

<td width="100" align="center">$Imie</td>
<td width="100" align="center">$Nazwisko</td>
<td width="100" align="center">$Grupa</td>
<td width="100" align="center">$Telefon</td>
</tr><tr>
END;
			
	}

?>


</tr></table>



</body>

</html>