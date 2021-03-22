<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Contact;
use Doctrine\ORM\EntityManagerInterface;

class ContactController extends AbstractController
{
    private $entityManager;
    public function __construct(EntityManagerInterface $entityManager){
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/nous-contacter", name="contact")
     */
    public function index(): Response
    {
        $contacts = $this->entityManager->getRepository(Contact::class)->findAll();
        return $this->render('contact/index.html.twig', [
            'contacts' => $contacts
        ]);
    }
}
