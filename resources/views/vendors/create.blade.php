@extends('layouts.app')

@section('content')
    @if ($errors->any())
        <div style="color:red;">
            <strong>Please fix the following:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <h1>
        Create new vendor
    </h1>
    <form method="POST" action=" {{  route('vendors.store') }}">
        @csrf
        @include('vendors._form', ['vendor' => $vendor])
        <button type="submit">Create</button>
    </form>

@endsection