@if ($iReapChecklists && $iReapChecklists->reviewDate)
    <div class="flex items-center space-x-4 mb-4">
        <label for="reviewDate" class="dark:text-lime-500 text-sm md:text-base">Date of Review</label>
        <input type="text" name="reviewDate" id="reviewDate" value="{{ $formattedReviewDateIReap }}"
            class="dark:bg-gray-900 rounded-md dark:[color-scheme:dark]" readonly>
    </div>
@endif

<label for="legalPersonality" class="dark:text-lime-500 text-black text-sm md:text-lg">Legal
    Personality</label>
<hr class="border-2 dark:border-lime-500 border-green-500 mb-2">

@if ($iReapChecklists->registeredAgency)
    <div>
        <label for="accessibility" class="dark:text-green-600 text-sm md:text-base">Registered with CDA/SEC/DOLE for
            at least one (1) year</label>
        <div class="flex items-center gap-2">
            @foreach (['Yes', 'No'] as $option)
                <div class="flex items-center gap-2">
                    <input class="dark:bg-gray-800" type="radio" name="registeredAgency" value="{{ $option }}"
                        id="vca{{ $option }}"
                        {{ isset($iReapChecklists->registeredAgency) && $iReapChecklists->registeredAgency === $option ? 'checked' : '' }}
                        disabled>
                    <label for="vca{{ $option }}">{{ $option }}</label>
                </div>
            @endforeach
        </div>
    @else
        <div>
            <label for="accessibility" class="dark:text-green-600 text-sm md:text-base">Registered with CDA/SEC/DOLE for
                at least one (1) year</label>
            <div
                class="relative flex items-center gap-2 text-md rounded-md border font-bold bg-red-600 text-white dark:bg-red-800 border-red-400 px-2 py-2 mt-2 w-fit">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                    class="bi bi-question-diamond-fill" viewBox="0 0 16 16">
                    <path
                        d="M9.05.435c-.58-.58-1.52-.58-2.1 0L.436 6.95c-.58.58-.58 1.519 0 2.098l6.516 6.516c.58.58 1.519.58 2.098 0l6.516-6.516c.58-.58.58-1.519 0-2.098zM5.495 6.033a.237.237 0 0 1-.24-.247C5.35 4.091 6.737 3.5 8.005 3.5c1.396 0 2.672.73 2.672 2.24 0 1.08-.635 1.594-1.244 2.057-.737.559-1.01.768-1.01 1.486v.105a.25.25 0 0 1-.25.25h-.81a.25.25 0 0 1-.25-.246l-.004-.217c-.038-.927.495-1.498 1.168-1.987.59-.444.965-.736.965-1.371 0-.825-.628-1.168-1.314-1.168-.803 0-1.253.478-1.342 1.134-.018.137-.128.25-.266.25zm2.325 6.443c-.584 0-1.009-.394-1.009-.927 0-.552.425-.94 1.01-.94.609 0 1.028.388 1.028.94 0 .533-.42.927-1.029.927" />
                </svg>
                Pending
                <span class="absolute top-0 right-0 translate-x-1/2 -translate-y-1/2 flex h-4 w-4">
                    <span
                        class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-4 w-4 bg-red-500"></span>
                </span>
            </div>
        </div>
@endif

