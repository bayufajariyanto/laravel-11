@extends('layouts.main')

@section('container')
<div class="container">
  <div class="d-flex justify-content-between">
    <div class="my-4">
      <span class="display-5">Transaksi Pembayaran</span>
    </div>
    <div class="mt-5">
      <a href="{{ route('transaksi.create') }}" class="btn btn-primary">Tambah Data</a>
    </div>
  </div>
  <div class="table-responsive">
    <table class="table table-bordered table-hover table-sm">
      <thead class="table-dark">
        <tr class="text-center">
          <th>Tanggal</th>
          <th>Nama Barang</th>
          <th>Nama Pembeli</th>
          <th>Keterangan</th>
          <th>Total</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @if(count($data) == 0)
        <tr>
          <td class="text-center" colspan="6">Data tidak ditemukan</td>
        </tr>
        @endif
        @foreach($data as $item)
        <tr>
          <td class="text-center">{{ $item['tanggal'] }}</td>
          <td>{{ @$item['barang']['nama_barang'] }}</td>
          <td>{{ @$item['pembeli']['nama_pembeli'] }}</td>
          <td>{{ @$item['keterangan'] }}</td>
          <td class="text-end">Rp{{ @$item['pembayaran']['total_bayar'] }}</td>
          <td class="text-end">
            <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
              <a href="{{ url('/edit/' . $item['id_transaksi']) }}" class="btn btn-outline-info">
                <i class="fa-solid fa-edit"></i>
              </a>
              <a href="{{ url('/delete/' . $item['id_transaksi']) }}" class="btn btn-outline-danger">
                <i class="fa-solid fa-trash"></i>
              </a>
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection