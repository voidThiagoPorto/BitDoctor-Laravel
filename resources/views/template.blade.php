<!DOCTYPE html>
<html lang="en">

<head>
    @section("meta")
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
        <link rel="stylesheet" href="{{ asset('css/monostyle.css') }}">
        <title>@yield("title")</title>
    @show
</head>
<body>
<header>
    <table class="header">
        <tbody>
        @section("nav")
            <tr>
                <th colspan="2" rowspan="2" class="width-auto">
                    <h1 class="title">@yield("title")</h1>
                    <span class="subtitle">@yield("sub")</span>
                </th>
        @show
        </tbody>
    </table>
</header>
@yield("content")
</body>
