CakePHP-CRUD-Plugin
===================

Simple CRUD Operations Plugin for CakePHP - Uses CakePHP-DataTable-Plugin for Listing

Usage:

* Clone/Download this git repository into app/Plugin directory.
* Rename it to app/Plugin/Crud
* Load it in bootstrap.php 

```php
CakePlugin::load('Crud');
```
* Copy and rename model_User.php.sample to app/Config/model_User.php
* Extend the desired controller as below

```php
App::uses('CrudController', 'Crud.Controller');

class UsersController extends CrudController {
}
```
* Navigate to http://localhost/users/index

This will allow the CRUD operations on users table/collection in your database.
You can choose desired controller and simply extend it as above and create a corresponding Config file.

Tested with MongoDB.

