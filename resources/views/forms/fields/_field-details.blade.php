<div class="form-group row">
    <label for="field_type" class="col-md-2 col-form-label text-md-right">{{ __('Field Type') }}</label>
    <div class="col-md-10">
        <select
                class="form-control select2"
                id="field_type"
                name="field_type"
                onchange="formFieldTypeChanged()"
                placeholder="Select...">
            @foreach ($fieldTypes['data'] as $type)
                <option
                value="{{ $type['id'] }}"
                @if(isset($field['field_type']) && $field['field_type'] == $type['id']) selected @endif
                >{{ $type['title'] }}</option>
            @endforeach
        </select>
    </div>
</div>

<!-- Field label -->
<div class="form-group row">
    <label for="label" class="col-md-2 col-form-label text-md-right">{{ __('Label') }}</label>
    <div class="col-md-10">
        <input
            id="label"
            type="text"
            class="form-control{{ $errors->has('label') ? ' is-invalid' : '' }}"
            name="label"
            value="{{ old('label', isset($field['label']) ? $field['label'] : '') }}">

        @if ($errors->has('label'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('label') }}</strong>
            </span>
        @endif
    </div>
</div>

<!-- Field placeholder text -->
<div class="form-group row">
    <label for="place_holder" class="col-md-2 col-form-label text-md-right">{{ __('Placeholder') }}</label>
    <div class="col-md-10">
        <input
            id="placeholder"
            type="text"
            class="form-control{{ $errors->has('placeholder') ? ' is-invalid' : '' }}"
            name="placeholder"
            value="{{ old('placeholder', isset($field['placeholder']) ? $field['placeholder'] : '') }}">

        @if ($errors->has('placeholder'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('placeholder') }}</strong>
            </span>
        @endif
    </div>
</div>

<!-- Field placeholder text -->
<div class="form-group row">
    <label for="title" class="col-md-2 col-form-label text-md-right">{{ __('Help Text') }}</label>
    <div class="col-md-10">
        <input
            id="help_text"
            type="text"
            class="form-control{{ $errors->has('help_text') ? ' is-invalid' : '' }}"
            name="help_text"
            value="{{ old('help_text', isset($field['help_text']) ? $field['help_text'] : '') }}">

        @if ($errors->has('help_text'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('help_text') }}</strong>
            </span>
        @endif
    </div>
</div>

<!-- Field default value -->
<div class="form-group row">
    <label for="default_value" class="col-md-2 col-form-label text-md-right">{{ __('Default Value') }}</label>
    <div class="col-md-10">
        <input
            id="default_value"
            type="text"
            class="form-control{{ $errors->has('default_value') ? ' is-invalid' : '' }}"
            name="default_value"
            value="{{ old('default_value', isset($field['default_value']) ? $field['default_value'] : '') }}">
        @if ($errors->has('default_value'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('default_value') }}</strong>
            </span>
        @endif
    </div>
</div>

<div id="field_choices">
@include('laravel-forms::forms.fields._field-choices')
</div>

<!-- Spacing -->

<!-- Columns -->
<div class="form-group row">
    <label for="columns_count" class="col-md-2 col-form-label text-md-right">{{ __('Columns') }}</label>
    <div class="col-md-10">
        <input
            id="columns_count"
            type="number"
            min="1"
            max="12"
            class="form-control{{ $errors->has('columns_count') ? ' is-invalid' : '' }}"
            name="columns_count"
            value="{{ old('columns_count', isset($field['columns_count']) ? $field['columns_count'] : '12') }}">

        @if ($errors->has('columns_count'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('columns_count') }}</strong>
            </span>
        @endif
    </div>
</div>
