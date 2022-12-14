# Todo
A simple todo in symfony

## Steps needed to get it to work

1. download the symfony cli:
https://symfony.com/download
its needed to serve the application, in the project root `symfony server:start -d` 

2. do create the database container `docker-compose up -d`
and run the migrations `symfony doctrine:migration:migrate` 

3. visit the URL given by the symfony server with `/api` to see all the endpoints
