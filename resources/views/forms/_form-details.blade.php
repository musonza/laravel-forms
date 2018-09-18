<!-- Form name -->
<div class="form-group row">
    <label for="title" class="col-md-2 col-form-label text-md-right">{{ __('Title') }}</label>
    <div class="col-md-10">
        <input
            id="title"
            type="text"
            class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}"
            name="title"
            value="{{ old('title', isset($form['title']) ? $form['title'] : '') }}">

        @if ($errors->has('title'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('title') }}</strong>
            </span>
        @endif
    </div>
</div>

<!-- Form description -->
<div class="form-group row">
    <label for="description" class="col-md-2 col-form-label text-md-right">{{ __('Description') }}</label>
    <div class="col-md-10">
        <textarea
            id="description"
            class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}"
            name="description">{{ old('description', isset($form['description']) ? $form['description'] : '') }}</textarea>
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
