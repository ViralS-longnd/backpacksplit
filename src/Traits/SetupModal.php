<?php

namespace LongND\BackpackSplit\Traits;

use Illuminate\Support\Collection;

trait SetupModal
{
    public function setupModal()
    {
        $this->crud->setCreateView('crud::modal.create');
        $this->crud->setEditView('crud::modal.edit');
        $this->crud->setListView('crud::modal.list');
        $this->crud->setShowView('crud::modal.show');
        $this->crud->modifyButton('update',[
            'content' => 'crud::modal.buttons.update'
        ]);
        $this->crud->modifyButton('show',[
            'content' => 'crud::modal.buttons.show'
        ]);
        // $this->crud->modifyButton('preview',[
        //     'content' => 'crud::modal.buttons.preview'
        // ]);
    }
}