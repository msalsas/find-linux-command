<?php

namespace App\Controller;

use App\Form\FindFilesType;
use App\Service\FindFilesService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/")
     * @param Request $request
     * @param FindFilesService $findFilesService
     * @return string
     */
    public function indexAction(Request $request, FindFilesService $findFilesService)
    {
        $form = $this->createForm(FindFilesType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $findFiles = $form->getData();
            $command = $findFilesService->getFindFilesCommand($findFiles);

            return $this->render('main/success.html.twig', ['linux_command' => $command]);
        }

        return $this->render('main/index.html.twig', ['form' => $form->createView()]);
    }
}