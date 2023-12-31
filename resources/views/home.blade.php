@extends('default-layout')

@section('page-title', 'Главная')

@section('content')
    <div class="w-full">
        <div class="max-w-[80rem] sm:px-6 lg:px-8 lg:py-0 px-4 mx-auto">
            @if (count($subscribedUsers) > 0)
                <div class="my-6">
                    <span class="block text-xl font-bold text-gray-800 dark:text-white">Ваши подписки:</span>
                </div>
                <div class="flex -space-x-2 my-2 mb-6">
                    @foreach ($subscribedUsers as $user)
                        <div class="hs-tooltip inline-block">
                            <a href="{{ route('public.profile', ['id' => $user->id]) }}">
                                <button type="button"
                                    class="hs-tooltip-toggle inline-flex justify-center items-center gap-2 rounded-full bg-gray-50 border border-gray-200 text-gray-600 hover:bg-blue-50 hover:border-blue-200 hover:text-blue-600 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-white/[.05] dark:hover:border-white/[.1] dark:hover:text-white">
                                    <img class="inline-block h-[3.875rem] w-[3.875rem] rounded-full ring-2 ring-white"
                                        src="{{ asset($user->avatar ?: 'avatars/default.jpg') }}"
                                        alt="{{ $user->firstname }} {{ $user->lastname }}" style="object-fit: cover;">

                                    <span
                                        class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded-md shadow-sm dark:bg-slate-700"
                                        role="tooltip">
                                        {{ $user->firstname }} {{ $user->lastname }}
                                    </span>
                                </button>
                            </a>
                        </div>
                    @endforeach
            @endif
        </div>

        <div class="grid lg:grid-cols-2 gap-6">
            @foreach ($posts as $post)
                <!-- Card -->
                <a class="group relative block" href="{{ url('post/' . $post->id . '') }}">
                    <div class="flex-shrink-0 relative w-full rounded-xl overflow-hidden w-full h-[350px]">
                        <div
                            class="before:absolute before:inset-0 before:w-full before:h-full before:bg-black before:bg-opacity-40 before:z-[1]">
                        </div>
                        <img class="w-full h-full absolute top-0 left-0 object-cover"
                            src="data:image/jpeg;base64,{{ base64_encode($post->cover_image) }}" style="object-fit: cover;">
                    </div>


                    <div class="absolute top-0 inset-x-0 z-10">
                        <div class="p-4 flex flex-col h-full sm:p-6">
                            <!-- Avatar -->
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <img class="h-[2.875rem] w-[2.875rem] border-2 border-white rounded-full"
                                        src="{{ asset($post->user->avatar ?: 'avatars/default.jpg') }}"
                                        style="object-fit: cover;">
                                </div>
                                <div class="ml-2.5 sm:ml-4">
                                    <h4 class="font-semibold text-white">
                                        {{ $post->user->firstname }} {{ $post->user->lastname }}
                                    </h4>
                                    <p class="text-xs text-white/[.8]">
                                        {{ Date::parse($post->created_at)->format('j F Y') }}
                                    </p>
                                </div>
                            </div>
                            <!-- End Avatar -->
                        </div>
                    </div>

                    <div class="absolute bottom-0 inset-x-0 z-10">
                        <div class="flex flex-col h-full p-4 sm:p-6">
                            <h3 class="text-lg sm:text-3xl font-semibold text-white group-hover:text-white/[.8]">
                                {{ $post->name }}
                            </h3>
                            <p class="mt-2 text-white/[.8]">
                                {{ $post->title }}
                            </p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
        <div class="max-w-[80rem] mx-auto">
            <div class="my-6">
                <span class="block text-xl font-bold text-gray-800 dark:text-white">Рекомендации:</span>
            </div>
            <!-- Grid -->
            <div class="grid lg:grid-cols-2 gap-6 mt-6">
                <!-- Card -->
                @foreach ($recommendations as $recommendation)
                    <a class="group sm:flex" href="{{ url('post/' . $recommendation->id . '') }}">
                        <div
                            class="flex-shrink-0 relative rounded-xl overflow-hidden w-full h-[200px] sm:w-[250px] sm:h-[350px]">
                            <img class="w-full h-full absolute top-0 left-0 object-cover"
                                src="data:image/jpeg;base64,{{ base64_encode($recommendation->cover_image) }}"
                                style="object-fit: cover;">
                        </div>
                        <div class="grow">
                            <div class="p-4 flex flex-col h-full sm:p-6">
                                <div class="mb-3">
                                    <p
                                        class="inline-flex items-center gap-1.5 py-1.5 px-3 rounded-md text-xs font-medium bg-gray-100 text-gray-800 dark:bg-gray-800 dark:text-gray-200">
                                        {{ $recommendation->category->name }}
                                    </p>
                                </div>
                                <h3
                                    class="text-lg sm:text-2xl font-semibold text-gray-800 group-hover:text-blue-600 dark:text-gray-300 dark:group-hover:text-white">
                                    {{ $recommendation->name }}
                                </h3>
                                <p class="mt-2 text-gray-600 dark:text-gray-400">
                                    {{ $recommendation->title }}
                                </p>

                                <div class="mt-5 sm:mt-auto">
                                    <!-- Avatar -->
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0">
                                            <img class="h-[2.875rem] w-[2.875rem] rounded-full"
                                                src="{{ asset($recommendation->user->avatar ?: 'avatars/default.jpg') }}"
                                                style="object-fit: cover;">
                                        </div>
                                        <div class="ml-2.5 sm:ml-4">
                                            <h4 class="font-semibold text-gray-800 dark:text-gray-200">
                                                {{ $recommendation->user->firstname }}
                                                {{ $recommendation->user->lastname }}
                                            </h4>
                                            <p class="text-xs text-gray-500">
                                                {{ Date::parse($recommendation->created_at)->format('j F Y') }}
                                            </p>
                                        </div>
                                    </div>
                                    <!-- End Avatar -->
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
                <!-- End Card -->
            </div>
        </div>
        <!-- End Grid -->

        <!-- End Card Blog -->
    </div>
@endsection
