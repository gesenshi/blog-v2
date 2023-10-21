<!DOCTYPE html>
<html lang="en" class="default">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title> @yield('page-title')</title>
</head>

<body class="bg-gray-50 dark:bg-slate-900">
    <header
        class="flex flex-wrap sm:justify-start sm:flex-nowrap z-1000 w-full bg-white border-b text-sm py-2.5 sm:py-4 dark:bg-slate-900 dark:border-gray-700">
        <nav class="max-w-7xl flex basis-full items-center w-full mx-auto px-4 sm:px-6 lg:px-8" aria-label="Global">
            <div class="mr-5 md:mr-8">
                <a class="flex-none text-xl font-semibold dark:text-white" href="{{ route('home') }}"
                    aria-label="Brand">Блог</a>
            </div>
            <div class="w-full flex items-center justify-end ml-auto sm:justify-between  gap-6 sm:order-3">
                <div class="sm:hidden">
                    <button type="button"
                        class="inline-flex flex-shrink-0 justify-center items-center gap-2 h-[2.375rem] w-[2.375rem] rounded-full font-medium bg-white text-gray-700 align-middle hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2 focus:ring-offset-white transition-all text-xs dark:bg-gray-800 dark:hover:bg-slate-800 dark:text-gray-400 dark:hover:text-white dark:focus:ring-gray-700 dark:focus:ring-offset-gray-800">
                        <svg class="w-3.5 h-3.5" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                            fill="currentColor" viewBox="0 0 16 16">
                            <path
                                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                        </svg>
                    </button>
                </div>

                <div class="hidden sm:block">
                    <label for="icon" class="sr-only">Поиск</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pointer-events-none z-20 pl-4">
                            <svg class="h-4 w-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" width="16"
                                height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                            </svg>
                        </div>
                        <input type="text" id="searchInput" name="query"
                            class="py-2 px-4 pl-11 block w-full border-gray-200 shadow-sm rounded-md text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 typehead"
                            placeholder="Поиск">
                        <script>
                            document.addEventListener("DOMContentLoaded", function() {
                                const input = document.getElementById("searchInput");
                                input.addEventListener("keyup", function(event) {
                                    if (event.key === "Enter") {
                                        const searchText = input.value;
                                        window.location.href = "/search?query=" + encodeURIComponent(searchText);
                                    }
                                });
                            });
                        </script>
                    </div>
                </div>

                <div class="flex flex-row items-center justify-end gap-6">
                    <div class="hs-dropdown relative inline-flex" data-hs-dropdown-placement="bottom-right">
                        <button id="hs-dropdown-with-header" type="button"
                            class="hs-dropdown-toggle inline-flex flex-shrink-0 justify-center items-center gap-2 h-[2.375rem] w-[2.375rem] rounded-full font-medium bg-white text-gray-700 align-middle hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2 focus:ring-offset-white transition-all text-xs dark:bg-gray-800 dark:hover:bg-slate-800 dark:text-gray-400 dark:hover:text-white dark:focus:ring-gray-700 dark:focus:ring-offset-gray-800">
                            <img class="inline-block h-[2.375rem] w-[2.375rem] rounded-full ring-2 ring-white dark:ring-gray-800"
                                src="{{ asset(auth()->user()->avatar ?: 'avatars/default.jpg') }}"
                                style="object-fit: cover;"
                                alt="{{ auth()->user()->firstname }} {{ auth()->user()->lastname }}">
                        </button>

                        <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-[15rem] z-10 bg-white shadow-md rounded-lg p-2 dark:bg-gray-800 dark:border dark:border-gray-700"
                            aria-labelledby="hs-dropdown-with-header">
                            <div class="py-3 px-5 -m-2 bg-gray-100 rounded-t-lg dark:bg-gray-700">
                                <p class="text-sm text-gray-500 dark:text-gray-400">Вы вошли как: </p>
                                <p class="text-sm font-medium text-gray-800 dark:text-gray-300">
                                    {{ auth()->user()->email }}</p>
                            </div>
                            <div class="mt-2 py-2 first:pt-0 last:pb-0">
                                <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-md text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300"
                                    href="{{ route('user.profile') }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                        <path
                                            d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z" />
                                    </svg>
                                    Профиль
                                </a>
                                <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-md text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300"
                                    href="#">
                                    <svg class="flex-none" width="16" height="16" viewBox="0 0 16 16"
                                        fill="currentColor">
                                        <path
                                            d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z" />
                                    </svg>
                                    Уведомления
                                </a>
                                <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-md text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300"
                                    href="{{ route('settings') }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
                                        <path
                                            d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z" />
                                        <path
                                            d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z" />
                                    </svg>
                                    Настройки
                                </a>
                                <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-md text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300"
                                    href="{{ route('logout') }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-door-closed" viewBox="0 0 16 16">
                                        <path
                                            d="M3 2a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v13h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V2zm1 13h8V2H4v13z" />
                                        <path d="M9 9a1 1 0 1 0 2 0 1 1 0 0 0-2 0z" />
                                    </svg>
                                    Выйти
                                </a>
                            </div>
                        </div>
                    </div>
                    <div>
                        <a class="hs-dark-mode-active:hidden block hs-dark-mode group flex items-center text-gray-600 hover:text-blue-600 font-medium dark:text-gray-400 dark:hover:text-gray-500"
                            href="#!" data-hs-theme-click-value="dark">
                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278zM4.858 1.311A7.269 7.269 0 0 0 1.025 7.71c0 4.02 3.279 7.276 7.319 7.276a7.316 7.316 0 0 0 5.205-2.162c-.337.042-.68.063-1.029.063-4.61 0-8.343-3.714-8.343-8.29 0-1.167.242-2.278.681-3.286z" />
                            </svg>
                        </a>
                        <a class="hs-dark-mode-active:block hidden hs-dark-mode group flex items-center text-gray-600 hover:text-blue-600 font-medium dark:text-gray-400 dark:hover:text-gray-500"
                            href="#!" data-hs-theme-click-value="light">
                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6zm0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </nav>
        <script>
            const HSThemeAppearance = {
                init() {
                    const defaultTheme = 'default';
                    let theme = localStorage.getItem('hs_theme') || defaultTheme;

                    if (theme === 'auto') {
                        theme = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'default';
                    }

                    this.setAppearance(theme);
                },
                _resetStylesOnLoad() {
                    const $resetStyles = document.createElement('style');
                    $resetStyles.innerText = `* {transition: unset !important;}`;
                    $resetStyles.setAttribute('data-hs-appearance-onload-styles', '');
                    document.head.appendChild($resetStyles);
                    return $resetStyles;
                },
                setAppearance(theme, saveInStore = true, dispatchEvent = true) {
                    const $resetStylesEl = this._resetStylesOnLoad();

                    if (saveInStore) {
                        localStorage.setItem('hs_theme', theme);
                    }

                    const htmlElement = document.querySelector('html');
                    htmlElement.classList.remove('dark', 'default', 'auto');
                    htmlElement.classList.add(theme);

                    setTimeout(() => {
                        $resetStylesEl.remove();
                    });

                    if (dispatchEvent) {
                        window.dispatchEvent(new CustomEvent('on-hs-appearance-change', {
                            detail: theme
                        }));
                    }
                },
                getAppearance() {
                    return this.getOriginalAppearance();
                },
                getOriginalAppearance() {
                    const defaultTheme = 'default';
                    return localStorage.getItem('hs_theme') || defaultTheme;
                }
            };

            HSThemeAppearance.init();

            window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', e => {
                if (HSThemeAppearance.getOriginalAppearance() === 'auto') {
                    HSThemeAppearance.setAppearance(e.matches ? 'dark' : 'default', false);
                }
            });

            window.addEventListener('load', () => {
                const $clickableThemes = document.querySelectorAll('[data-hs-theme-click-value]');
                const $switchableThemes = document.querySelectorAll('[data-hs-theme-switch]');

                $clickableThemes.forEach($item => {
                    $item.addEventListener('click', () => HSThemeAppearance.setAppearance($item.getAttribute(
                        'data-hs-theme-click-value'), true, $item));
                });

                $switchableThemes.forEach($item => {
                    $item.addEventListener('change', (e) => {
                        HSThemeAppearance.setAppearance(e.target.checked ? 'dark' : 'default');
                    });

                    $item.checked = HSThemeAppearance.getAppearance() === 'dark';
                });

                window.addEventListener('on-hs-appearance-change', e => {
                    $switchableThemes.forEach($item => {
                        $item.checked = e.detail === 'dark';
                    });
                });
            });
        </script>

    </header>
    <!-- ========== END HEADER ========== -->

    <!-- ========== MAIN CONTENT ========== -->
    <main id="content" role="main">
        <!-- Nav -->
        <nav class="-top-px z-1000 bg-white text-sm font-medium text-black ring-1 ring-gray-900 ring-opacity-5 border-t shadow-sm shadow-gray-100 pt-6 md:pb-6 -mt-px dark:bg-slate-900 dark:border-gray-800 dark:shadow-slate-700/[.7]"
            aria-label="Jump links">
            <div
                class="max-w-7xl snap-x w-full flex items-center overflow-x-auto scrollbar-x px-4 sm:px-6 lg:px-8 pb-4 md:pb-0 mx-auto dark:scrollbar-x">
                <div class="snap-center shrink-0 pr-5 sm:pr-8 sm:last-pr-0">
                    <a class="inline-flex items-center gap-x-2 hover:text-gray-500 dark:text-gray-400 dark:hover:text-gray-500"
                        href="{{ route('home') }}">Лента</a>
                </div>
                <div class="snap-center shrink-0 pr-5 sm:pr-8 sm:last:pr-0">
                    <a class="inline-flex items-center gap-x-2 hover:text-gray-500 dark:text-gray-400 dark:hover:text-gray-500"
                        href="{{ route('user.profile') }}">
                        Профиль
                        {{-- <span
                            class="inline bg-gray-100 text-xs text-gray-500 font-semibold rounded-full py-1 px-2 dark:bg-gray-700 dark:text-gray-400">v12.7</span> --}}
                    </a>
                </div>
                <div class="snap-center shrink-0 pr-5 sm:pr-8 sm:last:pr-0">
                    <a class="inline-flex items-center gap-x-2 hover:text-gray-500 dark:text-gray-400 dark:hover:text-gray-500"
                        href="{{ route('create-post') }}">Опубликовать пост</a>
                </div>
            </div>
        </nav>

        @yield('content')

    </main>

    <script src="https://cdn.jsdelivr.net/npm/@preline/preline@1.0.0/dist/hs-ui.bundle.min.js"></script>

</body>


</html>
