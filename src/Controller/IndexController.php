<?php

namespace App\Controller;

use App\Entity\Credit;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class IndexController extends AbstractController
{
    /**
     *
     * @Route("/", name="show_index", priority=70)
     */
    public function index(EntityManagerInterface $entityManager): Response
    {
        $credits = $entityManager->getRepository(Credit::class)->findAll();

        return $this->render('index.html.twig', [
            'credits' => $credits
        ]);
    }
}
