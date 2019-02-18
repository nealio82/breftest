<?php

namespace App\Controller;

use App\Entity\Kitty;
use App\Entity\Quote;
//use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends AbstractController
{
//    private $entityManager;
//
//    public function __construct(EntityManagerInterface $entityManager)
//    {
//        $this->entityManager = $entityManager;
//    }

    public function indexAction(): Response
    {
//        $repository = $this->entityManager->getRepository(Quote::class);

//        $featuredQuote = $repository->getRandomQuote();

//        $quotes = $repository->getQuotesNotIncluding($featuredQuote);


        $featuredQuote = new Quote();
        $kitty = new Kitty();
        $kitty->setName('Furrdrich Nietzsche');
        $kitty->setImage('/path/to/profile_image.jpg');
        $featuredQuote->setQuote('Without meowsic, life would be a mistake.');
        $featuredQuote->setKitty($kitty);

        $quotes = [
            $featuredQuote,
            $featuredQuote
        ];

        return $this->render('home.html.twig', [
            'heroQuote' => $featuredQuote,
            'quotes' => $quotes
        ]);
    }
}