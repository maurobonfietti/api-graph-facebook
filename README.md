# API GRAPH FACEBOOK
It is a API services to retrieves the profile of one facebook user, using the Facebook API Graph.


## HOW TO USE:

Download the source code and then run from the cli:

```
git clone https://github.com/maurobonfietti/api-graph-facebook.git
cd api-graph-facebook/
composer install
composer start
curl localhost:8080/123
```


## REQUEST EXAMPLE:

GET localhost:8080/1000

Response:
STATUS 200
```
{
  "id": "1000",
  "first_name": "Nisha",
  "last_name": "Nagarkatti-Gude"
}
```


## TESTS: TODO :-)


### NOTE:
For security reasons, I do not publish my app_id and app_secret data in Git.
Therefore, in order to use this service, you will need to complete with your own valid data: 'app_id', 'app_secret' and 'default_access_token'.
In order to do this, you need to register in Facebook developers website: https://developers.facebook.com/apps
So, first get your App Id (and secret key). Then, edit and complete the config file: "src/facebook.php".

### TODO: GET ACCESS TOKENS.
Generate securely a valid user access token.
More info: https://developers.facebook.com/docs/facebook-login/access-tokens/

Coming soon, I'll add more useful features, using the Facebook API Graph.
You can read more information about this API Documentation, in Facebook for Developers website: https://developers.facebook.com/docs/
