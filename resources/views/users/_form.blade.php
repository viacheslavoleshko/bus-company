<div class="form-group">
    <label>{{ __('Firstname') }}</label>
<input type="text" name="firstname" class="form-control" value="{{ old('firstname', $driver->firstname ?? null) }}"/>
</div>

<div class="form-group">
    <label>{{ __('Lastname') }}</label>
    <input type="text" name="lastname" class="form-control" value="{{ old('lastname', $driver->lastname ?? null) }}"/>
</div>

<div class="form-group">
    <label>{{ __('Email') }}</label>
    <input type="email" name="email" class="form-control" value="{{ old('email', $driver->email ?? null) }}"/>
</div>

<div class="form-group">
    <label>{{ __('Date of birth') }}</label>
    <input type="date" name="birth_date" class="form-control" value="{{ old('birth_date', isset($driver) ? $driver->birth_date->format('Y-m-d') : null) }}"/>
</div>

<div class="form-group">
    <label>{{ __('salary') }}</label>
    <input type="text" name="salary" class="form-control" value="{{ old('salary', $driver->salary ?? null) }}"/>
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