# API GRAPH FACEBOOK
It is a API services to retrieves the profile of one facebook user, using the Facebook API Graph.


## HOW TO INSTALL:

Download the source code and then run from the cli:

```
$ git clone https://github.com/maurobonfietti/api-graph-facebook.git
$ cd api-graph-facebook/
$ composer install
$ composer start
$ curl http://localhost:8080/123
$ phpunit
```


## REQUEST EXAMPLE:

GET http://localhost:8080/1000

Response:
STATUS 200
```
{
  "id": "1000",
  "first_name": "Nisha",
  "last_name": "Nagarkatti-Gude"
}
```

## HOW TO USE:

- Get facebook profile from user '1234':
```
$ curl http://localhost:8080/1234
```
===

- Get full information about user profile '1234':
```
$ curl http://localhost:8080/getuserfullinfo/1234
```
===

- Get information about a facebook fan page:
```
$ curl http://localhost:8080/getpagefullinfo/mercadolibre
```
===


## RUN TESTS:

Go to the root path of the project, and then run all tests with phpunit:

```
$ cd api-graph-facebook/
$ phpunit
```


### NOTE:
For security reasons, I do not publish my app_id and app_secret data in Git.
Therefore, in order to use this service, you will need to complete with your own valid data: 'app_id', 'app_secret' and 'default_access_token'.
In order to do this, you need to register in Facebook developers website: https://developers.facebook.com/apps.
So, first get your App Id (and secret key). Then, edit and complete the config file: "src/facebook.php".

### TODO/PENDING: GET ACCESS TOKENS.
Generate securely a valid user access token.
More info: https://developers.facebook.com/docs/facebook-login/access-tokens/

Coming soon, I'll add more useful features, using the Facebook API Graph.
You can read more information about this API Documentation, in Facebook for Developers website: https://developers.facebook.com/docs/
