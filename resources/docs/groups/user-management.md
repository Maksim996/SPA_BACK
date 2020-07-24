# User management


## Display a listing of the resource.

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "http://127.0.0.1:8000/api/director" \
    -H "Authorization: Bearer 8h36VkebPgd5cZE4D6av1fa" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/director"
);

let headers = {
    "Authorization": "Bearer 8h36VkebPgd5cZE4D6av1fa",
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
    -H "Authorization: Bearer aefP4vd3Za5g6VkD6c1Ebh8" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"first_name":"voluptatem","second_name":"debitis","patronymic":"similique","email":"optio","birthday":"qui","sex":true,"phone":"cumque","additional_phone":"qui","passport":"optio","inn_code":"asperiores","image":"et","description":"alias"}'

```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/director/create"
);

let headers = {
    "Authorization": "Bearer aefP4vd3Za5g6VkD6c1Ebh8",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "first_name": "voluptatem",
    "second_name": "debitis",
    "patronymic": "similique",
    "email": "optio",
    "birthday": "qui",
    "sex": true,
    "phone": "cumque",
    "additional_phone": "qui",
    "passport": "optio",
    "inn_code": "asperiores",
    "image": "et",
    "description": "alias"
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
    -G "http://127.0.0.1:8000/api/director/eligendi" \
    -H "Authorization: Bearer 46gv3f8bDPdZa56ae1kcVEh" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/director/eligendi"
);

let headers = {
    "Authorization": "Bearer 46gv3f8bDPdZa56ae1kcVEh",
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
    "http://127.0.0.1:8000/api/director/omnis" \
    -H "Authorization: Bearer baZ84VcPehEg6kfDd153av6" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"first_name":"quasi","second_name":"assumenda","patronymic":"rerum","birthday":"2020-07-24T14:21:42+0300","sex":false,"phone":"minus","additional_phone":{},"passport":"occaecati","inn_code":"quo","image":{}}'

```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/director/omnis"
);

let headers = {
    "Authorization": "Bearer baZ84VcPehEg6kfDd153av6",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "first_name": "quasi",
    "second_name": "assumenda",
    "patronymic": "rerum",
    "birthday": "2020-07-24T14:21:42+0300",
    "sex": false,
    "phone": "minus",
    "additional_phone": {},
    "passport": "occaecati",
    "inn_code": "quo",
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
    




