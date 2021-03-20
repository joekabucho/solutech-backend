# API Documentation Example
This API uses `POST` request to communicate and HTTP [response codes](https://en.wikipedia.org/wiki/List_of_HTTP_status_codes) to indenticate status and errors. All responses come in standard JSON. All requests must include a `content-type` of `application/json` and the body must be valid JSON.

## Response Codes
### Response Codes
```
200: Success
400: Bad request
401: Unauthorized
404: Cannot be found
405: Method not allowed
422: Unprocessable Entity 
50X: Server Error
```
### Error Codes Details
```
500: Server Error
```
### Example Error Message
```json
http code 401
{
    "message": "Orders not found",
}
```

## Login
**You send:**  Your  login credentials.
**You get:** An `API-Token` with wich you can make further actions.

**Request:**
```json
POST /login HTTP/1.1
Accept: application/json
Content-Type: application/json
Content-Length: xy

{
    "username": "foo",
    "password": "1234567" 
}
```
**Successful Response:**
```json
HTTP/1.1 200 OK
Server: My RESTful API
Content-Type: application/json
Content-Length: xy

{
   "apitoken": "e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855",
   "expirationDate": "2018-02-13T15:31:55.559Z"
}
```
**Failed Response:**
```json
HTTP/1.1 401 Unauthorized
Server: My RESTful API
Content-Type: application/json
Content-Length: xy

{
    "code": 500,
    "message": "invalid crendetials",
    "resolve": "The username or password is not correct."
}
``` 


## Products

**POST:**
```json
POST:http://localhost:8000/api/products.

{
    "message": "products record created",
}
``` 
**PUT:**
```json
PUT:http://localhost:8000/api/products.

{
"message": "products record updated",
}
``` 
**GET:**
```json
GET:http://localhost:8000/api/proproducts.

[
  {
    "id": 1,
    "name": "test",
    "description": "ni ngori msee",
    "quantity": "10",
    "created_at": "2021-03-20T09:54:52.000000Z",
    "updated_at": "2021-03-20T09:54:52.000000Z"
  }
]
``` 

**GET ONE:**
```json
GET:http://localhost:8000/api/products/{id}.

[
  {
    "id": 1,
    "name": "test",
    "description": "ni ngori msee",
    "quantity": "10",
    "created_at": "2021-03-20T09:54:52.000000Z",
    "updated_at": "2021-03-20T09:54:52.000000Z"
  }
]
``` 
**DELETE:**
```json
DELETE:http://localhost:8000/api/products/{id}.

[
  {
    "message": "records deleted",
  }
]
```

## ORDERS

**POST:**
```json
POST:http://localhost:8000/api/orders.

{
    "message": "orders record created",
}
``` 
**PUT:**
```json
PUT:http://localhost:8000/api/orders/{id}.

{
"message": "orders record updated",
}
``` 
**GET:**
```json
GET:http://localhost:8000/api/orders.
[
{
"id": 1,
"order_number": "3",
"created_at": "2021-03-20T09:32:56.000000Z",
"updated_at": "2021-03-20T09:32:56.000000Z"
},
{
"id": 2,
"order_number": "234234234",
"created_at": "2021-03-20T09:33:05.000000Z",
"updated_at": "2021-03-20T09:33:05.000000Z"
}
]
``` 

**GET ONE:**
```json
GET:http://localhost:8000/api/orders/{id}.

[
 {
   "id": 2,
   "order_number": "234234234",
   "created_at": "2021-03-20T09:33:05.000000Z",
   "updated_at": "2021-03-20T09:33:05.000000Z"
 }
]
``` 

**DELETE:**
```json
DELETE:http://localhost:8000/api/orders/{id}.

[
  {
    "message": "records deleted",
  }
]
```

## ORDER DETAILS

**POST:**
```json
POST:http://localhost:8000/api/orderdetails.

{
    "message": "order details record created",
}
``` 
**PUT:**
```json
PUT:http://localhost:8000/api/orderdetails/{id}.

{
"message": "order details record updated",
}
``` 
**GET:**
```json
GET:http://localhost:8000/api/orderdetails.
[
{
"id": 1,
"order_id": 2,
"product_id": 1,
"created_at": "2021-03-20T10:10:24.000000Z",
"updated_at": "2021-03-20T10:10:24.000000Z"
},
{
"id": 2,
"order_id": 2,
"product_id": 1,
"created_at": "2021-03-20T10:10:29.000000Z",
"updated_at": "2021-03-20T10:10:29.000000Z"
}
]
``` 

**GET ONE:**
```json
GET:http://localhost:8000/api/orderdetails/{id}.

{
"id": 1,
"order_id": 2,
"product_id": 1,
"created_at": "2021-03-20T10:10:24.000000Z",
"updated_at": "2021-03-20T10:10:24.000000Z"
},
``` 

**DELETE:**
```json
DELETE:http://localhost:8000/api/orderdetails/{id}.

[
  {
    "message": "records deleted",
  }
]
```


## SUPPLIERS

**POST:**
```json
POST:http://localhost:8000/api/suppliers.

{
    "message": "suppliers record created",
}
``` 
**PUT:**
```json
PUT:http://localhost:8000/api/suppliers/{id}.

{
"message": "suppliers record updated",
}
``` 
**GET:**
```json
GET:http://localhost:8000/api/suppliers.
[
{
"id": 2,
"name": "joe",
"created_at": "2021-03-20T09:16:33.000000Z",
"updated_at": "2021-03-20T09:16:33.000000Z"
},
{
"id": 3,
"name": "joe",
"created_at": "2021-03-20T09:16:36.000000Z",
"updated_at": "2021-03-20T09:16:36.000000Z"
}
]
``` 

**GET ONE:**
```json
GET:http://localhost:8000/api/suppliers/{id}.

{
"id": 2,
"name": "joe",
"created_at": "2021-03-20T09:16:33.000000Z",
"updated_at": "2021-03-20T09:16:33.000000Z"
},
``` 

**DELETE:**
```json
DELETE:http://localhost:8000/api/suppliers/{id}.

[
  {
    "message": "records deleted",
  }
]
```
## SUPPLIERS PRODUCTS

**POST:**
```json
POST:http://localhost:8000/api/supplierproducts.

{
    "message": "suppliers products record created",
}
``` 
**PUT:**
```json
PUT:http://localhost:8000/api/supplierproducts/{id}.

{
"message": "suppliers products updated",
}
``` 
**GET:**
```json
GET:http://localhost:8000/api/supplierproducts.
[
{
"id": 3,
"supply_id": 2,
"product_id": 1,
"created_at": "2021-03-20T10:20:33.000000Z",
"updated_at": "2021-03-20T10:20:33.000000Z"
},
{
"id": 4,
"supply_id": 2,
"product_id": 1,
"created_at": "2021-03-20T10:20:36.000000Z",
"updated_at": "2021-03-20T10:20:36.000000Z"
}
]
``` 

**GET ONE:**
```json
GET:http://localhost:8000/api/supplierproducts/{id}.

{
"id": 3,
"supply_id": 2,
"product_id": 1,
"created_at": "2021-03-20T10:20:33.000000Z",
"updated_at": "2021-03-20T10:20:33.000000Z"
},
``` 

**DELETE:**
```json
DELETE:http://localhost:8000/api/supplierproducts/{id}.

[
  {
    "message": "records deleted",
  }
]
```
