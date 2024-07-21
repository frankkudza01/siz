@section('main_contents')
@extends('client.layouts.layout')

    <div class="main">
        @include("client.navigation.header")
        @include("client.home.heroSection")
        @include("client.home.aboutSection")
        @include("client.home.ctaSection")
        @include("client.home.blogSection")
        @include("client.home.eventsSection")
        @include("client.home.resourcesSection")
        @include("client.footer.footerSection")
    </div>

@endsection()
