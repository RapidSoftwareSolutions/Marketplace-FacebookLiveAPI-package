<?php

namespace Tests\Functional;

require_once __DIR__ . '/../../src/Models/paginationClass.php';
require_once __DIR__ . '/../../src/Models/normalizeJson.php';

class FacebookLiveAPITest extends BaseTestCase {
    
    protected $token = 'EAAWzJ0aa2GsBAMD2gZAZCGF0IAuZChhWv8L4HTWS6ZAvAyyOLpqpnjTtipyxlgXtQ7jLHkxLfQV6sufcQiqsr8rv9LQbjIajJjmMmhyo9IRIEJ9bkBRkzFZAZC8ZAVyZCrwazjnIzkT14ZBK5yN5fzdtmn5Yd3ZACcIZBKetZB7lOkifm1Kmbz8ypiQy';
    
    public function testCreateLiveVideo() {
        
        $var = '{
                        "args": {
                                "accessToken": "EAAWzJ0aa2GsBAPpLoFG3YuQhfPuzsP4DHeOAt8AtPvRv47wZChqVrvvMOVxqS78DOt6Txa4zG4e9D7uqi9QE2BuEiXpC0ejCtWnOSm0OUG5Qaz9UTH664fQ2ruehNsqrHK4ZA4kTamysS3h3zJSIXTl5qZBRFM29ZA2scKxd7niCGLwzipmA",
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