<div class="grid grid-cols-1 md:grid-cols-2 gap-2 mt-2">
    @if ($iReapChecklists->authenticatedCopy)
        <div>
            <label for="authenticatedCopy" class="dark:text-green-600 text-sm md:text-base w-full">Authenticated copy of
                latest
                Articles of Incorporation/Articles of Cooperation</label>
            <a class="flex items-center gap-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-green-500 dark:bg-lime-500 hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 px-3 py-2 w-fit mt-1"
                href="{{ asset($iReapChecklists->authenticatedCopy) }}" target="_blank">
                <img src="/images/file-earmark-text.svg" alt="Save" width="22" height="22">View File</a>
        </div>
    @else
        <div>
            <label for="authenticatedCopy" class="dark:text-green-600 text-sm md:text-base">Authenticated copy of latest
                Articles of Incorporation/Articles of Cooperation</label>
            <div
                class="relative flex items-center gap-2 text-md rounded-md border font-bold bg-red-600 text-white dark:bg-red-800 border-red-400 px-2 py-2 mt-2 w-fit">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                    class="bi bi-question-diamond-fill" viewBox="0 0 16 16">
                    <path
                        d="M9.05.435c-.58-.58-1.52-.58-2.1 0L.436 6.95c-.58.58-.58 1.519 0 2.098l6.516 6.516c.58.58 1.519.58 2.098 0l6.516-6.516c.58-.58.58-1.519 0-2.098zM5.495 6.033a.237.237 0 0 1-.24-.247C5.35 4.091 6.737 3.5 8.005 3.5c1.396 0 2.672.73 2.672 2.24 0 1.08-.635 1.594-1.244 2.057-.737.559-1.01.768-1.01 1.486v.105a.25.25 0 0 1-.25.25h-.81a.25.25 0 0 1-.25-.246l-.004-.217c-.038-.927.495-1.498 1.168-1.987.59-.444.965-.736.965-1.371 0-.825-.628-1.168-1.314-1.168-.803 0-1.253.478-1.342 1.134-.018.137-.128.25-.266.25zm2.325 6.443c-.584 0-1.009-.394-1.009-.927 0-.552.425-.94 1.01-.94.609 0 1.028.388 1.028.94 0 .533-.42.927-1.029.927" />
                </svg>
                Pending File
                <span class="absolute top-0 right-0 translate-x-1/2 -translate-y-1/2 flex h-4 w-4">
                    <span
                        class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-4 w-4 bg-red-500"></span>
                </span>
            </div>
        </div>
    @endif

    @if ($iReapChecklists->byLaws)
        <div>
            <label for="byLaws" class="dark:text-green-600 text-sm md:text-base">By Laws</label>
            <a class="flex items-center gap-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-green-500 dark:bg-lime-500 hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 px-3 py-2 w-fit mt-1"
                href="{{ asset($iReapChecklists->byLaws) }}" target="_blank">
                <img src="/images/file-earmark-text.svg" alt="Save" width="22" height="22">View File</a>
        </div>
    @else
        <div>
            <label for="byLaws" class="dark:text-green-600 text-sm md:text-base">By Laws</label>
            <div
                class="relative flex items-center gap-2 text-md rounded-md border font-bold bg-red-600 text-white dark:bg-red-800 border-red-400 px-2 py-2 mt-2 w-fit">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                    class="bi bi-question-diamond-fill" viewBox="0 0 16 16">
                    <path
                        d="M9.05.435c-.58-.58-1.52-.58-2.1 0L.436 6.95c-.58.58-.58 1.519 0 2.098l6.516 6.516c.58.58 1.519.58 2.098 0l6.516-6.516c.58-.58.58-1.519 0-2.098zM5.495 6.033a.237.237 0 0 1-.24-.247C5.35 4.091 6.737 3.5 8.005 3.5c1.396 0 2.672.73 2.672 2.24 0 1.08-.635 1.594-1.244 2.057-.737.559-1.01.768-1.01 1.486v.105a.25.25 0 0 1-.25.25h-.81a.25.25 0 0 1-.25-.246l-.004-.217c-.038-.927.495-1.498 1.168-1.987.59-.444.965-.736.965-1.371 0-.825-.628-1.168-1.314-1.168-.803 0-1.253.478-1.342 1.134-.018.137-.128.25-.266.25zm2.325 6.443c-.584 0-1.009-.394-1.009-.927 0-.552.425-.94 1.01-.94.609 0 1.028.388 1.028.94 0 .533-.42.927-1.029.927" />
                </svg>
                Pending File
                <span class="absolute top-0 right-0 translate-x-1/2 -translate-y-1/2 flex h-4 w-4">
                    <span
                        class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-4 w-4 bg-red-500"></span>
                </span>
            </div>
        </div>
    @endif

    @if ($iReapChecklists->certificateOfRegistration)
        <div>
            <label for="certificateOfRegistration" class="dark:text-green-600 text-sm md:text-base">Certificate of
                Registration</label>
            <a class="flex items-center gap-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-green-500 dark:bg-lime-500 hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 px-3 py-2 w-fit mt-1"
                href="{{ asset($iReapChecklists->certificateOfRegistration) }}" target="_blank">
                <img src="/images/file-earmark-text.svg" alt="Save" width="22" height="22">View File</a>
        </div>
    @else
        <div>
            <label for="certificateOfRegistration" class="dark:text-green-600 text-sm md:text-base">Certificate of
                Registration</label>
            <div
                class="relative flex items-center gap-2 text-md rounded-md border font-bold bg-red-600 text-white dark:bg-red-800 border-red-400 px-2 py-2 mt-2 w-fit">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                    class="bi bi-question-diamond-fill" viewBox="0 0 16 16">
                    <path
                        d="M9.05.435c-.58-.58-1.52-.58-2.1 0L.436 6.95c-.58.58-.58 1.519 0 2.098l6.516 6.516c.58.58 1.519.58 2.098 0l6.516-6.516c.58-.58.58-1.519 0-2.098zM5.495 6.033a.237.237 0 0 1-.24-.247C5.35 4.091 6.737 3.5 8.005 3.5c1.396 0 2.672.73 2.672 2.24 0 1.08-.635 1.594-1.244 2.057-.737.559-1.01.768-1.01 1.486v.105a.25.25 0 0 1-.25.25h-.81a.25.25 0 0 1-.25-.246l-.004-.217c-.038-.927.495-1.498 1.168-1.987.59-.444.965-.736.965-1.371 0-.825-.628-1.168-1.314-1.168-.803 0-1.253.478-1.342 1.134-.018.137-.128.25-.266.25zm2.325 6.443c-.584 0-1.009-.394-1.009-.927 0-.552.425-.94 1.01-.94.609 0 1.028.388 1.028.94 0 .533-.42.927-1.029.927" />
                </svg>
                Pending File
                <span class="absolute top-0 right-0 translate-x-1/2 -translate-y-1/2 flex h-4 w-4">
                    <span
                        class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-4 w-4 bg-red-500"></span>
                </span>
            </div>
        </div>
    @endif

    @if ($iReapChecklists->certificateRegistry)
        <div>
            <label for="certificateRegistry" class="dark:text-green-600 text-sm md:text-base">Certificate from DA on its
                registration to the FFEDIS Registry</label>
            <a class="flex items-center gap-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-green-500 dark:bg-lime-500 hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 px-3 py-2 w-fit mt-1"
                href="{{ asset($iReapChecklists->certificateRegistry) }}" target="_blank">
                <img src="/images/file-earmark-text.svg" alt="Save" width="22" height="22">View File</a>
        </div>
    @else
        <div>
            <label for="certificateRegistry" class="dark:text-green-600 text-sm md:text-base">Certificate from DA on
                its
                registration to the FFEDIS Registry</label>
            <div
                class="relative flex items-center gap-2 text-md rounded-md border font-bold bg-red-600 text-white dark:bg-red-800 border-red-400 px-2 py-2 mt-2 w-fit">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                    class="bi bi-question-diamond-fill" viewBox="0 0 16 16">
                    <path
                        d="M9.05.435c-.58-.58-1.52-.58-2.1 0L.436 6.95c-.58.58-.58 1.519 0 2.098l6.516 6.516c.58.58 1.519.58 2.098 0l6.516-6.516c.58-.58.58-1.519 0-2.098zM5.495 6.033a.237.237 0 0 1-.24-.247C5.35 4.091 6.737 3.5 8.005 3.5c1.396 0 2.672.73 2.672 2.24 0 1.08-.635 1.594-1.244 2.057-.737.559-1.01.768-1.01 1.486v.105a.25.25 0 0 1-.25.25h-.81a.25.25 0 0 1-.25-.246l-.004-.217c-.038-.927.495-1.498 1.168-1.987.59-.444.965-.736.965-1.371 0-.825-.628-1.168-1.314-1.168-.803 0-1.253.478-1.342 1.134-.018.137-.128.25-.266.25zm2.325 6.443c-.584 0-1.009-.394-1.009-.927 0-.552.425-.94 1.01-.94.609 0 1.028.388 1.028.94 0 .533-.42.927-1.029.927" />
                </svg>
                Pending File
                <span class="absolute top-0 right-0 translate-x-1/2 -translate-y-1/2 flex h-4 w-4">
                    <span
                        class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-4 w-4 bg-red-500"></span>
                </span>
            </div>
        </div>
    @endif
