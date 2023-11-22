<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />

  <title>@yield('title', config('app.name'))</title>

  <meta
    name="viewport"
    content="width=device-width, initial-scale=1"
  >
  <meta
    name="description"
    content="@yield('meta_desc')"
  >
  <meta
    name="robots"
    content="@yield('meta_robots')"
  >
  <link
    rel="canonical"
    href="{{ Request::url() }}"
  >

  <link
    rel="preconnect"
    href="https://fonts.googleapis.com"
  >
  <link
    rel="preconnect"
    href="https://fonts.gstatic.com"
    crossorigin
  >
  <link
    href="https://fonts.googleapis.com/css2?family=Fira+Mono:wght@400;500;700&display=swap"
    rel="stylesheet"
  >

  {!! \Sentry\Laravel\Integration::sentryTracingMeta() !!}

  @vite(['resources/css/app.css', 'resources/js/app.js'], 'build')

  @stack('import_head')
</head>

<body class="min-h-screen">
  <div
    id="app"
    class="h-full"
  >
    <router-view></router-view>
  </div>

  @stack('import_foot')
</body>

</html>
