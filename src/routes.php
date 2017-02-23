<?php
$routes = [
    'getCollectionItemById',
    'getCollectionItemBySlug',
    'getAllCollectionItems',
    'getSingleCollection',
    'getCollections',
    'getSpecificSingleItem',
    'getAllSingleItems',
    'metadata'
];
foreach ($routes as $file) {
    require __DIR__ . '/../src/routes/' . $file . '.php';
}

