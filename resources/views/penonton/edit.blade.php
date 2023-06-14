@extends('layouts.main')
@section('container')

<h1>Edit {{ $penonton->name }}</h1>

<form method="post" action="{{ url('/penonton/'.$penonton->id) }}">
    @method('put')
    @csrf

    <table class="table table-striped" style="width: 40%;">
        <tr>
            <td>Fullname</td>
            <td>:</td>
            <td>
                @error('name')
                <div class="invalid-feedback"> {{ $message }} </div>
                @enderror
                <input type="text" name="name" placeholder="Input your name" value="{{ $penonton->name }}" class="form-control @error('name') is-invalid @enderror" required>
            </td>
        </tr>
        <tr>
            <td>Gender</td>
            <td>:</td>
            <td>
                @error('gender')
                <div class="invalid-feedback"> {{ $message }} </div>
                @enderror
                <br>
                @if($penonton->gender == "Male")
                <input type="radio" name="gender" value="Male" checked>Male
                <input type="radio" name="gender" value="Female">Female
                @else
                <input type="radio" name="gender" value="Male">Male
                <input type="radio" name="gender" value="Female" checked>Female
                @endif
            </td>
        </tr>
        <tr>
            <td>Address</td>
            <td>:</td>
            <td>
                @error('address')
                <div class="invalid-feedback"> {{ $message }} </div>
                @enderror
                <input type="text" name="address" placeholder="Input your address" value="{{ $penonton->address }}" class="form-control @error('address') is-invalid @enderror" required>
            </td>
        </tr>
        <tr>
            <td>Phone</td>
            <td>:</td>
            <td>
                @error('phone')
                <div class="invalid-feedback"> {{ $message }} </div>
                @enderror
                <label><input type="text" name="phone" placeholder="Input your phone" value="{{ $penonton->phone }}" class="form-control @error('phone') is-invalid @enderror" required>
            </td>
        </tr>
        <tr>
            <td>Email</td>
            <td>:</td>
            <td>
                @error('email')
                <div class="invalid-feedback"> {{ $message }} </div>
                @enderror
                <input type="text" name="email" placeholder="Input your email" value="{{ $penonton->email }}" class="
                    form-control @error('email') is-invalid @enderror" required>
            </td>
        </tr>
        <tr>
            <td colspan="3"> <input type="submit" value="Submit" class="btn btn-success"></td>
        </tr>
    </table>
</form>

@endsection