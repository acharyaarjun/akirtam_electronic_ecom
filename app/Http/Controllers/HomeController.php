<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }


    // Category manage garni function
    public function getManageCategory()
    {
        $data = [
            'categories' => Category::where('deleted_at', null)->orderby('id', 'desc')->get(),
        ];
        return view('admin.category.manage', $data);
    }
    // Product manage garni function
    public function getManageProduct()
    {
        $data = [
            'categories' => Category::where('deleted_at', null)->orderby('category_title', 'asc')->get(),
            'products' => Product::where('deleted_at', null)->orderby('id', 'desc')->get(),
        ];
        return view('admin.product.manage', $data);
    }

    // category add garni function
    public function postAddCategory(Request $request)
    {
        $request->validate([
            'category_title' => 'required|unique:categories,category_title',
            'category_image' => 'required|image|mimes:jpeg,jpg,png,gif',
            'status' => 'required|in:active,inactive'
        ]);

        // dd($request->all());

        // $function_ko_variable = $request->input('form_ko_name_ma_vayeko_value');

        $category_title = $request->input('category_title');
        // slug generate haneko
        $slug = Str::slug($category_title);

        $status = $request->input('status');
        $category_description = $request->input('category_description');
        $image = $request->file('category_image');
        // dd($category_title, $slug);

        // image xa vaney
        if ($image) {
            // image ko uniqe name generate garnixa
            //md5(), sha1()
            // $unique_name = md5(time());
            $unique_name = sha1(time());
            // dd($unique_name);

            // image ko extension patta launa paryo
            $extension = $image->getClientOriginalExtension();
            // dd($extension);

            // file ko name vaneko filename.extension (uniqename.extension)
            $category_image = $unique_name . '.' . $extension;
            // dd($category_image);

            // yo name bata aayeko tyo image lai hamro public vitra move paryo
            $image->move('uploads/category/', $category_image);
        }

        // database ma save garna
        // model_access_gareko_variable = new model_ko_name;
        $category = new Category;
        // model_access_gareko_variable->database_ko_column_ko_field = database_ko_column_ko_field_ko_data_rakehko_variable;
        $category->category_title = $category_title;
        $category->slug = $slug;
        $category->status = $status;
        $category->category_description = $category_description;

        if ($image) {
            $category->category_image = $category_image; // image ko uniquename.extension save gareko variable garnu hai
        }

        $category->save();

        return redirect()->back()->with('success', 'Category added successfully');
    }

    public function postAddProduct(Request $request)
    {
        $request->validate([
            'product_title' => 'required|unique:products,product_title',
            'category_id' => 'required|integer|exists:categories,id',
            'stock' => 'required|integer',
            'orginal_cost' => 'required|numeric',
            'discounted_cost' => 'numeric',
            'product_image' => 'required|image|mimes:jpeg,jpg,png,gif',
            'status' => 'required|in:active,inactive',
            'product_description' => 'required'
        ]);

        // dd($request->all());

        // $function_ko_variable = $request->input('form_ko_name_ma_vayeko_value');

        $product_title = $request->input('product_title');
        // slug generate haneko
        $slug = Str::slug($product_title);

        $category_id = $request->input('category_id');
        $category = Category::where('id', $category_id)->where('deleted_at', null)->limit(1)->first();

        if (is_null($category)) {
            return redirect()->back()->with('error', 'Category not found');
        }

        $status = $request->input('status');
        $product_description = $request->input('product_description');
        $orginal_cost = $request->input('orginal_cost');
        $discounted_cost = $request->input('discounted_cost');
        $stock = $request->input('stock');
        $image = $request->file('product_image');
        // dd($category_title, $slug);

        // image xa vaney
        if ($image) {
            // image ko uniqe name generate garnixa
            //md5(), sha1()
            // $unique_name = md5(time());
            $unique_name = sha1(time());
            // dd($unique_name);

            // image ko extension patta launa paryo
            $extension = $image->getClientOriginalExtension();
            // dd($extension);

            // file ko name vaneko filename.extension (uniqename.extension)
            $product_image = $unique_name . '.' . $extension;
            // dd($category_image);

            // yo name bata aayeko tyo image lai hamro public vitra move paryo
            $image->move('uploads/product/', $product_image);
        }

        // database ma save garna
        // model_access_gareko_variable = new model_ko_name;
        $product = new Product();
        // model_access_gareko_variable->database_ko_column_ko_field = database_ko_column_ko_field_ko_data_rakehko_variable;
        $product->product_title = $product_title;
        $product->category_id = $category->id;
        $product->slug = $slug;
        $product->status = $status;
        $product->product_description = $product_description;
        $product->orginal_cost = $orginal_cost;
        $product->discounted_cost = $discounted_cost;
        $product->product_stock = $stock;

        if ($image) {
            $product->product_image = $product_image; // image ko uniquename.extension save gareko variable garnu hai
        }

        $product->save();

        return redirect()->back()->with('success', 'Product added successfully');
    }

    // category delete garni function
    public function getDeleteCategory($slug)
    {
        $category = Category::where('slug', $slug)->where('deleted_at', null)->limit(1)->first();
        if (is_null($category)) {
            return redirect()->back()->with('error', 'Category not found');
        }

        $category->deleted_at = Carbon::now();
        $category->save();

        return redirect()->back()->with('success', 'Category deleted successfully!');
    }

    // category edit garni page dekahuna layeko
    public function getEditCategory($slug)
    {
        $category = Category::where('slug', $slug)->where('deleted_at', null)->limit(1)->first();
        if (is_null($category)) {
            return redirect()->back()->with('error', 'Category not found');
        }

        $data = [
            'category' => $category,
        ];

        return view('admin.category.edit', $data);
    }

    // category edit garni function
    public function postEditCategory(Request $request, $slug)
    {
        $category = Category::where('slug', $slug)->where('deleted_at', null)->limit(1)->first();
        if (is_null($category)) {
            return redirect()->back()->with('error', 'Category not found');
        }

        $request->validate([
            'category_title' => 'required|unique:categories,category_title,' . $category->id,
            'category_image' => 'image|mimes:jpeg,jpg,png,gif',
            'status' => 'required|in:active,inactive'
        ]);

        // dd($request->all());

        // $function_ko_variable = $request->input('form_ko_name_ma_vayeko_value');

        $category_title = $request->input('category_title');
        // slug generate haneko
        $slug = Str::slug($category_title);

        $status = $request->input('status');
        $category_description = $request->input('category_description');
        $image = $request->file('category_image');
        // dd($category_title, $slug);

        // image xa vaney
        if ($image) {
            // image ko uniqe name generate garnixa
            //md5(), sha1()
            // $unique_name = md5(time());
            $unique_name = sha1(time());
            // dd($unique_name);

            // image ko extension patta launa paryo
            $extension = $image->getClientOriginalExtension();
            // dd($extension);

            // file ko name vaneko filename.extension (uniqename.extension)
            $category_image = $unique_name . '.' . $extension;
            // dd($category_image);

            // yo name bata aayeko tyo image lai hamro public vitra move paryo
            $image->move('uploads/category/', $category_image);

            // purano image lai remove haneko
            if ($category->category_image != null) {
                unlink('uploads/category/' . $category->category_image);
            }
        }

        // database ma save garna
        // model_access_gareko_variable = new model_ko_name;


        // $category = new Category; yo line edit garni bela lekhni hoina yesley chai naya category add garna help garxa so aailey ko case ma bug aauxa


        // model_access_gareko_variable->database_ko_column_ko_field = database_ko_column_ko_field_ko_data_rakehko_variable;
        $category->category_title = $category_title;
        $category->slug = $slug;
        $category->status = $status;
        $category->category_description = $category_description;

        if ($image) {
            $category->category_image = $category_image; // image ko uniquename.extension save gareko variable garnu hai
        }

        $category->save();

        return redirect()->route('admin.getManageCategory')->with('success', 'Category edited successfully');
    }

    // product delete garni function
    public function getDeleteProduct($slug)
    {
        $product = Product::where('slug', $slug)->where('deleted_at', null)->limit(1)->first();
        if (is_null($product)) {
            return redirect()->back()->with('error', 'Product not found');
        }

        $product->deleted_at = Carbon::now();
        $product->save();

        return redirect()->back()->with('success', 'Product deleted successfully!');
    }
    // Product edit garni page dekhauna ko lagi
    public function getEditProduct($slug)
    {
        $product = Product::where('slug', $slug)->where('deleted_at', null)->limit(1)->first();
        if (is_null($product)) {
            return redirect()->back()->with('error', 'Product not found');
        }
        $categories = Category::where('deleted_at', null)->orderby('category_title', 'asc')->get();
        $data = [
            'product' => $product,
            'categories' => $categories

        ];
        // dd($data);
        return view('admin.product.edit', $data);
    }
    // product edit garni function
    public function postEditProduct(Request $request, $slug)
    {
        $product = Product::where('slug', $slug)->where('deleted_at', null)->limit(1)->first();
        if (is_null($product)) {
            return redirect()->back()->with('error', 'Product not found');
        }
        // dd($product);
        $request->validate([
            'product_title' => 'required|unique:products,product_title,' . $product->id,
            'category_id' => 'required|integer|exists:categories,id',
            'product_stock' => 'required|integer',
            'orginal_cost' => 'required|numeric',
            'discounted_cost' => 'numeric',
            'product_image' => 'image|mimes:jpeg,jpg,png,gif,webp',
            'status' => 'required|in:active,inactive',
            'product_description' => 'required'
        ]);

        //    dd($request->all());

        // $function_ko_variable = $request->input('form_ko_name_ma_vayeko_value');

        $product_title = $request->input('product_title');
        // slug generate haneko
        $slug = Str::slug($product_title);

        $category_id = $request->input('category_id');
        $category = Category::where('id', $category_id)->where('deleted_at', null)->limit(1)->first();

        if (is_null($category)) {
            return redirect()->back()->with('error', 'Category not found');
        }

        $status = $request->input('status');
        $product_description = $request->input('product_description');
        $orginal_cost = $request->input('orginal_cost');
        $discounted_cost = $request->input('discounted_cost');
        $stock = $request->input('product_stock');
        $image = $request->file('product_image');
        // dd($category_title, $slug);

        // image xa vaney
        if ($image) {
            // image ko uniqe name generate garnixa
            //md5(), sha1()
            // $unique_name = md5(time());
            $unique_name = sha1(time());
            // dd($unique_name);

            // image ko extension patta launa paryo
            $extension = $image->getClientOriginalExtension();
            // dd($extension);

            // file ko name vaneko filename.extension (uniqename.extension)
            $product_image = $unique_name . '.' . $extension;
            // dd($category_image);

            // yo name bata aayeko tyo image lai hamro public vitra move gareko
            $image->move('uploads/product/', $product_image);

            // image remove garnako lagi
            if ($product->product_image) {
                unlink('uploads/product/' . $product->product_image);
            }
        }

        // database ma save garna
        // model_access_gareko_variable = new model_ko_name;

        // naya colum tehima edit nahunako lagi gareko tala ko uncomment
        // $product = new Product();
        // model_access_gareko_variable->database_ko_column_ko_field = database_ko_column_ko_field_ko_data_rakehko_variable;

        $product->product_title = $product_title;
        $product->category_id = $category->id;
        $product->slug = $slug;
        $product->status = $status;
        $product->product_description = $product_description;
        $product->orginal_cost = $orginal_cost;
        $product->discounted_cost = $discounted_cost;
        $product->product_stock = $stock;

        if ($image) {
            $product->product_image = $product_image; // image ko uniquename.extension save gareko variable garnu hai
        }

        $product->save();

        return redirect()->route('admin.getManageProduct')->with('success', 'Product Edited successfully');
    }

    // order manage garni function
    public function getManageOrder()
    {
        $data = [
            'orders' => Order::all(),
        ];

        return view('admin.order.manage', $data);
    }

    public function makePaymentComplete($id)
    {
        $order = Order::where('id', $id)->limit(1)->first();
        if (is_null($order)) {
            return redirect()->back()->with('error', 'Order not found');
        }

        if ($order->payment_status == 'Y') {
            $order->payment_status = 'N';
            $order->save();
        } else {
            $order->payment_status = 'Y';
            $order->save();
        }

        return redirect()->back()->with('success', 'Order payment status changed.');
    }
}
