@extends('layouts.app')

@section('content')

    <div class="ps-page--single" id="contact-us" dir="{{Mingo::currentLocale()==='ar'?'rtl':''}}">

        @include('theme.contact.section_a_top')

        @if(setting('contacts.contact_map'))

           @include('theme.contact.section_b_map')
           
        @endif
 

        @include('theme.contact.section_c_info')

        {{--@include('theme.contact.section_d_form')--}}
        @livewire('contact.contact')

    </div>
    
@endsection