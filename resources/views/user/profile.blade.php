@extends('default-layout')
@section('page-title', auth()->user()->firstname . ' ' . auth()->user()->lastname)

@section('content')
    <div class="max-w-[78rem] mx-auto mt-10 px-4">
        <div class="flex flex-wrap gap-6 flex-col">
            <div>
                <img class="inline-block h-[8.875rem] w-[8.875rem] rounded-full dark:ring-white ring-2 ring-blue"
                    src="{{ asset(auth()->user()->avatar ?: 'avatars/default.jpg') }}"
                    alt="{{ auth()->user()->firstname }} {{ auth()->user()->lastname }}" style="object-fit: cover;">
            </div>
            <div class="">
                <div>
                    <span class="block text-3xl font-bold text-gray-800 dark:text-white">{{ auth()->user()->firstname }}
                        {{ auth()->user()->lastname }}</span>
                </div>
                <p class="block my-2 text-gray-800 dark:text-white max-w-[45rem]">{{ auth()->user()->bio }}</p>
            </div>
            <div class="flex gap-10 text-gray-800 dark:text-white">
                <div class="flex flex-col gap-5">
                    <div>
                        <span
                            class="inline-flex items-center gap-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-gray-100 text-gray-800">Подписчики:
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
        </div>
        @if (count($posts) > 0)
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($posts as $post)
                    <a class="group flex flex-col h-full border border-gray-200 hover:border-transparent hover:shadow-lg transition-all duration-300 rounded-xl p-5 dark:border-gray-700 dark:hover:border-transparent dark:hover:shadow-black/[.4]"
                        href="#">
                        <div class="aspect-w-16 aspect-h-11">
                            <img class="w-full object-cover rounded-xl"
                                src="data:image/jpeg;base64,{{ base64_encode($post->cover_image) }}"
                                alt="Image Description">
                        </div>
                        <div class="my-6">
                            <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-300 dark:group-hover:text-white">
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
    </div>

@endsection
