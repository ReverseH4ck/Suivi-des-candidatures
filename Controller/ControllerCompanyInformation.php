<?php
namespace Controler;
require_once 'Models/CompanyInformation.php';

use Models\CompanyInformation;

class ControllerCompanyInformation
{
    private $companyInformation;
    public function __construct()
    {
        $this->companyInformation = new CompanyInformation();
    }

    public function addApplication($nomEntreprise, $nomPoste, $urlOffre, $email, $numTelephone)
    {
        $this->companyInformation->addApplications($nomEntreprise, $nomPoste, $urlOffre, $email, $numTelephone);
    }

    public function handleForm()
    {
        if (empty($_POST['company']))
        {
            exit("Veillez entrer un nom d'entreprise.");
        }
        if (empty($_POST['job']))
        {
            exit("Veillez entrer un nom de poste");
        }
        $this->addApplication(
            $_POST['company'],
            $_POST['job'],
                $_POST['url'] ?? '',
            $_POST['email'] ?? '',
            $_POST['phone'] ?? ''
        );
        $_SESSION['flash'] = "Candidature enregistré avec succès";
        header('Location: index.php');
    }
}