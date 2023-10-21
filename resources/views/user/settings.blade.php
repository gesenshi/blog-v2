@extends('default-layout')

@section('page-title', 'Настройки')

@section('content')
    <div class="max-w-[76rem] mx-auto">
        <div class="border-b border-gray-200 dark:border-gray-700">
            <nav class="flex space-x-6 pt-2" aria-label="Tabs" role="tablist">
                <button type="button"
                    class="hs-tab-active:font-semibold hs-tab-active:border-blue-600 hs-tab-active:text-blue-600 py-4  inline-flex items-center gap-2 border-b-[3px] border-transparent text-sm whitespace-nowrap text-gray-500 hover:text-blue-600 active"
                    id="tabs-with-icons-item-1" data-hs-tab="#tabs-with-icons-1" aria-controls="tabs-with-icons-1"
                    role="tab">
                    <svg class="hs-tab-active:text-blue-600 dark:hs-tab-active:text-blue-600 w-3.5 h-3.5 text-gray-400 dark:text-gray-600"
                        xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                        <path fill-rule="evenodd"
                            d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                    </svg>
                    Профиль
                </button>
                <button type="button"
                    class="hs-tab-active:font-semibold hs-tab-active:border-blue-600 hs-tab-active:text-blue-600 py-4 px-1 inline-flex items-center gap-2 border-b-[3px] border-transparent text-sm whitespace-nowrap text-gray-500 hover:text-blue-600"
                    id="tabs-with-icons-item-2" data-hs-tab="#tabs-with-icons-2" aria-controls="tabs-with-icons-2"
                    role="tab">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-journal" viewBox="0 0 16 16">
                        <path
                            d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z" />
                        <path
                            d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z" />
                    </svg>
                    Публикации
                </button>
                {{-- <button type="button"
                    class="hs-tab-active:font-semibold hs-tab-active:border-blue-600 hs-tab-active:text-blue-600 py-4 px-1 inline-flex items-center gap-2 border-b-[3px] border-transparent text-sm whitespace-nowrap text-gray-500 hover:text-blue-600"
                    id="tabs-with-icons-item-3" data-hs-tab="#tabs-with-icons-3" aria-controls="tabs-with-icons-3"
                    role="tab">
                    <svg class="hs-tab-active:text-blue-600 dark:hs-tab-active:text-blue-600 w-3.5 h-3.5 text-gray-400 dark:text-gray-600"
                        xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        viewBox="0 0 16 16">
                        <path
                            d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z" />
                        <path
                            d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z" />
                    </svg>
                    Tab 3
                </button> --}}
            </nav>
        </div>
        <div class="mt-3">
            <div id="tabs-with-icons-1" role="tabpanel" aria-labelledby="tabs-with-icons-item-1">
                <p class="text-gray-500 dark:text-gray-400">
                <div class="max-w-4xl">
                    <!-- Card -->
                    <div class="py-6">
                        <div class="mb-8">
                            <h2 class="text-xl font-bold text-gray-800 dark:text-gray-200">
                                Профиль
                            </h2>
                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                Персонализация вашего аккаунта
                            </p>
                        </div>

                        <form method="POST" action="{{ route('update-profile') }}" enctype="multipart/form-data">
                            @csrf
                            <!-- Grid -->
                            <div class="grid sm:grid-cols-12 gap-4 sm:gap-6">
                                <div class="sm:col-span-3">
                                    <label class="inline-block text-sm text-gray-800 mt-2.5 dark:text-gray-200">
                                        Фото профиля
                                    </label>
                                </div>
                                <!-- End Col -->

                                <div class="sm:col-span-9">
                                    <div class="flex items-center gap-5">
                                        <img id="preview"
                                            class="inline-block h-16 w-16 rounded-full ring-2 ring-white dark:ring-gray-800"
                                            src="{{ asset(auth()->user()->avatar ?: 'avatars/default.jpg') }}"
                                            style="object-fit: cover;"
                                            alt="{{ auth()->user()->firstname }} {{ auth()->user()->lastname }}">

                                        <div class="flex gap-x-2">
                                            <div>
                                                <label for="avatar"
                                                    class="inline-block text-sm text-gray-800 mt-2.5 dark:text-gray-200">
                                                    <button type="button" id="upload-button"
                                                        class="py-2 px-3 inline-flex justify-center items-center gap-2 rounded-md border font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm dark:bg-slate-900 dark:hover:bg-slate-800 dark:border-gray-700 dark:text-gray-400 dark:hover:text-white dark:focus:ring-offset-gray-800">
                                                        <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg"
                                                            width="16" height="16" fill="currentColor"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                                                            <path
                                                                d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z" />
                                                        </svg>
                                                        Загрузить фото
                                                    </button>
                                                    <input type="file" name="avatar" id="avatar" class="hidden">
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Col -->
                                <script>
                                    document.getElementById('upload-button').addEventListener('click', function() {
                                        document.getElementById('avatar').click();
                                    });

                                    // Обработчик выбора файла
                                    document.getElementById('avatar').addEventListener('change', function(event) {
                                        const fileInput = event.target;
                                        const preview = document.getElementById('preview');

                                        if (fileInput.files && fileInput.files[0]) {
                                            const reader = new FileReader();

                                            reader.onload = function(e) {
                                                // Отображаем выбранное изображение в превью
                                                preview.src = e.target.result;
                                            }

                                            // Считываем выбранный файл как Data URL
                                            reader.readAsDataURL(fileInput.files[0]);
                                        }
                                    });
                                </script>


                                <div class="sm:col-span-3">
                                    <label for="af-account-full-name"
                                        class="inline-block text-sm text-gray-800 mt-2.5 dark:text-gray-200">
                                        Имя и фамилия
                                    </label>
                                    <div class="hs-tooltip inline-block">
                                    </div>
                                </div>
                                <!-- End Col -->

                                <div class="sm:col-span-9">
                                    <div class="sm:flex">
                                        <input id="af-account-full-name" type="text"
                                            value="{{ auth()->user()->firstname }}" name="firstname"
                                            class="py-2 border px-3 pr-11 block w-full border-gray-200 shadow-sm -mt-px -ml-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-l-lg sm:mt-0 sm:first:ml-0 sm:first:rounded-tr-none sm:last:rounded-bl-none sm:last:rounded-r-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400">
                                        <input type="text" value="{{ auth()->user()->lastname }}" name="lastname"
                                            class="py-2 border px-3 pr-11 block w-full border-gray-200 shadow-sm -mt-px -ml-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-l-lg sm:mt-0 sm:first:ml-0 sm:first:rounded-tr-none sm:last:rounded-bl-none sm:last:rounded-r-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400">
                                    </div>
                                </div>
                                <!-- End Col -->

                                <div class="sm:col-span-3">
                                    <label for="af-account-email"
                                        class="inline-block text-sm text-gray-800 mt-2.5 dark:text-gray-200">
                                        Электронная почта
                                    </label>
                                </div>
                                <!-- End Col -->

                                <div class="sm:col-span-9">
                                    <input id="af-account-email" readonly type="email" value="{{ auth()->user()->email }}"
                                        name="email"
                                        class="py-2 px-3 pr-11 block border w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-600">
                                </div>
                                <!-- End Col -->

                                <div class="sm:col-span-3">
                                    <label for="af-account-password"
                                        class="inline-block text-sm text-gray-800 mt-2.5 dark:text-gray-200">
                                        Пароль
                                    </label>
                                </div>
                                <!-- End Col -->

                                <div class="sm:col-span-9">
                                    <div class="space-y-2">
                                        <input id="af-account-password" type="password" name="currentPassword"
                                            class="py-2 px-3 pr-11 block border w-full border-gray-200 shadow-sm rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                            placeholder="Введите текущий пароль">
                                        <input type="password" name="newPassword"
                                            class="py-2 px-3 pr-11 border block w-full border-gray-200 shadow-sm rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                            placeholder="Введите новый пароль">
                                    </div>
                                </div>
                                <!-- End Col -->

                                <div class="sm:col-span-3">
                                    <label for="af-account-bio"
                                        class="inline-block text-sm text-gray-800 mt-2.5 dark:text-gray-200">
                                        БИО
                                    </label>

                                </div>
                                <!-- End Col -->

                                <div class="sm:col-span-9">
                                    <textarea id="af-account-bio" name="bio"
                                        class="py-2 px-3 block w-full border border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                        rows="6" placeholder="Расскажите о себе...">{{ auth()->user()->bio }}</textarea>
                                </div>
                                <!-- End Col -->
                            </div>
                            <!-- End Grid -->
                            @foreach ($errors->all() as $error)
                                <div
                                    class="flex w-full mt-5 overflow-hidden bg-white rounded-lg shadow-md dark:bg-gray-800">
                                    <div class="flex items-center justify-center w-12 bg-red-500">
                                        <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 40 40"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M20 3.36667C10.8167 3.36667 3.3667 10.8167 3.3667 20C3.3667 29.1833 10.8167 36.6333 20 36.6333C29.1834 36.6333 36.6334 29.1833 36.6334 20C36.6334 10.8167 29.1834 3.36667 20 3.36667ZM19.1334 33.3333V22.9H13.3334L21.6667 6.66667V17.1H27.25L19.1334 33.3333Z" />
                                        </svg>
                                    </div>

                                    <div class="px-4 py-2 -mx-3">
                                        <div class="mx-3">
                                            <span class="font-semibold text-red-500 dark:text-red-400">Ошибка!</span>
                                            <p class="text-sm text-gray-600 dark:text-gray-200">
                                                {{ $error }}
                                            </p>
                                        </div>
                                    </div>

                                </div>
                            @endforeach
                            @if (session('success'))
                                <div
                                    class="flex mt-5 w-full overflow-hidden bg-white rounded-lg shadow-md dark:bg-gray-800">
                                    <div class="flex items-center p justify-center w-12 bg-emerald-500">
                                        <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 40 40"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM16.6667 28.3333L8.33337 20L10.6834 17.65L16.6667 23.6166L29.3167 10.9666L31.6667 13.3333L16.6667 28.3333Z" />
                                        </svg>
                                    </div>

                                    <div class="px-4 py-2 -mx-3">
                                        <div class="mx-3">
                                            <span
                                                class="font-semibold text-emerald-500 dark:text-emerald-400">Успешно!</span>
                                            <p class="text-sm text-gray-600 dark:text-gray-200"> {{ session('success') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="mt-5 flex justify-end gap-x-2">
                                <button type="button"
                                    class="py-2 px-3 inline-flex justify-center items-center gap-2 rounded-md border font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm dark:bg-slate-900 dark:hover:bg-slate-800 dark:border-gray-700 dark:text-gray-400 dark:hover:text-white dark:focus:ring-offset-gray-800">
                                    Отмена
                                </button>
                                <button type="submit"
                                    class="py-2 px-3 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                                    Сохранить изменения
                                </button>
                            </div>
                        </form>
                    </div>
                    <!-- End Card -->
                </div>
                </p>
            </div>
            <div id="tabs-with-icons-2" class="hidden" role="tabpanel" aria-labelledby="tabs-with-icons-item-2">
                <p class="text-gray-500 dark:text-gray-400">
                <div class="mb-2 py-6">
                    <h2 class="text-xl font-bold text-gray-800 dark:text-gray-200">
                        Публикации
                    </h2>
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        Управляйте своими записями
                    </p>
                </div>
                {{-- <div class="flex flex-col">
                    <div class="-m-1.5 overflow-x-auto">
                        <div class=" min-w-full inline-block align-middle">
                            <div class="overflow-hidden">
                                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                    <thead>
                                        <tr>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                                Название</th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                                Просмотры
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                                Понравилось
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                                Дата публикации
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                        @foreach ($posts as $post)
                                            <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">
                                                    {{ $post->name }}
                                                </td>
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                    {{ $post->views }}
                                                </td>
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                    {{ $post->likes }}
                                                </td>
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                    {{ $post->created_at }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                    <a class="text-blue-500 hover:text-blue-700"
                                                        href="#">Удалить</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                </p>
            </div>
            <div id="tabs-with-icons-3" class="hidden" role="tabpanel" aria-labelledby="tabs-with-icons-item-3">
                <p class="text-gray-500 dark:text-gray-400">
                    This is the <em class="font-semibold text-gray-800 dark:text-gray-200">third</em> item's tab body.
                </p>
            </div>
        </div> --}}

                <!-- Card Blog -->
                <div class="">
                    <!-- Grid -->
                    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        <!-- Card -->
                        @foreach ($posts as $post)
                            <div
                                class="group flex flex-col h-full bg-white border border-gray-200 shadow-sm rounded-xl dark:bg-slate-900 dark:border-gray-700 dark:shadow-slate-700/[.7]">
                                <div class="p-4 md:p-6">
                                    <h3
                                        class="text-xl font-semibold text-gray-800 dark:text-gray-300 dark:hover:text-white">
                                        {{ $post->name }}
                                    </h3>
                                    <p class="mt-3 text-gray-500">
                                        {{ $post->title }}
                                    </p>
                                </div>
                                <div
                                    class="mt-auto flex border-t border-gray-200 divide-x divide-gray-200 dark:border-gray-700 dark:divide-gray-700">
                                    <a class="w-full py-3 px-4 inline-flex justify-center items-center gap-2 rounded-bl-xl font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm sm:p-4 dark:bg-slate-900 dark:hover:bg-slate-800 dark:border-gray-700 dark:text-gray-400 dark:hover:text-white dark:focus:ring-offset-gray-800"
                                        href="#">
                                        Редактировать
                                    </a>
                                    <a class="w-full py-3 px-4 inline-flex justify-center items-center gap-2 rounded-br-xl font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm sm:p-4 dark:bg-slate-900 dark:hover:bg-slate-800 dark:border-gray-700 dark:text-gray-400 dark:hover:text-white dark:focus:ring-offset-gray-800"
                                        href="#">
                                        Удалить
                                    </a>
                                </div>
                            </div>
                            <!-- End Card -->
                        @endforeach

                    </div>
                    <!-- End Grid -->
                </div>
                <!-- End Card Blog -->

            </div>
            <!-- End Card Section -->
        @endsection
