@section('main_contents')
@extends('client.layouts.layout')

    <div class="main">
        @include("client.navigation.header")
        @include("client.events.heroSection")
        @include('client.events.eventSection')
        @include("client.footer.footerSection")
    </div>

@endsection()
