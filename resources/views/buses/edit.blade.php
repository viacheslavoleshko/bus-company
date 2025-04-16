@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('buses.update', ['bus' => $bus->id]) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @include('buses._form')

        <button class="btn btn-primary btn-block" type="submit">{{ __('Update!') }}</button>
    </form>
@endsection