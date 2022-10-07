<div class="row">
    <div class="col-12 col-sm text-center mb-3 mb-sm-0">
        <div class="panel-wrap mb-2">
            <div class="panel-heading d-flex align-items-center justify-content-between">
                <label for="pc_image" class="col">
                    {{ trans('mpcs-banner::word.attr.pc_image') }}
                    <button type="button" class="btn p-0" data-bs-container="body" data-bs-toggle="popover"
                        data-bs-placement="top" title="이미지 규격"
                        data-bs-content="{{ $currentGroup->pc_width }}px * {{ $currentGroup->pc_height }}px 이미지 사이즈에 최적화 되어 있습니다.">
                        <i class="mdi mdi-information"></i>
                    </button>
                </label>
            </div>
            <div class="panel-body text-center">
                <img class="img-fluid" alt="" data-crud-show-name="pc_image_file_url">
            </div>
        </div>
    </div>
    <div class="col-12 col-sm text-center mb-3 mb-sm-0">
        <div class="panel-wrap mb-2">
            <div class="panel-heading d-flex align-items-center justify-content-between">
                <label for="mobile_image" class="col">
                    {{ trans('mpcs-banner::word.attr.mobile_image') }}
                    <button type="button" class="btn p-0" data-bs-container="body" data-bs-toggle="popover"
                        data-bs-placement="top" title="이미지 규격"
                        data-bs-content="{{ $currentGroup->mobile_width }}px * {{ $currentGroup->mobile_height }}px 이미지 사이즈에 최적화 되어 있습니다.">
                        <i class="mdi mdi-information"></i>
                    </button>
                </label>
            </div>
            <div class="panel-body text-center">
                <img class="img-fluid" alt="" data-crud-show-name="mobile_image_file_url">
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12 col-sm">
        <dl class="dl">
            <dt class="col-3">ID</dt>
            <dd class="col-9" data-crud-show-name="id"></dd>
            <dt class="col-3">{{ Str::title(trans('mpcs-article::word.attr.status')) }}</dt>
            <dd class="col-9" data-crud-show-name="status_released"></dd>

            <dt class="col-3">{{ Str::title(trans('mpcs-article::word.attr.period_from')) }}</dt>
            <dd class="col-9" data-style="date" data-crud-show-type="datetime" data-crud-show-name="period_from"></dd>
            <dt class="col-3">{{ Str::title(trans('mpcs-article::word.attr.period_to')) }}</dt>
            <dd class="col-9" data-style="date" data-crud-show-type="datetime" data-crud-show-name="period_to">
            </dd>

            <dt class="col-3">{{ Str::title(trans('mpcs-article::word.attr.title')) }}</dt>
            <dd class="col-9" data-crud-show-name="title"></dd>

            <dt class="col-3">{{ Str::title(trans('mpcs-article::word.attr.content')) }}</dt>
            <dd class="col-9" data-crud-show-name="content"></dd>

            <dt class="col-3">{{ Str::title(trans('mpcs-article::word.attr.created_at')) }}</dt>
            <dd class="col-9" data-style="date" data-crud-show-type="datetime" data-crud-show-name="created_at"></dd>
            <dt class="col-3">{{ Str::title(trans('mpcs-article::word.attr.updated_at')) }}</dt>
            <dd class="col-9" data-style="date" data-crud-show-type="datetime" data-crud-show-name="updated_at"></dd>
            <dt class="col-3">{{ Str::title(trans('mpcs-article::word.attr.writer')) }}</dt>
            <dd class="col-9" data-crud-show-name="user[name]"></dd>
        </dl>
    </div>
</div>

{{-- CURD 스크립트 --}}
@push('after_app_scripts')
    <script></script>
@endpush
