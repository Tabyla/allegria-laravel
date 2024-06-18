<div class="form-group">
    <label for="name" class="control-label">Название товара</label>
    <input class="form-control" name="product-name" type="text" id="product-name"
           value="{{ old('name', $product->name) }}">
    {!! $errors->first('product-name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group">
    <label for="price" class="control-label">Цена</label>
    <input type="number" name="price" id="price" class="form-control" placeholder="0.01" step="0.01"
           value="{{ old('price', $product->price) }}">
    {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group">
    <label for="description">Описание</label>
    <textarea name="description" id="description"
              class="form-control">{{ old('description', $product->description) }}</textarea>
    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group">
    <label for="brand_id">Бренд</label>
    <select name="brand_id" id="brand_id" class="form-control">
        <option value="">Выберите бренд</option>
        @foreach($brands as $brand)
            <option value="{{ $brand->id }}" {{ $product->brand_id == $brand->id ? 'selected' : '' }}>
                {{ $brand->name }}
            </option>
        @endforeach
    </select>
    {!! $errors->first('brand_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group">
    <label for="category_id">Категория</label>
    <select name="category_id" id="category_id" class="form-control">
        <option value="">Выберите категорию</option>
        @foreach($mainCategories as $mainCategory)
            <optgroup label="{{ $mainCategory->name }}">
                @foreach($subCategories as $subCategory)
                    @if($subCategory->parent_id == $mainCategory->id)
                        <option value="{{ $subCategory->id }}"
                            {{ $product->category_id == $subCategory->id ? 'selected' : '' }}>
                            {{ $subCategory->name }}
                        </option>
                    @endif
                @endforeach
            </optgroup>
        @endforeach
    </select>
    {!! $errors->first('category_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group">
    <label for="image">Загрузите основное изображение:</label>
    <input type="file" name="image_path" id="image_path" class="form-control-file" onchange="previewImage(event)">
</div>
<div class="form-group">
    @if($product->mainImage)
        <img id="preview" src="{{ asset('images/products/' . $product->mainImage->image_path) }}"
             alt="Предварительный просмотр" class="img-fluid">
    @else
        <img id="preview" src="" alt="Предварительный просмотр" class="img-fluid" style="display: none">
    @endif
</div>
{!! $errors->first('image_path', '<p class="help-block">:message</p>') !!}

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




