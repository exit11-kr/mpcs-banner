{!! Form::text('id')->type('hidden') !!}
{!! Form::text('parent_id')->type('hidden') !!}

<div class="form-group row">
    <label class="col">{{ Str::ucfirst(trans('ui-bootstrap5::word.is_visible_message')) }} </label>
    <div class="col-auto">
        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" name="is_visible">
            <label class="form-check-label"></label>
        </div>
    </div>
</div>

{!! Form::text('name', Str::ucfirst(trans('ui-bootstrap5::word.name')))->placeholder(Str::ucfirst(trans('ui-bootstrap5::word.name')))->wrapperAttrs(['class' => 'required']) !!}
{!! Form::text('code', Str::ucfirst(trans('mpcs-banner::word.attr.code')))->placeholder(Str::ucfirst(trans('mpcs-banner::word.attr.code')))->wrapperAttrs(['class' => 'required']) !!}

{!! Form::select('type', Str::ucfirst(trans('mpcs-banner::word.attr.list_type')), $types)->attrs(['data-type' => 'select-one'])->wrapperAttrs(['class' => 'mb-3']) !!}

<div class="row">
    <div class="col">
        {!! Form::text('width', Str::ucfirst(trans('mpcs-banner::word.attr.image_width')))->type('number')->placeholder(Str::ucfirst(trans('mpcs-banner::word.attr.image_width'))) !!}
    </div>
    <div class="col">
        {!! Form::text('height', Str::ucfirst(trans('mpcs-banner::word.attr.image_height')))->type('number')->placeholder(Str::ucfirst(trans('mpcs-banner::word.attr.image_height'))) !!}
    </div>
</div>

{!! Form::text('description', Str::ucfirst(trans('ui-bootstrap5::word.description')))->placeholder(Str::ucfirst(trans('ui-bootstrap5::word.description'))) !!}
