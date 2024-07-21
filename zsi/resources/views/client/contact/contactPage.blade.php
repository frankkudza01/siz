@section('main_contents')
@extends('client.layouts.layout')

    <div class="main">
        @include("client.navigation.header")
        @include("client.contact.heroSection")
        @include('client.contact.promoSection')
        @include('client.contact.contactSection')
        @include('client.contact.mapSection')
        @include("client.footer.footerSection")
    </div>

@endsection()
