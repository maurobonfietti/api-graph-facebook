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

    public static function getUserFullInfo($request, $response, $args)
    {
        $fb = self::config();

        try {
            $name = $request->getAttribute('name');
            $fields = "fields=id,name,first_name,last_name,age_range,birthday,context,cover,currency,devices,education,email,favorite_athletes,favorite_teams,gender,hometown,inspirational_people,install_type,installed,interested_in,link,locale,location,languages,meeting_for,middle_name,name_format,payment_pricepoints,political,public_key,quotes,relationship_status,religion,security_settings,significant_other,sports,test_group,third_party_id,timezone,updated_time,verified,video_upload_limits,viewer_can_send_gift,website,work,accounts,achievements";
            $facebookResponse = $fb->get(sprintf('/%s?%s', $name, $fields));
        } catch (Facebook\Exceptions\FacebookResponseException $e) {
            echo 'Graph returned an error: '.$e->getMessage();
            exit;
        } catch (Facebook\Exceptions\FacebookSDKException $e) {
            echo 'Facebook SDK returned an error: '.$e->getMessage();
            exit;
        }

        return $facebookResponse;
    }

    public static function getPageFullInfo($request, $response, $args)
    {
        $fb = self::config();

        try {
            $url = sprintf('/%s?fields=id,name,about,likes,link', $request->getAttribute('name'));
            $facebookResponse = $fb->get($url);
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
