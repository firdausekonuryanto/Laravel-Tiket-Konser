@extends('layouts_userlogin.main')
@section('container')

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>

<style>
    #goyangImg {
        max-width: 300px;
        max-height: 300px;
        animation: goyang 2s ease-in-out infinite;
    }

    @keyframes goyang {
        0% {
            transform: translateX(-5px);
        }

        50% {
            transform: translateX(5px);
        }

        100% {
            transform: translateX(-5px);
        }
    }
</style>

<h3 class="mt-4">{{ $title }}</h3>
<hr>
@if (Session::has('message'))
<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

@if(!empty($tiket_validasi[0]->id_tiket))
<div class="container">
    <table id="example" class="table table-striped table-bordered">
        <thead style="background-color:#d9d9d9;font-weight:bold;" class="text-center">
            <tr>
                <td>No</td>
                <td>Name</td>
                <td>Gender</td>
                <td>Address</td>
                <td>Phone</td>
                <td>ID Tiket</td>
                <td>Actions</td>
            </tr>
        </thead>
        <tbody>
            @foreach($tiket_validasi as $key => $value)
            <tr>
                <td>{{$key+1}}</td>
                <td style="white-space: nowrap;">{{$value->penonton->name}}</td>
                <td>{{$value->penonton->gender}}</td>
                <td>{{$value->penonton->address}}</td>
                <td style="white-space: nowrap;">{{$value->penonton->phone}}</td>
                <td>
                    <font style="font-size: 24px;; font-weight:bold">{{ $value->id_tiket }}</font>
                </td>
                <td style="white-space: nowrap;">
                    @if($value->sts_pemakaian == 0)
                    <a class="btn btn-small btn-success" onclick="isi_modal('{{ $value->id_tiket }}','{{ $value->penonton->name }}','{{ $value->penonton->gender }}','{{ $value->penonton->phone }}')" id="my_modal" data-id="{{ $value->name }}" data-toggle="modal" data-target="#exampleModal">Check
                        In</a>
                    @else
                    <a class="btn btn-small btn-secondary">In Room</a>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@else
<div class="container" align="center" style="margin-top: 120px;">
    <img src="/img/not found.jpg" class="mb-3" style="width: 30%;" id="goyangImg">
    <h3>Maaf, Data Belom ada untuk ditampilkan.</h3>
</div>
@endif

<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" action="/check_in">
            @csrf
            <input type="hidden" name="input_code" id="id_tiketx">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title : </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <span style="font-size: 24px; font-weight:bold" id="id_tiket"></span>
                    <hr>
                    <span id="name"></span><br>
                    <span id="gender"></span><br>
                    <span id="phone"></span><br>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Check in Sekarang</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    function isi_modal(id_tiket, name, gender, phone) {
        document.getElementById('id_tiket').innerHTML = "ID Tiket : " + id_tiket;
        document.getElementById('id_tiketx').value = id_tiket;
        document.getElementById('name').innerHTML = "Name : " + name;
        document.getElementById('gender').innerHTML = "Gender : " + gender;
        document.getElementById('phone').innerHTML = "Phone : " + phone;

    }

    window.addEventListener('DOMContentLoaded', function() {
        var img = document.getElementById('goyangImg');
        img.addEventListener('mouseover', function() {
            img.style.animationPlayState = 'paused';
        });
        img.addEventListener('mouseout', function() {
            img.style.animationPlayState = 'running';
        });
    });
</script>

@endsection