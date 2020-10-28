---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://127.0.0.1:8000/docs/collection.json)

<!-- END_INFO -->

#User managment


<!-- START_83180541415cea731bd8ed5da527b4db -->
## Admin or assistant login

> Example request:

```bash
curl -X POST \
    "http://127.0.0.1:8000/api/auth/dashbord-login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"admin0@gmail.com","password":"adminadmin"}'

```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/auth/dashbord-login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "admin0@gmail.com",
    "password": "adminadmin"
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
    "success": true,
    "data": {
        "access_token": "1|wMUHbjQOLiFWpAugbsELvWIwxwezIoZlbPtazab2",
        "token_type": "bearer",
        "expires_in": null
    },
    "error": "",
    "code": 200
}
```

### HTTP Request
`POST api/auth/dashbord-login`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `email` | string |  required  | The user's mail.
        `password` | string |  required  | The user's password.
    
<!-- END_83180541415cea731bd8ed5da527b4db -->

<!-- START_dc4e089ea4a5962927de76c073a8e21e -->
## Client login

> Example request:

```bash
curl -X POST \
    "http://127.0.0.1:8000/api/auth/client-login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"phone":"62212121","password":"admin"}'

```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/auth/client-login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "phone": "62212121",
    "password": "admin"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/auth/client-login`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `phone` | string |  required  | The user's mail.
        `password` | string |  required  | The user's password.
    
<!-- END_dc4e089ea4a5962927de76c073a8e21e -->

<!-- START_19ff1b6f8ce19d3c444e9b518e8f7160 -->
## api/auth/logout
<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST \
    "http://127.0.0.1:8000/api/auth/logout" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/auth/logout"
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


> Example response (200):

```json
{
    "success": true,
    "data": {
        "logout": "User is disconnected successfully"
    },
    "error": "",
    "code": 200
}
```

### HTTP Request
`POST api/auth/logout`


<!-- END_19ff1b6f8ce19d3c444e9b518e8f7160 -->

<!-- START_7c4c8c21aa8bf7ffa0ae617fb274806d -->
## Get the authenticated user informations

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://127.0.0.1:8000/api/auth/me" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/auth/me"
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


> Example response (200):

```json
{
    "success": false,
    "data": [],
    "error": {
        "login": {
            "status": 1,
            "message": "Vous n'êtes pas connecté"
        }
    },
    "code": 403
}
```

### HTTP Request
`GET api/auth/me`


<!-- END_7c4c8c21aa8bf7ffa0ae617fb274806d -->

#general


<!-- START_4dfafe7f87ec132be3c8990dd1fa9078 -->
## Return an empty response simply to trigger the storage of the CSRF cookie in the browser.

> Example request:

```bash
curl -X GET \
    -G "http://127.0.0.1:8000/sanctum/csrf-cookie" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/sanctum/csrf-cookie"
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



### HTTP Request
`GET sanctum/csrf-cookie`


<!-- END_4dfafe7f87ec132be3c8990dd1fa9078 -->

<!-- START_cd4a874127cd23508641c63b640ee838 -->
## doc.json
> Example request:

```bash
curl -X GET \
    -G "http://127.0.0.1:8000/doc.json" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/doc.json"
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


> Example response (200):

```json
{
    "variables": [],
    "info": {
        "name": "Laravel_7_base API",
        "_postman_id": "0927143c-62e2-4661-b48a-a00bc60b39c1",
        "description": "",
        "schema": "https:\/\/schema.getpostman.com\/json\/collection\/v2.0.0\/collection.json"
    },
    "item": [
        {
            "name": "User managment",
            "description": "",
            "item": [
                {
                    "name": "Admin or assistant login",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "127.0.0.1:8000\/",
                            "path": "api\/auth\/dashbord-login",
                            "query": []
                        },
                        "method": "POST",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "{\n    \"email\": \"admin0@gmail.com\",\n    \"password\": \"adminadmin\"\n}"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Client login",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "127.0.0.1:8000\/",
                            "path": "api\/auth\/client-login",
                            "query": []
                        },
                        "method": "POST",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "{\n    \"phone\": \"62212121\",\n    \"password\": \"admin\"\n}"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "api\/auth\/logout",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "127.0.0.1:8000\/",
                            "path": "api\/auth\/logout",
                            "query": []
                        },
                        "method": "POST",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Get the authenticated user informations",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "127.0.0.1:8000\/",
                            "path": "api\/auth\/me",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                }
            ]
        },
        {
            "name": "general",
            "description": "",
            "item": [
                {
                    "name": "Return an empty response simply to trigger the storage of the CSRF cookie in the browser.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "127.0.0.1:8000\/",
                            "path": "sanctum\/csrf-cookie",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "doc.json",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "127.0.0.1:8000\/",
                            "path": "doc.json",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Store a picture",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "127.0.0.1:8000\/",
                            "path": "api\/store-picture",
                            "query": []
                        },
                        "method": "POST",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                }
            ]
        }
    ]
}
```

### HTTP Request
`GET doc.json`


<!-- END_cd4a874127cd23508641c63b640ee838 -->

<!-- START_b0c9794174d3c6a78f34e4da4f8dcb77 -->
## Store a picture

> Example request:

```bash
curl -X POST \
    "http://127.0.0.1:8000/api/store-picture" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \

```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/store-picture"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

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
    "success": true,
    "data": {
        "image": "jsndsjvkvnddvd.png"
    },
    "error": "",
    "code": 200
}
```
> Example response (400):

```json
{
    "success": false,
    "data": [],
    "error": {
        "move": "Error lors de l'envoie"
    },
    "code": 400
}
```

### HTTP Request
`POST api/store-picture`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `image` | file |  required  | The user's image, and accept only: jpeg,jpg,png.
    
<!-- END_b0c9794174d3c6a78f34e4da4f8dcb77 -->


