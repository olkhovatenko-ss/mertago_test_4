<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>@section('title')Прайс-лист@show</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>

<header>
    @section('header')
        <div class="navbar navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a href="{{route('products')}}" class="navbar-brand d-flex align-items-center">
                <strong>Прайс-лист</strong>
            </a>
        </div>
    </div>
    @show
</header>

<main>
<div class="container">
    @include('layouts.errors')
</div>
    @yield('content')
</main>

@include('layouts/footer')

<script
    src="https://code.jquery.com/jquery-2.2.4.min.js"
    integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

<script>
    $(document).ready(function(){
        $(".delete-product-button").click(function(){
            if (!confirm("Действительно удалить товар? ")){
                return false;
            }
        });
    });
</script>

</body>
</html>
