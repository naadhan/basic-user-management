@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    <p>
                        <img src="{{ url('/images') }}/{{ Auth::user()->photo }}" width="150" height="150" />
                    </p>
                    <p>{{ Auth::user()->name }}</p>
                    <p>{{ Auth::user()->email }}</p>
                    <p>{{ Auth::user()->address }}</p>
                    <p>
                        <a href="{{ route('user/edit') }}">Update Profile</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
