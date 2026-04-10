<?php

// src/Controller/BookController.php

namespace App\Controller;

use App\Entity\Books;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

use Symfony\Component\HttpFoundation\Request;


class BookController extends AbstractController
{

    #[Route('/books', name: 'books_list')]
    public function index(EntityManagerInterface $em): Response
    {
        $books = $em->getRepository(Books::class)->findAll();

        return $this->render('book/index.html.twig', [
            'books' => $books
        ]);
    }

    #[Route('/books/{id}', name: 'book_detail')]
    public function detail(int $id, EntityManagerInterface $em): Response
    {
        $book = $em->getRepository(Books::class)->find($id);

        if (!$book) {
            throw $this->createNotFoundException('Book not found');
        }

        return $this->render('book/detail.html.twig', [
            'book' => $book
        ]);
    }

    #[Route('/books/{id}/edit', name: 'book_edit')]
    public function edit(
        int $id,
        Request $request,
        EntityManagerInterface $em
    ): Response {

        $book = $em->getRepository(Books::class)->find($id);

        if (!$book) {
            throw $this->createNotFoundException('Book not found');
        }

        if ($request->isMethod('POST')) {
            $book->setBookName($request->request->get('bookName'));
            $book->setIsbn13($request->request->get('isbn13'));

            $date = new \DateTime($request->request->get('publicationDate'));
            $book->setPublicationDate($date);

            $book->setSummary($request->request->get('summary'));

            $em->flush();

            return $this->redirectToRoute('book_detail', ['id' => $id]);
        }

        return $this->render('book/edit.html.twig', [
            'book' => $book
        ]);
    }

}