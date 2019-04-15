@extends('layouts.app')

@section('content')
@include ('cabinet._nav', ['page' => ''])
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cabiten</div>

                <div class="card-body">
                    You are in the cabinet
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
