<?php

$app->post('/api/FacebookLiveAPI/createLiveVideo', function ($request, $response, $args) {
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
    
    $error = [];
    if(empty($post_data['args']['accessToken'])) {
        $error[] = 'accessToken cannot be empty';
    }
    if(empty($post_data['args']['edge'])) { 
        $error[] = 'edge cannot be empty';
    }
    
    if(!empty($error)) {
        $result['callback'] = 'error';
        $result['contextWrites']['to'] = implode(',', $error);
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);
    }
    
    $query_str = $settings['api_url'] . '/' . $post_data['args']['edge'] . '/live_videos';
    
    $query['access_token'] = $post_data['args']['accessToken'];
    
    $body = [];
    if(!empty($post_data['args']['contentTags'])) {
        $body['content_tags'] = $post_data['args']['contentTags'];
    }
    if(!empty($post_data['args']['description'])) {
        $body['description'] = $post_data['args']['description'];
    }
    if(!empty($post_data['args']['isAudioOnly'])) {
        $body['is_audio_only'] = $post_data['args']['isAudioOnly'];
    }
    if(!empty($post_data['args']['plannedStartTime'])) {
        $body['planned_start_time'] = $post_data['args']['plannedStartTime'];
    }
    if(!empty($post_data['args']['privacy'])) {
        $body['privacy'] = $post_data['args']['privacy'];
    }
    if(!empty($post_data['args']['published'])) {
        $body['published'] = $post_data['args']['published'];
    }
    if(!empty($post_data['args']['saveVod'])) {
        $body['save_vod'] = $post_data['args']['saveVod'];
    }
    if(!empty($post_data['args']['status'])) {
        $body['status'] = $post_data['args']['status'];
    }
    if(!empty($post_data['args']['stopOnDeleteStream'])) {
        $body['stop_on_delete_stream'] = $post_data['args']['stopOnDeleteStream'];
    }
    if(!empty($post_data['args']['streamType'])) {
        $body['stream_type'] = $post_data['args']['streamType'];
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
            $result['contextWrites']['to'] = is_array($responseBody) ? $responseBody : json_decode($responseBody);
        }

    } catch (\GuzzleHttp\Exception\ClientException $exception) {

        $responseBody = $exception->getResponse()->getBody();
        $result['callback'] = 'error';
        $result['contextWrites']['to'] = json_decode($responseBody);

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
