LessonShip CRM (beta, based on bootstrap 4)
===========
LessonShip CRM based on yii-app-bootstrap-4,which is a mixture of the Yii 2 Basic and Advanced templates with no backend / frontend separation, but with the database-based user functionality from the advanced template. The other important note is that it is using Bootsrap 4 instead of Boostrap 3.

INSTALLATION
------------

From git:

~~~
git clone https://github.com/ArtiAiry/lship-beta -b (branch_name)
~~~

For preparing the application, you should: 

I. Update your composer:

~~~
composer update
~~~

II. Config your db in <b>app/config/db.php</b>

~~~
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=your_db_name',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8',
];
~~~

III. Migrate tables to the database

~~~
php yii migrate
~~~

IV. Migrate tables for comments:

~~~
php yii migrate --migrationPath=@vendor/yii2mod/yii2-comments/migrations
~~~