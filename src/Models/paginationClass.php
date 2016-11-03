<?php
namespace Models;

Class NextPage {
    protected $all_data = [];
    
    public function page($url, $query) {
        
        if($url) {
            $client = new \GuzzleHttp\Client();

            $resp = $client->get( $url, 
                [
                    'query' => $query
                ]);

            $rawBody = json_decode($resp->getBody());
            $this->all_data = array_merge($this->all_data, $rawBody->data);

            if(isset($rawBody->next)) {
                $this->page($rawBody->next, $query);
            }
        }
        return $this->all_data;
    }    
    
}

