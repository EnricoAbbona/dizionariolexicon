<?php
$host="localhost";
$user="root";
$password="";
$database="db-dizionario";
$connessione=new mysqli($host,$user,$password,$database);

if($connessione === false){
     die("Errore di connessione:".$connessione->connect_error);
}

$parola= $connessione->real_escape_string($_REQUEST['parola']);
$descrizione=$connessione->real_escape_string($_REQUEST['descrizione']);
$traduzione=$connessione->real_escape_string($_REQUEST['traduzione']);
$frasi=$connessione->real_escape_string($_REQUEST['frasi']);


if ($parola == '' || $traduzione == '' ){
    die ("Non puoi inserire campi vuoti");
}
$sql="INSERT INTO dizionario(parola,descrizione,traduzione,frasi) VALUES
('$parola','$descrizione','$traduzione','$frasi')";

if($connessione->query($sql)=== true){
    echo"Vocabolo inserito con successo";
    
} else{
    echo"Errore durante inserimento: ".$connessione->error;
}

$connessione->close();
?>