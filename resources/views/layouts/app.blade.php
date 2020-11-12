<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        @livewireStyles

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.js" defer></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen @impersonating px-5 pb-5 bg-red-600 @endImpersonating">
            <!-- Impersonation -->
            @impersonating
            <div class="bg-red-600">
                <div class="max-w-screen-xl py-3 mx-auto ">
                  <div class="flex flex-wrap items-center justify-between">
                    <div class="flex items-center flex-1 w-0">
                      <p class="ml-3 font-medium text-white truncate">
                        <span class="hidden md:inline">
                          You are currently impersonating another user.
                        </span>
                      </p>
                    </div>
                    <div class="flex-shrink-0 order-3 w-full mt-2 sm:order-2 sm:mt-0 sm:w-auto">
                      <div class="rounded-md shadow-sm">
                        <a href="{{ route('impersonate.leave') }}" class="flex items-center justify-center px-4 py-2 text-sm font-medium leading-5 text-red-600 transition duration-150 ease-in-out bg-white border border-transparent rounded-md hover:text-red-500 focus:outline-none focus:shadow-outline">
                          Leave impersonation
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            @endImpersonating

            
            <div class="min-h-full bg-gray-100 rounded-lg shadow-2xl">

            @livewire('navigation-dropdown')

            @isset($header)
            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
    </div>
        @stack('modals')

        @livewireScripts
    </div>
    </body>
</html>
