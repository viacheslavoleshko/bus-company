@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('buses.store') }}" enctype="multipart/form-data">
        @csrf

        @include('buses._form')

        <button class="btn btn-primary btn-block" type="submit">{{ __('Create!') }}</button>
    </form>
@endsection