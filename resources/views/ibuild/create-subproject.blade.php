<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-50 border border-gray-300 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('ibuild.store-subproject') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="flex justify-between items-center mb-4">
                            <h1 class="dark:text-lime-500 text-xl">Proponent & Location</h1>
                            <a href="{{ route('ibuild.subprojects') }}"
                                class="border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-green-500 dark:bg-lime-500 hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 px-3 py-2">
                                Show Subprojects
                            </a>
                        </div>
                        <hr class="border-2 dark:border-lime-500 border-green-500 mb-2">
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-3">
                            <div>
                                <label for="proponent" class="dark:text-green-600">Proponent <span
                                        class="text-red-600">*</span></label>
                                <select name="proponent" id="proponent"
                                    class="block border-1 rounded-md border-gray-400 dark:border-gray-700 dark:bg-gray-900 bg-white w-full mt-1">
                                    <option value="" disabled {{ old('proponent') == '' ? 'selected' : '' }}>
                                        Select a proponent</option>
                                    <option value="CLGU" {{ old('proponent') == 'CLGU' ? 'selected' : '' }}>CLGU
                                    </option>
                                    <option value="MLGU" {{ old('proponent') == 'MLGU' ? 'selected' : '' }}>MLGU
                                    </option>
                                    <option value="PLGU" {{ old('proponent') == 'PLGU' ? 'selected' : '' }}>PLGU
                                    </option>
                                </select>
                                @error('proponent')
                                <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="cluster" class="dark:text-green-600">Cluster</label>
                                <input
                                    class="block border-1 rounded-md border-gray-400 dark:border-gray-700 dark:bg-gray-900 bg-white w-full mt-1"
                                    type="text" name="cluster" id="cluster" value="Luzon A" readonly>
                            </div>
                            <div>
                                <label for="region" class="dark:text-green-600">Region</label>
                                <input
                                    class="block border-1 rounded-md border-gray-400 dark:border-gray-700 dark:bg-gray-900 bg-white w-full mt-1"
                                    type="text" name="region" id="region" value="Region 1" readonly>
                            </div>
                            <div>
                                <label for="province" class="dark:text-green-600">Province <span
                                        class="text-red-600">*</span></label>
                                <select name="province" id="province"
                                    class="block border-1 rounded-md border-gray-400 dark:border-gray-700 dark:bg-gray-900 bg-white w-full mt-1"
                                    onchange="fetchMunicipalities(this.value)">
                                    <option value="" disabled selected>Select a province</option>
                                    @foreach ($provinces as $province)
                                    <option value="{{ $province->id }}"
                                        {{ old('province_id') == $province->id ? 'selected' : '' }}>
                                        {{ $province->province_name }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('province')
                                <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="municipality" class="dark:text-green-600">Municipality <span
                                        class="text-red-600">*</span></label>
                                <select name="municipality" id="municipality"
                                    class="block border-1 rounded-md border-gray-400 dark:border-gray-700 dark:bg-gray-900 bg-white w-full mt-1"
                                    onchange="fetchBarangays(this.value)">
                                </select>
                                @error('municipality')
                                <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="barangay" class="dark:text-green-600">Barangay <span
                                        class="text-red-600">*</span></label>
                                <select name="barangay" id="barangay"
                                    class="block border-1 rounded-md border-gray-400 dark:border-gray-700 dark:bg-gray-900 bg-white w-full mt-1">
                                </select>
                                @error('barangay')
                                <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <h1 class="dark:text-lime-500 text-xl mt-4 mb-4">Subproject Profile</h1>
                        <hr class="border-2 border-green-600 dark:border-lime-500 mb-2">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                            <div>
                                <label for="projectName" class="dark:text-green-600">Project Name <span
                                        class="text-red-600">*</span></label>
                                <input type="text" name="projectName" id="projectName"
                                    class="block border-1 rounded-md border-gray-400 dark:border-gray-700 dark:bg-gray-900 bg-white w-full mt-1"
                                    value="{{ old('projectName') }}">
                                @error('projectName')
                                <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="projectType" class="dark:text-green-600">Project Type <span
                                        class="text-red-600">*</span></label>
                                <select name="projectType" id="projectType"
                                    class="block border-1 rounded-md border-gray-400 dark:border-gray-700 dark:bg-gray-900 bg-white w-full mt-1">
                                    <option value="" {{ old('projectType') == '' ? 'selected' : '' }} disabled
                                        selected>Select a project type</option>
                                    <option value="FMR" {{ old('projectType') == 'FMR' ? 'selected' : '' }}>FMR
                                    </option>
                                    <option value="FMB" {{ old('projectType') == 'FMB' ? 'selected' : '' }}>FMB
                                    </option>
                                    <option value="Bridge" {{ old('projectType') == 'Bridge' ? 'selected' : '' }}>
                                        Bridge</option>
                                    <option value="CIS" {{ old('projectType') == 'CIS' ? 'selected' : '' }}>CIS
                                    </option>
                                    <option value="PWS" {{ old('projectType') == 'PWS' ? 'selected' : '' }}>PWS
                                    </option>
                                    <option value="VCI" {{ old('projectType') == 'VCI' ? 'selected' : '' }}>VCI
                                    </option>
                                </select>
                                @error('projectType')
                                <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="projectCategory" class="dark:text-green-600">Project Category
                                    <span class="text-red-600">*</span></label>
                                <select name="projectCategory" id="projectCategory"
                                    class="block border-1 rounded-md border-gray-400 dark:border-gray-700 dark:bg-gray-900 bg-white w-full mt-1">
                                    <option value="" {{ old('projectCategory') == '' ? 'selected' : '' }}
                                        disabled selected>Select a project category</option>
                                    <option value="Construction"
                                        {{ old('projectCategory') == 'Construction' ? 'selected' : '' }}>Construction
                                    </option>
                                    <option value="Rehabilitation"
                                        {{ old('projectCategory') == 'Rehabilitation' ? 'selected' : '' }}>
                                        Rehabilitation</option>
                                </select>
                                @error('projectCategory')
                                <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3 mt-3">
                            <div>
                                <label for="fundSource" class="dark:text-green-600">Fund Source</label>
                                <input
                                    class="block border-1 rounded-md border-gray-400 dark:border-gray-700 dark:bg-gray-900 bg-white w-full mt-1"
                                    type="text" name="fundSource" id="fundSource" value="PRDP Scale-Up" readonly>
                            </div>
                            <div x-data="{
                                number: '',
                                rawNumber: '',
                                formatNumber() {
                                    let cleanedValue = this.number.replace(/,/g, '');
                                    if (!isNaN(cleanedValue) && cleanedValue !== '') {
                                        const [integerPart, decimalPart] = cleanedValue.split('.');
                                        this.number = Number(integerPart).toLocaleString('en-US') +
                                            (decimalPart !== undefined ? '.' + decimalPart.slice(0, 2) : '');
                                        this.rawNumber = cleanedValue.includes('.') ? parseFloat(cleanedValue).toFixed(2) : cleanedValue;
                                    }
                                }
                            }">
                                <label for="indicativeCost" class="dark:text-green-600">Indicative
                                    Cost</label>
                                <input type="text" id="indicativeCost"
                                    class="block border-1 rounded-md border-gray-400 dark:border-gray-700 dark:bg-gray-900 bg-white w-full mt-1"
                                    step=".01"
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\..*/, '$1');"
                                    x-model="number" @input="formatNumber">
                                <input
                                    class="block border-1 rounded-md border-gray-400 dark:border-gray-700 dark:bg-gray-900 bg-white w-full mt-1"
                                    type="hidden" name="indicativeCost" :value="rawNumber">
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-3 mt-3">
                            <div>
                                <label for="letterOfInterest" class="dark:text-green-600">Letter of
                                    Interest</label>
                                <input type="file" name="letterOfInterest" id="letterOfInterest"
                                    class="block border rounded-md border-gray-400 dark:border-gray-700 dark:bg-gray-900 bg-white w-full mt-1 py-1 px-2">
                                @error('letterOfInterest')
                                <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="letterOfRequest" class="dark:text-green-600">Letter of
                                    Request</label>
                                <input type="file" name="letterOfRequest" id="letterOfRequest"
                                    class="block border rounded-md border-gray-400 dark:border-gray-700 dark:bg-gray-900 bg-white w-full mt-1 py-1 px-2">
                                @error('letterOfRequest')
                                <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="letterOfEndorsement" class="dark:text-green-600">Letter of
                                    Endorsement</label>
                                <input type="file" name="letterOfEndorsement" id="letterOfEndorsement"
                                    class="block border rounded-md border-gray-400 dark:border-gray-700 dark:bg-gray-900 bg-white w-full mt-1 py-1 px-2">
                                @error('letterOfEndorsement')
                                <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="flex justify-end mt-2">
                            <button type="submit"
                                class="flex items-center gap-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-green-500 dark:bg-lime-500 hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 px-3 py-2">
                                <img src="/images/floppy.svg" alt="Save" width="22" height="22">
                                Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>