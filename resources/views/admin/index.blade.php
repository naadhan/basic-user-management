@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h3>{{ __('Users') }}</h3>

            @if(count($users))
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <th> #</th>
                        <th> Photo</th>
                        <th> Name</th>
                        <th> Email </th>
                        <th> Address </th>
                        <th> Active </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td> {{$user->id}} </td>
                            <td> <img src="{{ url('/images') }}/{{ $user->photo }}" height="50px"  width="50px" /> </td>
                            <td> {{$user->name}} </td>
                            <td> {{$user->email}} </td>
                            <td> {{$user->address}} </td>
                            <td> @if ( (bool)$user->admin === true)
                                    <span class="btn">(admin)</span>
                                @else
                                    @if ( (bool)$user->active === true)
                                        <a href="{{ route('admin/status-update') }}?id={{ $user->id }}" class="btn btn-outline-danger">deactivate</a>
                                    @else
                                        <a href="{{ route('admin/status-update') }}?id={{ $user->id }}" class="btn btn-outline-success">activate</a>
                                    @endif
                                    {{--<input type="checkbox" data-id="{{ $user->id }}" name="status" class="switch-status" {{ $user->active == 1 ? 'checked' : '' }}>--}}
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $users->links() }}
            @else
                <p> No users found..</p>
            @endif
        </div>
    </div>
</div>
@endsection
