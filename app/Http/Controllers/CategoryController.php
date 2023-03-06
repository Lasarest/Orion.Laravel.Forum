<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Notifications\NewCategory;
use App\Models\Forum;
use App\Models\Discussion;
use Telegram;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::latest()->paginate(20);
        return view('admin.pages.categories', \compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.new_category');
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
            'title' => 'required',
            'image' => 'required',
            'desc' => 'required'
        ]);
        $image = $request->image;
        $name = $image->getClientOriginalName();
        $new_name = time().$name;
        $dir = "storage/images/categories/";
        $image->move($dir, $new_name);
        $category = new Category;
        $category->title = $request->title;
        $category->desc = $request->desc;
        $category->user_id = auth()->id();
        $category->image = $new_name;
        $category->save();
        $latestCategory = Category::latest()->first();
        $admins = User::where('is_admin', 1)->get();
        foreach($admins as $admin)
        {
            $admin->notify(new NewCategory($latestCategory));
        }
        Session::flash('message', 'Category Created Successfully');
        Session::flash('alert-class', 'alert-success');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);
        return view('admin.pages.single_category', \compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.pages.edit_category', \compact('category'));
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
        $image = '';
        $name = '';
        $new_name = '';
        $dir = '';
        if($request->image){
            $image = $request->image;
            $name = $image->getClientOriginalName();
            $new_name = time().$name;
            $dir = "storage/images/categories/";
            $image->move($dir, $new_name);
        }
        $category = Category::find($id);
        if($request->title){
            $category->title = $request->title;
        }
        if($request->desc){
            $category->desc = $request->desc;
        }
        if($request->image){
            $category->image = $new_name;
        }
        $category->save();
        Session::flash('message', 'Category Updated Successfully');
        Session::flash('alert-class', 'alert-success');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return back();
    }
    /**
     *
     * @param
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $user = new User;
        $users_online = $user->allOnline();
        $forumsCount = count(Forum::all());
        $topicsCount = count(Discussion::all());
        $totalMembers = count(User::all());
        $totalCategories = count(Category::all());
        $categories = Category::query()->where('desc', 'LIKE', "%{$request->keyword}%")->get();
        return view('welcome', \compact('categories' , 'forumsCount', 'topicsCount', 'totalMembers', 'totalCategories', 'users_online'));
        return back();
    }
}
