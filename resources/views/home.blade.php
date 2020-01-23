@extends('layouts.app')

@section('content')
<div class="container">
    <menu-container :items="{{ $menus }}"></menu-container>
</div>
@endsection
