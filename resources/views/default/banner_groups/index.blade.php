@extends(Bootstrap5::theme('layouts.crud'))

{{-- 브라우저 타이틀 --}}
@section('app_title', Str::ucfirst(trans('mpcs-banner::menu.banner_groups')))

{{-- 목록 서브타이틀 --}}
@section('crud_subtitle', Str::ucfirst(trans('mpcs-banner::menu.banner_groups')))


{{-- 검색폼 영역 --}}
@section('crud_search')
    @component(Bootstrap5::theme('components.aside_crud_search'))
        @include(Banner::theme('banner_groups.partials.search'))
    @endcomponent
@endsection


{{-- 헤더 버튼 그룹 --}}
@section('crud_button_group')
    <button class="btn-crud-create btn btn-primary font-weight-bold"><i class="mdi mdi-plus-circle-outline mr-1"></i>
        {{ Str::ucfirst(trans('ui-bootstrap5::word.create')) }}
    </button>
@endsection



{{-- CRUD 모달 폼 영역 --}}
@section('crud_form')
    {{-- 생성 --}}
    @component(Bootstrap5::theme('components.modal_crud_create'), ['modalSize' => 'modal-md'])
        {!! Form::open()->idPrefix('create_') !!}
        @include(Banner::theme('banner_groups.partials.form'))
        {!! Form::close() !!}
    @endcomponent

    {{-- 수정 --}}
    @component(Bootstrap5::theme('components.modal_crud_edit'), ['modalSize' => 'modal-md'])
        {!! Form::open()->idPrefix('edit_') !!}
        @include(Banner::theme('banner_groups.partials.form'))
        {!! Form::close() !!}
    @endcomponent

@endsection

@push('after_app_src_scripts')
    <script src="/vendor/mpcs/bootstrap5/js/crud.js"></script>
@endpush

{{-- CURD 스크립트 추가 --}}
@push('after_app_scripts')
    <script>
        window.CRUD.init();
    </script>
@endpush
