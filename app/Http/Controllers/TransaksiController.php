<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Pembayaran;
use App\Models\Pembeli;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Throwable;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transaksi = Transaksi::with(["pembeli", "barang", "pembayaran"])->orderByDesc("tanggal")->get();

        return view('pages.transaksi', [
            "title" => "Transaksi",
            "data"  => $transaksi,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $barang     = Barang::select("id_barang", "nama_barang")->get();
        $pembeli    = Pembeli::select("id_pembeli", "nama_pembeli")->get();

        return view('components.transaksi.form', [
            "title"     => "Tambah Data",
            "tipe"      => "create",
            "barang"    => $barang,
            "pembeli"   => $pembeli,
            "tanggal"   => date("Y-m-d"),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $validatedData = $request->validate([
                'id_barang'     => 'required',
                'id_pembeli'    => 'required',
                'tanggal'       => 'required',
                'keterangan'    => 'required',
            ]);

            $tgl = $request['tanggal'];
            if (strtotime($tgl) > time()) :
                return toastr()->error('Tanggal tidak boleh melebihi hari ini');
            endif;

            $data = [
                'id_barang'     => (int) $request['id_barang'],
                'id_pembeli'    => (int) $request['id_pembeli'],
                'tanggal'       => $request['tanggal'],
                'keterangan'    => $request['keterangan'],
            ];

            $transaksi = Transaksi::create($data);

            Pembayaran::create([
                'tgl_bayar'     => $request['tanggal'],
                'total_bayar'   => Barang::find($transaksi->id_barang)->harga,
                'id_transaksi'  => $transaksi->id_transaksi,
            ]);
            DB::commit();

            toastr()->success('Data Transaksi Berhasil Disimpan');
            return response()->redirectTo("/");
        } catch (Throwable $th) {
            DB::rollBack();
            return toastr()->error('Data Transaksi Berhasil Disimpan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $transaksi = Transaksi::find($id);

        if ($transaksi == null) :
            toastr()->error('Data Tidak Ditemukan');
            return response()->redirectTo("/");
        endif;
        // $barang     = Barang::select("id_barang", "nama_barang")->where('id_barang', '!=', @$transaksi->id_barang)->get();
        // $pembeli    = Pembeli::select("id_pembeli", "nama_pembeli")->where('id_pembeli', '!=', @$transaksi->id_pembeli)->get();
        $barang     = Barang::select("id_barang", "nama_barang")->get();
        $pembeli    = Pembeli::select("id_pembeli", "nama_pembeli")->get();

        return view('components.transaksi.form', [
            "title"         => "Edit Data",
            "tipe"          => "edit",
            "id_transaksi"  => @$transaksi->id_transaksi,
            "id_barang"     => @$transaksi->id_barang,
            "id_pembeli"    => @$transaksi->id_pembeli,
            "tanggal"       => @$transaksi->tanggal,
            "keterangan"    => @$transaksi->keterangan,
            "barang"        => $barang,
            "pembeli"       => $pembeli,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        try {
            if (!isset($request['id_transaksi']) || empty($request['id_transaksi'])) :
                toastr()->error('Terjadi Kesalahan');
                return response()->redirectTo("/");
            endif;
            DB::beginTransaction();
            $validatedData = $request->validate([
                'id_barang'     => 'required',
                'id_pembeli'    => 'required',
                'tanggal'       => 'required',
                'keterangan'    => 'required',
            ]);

            $tgl = $request['tanggal'];
            if (strtotime($tgl) > time()) :
                return toastr()->error('Tanggal tidak boleh melebihi hari ini');
            endif;

            $data = [
                'id_barang'     => (int) $request['id_barang'],
                'id_pembeli'    => (int) $request['id_pembeli'],
                'tanggal'       => $request['tanggal'],
                'keterangan'    => $request['keterangan'],
            ];

            $transaksi = Transaksi::where("id_transaksi", (int) $request['id_transaksi'])->update($data);

            DB::commit();

            toastr()->success('Data Transaksi Berhasil Diubah');
            return response()->redirectTo("/");
        } catch (Throwable $th) {
            DB::rollBack();
            return toastr()->error('Data Transaksi Berhasil Diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaksi $transaksi)
    {
        //
    }

    public function delete($id)
    {
        try {
            DB::beginTransaction();
            Transaksi::where('id_transaksi', $id)->delete();
            DB::commit();
            toastr()->success('Data Transaksi Berhasil Dihapus');
            return response()->redirectTo("/");
        } catch (Throwable $th) {
            DB::rollBack();
            return toastr()->error('Data Transaksi Gagal Dihapus');
        }
    }
}
