@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            @foreach ($buses as $bus)
                <div class="card">
                    <div class="card-header">{{ $bus->carBrand->brand_name }}</div>

                    <div class="card-body">
                        <div class="card-title">{{ __('Driver') }}: {{ ucfirst($bus->user->firstname) ?? null}} {{ ucfirst($bus->user->lastname) ?? null }}</div>
                        <div class="card-title">{{ __('License Plate') }}: {{ $bus->license_plate }}</div>
                    </div>
                </div>
                @role('admin')
                    <a href="{{ route('buses.edit', ['bus' => $bus->id]) }}" class="btn btn-primary">{{ __('Edit') }}</a>
                    <form method="POST" class="d-inline" action="{{ route('buses.destroy', ['bus' => $bus->id]) }}">
                        @csrf
                        @method('DELETE')

                        <input type="submit" value="{{ __('Delete') }}" class="btn btn-danger" />
                    </form>
                @endrole
            @endforeach
            @role('admin')
                <a href="{{ route('buses.create', ['bus' => $bus->id]) }}" class="btn btn-success">{{ __('Create') }}</a>
            @endrole
        </div>
    </div>
</div>
@endsection
