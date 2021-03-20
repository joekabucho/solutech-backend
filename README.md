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

## Register
**You send:**  Your  login credentials.
**You get:** An `API-Token` with wich you can make further actions.

**Request:**
```json
POST: http://localhost:8000/api/register
POST /login HTTP/1.1
Accept: application/json
Content-Type: application/json
Content-Length: xy

{
    "name": "joe",
    "mail":"joe@test.com"
    "password": "1234567" 
}
```
**Successful Response:**
```json
HTTP/1.1 200 OK
Server: My RESTful API
Content-Type: application/json
Content-Length: xy

{"success":
{
"token":"eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiNmY2MDkxODYzNDhlNDYwOTExMWJiZDg1YWEwOTMwZTYyZDdhYjc5OWI2MGM5Y2YxMDljZjVmN2JiNWFiYzY0ZmJhOWMyNmU4NmE5ZGQ4YTQiLCJpYXQiOiIxNjE2MjM3NzMwLjg4NjQxMCIsIm5iZiI6IjE2MTYyMzc3MzAuODg2NDE4IiwiZXhwIjoiMTY0Nzc3MzczMC44MDAzMzAiLCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.UTTmhmzqJI30rUoH1Fjth4YT4ueSV1FT8r1rWnRY2KZdr-ZoE3TsSK1pdQXiMswQNSETBwSSGwc0S8Q0MFU--gq2VM91vongFzupg_AOt8JHOU25aRZVUTnw-3V4PRKulUD6Gk_9sKhRNswhClqt27sY3oLWtpJQDzemCUF-4Od3VxHPGL9e9XPdMY-bKmz0O4cA3K1HiWwNvY6dSjM8Bmk66Xv0DIovabXoOLEl4Ob4UoCaFTvJuDWe_Rrpb0DGAg1-5UQ5c5MR2c_0JN6aWQY5CArjoRvZiKQbZkVYkCVArG-7eP7iGOZFecatc1L2t54zr-f47sSO0jENhg4glKgTaEXthMy7_1JRXemRLQlAWwonk2umokxfEeY4y-2VWjKm-K5kwueFFSo9sK0PhLODB0OvAHpG6wLsQdiJQGB19U7Fe62eZ52b9ZERhuepHxGW4SXNcg5gNHBIMz2ZAi1_8O_R2DvaVV1ZdCnY3OFyIoS26-Ew6uYqU4ysoMFSdoTCB3erEnYR3utrcFFUNY0ty8c9sqoErArOp_HSACUjEiikFInars3HztHt2okSazd8aDPCIhGZMtoEQ3JooXwrHtf50Py6Xn75DJX24TqmiyW1Dw9ogy1Xsg0tq3t2mSWE90f29WyUxO0EkCT_MrtK6EuI3y6q5MZJvENwGGI",
"name":"joe"
}
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

## Login
**You send:**  Your  login credentials.
**You get:** An `API-Token` with wich you can make further actions.

**Request:**
```json
POST: http://localhost:8000/api/login
POST /login HTTP/1.1
Accept: application/json
Content-Type: application/json
Content-Length: xy

{
    "mail":"joe@test.com"
    "password": "1234567" 
}
```
**Successful Response:**
```json
HTTP/1.1 200 OK
Server: My RESTful API
Content-Type: application/json
Content-Length: xy

