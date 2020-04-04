<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).


<b>How To Use The Aplication</b>

1. Clone or Download the Project from my github repo. 
2. Install Dependencies:
    Using <i>composer install</i> and <i> npm install</i>
3. Create your own Pusher Key. You could search the tutorial on internet. 
4. Add your pusher key to .env
5. Create the database and run php artisan migrate. 
6. Run NPM run Dev
if everything complete, open the folder of project, then run:
<b>"docker-compose up -d"</b>.
it would download all the server you need to run the docker container. 
7. check if all server is running, using <i>docker ps<i/>
8. Login to your mysql-master, then run this sql comand:
    - GRANT REPLICATION SLAVE ON *.* TO 'slave_user'@'%' IDENTIFIED BY 'password';
        its creating user to replication.
9. Login to mysql-slave, then run this sql comand:
    - CHANGE MASTER TO MASTER_HOST='mysql-master',MASTER_USER='slave_user', MASTER_PASSWORD='password';
    - Start Slave;
    then, the slave already running.
    
10. Acces localhost:8080 to use the aplication, acces localhost:8100 to use phpmyadmin.
