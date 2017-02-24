<?php

namespace Test\Functional;

require_once(__DIR__ . '/../../src/Models/checkRequest.php');
class StackOverflowTest extends BaseTestCase {

    public function testListMetrics() {

        $routes = [
            'getCollectionItemById',
            'getCollectionItemBySlug',
            'getAllCollectionItems',
            'getSingleCollection',
            'getCollections',
            'getSpecificSingleItem',
            'getAllSingleItems'

        ];

        foreach($routes as $file) {
            $var = '{  
                    }';
            $post_data = json_decode($var, true);

            $response = $this->runApp('POST', '/api/Elemeno/'.$file, $post_data);

            $this->assertEquals(200, $response->getStatusCode(), 'Error in '.$file.' method');
        }
    }

}
