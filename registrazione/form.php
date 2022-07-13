<html>
    <head>
            <script language="JavaScript">
                function clear(){
                    document.getElementById("parola").value = '';
                    document.getElementById("descrizione").value = '';
                    document.getElementById("traduzione").value = '';
                    document.getElementById("frasi").value = '';

                }

            </script>

            <style>
                table{
                    width: 99%;
                    margin:auto;
                    padding-top: 20px;
                    border-collapse: collapse;
                    border: 1px solid black;


                }

                td, tr, th {
                    border: 1px solid black;
                }
            </style>
    </head>
    
    <body onload="clear()">
        <form action="invio.php"method="POST">
            <p>
                 <label for="parola">parola</label>
                 <input type="text"name="parola"id="parola">
            </p>
            <p>
                 <label for="descrizione">descrizione</label>
                 <input type="text"name="descrizione"id="descrizione">
            </p>
            <p>
                 <label for="traduzione">traduzione</label>
                 <input type="text"name="traduzione"id="traduzione">
            </p>
            <p>
                <label for="frasi">frasi</label>
                <input type="text" name="frasi" id="frasi">
           </p>
            <input type="submit" value="Invia">
            <input type="reset" value="reset">
        </form>


        <?php
$host="localhost";
$user="root";
$password="";
$database="db-dizionario";
$connessione=new mysqli($host,$user,$password,$database);

if($connessione === false){
     die("Errore di connessione:".$connessione->connect_error);
}

            $sql= "SELECT * FROM dizionario";
            if ($result = $connessione-> query($sql)){
                if($result->num_rows>0){
                echo'<table>
                <thead>
                <tr>
                <th>id</th>
                <th>parola</th>
                <th>descrizione</th>
                <th>traduzione</th>
                <th>frasi</th>
                <th>data inserimento</th>
                </tr></thead><tbody>';
                while($row=$result->fetch_array()){
                    echo'
                    <tr>
                    <td>' . $row['id_parola'] . '</td>
                    <td>' . $row['parola'] . '</td>
                    <td>' . $row['descrizione'] . '</td>
                    <td>' . $row['traduzione'] . '</td>
                    <td>' . $row['frasi'] . '</td>
                    <td>' . $row['data_inserimento'] . '</td>

                    </tr>
                    ';
            } echo "</tbody></table>";
                } else { echo "Non ci sono righe nella query";}

            } else {
                echo "Errore, impossibile eseguire la query $sql. " .$connessione->error;
            }
            $connessione->close();
?>


    </body>
</html>

