<?php

namespace App\Http\Controllers;

use Auth;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;

use Jenssegers\Date\Date;

use Alert;

use App\User;
use App\Member;
use App\Outlet;
use App\Paket;
use App\Transaksi;
use App\Detail;

class KasirController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function dashboard(){

        $paket = DB::table('paket')->where('id_outlet',Auth::user()->id_outlet)->count();
        $member = DB::table('member')->count();
        $transaksi = DB::table('transaksi')
        ->join('member','transaksi.id_member','member.id_member')
        ->join('outlet','transaksi.id_outlet','outlet.id_outlet')
        ->join('users','transaksi.id_user','users.id')
        ->join('detail_transaksi','transaksi.id_transaksi','detail_transaksi.id_transaksi')
        ->join('paket','detail_transaksi.id_paket','paket.id_paket')
        ->where('transaksi.id_outlet',Auth::user()->id_outlet)->count();
        
        return view('pages/kasir/dashboard',compact('paket','member','transaksi'));
    }
    
    // member
    public function list_member(){
        $member = DB::table('member')->get();

        return view('/pages/kasir/manage_member/list_member',compact('member'));
    }

    public function tambah_member(){

        return view('pages/kasir/manage_member/tambah_member');

    }

    public function upload_member(Request $request){

        $member = Member::create([
            'nama_member'=>$request->nama,
            'alamat_member'=>$request->alamat,
            'jenis_kelamin'=>$request->jenkel,
            'tlp_member'=>$request->tlp,
        ]);

        Alert::success('Berhasil','Berhasil Menambah Member');

        return redirect('/kasir/list_member');

    }
    public function delete_member($id){

        DB::table('member')->where('id_member',$id)->delete();

        Alert::success('Berhasil','Berhasil Menghapus Data Member');

        return redirect('/kasir/list_member');
    }
    public function edit_member($id){

        $member = DB::table('member')->where('id_member',$id)->first();

        return view('/pages/kasir/manage_member/edit_member',compact('member'));

    }
    public function update_member(Request $request){

        $member = DB::table('member')->where('id_member',$request->id)->update([
            'nama_member'=>$request->nama,
            'alamat_member'=>$request->alamat,
            'jenis_kelamin'=>$request->jenkel,
            'tlp_member'=>$request->tlp,
        ]);

        Alert::success('Berhasil','Berhasil Menngubah Data Member');

        return redirect('/kasir/list_member');

    }


    // paket
    public function list_paket(){
        $paket = DB::table('paket')->join('outlet','paket.id_outlet','outlet.id_outlet')->where('paket.id_outlet',Auth::user()->id_outlet)->get();

        return view('/pages/kasir/manage_paket/list_paket',compact('paket'));
    }

    public function tambah_paket(){

        $outlet = DB::table('outlet')->get();

        return view('/pages/kasir/manage_paket/tambah_paket',compact('outlet'));

    }

    public function upload_paket(Request $request){

        $paket = Paket::create([
            'id_outlet'=>Auth::user()->id_outlet,
            'jenis_paket'=>$request->jenis,
            'nama_paket'=>$request->nama,
            'harga_paket'=>$request->harga,
        ]);

        Alert::success('Berhasil','Berhasil Menambah Data Paket');

        return redirect('/kasir/list_paket');

    }
    public function delete_paket($id){

        DB::table('paket')->where('id_paket',$id)->delete();

        Alert::success('Berhasil','Berhasil Mennghapus Data Paket');

        return redirect('/kasir/list_paket');
    }
    public function edit_paket($id){
        $outlet = DB::table('outlet')->get();
        $paket = DB::table('paket')->where('id_paket',$id)->first();

        return view('/pages/kasir/manage_paket/edit_paket',compact('paket','outlet'));

    }
    public function update_paket(Request $request){

        $paket = DB::table('paket')->where('id_paket',$request->id)->update([
            'jenis_paket'=>$request->jenis,
            'nama_paket'=>$request->nama,
            'harga_paket'=>$request->harga,
        ]);

        Alert::success('Berhasil','Berhasil Mengubah Data Paket');

        return redirect('/kasir/list_paket');

    }


