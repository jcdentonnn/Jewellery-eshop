{{--}}
Sekcia search results - ukazka najdenych produktov po vyhladavani
{{--}}

@extends('layouts.app')

@section('title', 'Search results of search "'.$q.'"')

@section('content')

    <div class="products-res">
        <div class="prod-res-txt">
            <h1>Search results of search "{{ $q }}"</h1>
        </div>

        <div class="prod-res">
            @include('includes.product-container')
            {{ $products->links() }}
        </div>
    </div>

@endsection