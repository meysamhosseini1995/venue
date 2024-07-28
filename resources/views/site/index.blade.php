@extends('layouts.site')

@section('content')
    <x-venue-city/>
    <section class="box-section block-content-tourlist box-border-bottom background-body">
        <div class="container">
            <div class="box-content-main">
                <div class="content-right">
                    <x-venue-list :filterBy="\App\Enum\VenueFilterBy::All"/>
                </div>
                <div class="content-left order-lg-first">
                    <x-venue-filter />
                </div>
            </div>
        </div>
    </section>

@endsection

