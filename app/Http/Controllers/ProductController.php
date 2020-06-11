<?php

namespace App\Http\Controllers;

use App\Brand;
use App\DetailProduct;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Product;
use App\Traits\StoreImageTrait;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    use StoreImageTrait;

    protected $imagePath = "uploads/products/";
    protected $product;
    protected $brand;
    protected $detailProduct;

    public function __construct()
    {
        $this->product = new Product();
        $this->brand = new Brand();
        $this->detailProduct = new DetailProduct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $name = $request->input('name');
        $brandName = $request->input('brand_id');
        $products = $this->product->search($name, $brandName);

        return view('backend.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = $this->brand->all();

        return view('backend.products.create', compact('brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $data = $request->all();
        $data['image'] = $this->uploadImage($request->file('image'), $this->imagePath);
        $this->product->create($data);

        return redirect()->route('products.create')->with('message', 'Thêm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $seri = $request->input('seri');
        $product_items = $this->detailProduct->search($seri, $id);
        return view('backend.products.show', compact('product_items', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brands = $this->brand->all();
        $product = $this->product->getProductBy($id);

        return view('backend.products.edit', compact('product', 'brands'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, $id)
    {

        $product = $this->product->getProductBy($id);
        $data = $request->except('image');
        $data['image'] = $this->updateImage($request, $product->image, $this->imagePath);
        $product->update($data);

        return redirect()->route('products.edit', ['product' => $id])->with('message', 'Sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = $this->product->getProductBy($id);
        $this->deleteImage($product->image, $this->imagePath);
        $this->product->destroy($id);

        return redirect()->route('products.index')->with('message', 'xóa thành công');
    }

    public function updateDetailProduct($id)
    {
        $detailProduct = $this->detailProduct->findOrFail($id);

        if ($detailProduct->status == 1) {
            $detailProduct->update(['status' => 2]);
        } else {
            $detailProduct->update(['status' => 1]);
        }

        return redirect()->back();
    }
}
