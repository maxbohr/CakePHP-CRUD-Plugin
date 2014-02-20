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
* Extend the desired controller as below

```php
App::uses('CrudController', 'Crud.Controller');

class TextCodesController extends CrudController {
}
```
* Navigate to http://localhost/text_codes/index

This will allow the CRUD operations on text_codes table/collection in your database.
Tested with MongoDB.

