<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class DBController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("select")->with("list_products", Product::paginate(2));
    }

    public function take()
    {
        return 'gg';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("form")->with([
            "product"=> new Product(),
            "action"=> "/products/",
            "method"=> "POST"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:products|max:50',
            'description' => 'required',
            'price' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect('products/create')
                ->withErrors($validator->errors())
                ->withInput();
        }
        $product = new Product();
        $file = $request->file('img_url');
        if (File::exists($file)) {
            $file->store('public/uploaded');
            $product->img_url = "storage/uploaded/" . $file->hashName();
        }
        $product->name = $request->get("name");
        $product->description = $request->get("description");
        $product->price = $request->get("price");
        $product->save();
        return redirect("products");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return "show";
    }

    public function showJson($id)
    {
        //
        $existing_product = Product::find($id);
        // check if null...
        return $existing_product;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $existing_product = Product::find($id);
        if ($existing_product == null){
            return 'Error.404';
        }
        return view('form')->with([
            'product'=> $existing_product,
            'action'=> '/products/' .$existing_product->id,
            'method'=> 'PUT'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $existing_product = Product::find($id);
        if ($existing_product == null) {
            return "errors.404";
        }
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:50',
            'description' => 'required',
            'img_url' => 'required',
            'price' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect('products/create')
                ->withErrors($validator->errors())
                ->withInput();
        }
        $file = $request->file('img_url');
        if (File::exists($file)) {
            $file->store('public/uploaded');
            $existing_product->img_url = "storage/uploaded/" . $file->hashName();
        }
        $existing_product->name = $request->get("name");
        $existing_product->description = $request->get("description");
        $existing_product->price = $request->get("price");
        $existing_product->save();
        if ($request->get("isAjax")) {
            return $existing_product;
        } else {
            return redirect("products");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $existing_product = Product::find($id);
        if($existing_product==null){
            return "errors.404";
        }
        $existing_product->delete();
        return $existing_product;
    }
}
