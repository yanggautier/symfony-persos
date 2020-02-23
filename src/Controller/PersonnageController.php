<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Personnage;

class PersonnageController extends AbstractController
{
    /**
     * @Route("/", name="accueil")
     */
    public function index()
    {
        return $this->render('personnage/index.html.twig');
    }

    /**
     * @Route("/persos", name="personnages")
     */
    public function persos()
    {
        Personnage::createPersonnages();
        return $this->render(
            'personnage/persos.html.twig',
            ["players" => Personnage::$personnages]
        );
    }

    /**
     * @Route("/persos/{nom}", name="afficher_personnage")
     */
    public function afficherPerso($nom)
    {
        Personnage::createPersonnages();
        $perso = Personnage::getPersonnageParNom($nom);

        return $this->render(
            'personnage/perso.html.twig',
            ["perso" => $perso]
        );
    }
}
