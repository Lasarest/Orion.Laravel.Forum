@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row mb-5">
        @if(count($users) > 0)
            @foreach($users as $user)
                    <div class="col-lg-4">
                    <div class="card p-2 mt-3">
                        <div class="first">
                            <h6 class="heading text-success">{{$user->name}}</h6>
                            <div class="time d-flex flex-row align-items-center justify-content-between mt-3">
                                <div class="d-flex align-items-center"> <i class="fa fa-clock-o clock"></i> <span class="hour ml-1">Joined: {{$user->created_at->diffForHumans()}}</span> </div>
                                <div> <span class="font-weight-bold">Rank: {{$user->rank}}</span> </div>
                            </div>
                        </div>
                        <div class="second d-flex flex-row mt-2">
                            @if($user->image)
                            <div class="image mr-3"> <img src="{{asset('/storage/profile/'.$user->image)}}" class="rounded-circle" width="60" /> </div>
                            @else
                            <div class="image mr-3"> <img src="{{asset('/images/profile.png')}}" class="rounded-circle" width="60" /> </div>
                            @endif
                            <div class="">
                                <div class="d-flex flex-row mb-1">Posts: <span> {{$user->topics->count()}}</span></div>
                                <div><a href="{{route('client.user.profile', $user->id)}}" class="btn btn-outline-dark btn-sm">See Profile</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <h1>No Registered Users Found</h1>
        @endif
    </div>
</div>
@endsection