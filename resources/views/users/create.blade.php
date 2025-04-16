@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('drivers.store') }}" enctype="multipart/form-data">
        @csrf

        @include('users._form')

        <button class="btn btn-primary btn-block" type="submit">{{ __('Create!') }}</button>
    </form>
@endsection