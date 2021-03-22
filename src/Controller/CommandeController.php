<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
Use App\Entity\Product;
Use App\Entity\Commande;
Use App\Form\CommandeType;

class CommandeController extends AbstractController
{
    private $entityManager;
    public function __construct(EntityManagerInterface $entityManager){
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/commande/{slug}", name="commande")
     */
    public function index($slug, Request $request): Response
    {
        $notification = null;

        $commande = new Commande();
        $form = $this->createForm(CommandeType::class, $commande);

        $product = $this->entityManager->getRepository(Product::class)->findOneBySlug($slug);
        if (!$product) {
           return $this->redirectToRoute('products');
        }

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $commande = $form->getData();
            
            $commande->setCreatAt( new \DateTime("now"));
            $commande->setCode($product->getId());
            $commande->setPrice($product->getPrice());
            $doctrine = $this->getDoctrine()->getManager();
            $doctrine->persist($commande);
            $doctrine->flush();

            $notification = "Votre commande a été bien reçu, nous vous contacterons dans un bref délai !!!";
        }

        return $this->render('commande/index.html.twig', [
            'product' => $product,
            'notification' => $notification,
            'form' =>$form->createView(),
        ]);
    }
}
