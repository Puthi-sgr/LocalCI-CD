@extends('layouts.app')

@section('content')
   <h1 style="text-align: center">Vendors</h1>

   @if(session('status'))
      <div style="color:green; text-align: center">
        {{ session('status') }}
      </div>
   @endif

   <p style="text-align: center">
      <a href="{{ route('vendors.create') }}"
        style="background-color: green; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none">+
        Create Vendor</a>
   </p>

   <table style="width: 100%; border-collapse: collapse; border: 1px solid black">
      <thead>
        <tr style="background-color: gray; color: white">
          <th style="padding: 10px">ID</th>
          <th style="padding: 10px">Name</th>
          <th style="padding: 10px">Email</th>
          <th style="padding: 10px">Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse($vendors as $vendor)
         <tr>
           <td style="padding: 10px">{{ $vendor->id }}</td>
           <td style="padding: 10px">{{ $vendor->name }}</td>
           <td style="padding: 10px">{{ $vendor->email }}</td>
           <td style="padding: 10px">
            <a href="{{ route('vendors.edit', $vendor) }}"
               style="background-color: blue; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none">Edit</a>
            <form method="POST" action="{{ route('vendors.destroy', $vendor) }}"
               onSubmit="return confirm('Are you sure?');">
               @csrf
               @method('DELETE')
               <button type="submit"
                style="background-color: red; color: white; padding: 10px 20px; border-radius: 5px">Delete
                vendor</button>
            </form>
           </td>
         </tr>
       @empty
         <tr>
           <td style="padding: 10px; text-align: center" colspan="4">No vendors found</td>
         </tr>
       @endforelse
      </tbody>
   </table>


@endsection