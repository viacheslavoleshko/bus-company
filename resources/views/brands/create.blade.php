@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('brands.store') }}" enctype="multipart/form-data">
        @csrf

        @include('brands._form')

        <button class="btn btn-primary btn-block" type="submit">{{ __('Create!') }}</button>
    </form>
@endsection