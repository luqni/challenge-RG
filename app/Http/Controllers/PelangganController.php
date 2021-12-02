<?php

namespace App\Http\Controllers;
use App\Models\Pelanggan;

use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index(Pelanggan $model)
    {
        return view('admin.layout', ['pelanggans' => $model->paginate(10)]);
    }

    public function home()
    {
        return view('home.layout');
    }

    public function store(Request $request, Pelanggan $model)
    {
        if($request->package_tag === 'ruangguru'){
            $gift_user = 'Pensil';
        }else if($request->package_tag === 'skillacademy'){
            $gift_user = 'Tas';
        }else{
            $gift_user = 'Sepatu';
        }
        // dd($request->package_name);
        $pelanggan = new Pelanggan;
        $pelanggan->user_id = $request->user_id;
        $pelanggan->user_name = $request->user_name;
        $pelanggan->email = $request->email;
        $pelanggan->contact_person = $request->contact_person;
        $pelanggan->contact_number = $request->contact_number;
        $pelanggan->delivery_address = $request->delivery_address;
        $pelanggan->order_status = $request->order_status;
        $pelanggan->package_name = $request->packag_name;
        $pelanggan->package_serial = $request->package_serial;
        $pelanggan->package_tag = $request->package_tag;
        $pelanggan->gift =$gift_user;
        $pelanggan->status = "created";

        $pelanggan->save();
        // $model->create($request->all());

        return redirect()->route('form')->withStatus(__('Cabang successfully created.'));
    }

    public function update(Request $request, Pelanggan $model)
    {
        dd($request->id);
        return view('home.layout');
    }
}
