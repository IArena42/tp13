
<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
?>

<?php
require "fonction.php";
$department = getDepartment_Manager();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>affichage des liste de departement</title>
</head>
<body>
    <title>Document</title>
</head>
<body>
    <main>
        <div>
            <h1>Liste departement</h1>
            <table>
                <tr>
                    <th>Numero</th>
                    <th>Nom</th>
                    <th>Manager</th>
                    <th>ManagerID</th>
                </tr>
                <?php 
                foreach ($department as $d) {
                    ?>
                    <tr>
                        <td><a href="employe.php?<?= $d["num"] ?>"><?= $d["num"] ?></a></td>
                        <td><?= $d["name"] ?></td>
                        <td><?= $d["first_name"]." ".$d["last_name"] ?></td>
                        <td><?= $d["num_emp"] ?></td>
                    </tr>
                    <?php 
                }
                ?>
            </table>
        </div>
    </main>  
</body>
</html>