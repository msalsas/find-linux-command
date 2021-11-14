<?php

namespace App\Controller;

use App\Form\FindFilesType;
use App\Form\FindTextType;
use App\Service\FindCommandService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/")
     * @param Request $request
     * @param FindCommandService $findFilesService
     * @return string
     */
    public function indexAction(Request $request, FindCommandService $findFilesService)
    {
        $formFindFiles = $this->createForm(FindFilesType::class);
        $formFindFiles->handleRequest($request);
        if ($formFindFiles->isSubmitted() && $formFindFiles->isValid()) {
            $findFiles = $formFindFiles->getData();
            $command = $findFilesService->getFindFilesCommand($findFiles);

            return $this->render('main/success.html.twig', ['linux_command' => $command]);
        }

        $formFindText = $this->createForm(FindTextType::class);
        $formFindText->handleRequest($request);
        if ($formFindText->isSubmitted() && $formFindText->isValid()) {
            $findText = $formFindText->getData();
            $command = $findFilesService->getFindTextCommand($findText);

            return $this->render('main/success.html.twig', ['linux_command' => $command]);
        }

        return $this->render('main/index.html.twig', [
            'formFindFiles' => $formFindFiles->createView(),
            'formFindText' => $formFindText->createView(),
        ]);
    }
}