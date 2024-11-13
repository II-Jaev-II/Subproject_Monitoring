<x-alpine-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-50 border border-gray-300 shadow-2xl dark:bg-gray-800 overflow-hidden sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if (session()->has('success'))
                    <div class="border-green-900 bg-green-900 rounded-md px-3 py-2 mb-2 w-full">
                        {{ session('success') }}
                    </div>
                    @endif
                    <div class="flex justify-end items-center mb-4">
                        <a href="{{ route('ibuild.create-subproject') }}"
                            class="border border-transparent text-sm leading-4 font-medium rounded-md text-white dark:text-white bg-green-500 dark:bg-lime-500 hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 px-3 py-2">
                            Create a Subproject
                        </a>
                    </div>
                    <livewire:subprojects-table />
                </div>
            </div>
        </div>
    </div>
</x-alpine-layout>