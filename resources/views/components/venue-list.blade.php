@if(!empty($title))
<div class="row align-items-end">
    <div class="col-md-12 mb-30 wow" style="visibility: visible; animation-name: fadeInLeft;">
        <h2 class="neutral-1000">{{ $title }}</h2>
    </div>
</div>
@endif
<div class="row">
    <div class="box-filters mb-25 pb-5 border-bottom border-1">
        <div class="row align-items-center">
            <div class="col-xl-4 col-md-4 mb-10 text-lg-start text-center">
                <div class="box-view-type">
                    <a class='display-type display-grid active' href='#'>
                        <svg width="22" height="22" viewbox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M20 8V2.75C20 2.3375 19.6625 2 19.25 2H14C13.5875 2 13.25 2.3375 13.25 2.75V8C13.25 8.4125 13.5875 8.75 14 8.75H19.25C19.6625 8.75 20 8.4125 20 8ZM19.25 0.5C20.495 0.5 21.5 1.505 21.5 2.75V8C21.5 9.245 20.495 10.25 19.25 10.25H14C12.755 10.25 11.75 9.245 11.75 8V2.75C11.75 1.505 12.755 0.5 14 0.5H19.25Z" fill=""></path>
                            <path d="M20 19.25V14C20 13.5875 19.6625 13.25 19.25 13.25H14C13.5875 13.25 13.25 13.5875 13.25 14V19.25C13.25 19.6625 13.5875 20 14 20H19.25C19.6625 20 20 19.6625 20 19.25ZM19.25 11.75C20.495 11.75 21.5 12.755 21.5 14V19.25C21.5 20.495 20.495 21.5 19.25 21.5H14C12.755 21.5 11.75 20.495 11.75 19.25V14C11.75 12.755 12.755 11.75 14 11.75H19.25Z" fill=""></path>
                            <path d="M8 8.75C8.4125 8.75 8.75 8.4125 8.75 8V2.75C8.75 2.3375 8.4125 2 8 2H2.75C2.3375 2 2 2.3375 2 2.75V8C2 8.4125 2.3375 8.75 2.75 8.75H8ZM8 0.5C9.245 0.5 10.25 1.505 10.25 2.75V8C10.25 9.245 9.245 10.25 8 10.25H2.75C1.505 10.25 0.5 9.245 0.5 8V2.75C0.5 1.505 1.505 0.5 2.75 0.5H8Z" fill=""></path>
                            <path d="M8 20C8.4125 20 8.75 19.6625 8.75 19.25V14C8.75 13.5875 8.4125 13.25 8 13.25H2.75C2.3375 13.25 2 13.5875 2 14V19.25C2 19.6625 2.3375 20 2.75 20H8ZM8 11.75C9.245 11.75 10.25 12.755 10.25 14V19.25C10.25 20.495 9.245 21.5 8 21.5H2.75C1.505 21.5 0.5 20.495 0.5 19.25V14C0.5 12.755 1.505 11.75 2.75 11.75H8Z" fill=""></path>
                        </svg>
                    </a>
                    <span class="text-sm-bold neutral-500 number-found">
                                        <span id="numberOfResult"></span> tours found
                                    </span>
                </div>
            </div>
            <div class="col-xl-8 col-md-8 mb-10 text-lg-end text-center">
                <div class="box-item-sort">
                    <a class="btn btn-sort" href="#">
                        <svg width="18" height="18" viewbox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.25 6L5.25 3M5.25 3L2.25 6M5.25 3L5.25 15" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M9.75 12L12.75 15M12.75 15L15.75 12M12.75 15L12.75 3" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="box-grid-tours wow fadeIn">
        <div class="row" id="VenueList">
        </div>
    </div>
</div>
<div class="row">
    <nav aria-label="Page navigation example">
        <ul class="pagination" id="pagination"></ul>
    </nav>
</div>


@push('js')
    <script type="text/javascript">
        function searchList() {
            var text = '';
            ajaxCall('/api/application/v1/venue' + window.location.search, 'GET', @json($query), function (res) {
                if (res.data != null) {
                    $('#numberOfResult').html(res.meta.total);
                    paginate((res.meta.total / res.meta.per_page), res.meta.current_page);
                    $.each(res.data, function (key, value) {
                        text += postItem(value);
                    });
                }
                $('#VenueList').html(text);
            });
        }

        function postItem(data) {
            return `<div class="col-xl-4 col-lg-6 col-md-6">
                        <div class="card-journey-small background-card">
                            <div class="card-image"> <a class="label" href="#">Top Rated</a><img src="${data?.image}" alt="Travila">
                            </div>
                            <div class="card-info background-card">
                                <div class="card-rating">
                                    <div class="card-left"> </div>
                                    <div class="card-right"> <span class="rating">${getRandom(5, 2)} <span class="text-sm-medium neutral-500">(${getRandom(1000,)} reviews)</span></span></div>
                                </div>
                                <div class="card-title">
                                    <a class="text-lg-bold neutral-1000" href="/venue/${data?.id}">${data?.name}</a>
                                </div>
                                <div class="card-program">
                                    <div class="card-duration-tour">
                                        <p class="icon-duration text-sm-medium neutral-500">${getRandom(10)} days later</p>
                                        <p class="icon-guest text-sm-medium neutral-500">${getRandom(1000)} guest</p>
                                    </div>
                                    <div class="endtime">
                                        <div class="card-price">
                                            <h6 class="heading-6 neutral-1000">${getRandom(500, 2)}</h6>
                                        </div>
                                        <div class="card-button"> <a class="btn btn-gray" href="/venue/${data?.id}">View</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>`;
        }

        function refreshSearchList() {
            reModal(true);
            $('html, body').animate({scrollTop: $(".box-filters").offset().top},100);
            searchList();
            reModal(false)
        }


        function removeAllFilter() {
            history.pushState(null, null, '/filter');
            refreshSearchList();
        }

        searchList();
    </script>
@endpush