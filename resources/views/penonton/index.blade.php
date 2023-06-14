@extends('layouts.main')
@section('container')

<h1>Semua Penonton</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead style="background-color:#d9d9d9;font-weight:bold;" class="text-center">
        <tr>
            <td>No</td>
            <td>Name</td>
            <td>Gender</td>
            <td>Address</td>
            <td>Phone</td>
            <td>Email</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
        @foreach($penonton as $key => $value)
        <tr>
            <td>{{ $key+1 }}</td>
            <td style="white-space: nowrap;">{{ $value->name }}</td>
            <td>{{ $value->gender }}</td>
            <td>{{ $value->address }}</td>
            <td style="white-space: nowrap;">{{ $value->phone }}</td>
            <td>{{ $value->email }}</td>
            <td style="white-space: nowrap;">
                <form method="post" action="{{ url('/penonton/'.$value->id) }}">
                    @method('delete')
                    @csrf
                    <a class="btn btn-small btn-success" href="{{ URL::to('penonton/' . $value->id) }}">Show</a>
                    <a class="btn btn-small btn-info" href="{{ URL::to('penonton/' . $value->id . '/edit') }}">Edit</a>
                    <button type="submit" class="btn btn-small btn-danger" href="{{ URL::to('penonton/' . $value->id) }}">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection