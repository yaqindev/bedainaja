<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Model\barang;
use Illuminate\Support\Facades\DB;
use Validator;

// use Validator;

class barangController extends Controller
{
    public function index()
    {
        return view('admin.barang', [ 'title'   => 'Daftar Barang' ]);
    }

    public function sTable()
    {
        $no         = (isset($_GET['iDisplayStart']) && $_GET['iDisplayLength'] != '-1') ? $_GET['iDisplayStart'] + 1 : 1;
        $barang     = new barang();
        $barangT    = new barang();
        $sLimit     = 15;
        $sOffset    = 0;

        $barang     = $barang->select('id', 'nama_barang', 'jenis', 'keuntungan', 'harga', 'stok');
        if (isset($_GET['sSearch']) && $_GET['sSearch'] != "") {
            $barang = $barang->where('nama_barang', 'like', '%' . $_GET['sSearch'] . '%')
                             ->orwhere('jenis', 'like', '%' . $_GET['sSearch'] . '%');
            $barangT = $barangT->where('nama_barang', 'like', '%' . $_GET['sSearch'] . '%')
                               ->orwhere('jenis', 'like', '%' . $_GET['sSearch'] . '%');
        } else {
            $barang = $barang->where('nama_barang', 'like', '%' . $_GET['sSearch'] . '%')
                            ->orwhere('jenis', 'like', '%' . $_GET['sSearch'] . '%');
        }

        if (isset($_GET['iSortCol_0'])) {
            if (isset($_GET['iSortCol_0']) && $_GET['iSortCol_0'] == '1') {
                $sort   = ($_GET['sSortDir_0'] == 'asc') ? 'ASC' : 'DESC';
                $barang = $barang->orderBy('nama_barang', $sort);
            }
        }

        $barang = $barang->orderBy('id', 'ASC');

        if (isset($_GET['iDisplayStart']) && $_GET['iDisplayLength'] != '-1') {
            $sLimit      = intval($_GET['iDisplayLength']);
            $sOffset     = intval($_GET['iDisplayStart']);
        }

        $barang = $barang->offset($sOffset)
                         ->limit($sLimit);
        $sTotal = $barangT->count();
        $sTemp  = $barang->get();

        $output    = array(
                "sEcho"                 => intval($_GET['sEcho']),
                "iTotalDisplayRecords"  => $sTotal,
                "iTotalRecords"         => $sTotal,
                "aaData"                => array()
            );

        foreach ($sTemp as $brg) {
            if (isset($_GET['sSearch']) && $_GET['sSearch'] != "") {
                $nama    = str_ireplace($_GET['sSearch'], "<b>" . $_GET['sSearch'] . "</b>", $brg->nama_barang);
                $jenis    = str_ireplace($_GET['sSearch'], "<b>" . $_GET['sSearch'] . "</b>", $brg->jenis);
            } else {
                $nama    = $brg->nama_barang;
                $jenis    = $brg->jenis;
            }

            $button = '<a class="btn btn-xs blue" data-id="'. $brg->id .'" onClick="edit(this)"><i class="fa fa-edit"></i> Edit</a> <a class="btn btn-xs red" data-id="'. $brg->id .'" onClick="alertHapus(this)" ><i class="fa fa-trash"></i> Hapus</a>';

            $keuntungan = ( ($brg->keuntungan / 100) * $brg->harga ) + $brg->harga;

            $arr = array(
                    "DT_RowClass"     => 'baris',
                    "no"     => $no,
                    "nama"   => $nama,
                    "jenis"  => $jenis,
                    "harga"  => number_format($brg->harga, 2, ',', '.'),
                    "utg"    => $brg->keuntungan . " %",
                    "jual"   => number_format(round($keuntungan), 2, ',', '.'),
                    "stok"   => $brg->stok,
                    "act"    => $button
                );
            $output['aaData'][] = $arr;
            $no++;
        }
        echo json_encode($output);
    }

