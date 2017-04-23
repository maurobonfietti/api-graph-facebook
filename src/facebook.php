<?php

namespace App;

/**
 * Class facebook to use the Facebook API Graph.
 */
class facebook
{
    /**
     * Get response from Facebook API Graph.
     * @param string $url
     * @param \Facebook\Facebook $fb
     * @return \Facebook\FacebookResponse
     */
    public static function getFacebookResponse($url, $fb)
    {
        try {
            return $fb->get($url, $fb->getApp()->getAccessToken());
        } catch (\Facebook\Exceptions\FacebookResponseException $e) {
            return $e;
        } catch (\Facebook\Exceptions\FacebookSDKException $e) {
            return $e;
        }
    }

    /**
     * Get profile of one facebook user.
     *
     * @param Request $request
     * @param \Facebook\Facebook $fb
     * @return \Facebook\FacebookResponse
     */
    public static function getUser($request, $fb)
    {
        $name = $request->getAttribute('name');
        $url = sprintf('/%s?fields=id,first_name,last_name', $name);

        return self::getFacebookResponse($url, $fb);
    }

    /**
     * Get info about a fan page facebook.
     *
     * @param Request $request
     * @param Facebook\Facebook $fb
     * @return Facebook\FacebookResponse
     */
    public static function getPageFullInfo($request, $fb)
    {
        $name = $request->getAttribute('name');
        $url = sprintf('/%s?fields=id,name,about,likes,link', $name);

        return self::getFacebookResponse($url, $fb);
    }
}
