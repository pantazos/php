<div class="m-3">
    @can('service_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.services.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.service.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.service.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-categoryServices">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.service.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.service.fields.key') }}
                            </th>
                            <th>
                                {{ trans('cruds.service.fields.name') }}
                            </th>
                            <th>
                                {{ trans('cruds.service.fields.icon') }}
                            </th>
                            <th>
                                {{ trans('cruds.service.fields.duration') }}
                            </th>
                            <th>
                                {{ trans('cruds.service.fields.price') }}
                            </th>
                            <th>
                                {{ trans('cruds.service.fields.category') }}
                            </th>
                            <th>
                                {{ trans('cruds.category.fields.key') }}
                            </th>
                            <th>
                                {{ trans('cruds.category.fields.color') }}
                            </th>
                            <th>
                                {{ trans('cruds.category.fields.icon') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($services as $key => $service)
                            <tr data-entry-id="{{ $service->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $service->id ?? '' }}
                                </td>
                                <td>
                                    {{ $service->key ?? '' }}
                                </td>
                                <td>
                                    {{ $service->name ?? '' }}
                                </td>
                                <td>
                                    {{ $service->icon ?? '' }}
                                </td>
                                <td>
                                    {{ $service->duration ?? '' }}
                                </td>
                                <td>
                                    {{ $service->price ?? '' }}
                                </td>
                                <td>
                                    {{ $service->category->name ?? '' }}
                                </td>
                                <td>
                                    {{ $service->category->key ?? '' }}
                                </td>
                                <td>
                                    {{ $service->category->color ?? '' }}
                                </td>
                                <td>
                                    {{ $service->category->icon ?? '' }}
                                </td>
                                <td>
                                    @can('service_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.services.show', $service->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('service_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.services.edit', $service->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('service_delete')
                                        <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                        </form>
                                    @endcan

                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('service_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.services.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-categoryServices:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection