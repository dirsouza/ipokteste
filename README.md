# iPok - Teste
Se póssivel dê preferência na utilização via Docker, caso não seja, não mude a porta em que a Api estará disponível.

# Com Docker

 - Dentro da pasta **mysql/** descompacte o arquivo `employees.zip`
 - Edite as variáveis de ambiente do arquivo `.env` se necessário, levando em consideração que a `Api` estará na porta `8000` e o `MySQL` na porta `3306`.
 - Execute o comando no terminal para subir os containers:
```bash
$ docker-compose up --build
```
> Garanta que antes de executar o comando, no terminal esteja apontando estar na pasta principal do projeto.

- Após subir todos o containers sem erro, abra um novo terminal e execute os seguintes comandos:

- Dentro da pasta principal, instalar as dependências da Api e subir:
```bash
$ docker-compose exec api composer install && php artisan serve --host=0.0.0.0 --port=8000
```

- Em outro terminal e dentro da pasta `app`, execute os seguintes comandos para instalar as dependências e subir a `app`:
```bash
$ npm install && npm run serve
```

## Sem Docker
- Dentro da pasta `api/`, edite no arquivo `.env` nas linhas que contenham `DB_`, execeto à `DB_CONNECTION`, com os parâmetros necessários para acesso ao `MySQL`.

|DB_HOST  |DB_PORT|DB_DATABASE|DB_USERNAME|DB_PASSWORD|
|---------|-------|-----------|-----------|-----------|
|localhost|3306   |employees  |root       |root       |

- No terminal e dentro da pasta `api`, execute os seguintes comandos para instalar as dependências e subir a `api`:
```bash
$ composer install && php artisan serve --host=0.0.0.0 --port=8000
```
- Em outro terminal e dentro da pasta `app`, execute os seguintes comandos para instalar as dependências e subir a `app`:
```bash
$ npm install && npm run serve
```
> Caso não tenham ocorrido problemas, as aplicações front-end e back-end, já estarão disponíveis em http://localhost:8080 e http://localhost:8000 respectivamente.