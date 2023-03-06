@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-8">
            <div class="row">
                @if(count($categories) > 0)
                    @foreach($categories as $category)
                        <div class="col-lg-12">
                            <a href="{{route('category.overview', $category->id)}}">
                                <h4 class="text-white bg-info mb-0 p-4 rounded-top">
                                     {{$category->title}}
                                </h4>
                            </a>
                            <table class="table table-striped table-responsive table-bordered">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">Forum</th>
                                        <th scope="col">Topics</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($category->forums) > 0)
                                        @foreach($category->forums as $forum)
                                            <tr>
                                                <td>
                                                    <h3 class="h5">
                                                        <a href="{{route('forum.overview', $forum->id)}}" class="text-uppercase">{{$forum->title}}</a>
                                                    </h3>
                                                    <p class="mb-0">
                                                        {!!$forum->desc!!}
                                                    </p>
                                                </td>
                                                <td><div>{{$forum->discussions->count()}}</div></td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <h1>No Forums Found in Category</h1>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    @endforeach
                @else
                    <h1>No Forums Categories Found</h1>
                @endif
            </div>
        </div>
        <div class="col-lg-4">
            <aside>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Members Online</h4>
                        <ul class="list-unstyled mb-0">
                            @if(count($users_online) > 0)
                                @foreach($users_online as $user)
                                    <li><a href="{{route('client.user.profile', $user->id)}}">{{$user->name}} <span class="badge badge-pill badge-success">Online</span></a></li>
                                @endforeach
                            @endif
                        </ul>
                        <ul class="list-unstyled mb-0">
                            <li><a href="{{route('client.users')}}">View All Members</a></li>
                        </ul>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Members Statistics</h4>
                        <dl class="row">
                            <dt class="col-8 mb-0">Total Categories:</dt>
                            <dd class="col-4 mb-0">{{$totalCategories}}</dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-8 mb-0">Total Forums:</dt>
                            <dd class="col-4 mb-0">{{$forumsCount}}</dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-8 mb-0">Total Topics:</dt>
                            <dd class="col-4 mb-0">{{$topicsCount}}</dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-8 mb-0">Total members:</dt>
                            <dd class="col-4 mb-0">{{$totalMembers}}</dd>
                        </dl>
                    </div>
                </div>
            </aside>
        </div>
    </div>
@endsection