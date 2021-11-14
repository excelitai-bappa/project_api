<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('backend.pages.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required|unique:products',
            'product_qty' => 'required|numeric ',
            'product_price' => 'required|numeric',
            'produt_discount_price' => 'required|numeric',
            'product_img' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        // Create New Product
        $product = new Product();
        $product->product_name = $request->product_name;
        $product->product_qty = $request->product_qty;
        $product->product_price = $request->product_price;
        $product->produt_discount_price = $request->produt_discount_price;

        if ($request->hasFile('product_img')) {
            $image = $request->file('product_img');
            $extension = $image->extension();
            $name = time().'.'.$extension;
            $image->move(public_path('/upload/product_images/'), $name);

            $product->product_img = $name;
        }

        $product->save();


        session()->flash('success', 'Product has been created !!');
        return redirect()->route('admin.products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('backend.pages.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (is_null($this->user) || !$this->user->can('product.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any product !');
        }

        $product = Product::find($id);
        return view('backend.pages.products.edit', compact('product'));

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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (is_null($this->user) || !$this->user->can('product.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any Product !');
        }

        $product = Product::find($id);
        if (!is_null($product)) {
            $product->delete();
        }

        session()->flash('success', 'Product has been deleted !!');
        return back();
    }
}
