<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Forum;
use App\Models\Discussion;
use App\Models\User;
use App\Models\DiscussionReply;
use App\Notifications\NewTopic;
use App\Notifications\NewReply;
use Telegram;

class DiscussionController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $forums = Forum::latest()->get();
        $forum = Forum::find($id);
        return view('client.new-topic', \compact('forums', 'forum'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $notify = 0;
        if ($request->notify && $request->notify == "on"){
            $notify = 1;
        }
        $topic = new Discussion;
        $topic->title = $request->title;
        $topic->desc = $request->desc;
        $topic->forum_id = $request->forum_id;
        $topic->user_id = auth()->id();
        $topic->notify = $notify;
        $topic->save();
        $latestTopic = Discussion::latest()->first();
        $admins = User::where('is_admin', 1)->get();
        foreach($admins as $admin)
        {
            $admin->notify(new NewTopic($latestTopic));
        }
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
        $topic = Discussion::find($id);
        if($topic)
        {
            $topic->increment('views', 1);
        }
        return view('client.topic', \compact('topic'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function reply(Request $request, $id)
    {
        $reply = new DiscussionReply;
        $reply->desc = $request->desc;
        $reply->user_id = auth()->id();
        $reply->discussion_id = $id;
        $discussion = Discussion::find($id);
        $forumId = $discussion->forum->id;
        $url = \URL::to('/forum/overview/'. $forumId);
        $reply->save();
        $user = auth()->user();
        $user->increment('rank', 10);
        $latestReply = DiscussionReply::latest()->first();
        $admins = User::where('is_admin', 1)->get();
        foreach($admins as $admin)
        {
            $admin->notify(new NewReply($latestReply));
        }
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
        $reply = DiscussionReply::find($id);
        $reply->delete();
        return back();
    }
    public function updates()
    {
        $updates = Telegram::getUpdates();
        dd($updates);
    }
    public function remove($id)
    {
        $discussion = Discussion::find($id);
        $discussion->delete();
        return back();
    }
}
