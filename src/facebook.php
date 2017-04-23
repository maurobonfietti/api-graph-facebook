<?php

/**
 * Class facebook to use the Facebook API Graph.
 */
class facebook
{
    public static function getUser($request, $fb)
    {
        try {
            $name = $request->getAttribute('name');
            $url = sprintf('/%s?fields=id,first_name,last_name', $name);
            $facebookResponse = $fb->get($url);
        } catch (Facebook\Exceptions\FacebookResponseException $e) {
            http_response_code($e->getHttpStatusCode());
            echo json_encode($e->getResponseData(), JSON_PRETTY_PRINT);
            exit;
        } catch (Facebook\Exceptions\FacebookSDKException $e) {
            http_response_code($e->getHttpStatusCode());
            echo json_encode($e->getResponseData(), JSON_PRETTY_PRINT);
            exit;
        }

        return $facebookResponse;
    }

//    public static function getUserFullInfo($request, $fb)
//    {
//        try {
//            $fields = 'fields=id,name,first_name,last_name,age_range,birthday,context,cover,currency,devices,education,email,favorite_athletes,favorite_teams,gender,hometown,inspirational_people,install_type,installed,interested_in,link,locale,location,languages,meeting_for,middle_name,name_format,payment_pricepoints,political,public_key,quotes,relationship_status,religion,security_settings,significant_other,sports,test_group,third_party_id,timezone,updated_time,verified,video_upload_limits,viewer_can_send_gift,website,work,accounts,achievements';
//            $url = sprintf('/%s?%s', $request->getAttribute('name'), $fields);
//            $facebookResponse = $fb->get($url);
//        } catch (Facebook\Exceptions\FacebookResponseException $e) {
//            http_response_code($e->getHttpStatusCode());
//            echo json_encode($e->getResponseData(), JSON_PRETTY_PRINT);
//            exit;
//        } catch (Facebook\Exceptions\FacebookSDKException $e) {
//            http_response_code($e->getHttpStatusCode());
//            echo json_encode($e->getResponseData(), JSON_PRETTY_PRINT);
//            exit;
//        }
//
//        return $facebookResponse;
//    }

    public static function getPageFullInfo($request, $fb)
    {
        try {
            $name = $request->getAttribute('name');
            $url = sprintf('/%s?fields=id,name,about,likes,link', $name);
            $facebookResponse = $fb->get($url);
        } catch (Facebook\Exceptions\FacebookResponseException $e) {
            http_response_code($e->getHttpStatusCode());
            echo json_encode($e->getResponseData(), JSON_PRETTY_PRINT);
            exit;
        } catch (Facebook\Exceptions\FacebookSDKException $e) {
            http_response_code($e->getHttpStatusCode());
            echo json_encode($e->getResponseData(), JSON_PRETTY_PRINT);
            exit;
        }

        return $facebookResponse;
    }
}
