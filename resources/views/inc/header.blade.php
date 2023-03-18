<!doctype html>
<html lang="en">

<head>
    <title>@stack('title')</title>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="title" content="@stack('meta_title')">
    <meta name="description" content="@stack('meta_description')">
    <meta name="keywords" content="@stack('meta_keywords')">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('exzoom/jquery.exzoom.css') }}">

    <link rel="shortcut icon" href="{{ asset($setting->favicon) }}">
    @livewireStyles
</head>
<body>
