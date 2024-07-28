@extends('layouts.site')

@section('content')
    <section class="box-section block-content-tourlist box-border-bottom background-body pt-30 pb-30">
        <div class="container">
            <x-venue-list
                    :filterBy="\App\Enum\VenueFilterBy::VenueType"
                    :id="$venueType->id"
                    :title="$venueType->title"
            />
        </div>
    </section>

@endsection


