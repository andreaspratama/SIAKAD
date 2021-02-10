@extends('layouts.admin.admin')

@section('title')
    Tambah Data Penilaian Guru
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tambah Penilaian Guru</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-body">
            <form action="{{route('penilaianguru.store')}}" method="POST">
              @csrf
              <div class="form-group">
                <label for="exampleInputEmail1" class="mr-5">1. Email address</label> <br>
                <div class="custom-control custom-radio custom-control-inline ml-3">
                  <input type="radio" id="customRadioInline1" name="customRadioInline" class="custom-control-input">
                  <label class="custom-control-label" for="customRadioInline1">1</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline ml-3">
                  <input type="radio" id="customRadioInline2" name="customRadioInline" class="custom-control-input">
                  <label class="custom-control-label" for="customRadioInline2">2</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline ml-3">
                  <input type="radio" id="customRadioInline3" name="customRadioInline" class="custom-control-input">
                  <label class="custom-control-label" for="customRadioInline3">3</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline ml-3">
                  <input type="radio" id="customRadioInline4" name="customRadioInline" class="custom-control-input">
                  <label class="custom-control-label" for="customRadioInline4">4</label>
                </div>
              </div>
              <button type="submit" class="btn btn-success btn-sm">Simpan</button>
              <button type="reset" class="btn btn-warning btn-sm">Reset</button>
              <a href="{{route('penilaianguru.index')}}" class="btn btn-secondary btn-sm">Kembali</a>
            </form>
          </div>
        </div>

      </div>
      <!-- /.container-fluid -->
@endsection