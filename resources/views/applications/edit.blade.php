@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a href="{{ route("applications.index") }}">Applications</a>
                <a href="{{ route("applications.create") }}">Create</a>
                <div class="card">
                    <div class="card-header">Edit Application</div>
                    <div class="card-body">

                        <div>
                            Review:
                            <div class="px-4">
                                <div>
                                    App Id: {{$application->id}}
                                </div>
                                <div>
                                    App Key: {{$application->key}}
                                </div>
                                <div>
                                    App Secret: {{$application->secret}}
                                </div>
                            </div>
                        </div>

                        <hr>
                        @include("applications/_form",["action"=>"edit"])


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
