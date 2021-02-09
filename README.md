## Installation

- Docker up

`docker-compose up -d --build`

- Install components

`docker-compose run --rm php-cli composer install`
  
- Migrate DB

`docker-compose run --rm php-cli php artisan migrate`
  
- Seed Products
  
`docker-compose run --rm php-cli php artisan db:seed`


## Test 

- Registration
    - Route ---> /registration (POST)
    - JSON 
      `{
      "first_name": "Andrew",
      "second_name": "Gorbatyuk",
      "last_name": "Alekseevich",
      "email" : "leorneq@gmail.com",
      "phone": "+71231231231",
      "password": "Andrew!",
      "password_confirm": "Andrew!"
      }`



      
- Get token for auth
    - Route ---> /token (POST)
    - JSON with email 
    `{
      "login" : "leorneq@gmail.com",
      "password": "Andrew!"
      }`
     - JSON with phone
       `{
       "login" : "+71231231231",
       "password": "Andrew!"
       }`

       

- Get products (with bearer token)
    - Route ---> /products (GET)
    - Query string for multiple filter
    `localhost:8080/products?properties[main_color][]=green&properties[main_color][]=red&properties[second_color][]=blue`
