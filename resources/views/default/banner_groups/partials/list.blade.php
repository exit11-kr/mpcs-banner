<table class="table table-sm table-borderless table-hover align-middle mb-0 w-100 crud-table-responsive">
    <thead class="thead-light">
        <tr class="border-bottom">
            <th class="text-center min-width-rem-3">
                {{ trans('ui-bootstrap5::word.is_visible') }}
            </th>
            <th class="text-center min-width-rem-4">
                ID
            </th>
            <th class="text-center min-width-rem-5">
                {{ trans('mpcs-banner::word.attr.type') }}
            </th>
            <th class="text-center">
                {{ trans('ui-bootstrap5::word.name') }}
            </th>
            <th class="text-center">
                {{ trans('mpcs-banner::word.attr.code') }}
            </th>
            <th class="text-center min-width-rem-10">
                {{ trans('ui-bootstrap5::word.created_at') }}
            </th>
            <th class="text-center min-width-rem-6">
                {{ trans('ui-bootstrap5::word.actions') }}
            </th>
        </tr>
    </thead>
    <tbody class="crud-list">
        @forelse($datas as $data)
            <tr data-crud-id="{{ $data->id }}" class="border-bottom d-block d-md-table-row">
                <td data-header-title='{{ trans('ui-bootstrap5::word.is_visible') }}' class="text-right text-md-center">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="list_checked_visible"
                            {{ $data->is_visible ? 'checked' : '' }}>
                        <label class="form-check-label"></label>
                    </div>
                </td>
                <td data-header-title='ID' class="text-md-center">
                    {{ $data->id }}
                </td>
                <td data-header-title='{{ trans('mpcs-banner::word.attr.type') }}' class="text-md-center">
                    <span class="badge bg-primary">{{ Str::upper($data->type_str) }}</span>
                </td>
                <td data-header-title='{{ trans('ui-bootstrap5::word.name') }}' class="text-md-center">
                    {{ $data->name }}
                </td>
                <td data-header-title='{{ trans('mpcs-banner::word.attr.code') }}' class="text-md-center">
                    {{ $data->code }}
                </td>
                <td data-header-title='{{ trans('ui-bootstrap5::word.created_at') }}' class="text-md-center">
                    {{ $data->created_at }}
                </td>
                <td class="crud-td-actions text-end text-md-center">
                    <button class="btn-crud-edit btn btn-sm btn-icon btn-success text-white align-middle"
                        title="{{ trans('ui-bootstrap5::word.button.edit') }}">
                        <i class="mdi mdi-pencil"></i>
                    </button>
                    <button class="btn-crud-delete btn btn-sm btn-icon btn-danger text-white align-middle"
                        title="{{ trans('ui-bootstrap5::word.button.delete') }}">
                        <i class="mdi mdi-trash-can"></i>
                    </button>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7" class="crud-td-actions text-center">
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
