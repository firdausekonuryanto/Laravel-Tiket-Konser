@extends('layouts_userlogin.main')
@section('container')
<h3 class="mt-4">{{ $title }}</h3>
<hr>
<div class="container">
    <div class="row">
        @if(isset($tiket[0]['id_tiket']))
        <div class="col-sm-6 mx-auto text-center">
            <h4><br><br><br>Tiket anda telah terferifikasi silahkan bawa tiket untuk check in pada hari pelaksanaan
        </div>
    </div>
    @else
    <form method="post" action="transaksi">
        @csrf
        <div class="input-group">
            <input type="text" name="input_code" placeholder="Masukkan Kode Pembelian" class="form-control">
            <input type="submit" class="btn btn-success" value="Aktivasi">
        </div>
    </form>
    @endif

    <div class="row mt-4">
        <div class="col-sm-6 mx-auto ">
            @if(isset($tiket[0]['id_tiket']))
            <table class="table table-striped">
                <tr>
                    <td>ID Tiket</td>
                    <td>:</td>
                    <td>{{$tiket[0]['id_tiket']}}</td>
                </tr>
                <tr>
                    <td>Nama Penonton</td>
                    <td>:</td>
                    <td> {{$tiket[0]->penonton['name']}}</td>
                </tr>
                <tr>
                    <td>Phone</td>
                    <td>:</td>
                    <td> {{$tiket[0]->penonton['phone']}}</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>:</td>
                    <td> {{$tiket[0]->penonton['email']}}</td>
                </tr>
                <tr>
                    <td>Tgl Pembelian</td>
                    <td>:</td>
                    <td> {{$tiket[0]['created']}}</td>
                </tr>
                <tr>
                    <td>Sts Pemakaian</td>
                    <td>:</td>
                    <td>
                        @if($tiket[0]['sts_pemakaian'] == 0)
                        <span class="btn btn-success btn-sm">Belum Digunakan</span>
                        @else
                        <span class="btn btn-secondary btn-sm">Sudah Digunakan</span>
                        @endif
                    </td>
                </tr>
            </table>
            @else
            <h3 class="text-center">data tidak ditemukan</h3>
            @endif
        </div>
    </div>
</div>

@endsection