<?php

namespace App\Tests\Functional;

use ApiPlatform\Core\Bridge\Symfony\Bundle\Test\ApiTestCase;
use App\Entity\Book;

class BookListingResourceTest extends ApiTestCase
{
    protected function setUp(): void
    {
        $this->client = $this->createClient();
        $this->entityManager = $this->client->getContainer()->get('doctrine')->getManager();

        $this->entityManager->createQuery('DELETE FROM App\Entity\Book')->execute();
        $this->entityManager->flush();

        $book1 = new Book();
        $book1->setTitle('title_test');
        $book1->setDescription('description_test');
        $book1->setPublicationDate(new \DateTime('2022-04-24'));
        $book1->setGenre('genre_test');
        $book1->setAuthor(NULL);

        $book2 = new Book();
        $book2->setTitle('title_test2');
        $book2->setDescription('description_test2');
        $book2->setPublicationDate(new \DateTime('2022-04-24'));
        $book2->setGenre('genre_test2');
        $book2->setAuthor(NULL);

        $this->entityManager->persist($book1);
        $this->entityManager->persist($book2);
        $this->entityManager->flush();

        $this->id1 = $book1->getId();
        $this->id2 = $book2->getId();
    }

    public function testGetAllBooks()
    {
        $response = $this->client->request('GET', '/api/books', [
            'headers' => ['Content-Type' => 'application/json'],
            'json' => [],
        ]);

        $this->assertResponseIsSuccessful();

        $this->assertJsonContains([
            "@context" => "/api/contexts/Book",
            "@id" => "/api/books",
            "@type" => "hydra:Collection",
            "hydra:totalItems" => 2,
        ]);

        $this->assertCount(2, $response->toArray()['hydra:member']);
    }

    public function testGetBook()
    {

        $this->client->request('GET', "/api/books/{$this->id1}", [
            'headers' => ['Content-Type' => 'application/json'],
            'json' => [],
        ]);

        $this->assertResponseIsSuccessful();

        $this->assertJsonContains([
            "@id" => "/api/books/{$this->id1}",
        ]);
    }

    public function testCreateBook()
    {
        $this->client->request('POST', '/api/books', [
            'headers' => ['Content-Type' => 'application/json'],
            'json' => [
                'title' => 'title_test3',
                'description' => 'description_test3',
                'publicationDate' => '2022-04-25',
                'genre' => 'genre_test3',
                'author' => NULL,
            ],
        ]);

        $this->assertResponseStatusCodeSame(201);

        $this->assertJsonContains([
            'title' => 'title_test3',
            'description' => 'description_test3',
            'genre' => 'genre_test3',
        ]);
    }

    public function testUpdateBook()
    {
        $this->client->request('PUT', "/api/books/{$this->id1}", [
            'headers' => ['Content-Type' => 'application/json'],
            'json' => [
                'description' => 'Update description',
            ],
        ]);

        $this->assertResponseIsSuccessful();

        $this->assertJsonContains([
            "@id" => "/api/books/{$this->id1}",
            'description' => 'Update description',
        ]);
    }

    public function testDeleteBook()
    {
        $this->client->request('DELETE',  "/api/books/{$this->id1}", [
            'headers' => ['Content-Type' => 'application/json'],
            'json' => [],
        ]);

        $this->assertResponseIsSuccessful();
    }
}
