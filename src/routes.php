<?php
$routes = [
    'getLiveVideo',
    'createLiveVideo',
    'updateLiveVideo',
    'deleteLiveVideo',
    'getLiveVideoLikes',
    'getLiveVideoComments',
    'getLiveVideoErrors',
    'getLiveVideoReactions',
    'metadata'
];
foreach($routes as $file) {
    require __DIR__ . '/../src/routes/'.$file.'.php';
}

