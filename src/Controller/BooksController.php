<?php

namespace App\Controller;

use App\Repository\BookRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class BooksController extends AbstractController
{
    /**
     * @return Response
     */
    #[Route('/api/book', name: 'app_books')]
    public function index(BookRepository $bookRepository, NormalizerInterface $normalizer): Response
    {
        $result = $bookRepository->getFindBookByAuthor();

        $resultNormalises = $normalizer->normalize($result,null, ['groups' => 'read']);

//        dd($resultNormalises);

        $json = json_encode($resultNormalises);

        $response = new Response($json, 200, [
            "Content-Type" => "application/json"
        ]);

        return $response;
    }
}