</div>

@if ($iReapChecklists->certificates)
    <div class="mt-2 mb-4">
        <label for="certificates" class="dark:text-green-600 text-sm md:text-base">Certificate
            of
            Compliance for CDA registered/Certificate of Derogatory Record for SEC
            Registered/Certificate of Good Standing for DOLE registered</label>
        <a class="flex items-center gap-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-green-500 dark:bg-lime-500 hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 px-3 py-2 w-fit mt-1"
            href="{{ asset($iReapChecklists->certificates) }}" target="_blank">
            <img src="/images/file-earmark-text.svg" alt="Save" width="22" height="22">View File</a>
    </div>
@else
    <div class="mt-2 mb-4">
        <label for="certificates" class="dark:text-green-600 text-sm md:text-base">Certificate
            of
            Compliance for CDA registered/Certificate of Derogatory Record for SEC
            Registered/Certificate of Good Standing for DOLE registered</label>
        <div
            class="relative flex items-center gap-2 text-md rounded-md border font-bold bg-red-600 text-white dark:bg-red-800 border-red-400 px-2 py-2 mt-2 w-fit">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                class="bi bi-question-diamond-fill" viewBox="0 0 16 16">
                <path
                    d="M9.05.435c-.58-.58-1.52-.58-2.1 0L.436 6.95c-.58.58-.58 1.519 0 2.098l6.516 6.516c.58.58 1.519.58 2.098 0l6.516-6.516c.58-.58.58-1.519 0-2.098zM5.495 6.033a.237.237 0 0 1-.24-.247C5.35 4.091 6.737 3.5 8.005 3.5c1.396 0 2.672.73 2.672 2.24 0 1.08-.635 1.594-1.244 2.057-.737.559-1.01.768-1.01 1.486v.105a.25.25 0 0 1-.25.25h-.81a.25.25 0 0 1-.25-.246l-.004-.217c-.038-.927.495-1.498 1.168-1.987.59-.444.965-.736.965-1.371 0-.825-.628-1.168-1.314-1.168-.803 0-1.253.478-1.342 1.134-.018.137-.128.25-.266.25zm2.325 6.443c-.584 0-1.009-.394-1.009-.927 0-.552.425-.94 1.01-.94.609 0 1.028.388 1.028.94 0 .533-.42.927-1.029.927" />
            </svg>
            Pending File
            <span class="absolute top-0 right-0 translate-x-1/2 -translate-y-1/2 flex h-4 w-4">
                <span
                    class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                <span class="relative inline-flex rounded-full h-4 w-4 bg-red-500"></span>
            </span>
        </div>
    </div>
@endif

<label for="organizationalCapability" class="dark:text-lime-500 text-black text-sm md:text-lg">Organizational
    Capability</label>
<hr class="border-2 dark:border-lime-500 border-green-500 mb-2">

