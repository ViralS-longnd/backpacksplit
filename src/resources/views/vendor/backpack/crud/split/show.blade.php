    <!-- Default box -->
      <div class="m-t-20">
        @if ($crud->model->translationEnabled())
        <div class="row">
            <div class="col-md-12 m-b-10">
                <!-- Change translation button group -->
                <div class="btn-group pull-right">
                  <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{trans('backpack::crud.language')}}: {{ $crud->model->getAvailableLocales()[$crud->request->input('locale')?$crud->request->input('locale'):App::getLocale()] }} &nbsp; <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu">
                    @foreach ($crud->model->getAvailableLocales() as $key => $locale)
                        <li><a href="{{ url($crud->route.'/'.$entry->getKey()) }}?locale={{ $key }}">{{ $locale }}</a></li>
                    @endforeach
                  </ul>
                </div>
            </div>
        </div>
        @else
        @endif
        <div class="box no-padding no-border">
            <table class="table table-striped">
                <tbody>
                @foreach ($crud->columns as $column)
                    <tr>
                        <td>
                            <strong>{!! $column['label'] !!}</strong>
                        </td>
                        <td>
                            @if (!isset($column['type']))
                              @include('crud::columns.text')
                            @else
                              @if(view()->exists('vendor.backpack.crud.columns.'.$column['type']))
                                @include('vendor.backpack.crud.columns.'.$column['type'])
                              @else
                                @if(view()->exists('crud::columns.'.$column['type']))
                                  @include('crud::columns.'.$column['type'])
                                @else
                                  @include('crud::columns.text')
                                @endif
                              @endif
                            @endif
                        </td>
                    </tr>
                @endforeach
                @if ($crud->buttons->where('stack', 'line')->count())
                    <tr>
                        <td><strong>{{ trans('backpack::crud.actions') }}</strong></td>
                        <td>
                            @include('crud::inc.button_stack', ['stack' => 'line'])
                            <a class="btn btn-default" id="cancel"><span class="fa fa-ban"></span> &nbsp;{{ trans('backpack::crud.cancel') }}</a>
                        </td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div><!-- /.box-body -->
      </div><!-- /.box -->