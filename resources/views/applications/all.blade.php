@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a href="{{ route("applications.index") }}">Applications</a>
                <a href="{{ route("applications.create") }}">Create</a>
                <x-success></x-success>
                <div class="card">
                    <div class="card-header">Applications</div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Id</th>
                                <th>Key</th>
                                <th>Secret</th>
                                <th>Comment</th>
                                <th>Creator</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($applications as $application)
                                <tr>
                                    <td><a href="{{route("applications.edit",$application)}}">{{ $application->name }}</a></td>
                                    <td>{{ $application->id }}</td>
                                    <td>{{ $application->key }}</td>
                                    <td>{{ $application->secret }}</td>
                                    <td>{!! nl2br($application->comment) !!}</td>
                                    <td>{{ $application->user->name }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
