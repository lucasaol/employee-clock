# Sistema web de controle de ponto

## Executando a aplicação
A aplicação é executada baseada em containers, os comandos estão simplificados utilizando o Makefile.

Para instalar e executar a aplicação, basta seguir os seguintes passos abaixo:

1. Iniciar o ambiente básico
```shell
make up
```
O comando irá criar os containeres do banco de dados MySQL e aplicação web Laravel

2. Preparar o banco de dados (Roda migrations + seeders)
```shell
make migrate
```
O comando irá rodar as migrations pendentes (na primeira execução, serão todas).

3. Para acessar o sistema, é necessário ter registros no banco de dados
```shell
make seed
```
O comando irá popular a base de dados com alguns registros mockados, que podem ser utilizados para fazer o login.

4. Inicializar o front-end
```shell
make start
```
O comando executa o ```npm install``` e ```npm run dev ``` para início da biblioteca front end.


Após esse processo, a aplicação estará acessível em `http://localhost:8000`.
