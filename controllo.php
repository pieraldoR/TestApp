<?php
$fileuser="iscritti.xml";
$xml = simplexml_load_file($fileuser); 
echo "<h3>persone iscritte: ".count($xml->registered)."</h3><br>";
foreach($xml->registered as $dati){ 
    echo "Nome: ".$dati->surname."<br>\n"; 
    echo "Cognome: ".$dati->name."<br>\n"; 
     echo "<hr>\n"; 
}

?>