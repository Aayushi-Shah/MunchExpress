@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <menu-container :items="{{ $menus }}" :resto-id="{{ $restoId }}" ></menu-container>
        </div>
    </div>
</div>
@endsection
