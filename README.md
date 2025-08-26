# Sistema web de controle de ponto

## Executando a aplicação
A aplicação é executada baseada em containers, os comandos estão simplificados utilizando o Makefile.

Para instalar e executar a aplicação, basta seguir os seguintes passos abaixo:

1. Copiar o .env

O `docker-compose` contém os parâmetros de nome do banco de dados + senha do usuário root, que devem ser colocados na configuração do `.env`.
Lembre-se de alterar os dados de conexão com o banco de dados, caso a conexão seja diferente.

2. Iniciar o ambiente
```shell
make up
```
O comando irá criar os containeres do banco de dados MySQL e aplicação web Laravel.
Depois, executa o `npm install` e `npm run dev` para início da biblioteca front end.

3. Preparar o banco de dados (Roda migrations + seeders)
```shell
make migrate
```
O comando irá rodar as migrations pendentes (na primeira execução, serão todas).

4. Para acessar o sistema, é necessário ter registros no banco de dados
```shell
make seed
```
O comando irá popular a base de dados com alguns registros mockados, que podem ser utilizados para fazer o login.

Após esse processo, a aplicação estará acessível em `http://localhost:8000`.

5. O database seeder irá inserir alguns registros fakes. Para acessar o sistema a primeira vez, utilize os dados na tabela abaixo.
  
| E-mail               | Nível de acesso |
|----------------------|-----------------|
| sistema@admin.com    | Administrador   |
| sistema@employee.com | Funcionário     |
A senha padrão para ambos é "password".

Os demais registros já poderão ser inseridos utilizando as telas mesmo.

Qualquer dúvida sobre o ambiente, os arquivos `Makefile`, `docker-compose.yml` e `Dockerfile` podem ser consultados.

Dúvidas sobre o funcionamento? Fique à vontade para perguntar.
