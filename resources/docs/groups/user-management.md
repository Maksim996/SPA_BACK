# User management


## Display profile the authenticated user.

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "http://127.0.0.1:8000/api/show" \
    -H "Authorization: Bearer Vedg134PEcha8Df6vaZk56b" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/show"
);

let headers = {
    "Authorization": "Bearer Vedg134PEcha8Df6vaZk56b",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### Request
<small class="badge badge-green">GET</small>
 **`api/show`**



## Display a listing of the resource.

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "http://127.0.0.1:8000/api/director" \
    -H "Authorization: Bearer kD3h4abfP6vcd1g68ZEaeV5" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/director"
);

let headers = {
    "Authorization": "Bearer kD3h4abfP6vcd1g68ZEaeV5",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### Request
<small class="badge badge-green">GET</small>
 **`api/director`**



## Create User with role Director

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X POST \
    "http://127.0.0.1:8000/api/director/create" \
    -H "Authorization: Bearer hfv3eD6agEbkZ45aVc6P81d" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"first_name":"minus","second_name":"ut","patronymic":"aut","email":"ratione","birthday":"fugiat","sex":true,"phone":"ab","additional_phone":"officia","passport":"qui","inn_code":"est","image":"voluptatem","description":"aut"}'

```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/director/create"
);

let headers = {
    "Authorization": "Bearer hfv3eD6agEbkZ45aVc6P81d",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "first_name": "minus",
    "second_name": "ut",
    "patronymic": "aut",
    "email": "ratione",
    "birthday": "fugiat",
    "sex": true,
    "phone": "ab",
    "additional_phone": "officia",
    "passport": "qui",
    "inn_code": "est",
    "image": "voluptatem",
    "description": "aut"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### Request
<small class="badge badge-black">POST</small>
 **`api/director/create`**

<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<code><b>first_name</b></code>&nbsp; <small>string</small>     <br>
    

<code><b>second_name</b></code>&nbsp; <small>string</small>     <br>
    

<code><b>patronymic</b></code>&nbsp; <small>string</small>     <br>
    

<code><b>email</b></code>&nbsp; <small>email</small>     <br>
    email@email.com

<code><b>birthday</b></code>&nbsp; <small>date_format:d.m.Y</small>     <br>
    

<code><b>sex</b></code>&nbsp; <small>boolean</small>     <br>
    Example 1 or 0

<code><b>phone</b></code>&nbsp; <small>string</small>     <br>
    Length 10 chars

<code><b>additional_phone</b></code>&nbsp; <small>string</small>         <i>optional</i>    <br>
    Length 10 chars

<code><b>passport</b></code>&nbsp; <small>string</small>     <br>
    Length 9 chars

<code><b>inn_code</b></code>&nbsp; <small>sting</small>     <br>
    Length 10 chars !int

<code><b>image</b></code>&nbsp; <small>string</small>         <i>optional</i>    <br>
    

<code><b>description</b></code>&nbsp; <small>string</small>         <i>optional</i>    <br>
    



## Get user data

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "http://127.0.0.1:8000/api/director/nisi" \
    -H "Authorization: Bearer v6bfgcPaeaZ1k86h5d4VE3D" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/director/nisi"
);

let headers = {
    "Authorization": "Bearer v6bfgcPaeaZ1k86h5d4VE3D",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### Request
<small class="badge badge-green">GET</small>
 **`api/director/{id}`**

<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<code><b>id</b></code>&nbsp;      <br>
    The ID of the user.



## Update user with role director

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X PUT \
    "http://127.0.0.1:8000/api/director/assumenda" \
    -H "Authorization: Bearer P3c6ghdb4VaD5Zev1E8fk6a" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"first_name":"excepturi","second_name":"et","patronymic":"libero","birthday":"2020-07-25T17:54:45+0300","sex":false,"phone":"fuga","additional_phone":{},"passport":"velit","inn_code":"labore","image":{}}'

```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/director/assumenda"
);

let headers = {
    "Authorization": "Bearer P3c6ghdb4VaD5Zev1E8fk6a",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "first_name": "excepturi",
    "second_name": "et",
    "patronymic": "libero",
    "birthday": "2020-07-25T17:54:45+0300",
    "sex": false,
    "phone": "fuga",
    "additional_phone": {},
    "passport": "velit",
    "inn_code": "labore",
    "image": {}
}

fetch(url, {
    method: "PUT",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "message": "User updated successfully"
}
```

### Request
<small class="badge badge-darkblue">PUT</small>
 **`api/director/{id}`**

<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<code><b>id</b></code>&nbsp;      <br>
    The ID of the User

<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<code><b>first_name</b></code>&nbsp; <small>string</small>     <br>
    

<code><b>second_name</b></code>&nbsp; <small>string</small>     <br>
    

<code><b>patronymic</b></code>&nbsp; <small>string</small>     <br>
    

<code><b>birthday</b></code>&nbsp; <small>string</small>     <br>
    The value must be a valid date.

<code><b>sex</b></code>&nbsp; <small>boolean</small>     <br>
    

<code><b>phone</b></code>&nbsp; <small>string</small>     <br>
    

<code><b>additional_phone</b></code>&nbsp; <small>string</small>         <i>optional</i>    <br>
    

<code><b>passport</b></code>&nbsp; <small>string</small>     <br>
    

<code><b>inn_code</b></code>&nbsp; <small>string</small>     <br>
    

<code><b>image</b></code>&nbsp; <small>string</small>         <i>optional</i>    <br>
    




