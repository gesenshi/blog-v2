@extends('default-layout')
@section('page-title', auth()->user()->firstname . ' ' . auth()->user()->lastname)

@section('content')
    <div class="max-w-[80rem] mx-auto mt-16 px-4"> 
        <div class="flex flex-wrap items-center gap-10">
            <div>
                <img class="inline-block h-[8.875rem] w-[8.875rem] rounded-full ring-2 ring-white dark:ring-gray-800"
                    src="{{ asset(auth()->user()->avatar ?: 'avatars/default.jpg') }}" alt="Image Description">
            </div>
            <div>
                <span class="block text-2xl font-bold text-gray-800 dark:text-white">{{ auth()->user()->firstname }}
                    {{ auth()->user()->lastname }}</span>
                <p class="block my-2 text-gray-800 dark:text-white max-w-[45rem]">{{ auth()->user()->bio }}</p>
            </div>
        </div>
    </div>
@endsection
