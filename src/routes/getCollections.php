<?php
$app->post('/api/Elemeno/getCollections', function ($request, $response, $args) {
    $settings = $this->settings;

    //checking properly formed json
    $checkRequest = $this->validation;
    $validateRes = $checkRequest->validate($request, ['apiKey']);
    if (!empty($validateRes) && isset($validateRes['callback']) && $validateRes['callback'] == 'error') {
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($validateRes);
    } else {
        $post_data = $validateRes;
    }
    //forming request to vendor API
    $query_str = $settings['api_url'] . "collections";
    $body = array();

    if (isset($post_data['args']['pageSize']) && strlen($post_data['args']['pageSize']) > 0) {
        $body['size'] = $post_data['args']['pageSize'];
    }

    if (isset($post_data['args']['pageNumber']) && strlen($post_data['args']['pageNumber']) > 0) {
        $body['page'] = $post_data['args']['pageNumber'];
    }
    if (isset($post_data['args']['sortBy']) && strlen($post_data['args']['sortBy']) > 0) {
        if (isset($post_data['args']['sortOrder']) && strlen($post_data['args']['sortOrder']) > 0) {
            $body['sort'] = json_encode([$post_data['args']['sortBy'] => $post_data['args']['sortOrder']]);
        } else {
            $body['sort'] = json_encode([$post_data['args']['sortBy'] => 'DESC']);
        }
    }

    if (isset($post_data['args']['titleFilterContent']) && (strlen($post_data['args']['titleFilterContent']) > 0) || count($post_data['args']['titleFilterContent']) > 0) {
        if ($post_data['args']['titleFilterOperation'] == '$equals') {
            $filters['$title'] = $post_data['args']['titleFilterContent'];
        } else {
            $filters['$title'] = json_encode([$post_data['args']['titleFilterOperation'] => $post_data['args']['titleFilterContent']]);
        }
    }

    if (isset($post_data['args']['timestampUpdatedFilterContent']) && strlen($post_data['args']['timestampUpdatedFilterContent']) > 0) {
        $filters['$timestampUpdated'] = json_encode([$post_data['args']['timestampUpdatedFilterOperation'] => $post_data['args']['timestampUpdatedFilterContent']]);
    }

    if (isset($post_data['args']['timestampPublishedFilterContent']) && strlen($post_data['args']['timestampPublishedFilterContent']) > 0) {
        $filters['$timestampPublished'] = json_encode([$post_data['args']['timestampPublishedFilterOperation'] => $post_data['args']['timestampPublishedFilterContent']]);
    }
    $body['filters'] = json_encode($filters);
    //requesting remote API
    $client = new GuzzleHttp\Client();

    try {

        $resp = $client->request('GET', $query_str, [
            'headers' => ['Authorization' => $post_data['args']['apiKey']],
            'query' => $body
        ]);

        $responseBody = $resp->getBody()->getContents();
        $rawBody = json_decode($resp->getBody());

        $all_data[] = $rawBody;
        if ($response->getStatusCode() == '200') {
            $result['callback'] = 'success';
            $result['contextWrites']['to'] = is_array($all_data) ? $all_data : json_decode($all_data);
        } else {
            $result['callback'] = 'error';
            $result['contextWrites']['to']['status_code'] = 'API_ERROR';
            $result['contextWrites']['to']['status_msg'] = is_array($responseBody) ? $responseBody : json_decode($responseBody);
        }

    } catch (\GuzzleHttp\Exception\ClientException $exception) {
        $responseBody = $exception->getResponse()->getReasonPhrase();
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = 'API_ERROR';
        $result['contextWrites']['to']['status_msg'] = $responseBody;

    } catch (GuzzleHttp\Exception\ServerException $exception) {

        $responseBody = $exception->getResponse()->getBody(true);
        $result['callback'] = 'error';
        $result['contextWrites']['to'] = json_decode($responseBody);

    } catch (GuzzleHttp\Exception\BadResponseException $exception) {

        $responseBody = $exception->getResponse()->getBody(true);
        $result['callback'] = 'error';
        $result['contextWrites']['to'] = json_decode($responseBody);

    }


    return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);

});