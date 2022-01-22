<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>

<body class="p-3 mb-2 bg-dark">
<header>
    <form action="/algor" method="post">
        @csrf
        <div class="input-group">
            <span class="input-group-text">Минимальное и максимальное значение X</span>
            <input type="number" step="any" name="min" id="min" placeholder="min" class="form-control">
            <input type="number" step="any" name="max" id="max" placeholder="max" class="form-control">
        </div>
        <div class="input-group">
            <span class="input-group-text">Шаг для X</span>
            <input type="number" step="any" name="deltaX" id="deltaX" placeholder="deltaX" class="form-control">
        </div>
        <div class="input-group">
            <span class="input-group-text">Номер варианта</span>
            <input type="number" name="num" id="num" placeholder="num" min="1" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Готово</button>
    </form>

    @if ($errors->any())
        <div class="alert alert-danger m-3" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

</header>

<hr class="bg-danger text-danger" size="3px">

@yield('table')
</body>

</html>
