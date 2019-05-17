
<div class="modal" id="backpackModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title " id="exampleModalLabel">{!! $crud->getSubheading() ?? trans('backpack::crud.edit').' '.$crud->entity_name !!}</h5>
                
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
                            action="{{ url($crud->route.'/'.$entry->getKey()) }}"
                            @if ($crud->hasUploadFields('update', $entry->getKey()))
                            enctype="multipart/form-data"
                            @endif
                            >
                      <div class="modal-body">
                      {!! csrf_field() !!}
                      {!! method_field('PUT') !!}
                      <div class="col-md-12">
                        @if ($crud->model->translationEnabled())
                        <div class="row m-b-10">
                            <!-- Single button -->
                            <div class="btn-group pull-right">
                              <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{trans('backpack::crud.language')}}: {{ $crud->model->getAvailableLocales()[$crud->request->input('locale')?$crud->request->input('locale'):App::getLocale()] }} &nbsp; <span class="caret"></span>
                              </button>
                              <ul class="dropdown-menu">
                                @foreach ($crud->model->getAvailableLocales() as $key => $locale)
                                    <li><a href="{{ url($crud->route.'/'.$entry->getKey().'/edit') }}?locale={{ $key }}">{{ $locale }}</a></li>
                                @endforeach
                              </ul>
                            </div>
                        </div>
                        @endif
                        <div class="row display-flex-wrap">
                          <!-- load the view from the application if it exists, otherwise load the one in the package -->
                          @if(view()->exists('vendor.backpack.crud.form_content'))
                            @include('vendor.backpack.crud.form_content', ['fields' => $fields, 'action' => 'edit'])
                          @else
                            @include('crud::form_content', ['fields' => $fields, 'action' => 'edit'])
                          @endif
                        </div><!-- /.box-body -->

                        <div class="modal-footer">

                            @include('crud::modal.inc.form_save_buttons')

                        </div>
                      </div>
                    </div><!-- /.box -->
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>

