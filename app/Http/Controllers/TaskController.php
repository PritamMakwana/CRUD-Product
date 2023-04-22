<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Product;
use Dotenv\Validator;
use Faker\Core\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\Console\Input\Input;
use Session;

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

        $fileName = time() . "-" . $req->file('pro_image')->getClientOriginalName();
        $req->pro_image->move(public_path('uploads'), $fileName);

        $product->p_image = "uploads\\" . $fileName;
        $product->save();

        return redirect('/show');
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

        return redirect('/show');
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
            $fileName = time() . "-" . $req->file('pro_image')->getClientOriginalName();
            $req->pro_image->move(public_path('uploads'), $fileName);
            $product->p_image = "uploads\\" . $fileName;
        }
        $product->save();

        return redirect('/show');
    }

    public function searchPageData()
    {
        $product = null;
        $mess = null;
        $data = compact('product', 'mess');
        return view('search')->with($data);
    }

    public function searchDataShow(Request $req)
    {

        $search = $req['pro_info'];
        if ($search != "") {
            $mess = $search;

            $product = Product::where('p_id', 'LIKE', "%$search%")->orWhere('p_name', 'LIKE', "%$search%")->orWhere('p_price', 'LIKE', "%$search%")->get();
            if ($product == "[]") {
                $product = null;
            }
        } else {
            $product = null;
            $mess = "mess";
        }
        $data = compact('product', 'mess');
        return view('search')->with($data);
    }

    //register

    public function register(Request $req)
    {
        $req->validate([
            'name' => 'required',
            'email' =>'required| email|unique:authors,email',
            'password' =>'required | max:12 | min:6'
        ]);

        $author = new Author();
        $author->name = $req->name;
        $author->email= $req->email;
        $author->password= Hash::make($req->password);
        $req = $author->save();

        if($req){
            return back()->with('success','You have registered successfully');
        }else{
            return back()->with('fail','Something wrong');
        }
    }

    //login
    public function login(Request $req){

        $req->validate([
            'email' =>'required| email',
            'password' =>'required '
        ]);

        $author = Author::where('email','=',$req->email)->first();

        if($author){

        if(Hash::check($req->password,$author->password)){
          $req->session()->put('loginID',$author->id);
        }else{
            return back()->with('fail','Password not matches');
        }

    }else{
        return back()->with('fail','This email is not registered');
    }


    }



}

