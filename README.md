# API Link Shortener

> Clone o projeto: <br>

`git clone https://github.com/herlandio/API-Link-Shortener`

> Execute: <br>

`
docker-compose up -d:
`

> Depois digite `docker ps` copie o CONTAINER_ID e substitua no comando abaixo:

`
docker exec -it CONTAINER_ID bash
`

> Por fim execute o comando abaixo:

`
php artisan migrate
`

> Para sair digite `exit`

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
            - link :: url <br>
            - identification :: identification for url (optional)<br>
        


