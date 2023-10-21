@extends('default-layout')

@section('page-title', $publicUser->firstname . ' ' . $publicUser->lastname)

@section('content')
    <div class="max-w-[78em] mx-auto mt-10 px-4">
        <div class="flex flex-wrap gap-6 flex-col">
            <div>
                <img class="inline-block h-[8.875rem] w-[8.875rem] rounded-full dark:ring-white ring-2 ring-blue"
                    src="{{ asset($publicUser->avatar ?: 'avatars/default.jpg') }}"
                    alt="{{ $publicUser->firstname }} {{ $publicUser->lastname }}" style="object-fit: cover;">
            </div>
            <div>
                <div class="flex items-center gap-5">
                    <div>
                        <span class="block text-3xl font-bold text-gray-800 dark:text-white">{{ $publicUser->firstname }}
                            {{ $publicUser->lastname }}</span>
                    </div>
                    <div>
                        <form action="{{ route('subscribe', $publicUser) }}" method="POST">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                            @if (auth()->user()->subscriptions()->where('target_user_id', $publicUser->id)->exists())
                                <button type="submit"
                                    class="py-2 px-4 inline-flex justify-center items-center gap-2 rounded-md bg-blue-100 border border-transparent font-semibold text-blue-500 hover:text-white hover:bg-blue-500 focus:outline-none focus:ring-2 ring-offset-white focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                                    Отписаться
                                </button>
                            @else
                                <button type="submit"
                                    class="py-2 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                                    <svg class="w-3.5 h-3.5" xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path
                                            d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                        <path fill-rule="evenodd"
                                            d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" />
                                    </svg>Подписаться
                                </button>
                            @endif
                        </form>

                    </div>
                </div>
                <p class="block my-2 mt-4 text-gray-800 dark:text-white max-w-[45rem]">{{ $publicUser->bio }}</p>
            </div>
            <div class="flex gap-10 text-gray-800 dark:text-white">
                <div class="flex flex-col gap-5">
                    <div>
                        <span
                            class="inline-flex items-center gap-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-gray-100 text-gray-800"><svg
                                xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-people-fill" viewBox="0 0 16 16">
                                <path
                                    d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" />
                            </svg>Подписчики:
                            {{ $followers->count() }}</span>
                    </div>
                    <div class="flex -space-x-2">
                        @php
                            $shuffledFollowers = $followers->shuffle();

                            $randomFollowers = $shuffledFollowers->take(4);
                        @endphp

                        @foreach ($randomFollowers as $follower)
                            <div class="hs-tooltip inline-block">
                                <button type="button"
                                    class="hs-tooltip-toggle inline-flex justify-center items-center gap-2 rounded-full bg-gray-50 border border-gray-200 text-gray-600 hover:bg-blue-50 hover:border-blue-200 hover:text-blue-600 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-white/[.05] dark:hover:border-white/[.1] dark:hover:text-white">
                                    <a href="/profile/{{ $follower->user->id }}">
                                        <img class="inline-block h-[3.875rem] w-[3.875rem] rounded-full dark:ring-white ring-2 ring-blue"
                                            src="{{ asset($follower->user->avatar ?: 'avatars/default.jpg') }}"
                                            style="object-fit: cover;">
                                    </a>
                                    <span
                                        class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded-md shadow-sm dark:bg-slate-700"
                                        role="tooltip">
                                        {{ $follower->user->firstname }} {{ $follower->user->lastname }}
                                    </span>
                                </button>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @if (count($posts) > 0)
                <div class="my-4">
                    <span class="block text-3xl font-bold text-gray-800 dark:text-white">Публикации</span>
                </div>
                <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($posts as $post)
                        <a class="group flex flex-col h-full border border-gray-200 hover:border-transparent hover:shadow-lg transition-all duration-300 rounded-xl p-5 dark:border-gray-700 dark:hover:border-transparent dark:hover:shadow-black/[.4]"
                            href="{{ url('post/' . $post->id . '') }}">
                            <div class="aspect-w-16 aspect-h-11">
                                <img class="w-full object-cover rounded-xl"
                                    src="data:image/jpeg;base64,{{ base64_encode($post->cover_image) }}">
                            </div>
                            <div class="my-6">
                                <h3
                                    class="text-xl font-semibold text-gray-800 dark:text-gray-300 dark:group-hover:text-white">
                                    {{ $post->name }}
                                </h3>
                                <p class="mt-5 text-gray-600 dark:text-gray-400">
                                    {{ $post->title }}
                                </p>
                            </div>
                        </a>
                    @endforeach
                </div>
            @else
                {{-- <p>Нет доступных публикаций.</p> --}}
            @endif


        @endsection
