@extends('layouts.app')

@section('content')

    @if($errors->any())
        <div style="color:red;">
            <strong>Please fix the following:</strong>
            <ul style="list-style-type:disc;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <h1 style="text-align:center;">
        Edit Vendor
    </h1>
    <form style="display:flex;flex-direction:column;align-items:center;" method="POST" action="{{ route('vendors.update', $vendor) }}">
        @csrf
        @method('PUT')
        @include('vendors._form', ['vendor' => $vendor])
        <button type='submit' style="background-color:#4CAF50;color:white;padding:14px 25px;text-align:center;text-decoration:none;display:inline-block;">Update</button>
    </form>

@endsection

