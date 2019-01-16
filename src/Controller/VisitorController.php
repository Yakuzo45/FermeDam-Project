<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class VisitorController extends AbstractController
{

    /**
     * @Route("/", name="Homepage")
     */
    public function index(Request $request, \Swift_Mailer $mailer)
    {
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $message = (new \Swift_Message($form->getData()['Object']))
                ->setTo('Damien.lelong0291@orange.fr')
                ->setFrom($form->getData()['Email'])
                ->setBody($form->getData()['Message']);

            $mailer->send($message);
            $this->addFlash('success',  'Votre message a bien été envoyé !');
        }

        return $this->render('Visitor/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
