@extends('layouts.app')
@section('content')
    <div class="container">
        <nav class="breadcrumb">
            <a href="/" class="breadcrumb-item"> Forum Categories</a>
            <a href="{{route('category.overview', $forum->category->id)}}" class="breadcrumb-item">{{$forum->category->title}}</a>
            <span class="breadcrumb-item active">{{$forum->title}}</span>
        </nav>
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <!-- Category one -->
                    <div class="col-lg-12">
                        <!-- second section  -->
                        <h4 class="text-white bg-info mb-0 p-4 rounded-top">
                            {{$forum->title}}
                        </h4>
                        <table
                            class="table table-striped table-responsivelg table-bordered"
                        >
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">Topic</th>
                                <th scope="col">Created</th>
                                <th scope="col">Statistics</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if (count($forum->discussions) > 0)
                                @foreach($forum->discussions as $topic)
                                    <tr>
                                        <td>
                                            <h3 class="h6">
                                                <a href="{{route('topic', $topic->id)}}" class=""
                                                >{{$topic->title}}</a
                                                >
                                            </h3>
                                            </div>
                                        </td>
                                        <td>
                                            <div>by <a href="{{route('client.user.profile', $topic->user->id)}}"> {{$topic->user->name}}</a></div>
                                            <div>{{$topic->created_at->diffForHumans()}}</div>
                                        </td>
                                        <td>
                                            <div>{{$topic->replies->count()}} replies</div>
                                            <div>{{$topic->views}} views</div>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <h1>No Topics found</h1>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <a href="{{route('topic.new', $forum->id)}}" class="btn btn-lg btn-primary mb-2">New Topic</a>
    </div>
@endsection