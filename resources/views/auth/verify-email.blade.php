<!DOCTYPE html>
<html class="h-full">

<head>
    @vite('resources/css/app.css')
</head>

<body class="dark:bg-slate-900 bg-gray-100 flex h-full items-center py-16">
    <main class="w-full max-w-md mx-auto">
        <div class="mt-7 bg-white border border-gray-200 rounded-xl shadow-sm dark:bg-gray-800 dark:border-gray-700">
            <div class="p-4 sm:p-7 flex flex-col items-center">
                <span class="dark:text-white mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor"
                        class="bi bi-envelope" viewBox="0 0 16 16">
                        <path
                            d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />
                    </svg>
                </span>
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <h3 class="text-2xl font-bold text-center text-gray-800 dark:text-white mb-4">Подтверждение
                        электронной почты</h3>

                    @if (session('message'))
                        <p class="text-center text-gray-800 dark:text-white mb-4">
                            {{session('message')}}
                        </p>
                    @else
                        <p class="text-center text-gray-800 dark:text-white mb-4">Для завершения регистрации и
                            подтверждения вашего адреса электронной почты, пожалуйста, перейдите по ссылке, которая была
                            отправлена на ваш почтовый ящик.
                        </p>
                    @endif


                    @foreach ($errors->all() as $error)
                        <div class="w-full bg-white rounded-lg shadow-md dark:bg-gray-800 mb-4">
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

                    <div class="w-full flex justify-center">
                        <button type="submit"
                            class="w-full py-3 px-4 mt-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">Отправить
                            письмо повторно</button>
                    </div>
                    <div>
                        <button type="submit"
                        class="w-full py-3 px-4 mt-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">Выйти из аккаунта</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>

</html>
