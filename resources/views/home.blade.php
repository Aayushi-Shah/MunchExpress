@extends('layouts.app')

@section('content')
<div class="container">
    <menu-container :items="{{ $categories }}" :resto-id="{{ $restoId }}" ></menu-container>
</div>
@endsection
