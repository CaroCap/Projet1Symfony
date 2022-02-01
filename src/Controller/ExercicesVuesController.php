<?php

namespace App\Controller;

use DateTime;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class ExercicesVuesController extends AbstractController{
    
    #[Route('/exercices/vue/ex1-2/{prix}/{tva}')]
    public function afficheTvacTwig(Request $objetRequest)
    {
        $prixTVAC = $objetRequest->get('prix')*(1+$objetRequest->get('tva')/100);
        $monArray = [
            'prix' =>$objetRequest->get('prix'),
            'tva' =>$objetRequest->get('tva'),
            'prixTVAC' => $prixTVAC
        ];

        return $this->render('exercices_vue/exercice1-2.html.twig', $monArray);
    }
    
    #[Route('/exercices/vue/ex3')]
    public function afficheVilles()
    {
        return $this->render('exercices_vue/exercice3.html.twig',);
    }

    #[Route('/exercices/vue/ex4')]
    public function afficheVillesArray()
    {
        $arrayVilles = ["Bruxelles", "Charleroi", "Mons"];
        $monArray = ["villes" => $arrayVilles];
        // $monArray = [
        //     'ville1' => 'Bruxelles',
        //     'ville2' => 'Milan',
        //     'ville3' => 'Charleroi'
        // ];
        return $this->render('exercices_vue/exercice4.html.twig',$monArray);
    }

    #[Route('/exercices/vue/ex5/{langue}')]
    public function afficheVillesArrayLangue(Request $req)
    {
        $arrayVillesFR = ["Bruxelles", "Charleroi", "Mons"];
        $arrayVillesNL = ["Brussels", "Parijs", "Bergen"];
        if($req->get('langue') == "FR"){
            $monArray = ["villes" => $arrayVillesFR];
        }
        elseif ($req->get('langue') == "NL") {
            $monArray = ["villes" => $arrayVillesNL];
        }
        else{
            return new Response("Erreur");
        }
        return $this->render('exercices_vue/exercice5.html.twig',$monArray);
    }

    #[Route('/exercices/vue/ex6')]
    public function afficherDateAujourdhui()
    {
        $dateAujourdhui = new DateTime();
        return $this->render('exercices_vue/exercice6.html.twig', ["laDate" => $dateAujourdhui]);
    }

    #[Route('/exercices/vue/exIF/{prix}')]
    public function multipliePar2(Request $objetRequest)
    {
        $prixDouble = $objetRequest->get('prix')*2;

        return $this->render('exercices_vue/exerciceIF.html.twig', ["prix"=>$prixDouble]);
    }
}