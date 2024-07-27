<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="msapplication-TileColor" content="#0E0E0E">
    <meta name="template-color" content="#0E0E0E">
    <meta name="description" content="Index page">
    <meta name="keywords" content="index, page">
    <meta name="author" content="meysamhosseini1995@gmail.com">
    <link rel="shortcut icon" type="image/x-icon" href="assets/imgs/template/favicon.svg">
    <link href="{{ asset('/assets/css/stylee209.css?v=1.0.0') }}" rel="stylesheet">
    <title>Venue Test Project</title>
</head>
<body>

<x-header />
<main class="main">
    @yield('content')
</main>
<x-footer />


<div class="remodal-wrapper">
    <div class="remodal c-remodal-loader" role="dialog">
        <div class="c-remodal-loader__icon">
            <img src="{{ asset('assets/imgs/template/logo.svg') }}" class="img-responsive" style="height: 45px;">
        </div>
        <div class="c-remodal-loader__bullets">
            <i class="c-remodal-loader__bullet"></i>
            <i class="c-remodal-loader__bullet"></i>
            <i class="c-remodal-loader__bullet"></i>
            <i class="c-remodal-loader__bullet"></i>
        </div>
    </div>
</div>
<!--Vendors Scripts-->
<script src="{{ asset('assets/js/vendor/jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/jquery-migrate-3.3.0.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/pagination/jquery.twbsPagination.js') }}"></script>
<script src="{{ asset('assets/js/plugins/pagination/jquery.simplePagination.js') }}"></script>
<script>
    function ajaxCall(url,method,param,callback,loading=true) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
            }});
        $.ajax({
            async: true,
            url: url,
            type: method,
            dataType: 'json',
            data : param,
            success:function(data){
                callback(data);
            },
            error:function(data) {
            }
        });
    }


    function urlChanging(url, param, value) {
        const hash = {};
        const parser = document.createElement('a');

        parser.href = url;

        const parameters = parser.search.split(/\?|&/);

        for (let i = 0; i < parameters.length; i++) {
            if (!parameters[i]) continue;

            const ary = parameters[i].split('=');
            hash[ary[0]] = ary[1];
        }

        if (hash[param] === String(value)) {
            delete hash[param];
        } else {
            hash[param] = value;
        }

        const list = [];
        Object.keys(hash).forEach(function(key) {
            list.push(key + '=' + hash[key]);
        });

        parser.search = '?' + list.join('&');
        return parser.href;
    }

    function toggleUrlParameter(parameter, value) {
        history.pushState(null, null, urlChanging(location.href, 'page', 1));
        history.pushState(null, null, urlChanging(location.href, parameter, value));
        refreshSearchList();
    }

    function paginate(max, currentPage, callback) {
        const maxPage = Math.ceil(max);
        $('#pagination').pagination({
            items: maxPage,
            currentPage: currentPage,
            cssStyle: '',
            prevText: '<span aria-hidden="true">&laquo;</span>',
            nextText: '<span aria-hidden="true">&raquo;</span>',
            onPageClick: function (page, evt) {
                history.pushState(null, null, urlChanging(location.href, 'page', page));
                refreshSearchList();
            }
        });
    }

    function reModal(isOpen=false) {
        if (isOpen) {
            $(".remodal-wrapper").css("display", "block");
        }
        else{
            setTimeout(function(){
                $(".remodal-wrapper").css("display", "none");
            }, 2000);
        }
    }

    function getRandom(maxNumber = 100,float = 0) {
        const randomMoney = (Math.random() * maxNumber).toFixed(float);
        return `${randomMoney}$`;
    }

    function mainData() {
        const obj = JSON.parse(localStorage.getItem('mainData'));
        if(obj === null){
            ajaxCall('/api/application/v1/main', 'GET', null, function (res) {
                localStorage.setItem('mainData', JSON.stringify(res.data));
            });
        }
    }

    mainData()

</script>
@stack('js')
</body>
</html>