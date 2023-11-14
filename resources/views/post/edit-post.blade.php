@extends('default-layout')

@section('page-title', 'Редактирование поста')

@section('content')

    <link rel="stylesheet" href="amsify/amsify.suggestags.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="/amsify/jquery.amsify.suggestags.js"></script>

    <div class="max-w-[80rem] mx-auto">
        <div class="max-w-4xl px-4 py-10 sm:px-6 lg:px-8 lg:py-14">
            <div class="mb-8">
                <div class="max-w-2xl lg:mb-10">
                    <h2 class="text-2xl font-bold md:text-4xl md:leading-tight dark:text-white">Редактирование поста</h2>
                </div>
            </div>

            <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

            <script>
                tinymce.init({
                    selector: 'textarea'
                });
            </script>
            {{-- 
            <textarea>Next, use our Get Started docs to setup Tiny!</textarea> --}}

            <form method="POST" action="{{ url('/update-post') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $post->id }}">
                <!-- Card -->
                <div>
                    <div class="">
                        <!-- Grid -->
                        <div class="space-y-2 mb-4">
                            <label for="af-submit-app-project-name"
                                class="inline-block text-sm font-medium text-gray-800 mt-2.5 dark:text-gray-200">
                                Название
                            </label>

                            <input id="af-submit-app-project-name" type="text" name="name"
                                class="py-2 border px-3 pr-11 block w-full border-gray-200 shadow-sm rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                placeholder="Введите название поста" value="{{ $post->name }}">
                        </div>
                        <div class="space-y-2 mb-4">
                            <label for="af-submit-app-project-name"
                                class="inline-block text-sm font-medium text-gray-800 mt-2.5 dark:text-gray-200">
                                Краткое описание
                            </label>

                            <input id="af-submit-app-project-name" type="text" name="title"
                                class="py-2 border px-3 pr-11 block w-full border-gray-200 shadow-sm rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                placeholder="Придумайте краткое описание поста" value="{{ $post->title }}">
                        </div>

                        <div class="space-y-2
                                mb-4">
                            <label for="af-submit-app-description"
                                class="inline-block text-sm font-medium text-gray-800 mt-2.5 dark:text-gray-200">
                                Содержание
                            </label>

                            <textarea id="af-submit-app-description" name="content"
                                class="py-2 px-3 border block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                rows="6" placeholder="Поделитесь чем-нибудь...">{{ $post->content }}</textarea>
                        </div>

                        <div class="space-y-2 mb-4">
                            <label for="af-submit-app-upload-images"
                                class="inline-block text-sm font-medium text-gray-800 mt-2.5 dark:text-gray-200">
                                Обложка
                            </label>

                            <label for="cover-image"
                                class="group p-4 sm:p-7  block cursor-pointer text-center border-2 border-dashed border-gray-200 rounded-lg focus-within:outline-none focus-within:ring-2 focus-within:ring-blue-500 focus-within:ring-offset-2 dark:border-gray-700">
                                <input id="cover-image" name="cover-image" type="file" class="sr-only">
                                <svg class="w-10 h-10 mx-auto text-gray-400 dark:text-gray-600"
                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M7.646 5.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 6.707V10.5a.5.5 0 0 1-1 0V6.707L6.354 7.854a.5.5 0 1 1-.708-.708l2-2z" />
                                    <path
                                        d="M4.406 3.342A5.53 5.53 0 0 1 8 2c2.69 0 4.923 2 5.166 4.579C14.758 6.804 16 8.137 16 9.773 16 11.569 14.502 13 12.687 13H3.781C1.708 13 0 11.366 0 9.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383zm.653.757c-.757.653-1.153 1.44-1.153 2.056v.448l-.445.049C2.064 6.805 1 7.952 1 9.318 1 10.785 2.23 12 3.781 12h8.906C13.98 12 15 10.988 15 9.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 4.825 10.328 3 8 3a4.53 4.53 0 0 0-2.941 1.1z" />
                                </svg>
                                <span class="mt-2 block text-sm text-gray-800 dark:text-gray-200 ">
                                    Выбрать файл на устройстве
                                </span>
                                {{--                                 <span class="mt-1 block text-xs text-gray-500">
                                    Максимальный размер файла 4 МБ
                                </span> --}}
                            </label>
                            <div>
                                <img id="image-preview" class="block mt-10 w-full object-cover rounded-xl"
                                    src="data:image/jpeg;base64,{{ base64_encode($post->cover_image) }}">
                            </div>

                            <script>
                                const fileInput = document.getElementById('cover-image');
                                const imagePreview = document.getElementById('image-preview');

                                fileInput.addEventListener('change', function() {
                                    const file = fileInput.files[0];

                                    if (file) {
                                        const reader = new FileReader();

                                        reader.onload = function(e) {
                                            imagePreview.src = e.target.result;
                                        };

                                        reader.readAsDataURL(file);
                                    } else {
                                        imagePreview.src = "data:image/jpeg;base64,{{ base64_encode($post->cover_image) }}";
                                    }
                                });
                            </script>
                        </div>
                        <div class="space-y-2 mb-4">
                            <label for="af-submit-app-category"
                                class="inline-block text-sm font-medium text-gray-800 mt-2.5 dark:text-gray-200">
                                Категория и теги
                            </label>
                            <select id="af-submit-app-category" name="category_id"
                                class="py-2 border px-3 pr-9 block w-full border-gray-200 shadow-sm rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400">
                                <option value="" selected>Выберите категорию</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $category->id == $post->category_id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>

                        </div>
                        <div class="space-y-2 mb-4">
                            <input type="text" name="tags"
                                class="py-2 border px-3 pr-11 block w-full border-gray-200 shadow-sm rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                value="{{ $post->tags }}">
                            <script>
                                $('input[name="tags"]').amsifySuggestags({
                                    tagLimit: 5,

                                });
                            </script>
                        </div>

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
                    <div class="mt-5 flex justify-end gap-x-2">
                        <a href="{{ url('delete-post/' . $post->id) }}">
                            <button type="button"
                                class="py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-red-500 text-white hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                                Удалить пост
                            </button>
                        </a>
                        <button type="submit"
                            class="py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                            Сохранить
                        </button>
                    </div>
                </div>
        </div>
        <!-- End Card -->
        </form>
    </div>
    </div>
    <!-- End Card Section -->
@endsection
