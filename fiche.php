<?php
    #page de connexion du client :
   $client = mysqli_connect('localhost','root','','tp_php');
   if (!$client) 
    {
        echo "connexion a échoué " ;
    };

    #recuperation du code par $get :
    $code = $_GET['code'];

    #assemblage du sql et du php  avec le code :
    $requete = "SELECT SOCIETE,ADRESSE,PAYS FROM CLIENTS WHERE CODE_CLIENT = "."'".$code."'" ;

    #resultat de client et du requete
    $resultat = mysqli_query($client,$requete);

    #utilisation "donnee" pour stocker le resultat 
    $donnee = mysqli_fetch_assoc($resultat) ;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>fiche du client</title>
</head>
<body>
    <table width = 1000 border = 1>
        <tr>
            <th>code clients</th>
            <td><?php echo $code?></td>
        </tr>

        <tr>
            <th>societe</th>
            <td><?php echo $donnee['SOCIETE'] ;?></td>
        </tr>

        <tr>
            <th>adresse</th>
            <td><?php echo $donnee['ADRESSE'] ;?></td>
        </tr>

        <tr>
            <th>Pays</th>
            <td><?php echo $donnee['PAYS']; ?></td>
        </tr>
        
    </table>
</body>
</html>