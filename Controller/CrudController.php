<?php

App::uses('CrudAppController', 'Crud.Controller');

class CrudController extends CrudAppController {

    public function beforeRender() {
        parent::beforeRender();
        $model_name = $this->modelClass;
        $this->set(compact('model_name'));
    }
    
    public function index()
    {
        $custom_view_path = APP . 'View' . DS . $this->name . DS . $this->view . '.ctp';
        if(!file_exists($custom_view_path)) {
            $this->render('../../Plugin/Crud/View/Crud/' . $this->view);
        }
    }
    
    public function add()
    {
        $model = $this->modelClass;
        $config_file = 'model_' . Inflector::slug($model);
        $config_index = Inflector::camelize($config_file);
        Configure::load($config_file);
        $config = Configure::read($config_index);
        $fields = $config['fields'];
        $field_keys = array_keys($fields);
        $modelClass = $this->modelClass;
        if($this->request->is('post')) {
            $this->$modelClass->create();
            if ($this->$modelClass->save($this->request->data)) {
                $this->Session->setFlash("The {$this->modelClass} is saved!");
                $this->redirect(array('action' => 'index'));
            }
            else {
                $this->Session->setFlash("The {$this->modelClass} could not be saved. Please, try again.");
            }
        }
        $this->set(compact('fields'));

        $custom_view_path = APP . 'View' . DS . $this->name . DS . $this->view . '.ctp';
        if(!file_exists($custom_view_path)) {
            $this->render('../../Plugin/Crud/View/Crud/' . $this->view);
        }
    }
    
    public function edit($id = null)
    {
        $model = $this->modelClass;
        $config_file = 'model_' . Inflector::slug($model);
        $config_index = Inflector::camelize($config_file);
        Configure::load($config_file);
        $config = Configure::read($config_index);
        $fields = $config['fields'];
        $field_keys = array_keys($fields);
        $modelClass = $this->modelClass;
        $item = $this->$modelClass->findById($id);
        if($this->request->is('post') || $this->request->is('put') ) {
            debug('here');
            $this->$modelClass->id = $id;
            if ($this->$modelClass->save($this->request->data)) {
                $this->Session->setFlash("The {$this->modelClass} is saved!");
                $this->redirect(array('action' => 'view', $id));
            }
            else {
                $this->Session->setFlash("The {$this->modelClass} could not be saved. Please, try again.");
            }
        }
        else {
            $this->request->data = $item;
        }
        $this->set(compact('fields', 'id'));

        $custom_view_path = APP . 'View' . DS . $this->name . DS . $this->view . '.ctp';
        if(!file_exists($custom_view_path)) {
            $this->render('../../Plugin/Crud/View/Crud/' . $this->view);
        }
    }
    
    public function view($id)
    {
        $model = $this->modelClass;
        $config_file = 'model_' . Inflector::slug($model);
        $config_index = Inflector::camelize($config_file);
        Configure::load($config_file);
        $config = Configure::read($config_index);
        $fields = $config['fields'];
        $field_keys = array_keys($fields);
        $modelClass = $this->modelClass;
        $item = $this->$modelClass->findById($id);
        $this->set(compact('fields', 'item', 'id'));

        $custom_view_path = APP . 'View' . DS . $this->name . DS . $this->view . '.ctp';
        if(!file_exists($custom_view_path)) {
            $this->render('../../Plugin/Crud/View/Crud/' . $this->view);
        }
    }
    
    public function delete($id = null) {
        $modelClass = $this->modelClass;
        $this->$modelClass->id = $id;
        if(!$this->$modelClass->exists()) {
            $this->Session->setFlash("The {$this->modelClass} does not exist!");
        }
        elseif($this->$modelClass->delete()) {
            $this->Session->setFlash("The {$this->modelClass} is deleted!");
        }
        else {
            $this->Session->setFlash("The {$this->modelClass} could not be deleted!");
        }
        $this->redirect(array('action' => 'index'));

        $custom_view_path = APP . 'View' . DS . $this->name . DS . $this->view . '.ctp';
        if(!file_exists($custom_view_path)) {
            $this->render('../../Plugin/Crud/View/Crud/' . $this->view);
        }
    }
    
}
