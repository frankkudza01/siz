@section('main_contents')
@extends('client.layouts.layout')

    <div class="main">
        @include("client.navigation.header")
        @include("client.about.headerSection")
        @include("client.home.aboutSection")
        @include("client.about.aboutSection")
        @include("client.about.resourcesSection")
        @include("client.footer.footerSection")
    </div>

@endsection()

