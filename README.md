# test-symfony-api-djegbakokora

Test for back-end developer candidates

## Goal to achieve for this test

1. Build a JWT Authentication API
2. Build an authenticated parcel tracking API
3. Bonus, add a nice [documentation](https://www.openapis.org/) with OpenAPI specification in mind.

This project could be forked on GitHub.
When you have finished the test, make a pull request from your branch to the `main` branch of KeyOpsTech's repository.

All dependencies listed bellow are required :

* `"symfony/symfony": "^5.*"`
* `"lexik/jwt-authentication-bundle": "*"` Not mandatory but highly recommended

## Step 1 // JWT Authentification API

This API should return a JWT if you provide a valid POST request on `/api/login_check`.
This step will be tested by running a command like this one in the terminal or in [Postman](https://www.postman.com) :

```
curl -X POST -d 'username=panda' \
             -d 'password=password' \
             http://localhost:8080/api/login_check
```

The token from the successful login can now be used as the “Authorization” header for requesting secure (auth protected) endpoints.

### Step 2 // Authenticated Tracking API

This API should return parcel information regarding the id parameter in the URL and should be auth protected.
A valid GET request on `/api/parcels/{id}` should return basic parcel information for tracking in JSON.

```
curl -i http://localhost:8080/api/parcels/18292e08-953f-470f-beba-06daa24c0cc3 -H "Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJhZG1pbiI6dHJ1ZSwidXNlcm5hbWUiOiJwYW5kYSIsImV4cCI6MTU2NTE5OTM3OX0.hHPuj-YK9VuexU7vS7TBv0QUYa6CD3HWlZK_3ISxF0Y"

```

### Bonus // Documentation with OpenAPI specification in mind

The two APIs `/api/login_check` & `/api/parcels/{id}` should be documented.

All other improvement are welcome and free to be requested with an extra pull-request.

Good luck Kokora.
