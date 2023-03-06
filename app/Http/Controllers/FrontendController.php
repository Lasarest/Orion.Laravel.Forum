<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use App\Models\Category;
use App\Models\Discussion;
use App\Models\User;
use Illuminate\Http\Request;


class FrontendController extends Controller
{
    public function index()
    {
        $user = new User;
        $users_online = $user->allOnline();
        $forumsCount = count(Forum::all());
        $topicsCount = count(Discussion::all());
        $totalMembers = count(User::all());
        $totalCategories = count(Category::all());
        $categories = Category::latest()->get();
        return view('welcome', \compact('categories' , 'forumsCount', 'topicsCount', 'totalMembers', 'totalCategories', 'users_online'));
    }
    public function categoryOverview($id)
    {
        $forumsCount = count(Forum::all());
        $topicsCount = count(Discussion::all());
        $totalMembers = count(User::all());
        $totalCategories = count(Category::all());
        $category = Category::find($id);
        return view('client.category-overview', \compact('category', 'forumsCount', 'topicsCount', 'totalMembers', 'totalCategories'));
    }
    public function forumOverview($id)
    {
        $forum = Forum::find($id);
        return view('client.forum-overview', \compact('forum'));
    }
    public function profile($id)
    {
        $latest_user_post = Discussion::where('user_id', $id)->latest()->first();
        $user = User::find($id);
        return view('client.user_profile', \compact('user', 'latest_user_post'));
    }
    public function users()
    {
        $users = User::latest()->paginate(15);
        return view('client.users', \compact('users'));
    }
    public function photoUpdate(Request $request, $id)
    {
        if(!$request->profile_image)
        {
            return back();
        }
        $image = $request->profile_image;
        $name = $image->getClientOriginalName();
        $new_image = time().$name;
        $dir = 'storage/profile/';
        $image->move($dir, $new_image);
        $user = User::find($id);
        $user->image = $new_image;
        $user->save();
        return back();
    }
}
