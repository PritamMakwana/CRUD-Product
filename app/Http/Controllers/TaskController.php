<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Dotenv\Validator;
use Faker\Core\File;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class TaskController extends Controller
{

    public function addData(Request $req)
    {

        $req->validate(
            [
                'pro_name' => 'required',
                'pro_price' => 'required',
                'pro_image' => 'required'
            ],
            [
                'pro_image.required' => 'The Product Image Upload is required'
                //customize Message
            ],
            [
                'pro_name' => 'Product Name',
                'pro_price' => 'Product Price',
                'pro_image' => 'Product Image'
                //Customize Attributes Name
            ]
        );

        $product = new Product();
        $product->p_name = $req['pro_name'];
        $product->p_price = $req['pro_price'];

        $fileName = time() . "-" .  $req->file('pro_image')->getClientOriginalName();
        $req->pro_image->move(public_path('uploads'), $fileName);

        $product->p_image = "uploads\\"  . $fileName;
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
            if (file_exists(public_path() . "\\" . $product->p_image)) {
                unlink(public_path() . "\\" . $product->p_image);
            }
            $product->delete();
        }

        return redirect('/');
    }

    public function updateDataShow($id)
    {
        $product = Product::find($id);
        return view('update', ['data' => $product]);
    }

    public function updateData($id, Request $req)
    {
        $req->validate(
            [
                'pro_name' => 'required',
                'pro_price' => 'required',
            ],
            [
                'pro_image.required' => 'The Product Image Upload is required'
                //customize Message
            ],
            [
                'pro_name' => 'Product Name',
                'pro_price' => 'Product Price',
                'pro_image' => 'Product Image'
                //Customize Attributes Name
            ]
        );

        $product = Product::find($id);
        $product->p_name = $req['pro_name'];
        $product->p_price = $req['pro_price'];

        //check image upload 
        if (!is_null($req->file('pro_image'))) {
            //old image is delete
            if (file_exists(public_path() . "\\" . $product->p_image)) {
                unlink(public_path() . "\\" . $product->p_image);
            }
            //new add image
            $fileName = time() . "-" .  $req->file('pro_image')->getClientOriginalName();
            $req->pro_image->move(public_path('uploads'), $fileName);
            $product->p_image = "uploads\\"  . $fileName;
        }
        $product->save();

        return redirect('/');
    }
}
