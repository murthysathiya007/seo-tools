<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="@lang('front.direction')"
    theme-mode="{{ (theme_option('dark_default_theme') == 'dark' && theme_option('enable_dark_mode') == 1 && request()->cookie('siteMode') != 'light') || request()->cookie('siteMode') === 'dark' ? 'dark' : 'light' }}">

<head>
    <meta name="app-search" content="{{ route('search') }}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    @vite(['resources/themes/canvas/assets/sass/app.scss', 'resources/themes/canvas/assets/js/app.js'])
    @meta_tags()
    @meta_tags('header')
    @stack('page_header')
    @if (setting('enable_header_code', 0))
        {!! setting('header_code') !!}
    @endif
</head>

<body>
    <x-application-theme-switch />
    <main class="main-wrapper">
        <x-application-navbar />
        <x-application-breadcrumbs />
        <div class="contant-wrap">
            <div class="container mt-4">
                <div class="row gx-sm-0 gx-md-4">
                    <div class="col">
                        {{ $slot }}
                    </div>
                    @if (isset($sidebar))
                        {{ $sidebar }}
                    @endif
                </div>
            </div>
        </div>
    </main>
    <x-application-footer />
    <x-application-adblock />
    <x-application-signout />
    <x-application-messages />
    <x-application-loader />
    <x-application-cookies-consent />
    <x-application-back-to-top />
    @meta_tags('footer')
    @stack('page_scripts')
    @if (setting('enable_footer_code', 0))
        {!! setting('footer_code') !!}
    @endif
</body>

</html>
