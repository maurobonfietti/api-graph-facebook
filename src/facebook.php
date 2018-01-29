<?php

namespace App;

/**
 * Class facebook to use the Facebook API Graph.
 */
class facebook
{
    /**
     * Get profile of one Facebook user.
     *
     * @param Request $request
     * @param \Facebook\Facebook $fb
     * @return \Facebook\FacebookResponse
     */
    public static function getUser($request, $fb)
    {
        $name = $request->getAttribute('name');
        $url = sprintf('/%s?fields=id,first_name,last_name', $name);

        return $fb->get($url, $fb->getApp()->getAccessToken());
    }

    /**
     * Get info about a fan page Facebook.
     *
     * @param Request $request
     * @param Facebook\Facebook $fb
     * @return Facebook\FacebookResponse
     */
    public static function getPageFullInfo($request, $fb)
    {
        $name = $request->getAttribute('name');
        $url = sprintf('/%s?fields=id,name,about,likes,link', $name);

        return $fb->get($url, $fb->getApp()->getAccessToken());
    }
}
