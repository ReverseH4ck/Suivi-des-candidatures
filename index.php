<?php
require_once 'Controller/ControllerCompanyInformation.php';
use Controler\ControllerCompanyInformation;

$companyController = new ControllerCompanyInformation();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Suivis Candidatures</title>
</head>
<body>
    <div class="container">
        <h2>Suivi des candidatures</h2>
        <?php require_once 'Templates/form.php';
        session_start();
        if ($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            $companyController->handleForm();
        }
        if (isset($_SESSION['flash']))
        {
            echo "<p style='color:green;'>{$_SESSION['flash']}</p>";
            unset($_SESSION['flash']);
        }
        ?>
    </div>
</body>