<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $productQuery = Product::where('name', 'like', "%" . $request->keyword . "%");

        if ($request->has('category_id') && $request->category_id > 0) {
            $productQuery = $productQuery->where('category_id', $request->category_id);
        }
        if ($request->has('order_by') && $request->order_by > 0) {
            if ($request->order_by == 1) {
                $productQuery = $productQuery->orderByDesc('id');
            } else if ($request->order_by == 2) {
                $productQuery = $productQuery->orderBy('price');
            } else if ($request->order_by == 3) {
                $productQuery = $productQuery->orderByDesc('price');
            } else if ($request->order_by == 4) {
                $productQuery = $productQuery->orderBy('quantity');
            } else {
                $productQuery = $productQuery->orderByDesc('quantity');
            }
        }
        $category = Category::all();
        // $products = Product::latest()->paginate(20);
        // $productQuery = Product::latest()->paginate(20);
        $products = $productQuery->latest()->paginate(20);
        return view('/admin/product/index', compact('products', 'category'));
    }
    public function create()
    {
        $category = Category::all();
        return view('admin.product.create', compact('category'));
    }
    public function store(ProductRequest $request)
    {
        $products = new Product;
        if ($request->hasFile('upload')) {
            $filenamewithextension = $request->file('upload')->getClientOriginalName();
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $filenametostore = $filename . '_' . time() . '.' . $extension;
            $request->file('upload')->storeAs('public/upload', $filenametostore);
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('storage/upload/' . $filenametostore);
            $msg = 'Tải lên thành công';
            $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            // Render HTML output
            @header('Content-type: text/html; charset=utf-8');
            echo $re;
        }
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $fileImage = time() . '.' . $ext;
            $file->move(public_path('upload/product'), $fileImage);
            $products->image = $fileImage;
        }
        $product =  Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'image' => $fileImage,
            'quantity' => $request->quantity,
            'category_id' => $request->category_id,
            'slug' => Str::slug($request->name),
            'short_content' => $request->short_content,
            'long_content' => $request->long_content,
        ]);
        return redirect()->route('admin.products.index')->with('alert', 'Thêm dữ liệu thành công!');
    }
    public function show($id)
    {
    }
    public function edit($id)
    {
        $category = Category::all();
        $products = Product::find($id);
        return view('admin.product.edit', compact('products', 'category'));
    }
    public function update(ProductRequest $request, $id)
    {
        $products = new Product;
        if ($request->hasFile('upload')) {
            $filenamewithextension = $request->file('upload')->getClientOriginalName();
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $filenametostore = $filename . '_' . time() . '.' . $extension;
            $request->file('upload')->storeAs('public/upload', $filenametostore);
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('storage/upload/' . $filenametostore);
            $msg = 'Tải lên thành công';
            $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            // Render HTML output
            @header('Content-type: text/html; charset=utf-8');
            echo $re;
        }
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $fileImage = time() . '.' . $ext;
            $file->move(public_path('upload/product'), $fileImage);
            $products->image = $fileImage;
        }
        Product::find($id)->update([
            'name' => $request->name,
            'price' => $request->price,
            'image' => $fileImage,
            'quantity' => $request->quantity,
            'category_id' => $request->category_id,
            'slug' => Str::slug($request->name),
            'short_content' => $request->short_content,
            'long_content' => $request->long_content,
        ]);
        return redirect()->route('admin.products.index')->with('success', 'Cập nhật dữ liệu thành công!');
    }
    public function delete($id)
    {
        $products = Product::find($id)->delete();
        return redirect()->route('admin.products.index', compact('products'))->with('message', 'Xóa dữ liệu thành công!');
    }
    public function activePro($pro_id)
    {
        DB::table('table_products')->where('id', $pro_id)->update(['status' => 0]);
        return redirect()->back()->with('actived', 'Đã xóa khỏi danh sách sản phẩm nổi bật!');
    }
    public function unactivePro($pro_id)
    {
        DB::table('table_products')->where('id', $pro_id)->update(['status' => 1]);
        return redirect()->back()->with('active', 'Đã thêm vào danh sách sản phẩm nổi bật!');
    }
}
