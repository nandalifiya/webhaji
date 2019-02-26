<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, yet powerful, providing tools needed for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of any modern web application framework, making it a breeze to get started learning the framework.

If you're not in the mood to read, [Laracasts](https://laracasts.com) contains over 1100 video tutorials on a range of topics including Laravel, modern PHP, unit testing, JavaScript, and more. Boost the skill level of yourself and your entire team by digging into our comprehensive video library.

## Getting Started
```

npm install
```

## Create Environtment file

copy file .env.example, paste and rename it to .env

## Setting 

Database setting

use phpmyadmin to create the database name webhaji. After creating the database, we need to open the .env file inside Laravel project and add the database credentials like bellow with your setting. 

```

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=webhaji
DB_USERNAME=root
DB_PASSWORD=

if your phpmyadmin have password "toor".

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=webhaji
DB_USERNAME=root
DB_PASSWORD=toor
```

Setting encryption by typing on project terminal/cmd

```

php artisan key:generate

```

make table from migration folder

```

php artisan migrate

```

##Running Laravel

```

php artisan serve
```

updating the database(when needed)

```
php artisan migrate

```

## Walkthrough Laravel Step 1 make model/entity and migrations

1. create model with migration

```
php artisan make:model Yourmodelname --migration
```
2. check folder database/migration/your_model_name and open it

3. edit the migration file with column that will be on your model tabel
   check [this link](https://laravel.com/docs/5.7/migrations#columns). example on file with same migrations folder

4. update the migration table on phpmyadmin

```
php artisan migrate
```

5. check folder app/YourModelname and open it

6. open file and edit the $fillable options (with your edited step number 3, column name can fill in the form), check Category.php for example

## Walkthrough Relational table many to many

( optional )
if the model/migration has one to one / one to many / many to many on the migrations file.

check eloquent relation table on [this link](https://laravel.com/docs/5.7/eloquent-relationships).

example many to many 2 tabel

1. make new migration file for relating 2 tabel ex: category and post
```
php artisan make:migration create_category_post_table --create=category_post
```
2. edit the migrations file ex: on folder database/migrations/file_category_post_tabel

3. edit the app/Post.php see the file

```
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//add this import use
use App\Category;

class Post extends Model
{
    //add this method
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
```

4. edit the app/Category.php see the file

```
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//add this import use
use App\Post;

class Category extends Model
{
    //add this method
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
```

5.done

## Walkthrough Relational table one to many

( optional )
if the model/migration has one to one / one to many / many to many on the migrations file.

check eloquent relation table on [this link](https://laravel.com/docs/5.7/eloquent-relationships).

example one to many 2 tabel ex: user and post

1. add the user id to database/migration/create_posts_tabel (see the file)

2. edit app/User.php see the file
```
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //add this method
    public function posts()
    {
        return $this->hasMany('App\Post');
    }
}
```

3. edit app/Post.php see the file
```
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //add this method
    public function users()
    {
        return $this->belongsTo('App\User');
    }
}
```






## Walkthrough Laravel step 2 make controller

create controller 
```
php artisan make:controller NameController --resource
```

check all url from routes/web.php
```
php artisan route:list
```

edit the controller, example on folder app/Http/Controller/PostController.php


## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
