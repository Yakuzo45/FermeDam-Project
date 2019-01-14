<?php

namespace App\Controller;

use App\Entity\Seasons;
use App\Form\SeasonType;
use App\Repository\SeasonsRepository;
use App\Services\ActualSeasonFinder;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class VisitorController extends AbstractController
{

    /**
     * @Route("/", name="Homepage")
     */
    public function index(ActualSeasonFinder $seasonFinder, SeasonsRepository $seasonsRepository, Request $request)
    {
        $findedSeason = $seasonFinder->seasonFinder();
        $season = $seasonsRepository->findOneByName($findedSeason);

        $form = $this->createForm(SeasonType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $season = $seasonsRepository->findOneById($request->request->get('season'));
        }

        $colis = $season->getColis();
        return $this->render('Visitor/index.html.twig', [
            'season' => $season,
            'colis' => $colis,
            'form' => $form->createView()
        ]);
    }
}
