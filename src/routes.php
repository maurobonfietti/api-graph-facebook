<?php

$app->get('/[{name}]', function ($request, $response, $args) {
    $name = $request->getAttribute('name');
    if (!$name) {
        return $this->renderer->render($response, 'index.phtml', $args);
    }

    $fb = new Facebook\Facebook([
        'default_graph_version' => 'v2.8',
        'app_id' => 'X',
        'app_secret' => 'Y',
        'default_access_token' => 'Z',
    ]);

    try {
        $response = $fb->get(sprintf("/%s?fields=id,first_name,last_name", $name));
    } catch (Facebook\Exceptions\FacebookResponseException $e) {
        echo 'Graph returned an error: '.$e->getMessage();
        exit;
    } catch (Facebook\Exceptions\FacebookSDKException $e) {
        echo 'Facebook SDK returned an error: '.$e->getMessage();
        exit;
    }

    return $response->getBody();
});
