<div class="modal" id="backpackModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title " id="exampleModalLabel">{!! $crud->getSubheading() ?? trans('backpack::crud.add').' '.$crud->entity_name !!}</h5>
                
                <div class="alert alert-danger" style="display:none"></div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="row m-t-20">
                <div class="{{ $crud->getCreateContentClass() }}">
                    <!-- Default box -->

                    @include('crud::inc.grouped_errors')

                      <form method="post"
                            action="{{ url($crud->route) }}"
                            @if ($crud->hasUploadFields('create'))
                            enctype="multipart/form-data"
                            @endif
                            >
                      {!! csrf_field() !!}
                      <div class="col-md-12">

                        <div class="row display-flex-wrap">
                          <!-- load the view from the application if it exists, otherwise load the one in the package -->
                          @if(view()->exists('vendor.backpack.crud.form_content'))
                            @include('vendor.backpack.crud.form_content', [ 'fields' => $crud->getFields('create'), 'action' => 'create' ])
                          @else
                            @include('crud::form_content', [ 'fields' => $crud->getFields('create'), 'action' => 'create' ])
                          @endif
                        </div><!-- /.box-body -->
                        <div class="modal-footer">
                            @include('crud::modal.inc.form_save_buttons')
                        </div><!-- /.box-footer-->

                      </div><!-- /.box -->
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>

