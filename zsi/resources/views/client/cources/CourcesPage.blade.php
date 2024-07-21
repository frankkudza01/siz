@section('main_contents')
@extends('client.layouts.layout')

    <div class="main">
        @include("client.navigation.header")
        @include("client.cources.heroSection")
        @include("client.cources.courcesSection")
        @include("client.footer.footerSection")
    </div>

@endsection()
