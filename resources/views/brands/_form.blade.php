<div class="form-group">
    <label>{{ __('Brand name') }}</label>
<input type="text" name="brand_name" class="form-control" value="{{ old('brand_name', $brand->brand_name ?? null) }}"/>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif