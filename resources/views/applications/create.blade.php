@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create Application</div>
                    <div class="card-body">
                        @include("applications/_form",["action"=>"create"])
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
