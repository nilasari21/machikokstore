@extends('backpack::layout')



@section('content')

        <div class="panel panel-card" >
        <div class="row">
          @section('header')
          <section class="content-header">
            <h1>
              {{ ('Ready Stock') }}<small>{{ ('Semua Produk Ready Stock') }}</small>
            </h1>
            <!-- <ol class="breadcrumb">
              <li><a href="{{ url(config('backpack.base.route_prefix', 'admin')) }}">{{ config('backpack.base.project_name') }}</a></li>
              <li class="active">{{ trans('backpack::base.readystock') }}</li>
            </ol> -->
          </section>
      @endsection

        <section style="margin-right:30px; text-align:right">
         <a href="{{ url(config('backpack.base.route_prefix', 'admin').'/readystock/tambahrs') }}" class="btn btn-fw btn-info waves-effect waves-effect">Tambah</a>
        </section >
   </div>
<br/>
       
    <div class="box-body table-responsive margin">                   
    <table id="example1" class="table table-bordered table-hover dataTable table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nama Produk</th>
          <th>Kategori</th>
          <th>Stock Total</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
       
       @foreach ($data as $row)
        <tr>
          <td>{{ $row->id }}</td>
          <td>{{ $row->nama_produk }}</td>
          <td>{{ $row->nama_kategori }}</td>
          <td>{{ $row->stock_total }}</td>
          
          <td>
             <a class="btn btn-success" href="#">Detail</a>
            <a class="btn btn-info" href="#">Edit</a>
            <a class="btn btn-danger" href="#" onclick="return confirm('Are you sure to delete this data?')">Hapus</a>
         </td>
        </tr>
       @endforeach
      </tbody>
    </table>
  </div>
    </div>
    @endsection