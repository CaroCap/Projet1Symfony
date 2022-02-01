<?php //  ouvrir balises php

namespace App\Controller; //On va utiliser ce namespace pour tous nos controller

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ExempleRoutingController extends AbstractController{
    
    // Création d'une Action (on écrit le nom en camelCase)
    // Une action renvoie une view() ou lancer une autre action ou return new Response("html brut dedans ex : <h3>HelloWorld</h3>")
    #[Route('/exemple/routing/accueil')]
    public function afficherMessageAccueil()
    {
        return new Response("html brut dedans ex : <h3>HelloWorld</h3>");
    }

    #[Route("/exemple/routing/afficher/contact/{prenom}/{profession}")]
    public function afficherContact(Request $objetRequest)
    {
        // On va chercher dans l'url les valeurs grâce à la méthode Get de l'objet Request
        $lePrenom = $objetRequest->get("prenom");
        $laProfession = $objetRequest->get("profession");
        return new Response("<br>Je suis " . $lePrenom . " et ma profession est " . $laProfession);
    }

    //On peu ajouter des requirements pour forcer le bon encodage sinon ça plante
    #[Route('/exemple/routing/bienvenue/age/{age}', requirements:['age'=>'\d+'])]
    public function bienvenueAge(Request $objetRequest)
    {
        return new Response("Bienvenue, vous avez " . $objetRequest->get("age") . " ans");
    }

    #[Route('/ex/routing/afficher/vue/simple')]
    public function afficherVueSimple()
    {
        // return new Response("je suis un message");
        return $this->render('exemple_routing/afficher_vue_simple.html.twig');
    }

    #[Route('/ex/routing/afficher/vue/layout')]
    public function afficherVueAvecLayout()
    {
        return $this->render('exemple_routing\afficher_autre_vue_avec_layout.html.twig');
    }

    #[Route('/exemple/routing/afficher/ville')]
    public function afficherville(Request $objetRequest)
    {
        $monArray = [
            'nom' => 'Bruxelles',
            'pays' => 'Belgique'
        ];
        return $this->render('exemple_routing/afficher_ville.html.twig', $monArray);
    }
}