    // public function tambah()
    // {
    //   return view('barang.tambah', [
    //     'title'   => 'Tambah Barang'
    //   ]);
    // }
    //
    public function simpan(Request $request)
    {
        // dd($request);
        // exit;
        // $data['nama'] = $request->nama;
        // $data['jenis'] = $request->jenis;
        // $data['harga'] = $request->harga;
        // $data['keuntungan'] = $request->keuntungan;
        // $data['stok'] = $request->stok;

        // return response()->json($data);
        // $cek = $this->validate($request, [
        //     'nama'          => 'required|string|min:8',
        //     'jenis'         => 'required|string',
        //     'harga'         => 'required|digits_between:1,5',
        //     'keuntungan'    => 'required|digits_between:1,2',
        //     'stok'          => 'required|digits_between:1,3',
        // ]);
        // return response()->json($data);
        $validator = Validator::make($request->all(), [
            'nama'          => 'required|string|min:8',
            'jenis'         => 'required|string',
            'harga'         => 'required|digits_between:1,9',
            'keuntungan'    => 'required|digits_between:1,4',
            'stok'          => 'required|digits_between:1,3',
        ]);

        if ($validator->fails()) {
        //    return redirect('post/create')
        //                ->withErrors($validator)
        //                ->withInput();

            return response()->json( array (
                'errors' => $validator->getMessageBag ()->toArray ()
            ) );
        } else {
            // mengecek id
            $id = $request->id;
            if ($id == '0') {
                $barang = new barang();
                $barang->id_karyawan    = 1;
                $barang->nama_barang    = $request->nama;
                $barang->jenis          = $request->jenis;
                $barang->harga          = $request->harga;
                $barang->keuntungan     = $request->keuntungan;
                $barang->stok           = $request->stok;
                $barang->gambar           = '';

                $barang->save();

                $arr['sts'] = 1;
                $arr['msg'] = 'Data berhasil di simpan.';
            } else {
                $barang = barang::find( $id );
                // $barang->find(4);
                $barang->nama_barang    = $request->nama;
                $barang->jenis          = $request->jenis;
                $barang->harga          = $request->harga;
                $barang->keuntungan     = $request->keuntungan;
                $barang->stok           = $request->stok;

                $barang->save();

                $arr['sts'] = 1;
                $arr['msg'] = 'Data berhasil di Update.';
            }
            //

            return response()->json($arr);
        }

        // if ($cek) {
        //     //simpan
        //     $barang = new barang();
        //     //
        //     $barang->id_karyawan    = 1;
        //     $barang->nama_barang    = $request->nama;
        //     $barang->jenis          = $request->jenis;
        //     $barang->harga          = $request->harga;
        //     $barang->keuntungan     = $request->keuntungan;
        //     $barang->stok           = $request->stok;
        //     $barang->gambar           = '';
        //
        //     $barang->save();
        //
        //     $arr['sts'] = 1;
        //     $arr['msg'] = 'Berhasil di validasi';
        //
        // } else {
        //     $arr['sts'] = 0;
        //     $arr['msg'] = 'Gagal di validasi';
        // }

        // return response()->json($arr);

    //     $barang = new barang();
    //     $barang->nama_barang  = $request->nama;
    //     $barang->harga_barang = $request->harga;
    //     $barang->tipe_barang  = $request->tipe;
    //     $barang->save();
      //
    //     return redirect('/barang');
    }

    public function hapus(Request $request)
    {
        // $data['id'] =  $request->id;
        $barang = new barang();
        $barang->find($request->id)->delete();
        return response ()->json();
    }

    public function dataEdit(Request $request)
    {
        $barang = new barang();
        $data   = $barang->find($request->id);
        return response ()->json ($data);
    }
    //
    // public function hapus($id)
    // {
    //   $barang = new barang();
    //
    //   $cek = $barang->where('id_barang',$id)->firstOrFail();
    //   if (!$cek) {
    //     abort(404);
    //   }
    //
    //   $barang->where('id_barang',$id)->delete();
    //
    //   return redirect('/barang');
    // }
    //
    // public function edit($id)
    // {
    //   $barang = new barang();
    //
    //   $cek = $barang->where('id_barang',$id)->firstOrFail();
    //   if (!$cek) {
    //     abort(404);
    //   }
    //   $dt = $barang->where('id_barang',$id)->firstOrFail();
    //   return view('barang.edit',[
    //     'title'   => 'Edit Barang',
    //     'barang'  => $dt
    //   ]);
    // }

    // public function update(Request $request)
    // {
    //   $barang = barang::where('id_barang',$request->id);
    //   $barang->update([
    //     'nama_barang' => $request->nama,
    //     'harga_barang' => $request->harga,
    //     'tipe_barang' => $request->tipe
    //   ]);
    //
    //   return redirect('/barang');
    // }
}
