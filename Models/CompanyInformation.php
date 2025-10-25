<?php

namespace Models;
use PDO;

require_once __DIR__ . '/../config/bootstrap.php';
class CompanyInformation
{
    private $pdo;
    public function __construct()
    {
        $connexion = "mysql:host={$_ENV['DB_HOST']};dbname={$_ENV['DB_NAME']}";
        $user = $_ENV['DB_USER'];
        $password = $_ENV['DB_PASS'];

        try {
            $this->pdo = new PDO($connexion, $user, $password);
        }
        catch (PDOException $e) {
            echo "<br> Impossible de se connecter a la base de données";
            echo $e->getMessage();
        }
    }

    public function addApplications($companyName, $jobName, $urlOffer, $email, $phoneNumber)
    {
        $query = "INSERT INTO candidatures (id, nom_entreprise, nom_poste, url_offre, email, numero_telephone) VALUES (?, ?, ?, ?, ?, ?)";
        $exec = $this->pdo->prepare($query);
        $exec->execute([null, $companyName, $jobName, $urlOffer, $email, $phoneNumber]);
    }
}