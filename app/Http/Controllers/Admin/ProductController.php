<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('pages.admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'images' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
            'name' => 'required',
            'harga' => 'required|numeric',
            'weight' => 'required|numeric',
            'stok' => 'required|numeric',
            'description' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()
            ]);
        }
        $foto = $request->file('images')->store('public/images');
        $data = [
            'images' => $foto,
            'name' => $request->name,
            'price' => $request->harga,
            'weight'=> $request->weight,
            'stok' => $request->stok,
            'description' => $request->description
        ];
        Product::create($data);

        return redirect()->route('product.index')->with('success', 'berhasil tambah produk');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = Product::findOrFail($id);

        return view('pages.admin.product.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(),[
            'images' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
            'name' => 'required',
            'price' => 'required|numeric',
            'weight' => 'required|numeric',
            'stok' => 'required|numeric',
            'description' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()
            ]);
        }

        if ($request->file('images')) {
            if ($request->oldImage) {
                Storage::delete( $request->oldImage);
            }
            $foto = $request->file('images')->store('public/images');
        }
        $data = [
            'images' => $foto,
            'name' => $request->name,
            'price' => $request->price,
            'weight'=> $request->weight,
            'stok' => $request->stok,
            'description' => $request->description
        ];
        // dd($data);
        $item = Product::findOrFail($id);
        $item->update($data);
        return redirect()->route('product.index')->with('success', 'berhasil update produk');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Product::findOrFail($id);
        Storage::delete($item->images);
        $item->delete();
        return redirect()->route('product.index')->with('success', 'berhasil hapus produk');
    }
}