{"success":
{
"token":"eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiNmY2MDkxODYzNDhlNDYwOTExMWJiZDg1YWEwOTMwZTYyZDdhYjc5OWI2MGM5Y2YxMDljZjVmN2JiNWFiYzY0ZmJhOWMyNmU4NmE5ZGQ4YTQiLCJpYXQiOiIxNjE2MjM3NzMwLjg4NjQxMCIsIm5iZiI6IjE2MTYyMzc3MzAuODg2NDE4IiwiZXhwIjoiMTY0Nzc3MzczMC44MDAzMzAiLCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.UTTmhmzqJI30rUoH1Fjth4YT4ueSV1FT8r1rWnRY2KZdr-ZoE3TsSK1pdQXiMswQNSETBwSSGwc0S8Q0MFU--gq2VM91vongFzupg_AOt8JHOU25aRZVUTnw-3V4PRKulUD6Gk_9sKhRNswhClqt27sY3oLWtpJQDzemCUF-4Od3VxHPGL9e9XPdMY-bKmz0O4cA3K1HiWwNvY6dSjM8Bmk66Xv0DIovabXoOLEl4Ob4UoCaFTvJuDWe_Rrpb0DGAg1-5UQ5c5MR2c_0JN6aWQY5CArjoRvZiKQbZkVYkCVArG-7eP7iGOZFecatc1L2t54zr-f47sSO0jENhg4glKgTaEXthMy7_1JRXemRLQlAWwonk2umokxfEeY4y-2VWjKm-K5kwueFFSo9sK0PhLODB0OvAHpG6wLsQdiJQGB19U7Fe62eZ52b9ZERhuepHxGW4SXNcg5gNHBIMz2ZAi1_8O_R2DvaVV1ZdCnY3OFyIoS26-Ew6uYqU4ysoMFSdoTCB3erEnYR3utrcFFUNY0ty8c9sqoErArOp_HSACUjEiikFInars3HztHt2okSazd8aDPCIhGZMtoEQ3JooXwrHtf50Py6Xn75DJX24TqmiyW1Dw9ogy1Xsg0tq3t2mSWE90f29WyUxO0EkCT_MrtK6EuI3y6q5MZJvENwGGI",
"name":"joe"
}
}
```
**Failed Response:**
```json
HTTP/1.1 401 Unauthorized
Server: My RESTful API
Content-Type: application/json
Content-Length: xy

{
    "message": "unauthorised",
}
``` 
**for all subsequent requests rememnber to include bearer token in the header**
```json Authorization:Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiY2ZkNWQ3ODNiNjIxMWRiMzUzNGRmZDhjZGI4NGFlMDg3NzQ3MTYzM2VlMmI1NjhhNzU4Y2QwOTM5ZjgyNmMxNDJkZjNhN2RmMTYzOWExYjciLCJpYXQiOiIxNjE2MjM4NzkzLjM5ODA2MCIsIm5iZiI6IjE2MTYyMzg3OTMuMzk4MDY0IiwiZXhwIjoiMTY0Nzc3NDc5My4yNTY0MDAiLCJzdWIiOiIzIiwic2NvcGVzIjpbXX0.Bvgs_p-b_bKguIpvIXBGP5AWLOnnP1s1stSipEV_1nfG49ttc3wOl7MoUinq7th8kRM2ZduFyvwx-Wa9RXo5ZThxLjkbp2b0VUz6SClEpSa1V6VHWeLkHOrfxxyx8UNJKiASUmcFZdERxxMDJ7r0meN453pijC7E5LQzb_DYmmHAVChbvUY0vpfn7ANZVnjS1klCq50RDbx-2i3djtPw2QI7goFDe-ieR8AV0cb4wg_wTilp_LgCxlbsgQbPIpMS4E9K43q1P_ocDCFf8N5e6qoUxA6EAKW-wNf-eLnJT1wfoKQPqcB64H2R1oe0o8VEMXhf5lB22zZhsgVqvgVnUlTIVthtKPjVTPDgrMSrkbj6t_L3YjS6RP06nvBizUEInWoMLTYOUrNq4Z3dMmt71sjSDSeuK6vYOj3B-vQuurejjuYRHoQ_5acwqKn8urPyqm7WqvsOwKhVF7IByTeWSyXAqL-1zcJxlIy0JljUjObkOLRE-MqWLapAJojOzCUVVgfa9bXfmsNIlbSq7qSEI8SKGm3o2HrcHtfN_p4joUh3yA26zFR06GgaJrtQ6hUV5lGsDm4i9bYYYT-MCcgm2m_FjrSPM0OF1OB7t7VO2-39IpPGLK_KP4YJL0iHC32jOziQKCzl4M0g2YSVrPeiCM9yoc4ZZxZZFNQI0SoCGik```
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
