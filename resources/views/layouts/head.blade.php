<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <script src="{{ asset('build/assets/jquery-3.6.4.min.js') }}"></script>
    <title>{{$title}}</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link href="{{ asset('fontawesome-free-6.4.0-web/css/all.min.css') }}" rel="stylesheet">
    
    
    
</head>