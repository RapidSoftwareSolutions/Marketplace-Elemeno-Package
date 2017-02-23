[![](https://scdn.rapidapi.com/RapidAPI_banner.png)](https://rapidapi.com/package/Elemeno/functions?utm_source=RapidAPIGitHub_ElemenoFunctions&utm_medium=button&utm_content=RapidAPI_GitHub) 

# Elemeno Package
Elemeno
* Domain: elemeno.io
* Credentials: apiKey

## How to get credentials: 
0. Go to [Elemeno website](http://elemeno.io) 
1. Log in or create a new account
2. Go to [Projects page](https://elemeno.io/projects) to get your API key
## Elemeno.getAllSingleItems
Retrieve an array of all Single Items.

| Field                            | Type       | Description
|----------------------------------|------------|----------
| apiKey                           | credentials| Api key obtained from Elemeno
| pageSize                         | Number     | Number of the results at the page
| pageNumber                       | Number     | Number of the results page
| sortBy                           | String     | Sort option. Possible values: $dateUpdated(default), $dateCreated
| sortOrder                        | String     | Sort order. Possible values: DESC(default), ASC
| titleFilterOperation             | String     | This keyword will allow you to filter by your title, regardless if it has been renamed. If was renamed, you can additionally use that name. Possible values: $equals, $not, $contains, $startsWith, $endsWith, $lessThan, $lessThanOrEqual, $greaterThan, $greaterThanOrEqual
| titleFilterContent               | String     | Content of the title filter
| priceFilterOperation             | String     | This keyword will allow you to filter by your price. Possible values: $equals, $lessThan, $lessThanOrEqual, $greaterThan, $greaterThanOrEqual
| priceFilterContent               | Number     | Content of the price filter
| timestampUpdatedFilterOperation  | String     | This keyword will allow you to filter by update timestamp. Possible values: $lessThan, $greaterThan
| timestampUpdatedFilterContent    | Number     | Content of the update timestamp filter
| timestampPublishedFilterOperation| String     | This keyword will allow you to filter by create timestamp. Possible values: $lessThan, $greaterThan
| timestampPublishedFilterContent  | Number     | Content of the create timestamp filter
| editionFilterOperation           | String     | This keyword will allow you to filter by edition. Possible values: $equals, $startsWith, $endsWith, $not
| editionFilterContent             | String     | Content of the edition filter
| isAvailable                      | Boolean    | If item is available
| hasHardcover                     | Boolean    | If item has hardcover
| authorsIdList                    | String     | Ids of authors (can accept string or array)

## Elemeno.getSpecificSingleItem
Retrieve a Single Item by slug.

| Field   | Type       | Description
|---------|------------|----------
| apiKey  | credentials| Api key obtained from Elemeno
| itemSlug| String     | Slug of the item

## Elemeno.getCollections
Retrieve an array of all Collections.

| Field                            | Type       | Description
|----------------------------------|------------|----------
| apiKey                           | credentials| Api key obtained from Elemeno
| pageSize                         | Number     | Number of the results at the page
| pageNumber                       | Number     | Number of the results page
| sortBy                           | String     | Sort option. Possible values: $dateUpdated(default), $dateCreated
| sortOrder                        | String     | Sort order. Possible values: DESC(default), ASC
| titleFilterOperation             | String     | This keyword will allow you to filter by your title, regardless if it has been renamed. If was renamed, you can additionally use that name. Possible values: $equals, $not, $contains, $startsWith, $endsWith, $lessThan, $lessThanOrEqual, $greaterThan, $greaterThanOrEqual
| titleFilterContent               | String     | Content of the title filter
| timestampUpdatedFilterOperation  | String     | This keyword will allow you to filter by update timestamp. Possible values: $lessThan, $greaterThan
| timestampUpdatedFilterContent    | Number     | Content of the update timestamp filter
| timestampPublishedFilterOperation| String     | This keyword will allow you to filter by create timestamp. Possible values: $lessThan, $greaterThan

## Elemeno.getSingleCollection
Retrieve a Single Collection by slug.

| Field         | Type       | Description
|---------------|------------|----------
| apiKey        | credentials| Api key obtained from Elemeno
| collectionSlug| String     | Slug of the collection

## Elemeno.getAllCollectionItems
Retrieve an array of Items within a specific Collection.

| Field                            | Type       | Description
|----------------------------------|------------|----------
| apiKey                           | credentials| Api key obtained from Elemeno
| collectionSlug                   | String     | Slug of the collection
| pageSize                         | Number     | Number of the results at the page
| pageNumber                       | Number     | Number of the results page
| sortBy                           | String     | Sort option. Possible values: $dateUpdated(default), $dateCreated, $datePublished
| sortOrder                        | String     | Sort order. Possible values: DESC(default), ASC
| titleFilterOperation             | String     | This keyword will allow you to filter by your title, regardless if it has been renamed. If was renamed, you can additionally use that name. Possible values: $equals, $not, $contains, $startsWith, $endsWith, $lessThan, $lessThanOrEqual, $greaterThan, $greaterThanOrEqual
| titleFilterContent               | String     | Content of the title filter
| priceFilterOperation             | String     | This keyword will allow you to filter by your price. Possible values: $equals, $lessThan, $lessThanOrEqual, $greaterThan, $greaterThanOrEqual
| priceFilterContent               | Number     | Content of the price filter
| timestampUpdatedFilterOperation  | String     | This keyword will allow you to filter by update timestamp. Possible values: $lessThan, $greaterThan
| timestampUpdatedFilterContent    | Number     | Content of the update timestamp filter
| timestampPublishedFilterOperation| String     | This keyword will allow you to filter by create timestamp. Possible values: $lessThan, $greaterThan
| timestampPublishedFilterContent  | Number     | Content of the create timestamp filter
| editionFilterOperation           | String     | This keyword will allow you to filter by edition. Possible values: $equals, $startsWith, $endsWith, $not
| editionFilterContent             | String     | Content of the edition filter
| isAvailable                      | Boolean    | If item is available
| hasHardcover                     | Boolean    | If item has hardcover
| authorsIdList                    | String     | Ids of authors (can accept string or array)

## Elemeno.getCollectionItemBySlug
Retrieve a Single Collection Item by slug.

| Field         | Type       | Description
|---------------|------------|----------
| apiKey        | credentials| Api key obtained from Elemeno
| collectionSlug| String     | Slug of the collection
| itemSlug      | String     | Slug of the item

## Elemeno.getCollectionItemById
Retrieve a Single Collection Item by id.

| Field         | Type       | Description
|---------------|------------|----------
| apiKey        | credentials| Api key obtained from Elemeno
| collectionSlug| String     | Slug of the collection
| itemId        | String     | Id of the item

