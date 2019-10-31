@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-sm-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $user->name }}</h3>
                </div>
                <div class ="card-body">
                    <img class="rounded img-fluid" src="{{ Gravatar::src($user->email,500) }}" alt="">
                </div>
            </div>
            @include('user_follow.follow_button', ['user' => $user])
        </aside>
        <div class="col-sm-8">
            @include('users.navtabs', ['user' => $user])
            @foreach ($users as $user)
                <li class="media mb-3">
                    <img class="mr-2 rounded" src="{{ Gravatar::src($user->email, 50) }}" alt="">
                <div>
                    {!! link_to_route('users.show', $user->user->name, ['id' => $user->user->id]) !!} <span class="text-muted">posted at {{ $user->created_at }}</span>
                </div>
                <div>
                    <p class="mb-0"></p>
                </div>
                </li>
            @endforeach
        </div>
    </div>
@endsection