@extends(Bootstrap5::theme('layouts.crud'))

{{-- 브라우저 타이틀 --}}
@section('app_title', trans('mpcs-banner::menu.banners'))

{{-- 목록 서브타이틀 --}}
@section('crud_subtitle', trans('mpcs-banner::menu.banners'))

{{-- 목록 타이틀 --}}
@section('crud_list_title', $currentGroup->name)

{{-- 사이트메뉴 인클루드 --}}
@section('aside_left_nav')
    {{-- blade-formatter-disable-next-line --}}
    @include(
    Banner::theme('banners.partials.list_groups'),[
    'datas' => $groups,
    ])
@endsection


{{-- 검색폼 영역 --}}
@section('crud_search')
    @component(Bootstrap5::theme('components.aside_crud_search'))
        @include(Banner::theme('banners.partials.search'))
    @endcomponent
@endsection


{{-- 헤더 버튼 그룹 --}}
@section('crud_button_group')
    <button class="btn-crud-create btn btn-primary font-weight-bold"><i class="mdi mdi-plus mr-1"></i>
        {{ Str::title(trans('ui-bootstrap5::word.create')) }}</button>
@endsection


{{-- 목록 그리드 영역 --}}
@section('crud_grid')
    {{-- @include(Bootstrap5::theme('banners.partials.list')) --}}
@endsection


{{-- CRUD 모달 폼 영역 --}}
@section('crud_form')


    {{-- 생성 --}}
    @component(Bootstrap5::theme('components.modal_crud_create'), ['modalSize' => 'modal-fullscreen'])
        {!! Form::open()->idPrefix('create_')->attrs(['class' => 'h-100']) !!}
        @include(Banner::theme('banners.partials.form'), [
            'idPrefix' => 'create_',
        ])
        {!! Form::close() !!}
    @endcomponent

    {{-- 수정 --}}
    @component(Bootstrap5::theme('components.modal_crud_edit'), ['modalSize' => 'modal-fullscreen'])
        {!! Form::open()->idPrefix('edit_')->method('put')->attrs(['class' => 'h-100']) !!}
        @include(Banner::theme('banners.partials.form'), [
            'idPrefix' => 'edit_',
        ])
        {!! Form::close() !!}
    @endcomponent

    {{-- 보기 --}}
    @component(Bootstrap5::theme('components.modal_crud_show'), ['modalSize' => 'modal-fullscreen'])
        {{-- 컨텐츠 인클루드 --}}
        @include(Banner::theme('banners.partials.show'))
    @endcomponent

    {{-- 삭제 --}}
    @component(Bootstrap5::theme('components.modal_crud_delete'))
    @endcomponent

    {{-- Cropper --}}
    @component(Bootstrap5::theme('components.modal_cropper_editor'))
    @endcomponent

@endsection


@push('after_app_src_scripts')
    <script src="/vendor/mpcs/bootstrap5/js/crud.js"></script>
@endpush

{{-- CURD 스크립트 추가 --}}
@push('after_app_scripts')
    <script>
        window.CRUD.init(undefined, {
            initListParams: {
                'banner_group_id': '{{ request()->get('banner_group_id') }}',
            },
        });
    </script>
@endpush
