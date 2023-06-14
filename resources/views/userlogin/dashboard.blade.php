@extends('layouts_userlogin.main')
@section('container')

<h3 class="mt-4">{{ $title }}</h3>
<hr>
<div class="jumbotron">
    @if(isset($penonton->name))
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
    @else
    <h2>Super User / Admin</h2>
    @endif
</div>

@endsection