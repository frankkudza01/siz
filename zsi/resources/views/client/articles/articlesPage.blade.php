@section('main_contents')
@extends('client.layouts.layout')

    <div class="main">
        @include("client.navigation.header")
        @include("client.articles.heroSection")
        @include('client.articles.articlesSection')
        @include("client.footer.footerSection")
    </div>

@endsection()
