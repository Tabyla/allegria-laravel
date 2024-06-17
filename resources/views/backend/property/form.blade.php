<div class="form-group">
    <label for="name" class="control-label">Название</label>
    <input class="form-control" name="property-name" type="text" id="property-name" value="{{ old('name', $property->name) }}">
    {!! $errors->first('property-name', '<p class="help-block">:message</p>') !!}
</div>



