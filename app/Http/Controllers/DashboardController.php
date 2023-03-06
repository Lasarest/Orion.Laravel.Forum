<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Discussion;
use App\Models\Category;
use App\Models\Forum;

class DashboardController extends Controller
{
    public function home()
    {
        $categories = Category::latest()->paginate(15);
        $topics = Discussion::latest()->paginate(15);
        $forums = Forum::latest()->paginate(15);
        $users = User::latest()->paginate(15);
        return view('admin.pages.home', compact('categories', 'topics', 'forums', 'users'));
    }
    public function show($id)
    {
        $user = User::find($id);
        $latest_user_post = Discussion::where('user_id', $id)->latest()->first();
        $latest = Discussion::latest()->first();
        return view('admin.pages.user', compact('user', 'latest_user_post', 'latest'));
    }
    public function profile()
    {
        $user = auth()->user();
        $latest_user_post = Discussion::where('user_id', auth()->id())->latest()->first();
        $latest = Discussion::latest()->first();
        return view('admin.pages.user', compact('user', 'latest_user_post', 'latest'));
    }
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        toastr()->success('User deleted successfully!');
        return back();
    }
    public function users()
    {
        $users = User::latest()->paginate(20);
        return view('admin.pages.users', compact('users'));
    }
    public function notifications()
    {
        $notifications = auth()->user()->notifications()->where('read_at', null)->get();
        return view('admin.pages.notifications', compact('notifications'));
    }
    public function markAsRead($id)
    {
        $notification = auth()->user()->notifications()->where('id', $id)->first();
        $notification->markAsRead();
        return back();
    }
    public function notificationDestroy($id)
    {
        $notification = auth()->user()->notifications()->where('id', $id)->first();
        $notification->delete();
        return back();
    }
}
