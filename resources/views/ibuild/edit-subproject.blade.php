<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white border border-gray-300 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('ibuild.update-subproject', $subproject->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        @if ($subprojectType === 'Bridge' || $subprojectType === 'FMR')
                        @include('ibuild.components.edit-bridge-fmr-checklist')
                        @elseif ($subprojectType === 'VCRI')
                        @include('ibuild.components.edit-vcri-checklist')
                        @elseif ($subprojectType === 'PWS' || $subprojectType === 'CIS')
                        @include('ibuild.components.edit-pws-cis-checklist')
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>