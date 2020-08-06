# User management


## Display profile the authenticated user.

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "http://127.0.0.1:8000/api/user" \
    -H "Authorization: Bearer EbPZahfkVg68v34ace1d5D6" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/user"
);

let headers = {
    "Authorization": "Bearer EbPZahfkVg68v34ace1d5D6",
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
 **`api/user`**



## Display a listing of the user with role Director.

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "http://127.0.0.1:8000/api/director" \
    -H "Authorization: Bearer 4Zfec1PE8avghb665DdVk3a" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/director"
);

let headers = {
    "Authorization": "Bearer 4Zfec1PE8avghb665DdVk3a",
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
    -H "Authorization: Bearer dPDb6k1ZEfeh4gav653aVc8" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"first_name":"quaerat","second_name":"aut","patronymic":"aut","email":"numquam","birthday":"et","sex":true,"phone":"aut","additional_phone":"sit","passport":"tempore","inn_code":"est","image":"ut","description":"magnam"}'

```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/director/create"
);

let headers = {
    "Authorization": "Bearer dPDb6k1ZEfeh4gav653aVc8",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "first_name": "quaerat",
    "second_name": "aut",
    "patronymic": "aut",
    "email": "numquam",
    "birthday": "et",
    "sex": true,
    "phone": "aut",
    "additional_phone": "sit",
    "passport": "tempore",
    "inn_code": "est",
    "image": "ut",
    "description": "magnam"
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
    -G "http://127.0.0.1:8000/api/director/quos" \
    -H "Authorization: Bearer hPc5vdg18E63beZa64kfVaD" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/director/quos"
);

let headers = {
    "Authorization": "Bearer hPc5vdg18E63beZa64kfVaD",
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
    "http://127.0.0.1:8000/api/director/consectetur" \
    -H "Authorization: Bearer DdVP156Eaachgbek6Zvf834" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"first_name":"quas","second_name":"reiciendis","patronymic":"commodi","birthday":"2020-08-05T15:53:51+0300","sex":false,"phone":"reiciendis","additional_phone":{},"passport":"consequatur","inn_code":"animi","image":{}}'

```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/director/consectetur"
);

let headers = {
    "Authorization": "Bearer DdVP156Eaachgbek6Zvf834",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "first_name": "quas",
    "second_name": "reiciendis",
    "patronymic": "commodi",
    "birthday": "2020-08-05T15:53:51+0300",
    "sex": false,
    "phone": "reiciendis",
    "additional_phone": {},
    "passport": "consequatur",
    "inn_code": "animi",
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
    



## Update status user active isn`t active

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X PATCH \
    "http://127.0.0.1:8000/api/director/active/nobis" \
    -H "Authorization: Bearer EbPc35g68vhVfad1Z4kDe6a" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/director/active/nobis"
);

let headers = {
    "Authorization": "Bearer EbPc35g68vhVfad1Z4kDe6a",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "PATCH",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### Request
<small class="badge badge-purple">PATCH</small>
 **`api/director/active/{id}`**

<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<code><b>id</b></code>&nbsp;      <br>
    The ID of the User




