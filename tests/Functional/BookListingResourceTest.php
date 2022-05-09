<?php

namespace App\Tests\Functional;

use ApiPlatform\Core\Bridge\Symfony\Bundle\Test\ApiTestCase;

class BookListingResourceTest extends ApiTestCase
{
    public function testCreateBookListing(){

        $client = self::createClient();

        $client->request('POST', '/api/books', [
            'headers' => ['Content-Type' => 'application/json'],
            'json' => [],
        ]);

        $this->assertResponseStatusCodeSame(401);
    }

}