@extends('layout')

@section('title')Главная@endsection

@section('table')
    <table class="table table-dark table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">DeltaX</th>
            <th scope="col">Function 1</th>
            <th scope="col">Function 2</th>
            <th scope="col">Result</th>
            <th scope="col">Error message</th>
        </tr>
        </thead>
        <tbody>
        @php
            $i = 1;
            $result = Illuminate\Support\Facades\Session::get('result');
        @endphp
        @isset($result)
            @foreach ($result as $el)
                <tr>
                    <th scope="row">{{ $i++ }}</th>
                    <td>{{ $el['deltaX'] }}</td>
                    <td>{{ $el['f1'] }}</td>
                    <td>{{ $el['f2'] }}</td>
                    <td>{{ $el['result'] }}</td>
                    <td>
                        <ul>
                            @foreach($el['error'] as $er)
                                <li>{{ $er }}</li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
            @endforeach
        @endisset
        </tbody>
    </table>
@endsection
