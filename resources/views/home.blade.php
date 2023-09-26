@extends('default-layout')

@section('page-title', 'Главная')

@section('content')
    <div class="w-full">

        <!-- Card Blog -->
        <div class="max-w-[80rem] sm:px-6 lg:px-8 lg:py-0 mx-auto">
            <div class="my-10">
                <h1 class="block text-2xl font-bold text-gray-800 sm:text-3xl dark:text-white">Рекомендуем вам</h1>
            </div>

            <!-- Grid -->
            <div class="grid lg:grid-cols-2 gap-6">
                <!-- Card -->
                <a class="group relative block" href="#">
                    <div
                        class="flex-shrink-0 relative w-full rounded-xl overflow-hidden w-full h-[350px] before:absolute before:inset-x-0 before:w-full before:h-full before:bg-gradient-to-t before:from-gray-900/[.7] before:z-[1]">
                        <img class="w-full h-full absolute top-0 left-0 object-cover"
                            src="https://images.unsplash.com/photo-1669828230990-9b8583a877ab?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1062&q=80"
                            alt="Image Description">
                    </div>

                    <div class="absolute top-0 inset-x-0">
                        <div class="p-4 flex flex-col h-full sm:p-6">
                            <!-- Avatar -->
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <img class="h-[2.875rem] w-[2.875rem] border-2 border-white rounded-full"
                                        src="https://images.unsplash.com/photo-1669837401587-f9a4cfe3126e?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2&w=320&h=320&q=80"
                                        alt="Image Description">
                                </div>
                                <div class="ml-2.5 sm:ml-4">
                                    <h4 class="font-semibold text-white">
                                        Gloria
                                    </h4>
                                    <p class="text-xs text-white/[.8]">
                                        Jan 09, 2021
                                    </p>
                                </div>
                            </div>
                            <!-- End Avatar -->
                        </div>
                    </div>

                    <div class="absolute bottom-0 inset-x-0 z-10">
                        <div class="flex flex-col h-full p-4 sm:p-6">
                            <h3 class="text-lg sm:text-3xl font-semibold text-white group-hover:text-white/[.8]">
                                Facebook is creating a news section in Watch to feature breaking news
                            </h3>
                            <p class="mt-2 text-white/[.8]">
                                Facebook launched the Watch platform in August
                            </p>
                        </div>
                    </div>
                </a>
                <!-- End Card -->

                <!-- Card -->
                <a class="group relative block" href="#">
                    <div
                        class="flex-shrink-0 relative w-full rounded-xl overflow-hidden w-full h-[350px] before:absolute before:inset-x-0 before:w-full before:h-full before:bg-gradient-to-t before:from-gray-900/[.7] before:z-[1]">
                        <img class="w-full h-full absolute top-0 left-0 object-cover"
                            src="https://images.unsplash.com/photo-1611625618313-68b87aaa0626?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1064&q=80"
                            alt="Image Description">
                    </div>

                    <div class="absolute top-0 inset-x-0 z-10">
                        <div class="p-4 flex flex-col h-full sm:p-6">
                            <!-- Avatar -->
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <img class="h-[2.875rem] w-[2.875rem] border-2 border-white rounded-full"
                                        src="https://images.unsplash.com/photo-1669837401587-f9a4cfe3126e?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2&w=320&h=320&q=80"
                                        alt="Image Description">
                                </div>
                                <div class="ml-2.5 sm:ml-4">
                                    <h4 class="font-semibold text-white">
                                        Gloria
                                    </h4>
                                    <p class="text-xs text-white/[.8]">
                                        May 30, 2021
                                    </p>
                                </div>
                            </div>
                            <!-- End Avatar -->
                        </div>
                    </div>

                    <div class="absolute bottom-0 inset-x-0 z-10">
                        <div class="flex flex-col h-full p-4 sm:p-6">
                            <h3 class="text-lg sm:text-3xl font-semibold text-white group-hover:text-white/[.8]">
                                What CFR (Conversations, Feedback, Recognition) really is about
                            </h3>
                            <p class="mt-2 text-white/[.8]">
                                For a lot of people these days, Measure What Matters.
                            </p>
                        </div>
                    </div>
                </a>
                <!-- End Card -->
            </div>
            <!-- End Grid -->
        </div>
        <!-- End Card Blog -->
        <!-- Card Blog -->
        <div class="max-w-[80rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
            <!-- Grid -->
            <div class="grid lg:grid-cols-2 gap-6">
                <!-- Card -->
                <a class="group sm:flex" href="#">
                    <div
                        class="flex-shrink-0 relative rounded-xl overflow-hidden w-full h-[200px] sm:w-[250px] sm:h-[350px]">
                        <img class="w-full h-full absolute top-0 left-0 object-cover"
                            src="https://images.unsplash.com/photo-1664574654529-b60630f33fdb?ixlib=rb-4.0.3&ixid=MnwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=987&q=80"
                            alt="Image Description">
                    </div>

                    <div class="grow">
                        <div class="p-4 flex flex-col h-full sm:p-6">
                            <div class="mb-3">
                                <p
                                    class="inline-flex items-center gap-1.5 py-1.5 px-3 rounded-md text-xs font-medium bg-gray-100 text-gray-800 dark:bg-gray-800 dark:text-gray-200">
                                    Business
                                </p>
                            </div>
                            <h3
                                class="text-lg sm:text-2xl font-semibold text-gray-800 group-hover:text-blue-600 dark:text-gray-300 dark:group-hover:text-white">
                                Preline becomes an official Instagram Marketing Partner
                            </h3>
                            <p class="mt-2 text-gray-600 dark:text-gray-400">
                                Great news we're eager to share.
                            </p>

                            <div class="mt-5 sm:mt-auto">
                                <!-- Avatar -->
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <img class="h-[2.875rem] w-[2.875rem] rounded-full"
                                            src="https://images.unsplash.com/photo-1492562080023-ab3db95bfbce?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2&w=320&h=320&q=80"
                                            alt="Image Description">
                                    </div>
                                    <div class="ml-2.5 sm:ml-4">
                                        <h4 class="font-semibold text-gray-800 dark:text-gray-200">
                                            Aaron Larsson
                                        </h4>
                                        <p class="text-xs text-gray-500">
                                            Feb 15, 2021
                                        </p>
                                    </div>
                                </div>
                                <!-- End Avatar -->
                            </div>
                        </div>
                    </div>
                </a>
                <!-- End Card -->

                <!-- Card -->
                <a class="group sm:flex" href="#">
                    <div
                        class="flex-shrink-0 relative rounded-xl overflow-hidden w-full h-[200px] sm:w-[250px] sm:h-[350px]">
                        <img class="w-full h-full absolute top-0 left-0 object-cover"
                            src="https://images.unsplash.com/photo-1669824774762-65ddf29bee56?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=987&q=80"
                            alt="Image Description">
                    </div>
                    <div class="grow">
                        <div class="p-4 flex flex-col h-full sm:p-6">
                            <div class="mb-3">
                                <p
                                    class="inline-flex items-center gap-1.5 py-1.5 px-3 rounded-md text-xs font-medium bg-gray-100 text-gray-800 dark:bg-gray-800 dark:text-gray-200">
                                    Announcements
                                </p>
                            </div>
                            <h3
                                class="text-lg sm:text-2xl font-semibold text-gray-800 group-hover:text-blue-600 dark:text-gray-300 dark:group-hover:text-white">
                                Announcing a free plan for small teams
                            </h3>
                            <p class="mt-2 text-gray-600 dark:text-gray-400">
                                At Wake, our mission has always been focused on bringing openness.
                            </p>

                            <div class="mt-5 sm:mt-auto">
                                <!-- Avatar -->
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <img class="h-[2.875rem] w-[2.875rem] rounded-full"
                                            src="https://images.unsplash.com/photo-1669720229052-89cda125fc3f?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2&w=320&h=320&q=80"
                                            alt="Image Description">
                                    </div>
                                    <div class="ml-2.5 sm:ml-4">
                                        <h4 class="font-semibold text-gray-800 dark:text-gray-200">
                                            Hanna Wolfe
                                        </h4>
                                        <p class="text-xs text-gray-500">
                                            Feb 4, 2021
                                        </p>
                                    </div>
                                </div>
                                <!-- End Avatar -->
                            </div>
                        </div>
                    </div>
                </a>
                <!-- End Card -->
            </div>
            <!-- End Grid -->
        </div>
        <!-- End Card Blog -->
    </div>
@endsection
