<?php

namespace LongND\BackpackSplit\Traits;

use Illuminate\Support\Collection;

trait SetupSplit
{
    public function setUpSplit()
    {
        $this->crud->setCreateView('crud::split.create');
        $this->crud->setEditView('crud::split.edit');
        $this->crud->setListView('crud::split.list');
        $this->crud->setShowView('crud::split.show');
        $this->crud->modifyButton('update',[
            'content' => 'crud::split.buttons.update'
        ]);
        $this->crud->modifyButton('show',[
            'content' => 'crud::split.buttons.show'
        ]);
        // $this->crud->modifyButton('preview',[
        //     'content' => 'crud::split.buttons.preview'
        // ]);
    }
}