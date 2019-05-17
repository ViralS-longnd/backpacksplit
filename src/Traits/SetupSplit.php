<?php

namespace LongND\BackpackSplit\Traits;

use Illuminate\Support\Collection;

trait SetupSplit
{
    public function setupSplit(string $listClassSplit = 'col-md-8')
    {
        config(['backpacksplit.split_class_div' => $listClassSplit]);
        $listClassDiv = (int) preg_replace('/[^0-9]/', '', $listClassSplit);
        $listClass = 'col-md-'.(12-$listClassDiv);
        config(['backpacksplit.split_class' => $listClass]);
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