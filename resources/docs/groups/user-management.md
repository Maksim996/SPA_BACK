# User management


## Display a listing of the resource.




> Example request:

```bash
curl -X GET \
    -G "http://127.0.0.1:8000/api/director" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/director"
);

let headers = {
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




> Example request:

```bash
curl -X POST \
    "http://127.0.0.1:8000/api/director/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/director/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### Request
<small class="badge badge-black">POST</small>
 **`api/director/create`**



## Get user data




> Example request:

```bash
curl -X GET \
    -G "http://127.0.0.1:8000/api/director/eos" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/director/eos"
);

let headers = {
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




> Example request:

```bash
curl -X PUT \
    "http://127.0.0.1:8000/api/director/nihil" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"first_name":"est","second_name":"accusantium","patronymic":"quod","birthday":"2020-07-23T21:12:51+0300","sex":false,"phone":"provident","additional_phone":{},"passport":"odio","inn_code":"omnis","image":{}}'

```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/director/nihil"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "first_name": "est",
    "second_name": "accusantium",
    "patronymic": "quod",
    "birthday": "2020-07-23T21:12:51+0300",
    "sex": false,
    "phone": "provident",
    "additional_phone": {},
    "passport": "odio",
    "inn_code": "omnis",
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
    