// Transaksi
    public function list_transaksi(){

        $transaksi = DB::table('transaksi')
        ->join('member','transaksi.id_member','member.id_member')
        ->join('outlet','transaksi.id_outlet','outlet.id_outlet')
        ->join('users','transaksi.id_user','users.id')
        ->join('detail_transaksi','transaksi.id_transaksi','detail_transaksi.id_transaksi')
        ->join('paket','detail_transaksi.id_paket','paket.id_paket')
        ->where('transaksi.id_outlet',Auth::user()->id_outlet)
        ->orderBy('transaksi.tgl_transaksi','desc')
        ->get();

        return view('/pages/kasir/manage_transaksi/list_transaksi',compact('transaksi'));
    }

    public function tambah_transaksi(){

        $member = DB::table('member')->get();

        $outlet = DB::table('outlet')->get();

        return view('pages/kasir/manage_transaksi/tambah_transaksi',compact('outlet','member'));

    }
    public function upload_transaksi(Request $request){

        $transaksi = Transaksi::create([
            'id_outlet'=>$request->outlet,
            'kode_invoice'=>$request->invoice,
            'id_member'=>$request->member,
            'tgl_transaksi'=>date('Y-m-d H:i:s'),
            'batas_waktu'=>$request->batas_waktu,
            'tgl_bayar'=>$request->tgl_bayar,
            'biaya_tambahan'=>$request->biaya_tambahan,
            'diskon_transaksi'=>$request->diskon,
            'pajak_transaksi'=>$request->pajak,
            'status_transaksi'=>'Baru',
            'pembayaran'=>'Belum Dibayar',
            'id_user'=>Auth::user()->id
        ]);
        $cek = DB::table('transaksi')->where('kode_invoice',$request->invoice)->first();

        Alert::success('Berhasil','Berhasil Melakukan Pembayaran');

        return redirect('/kasir/list_transaksi/detail_transaksi/'.$cek->id_transaksi);

    }
    public function delete_transaksi($id){

        DB::table('transaksi')->where('id_transaksi',$id)->delete();

        Alert::success('Berhasil','Berhasil Menghapus Data Transaksi');

        return redirect('/kasir/list_transaksi');
    }
    public function edit_transaksi($id){

        $transaksi = DB::table('transaksi')->where('id_transaksi',$id)->first();

        return view('/pages/kasir/manage_transaksi/edit_transaksi',compact('Transaksi'));

    }
    public function bayar_transaksi($id){

        $transaksi = DB::table('transaksi')->where('id_transaksi',$id)->update([
            'pembayaran'=>"Dibayar",
            'tgl_bayar'=>date('Y-m-d H:i:s')
        ]);

        Alert::success('Berhasil','Berhasil Melakukan Pembayaran');

        return redirect('/kasir/list_transaksi');

    }
    public function batal_transaksi($id){

        $transaksi = DB::table('transaksi')->where('id_transaksi',$id)->update([
            'pembayaran'=>"Belum Dibayar"
        ]);

        Alert::success('Berhasil','Berhasil Melakukan Pembatalan Pembayaran');

        return redirect('/kasir/list_transaksi');
        
    }
    public function update_status(Request $request){

        $transaksi = DB::table('transaksi')->where('id_transaksi',$request->id_transaksi)->update([
            'status_transaksi'=>$request->status
        ]);

        Alert::success('Berhasil','Berhasil Mengubah Status');

        return redirect('/kasir/detail_transaksi/'.$request->id_transaksi);
        
    }


    // Detail Transaksi
    public function tambah_detail($id){

        $transaksi = DB::table('transaksi')
        ->join('member','transaksi.id_member','member.id_member')
        ->join('outlet','transaksi.id_outlet','outlet.id_outlet')
        ->where('id_transaksi',$id)
        ->first();
        $detail = DB::table('detail_transaksi')
        ->join('paket','detail_transaksi.id_paket','paket.id_paket')
        ->where('id_transaksi',$id)->get();
        $total = DB::table('detail_transaksi')->where('id_transaksi',$id)->sum('total_harga');
        $paket = DB::table('paket')->where('id_outlet',$transaksi->id_outlet)->get();

        return view('pages/kasir/manage_transaksi/tambah_detail',compact('transaksi','paket','detail','total'));

    }


    public function cek_harga(Request $request){

        $cek = DB::table('paket')->where('id_paket',$request->paket)->first();

        return  $cek->harga_paket;
        
    }

    public function upload_detail(Request $request){

        $detail = Detail::create([
            'id_transaksi'=>$request->id_transaksi,
            'id_paket'=>$request->paket,
            'qty'=>$request->qty,
            'keterangan'=>$request->keterangan,
            'total_harga'=>$request->total
        ]);

        Alert::success('Berhasil','Berhasil Menambah Detail Transaksi');

        return redirect('/kasir/list_transaksi/detail_transaksi/'.$request->id_transaksi);

    }

    public function detail_transaksi($id){
        $transaksi = DB::table('transaksi')
        ->join('member','transaksi.id_member','member.id_member')
        ->join('outlet','transaksi.id_outlet','outlet.id_outlet')
        ->join('users','transaksi.id_user','users.id')
        ->join('detail_transaksi','transaksi.id_transaksi','detail_transaksi.id_transaksi')
        ->join('paket','detail_transaksi.id_paket','paket.id_paket')
        ->where('transaksi.id_transaksi',$id)
        ->where('transaksi.id_outlet',Auth::user()->id_outlet)
        ->first();


        return view('/pages/kasir/manage_transaksi/detail_transaksi',compact('transaksi'));

    }


}
