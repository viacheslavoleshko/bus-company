@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            @foreach ($brands as $brand)
                <div class="card">
                    <div class="card-header">{{ $brand->brand_name }}</div>

                    <div class="card-body">
                        @foreach ($brand->buses as $bus)
                            <div class="card-title"></di> {{ $bus->license_plate ?? null }}</div>
                        @endforeach
                    </div>
                </div>
                @role('admin')
                    <a href="{{ route('brands.edit', ['brand' => $brand->id]) }}" class="btn btn-primary">{{ __('Edit') }}</a>
                    <form method="POST" class="d-inline" action="{{ route('brands.destroy', ['brand' => $brand->id]) }}">
                        @csrf
                        @method('DELETE')

                        <input type="submit" value="{{ __('Delete') }}" class="btn btn-danger" />
                    </form>
                @endrole
            @endforeach
            @role('admin')
                <a href="{{ route('brands.create', ['brand' => $brand->id]) }}" class="btn btn-success">{{ __('Create') }}</a>
            @endrole
        </div>
    </div>
</div>
@endsection