<div class="grid grid-cols-1 md:grid-cols-2 gap-2 mb-4">

    @if ($iReapChecklists->accomplishmentReports)
        <div x-data="{ showModal: false }" class="mt-2 mb-4">
            <label for="accomplishmentReports" class="dark:text-green-600 text-sm md:text-base">Accomplishment
                Reports</label>

            <!-- View File Button -->
            <button @click="showModal = true"
                class="flex items-center gap-2 px-4 py-2 bg-green-500 dark:bg-lime-500 text-white text-sm font-medium rounded-md hover:bg-green-600 dark:hover:bg-lime-600 transition ease-in-out duration-150">
                <img src="/images/file-earmark-text.svg" alt="View Files" width="22" height="22">
                View Files
            </button>

            <!-- Modal -->
            <div x-show="showModal"
                class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50">
                <div class="bg-white dark:bg-gray-800 rounded-lg p-6 w-3/4">
                    <h2 class="text-lg font-medium mb-4">Accomplishment Reports</h2>

                    <!-- List of Files -->
                    <div>
                        @php
                            // Decode JSON to display all files
                            $accomplishmentReports = json_decode($iReapChecklists->accomplishmentReports, true);
                        @endphp

                        @if ($accomplishmentReports)
                            <ul class="list-disc pl-6 mb-4">
                                @foreach ($accomplishmentReports as $report)
                                    <li>
                                        <a href="{{ asset($report) }}" target="_blank"
                                            class="text-blue-600 hover:underline">
                                            {{ basename($report) }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p class="text-gray-500">No accomplishment reports uploaded yet.</p>
                        @endif
                    </div>

                    <!-- Close Modal Button -->
                    <button @click="showModal = false"
                        class="mt-6 px-4 py-2 text-sm font-medium rounded-md text-white bg-red-500 hover:bg-red-600 transition ease-in-out duration-150">
                        Close
                    </button>
                </div>
            </div>
        </div>
    @else
        <div>
            <label for="accomplishmentReports" class="dark:text-green-600 text-sm md:text-base">Accomplishment
                Reports</label>
            <div
                class="relative flex items-center gap-2 text-md rounded-md border font-bold bg-red-600 text-white dark:bg-red-800 border-red-400 px-2 py-2 mt-2 w-fit">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                    class="bi bi-question-diamond-fill" viewBox="0 0 16 16">
                    <path
                        d="M9.05.435c-.58-.58-1.52-.58-2.1 0L.436 6.95c-.58.58-.58 1.519 0 2.098l6.516 6.516c.58.58 1.519.58 2.098 0l6.516-6.516c.58-.58.58-1.519 0-2.098zM5.495 6.033a.237.237 0 0 1-.24-.247C5.35 4.091 6.737 3.5 8.005 3.5c1.396 0 2.672.73 2.672 2.24 0 1.08-.635 1.594-1.244 2.057-.737.559-1.01.768-1.01 1.486v.105a.25.25 0 0 1-.25.25h-.81a.25.25 0 0 1-.25-.246l-.004-.217c-.038-.927.495-1.498 1.168-1.987.59-.444.965-.736.965-1.371 0-.825-.628-1.168-1.314-1.168-.803 0-1.253.478-1.342 1.134-.018.137-.128.25-.266.25zm2.325 6.443c-.584 0-1.009-.394-1.009-.927 0-.552.425-.94 1.01-.94.609 0 1.028.388 1.028.94 0 .533-.42.927-1.029.927" />
                </svg>
                Pending File
                <span class="absolute top-0 right-0 translate-x-1/2 -translate-y-1/2 flex h-4 w-4">
                    <span
                        class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-4 w-4 bg-red-500"></span>
                </span>
            </div>
        </div>
    @endif

    @if ($iReapChecklists->photographs)
        <div x-data="{ showModal: false }" class="mt-2 mb-4">
            <label for="photographs" class="dark:text-green-600 text-sm md:text-base">Photographs of agri-fishery or
                related
                projects undertaken for at least one year</label>

            <!-- View File Button -->
            <button @click="showModal = true"
                class="flex items-center gap-2 px-4 py-2 bg-green-500 dark:bg-lime-500 text-white text-sm font-medium rounded-md hover:bg-green-600 dark:hover:bg-lime-600 transition ease-in-out duration-150">
                <img src="/images/file-earmark-text.svg" alt="View Files" width="22" height="22">
                View Files
            </button>

            <!-- Modal -->
            <div x-show="showModal"
                class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50">
                <div class="bg-white dark:bg-gray-800 rounded-lg p-6 w-3/4">
                    <h2 class="text-lg font-medium mb-4">Photographs of agri-fishery or related
                        projects undertaken for at least one year</h2>

                    <!-- List of Files -->
                    <div>
                        @php
                            // Decode JSON to display all files
                            $photographs = json_decode($iReapChecklists->photographs, true);
                        @endphp

                        @if ($photographs)
                            <ul class="list-disc pl-6 mb-4">
                                @foreach ($photographs as $report)
                                    <li>
                                        <a href="{{ asset($report) }}" target="_blank"
                                            class="text-blue-600 hover:underline">
                                            {{ basename($report) }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p class="text-gray-500">No photographs uploaded yet.</p>
                        @endif
                    </div>

                    <!-- Close Modal Button -->
                    <button @click="showModal = false"
                        class="mt-6 px-4 py-2 text-sm font-medium rounded-md text-white bg-red-500 hover:bg-red-600 transition ease-in-out duration-150">
                        Close
                    </button>
                </div>
            </div>
        </div>
    @else
        <div>
            <label for="photographs" class="dark:text-green-600 text-sm md:text-base">Photographs of agri-fishery or
                related
                projects undertaken for at least one year</label>
            <div
                class="relative flex items-center gap-2 text-md rounded-md border font-bold bg-red-600 text-white dark:bg-red-800 border-red-400 px-2 py-2 mt-2 w-fit">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                    class="bi bi-question-diamond-fill" viewBox="0 0 16 16">
                    <path
                        d="M9.05.435c-.58-.58-1.52-.58-2.1 0L.436 6.95c-.58.58-.58 1.519 0 2.098l6.516 6.516c.58.58 1.519.58 2.098 0l6.516-6.516c.58-.58.58-1.519 0-2.098zM5.495 6.033a.237.237 0 0 1-.24-.247C5.35 4.091 6.737 3.5 8.005 3.5c1.396 0 2.672.73 2.672 2.24 0 1.08-.635 1.594-1.244 2.057-.737.559-1.01.768-1.01 1.486v.105a.25.25 0 0 1-.25.25h-.81a.25.25 0 0 1-.25-.246l-.004-.217c-.038-.927.495-1.498 1.168-1.987.59-.444.965-.736.965-1.371 0-.825-.628-1.168-1.314-1.168-.803 0-1.253.478-1.342 1.134-.018.137-.128.25-.266.25zm2.325 6.443c-.584 0-1.009-.394-1.009-.927 0-.552.425-.94 1.01-.94.609 0 1.028.388 1.028.94 0 .533-.42.927-1.029.927" />
                </svg>
                Pending File
                <span class="absolute top-0 right-0 translate-x-1/2 -translate-y-1/2 flex h-4 w-4">
                    <span
                        class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-4 w-4 bg-red-500"></span>
                </span>
            </div>
        </div>
    @endif

    @if ($iReapChecklists->existingOrganizationalStructure)
        <div>
            <label for="existingOrganizationalStructure" class="dark:text-green-600 text-sm md:text-base">Existing
                Organizational Structure</label>
            <a class="flex items-center gap-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-green-500 dark:bg-lime-500 hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 px-3 py-2 w-fit mt-1"
                href="{{ asset($iReapChecklists->existingOrganizationalStructure) }}" target="_blank">
                <img src="/images/file-earmark-text.svg" alt="Save" width="22" height="22">View File</a>
        </div>
    @else
        <div>
            <label for="existingOrganizationalStructure" class="dark:text-green-600 text-sm md:text-base">Existing
                Organizational Structure</label>
            <div
                class="relative flex items-center gap-2 text-md rounded-md border font-bold bg-red-600 text-white dark:bg-red-800 border-red-400 px-2 py-2 mt-2 w-fit">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                    class="bi bi-question-diamond-fill" viewBox="0 0 16 16">
                    <path
                        d="M9.05.435c-.58-.58-1.52-.58-2.1 0L.436 6.95c-.58.58-.58 1.519 0 2.098l6.516 6.516c.58.58 1.519.58 2.098 0l6.516-6.516c.58-.58.58-1.519 0-2.098zM5.495 6.033a.237.237 0 0 1-.24-.247C5.35 4.091 6.737 3.5 8.005 3.5c1.396 0 2.672.73 2.672 2.24 0 1.08-.635 1.594-1.244 2.057-.737.559-1.01.768-1.01 1.486v.105a.25.25 0 0 1-.25.25h-.81a.25.25 0 0 1-.25-.246l-.004-.217c-.038-.927.495-1.498 1.168-1.987.59-.444.965-.736.965-1.371 0-.825-.628-1.168-1.314-1.168-.803 0-1.253.478-1.342 1.134-.018.137-.128.25-.266.25zm2.325 6.443c-.584 0-1.009-.394-1.009-.927 0-.552.425-.94 1.01-.94.609 0 1.028.388 1.028.94 0 .533-.42.927-1.029.927" />
                </svg>
                Pending File
                <span class="absolute top-0 right-0 translate-x-1/2 -translate-y-1/2 flex h-4 w-4">
                    <span
                        class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-4 w-4 bg-red-500"></span>
                </span>
            </div>
        </div>
    @endif

    @if ($iReapChecklists->secretaryCertificate)
        <div>
            <label for="secretaryCertificate" class="dark:text-green-600 text-sm md:text-base">Secretary's
                Certificate of
                Incumbent Officers</label>
            <a class="flex items-center gap-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-green-500 dark:bg-lime-500 hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 px-3 py-2 w-fit mt-1"
                href="{{ asset($iReapChecklists->secretaryCertificate) }}" target="_blank">
                <img src="/images/file-earmark-text.svg" alt="Save" width="22" height="22">View File</a>
        </div>
    @else
        <div>
            <label for="secretaryCertificate" class="dark:text-green-600 text-sm md:text-base">Secretary's
                Certificate of
                Incumbent Officers</label>
            <div
                class="relative flex items-center gap-2 text-md rounded-md border font-bold bg-red-600 text-white dark:bg-red-800 border-red-400 px-2 py-2 mt-2 w-fit">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                    class="bi bi-question-diamond-fill" viewBox="0 0 16 16">
                    <path
                        d="M9.05.435c-.58-.58-1.52-.58-2.1 0L.436 6.95c-.58.58-.58 1.519 0 2.098l6.516 6.516c.58.58 1.519.58 2.098 0l6.516-6.516c.58-.58.58-1.519 0-2.098zM5.495 6.033a.237.237 0 0 1-.24-.247C5.35 4.091 6.737 3.5 8.005 3.5c1.396 0 2.672.73 2.672 2.24 0 1.08-.635 1.594-1.244 2.057-.737.559-1.01.768-1.01 1.486v.105a.25.25 0 0 1-.25.25h-.81a.25.25 0 0 1-.25-.246l-.004-.217c-.038-.927.495-1.498 1.168-1.987.59-.444.965-.736.965-1.371 0-.825-.628-1.168-1.314-1.168-.803 0-1.253.478-1.342 1.134-.018.137-.128.25-.266.25zm2.325 6.443c-.584 0-1.009-.394-1.009-.927 0-.552.425-.94 1.01-.94.609 0 1.028.388 1.028.94 0 .533-.42.927-1.029.927" />
                </svg>
                Pending File
                <span class="absolute top-0 right-0 translate-x-1/2 -translate-y-1/2 flex h-4 w-4">
                    <span
                        class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-4 w-4 bg-red-500"></span>
                </span>
            </div>
        </div>
    @endif

    @if ($iReapChecklists->fcaMembersProfile)
        <div x-data="{ showModal: false }" class="mt-2 mb-4">
            <label for="fcaMembersProfile" class="dark:text-green-600 text-sm md:text-base">FCA/FCA Cluster Profile &
                Members'
                Profile</label>

            <!-- View File Button -->
            <button @click="showModal = true"
                class="flex items-center gap-2 px-4 py-2 bg-green-500 dark:bg-lime-500 text-white text-sm font-medium rounded-md hover:bg-green-600 dark:hover:bg-lime-600 transition ease-in-out duration-150">
                <img src="/images/file-earmark-text.svg" alt="View Files" width="22" height="22">
                View Files
            </button>

            <!-- Modal -->
            <div x-show="showModal"
                class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50">
                <div class="bg-white dark:bg-gray-800 rounded-lg p-6 w-3/4">
                    <h2 class="text-lg font-medium mb-4">FCA/FCA Cluster Profile & Members'
                        Profile</h2>

                    <!-- List of Files -->
                    <div>
                        @php
                            // Decode JSON to display all files
                            $fcaMembersProfile = json_decode($iReapChecklists->fcaMembersProfile, true);
                        @endphp

                        @if ($fcaMembersProfile)
                            <ul class="list-disc pl-6 mb-4">
                                @foreach ($fcaMembersProfile as $report)
                                    <li>
                                        <a href="{{ asset($report) }}" target="_blank"
                                            class="text-blue-600 hover:underline">
                                            {{ basename($report) }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p class="text-gray-500">No fcaMembersProfile uploaded yet.</p>
                        @endif
                    </div>

                    <!-- Close Modal Button -->
                    <button @click="showModal = false"
                        class="mt-6 px-4 py-2 text-sm font-medium rounded-md text-white bg-red-500 hover:bg-red-600 transition ease-in-out duration-150">
                        Close
                    </button>
                </div>
            </div>
        </div>
    @else
        <div>
            <label for="fcaMembersProfile" class="dark:text-green-600 text-sm md:text-base">FCA/FCA Cluster Profile &
                Members'
                Profile</label>
            <div
                class="relative flex items-center gap-2 text-md rounded-md border font-bold bg-red-600 text-white dark:bg-red-800 border-red-400 px-2 py-2 mt-2 w-fit">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                    class="bi bi-question-diamond-fill" viewBox="0 0 16 16">
                    <path
                        d="M9.05.435c-.58-.58-1.52-.58-2.1 0L.436 6.95c-.58.58-.58 1.519 0 2.098l6.516 6.516c.58.58 1.519.58 2.098 0l6.516-6.516c.58-.58.58-1.519 0-2.098zM5.495 6.033a.237.237 0 0 1-.24-.247C5.35 4.091 6.737 3.5 8.005 3.5c1.396 0 2.672.73 2.672 2.24 0 1.08-.635 1.594-1.244 2.057-.737.559-1.01.768-1.01 1.486v.105a.25.25 0 0 1-.25.25h-.81a.25.25 0 0 1-.25-.246l-.004-.217c-.038-.927.495-1.498 1.168-1.987.59-.444.965-.736.965-1.371 0-.825-.628-1.168-1.314-1.168-.803 0-1.253.478-1.342 1.134-.018.137-.128.25-.266.25zm2.325 6.443c-.584 0-1.009-.394-1.009-.927 0-.552.425-.94 1.01-.94.609 0 1.028.388 1.028.94 0 .533-.42.927-1.029.927" />
                </svg>
                Pending File
                <span class="absolute top-0 right-0 translate-x-1/2 -translate-y-1/2 flex h-4 w-4">
                    <span
                        class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-4 w-4 bg-red-500"></span>
                </span>
            </div>
        </div>
    @endif
</div>

<label for="financialCapability" class="dark:text-lime-500 text-black text-sm md:text-lg">Financial Capability</label>
<hr class="border-2 dark:border-lime-500 border-green-500 mb-2">

<div class="grid grid-cols-1 md:grid-cols-2 gap-2 mt-2 mb-4">

    @if ($iReapChecklists->photocopyReceipt)
        <div>
            <label for="photocopyReceipt" class="dark:text-green-600 text-sm md:text-base">Photocopy of Official
                Receipt(OR)</label>
            <a class="flex items-center gap-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-green-500 dark:bg-lime-500 hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 px-3 py-2 w-fit mt-1"
                href="{{ asset($iReapChecklists->photocopyReceipt) }}" target="_blank">
                <img src="/images/file-earmark-text.svg" alt="Save" width="22" height="22">View File</a>
        </div>
    @else
        <div>
            <label for="photocopyReceipt" class="dark:text-green-600 text-sm md:text-base">Photocopy of Official
                Receipt(OR)</label>
            <div
                class="relative flex items-center gap-2 text-md rounded-md border font-bold bg-red-600 text-white dark:bg-red-800 border-red-400 px-2 py-2 mt-2 w-fit">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                    class="bi bi-question-diamond-fill" viewBox="0 0 16 16">
                    <path
                        d="M9.05.435c-.58-.58-1.52-.58-2.1 0L.436 6.95c-.58.58-.58 1.519 0 2.098l6.516 6.516c.58.58 1.519.58 2.098 0l6.516-6.516c.58-.58.58-1.519 0-2.098zM5.495 6.033a.237.237 0 0 1-.24-.247C5.35 4.091 6.737 3.5 8.005 3.5c1.396 0 2.672.73 2.672 2.24 0 1.08-.635 1.594-1.244 2.057-.737.559-1.01.768-1.01 1.486v.105a.25.25 0 0 1-.25.25h-.81a.25.25 0 0 1-.25-.246l-.004-.217c-.038-.927.495-1.498 1.168-1.987.59-.444.965-.736.965-1.371 0-.825-.628-1.168-1.314-1.168-.803 0-1.253.478-1.342 1.134-.018.137-.128.25-.266.25zm2.325 6.443c-.584 0-1.009-.394-1.009-.927 0-.552.425-.94 1.01-.94.609 0 1.028.388 1.028.94 0 .533-.42.927-1.029.927" />
                </svg>
                Pending File
                <span class="absolute top-0 right-0 translate-x-1/2 -translate-y-1/2 flex h-4 w-4">
                    <span
                        class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-4 w-4 bg-red-500"></span>
                </span>
            </div>
        </div>
    @endif

    @if ($iReapChecklists->latestFinancialReport)
        <div>
            <label for="latestFinancialReport" class="dark:text-green-600 text-sm md:text-base">Latest Audited
                Financial
                Report
                for the past year</label>
            <a class="flex items-center gap-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-green-500 dark:bg-lime-500 hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 px-3 py-2 w-fit mt-1"
                href="{{ asset($iReapChecklists->latestFinancialReport) }}" target="_blank">
                <img src="/images/file-earmark-text.svg" alt="Save" width="22" height="22">View File</a>
        </div>
    @else
        <div>
            <label for="latestFinancialReport" class="dark:text-green-600 text-sm md:text-base">Latest Audited
                Financial
                Report
                for the past year</label>
            <div
                class="relative flex items-center gap-2 text-md rounded-md border font-bold bg-red-600 text-white dark:bg-red-800 border-red-400 px-2 py-2 mt-2 w-fit">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                    class="bi bi-question-diamond-fill" viewBox="0 0 16 16">
                    <path
                        d="M9.05.435c-.58-.58-1.52-.58-2.1 0L.436 6.95c-.58.58-.58 1.519 0 2.098l6.516 6.516c.58.58 1.519.58 2.098 0l6.516-6.516c.58-.58.58-1.519 0-2.098zM5.495 6.033a.237.237 0 0 1-.24-.247C5.35 4.091 6.737 3.5 8.005 3.5c1.396 0 2.672.73 2.672 2.24 0 1.08-.635 1.594-1.244 2.057-.737.559-1.01.768-1.01 1.486v.105a.25.25 0 0 1-.25.25h-.81a.25.25 0 0 1-.25-.246l-.004-.217c-.038-.927.495-1.498 1.168-1.987.59-.444.965-.736.965-1.371 0-.825-.628-1.168-1.314-1.168-.803 0-1.253.478-1.342 1.134-.018.137-.128.25-.266.25zm2.325 6.443c-.584 0-1.009-.394-1.009-.927 0-.552.425-.94 1.01-.94.609 0 1.028.388 1.028.94 0 .533-.42.927-1.029.927" />
                </svg>
                Pending File
                <span class="absolute top-0 right-0 translate-x-1/2 -translate-y-1/2 flex h-4 w-4">
                    <span
                        class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-4 w-4 bg-red-500"></span>
                </span>
            </div>
        </div>
    @endif
</div>

<label for="affidavitDisclosure" class="dark:text-lime-500 text-black text-sm md:text-lg">Affidavit of
    Disclosure</label>
<hr class="border-2 dark:border-lime-500 border-green-500 mb-2">

<div class="grid grid-cols-1 md:grid-cols-2 gap-2 mt-2 mb-4">

    @if ($iReapChecklists->swornAffidavit)
        <div>
            <label for="swornAffidavit" class="dark:text-green-600 text-sm md:text-base">Sworn Affidavit of the
                Secretary
                of
                the NGO/PO</label>
            <a class="flex items-center gap-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-green-500 dark:bg-lime-500 hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 px-3 py-2 w-fit mt-1"
                href="{{ asset($iReapChecklists->swornAffidavit) }}" target="_blank">
                <img src="/images/file-earmark-text.svg" alt="Save" width="22" height="22">View File</a>
        </div>
    @else
        <div>
            <label for="swornAffidavit" class="dark:text-green-600 text-sm md:text-base">Sworn Affidavit of the
                Secretary
                of
                the NGO/PO</label>
            <div
                class="relative flex items-center gap-2 text-md rounded-md border font-bold bg-red-600 text-white dark:bg-red-800 border-red-400 px-2 py-2 mt-2 w-fit">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                    class="bi bi-question-diamond-fill" viewBox="0 0 16 16">
                    <path
                        d="M9.05.435c-.58-.58-1.52-.58-2.1 0L.436 6.95c-.58.58-.58 1.519 0 2.098l6.516 6.516c.58.58 1.519.58 2.098 0l6.516-6.516c.58-.58.58-1.519 0-2.098zM5.495 6.033a.237.237 0 0 1-.24-.247C5.35 4.091 6.737 3.5 8.005 3.5c1.396 0 2.672.73 2.672 2.24 0 1.08-.635 1.594-1.244 2.057-.737.559-1.01.768-1.01 1.486v.105a.25.25 0 0 1-.25.25h-.81a.25.25 0 0 1-.25-.246l-.004-.217c-.038-.927.495-1.498 1.168-1.987.59-.444.965-.736.965-1.371 0-.825-.628-1.168-1.314-1.168-.803 0-1.253.478-1.342 1.134-.018.137-.128.25-.266.25zm2.325 6.443c-.584 0-1.009-.394-1.009-.927 0-.552.425-.94 1.01-.94.609 0 1.028.388 1.028.94 0 .533-.42.927-1.029.927" />
                </svg>
                Pending File
                <span class="absolute top-0 right-0 translate-x-1/2 -translate-y-1/2 flex h-4 w-4">
                    <span
                        class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-4 w-4 bg-red-500"></span>
                </span>
            </div>
        </div>
    @endif

    @if ($iReapChecklists->moa)
        <div>
            <label for="moa" class="dark:text-green-600 text-sm md:text-base">MOA</label>
            <a class="flex items-center gap-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-green-500 dark:bg-lime-500 hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 px-3 py-2 w-fit mt-1"
                href="{{ asset($iReapChecklists->moa) }}" target="_blank">
                <img src="/images/file-earmark-text.svg" alt="Save" width="22" height="22">View File</a>
        </div>
    @else
        <div>
            <label for="moa" class="dark:text-green-600 text-sm md:text-base">MOA</label>
            <div
                class="relative flex items-center gap-2 text-md rounded-md border font-bold bg-red-600 text-white dark:bg-red-800 border-red-400 px-2 py-2 mt-2 w-fit">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                    class="bi bi-question-diamond-fill" viewBox="0 0 16 16">
                    <path
                        d="M9.05.435c-.58-.58-1.52-.58-2.1 0L.436 6.95c-.58.58-.58 1.519 0 2.098l6.516 6.516c.58.58 1.519.58 2.098 0l6.516-6.516c.58-.58.58-1.519 0-2.098zM5.495 6.033a.237.237 0 0 1-.24-.247C5.35 4.091 6.737 3.5 8.005 3.5c1.396 0 2.672.73 2.672 2.24 0 1.08-.635 1.594-1.244 2.057-.737.559-1.01.768-1.01 1.486v.105a.25.25 0 0 1-.25.25h-.81a.25.25 0 0 1-.25-.246l-.004-.217c-.038-.927.495-1.498 1.168-1.987.59-.444.965-.736.965-1.371 0-.825-.628-1.168-1.314-1.168-.803 0-1.253.478-1.342 1.134-.018.137-.128.25-.266.25zm2.325 6.443c-.584 0-1.009-.394-1.009-.927 0-.552.425-.94 1.01-.94.609 0 1.028.388 1.028.94 0 .533-.42.927-1.029.927" />
                </svg>
                Pending File
                <span class="absolute top-0 right-0 translate-x-1/2 -translate-y-1/2 flex h-4 w-4">
                    <span
                        class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-4 w-4 bg-red-500"></span>
                </span>
            </div>
        </div>
    @endif

    @if ($iReapChecklists->releaseOfFunds)
        <div>
            <label for="releaseOfFunds" class="dark:text-green-600 text-sm md:text-base">Release of Funds Sworn
                Affidavit
                of the
                Secretary of the NGO/PO</label>
            <a class="flex items-center gap-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-green-500 dark:bg-lime-500 hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 px-3 py-2 w-fit mt-1"
                href="{{ asset($iReapChecklists->releaseOfFunds) }}" target="_blank">
                <img src="/images/file-earmark-text.svg" alt="Save" width="22" height="22">View File</a>
        </div>
    @else
        <div>
            <label for="releaseOfFunds" class="dark:text-green-600 text-sm md:text-base">Release of Funds Sworn
                Affidavit
                of the
                Secretary of the NGO/PO</label>
            <div
                class="relative flex items-center gap-2 text-md rounded-md border font-bold bg-red-600 text-white dark:bg-red-800 border-red-400 px-2 py-2 mt-2 w-fit">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                    class="bi bi-question-diamond-fill" viewBox="0 0 16 16">
                    <path
                        d="M9.05.435c-.58-.58-1.52-.58-2.1 0L.436 6.95c-.58.58-.58 1.519 0 2.098l6.516 6.516c.58.58 1.519.58 2.098 0l6.516-6.516c.58-.58.58-1.519 0-2.098zM5.495 6.033a.237.237 0 0 1-.24-.247C5.35 4.091 6.737 3.5 8.005 3.5c1.396 0 2.672.73 2.672 2.24 0 1.08-.635 1.594-1.244 2.057-.737.559-1.01.768-1.01 1.486v.105a.25.25 0 0 1-.25.25h-.81a.25.25 0 0 1-.25-.246l-.004-.217c-.038-.927.495-1.498 1.168-1.987.59-.444.965-.736.965-1.371 0-.825-.628-1.168-1.314-1.168-.803 0-1.253.478-1.342 1.134-.018.137-.128.25-.266.25zm2.325 6.443c-.584 0-1.009-.394-1.009-.927 0-.552.425-.94 1.01-.94.609 0 1.028.388 1.028.94 0 .533-.42.927-1.029.927" />
                </svg>
                Pending File
                <span class="absolute top-0 right-0 translate-x-1/2 -translate-y-1/2 flex h-4 w-4">
                    <span
                        class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-4 w-4 bg-red-500"></span>
                </span>
            </div>
        </div>
    @endif

</div>

<label for="valueChainEngagement" class="dark:text-lime-500 text-black text-sm md:text-lg">Value
    Chain Engagement</label>
<hr class="border-2 dark:border-lime-500 border-green-500 mb-4">

@if ($iReapChecklists->priorityCommodity)
    <label for="priorityCommodity" class="dark:text-green-600 text-black text-sm md:text-base">Must
        be engaged in the priority commodity value chain</label>
    <div class="flex items-center gap-2">
        @foreach (['Yes', 'No'] as $option)
            <div class="flex items-center gap-2">
                <input class="dark:bg-gray-800" type="radio" name="priorityCommodity" value="{{ $option }}"
                    id="vca{{ $option }}"
                    {{ isset($iReapChecklists->priorityCommodity) && $iReapChecklists->priorityCommodity === $option ? 'checked' : '' }}
                    disabled>
                <label for="vca{{ $option }}">{{ $option }}</label>
            </div>
        @endforeach
    </div>
@else
    <div>
        <label for="accessibility" class="dark:text-green-600 text-sm md:text-base">Must
            be engaged in the priority commodity value chain</label>
        <div
            class="relative flex items-center gap-2 text-md rounded-md border font-bold bg-red-600 text-white dark:bg-red-800 border-red-400 px-2 py-2 mt-2 w-fit">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                class="bi bi-question-diamond-fill" viewBox="0 0 16 16">
                <path
                    d="M9.05.435c-.58-.58-1.52-.58-2.1 0L.436 6.95c-.58.58-.58 1.519 0 2.098l6.516 6.516c.58.58 1.519.58 2.098 0l6.516-6.516c.58-.58.58-1.519 0-2.098zM5.495 6.033a.237.237 0 0 1-.24-.247C5.35 4.091 6.737 3.5 8.005 3.5c1.396 0 2.672.73 2.672 2.24 0 1.08-.635 1.594-1.244 2.057-.737.559-1.01.768-1.01 1.486v.105a.25.25 0 0 1-.25.25h-.81a.25.25 0 0 1-.25-.246l-.004-.217c-.038-.927.495-1.498 1.168-1.987.59-.444.965-.736.965-1.371 0-.825-.628-1.168-1.314-1.168-.803 0-1.253.478-1.342 1.134-.018.137-.128.25-.266.25zm2.325 6.443c-.584 0-1.009-.394-1.009-.927 0-.552.425-.94 1.01-.94.609 0 1.028.388 1.028.94 0 .533-.42.927-1.029.927" />
            </svg>
            Pending
            <span class="absolute top-0 right-0 translate-x-1/2 -translate-y-1/2 flex h-4 w-4">
                <span
                    class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                <span class="relative inline-flex rounded-full h-4 w-4 bg-red-500"></span>
            </span>
        </div>
    </div>
@endif
