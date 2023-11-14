@extends('default-layout')

@section('page-title', $post->name)

@section('content')

    <div class="max-w-[80rem] mx-auto">
        <!-- Blog Article -->
        <div class="max-w-[80rem] px-4 sm:px-6 lg:px-8 mx-auto">
            <div class="grid lg:grid-cols-3 gap-y-8 lg:gap-y-0 lg:gap-x-6 lg:gap-x-12">
                <!-- Content -->
                <div class="lg:col-span-2">
                    <div class="py-8 lg:pr-4 lg:pr-8">
                        <div class="space-y-5 lg:space-y-8">
                            <a class="inline-flex items-center gap-x-1.5 text-sm text-gray-600 decoration-2 hover:underline dark:text-blue-400"
                                href="javascript:history.back();">
                                <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z" />
                                </svg>
                                Вернуться
                            </a>


                            <h2 class="text-3xl font-bold lg:text-4xl lg:text-5xl dark:text-white">{{ $post->name }}</h2>

                            <div class="flex items-center gap-x-5">
                                <a class="inline-flex items-center gap-1.5 py-1 px-3 sm:py-2 sm:px-4 rounded-full text-xs sm:text-sm bg-gray-100 text-gray-800 hover:bg-gray-200 dark:bg-gray-800 dark:hover:bg-gray-800 dark:text-gray-200"
                                    href="#">
                                    {{ $post->category->name }}
                                </a>
                                <p class="text-xs sm:text-sm text-gray-800 dark:text-gray-200">
                                    {{ Date::parse($post->created_at)->format('j F Y') }}

                            </div>

                            <p class="text-lg text-gray-800 dark:text-gray-200">
                                @if ($post->cover_image)
                                    <p class="text-lg text-gray-800 dark:text-gray-200">
                                    <figure>
                                        <img class="w-full object-cover rounded-xl"
                                            src="data:image/jpeg;base64,{{ base64_encode($post->cover_image) }}">
                                        <figcaption class="mt-3 text-sm text-center text-gray-500">
                                        </figcaption>
                                    </figure>
                                @endif
                            </p>
                            <div class="dark:text-white">
                                <p>
                                    {!! $post->content !!}</p>
                            </div>


                            <div class="grid lg:flex lg:justify-between lg:items-center gap-y-5 lg:gap-y-0">
                                <!-- Badges/Tags -->
                                @if (count($tags) > 0)
                                    <div>
                                        @foreach ($tags as $tag)
                                            <a class="m-0.5 inline-flex items-center gap-1.5 py-2 px-3 rounded-full text-sm bg-gray-100 text-gray-800 hover:bg-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-gray-200"
                                                href="#">
                                                {{ $tag }}
                                            </a>
                                        @endforeach
                                    </div>
                                @endif
                                <!-- End Badges/Tags -->

                                <div class="flex justify-end items-center gap-x-1.5">
                                    <!-- Button -->
                                    <div class="hs-tooltip inline-block">
                                        <button type="button" data-post-id="{{ $post->id }}"
                                            class="hs-tooltip-toggle py-2 px-3 inline-flex justify-center like-button items-center gap-x-1.5 sm:gap-x-2 rounded-md font-medium bg-white text-gray-700 align-middle hover:bg-gray-100 focus:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-gray-300 transition-all text-sm dark:bg-slate-900 dark:hover:bg-slate-800 dark:focus:bg-slate-800 dark:border-gray-700 dark:text-gray-400 dark:hover:text-white dark:focus:ring-slate-900 dark:focus:ring-offset-blue-500">
                                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="16"
                                                height="16" fill="currentColor" viewBox="0 0 16 16">
                                                <path
                                                    d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                                            </svg>

                                            <span class="like-count">{{ $likesCount }}</span>
                                            <span
                                                class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded-md shadow-sm dark:bg-black"
                                                role="tooltip">
                                                Понравилось
                                            </span>
                                        </button>
                                    </div>
                                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

                                    <script>
                                        $(document).on('click', '.like-button', function() {
                                            var postId = $(this).data('post-id');
                                            var button = $(this);
                                            var likeCount = button.find('.like-count');

                                            $.ajax({
                                                url: '/like-post',
                                                type: 'POST',
                                                data: {
                                                    _token: "{{ csrf_token() }}",
                                                    id: postId
                                                },
                                                success: function(response) {
                                                    likeCount.text(response.count);


                                                }
                                            });
                                        });
                                    </script>




                                    <!-- Button -->
                                    <div class="hs-tooltip inline-block">
                                        <button type="button"
                                            class="hs-tooltip-toggle py-2 px-3 inline-flex justify-center items-center gap-x-1.5 sm:gap-x-2 rounded-md font-medium bg-white text-gray-700 align-middle hover:bg-gray-100 focus:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-gray-300 transition-all text-sm dark:bg-slate-900 dark:hover:bg-slate-800 dark:focus:bg-slate-800 dark:border-gray-700 dark:text-gray-400 dark:hover:text-white dark:focus:ring-slate-900 dark:focus:ring-offset-blue-500">
                                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="16"
                                                height="16" fill="currentColor" viewBox="0 0 16 16">
                                                <path
                                                    d="M2.678 11.894a1 1 0 0 1 .287.801 10.97 10.97 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8.06 8.06 0 0 0 8 14c3.996 0 7-2.807 7-6 0-3.192-3.004-6-7-6S1 4.808 1 8c0 1.468.617 2.83 1.678 3.894zm-.493 3.905a21.682 21.682 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a9.68 9.68 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105z" />
                                            </svg>
                                            {{ $commentsCount }}
                                            <span
                                                class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded-md shadow-sm dark:bg-black"
                                                role="tooltip">
                                                Коментарии
                                            </span>
                                        </button>
                                    </div>
                                    <!-- Button -->

                                    <div class="block h-3 border-r border-gray-300 mx-1.5 dark:border-gray-600"></div>

                                    <!-- Button -->
                                    <div class="hs-dropdown relative inline-flex gap-2">
                                        <a href="{{ url('edit-post/' . $post->id) }}">
                                            <button type="button"
                                                class="py-2 px-3 inline-flex justify-center items-center gap-x-1.5 sm:gap-x-2 rounded-md font-medium bg-white text-gray-700 align-middle hover:bg-gray-100 focus:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-gray-300 transition-all text-sm dark:bg-slate-900 dark:hover:bg-slate-800 dark:focus:bg-slate-800 dark:border-gray-700 dark:text-gray-400 dark:hover:text-white dark:focus:ring-slate-900 dark:focus:ring-offset-blue-500">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                                    <path
                                                        d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z" />
                                                </svg>
                                                Редактировать
                                            </button></a>


                                    </div>
                                </div>
                            </div>



                        </div>

                    </div>
                    <div class="">


                        <form class="mb-6" id="comment-form" action="{{ route('comments.add') }}" method="POST">
                            @csrf
                            <input type="hidden" name="post_id" value="{{ $post->id }}">
                            <div
                                class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                                <label for="comment" class="sr-only">Твой комментарий</label>
                                <textarea id="comment" rows="6" name="content"
                                    class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none dark:text-white dark:placeholder-gray-400 dark:bg-gray-800"
                                    placeholder="Поделитесь своим мнением..." required></textarea>
                            </div>
                            <button type="submit"
                                class="py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                                Отправить
                            </button>
                        </form>
                        @foreach ($comments as $comment)
                            <article class="py-6 text-base  rounded-lg dark:bg-gray-900">
                                <footer class="flex justify-between items-center mb-2">
                                    <div class="flex items-center gap-2">
                                        <p
                                            class="inline-flex items-center  text-sm text-gray-900 dark:text-white font-semibold">
                                            <a href="{{ url('profile/' . $comment->user->id) }}"> <img
                                                    class="mr-2 w-6 h-6 rounded-full"
                                                    src="{{ asset($comment->user->avatar ?: 'avatars/default.jpg') }}"
                                                    style="object-fit: cover;"><a
                                                    href="{{ url('profile/' . $comment->user->id) }}"></a>
                                                <a href="{{ url('profile/' . $comment->user->id) }}">{{ $comment->user->firstname }}
                                                    {{ $comment->user->lastname }}</a>
                                        </p>
                                        <p class="text-sm text-gray-600 dark:text-gray-400">
                                            {{ $comment->created_at->format('d.m H:i') }}
                                            </time>
                                        </p>
                                        @if ($comment->user->id == auth()->user()->id)
                                            <a href="{{ url('delete-comment/' . $comment->id) }}"
                                                class="text-sm text-gray-500 dark:text-gray-500 dark:hover:text-blue-500 hover:text-blue-500">Удалить</a>
                                        @endif
                                    </div>
                                </footer>
                                <p class="text-gray-500 dark:text-gray-400"> {{ $comment->content }}</p>
                                <div class="flex items-center mt-4 space-x-4">
                                    <button type="button"
                                        class="reply-button flex items-center text-sm text-gray-500 hover:underline dark:text-gray-400 font-medium"
                                        data-target="comment-form-{{ $comment->id }}">
                                        <svg class="mr-1.5 w-3.5 h-3.5" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 18">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M5 5h5M5 8h2m6-3h2m-5 3h6m2-7H2a1 1 0 0 0-1 1v9a1 1 0 0 0 1 1h3v5l5-5h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1Z" />
                                        </svg>
                                        Ответить
                                    </button>
                                </div>
                                <form id="comment-form-{{ $comment->id }}" class="comment-form"
                                    action="{{ route('comments.reply') }}" method="POST" style="display: none;">
                                    @csrf

                                    <input type="hidden" name="post_id" value="{{ $post->id }}">

                                    <input type="hidden" name="parent_comment_id" value="{{ $comment->id }}">

                                    <div
                                        class="py-2 px-4 mb-4 mt-5 bg-white rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                                        <label for="comment" class="sr-only">Твой ответ</label>
                                        <textarea id="comment" rows="4" name="content"
                                            class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none dark:text-white dark:placeholder-gray-400 dark:bg-gray-800"
                                            placeholder="Ваш ответ" required></textarea>
                                    </div>

                                    <button type="submit"
                                        class="py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                                        Отправить
                                    </button>
                                </form>
                                @foreach ($childComments[$comment->id] as $childComment)
                                    <article class="px-6 py-2 mt-6 ml-6 lg:ml-12 text-base rounded-lg dark:bg-gray-900">
                                        <footer class="flex justify-between items-center mb-2">
                                            <div class="flex items-center gap-2">
                                                <p
                                                    class="inline-flex items-center text-sm text-gray-900 dark:text-white font-semibold">
                                                    <img class="mr-2 w-6 h-6 rounded-full"
                                                        src="{{ asset($childComment->user->avatar ?: 'avatars/default.jpg') }}"
                                                        style="object-fit: cover;">{{ $childComment->user->firstname }}
                                                    {{ $childComment->user->lastname }}
                                                </p>
                                                <p class="text-sm text-gray-600 dark:text-gray-400">
                                                    {{ $childComment->created_at->format('d.m H:i') }}</time>
                                                </p>
                                                @if ($childComment->user->id == auth()->user()->id)
                                                    <a href="{{ url('delete-comment/' . $childComment->id) }}"
                                                        class="text-sm text-gray-500 dark:text-gray-500 dark:hover:text-blue-500 hover:text-blue-500">Удалить</a>
                                                @endif
                                            </div>
                                        </footer>
                                        <p class="text-gray-500 dark:text-gray-400">{{ $childComment->content }}
                                        </p>
                                        <div class="flex items-center mt-4 space-x-4">
                                            <button type="button"
                                                class="reply-button flex items-center text-sm text-gray-500 hover:underline dark:text-gray-400 font-medium"
                                                data-target="reply-form-{{ $childComment->id }}">
                                                <svg class="mr-1.5 w-3.5 h-3.5" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 20 18">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="M5 5h5M5 8h2m6-3h2m-5 3h6m2-7H2a1 1 0 0 0-1 1v9a1 1 0 0 0 1 1h3v5l5-5h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1Z" />
                                                </svg>
                                                Ответить
                                            </button>
                                        </div>
                                        <form id="reply-form-{{ $childComment->id }}" class="comment-form"
                                            action="{{ route('comments.reply') }}" method="POST"
                                            style="display: none;">
                                            @csrf

                                            <input type="hidden" name="post_id" value="{{ $post->id }}">

                                            <input type="hidden" name="parent_comment_id" value="{{ $comment->id }}">

                                            <div
                                                class="py-2 px-4 mb-4 mt-5 bg-white rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                                                <label for="comment" class="sr-only">Твой ответ</label>
                                                <textarea id="comment" rows="4" name="content"
                                                    class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none dark:text-white dark:placeholder-gray-400 dark:bg-gray-800"
                                                    placeholder="Ваш ответ" required></textarea>
                                            </div>

                                            <button type="submit"
                                                class="py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                                                Отправить
                                            </button>

                                        </form>
                                    </article>
                                @endforeach
                            </article>
                        @endforeach
                    </div>
                </div>

                <script>
                    $(document).ready(function() {
                        $(".reply-button").click(function() {
                            var target = $(this).data("target");
                            var commentForm = $("#" + target);

                            commentForm.slideToggle(200);
                        });
                    });


                    $(document).ready(function() {
                        $(".reply-child-button").click(function() {
                            var target = $(this).data("target");
                            var commentForm = $("#" + target);

                            commentForm.slideToggle(200);
                        });
                    });
                </script>


                <!-- End Content -->

                <!-- Sidebar -->
                <div
                    class="lg:col-span-1 lg:w-full lg:h-full lg:bg-gradient-to-r lg:from-gray-50 lg:via-transparent lg:to-transparent dark:from-slate-800">
                    <div class="sticky top-0 left-0 py-8 lg:pl-4 lg:pl-8">
                        <!-- Avatar Media -->
                        <div
                            class="group flex items-center gap-x-3 border-b border-gray-200 pb-8 mb-8 dark:border-gray-700">
                            <a class="block flex-shrink-0" href="{{ url('profile/' . $user->id . '') }}">
                                <img class="h-10 w-10 rounded-full"
                                    src="{{ asset($user->avatar) ?: 'avatars/default.jpg' }}" style="object-fit: cover;">
                            </a>

                            <a class="group grow block" href="{{ url('profile/' . $user->id . '') }}">
                                <h5
                                    class="group-hover:text-gray-600 text-sm font-semibold text-gray-800 dark:group-hover:text-gray-400 dark:text-gray-200">
                                    {{ $user->firstname }} {{ $user->lastname }}
                                </h5>
                            </a>
                            <form action="{{ route('subscribe', $user) }}" method="POST">
                                @csrf
                                <div class="grow">
                                    <div class="flex justify-end">
                                        @if ($user->id != auth()->user()->id)
                                            @if (auth()->user()->subscriptions()->where('target_user_id', $user->id)->exists())
                                                <button type="submit"
                                                    class="py-1.5 px-2.5 inline-flex justify-center items-center gap-2 rounded-md bg-blue-100 border border-transparent font-semibold text-blue-500 hover:text-white hover:bg-blue-500 focus:outline-none focus:ring-2 ring-offset-white focus:ring-blue-500 focus:ring-offset-2 transition-all dark:focus:ring-offset-gray-800 text-xs">
                                                    Отписаться
                                                </button>
                                            @else
                                                <button type="submit"
                                                    class="py-1.5 px-2.5 inline-flex justify-center items-center gap-x-1.5 rounded-md border border-transparent font-semibold bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:ring-offset-gray-900 text-xs">
                                                    <svg class="w-3.5 h-3.5" xmlns="http://www.w3.org/2000/svg"
                                                        width="16" height="16" fill="currentColor"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                                        <path fill-rule="evenodd"
                                                            d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" />
                                                    </svg>
                                                    Подписаться
                                                </button>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                            </form>

                        </div>
                        <!-- End Avatar Media -->

                        <div class="space-y-6">
                            @foreach ($authorPosts as $authorPost)
                                <a class="group flex items-center gap-x-6"
                                    href="{{ url('post/' . $authorPost->id . '') }}">
                                    <div class="grow">
                                        <span
                                            class="text-sm font-bold text-gray-800 group-hover:text-blue-600 dark:text-gray-200 dark:group-hover:text-blue-500">
                                            {{ $authorPost->name }}
                                        </span>
                                        <span
                                            class="text-sm text-gray-800 group-hover:text-blue-600 dark:text-gray-200 dark:group-hover:text-blue-500">
                                            {{ $authorPost->title }}
                                        </span>
                                    </div>

                                    <div class="flex-shrink-0 relative rounded-lg overflow-hidden w-20 h-20">
                                        <img class="w-full h-full absolute top-0 left-0 object-cover rounded-lg"
                                            src="data:image/jpeg;base64,{{ base64_encode($authorPost->cover_image) }}"
                                            style="object-fit: cover;">
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- End Sidebar -->
            </div>
        </div>
        <!-- End Blog Article -->
    </div>

@endsection
