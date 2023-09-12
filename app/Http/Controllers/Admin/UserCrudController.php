<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UserRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Backpack\CRUD\app\Library\Widget;
/**
 * Class UserCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class UserCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\User::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/user');
        CRUD::setEntityNameStrings('user', 'users');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::setFromDb(); // set columns from db columns.

        /**
         * Columns can be defined using the fluent syntax:
         * - CRUD::column('price')->type('number');
         */
        $userCount = \App\Models\User::count();
        // define which model attribute will be shown on draggable elements
        Widget::add()->to('after_content')->type('div')->class('row')->content([

            //widget made using fluent syntax
            Widget::make()
                ->type('progress')
                ->class('card border-0 pb-100 text-white bg-info')
                ->progressClass('progress-bar')
                ->value($userCount)
                ->description('Registered users.')
                ->progress(100 * (int)$userCount / 1000)
                //->hint(1000 - $userCount . ' more until next milestone.'),
    
            //widget made using the array definition
        
        ]);
      
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(UserRequest::class);
       CRUD::setFromDb(); // set fields from db columns.
      CRUD::field([
            'label' => "Ed_program", // Table column heading
            'type' => "select",
            'name' => 'ed_program_id', // the column that contains the ID of that connected entity;
          
            'attribute' => "id", // foreign key attribute that is shown to user
            'model' => "App\Models\EdProgram",
        ]);
        CRUD::field([
            'label' => "Class", // Table column heading
            'type' => "select",
            'name' => 'class_id', // the column that contains the ID of that connected entity;
          
            'attribute' => "id", // foreign key attribute that is shown to user
            'model' => "App\Models\ClassModel",
        ]);
        /**
         * Fields can be defined using the fluent syntax:
         * - CRUD::field('price')->type('number');
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }


    use \Backpack\CRUD\app\Http\Controllers\Operations\ReorderOperation;

   /* protected function setupReorderOperation()
    {
        
    
        //you can also add Script & CSS to your page using 'script' & 'style' widget
        
    }*/
}
