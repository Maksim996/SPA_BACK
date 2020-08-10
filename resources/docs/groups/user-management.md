# User management


## Display profile the authenticated user.

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "http://127.0.0.1:8000/api/user" \
    -H "Authorization: Bearer cZfg81k3bPd4eavVh6aE5D6" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/user"
);

let headers = {
    "Authorization": "Bearer cZfg81k3bPd4eavVh6aE5D6",
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


> Example response (200):

```json
{
    "data": {
        "id": 1,
        "role_id": 1,
        "email": "sadmin@gmail.com",
        "first_name": "Admin",
        "second_name": "admin",
        "patronymic": "admin",
        "birthday": "2020-08-10",
        "phone": "+380981211111",
        "additional_phone": null,
        "passport": "123456789",
        "inn_code": "0123456789",
        "sex": 0,
        "image": null
    }
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
    -H "Authorization: Bearer 6V56akc4bEdZePhvf318agD" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/director"
);

let headers = {
    "Authorization": "Bearer 6V56akc4bEdZePhvf318agD",
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


> Example response (200):

```json
{
    "data": [
        {
            "id": 1,
            "email": "sadmin@gmail.com",
            "fullName": "admin Admin admin",
            "phone": "+380981211111",
            "birthday": "2020-08-10"
        },
        {
            "id": 1,
            "email": "sadmin@gmail.com",
            "fullName": "admin Admin admin",
            "phone": "+380981211111",
            "birthday": "2020-08-10"
        }
    ]
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
    -H "Authorization: Bearer gP5akDafbvcE6483hVd6Z1e" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"first_name":"et","second_name":"voluptas","patronymic":"non","email":"johan66@example.org","birthday":"2020-08-10","sex":false,"phone":"facilis","additional_phone":{},"type_passport":false,"passport":"exercitationem","inn_code":"est","image":{}}'

```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/director/create"
);

let headers = {
    "Authorization": "Bearer gP5akDafbvcE6483hVd6Z1e",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "first_name": "et",
    "second_name": "voluptas",
    "patronymic": "non",
    "email": "johan66@example.org",
    "birthday": "2020-08-10",
    "sex": false,
    "phone": "facilis",
    "additional_phone": {},
    "type_passport": false,
    "passport": "exercitationem",
    "inn_code": "est",
    "image": {}
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "message": "User added successfully."
}
```

### Request
<small class="badge badge-black">POST</small>
 **`api/director/create`**

<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<code><b>first_name</b></code>&nbsp; <small>string</small>     <br>
    

<code><b>second_name</b></code>&nbsp; <small>string</small>     <br>
    

<code><b>patronymic</b></code>&nbsp; <small>string</small>     <br>
    

<code><b>email</b></code>&nbsp; <small>string</small>     <br>
    email The value must be a valid email address.

<code><b>birthday</b></code>&nbsp; <small>string</small>     <br>
    The value must be a valid date. The value must be a valid date in the format Y-m-d.

<code><b>sex</b></code>&nbsp; <small>boolean</small>     <br>
    

<code><b>phone</b></code>&nbsp; <small>string</small>     <br>
    

<code><b>additional_phone</b></code>&nbsp; <small>string</small>         <i>optional</i>    <br>
    

<code><b>type_passport</b></code>&nbsp; <small>boolean</small>     <br>
    Example 1 ID-card or 0 old type.

<code><b>passport</b></code>&nbsp; <small>string</small>     <br>
    Max length 9 chars example ID-card 000000001 old type BM000001.

<code><b>inn_code</b></code>&nbsp; <small>string</small>     <br>
    inn_code length digits 10.

<code><b>image</b></code>&nbsp; <small>string</small>         <i>optional</i>    <br>
    



## Get user data

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "http://127.0.0.1:8000/api/director/totam" \
    -H "Authorization: Bearer 61DvfE45g6eVZhaPb8kadc3" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/director/totam"
);

let headers = {
    "Authorization": "Bearer 61DvfE45g6eVZhaPb8kadc3",
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


> Example response (200):

```json
{
    "data": {
        "id": 1,
        "role_id": 1,
        "email": "sadmin@gmail.com",
        "first_name": "Admin",
        "second_name": "admin",
        "patronymic": "admin",
        "birthday": "2020-08-10",
        "phone": "+380981211111",
        "additional_phone": null,
        "passport": "123456789",
        "inn_code": "0123456789",
        "sex": 0,
        "image": null
    }
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
    "http://127.0.0.1:8000/api/director/non" \
    -H "Authorization: Bearer fb46e18Z3dP6Vhca5DgvakE" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"first_name":"libero","second_name":"voluptatum","patronymic":"aut","email":"vidal.emard@example.com","birthday":"2020-08-10","sex":false,"phone":"quia","additional_phone":{},"type_passport":false,"passport":"dolores","inn_code":"et","image":{}}'

```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/director/non"
);

let headers = {
    "Authorization": "Bearer fb46e18Z3dP6Vhca5DgvakE",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "first_name": "libero",
    "second_name": "voluptatum",
    "patronymic": "aut",
    "email": "vidal.emard@example.com",
    "birthday": "2020-08-10",
    "sex": false,
    "phone": "quia",
    "additional_phone": {},
    "type_passport": false,
    "passport": "dolores",
    "inn_code": "et",
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
> Example response (404, user not found):

```json

{
  "message" => "User not found."
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
    

<code><b>email</b></code>&nbsp; <small>string</small>     <br>
    email The value must be a valid email address.

<code><b>birthday</b></code>&nbsp; <small>string</small>     <br>
    The value must be a valid date. The value must be a valid date in the format Y-m-d.

<code><b>sex</b></code>&nbsp; <small>boolean</small>     <br>
    

<code><b>phone</b></code>&nbsp; <small>string</small>     <br>
    

<code><b>additional_phone</b></code>&nbsp; <small>string</small>         <i>optional</i>    <br>
    

<code><b>type_passport</b></code>&nbsp; <small>boolean</small>     <br>
    Example 1 ID-card or 0 old type.

<code><b>passport</b></code>&nbsp; <small>string</small>     <br>
    Max length 9 chars example ID-card 000000001 old type BM000001.

<code><b>inn_code</b></code>&nbsp; <small>string</small>     <br>
    inn_code length digits 10.

<code><b>image</b></code>&nbsp; <small>string</small>         <i>optional</i>    <br>
    



## Update status user active isn`t active

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X PATCH \
    "http://127.0.0.1:8000/api/director/active/sint" \
    -H "Authorization: Bearer 3g1VkZPhe56dv6Db4Eaf8ca" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/director/active/sint"
);

let headers = {
    "Authorization": "Bearer 3g1VkZPhe56dv6Db4Eaf8ca",
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


> Example response (200):

```json
{
    "message": "Status updated."
}
```
> Example response (404, user not found):

```json

{
  "message" => "User not found."
}
```

### Request
<small class="badge badge-purple">PATCH</small>
 **`api/director/active/{id}`**

<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<code><b>id</b></code>&nbsp;      <br>
    The ID of the User




