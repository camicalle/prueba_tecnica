@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <create-component />
        </div>
        <div class="col-md-8">
            <show-component />
        </div>
    </div>
</div>
@endsection
