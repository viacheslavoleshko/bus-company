@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            @foreach ($drivers as $driver)
                <div class="card">
                    <div class="card-header">{{ ucfirst($driver->firstname) }} {{ ucfirst($driver->lastname) }}</div>

                    <div class="card-body">
                    <div class="card-title">{{ __('Email') }}: {{ $driver->email }}</div>
                        <div class="card-title">{{ __('Birth date') }}: {{ $driver->birth_date }}</div>
                        <div class="card-title">{{ __('Bus') }}: {{ $driver->bus->carBrand->brand_name ?? null }}</div>
                        <div class="card-title">{{ __('License Plate') }}: {{ $driver->bus->license_plate ?? null }}</div>
                        <div class="card-title">{{ __('Salary') }}: {{ $driver->salary ?? null }} {{ __('UAH') }}</div>
                    </div>
                </div>
                @role('admin')
                    <a href="{{ route('drivers.edit', ['driver' => $driver->id]) }}" class="btn btn-primary">{{ __('Edit') }}</a>
                    @if (!$driver->trashed())
                        <form method="POST" class="d-inline" action="{{ route('drivers.destroy', ['driver' => $driver->id]) }}">
                            @csrf
                            @method('DELETE')

                            <input type="submit" value="{{ __('Delete') }}" class="btn btn-danger" />
                        </form>
                    @endif
                @endrole
            @endforeach
            @role('admin')
                <a href="{{ route('drivers.create', ['driver' => $driver->id]) }}" class="btn btn-success">{{ __('Create') }}</a>
            @endrole
        </div>
    </div>
</div>
@endsection
