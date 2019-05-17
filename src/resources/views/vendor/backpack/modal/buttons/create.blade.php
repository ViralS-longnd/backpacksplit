@if ($crud->hasAccess('create'))
    <a data-route ="{{ url($crud->route.'/create') }}" data-toggle="modal" class="btn btn-primary ladda-button" data-style="zoom-in" data-target="#backpackModal" id="modal" data-id =""><span class="ladda-label"><i class="fa fa-plus"></i> {{ trans('backpack::crud.add') }} {{ $crud->entity_name }}</span></a>
@endif