<div class="sidebar-left border-1 background-body">
    <div class="box-filters-sidebar">
        <div class="block-filter border-1">
            <h6 class="text-lg-bold item-collapse neutral-1000">By Event Types</h6>
            <div class="box-collapse scrollFilter">
                <ul class="list-filter-checkbox" id="eventList">
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="sidebar-left border-1 background-body">
    <div class="box-filters-sidebar">
        <div class="block-filter border-1">
            <h6 class="text-lg-bold item-collapse neutral-1000">By Venue Type</h6>
            <div class="box-collapse scrollFilter">
                <ul class="list-filter-checkbox" id="venueType">

                </ul>
            </div>
        </div>
    </div>
</div>
<div class="sidebar-left border-1 background-body">
    <div class="box-filters-sidebar">
        <div class="block-filter border-1">
            <h6 class="text-lg-bold item-collapse neutral-1000">By Property Type</h6>
            <div class="box-collapse scrollFilter">
                <ul class="list-filter-checkbox" id="propertyType">
                </ul>
            </div>
        </div>
    </div>
</div>

@push('js')
    <script type="text/javascript">
        function eventList() {
            const obj = JSON.parse(localStorage.getItem('mainData'));
            let text = '';
            $.each( obj.event_list, function( key, value ) {
                text += makeOptionSelect(value['id'],value['title'],value['events_count'],'eventList');
            });
            $('#eventList').html(text);
        }

        function venueType() {
            const obj = JSON.parse(localStorage.getItem('mainData'));
            let text = '';
            $.each( obj.venue_types, function( key, value ) {
                text += makeOptionSelect(value['id'],value['title'],value['venues_count'],'venueType');
            });
            $('#venueType').html(text);
        }

        function propertyType() {
            const obj = JSON.parse(localStorage.getItem('mainData'));
            let text = '';
            $.each( obj.property_types, function( key, value ) {
                text += makeOptionSelect(value['id'],value['title'],value['venues_count'],'propertyType');
            });
            $('#propertyType').html(text);
        }

        function makeOptionSelect(id,title,count,parameter) {
            const urlParams = new URLSearchParams(window.location.search);
            const isChecked = urlParams.has(`${parameter}[${id}]`) ? 'checked' : '';

            return `<li>
                <label class="cb-container">
                <input type="checkbox" ${isChecked} onclick="toggleUrlParameter('${parameter}[${id}]', ${id})">
                <span class="text-sm-medium">${title}</span>
                <span class="checkmark"></span>
                </label><span class="number-item">${count}</span>
            </li>`;
        }

        eventList();
        venueType();
        propertyType();
    </script>
@endpush