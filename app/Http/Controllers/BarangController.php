<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        $barang = DB::table('barang')->get();
        return view("index", compact("barang"));
    }

    public function insert()
    {
        $name = request("name");
        $price = request("price");
        $qty = request("qty");

        DB::table('barang')->insert([
            'name' => $name,
            'price' => $price,
            'qty' => $qty,
        ]);

        return redirect()->back();
    }

    public function update($id)
    {
        $name = request("name");
        $price = request("price");
        $qty = request("qty");

        DB::table('barang')->where('id', $id)->update([
            'name' => $name,
            'price' => $price,
            'qty' => $qty,
        ]);

        return redirect()->back();
    }

    public function delete($id)
    {
        DB::table('barang')->where('id', $id)->delete();

        return redirect()->back();
    }
}
