@extends('layouts.main')
@section('container')

<h1>Showing {{ $penonton->name }}</h1>

<div class="jumbotron">
    <table class="table table-striped" style="width: 40%;">
        <tr>
            <td> <strong>Fullname:</strong></td>
            <td>:</td>
            <td>{{ $penonton->name }} </td>
        </tr>
        <tr>
            <td> <strong>Gender:</strong> </td>
            <td>:</td>
            <td>{{ $penonton->gender }} </td>
        </tr>
        <tr>
            <td> <strong>Address:</strong> </td>
            <td>:</td>
            <td>{{ $penonton->address }} </td>
        </tr>
        <tr>
            <td> <strong>Phone:</strong> </td>
            <td>:</td>
            <td>{{ $penonton->phone }} </td>
        </tr>
        <tr>
            <td> <strong>Email:</strong> </td>
            <td>:</td>
            <td>{{ $penonton->email }} </td>
        </tr>
    </table>
</div>

@endsection