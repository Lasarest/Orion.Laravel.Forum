@extends('layouts.app')
@section('content')
    <div class="container">
        <nav class="breadcrumb">
            <a href="/" class="breadcrumb-item">Forum Categories</a>
            <span class="breadcrumb-item active">{{$category->title}}</span>
        </nav>

        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <!-- Category one -->
                    <div class="col-lg-12">
                        <!-- second section  -->
                        <h4 class="text-white bg-info mb-0 p-4 rounded-top">
                            {{$category->title}}
                        </h4>
                        <table class="table table-striped table-responsive table-bordered mb-xl-0">
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
                                <h1>No forums in this category</h1>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
            <aside>
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
    </div>
@endsection
