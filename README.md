# API GRAPH FACEBOOK

It's a API services to retrieve the profile of one facebook user, using the Facebook API Graph.


## HOW TO INSTALL:

Download the source code and then execute:

```
$ git clone https://github.com/maurobonfietti/api-graph-facebook.git
$ cd api-graph-facebook/
$ composer install
$ composer start
```


## HOW TO USE:

Requests Examples:

### Get facebook profile from user '1234':
```
$ curl http://localhost:8080/1234
```
Response:
```
Status: 200 OK

{
    "id": "1234",
    "first_name": "Senait",
    "last_name": "Tesfai"
}
```
===


### Get full information about user profile '1234':
```
$ curl http://localhost:8080/users/1234
```
Response:
```
Status: 200 OK

{
    "id": "1234",
    "name": "Senait Tesfai",
    "first_name": "Senait",
    "last_name": "Tesfai",
    "context": {
        "mutual_likes": {
            "data": [],
            "summary": {
                "total_count": 0
            }
        },
        "id": "dXNlcl9jb250ZAXh0OgGQZBhJEsEfUf2L1O5DPpbmzCu3vnoOBOyZB1rZClGl8Gl9aAz3HPiiwnn1vGZCZCQD5VdcuhMdLInL4qCIXtpItJPg6PrD4SPE3E0zLzZCxAaB3bBosZD"
    },
    "cover": {
        "id": "10102509802836791",
        "offset_y": 8,
        "source": "https:\/\/fb-s-d-a.akamaihd.net\/h-ak-xla1\/v\/t1.0-9\/12308286_10102509802836791_4849151805274911326_n.jpg?oh=0458137d6705137083ea4d67716386ed&oe=591C5FF0&__gda__=1493351880_9e5c90064b4d78b2c4c90094349de64b"
    },
    "install_type": "UNKNOWN",
    "installed": false,
    "link": "https:\/\/www.facebook.com\/app_scoped_user_id\/1234\/",
    "name_format": "{first} {last}",
    "test_group": 9,
    "third_party_id": "6thflcOIcFsZbb13Unr7SJvHLsI",
    "updated_time": "2016-12-18T21:45:57+0000",
    "viewer_can_send_gift": false
}
```
===


### Get information about a facebook fan page like 'github':
```
$ curl http://localhost:8080/pages/github
```
Response:
```
Status: 200 OK

{
    "id": "262588213843476",
    "name": "GitHub",
    "about": "GitHub is how people build software.",
    "link": "https:\/\/www.facebook.com\/GitHub\/"
}
```
===


## RUN TESTS:

Go to the root path of the project, and then run all tests with phpunit:

```
$ cd api-graph-facebook/
$ phpunit
```


## OAUTH ACCESS TOKEN:

Read how to fix the error: "Graph returned an error: Invalid OAuth access token".


### IMPORTANT NOTE:

For security reasons, I do not publish my app_id and app_secret data in Git.
Therefore, in order to use this service, you will need to complete with your own valid data: 'app_id', 'app_secret' and 'default_access_token'.
In order to do this, you need to register in Facebook developers website: https://developers.facebook.com/apps.

- So, first get your App Id (and App Secret Key).
- Then, edit and complete the config file: "src/facebook.php":

```
    // Configure the Facebook App Parameters.
    $config = new Facebook\Facebook([
        'default_graph_version' => 'v2.8',
        'app_id' => '{app-id}',
        'app_secret' => '{app-secret}',
        'default_access_token' => '{access-token}',
    ]);
```


### TODO/PENDING: GET ACCESS TOKENS.

Generate securely a valid user access token.
More info: https://developers.facebook.com/docs/facebook-login/access-tokens/


## NEXT:

Coming soon, I'll add more useful features, using the Facebook API Graph.
You can read more information about this API Documentation, in Facebook for Developers website: https://developers.facebook.com/docs/
