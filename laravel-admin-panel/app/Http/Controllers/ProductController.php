<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Hekmatinasser\Verta\Facades\Verta;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create()
    {
        $categories = Category::all();

        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        // $request->validate([
        //     'primary_image' => 'required|image',
        //     'name' => 'required|string',
        //     'category_id' => 'required|integer',
        //     'description' => 'required',
        //     'price' => 'required|integer',
        //     'status' => 'required|integer',
        //     'quantity' => 'required|integer',
        //     'sale_price' => 'nullable|integer',
        //     'date_on_sale_from' => 'nullable|date_format:Y/m/d H:i:s',
        //     'date_on_sale_to' => 'nullable|date_format:Y/m/d H:i:s',
        //     'images.*' => 'nullable|image'
        // ]);

        $primaryImageName = Carbon::now()->microsecond . '-' . $request->primary_image->getClientOriginalName();
        $request->primary_image->storeAs('images/products/', $primaryImageName);

        if ($request->has('images') && $request->images !== null) {
            $fileNameImages = [];
            foreach ($request->images as $image) {
                $fileNameImage = Carbon::now()->microsecond . '-' . $image->getClientOriginalName();
                $image->storeAs('images/products/', $fileNameImage);

                array_push($fileNameImages, $fileNameImage);
            }
        }
        // dd($fileNameImages);

        $product = Product::create([
            'name' => $request->name,
            'slug' => $this->makeSlug($request->name),
            'category_id' => $request->category_id,
            'primary_image' => $primaryImageName,
            'description' => $request->description,
            'status' => $request->status,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'sale_price' => $request->has('sale_price') ? $request->sale_price : 0,
            'date_on_sale_from' => $request->date_on_sale_from !== null ? getMiladiDate($request->date_on_sale_from) : null,
            'date_on_sale_to' => $request->date_on_sale_to !== null ? getMiladiDate($request->date_on_sale_to) : null,
        ]);

        dd('Done!');
    }

    public function makeSlug($string)
    {
        $slug = slugify($string);
        $count = Product::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();
        $result = $count ? "{$slug}-{$count}" : $slug;

        return $result;
    }

    
}
