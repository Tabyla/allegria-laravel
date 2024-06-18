<div class="form-group">
    <label for="image">Загрузите изображение:</label>
    <input type="file" name="image_path" id="image_path" class="form-control-file" onchange="previewImage(event)">
</div>
<div class="form-group">
    <img id="preview" src="{{ $image->image_path ? asset('images/products/' . $image->image_path) : '' }}"
         alt="Предварительный просмотр" class="img-fluid" style="display: {{ $image->image_path ? 'block' : 'none' }}">
</div>
{!! $errors->first('image_path', '<p class="help-block">:message</p>') !!}
<div class="form-group">
    <label for="name" class="control-label">Товар</label>
    <select name="product_id" id="product_id" class="form-control">
        <option value="">Выберите товар</option>
        @foreach($products as $product)
            @if($image->product)
                <option value="{{ $product->id }}" {{ $image->product->id == $product->id ? 'selected' : '' }}>
                    {{ $product->name }}</option>
            @else
                <option value="{{ $product->id }}">{{ $product->name }}</option>
            @endif
        @endforeach
    </select>
    {!! $errors->first('product_id', '<p class="help-block">:message</p>') !!}
</div>

<script>
    function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function () {
            const output = document.getElementById('preview');
            output.src = reader.result;
            output.style.display = 'block';
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>



