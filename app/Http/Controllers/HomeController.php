<?php

namespace App\Http\Controllers;

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
        return view('admin.category.manage');
    }
    // Product manage garni function
    public function getManageProduct()
    {
        return view('admin.product.manage');
    }

    // category add garni function
    public function postAddCategory(Request $request)
    {
        $request->validate([
            'category_title' => 'required|unique:categories,category_title',
            'category_image' => 'required|image|mimes:jpeg,jpg,png,gif',
            'status' => 'required|in:active,hidden'
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
}
