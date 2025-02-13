<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Categories as ControllersCategories;
use App\Http\Requests\CategoriesRequest;
use App\Http\Requests\ContentRequest;
use App\Http\Requests\UesrRequest;
use Illuminate\Http\Request;
use App\Models\Content;
use App\Models\Categories;
//use App\Models\Product;
use App\Models\User;


class ContentController extends Controller
{
    public function index()
    {
        $contents = Content::paginate(5);
        return view('content.index', compact('contents'));
    }

    public function create()
    {
        $contents = new Content;
        return view('content.form', compact('contents'));
    }



    public function edit($id)
    {
        $contents = Content::findOrFail($id);
        return view('content.form', compact('contents'));
    }

    private function save($data, $value)
    {
        $data->topic = $value->topic;
        $data->description = $value->description;
        $data->tags = $value->tags;
        $data->links = $value->links;
        //$data->status = true;
        $data->user_id = 1;
        $data->save();
    }

    public function update(ContentRequest $request, $id)
    {
        $content = Content::findOrFail($id);

        $this->save($content, $request);
        return redirect('/content');
    }

    public function destroy($id)
    {
        /*Content::destroy($id);
        $this->index();*/
        $content = Content::findOrFail($id);
        if ($content->status) {
            $content->status = false;
        } else {
            $content->status = true;
        }
        $content->save();

    }




    // public function categories_add(CategoriesRequest $value)
    // {
    //     $data= new Categories;

    //     if($value->file('image'))
    //     {
    //         $file = $value->file('image');
    //         $filename= date('YmdHi').$file->getClientOriginalName();
    //         $file-> move(public_path('public/img'), $filename);
    //         $data['image']= $filename;
    //     }

    //     $this->save($data,$value);
    //     return redirect('/');
    // }




    public function store(ContentRequest $request)
    {
        $content = new Content;

        $this->save($content, $request);
        return redirect('/content');
    }

    public function register_view(ContentRequest $request)
    {
        $user = new User;

        $this->save($user, $request);
        return redirect('/');
    }

    // public function login(Request $request){
    //     $user = User::all();
    //     $user->name = $request->name;

    // }

    public function categories()
    {
        // $categories = Categories::all();
        // $user = User::all();
        // session()->put('user' , $user);
        // return view('test.index', compact(['categories' , 'user']));

        $categories = Categories::all();
        return view('test.index', compact(['categories']));
    }

    public function products()
    {
        $prodcuts = product::all();
        $user = User::all();
        session()->put('user' , $user);
        return view('test.index', compact(['categories' , 'user']));
    }

    public function categories_view()
    {
        $categories = new Categories;
        return view('test.cat_add', compact('categories'));
    }

    public function product_view()
    {
        $products = new Product;
        return view('test.product_add', compact('products'));
    }


    public function categories_edit($id)
    {
        $categories = Categories::findOrFail($id);
        return view('test.cat_add', compact('categories'));
    }

    public function product_edit($id)
    {
        $products = Product::findOrFail($id);
        return view('test.product_add',compact($products) );
    }


    public function categories_add(Request $request){
        $categories= new categories();

        if($request->file('picture')){
            $file= $request->file('picture');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('image'), $filename);
            $categories['picture']= $filename;
        }
        $categories->name = $request->name;
        $categories->detail = $request->detail;
        $categories->save();
        return redirect('/');

    }

    public function product_add(Request $request){
        $products= new Product();

        if($request->file('picture')){
            $file= $request->file('picture');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('image'), $filename);
            $products['picture']= $filename;
        }
        $products->name = $request->name;
        $products->price = $request->name;
        $products->detail = $request->name;
        $products->save();
        return redirect('/');

    }

    public function categories_update(Request $request,$id)
    {
        $categories = Categories::findOrFail($id);

        if($request->file('picture')){
            $file= $request->file('picture');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('image'), $filename);
            $categories['picture']= $filename;
        }
        $categories->name = $request->name;
        $categories->detail = $request->detail;
        $categories->save();
        return redirect('/');
    }

    public function product_update(Request $request,$id)
    {
        $products = Product::findOrFail($id);

        if($request->file('picture')){
            $file= $request->file('picture');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('image'), $filename);
            $products['picture']= $filename;
        }
        $products->name = $request->name;
        $products->price = $request->name;
        $products->detail = $request->name;
        $products->save();
        return redirect('/');
    }

    public function categories_delete($id)
    {
        // $categories = Categories::findOrFail($id);
        // $categories->delete($id);
         Categories::destroy($id);
        //$this->categories();
        return redirect('/');
    }

    public function product_delete($id)
    {
        // $categories = Categories::findOrFail($id);
        // $categories->delete($id);
         Product::destroy($id);
        //$this->categories();
        return redirect('/');
    }

    // public function detail($id)
    // {
    //     // return Product::with([
    //     //     'product_images', 'categories'
    //     // ])->whereHas('categories', function ($query) use ($categoryId) {
    //     //     $query->where('id', $categoryId);
    //     // })->orderByDesc('id')->paginate(9);


    //     // $categories = Categories::join('product','categories_id', '=', 'categories.id')
    //     // ->where('product.categories_id', '=', $id )
    //     // ->get(['categories.*','product.*']);

    //     //var_dump($categories);
    //     //exit();

    //     // $header = Categories::findOrFail($id);
    //    // $categories = Categories::with('product')->find($id);
    //    $categories = Categories::findOrFail($id);



    //     return view('test.product',compact ('categories'));
    // }

    public function detail($id)
    {
       $categories = Categories::findOrFail($id);
        return view('test.product',compact ('categories'));
    }
}
