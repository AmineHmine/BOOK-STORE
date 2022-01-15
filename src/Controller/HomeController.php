<?php

namespace App\Controller;

use App\Repository\AuteurRepository;
use App\Repository\GenreRepository;
use App\Repository\LivreRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Knp\Component\Pager\PaginatorInterface; 

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home", methods={"GET"})
     */
    public function index(AuteurRepository $auteurRepository,LivreRepository $livreRepository,GenreRepository $genreRepository,Request $request,PaginatorInterface $paginator): Response
    {

        $livres = $livreRepository->findAll();

        $livres  = $paginator->paginate(
            $livres ,
            $request->query->getInt('page', 1),
            8
        );


        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'livres' => $livres,
        ]);
    }

}