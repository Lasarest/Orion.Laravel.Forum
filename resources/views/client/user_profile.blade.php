@extends('layouts.app')
@section('content')
@if(auth()->id() == $user->id)
<?php
exit(redirect('home'));
?>
@else
<div class="container">
      <div class="row">
        <div class="col-md-3">
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                @if($user->image)
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle rounded-circle"  src="{{asset('/storage/profile/'.$user->image)}}" alt="User profile picture">
                </div>
                @else
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle rounded-circle"  src="{{asset('/images/profile.png')}}" alt="User profile picture">
                </div>
                @endif
              <h3 class="profile-username text-center">{{$user->name}}</h3>
              <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                  <b>Posts:</b> <a class="float-right">{{$user->topics->count()}}</a>
                </li>
              </ul>
            </div>
          </div>
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">About Me</h3>
            </div>
            <div class="card-body">
              <strong><i class="fas fa-book mr-1"></i> Education</strong>
              <p class="text-muted">
                {{$user->education}}
              </p>
              <hr>
              <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>
              <p class="text-muted">{{$user->country}}</p>
              <hr>
              <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>
              <p class="text-muted">
                {{$user->skills}}
              </p>
              <hr>
              <strong><i class="far fa-file-alt mr-1"></i>Bio</strong>
              <p class="text-muted">{{$user->bio}}</p>
            </div>
          </div>
        </div>
        <div class="col-md-9">
          <div class="card">
            <div class="card-header p-2">
              <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a></li>
              </ul>
            </div>
            <div class="card-body">
              <div class="tab-content">
              <div class="active tab-pane" id="activity">
              @if($latest_user_post)
                    <div class="post">
                          @if($user->image)
                              <img class="img-circle img-bordered-sm rounded-circle" width="50" height="50" src="{{asset('/storage/profile/'.$user->image)}}" alt="user image">
                          @else
                              <img class="img-circle img-bordered-sm rounded-circle" width="50" height="50" src="{{asset('/images/profile.png')}}" alt="user image">
                          @endif
                          <span class="username">
                          {{$user->name}}
                          @if(auth()->user()->is_admin)
                              <a href="{{route('topic.delete', $latest_user_post->id)}}" class="float-right btn-tool">
                                  <i class="fas fa-times"></i>
                              </a>
                          @endif
                          </span> 
                          <span class="description">started a discussion: <a href="{{route('topic', $latest_user_post->id)}}">{{$latest_user_post->title}}</a> - {{$latest_user_post->created_at->diffForHumans()}}</span>
                      </div>
                      <p>
                          {{$latest_user_post->desc}}
                      </p>
                      <p>
                          <i class="fas fa-eye mr-1"></i>{{$latest_user_post->views}} views
                          <i class="fas fa-share mr-1"></i>{{$latest_user_post->replies->count()}} replies
                      <span class="float-right">
                      </span>
                      </p>
                  </div>
              @else
                  <h3>You have not started any discussion yet!</h3>
              @endif
              </div>
                <div class="tab-pane" id="timeline">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endif
@endsection