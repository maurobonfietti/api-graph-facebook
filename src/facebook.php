<?php

class facebook
{
    /**
     * Configure a Facebook App Parameters.
     * Get your app_id and app_secret in: https://developers.facebook.com/apps.
     *
     * @return \Facebook\Facebook
     */
    private static function config()
    {
        $config = new Facebook\Facebook([
            'default_graph_version' => 'v2.8',
            'app_id' => 'X',
            'app_secret' => 'Y',
            'default_access_token' => 'Z',
        ]);

        return $config;
    }

    public static function getUser($request, $response, $args)
    {
        $fb = self::config();

        try {
            $name = $request->getAttribute('name');
            $facebookResponse = $fb->get(sprintf('/%s?fields=id,first_name,last_name', $name));
        } catch (Facebook\Exceptions\FacebookResponseException $e) {
            echo 'Graph returned an error: '.$e->getMessage();
            exit;
        } catch (Facebook\Exceptions\FacebookSDKException $e) {
            echo 'Facebook SDK returned an error: '.$e->getMessage();
            exit;
        }

        return $facebookResponse;
    }

    public static function getFanPage($request, $response, $args)
    {
        $fb = self::config();

        try {
            $name = $request->getAttribute('name');
            $facebookResponse = $fb->get($name);
        } catch (Facebook\Exceptions\FacebookResponseException $e) {
            echo 'Graph returned an error: '.$e->getMessage();
            exit;
        } catch (Facebook\Exceptions\FacebookSDKException $e) {
            echo 'Facebook SDK returned an error: '.$e->getMessage();
            exit;
        }

        return $facebookResponse;
    }
}
