<table class="table table-sm table-borderless table-hover align-middle mb-0 w-100 crud-table-responsive">
    <thead class="thead-light">
        <tr class="border-bottom">
            <th class="text-center min-width-rem-5">
                @sortablelink('order', trans('mpcs-article::word.attr.order'))
            </th>
            <th class="text-center min-width-rem-3">
                {{ trans('ui-bootstrap5::word.is_visible') }}
            </th>
            <th class="text-center min-width-rem-4">
                ID
            </th>
            <th class="text-center">
                {{ trans('mpcs-article::word.attr.title') }}
            </th>
            <th class="text-center min-width-rem-10">
                {{ trans('mpcs-article::word.attr.period_from') }}
            </th>
            <th class="text-center min-width-rem-10">
                {{ trans('mpcs-article::word.attr.period_to') }}
            </th>
            <th class="text-center min-width-rem-3">
                {{ trans('mpcs-article::word.attr.status') }}
            </th>
            <th class="text-center min-width-rem-6">
                {{ trans('ui-bootstrap5::word.actions') }}
            </th>
        </tr>
    </thead>
    <tbody class="crud-list">
        @forelse($datas as $data)
            <tr data-crud-id="{{ $data->id }}" class="border-bottom">
                <td data-header-title='{{ trans('mpcs-article::word.attr.order') }}' class="float-left float-md-none">
                    <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-outline-primary disabled">
                            {{ $data->order }}
                        </button>
                        <button type="button" class="btn btn-sm btn-primary dropdown-toggle dropdown-toggle-split"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu text-center">
                            <button class="btn-crud-orderable btn btn-sm" data-action="first" data-bs-toggle="tooltip"
                                data-placement="top" title="{{ trans('campsite.attr.move_to_first') }}">
                                <i class="mdi mdi-chevron-double-up"></i>
                            </button>
                            <button class="btn-crud-orderable btn btn-sm" data-action="up" data-bs-toggle="tooltip"
                                data-placement="top" title="{{ trans('campsite.attr.move_to_up') }}">
                                <i class="mdi mdi-chevron-up"></i>
                            </button>
                            <button class="btn-crud-orderable btn btn-sm" data-action="down" data-bs-toggle="tooltip"
                                data-placement="top" title="{{ trans('campsite.attr.move_to_down') }}">
                                <i class="mdi mdi-chevron-down"></i>
                            </button>
                            <button class="btn-crud-orderable btn btn-sm" data-action="last" data-bs-toggle="tooltip"
                                data-placement="top" title="{{ trans('campsite.attr.move_to_last') }}">
                                <i class="mdi mdi-chevron-double-down"></i>
                            </button>
                        </div>
                    </div>
                </td>
                <td data-header-title='{{ trans('ui-bootstrap5::word.is_visible') }}'
                    class="text-right text-md-center">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="list_checked_visible"
                            {{ $data->is_visible ? 'checked' : '' }}>
                        <label class="form-check-label"></label>
                    </div>
                </td>
                <td data-header-title='ID' class="text-md-center">
                    {{ $data->id }}
                </td>
                <td data-header-title='{{ trans('mpcs-article::word.attr.title') }}' class="text-start">
                    <div class="row no-gutters align-items-center">
                        @if ($data->image)
                            <div class="col-auto mr-2">
                                <button type="button" class="btn p-0" data-bs-toggle="popover" data-bs-html="true"
                                    data-bs-content='<img class="img-fluid"
                                src="{{ $data->image_file_url }}" alt="{{ $data->title }}">'>
                                    <img class="img-thumbnail" style="width: 40px; height: 40px;"
                                        src="{{ $data->image_file_url }}" alt="{{ $data->title }}">
                                </button>
                            </div>
                        @endif
                        <div class="col">
                            <p class="mb-0">
                                <span> {{ $data->title }} </span>
                            </p>
                        </div>
                    </div>
                </td>
                <td data-header-title='{{ trans('mpcs-article::word.attr.period_from') }}' class="">
                    {{ $data->period_from }}
                </td>
                <td data-header-title='{{ trans('mpcs-article::word.attr.period_to') }}' class="">
                    {{ $data->period_to }}
                </td>
                <td data-header-title='{{ trans('mpcs-article::word.attr.status') }}'
                    class="text-start text-md-center">
                    <span class="badge bg-{{ $data->status_released ? 'success' : 'warning' }}">
                        {{ $data->status_released ? trans('mpcs-article::word.attr.released') : trans('mpcs-article::word.attr.nonrelease') }}
                    </span>
                </td>
                <td class="crud-td-actions text-end text-md-center">
                    <button class="btn-crud-show btn btn-sm btn-icon btn-success text-white align-middle"
                        title="{{ trans('ui-bootstrap5::word.button.show') }}">
                        <i class="mdi mdi-eye"></i>
                    </button>
                    <button class="btn-crud-delete btn btn-sm btn-icon btn-danger text-white align-middle"
                        title="{{ trans('ui-bootstrap5::word.button.delete') }}">
                        <i class="mdi mdi-trash-can"></i>
                    </button>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="8" class="crud-td-actions text-center">
                    {{ trans('ui-bootstrap5::word.crud.none_data') }}
                </td>
            </tr>
        @endforelse
    </tbody>
</table>

@isset($datas)
    <div class="mt-3 d-flex justify-content-center">
        {{ $datas->render(Bootstrap5::theme('partials.paginator')) }}
    </div>
@endisset
