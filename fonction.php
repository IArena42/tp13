<?php
// Fonction de connexion
function dbconnect()
{
    static $connect = null;
    if ($connect === null) {
        $connect = mysqli_connect('localhost', 'root', '', 'employees');

        if (! $connect) {
            die('erreur : ' . mysqli_connect_error());

        }
        mysqli_set_charset($connect, 'utf8mb4');
    }
    return $connect;
}

function getAllLine($sql)
{
    $result = mysqli_query(dbconnect(), $sql);
    $return = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $return[] = $row;
    }
    mysqli_free_result($result);
    return $return;
}

function getOneLine($sql)
{
    $result = mysqli_query(dbconnect(), $sql);
    return mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $return;
}

function getDepartement()
{
    $sql    = "SELECT * FROM departments";
    $result = getAllLine($sql);
    return $result;
}

function getDepartment_Manager()
{
    $sql = "SELECT departments.dept_no as num, departments.dept_name as name, employees.first_name as first_name, employees.last_name as last_name, employees.emp_no as num_emp  FROM departments
    LEFT JOIN dept_manager
    ON departments.dept_no=dept_manager.dept_no
    LEFT JOIN employees
    ON dept_manager.emp_no=employees.emp_no
    WHERE dept_manager.to_date > CURTIME()";

    $result = getAllLine($sql);
    return $result;
}

function recherche_personne_dans_departement($dept_no) {
    $sql = " select dept_emp.emp_no , employees.first_name, employees.last_name 
            from dept_emp 
            join employees on dept_emp.emp_no = employees.emp_no 
            WHERE dept_no = '%s'";
    $sql = sprintf($sql,$dept_no);

    echo $sql; // Affiche la requête SQL pour le débogage
    return getAllLine($sql);
}

?>

