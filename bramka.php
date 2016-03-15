<?php

	session_start(); //funkcja pozwalająca dokumentowi korzystać z sesji. Sesja jest to globalny pojemnik na dane

	if(!isset($_SESSION['zalogowany'])) //zwróci TRUE jeśli nie jest ustawiona
	{
		header('Location: index.php');
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
    <script>
      function countChar(val) {
        var len = val.value.length;
        if (len >= 160) {
          val.value = val.value.substring(0, 160);
        } else {
          $('#charNum').text(160 - len);
        }
      };
    </script>
		
		<script>
		//var myWindow;
				function funkcja_adresy() 
				{
				var myWindow = window.open("zal_kont.php", "Adresy", "width=1000, height=600");<!-- Adres, nazwa, parametry-->
				<!-- myWindow.document.write("<p>This is 'MsgWindow'. I am 200px wide and 200px tall!</p>");-->
				}

</script>
		
</head>

<body>
<div id="container">
	<div id="logo">
<img src="img/logo.jpg"/>
	</div>
<br />
<?php
echo "<p>Witaj ".$_SESSION['user'].'! [<a href="logout.php">Wyloguj się!</a>]</p>';

?>




<br />
	<div id="upperbutton">
		<button  id="adresy" onclick="funkcja_adresy()"></button>
	</div><br />
	<input type="text" id="kontakty" name="konatakty"/>
	<br />

<form>
<div id="lewy">
<div id="charNum">160</div>
<textarea type="text" name="wiadomosc" id="wiadomosc" onkeyup="countChar(this)" maxlength="160"></textarea><br />


  <input type="button" value="Wyslij" id="wyslij" onclick="msg()" />
<br />
</div>
<div id="prawy"></div>
  
  
  </form>
</body>

</html>