@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Application</div>
                    <div class="card-body">
                        @include("applications/_form",["action"=>"edit"])
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
