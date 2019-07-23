# laravel-mongodb-transactions

### 介绍


Jensseger的laravel-mongodb扩展包在Laravel开发人员中非常受欢迎，但是缺少一个事务的功能。mongoDB 4.x支持多文档事务。因此，该软件包扩展了[Jenssegers/laravel-mongodb](https://github.com/jenssegers/laravel-mongodb)，支持事务功能。

1. mongoDB事务是基于 mongoDB4.x 副本集环境下。[mongoDB](https://docs.mongodb.com/manual/core/transactions)
2. 本包依赖于[Jenssegers/laravel-mongodb](https://packagist.org/packages/jenssegers/mongodb)，因此首先需要安装它。

### 安装

关于包的使用, 需要替换[Jenssegers/laravel-mongodb](https://packagist.org/packages/jenssegers/mongodb#installation):

Laravel
```php
//Jenssegers\Mongodb\MongodbServiceProvider::class,
Zs\Mongodb\MongodbServiceProvider::class,
```

Lumen
```php
//$app->register(Jenssegers\Mongodb\MongodbServiceProvider::class);
$app->register(Zs\Mongodb\MongodbServiceProvider::class);

$app->withEloquent();
```

Eloquent
--------
Eloquent 仅扩展了关于事务相关的内容，因此直接替换 [Jenssegers/laravel-mongodb](https://github.com/jenssegers/laravel-mongodb#eloquent)

```php
//use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Zs\Mongodb\Eloquent\Model as Eloquent;

class User extends Eloquent {}
```

```php
//use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Zs\Mongodb\Eloquent\Model as Eloquent;

class MyModel extends Eloquent {

    protected $connection = 'mongodb';

}
```

更多 Eloquent 文档见 (http://laravel.com/docs/eloquent)

### 使用

```php
DB::beginTransaction();

try {
    User::insert($userData);
    UserInfo::insert($userInfoData);
    
    DB::commit();
} catch (\Exception $e) {
    DB::rollBack();
    throw $e;
}
```
