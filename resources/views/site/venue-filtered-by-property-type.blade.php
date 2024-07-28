@extends('layouts.site')

@section('content')
    <section class="box-section block-content-tourlist box-border-bottom background-body pt-30 pb-30">
        <div class="container">
            <x-venue-list
                    url="/api/application/v1/venue/sort-by-property-type"
                    :filterBy="\App\Enum\VenueFilterBy::PropertyType"
                    :id="$propertyType->id"
                    :title="$propertyType->title"
            />
        </div>
    </section>

@endsection


