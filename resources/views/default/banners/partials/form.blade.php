{!! Form::text('id')->type('hidden') !!}
{!! Form::text('banner_group_id')->type('hidden')->attrs(['class' => 'disable-clear'])->value(request()->banner_group_id) !!}

<div class="row h-100">
    <div class="col-12 col-sm-auto">

        <div class="form-group row">
            <label class="col">
                {{ Str::title(trans('ui-bootstrap5::word.is_visible_message')) }}
            </label>
            <div class="col-auto">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" name="is_visible">
                    <label class="form-check-label"></label>
                </div>
            </div>
        </div>

        <div class="form-group required">
            <label>게시기간</label>
            <div class="input-group mb-3">
                <input data-type="data-picker-datetime" type="text" name="period_from" class="form-control"
                    placeholder="{{ trans('mpcs-banner::word.attr.period_from') }}">
                <span class="input-group-text">~</span>
                <input data-type="data-picker-datetime" type="text" name="period_to" class="form-control"
                    placeholder="{{ trans('mpcs-banner::word.attr.period_to') }}">
            </div>
        </div>

        {!! Form::text('title', trans('mpcs-banner::word.attr.title'))->placeholder(trans('mpcs-banner::word.attr.title'))->wrapperAttrs(['class' => 'required']) !!}
        {!! Form::textarea('content', trans('mpcs-banner::word.attr.content'))->placeholder(trans('mpcs-banner::word.attr.content'))->attrs(['rows' => 7]) !!}


        {!! Form::text('url', trans('mpcs-banner::word.attr.url'))->placeholder(trans('mpcs-banner::word.attr.url'))->type('url') !!}
        <div class="form-group row">
            <label>{{ Str::title(trans('mpcs-banner::word.is_target_title')) }} </label>
            <div class="btn-group w-100" role="group">
                <input type="radio" class="btn-check" name="target" id="{{ $idPrefix }}target_self"
                    value="_self" autocomplete="off" checked>
                <label class="btn btn-outline-dark" for="{{ $idPrefix }}target_self">
                    <i class="mdi mdi-check"></i>
                    {{ Str::title(trans('mpcs-banner::word.target_self')) }}
                </label>
                <input type="radio" class="btn-check" name="target" id="{{ $idPrefix }}target_blank"
                    value="_blank" autocomplete="off">
                <label class="btn btn-outline-dark" for="{{ $idPrefix }}target_blank">
                    <i class="mdi mdi-check"></i>
                    {{ Str::title(trans('mpcs-banner::word.target_blank')) }}
                </label>
            </div>
        </div>

        <div class="form-group">
            <label>{{ Str::title(trans('mpcs-banner::word.attr.background_color')) }} </label>
            <div class="col border rounded p-2" data-type="color-picker">
                <input type="hidden" name="background_color">
            </div>
        </div>
    </div>

    <div class="col-12 col-sm">
        <div data-type="cropper-image-upload">
            <div class="row">
                <label for="image" class="col">
                    {{ trans('mpcs-banner::word.attr.image') }}
                    <button type="button" class="btn p-0" data-bs-container="body" data-bs-toggle="popover"
                        data-bs-placement="top" title="이미지 규격"
                        data-bs-content="{{ $currentGroup->width }}px * {{ $currentGroup->height }}px 이미지 사이즈에 최적화 되어 있습니다.">
                        <i class="mdi mdi-information"></i>
                    </button>
                </label>
                <div class="col-auto">
                    <button type="button" class="btn btn-info align-middle btn-select"
                        data-width="{{ $currentGroup->width }}" data-height="{{ $currentGroup->height }}">
                        <i class="mdi mdi-cloud-upload me-1"></i>
                        {{ trans('ui-bootstrap5::word.button.choose_a_image_file') }}
                    </button>
                </div>
            </div>
            <div class="row mt-2 justify-content-center">
                <div class="col-auto">
                    <img src="{{ Bootstrap5::noImage() }}" class="cropped-image img-fluid"
                        data-default-src="{{ Bootstrap5::noImage() }}" data-crud-edit-name="image_file_url"
                        data-crud-edit-type="image">
                    <input type="file" class="d-none" accept=".png,.jpg,.gif" />
                    <input type="hidden" name="image" />
                </div>
            </div>
        </div>
    </div>
</div>
