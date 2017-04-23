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
$ curl http://localhost:8080/users/1234
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
PHPUnit 5.5.4 by Sebastian Bergmann and contributors.

....                                                                4 / 4 (100%)

Time: 1.21 seconds, Memory: 4.00MB

OK (4 tests, 17 assertions)

```


## OAUTH ACCESS TOKEN:

Read how to fix the error: "Graph returned an error: Invalid OAuth access token".


### IMPORTANT NOTE:

For security reasons, I do not publish my app_id and app_secret data in Git.
Therefore, in order to use this service, you will need to complete with your own valid data: 'app_id', 'app_secret' and 'default_access_token'.
In order to do this, you need to register in Facebook developers website: https://developers.facebook.com/apps.

- So, first get your App Id (and App Secret Key).
- Then, edit and complete the config file: "src/settings.php":

```
    // Configure a Facebook Api Graph Parameters.
    // Get your app_id and app_secret in: https://developers.facebook.com/apps.
    'facebook' => [
        'app_id' => '{app-id}',
        'app_secret' => '{app-secret}',
    ],
```


## NEXT:

Coming soon, I'll add more useful features, using the Facebook API Graph.
You can read more information about this API Documentation, in Facebook for Developers website: https://developers.facebook.com/docs/
