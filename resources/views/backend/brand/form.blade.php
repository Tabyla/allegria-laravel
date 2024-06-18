<div class="form-group">
    <label for="name" class="control-label">Название</label>
    <input class="form-control" name="brand-name" type="text" id="brand-name" value="{{ old('name', $brand->name) }}">
    {!! $errors->first('brand-name', '<p class="help-block">:message</p>') !!}
</div>



