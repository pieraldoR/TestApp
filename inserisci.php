<?php
//file.xml è il file che contiene il codice xml che ho stampato sopra
$fileuser="iscritti.xml";
$xml = simplexml_load_file($fileuser); 

if(count($xml->registered)<30)
{
	$trovato=false;
	foreach($xml->registered as $dati)
	{ 
		if(strtoupper($dati->surname) == strtoupper($_POST["txtCognome"]) && strtoupper($dati->name) == strtoupper($_POST["txtNome"]))
			$trovato=true;
	}
	if($trovato)
	{
		echo "<center><h1>la persona risulta gi&agrave; iscritta:\n</h1>"; 
		echo"<a href='iscrizione.php'>Iscrizione</a></center>";
	}
	else
	{
		$nuovoIscritto = $xml->addChild('registered'); //crea un elemento <registered> </registered>
		$cognome = $nuovoIscritto->addChild('surname', $_POST["txtCognome"]); //inserisce dentro utente <nick>Nick nuovo utente</nick>
		$nome = $nuovoIscritto->addChild('name', $_POST["txtNome"]); //come sopra, però con gli attributi cambiati
		//echo "<pre>".htmlentities($xml->asXML())."</pre>"; //stampa il nuovo file creato
		//sovrascrive il vecchio file con i nuovi dati
		$f = fopen($fileuser, "w");
		fwrite($f,  $xml->asXML());
		fclose($f);
		echo "<center><h1>Iscrizione avvenuta con successo, a presto!\n</h1>"; 
		echo"<a href='iscrizione.php'>Nuova iscrizione</a></center>";		
	}
}
else
{
echo "<center><h1>Siamo spiacenti! Limite massimo di iscritti raggiunto.\n</h1></center>"; 
}
?>
