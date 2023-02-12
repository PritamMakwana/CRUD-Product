<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Faker\Core\File;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    public function addData(Request $req)
    {
        $product = new Product();
        $product->p_name = $req['pro_name'];
        $product->p_price = $req['pro_price'];

        $fileName = time() . "-" .  $req->file('pro_image')->getClientOriginalName();
        $req->pro_image->move(public_path('uploads'), $fileName);

        $product->p_image = 'uploads/' . $fileName;
        $product->save();

        return redirect('/');
    }

    public function showData()
    {
        $product = Product::all();
        return view('home', ['data' => $product]);
    }

    public function deleteData($id)
    {
        $product = Product::find($id);

        if (!is_null($product)) {
            if (file_exists(public_path() . "/" . $product->p_image)) {
                unlink(public_path() . "/" . $product->p_image);
            }
            $product->delete();
        }

        return redirect('/');
    }
}
