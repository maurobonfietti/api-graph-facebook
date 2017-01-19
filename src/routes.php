<?php
// Routes

$app->get('/[{name}]', function ($request, $response, $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");

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
        $response = $fb->get("/$name?fields=id,first_name,last_name");
    } catch (Facebook\Exceptions\FacebookResponseException $e) {
        echo 'Graph returned an error: ' . $e->getMessage();
        exit;
    } catch (Facebook\Exceptions\FacebookSDKException $e) {
        echo 'Facebook SDK returned an error: ' . $e->getMessage();
        exit;
    }

    $user = $response->getGraphUser();

    return json_encode(json_decode($user), JSON_PRETTY_PRINT);

});
