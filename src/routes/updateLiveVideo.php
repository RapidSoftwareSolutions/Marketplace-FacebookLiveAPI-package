<?php

$app->post('/api/FacebookLiveAPI/updateLiveVideo', function ($request, $response, $args) {
    $settings =  $this->settings;
    
    $data = $request->getBody();

    if($data=='') {
        $post_data = $request->getParsedBody();
    } else {
        $toJson = $this->toJson;
        $data = $toJson->normalizeJson($data); 
        $data = str_replace('\"', '"', $data);
        $post_data = json_decode($data, true);
    }
    
    if(json_last_error() != 0) {
        $error[] = json_last_error_msg() . '. Incorrect input JSON. Please, check fields with JSON input.';
    }
    
    if(!empty($error)) {
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = 'JSON_VALIDATION';
        $result['contextWrites']['to']['status_msg'] = implode(',', $error);
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);
    }
    
    $error = [];
    if(empty($post_data['args']['accessToken'])) {
        $error[] = 'accessToken';
    }
    if(empty($post_data['args']['liveVideoId'])) { 
        $error[] = 'liveVideoId';
    }
    
    if(!empty($error)) {
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = "REQUIRED_FIELDS";
        $result['contextWrites']['to']['status_msg'] = "Please, check and fill in required fields.";
        $result['contextWrites']['to']['fields'] = $error;
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);
    }
    
    $query_str = $settings['api_url'] . '/' . $post_data['args']['liveVideoId'];
    
    $query['access_token'] = $post_data['args']['accessToken'];
    
    $body = [];
    if(!empty($post_data['args']['contentTags'])) {
        $body['content_tags'] = $post_data['args']['contentTags'];
    }
    if(!empty($post_data['args']['copyrightsViolationDialogState'])) {
        $body['copyrights_violation_dialog_state'] = $post_data['args']['copyrightsViolationDialogState'];
    }
    if(!empty($post_data['args']['description'])) {
        $body['description'] = $post_data['args']['description'];
    }
    if(!empty($post_data['args']['disturbing'])) {
        $body['disturbing'] = $post_data['args']['disturbing'];
    }
    if(!empty($post_data['args']['embeddable'])) {
        $body['embeddable'] = $post_data['args']['embeddable'];
    }
    if(!empty($post_data['args']['endLiveVideo'])) {
        $body['end_live_video'] = $post_data['args']['endLiveVideo'];
    }
    if(!empty($post_data['args']['isAudioOnly'])) {
        $body['is_audio_only'] = $post_data['args']['isAudioOnly'];
    }
    if(!empty($post_data['args']['place'])) {
        $body['place'] = $post_data['args']['place'];
    }
    if(!empty($post_data['args']['privacy'])) {
        $body['privacy'] = $post_data['args']['privacy'];
    }
    if(!empty($post_data['args']['published'])) {
        $body['published'] = $post_data['args']['published'];
    }
    if(!empty($post_data['args']['sponsorId'])) {
        $body['sponsor_id'] = $post_data['args']['sponsorId'];
    }
    if(!empty($post_data['args']['status'])) {
        $body['status'] = $post_data['args']['status'];
    }
    if(!empty($post_data['args']['streamType'])) {
        $body['stream_type'] = $post_data['args']['streamType'];
    }
    if(!empty($post_data['args']['tags'])) {
        $body['tags'] = $post_data['args']['tags'];
    }
    if(!empty($post_data['args']['targeting'])) {
        $body['targeting'] = $post_data['args']['targeting'];
    }
    if(!empty($post_data['args']['title'])) {
        $body['title'] = $post_data['args']['title'];
    }
    
    $client = $this->httpClient;

    try {

        $resp = $client->post( $query_str, 
            [
                'query' => $query,
                'json' => $body
            ]);
        $responseBody = $resp->getBody()->getContents();
  
        if($resp->getStatusCode() == '200') {
            $result['callback'] = 'success';
            $result['contextWrites']['to'] = is_array($responseBody) ? $responseBody : json_decode($responseBody);
        } else {
            $result['callback'] = 'error';
            $result['contextWrites']['to']['status_code'] = 'API_ERROR';
            $result['contextWrites']['to']['status_msg'] = is_array($responseBody) ? $responseBody : json_decode($responseBody);
        }

    } catch (\GuzzleHttp\Exception\ClientException $exception) {

        $responseBody = $exception->getResponse()->getBody()->getContents();
        if(empty(json_decode($responseBody))) {
            $out = $responseBody;
        } else {
            $out = json_decode($responseBody);
        }
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = 'API_ERROR';
        $result['contextWrites']['to']['status_msg'] = $out;

    } catch (GuzzleHttp\Exception\ServerException $exception) {

        $responseBody = $exception->getResponse()->getBody()->getContents();
        if(empty(json_decode($responseBody))) {
            $out = $responseBody;
        } else {
            $out = json_decode($responseBody);
        }
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = 'API_ERROR';
        $result['contextWrites']['to']['status_msg'] = $out;

    } catch (GuzzleHttp\Exception\ConnectException $exception) {

        $responseBody = $exception->getResponse()->getBody(true);
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = 'INTERNAL_PACKAGE_ERROR';
        $result['contextWrites']['to']['status_msg'] = 'Something went wrong inside the package.';

    }
    
    return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);
});
