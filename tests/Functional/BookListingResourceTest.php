<?php

namespace App\Tests\Functional;

use ApiPlatform\Core\Bridge\Symfony\Bundle\Test\ApiTestCase;

class BookListingResourceTest extends ApiTestCase
{


    // public function testCreateBook(){

    //     $response = static::createClient()->request('POST', '/api/books', [
    //             'headers' => ['Content-Type' => 'application/json'],
    //             'json' => [
    //                 'title' => 'title_test',
    //                 'description' => 'description_test',
    //                 'publicationDate' => '2022-04-23',
    //                 'genre' => 'genre_test',
    //                 'author' => NULL,
    //             ],
    //         ]);

    //     $this->assertResponseStatusCodeSame(201);


    //     $this->assertJsonContains([
    //         'title' => 'title_test',
    //         'description' => 'description_test',
    //         'publicationDate' => '2022-04-23T00:00:00+02:00',
    //         'genre' => 'genre_test',

    //    ]);

    // }

    // public function testUpdateBook(){

    //     $client = static::createClient();

    //     $client->request('PUT', '/api/books', [
    //             'headers' => ['Content-Type' => 'application/json'],
    //             'json' => [
    //                 'description' => 'Update description',
    //             ],
    //         ]);

    //     $this->assertResponseIsSuccessful();


    //     $this->assertJsonContains([
    //         '@id' => '/api/books',
    //         'description' => 'Update description',
    //    ]);

    // }

    // public function testDeleteBook(){

    //     $client = static::createClient();

    //     $client->request('DELETE', '/api/books/1', [
    //             'headers' => ['Content-Type' => 'application/json'],
    //             'json' => [
    //             ],
    //         ]);

    //     $this->assertResponseIsSuccessful();


    // //     $this->assertJsonContains([
    // //         '@id' => '/api/books/1',
    // //    ]);

    // }




    /***********************************/


    // public function testGetCollection(){

    //     $response = static::createClient()->request('GET', '/api/books', [
    //             'headers' => ['Content-Type' => 'application/json'],
    //             'json' => [],
    //         ]);

    //     $this->assertResponseIsSuccessful();

    //     $this->assertJsonContains([
    //             "@context"=> "/api/contexts/Book",
    //             "@id"=> "/api/books",
    //             "@type"=> "hydra:Collection",
    //             "hydra:totalItems"=> 1,
    //            ]);

    //     $this->assertCount(1, $response->toArray()['hydra:member']);

    // }

    // public function testGetItem(){

    //     $response = static::createClient()->request('GET', '/api/books/49', [
    //             'headers' => ['Content-Type' => 'application/json'],
    //             'json' => [],
    //         ]);

    //     $this->assertResponseIsSuccessful();

    //     $this->assertJsonContains([
    //             "@id"=> "/api/books/49",
    //            ]);

    // }

}