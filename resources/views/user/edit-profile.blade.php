@extends('default-layout')

@section('page-title', 'Редактировани профиля')

@section('content')
    <div class="max-w-[80rem] mx-auto">
        <div class="max-w-4xl mt-10">
            <!-- Card -->
            <div class="bg-white rounded-xl shadow p-4 sm:p-7 dark:bg-slate-900">
                <div class="mb-8">
                    <h2 class="text-xl font-bold text-gray-800 dark:text-gray-200">
                        Профиль
                    </h2>
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        Персонализация вашего профиля
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
                                    alt="{{ auth()->user()->firstname }} {{ auth()->user()->lastname }}">

                                <div class="flex gap-x-2">
                                    <div>
                                        <label for="avatar"
                                            class="inline-block text-sm text-gray-800 mt-2.5 dark:text-gray-200">
                                            <button type="button" id="upload-button"
                                                class="py-2 px-3 inline-flex justify-center items-center gap-2 rounded-md border font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm dark:bg-slate-900 dark:hover:bg-slate-800 dark:border-gray-700 dark:text-gray-400 dark:hover:text-white dark:focus:ring-offset-gray-800">
                                                <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" width="16"
                                                    height="16" fill="currentColor" viewBox="0 0 16 16">
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
                                <input id="af-account-full-name" type="text" value="{{ auth()->user()->firstname }}"
                                    name="firstname"
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
                        <div class="flex w-full mt-5 overflow-hidden bg-white rounded-lg shadow-md dark:bg-gray-800">
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
                        <div class="flex mt-5 w-full overflow-hidden bg-white rounded-lg shadow-md dark:bg-gray-800">
                            <div class="flex items-center p justify-center w-12 bg-emerald-500">
                                <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 40 40"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM16.6667 28.3333L8.33337 20L10.6834 17.65L16.6667 23.6166L29.3167 10.9666L31.6667 13.3333L16.6667 28.3333Z" />
                                </svg>
                            </div>

                            <div class="px-4 py-2 -mx-3">
                                <div class="mx-3">
                                    <span class="font-semibold text-emerald-500 dark:text-emerald-400">Успешно!</span>
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

    </div>
    <!-- End Card Section -->
@endsection
