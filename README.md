Guia de instalacion:

1. Corremos el comando para instalar composer en el proyecto y crear la carpte vender: Composer installl
2. Creamos un archivo .env o solo cambiamos el nombre de mv.env.example
3. Creamos una base de datos llamada laravel
4. modificamos los datos de acceso a la base de datos establecidos en el archivo .env
3. Generamos una key del proyecto con: php artisan key:generate
4. Iniciamos el servidor con php artisan serve

Guia de despliegue con docker


1. docker-compose up --build -d 
2. docker-compose exec app php artisan key:generate
3. docker-compose exec app php artisan config:cache
4. ddocker-compose exec app php artisan serve  
5. docker-compose exec app php artisan migrate:install
6. mysql -u root -p
7. 12345
8. GRANT ALL ON laravel.* TO 'admin'@'%' IDENTIFIED BY '12345';
9. FLUSH PRIVILEGES;
10. EXIT;
11. exit
12. docker-compose exec app php artisan migrate

sudo service docker start

docker pull jamesmorales04/fteam
docker stack rm fteam
 docker service update --image jamesmorales04/fteam fteam_app
 docker stack deploy --compose-file docker-compose.yml fteam
 docker service update --replicas=10 fteam_webserver
 docker service update --replicas=10 fteam_app
