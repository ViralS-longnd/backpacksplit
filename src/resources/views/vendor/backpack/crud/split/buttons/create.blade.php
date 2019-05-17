@if ($crud->hasAccess('create'))
    <a data-route ="{{ url($crud->route.'/create') }}" class="btn btn-primary ladda-button" data-style="zoom-in" id="action" data-id =""><span class="ladda-label"><i class="fa fa-plus"></i> {{ trans('backpack::crud.add') }} {{ $crud->entity_name }}</span></a>
@endif