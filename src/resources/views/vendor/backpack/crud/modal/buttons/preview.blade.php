{{-- This button is deprecated and will be removed in CRUD 3.5 --}}

@if ($crud->hasAccess('show'))
    <a data-route ="{{ url($crud->route.'/'.$entry->getKey()) }}" data-toggle="modal" class="btn btn-xs btn-default" data-target="#backpackModal" id="modal"><i class="fa fa-eye"></i> {{ trans('backpack::crud.preview') }}</a>
@endif