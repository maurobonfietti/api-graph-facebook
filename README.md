# API GRAPH FACEBOOK

It's a API services to retrieve the profile of one facebook user, using the Facebook API Graph.


## HOW TO INSTALL:

Download the source code and then execute:

```
$ git clone https://github.com/maurobonfietti/api-graph-facebook.git
$ cd api-graph-facebook/
$ cp .env.example .env
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
***


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
***


## RUN TESTS:

Go to the root path of the project, and then run all tests with phpunit:

```
$ cd api-graph-facebook/
$ phpunit
PHPUnit 5.5.4 by Sebastian Bergmann and contributors.

.......                                                             7 / 7 (100%)

Time: 2.44 seconds, Memory: 4.00MB

OK (7 tests, 29 assertions)

```


## OAUTH ACCESS TOKEN:

Read how to fix the error: "Graph returned an error: Invalid OAuth access token".


### IMPORTANT NOTE:

For security reasons, I do not publish my FACEBOOK_APP_ID and FACEBOOK_APP_SECRET data on git.

Therefore, if you want to use this service, you will need to complete with your own valid data.
In order to do this, you need to register in Facebook developers website: https://developers.facebook.com/apps.

- So, first get your App Id (and App Secret Key).
- Then, copy `.env.example` file to `.env`:
- Edit and complete your config file: `.env`:

```
FACEBOOK_APP_ID = '{YOUR-FB-APP-ID}'
FACEBOOK_APP_SECRET = '{YOUR-FB-APP-SECRET}'
FACEBOOK_APP_VERSION = 'v2.9'
```


## WHAT'S NEXT:

Coming soon (maybe -depending on my work time and family:-), I'll add more useful features, using the Facebook API Graph.

You can read more information about this API Documentation, in Facebook for Developers website: https://developers.facebook.com/docs/
