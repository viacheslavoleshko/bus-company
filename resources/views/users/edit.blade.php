@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('drivers.update', ['driver' => $driver->id]) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @include('users._form')

        <button class="btn btn-primary btn-block" type="submit">{{ __('Update!') }}</button>
    </form>
@endsection