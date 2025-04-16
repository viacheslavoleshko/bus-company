<div class="form-group">
    <label>{{ __('License Plate') }}</label>
<input type="text" name="license_plate" class="form-control" value="{{ old('license_plate', $bus->license_plate ?? null) }}"/>
</div>

<div class="form-group">
    <label for="inputCarBrand">{{ __('Brand Name') }}</label>
    <select id="inputCarBrand" name="brand_id" class="form-control custom-select" value="{{ old('brand_id', $bus->brand_id ?? null) }}">
        <option selected disabled>{{ __('select')}}</option>
        @foreach ($brands as $brand)
            <option value="{{ $brand->id }}" {{ isset($bus) && $bus->brand_id !== $brand->id ? : 'selected' }}>{{ $brand->brand_name }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="inputDriver">{{ __('Driver') }}</label>
    <select id="inputDriver" name="user_id" class="form-control custom-select" value="{{ old('user_id', $bus->user_id ?? null) }}">
        <option selected disabled>{{ __('select')}}</option>
        @foreach ($drivers as $driver)
            <option value="{{ $driver->id }}" {{ isset($bus) && $bus->user_id !== $driver->id ? : 'selected' }}>{{ ucfirst($driver->firstname) }} {{ ucfirst($driver->lastname) }}</option>
        @endforeach
    </select>
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