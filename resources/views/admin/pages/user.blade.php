@extends('layouts.dashboard')
@section('content')
@if($user)
  <section id="main-content">
    <section class="wrapper">
      <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header"><i class="fa fa-user-md"></i> Profile</h3>
          <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="{{route('dashboard.home')}}">Home</a></li>
            <li><i class="fa fa-users"></i>Users</li>
            <li><i class="fa fa-user-md"></i>{{$user->name}}</li>
          </ol>
        </div>
      </div>
  <section class="content">
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
                <img class="profile-user-img img-fluid img-circle"  src="{{asset('/images/profile.png')}}" alt="User profile picture">
              </div>
              @endif
              <h3 class="profile-username text-center">{{$user->name}}</h3>
              <p class="text-muted text-center">{{$user->email}}</p>
              <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                  <b>Discussions:</b> <a class="float-right">{{$user->topics->count()}}</a>
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
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
              </ul>
            </div>
            <div class="card-body">
              <div class="tab-content">
              <div class="active tab-pane" id="activity">
                @if($latest_user_post)
                    <div class="post">
                        <div class="user-block">
                          @if($user->image)
                              <img class="img-circle img-bordered-sm rounded-circle" width="50" height="50" src="{{asset('/storage/profile/'.$user->image)}}" alt="user image">
                          @else
                              <img class="img-circle img-bordered-sm rounded-circle" width="50" height="50" src="{{asset('/images/profile.png')}}" alt="user image">
                          @endif
                            <span class="username">
                            {{$user->name}}
                            <a href="{{route('topic.delete', $latest_user_post->id)}}" class="float-right btn-tool">
                                <i class="fas fa-times"></i>
                            </a>
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
                <div class="tab-pane" id="settings">
                    <form action="{{route('user.update', $user->id)}}" method="POST" class="form-horizontal">
                        @csrf
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="name" class="form-control" value="{{$user->name}}" id="inputName" placeholder="Name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" value="{{$user->email}}" class="form-control" id="inputEmail" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                            <div class="col-sm-10">
                                <input type="text" value="{{$user->phone}}" class="form-control" name="phone" placeholder="Phone">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputExperience" class="col-sm-2 col-form-label">Education</label>
                            <div class="col-sm-10">
                                <input class="form-control" value="{{$user->education}}" name="education" placeholder="Education"></input>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
                            <div class="col-sm-10">
                                <input type="text" value="{{$user->skills}}" class="form-control" name="skills" placeholder="Skills separated by a comma">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputSkills" class="col-sm-2 col-form-label">Profession</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="proffesion" value="{{$user->proffesion}}" placeholder="Your profession">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputSkills" class="col-sm-2 col-form-label">Country</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="country" value="{{$user->country}}" placeholder="Your Country">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputExperience" class="col-sm-2 col-form-label">Your Bio</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="bio" >{{$user->bio}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="offset-sm-2 col-sm-10">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="offset-sm-2 col-sm-10">
                                <button type="submit" class="btn btn-danger">Update details</button>
                            </div>
                        </div>
                    </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endif
@endsection