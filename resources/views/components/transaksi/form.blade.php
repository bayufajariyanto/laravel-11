@extends('layouts.main')

@section('container')
<div class="container px-5">
    <div class="my-3">
        <span class="display-6">{{ $title }}</span>
        {{-- @if($tipe == 'edit') --}}
        {{-- <span class="display-6">{{ $title }}</span> --}}
    </div>
    <form method="POST" action="{{ $tipe == 'create' ? route('transaksi.store') : route('transaksi.update') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="mb-3">
            <label for="barang" class="form-label">Barang</label>
            <select class="form-select" aria-label="Small select example" id="barang" name="id_barang">
                @if(isset($id_barang) && $id_barang)
                <option value="{{ $id_barang }}" selected>{{ $barang->firstWhere('id_barang', $id_barang)['nama_barang'] }}</option>
                @else
                <option value="">-- Pilih Barang --</option>
                @endif

                @if($tipe == 'create')

                @foreach($barang as $item)
                <option value="{{ $item['id_barang'] }}" {{ old('id_barang', !$errors->has('id_barang') ? null : old('id_barang')) == $item['id_barang'] ? 'selected' : '' }}>{{ $item['nama_barang'] }}</option>
                @endforeach

                @else

                @foreach($barang->where('id_barang', '!=', $id_barang) as $item)
                <option value="{{ $item['id_barang'] }}" {{ old('id_barang', !$errors->has('id_barang') ? null : old('id_barang')) == $item['id_barang'] ? 'selected' : '' }}>{{ $item['nama_barang'] }}</option>
                @endforeach

                @endif
            </select>
            @error('id_barang')
            <div class="alert alert-danger mt-2">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="pembeli" class="form-label">Pembeli</label>
            <select class="form-select" aria-label="Small select example" id="pembeli" name="id_pembeli">
                @if(isset($id_pembeli) && $id_pembeli)
                <option value="{{ $id_pembeli }}" selected>{{ $pembeli->firstWhere('id_pembeli', $id_pembeli)['nama_pembeli'] }}</option>
                @else
                <option value="">-- Pilih Pembeli --</option>
                @endif

                @if($tipe == 'create')

                @foreach($pembeli as $item)
                <option value="{{ $item['id_pembeli'] }}" {{ old('id_pembeli', !$errors->has('id_pembeli') ? null : old('id_pembeli')) == $item['id_pembeli'] ? 'selected' : '' }}>{{ $item['nama_pembeli'] }}</option>
                @endforeach
                
                @else

                @foreach($pembeli->where('id_pembeli', '!=', $id_pembeli) as $item)
                <option value="{{ $item['id_pembeli'] }}" {{ old('id_pembeli', !$errors->has('id_pembeli') ? null : old('id_pembeli')) == $item['id_pembeli'] ? 'selected' : '' }}>{{ $item['nama_pembeli'] }}</option>
                @endforeach

                @endif
            </select>
            @error('id_pembeli')
            <div class="alert alert-danger mt-2">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input class="form-control" type="date" max="{{ date('Y-m-d') }}" id="tanggal" value="{{ !empty($tanggal) ? $tanggal : old('tanggal') }}" name="tanggal"/>
            @error('tanggal')
            <div class="alert alert-danger mt-2">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <textarea class="form-control" id="keterangan" rows="3" name="keterangan">{{ (!empty($keterangan) && $keterangan != null) ? $keterangan : (old('keterangan') ?: '') }}</textarea>
            @error('keterangan')
            <div class="alert alert-danger mt-2">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="d-flex justify-content-end">
            @if($tipe == 'edit')
            <input class="form-control" type="hidden" id="id_transaksi" value="{{ !empty($id_transaksi) ? $id_transaksi : old('id_transaksi') }}" name="id_transaksi"/>
            @endif
            <button class="btn btn-primary" type="submit">Simpan</button>
        </div>
    </form>
</div>
@endsection