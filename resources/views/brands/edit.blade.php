@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('brands.update', ['brand' => $brand->id]) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @include('brands._form')

        <button class="btn btn-primary btn-block" type="submit">{{ __('Update!') }}</button>
    </form>
@endsection