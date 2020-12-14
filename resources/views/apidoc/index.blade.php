<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>API Reference</title>

    <link rel="stylesheet" href="{{ asset('/docs/css/style.css') }}" />
    <script src="{{ asset('/docs/js/all.js') }}"></script>


          <script>
        $(function() {
            setupLanguages(["bash","javascript"]);
        });
      </script>
      </head>

  <body class="">
    <a href="#" id="nav-button">
      <span>
        NAV
        <img src="/docs/images/navbar.png" />
      </span>
    </a>
    <div class="tocify-wrapper">
        <img src="/docs/images/logo.png" />
                    <div class="lang-selector">
                                  <a href="#" data-language-name="bash">bash</a>
                                  <a href="#" data-language-name="javascript">javascript</a>
                            </div>
                            <div class="search">
              <input type="text" class="search" id="input-search" placeholder="Search">
            </div>
            <ul class="search-results"></ul>
              <div id="toc">
      </div>
                    <ul class="toc-footer">
                                  <li><a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a></li>
                            </ul>
            </div>
    <div class="page-wrapper">
      <div class="dark-box"></div>
      <div class="content">
          <!-- START_INFO -->
<h1>Info</h1>
<p>Welcome to the generated API reference.
<a href="{{ route("apidoc.json") }}">Get Postman Collection</a></p>
<!-- END_INFO -->
<h1>User managment</h1>
<!-- START_83180541415cea731bd8ed5da527b4db -->
<h2>Admin or assistant login</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://127.0.0.1:8000/api/auth/dashbord-login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"admin0@gmail.com","password":"adminadmin"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "success": true,
    "data": {
        "access_token": "1|wMUHbjQOLiFWpAugbsELvWIwxwezIoZlbPtazab2",
        "token_type": "bearer",
        "expires_in": null
    },
    "error": "",
    "code": 200
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/auth/dashbord-login</code></p>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>email</code></td>
<td>string</td>
<td>required</td>
<td>The user's mail.</td>
</tr>
<tr>
<td><code>password</code></td>
<td>string</td>
<td>required</td>
<td>The user's password.</td>
</tr>
</tbody>
</table>
<!-- END_83180541415cea731bd8ed5da527b4db -->
<!-- START_dc4e089ea4a5962927de76c073a8e21e -->
<h2>Client login</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://127.0.0.1:8000/api/auth/client-login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"phone":"62212121","password":"admin"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/auth/client-login</code></p>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>phone</code></td>
<td>string</td>
<td>required</td>
<td>The user's mail.</td>
</tr>
<tr>
<td><code>password</code></td>
<td>string</td>
<td>required</td>
<td>The user's password.</td>
</tr>
</tbody>
</table>
<!-- END_dc4e089ea4a5962927de76c073a8e21e -->
<!-- START_19ff1b6f8ce19d3c444e9b518e8f7160 -->
<h2>api/auth/logout</h2>
<p><br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://127.0.0.1:8000/api/auth/logout" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "success": true,
    "data": {
        "logout": "User is disconnected successfully"
    },
    "error": "",
    "code": 200
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/auth/logout</code></p>
<!-- END_19ff1b6f8ce19d3c444e9b518e8f7160 -->
<!-- START_7c4c8c21aa8bf7ffa0ae617fb274806d -->
<h2>Get the authenticated user informations</h2>
<p><br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://127.0.0.1:8000/api/auth/me" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "success": false,
    "data": [],
    "error": {
        "login": {
            "status": 1,
            "message": "Vous n'êtes pas connecté"
        }
    },
    "code": 403
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/auth/me</code></p>
<!-- END_7c4c8c21aa8bf7ffa0ae617fb274806d -->
<h1>general</h1>
<!-- START_4dfafe7f87ec132be3c8990dd1fa9078 -->
<h2>Return an empty response simply to trigger the storage of the CSRF cookie in the browser.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://127.0.0.1:8000/sanctum/csrf-cookie" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>GET sanctum/csrf-cookie</code></p>
<!-- END_4dfafe7f87ec132be3c8990dd1fa9078 -->
<!-- START_cd4a874127cd23508641c63b640ee838 -->
<h2>doc.json</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://127.0.0.1:8000/doc.json" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
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
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET doc.json</code></p>
<!-- END_cd4a874127cd23508641c63b640ee838 -->
<!-- START_b0c9794174d3c6a78f34e4da4f8dcb77 -->
<h2>Store a picture</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://127.0.0.1:8000/api/store-picture" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "success": true,
    "data": {
        "image": "jsndsjvkvnddvd.png"
    },
    "error": "",
    "code": 200
}</code></pre>
<blockquote>
<p>Example response (400):</p>
</blockquote>
<pre><code class="language-json">{
    "success": false,
    "data": [],
    "error": {
        "move": "Error lors de l'envoie"
    },
    "code": 400
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/store-picture</code></p>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>image</code></td>
<td>file</td>
<td>required</td>
<td>The user's image, and accept only: jpeg,jpg,png.</td>
</tr>
</tbody>
</table>
<!-- END_b0c9794174d3c6a78f34e4da4f8dcb77 -->
      </div>
      <div class="dark-box">
                        <div class="lang-selector">
                                    <a href="#" data-language-name="bash">bash</a>
                                    <a href="#" data-language-name="javascript">javascript</a>
                              </div>
                </div>
    </div>
  </body>
</html>