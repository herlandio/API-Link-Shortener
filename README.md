# API Link Shortener

> Clone the project: <br>

`git clone https://github.com/herlandio/APILinkShortener`

> Laravel: <br>

`composer install` <br>
   - Linux: <br>
   `cp .env.example .env` <br>
   - Windows: <br>
   `copy .env.example .env` <br>
   
`php artisan key:generate` <br>


> Mysql: <br>

`Create database linkshortener` <br>

> Laravel: <br>

`php artisan migrate` <br>
`php artisan serve` <br>

> Routes: <br>

- Api Base

    `https://127.0.0.1:8000` <br>

- Redirect to url generate <br>
    - GET <br>
    `/api/link/{id}` <br>
    {id} :: identification of url <br>
    
- List all registers <br>
    - GET <br>
    `/api/linkshortener` <br>

- Create link shortener <br>
    - POST <br>
    `/api/link/create` <br>
        - Fields: <br>
            link :: url <br>
            identification :: identification for url <br>
        


