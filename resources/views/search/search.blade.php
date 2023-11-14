@extends('default-layout')

@section('page-title', 'Поиск')

@section('content')
    <div class="max-w-[78rem] mx-auto mt-10 px-4">
        <div class="max-w-2xl lg:mb-10">
            <h2 class="text-2xl font-bold md:text-4xl md:leading-tight dark:text-white">Поиск</h2>
        </div>
        <div class="max-w-[80rem] flex flex-col gap-6">
            <form action="{{ route('search-result') }}" method="POST">
                @csrf
                <label for="search" class="sr-only">Label</label>
                <div class="relative flex rounded-md shadow-sm">
                    <input type="text" id="search" name="search"
                        class="search border py-3 px-4 pl-11 block w-full border-gray-200 shadow-sm rounded-md text-sm focus:z-10 outline-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                        value="{{ request()->has('query') ? request('query') : '' }}">

                    <div class="absolute inset-y-0 left-0 flex items-center pointer-events-none z-20 pl-4">
                        <svg class="h-4 w-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                            fill="currentColor" viewBox="0 0 16 16">
                            <path
                                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                        </svg>
                    </div>
                </div>
            </form>
            <div class="flex gap-10">
                <div class="flex-1">
                    <div id="search-list" class="flex flex-col gap-6 mt-5">

                    </div>
                </div>
                <div class="flex-1">
                    <div id="post-results" class="flex flex-col gap-6 mt-5">

                    </div>
                </div>
            </div>



        </div>
        <div>

            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
                var typingTimer;
                var doneTypingInterval = 200; // Задержка в миллисекундах (0.2 секунды)

                $(document).ready(function() {
                    var initialQuery = $('#search').val();
                    fetch_customer_data(initialQuery);

                    function fetch_customer_data(query = '') {
                        $.ajax({
                            url: '/search-result',
                            type: 'POST',
                            data: {
                                '_token': '{{ csrf_token() }}',
                                'query': query
                            },
                            success: function(data) {
                                $('#search-list').fadeOut(200, function() {
                                    $(this).html(data.users);
                                    $('#post-results').html(data
                                        .posts);
                                    $(this).fadeIn(200);
                                });
                            }
                        });
                    }

                    $(document).on('keyup', '#search', function() {
                        clearTimeout(typingTimer);
                        var query = $(this).val();

                        typingTimer = setTimeout(function() {
                            fetch_customer_data(query);
                        }, doneTypingInterval);
                    });
                });
            </script>




        @endsection
