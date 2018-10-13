<div class="form-group row">
    <label for="field_type" class="col-md-2 col-form-label text-md-right">{{ __('Field Type') }}</label>
    <div class="col-md-10">
        <input
            id="field_type"
            type="text"
            class="form-control{{ $errors->has('field_type') ? ' is-invalid' : '' }}"
            name="field_type"
            value="{{ old('field_type', isset($field['field_type']) ? $field['field_type'] : '') }}">

        @if ($errors->has('title'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('title') }}</strong>
            </span>
        @endif
    </div>
</div>

<!-- Field title -->
<div class="form-group row">
    <label for="title" class="col-md-2 col-form-label text-md-right">{{ __('Title') }}</label>
    <div class="col-md-10">
        <input
            id="title"
            type="text"
            class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}"
            name="title"
            value="{{ old('title', isset($field['title']) ? $field['title'] : '') }}">

        @if ($errors->has('title'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('title') }}</strong>
            </span>
        @endif
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
            id="place_holder"
            type="text"
            class="form-control{{ $errors->has('place_holder') ? ' is-invalid' : '' }}"
            name="place_holder"
            value="{{ old('place_holder', isset($field['place_holder']) ? $field['place_holder'] : '') }}">

        @if ($errors->has('place_holder'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('place_holder') }}</strong>
            </span>
        @endif
    </div>
</div>

<!-- Field placeholder text -->
<div class="form-group row">
    <label for="title" class="col-md-2 col-form-label text-md-right">{{ __('Help Text') }}</label>
    <div class="col-md-10">
        <input
            id="title"
            type="text"
            class="form-control{{ $errors->has('help_text') ? ' is-invalid' : '' }}"
            name="title"
            value="{{ old('help_text', isset($field['help_text']) ? $field['help_text'] : '') }}">

        @if ($errors->has('help_text'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('help_text') }}</strong>
            </span>
        @endif
    </div>
</div>

<!-- Field description -->
<div class="form-group row">
    <label for="description" class="col-md-2 col-form-label text-md-right">{{ __('Description') }}</label>
    <div class="col-md-10">
        <textarea
            id="description"
            class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}"
            name="description">{{ old('description', isset($field['description']) ? $field['description'] : '') }}</textarea>
        @if ($errors->has('description'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('description') }}</strong>
            </span>
        @endif
    </div>
</div>

<!-- Submit Button -->
<div class="form-group row">
    <div class="offset-md-2 col-md-10">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</div>
