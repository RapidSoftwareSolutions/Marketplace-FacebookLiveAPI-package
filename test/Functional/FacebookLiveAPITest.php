<?php

namespace Test\Functional;

require_once __DIR__ . '/../../src/Models/paginationClass.php';
require_once __DIR__ . '/../../src/Models/normalizeJson.php';

class FacebookLiveAPITest extends BaseTestCase {
    
    protected $token = 'EAAWzJ0aa2GsBAPfZCRTGSUot9tbdevrsZCRDrdAGa6eV1wxcR1qfl60leRx1ObCnTdojmuy991gPYSxstHLudZA5dqFKD2asKF5ZA3o06o3oQmDC9G4DI8RKqzLttVeWesS7ar1PvdBr4f4hECWnV3z73xzClh4TmlHq1q66z9CjAa2AutKa';
    
    public function testCreateLiveVideo() {
        
        $var = '{
                        "args": {
                                "accessToken": "EAAWzJ0aa2GsBAKOa1gdqHWIFcoLtRrhzqYlq78ZA3iIrEl0dGQBkqA7e1BgSauGG2KcJLZBJ4OxAN96Fn0PZC0kt852i29bhcfMWgsd0bhjvNfWZAyHWz8iv9goaUQLgiNyDEG9dqOTZCvGutZClnz2lZAhE8MqZCZAlnAdV113yhI03ZAOzF9Soet",
                                "edge": "324155744616895",
                                "title": "New video"
                        }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/FacebookLiveAPI/createLiveVideo', $post_data);
        
        $videoId = json_decode($response->getBody())->contextWrites->to->id;
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
        
        return $videoId;
    }
    
    /**
     * @depends testCreateLiveVideo
     */
    public function testGetLiveVideo($videoId) {
        
        $var = '{
                        "args": {
                                "accessToken": "'.$this->token.'",
                                "liveVideoId": "'.$videoId.'"
                        }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/FacebookLiveAPI/getLiveVideo', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);

    }
    
    /**
     * @depends testCreateLiveVideo
     */
    public function testUpdateLiveVideo($videoId) {
        
        $var = '{
                        "args": {
                                "accessToken": "'.$this->token.'",
                                "liveVideoId": "'.$videoId.'",
                                "title": "New video updated"
                        }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/FacebookLiveAPI/updateLiveVideo', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    /**
     * @depends testCreateLiveVideo
     */
    public function testGetLiveVideoLikes($videoId) {
        
        $var = '{
                        "args": {
                                "accessToken": "'.$this->token.'",
                                "liveVideoId": "'.$videoId.'"
                        }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/FacebookLiveAPI/getLiveVideoLikes', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    /**
     * @depends testCreateLiveVideo
     */
    public function testGetLiveVideoComments($videoId) {
        
        $var = '{
                        "args": {
                                "accessToken": "'.$this->token.'",
                                "liveVideoId": "'.$videoId.'"
                        }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/FacebookLiveAPI/getLiveVideoComments', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    /**
     * @depends testCreateLiveVideo
     */
    public function testGetLiveVideoErrors($videoId) {
        
        $var = '{
                        "args": {
                                "accessToken": "'.$this->token.'",
                                "liveVideoId": "'.$videoId.'"
                        }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/FacebookLiveAPI/getLiveVideoErrors', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    /**
     * @depends testCreateLiveVideo
     */
    public function testGetLiveVideoReactions($videoId) {
        
        $var = '{
                        "args": {
                                "accessToken": "'.$this->token.'",
                                "liveVideoId": "'.$videoId.'"
                        }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/FacebookLiveAPI/getLiveVideoErrors', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    /**
     * @depends testCreateLiveVideo
     */
    public function testDeleteLiveVideo($videoId) {
        
        $var = '{
                        "args": {
                                "accessToken": "'.$this->token.'",
                                "liveVideoId": "'.$videoId.'"
                        }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/FacebookLiveAPI/deleteLiveVideo', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }

}
