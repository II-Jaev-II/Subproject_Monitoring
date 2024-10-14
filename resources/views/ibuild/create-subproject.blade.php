<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('ibuild.store-subproject') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="flex justify-between items-center mb-4">
                            <h1 class="dark:text-lime-500 text-xl">Proponent & Location</h1>
                            <a href="{{ route('ibuild.subprojects') }}"
                                class="border border-transparent text-sm leading-4 font-medium rounded-md text-gray dark:text-white bg-gray-400 dark:bg-lime-500 hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 px-3 py-2">
                                Show Subprojects
                            </a>
                        </div>
                        <hr class="border-2 dark:border-lime-500 mb-2">
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-3">
                            <div>
                                <label for="proponent">Proponent <span class="dark:text-red-500">*</span></label>
                                <select name="proponent" id="proponent"
                                    class="block border-1 rounded-md border-gray-700 bg-gray-900 w-full mt-1">
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
                                <label for="cluster">Cluster <span class="dark:text-red-500">*</span></label>
                                <select name="cluster" id="cluster"
                                    class="block border-1 rounded-md border-gray-700 bg-gray-900 w-full mt-1">
                                    <option value="" {{ old('cluster') == '' ? 'selected' : '' }} disabled
                                        selected>Select a cluster</option>
                                    <option value="Luzon A" {{ old('cluster') == 'Luzon A' ? 'selected' : '' }}>Luzon A
                                    </option>
                                </select>
                                @error('cluster')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="region">Region <span class="dark:text-red-500">*</span></label>
                                <select name="region" id="region"
                                    class="block border-1 rounded-md border-gray-700 bg-gray-900 w-full mt-1">
                                    <option value="" {{ old('region') == '' ? 'selected' : '' }} disabled
                                        selected>Select a region</option>
                                    <option value="Region 1" {{ old('region') == 'Region 1' ? 'selected' : '' }}>Region
                                        1</option>
                                </select>
                                @error('region')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="province">Province <span class="dark:text-red-500">*</span></label>
                                <select name="province" id="province"
                                    class="block border-1 rounded-md border-gray-700 bg-gray-900 w-full mt-1"
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
                                <label for="municipality">Municipality <span class="dark:text-red-500">*</span></label>
                                <select name="municipality" id="municipality"
                                    class="block border-1 rounded-md border-gray-700 bg-gray-900 w-full mt-1"
                                    onchange="fetchBarangays(this.value)">
                                </select>
                                @error('municipality')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="barangay">Barangay <span class="dark:text-red-500">*</span></label>
                                <select name="barangay" id="barangay"
                                    class="block border-1 rounded-md border-gray-700 bg-gray-900 w-full mt-1">
                                </select>
                                @error('barangay')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <h1 class="dark:text-lime-500 text-xl mt-4 mb-4">Subproject Profile</h1>
                        <hr class="border-2 dark:border-lime-500 mb-2">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                            <div>
                                <label for="projectName">Project Name <span class="dark:text-red-500">*</span></label>
                                <input type="text" name="projectName" id="projectName"
                                    class="block border-1 rounded-md border-gray-700 bg-gray-900 w-full mt-1"
                                    value="{{ old('projectName') }}">
                                @error('projectName')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="projectType">Project Type <span class="dark:text-red-500">*</span></label>
                                <select name="projectType" id="projectType"
                                    class="block border-1 rounded-md border-gray-700 bg-gray-900 w-full mt-1">
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
                                <label for="projectCategory">Project Category <span
                                        class="dark:text-red-500">*</span></label>
                                <select name="projectCategory" id="projectCategory"
                                    class="block border-1 rounded-md border-gray-700 bg-gray-900 w-full mt-1">
                                    <option value="" {{ old('projectCategory') == '' ? 'selected' : '' }}
                                        disabled selected>Select a project category</option>
                                    <option value="Construction"
                                        {{ old('projectCategory') == 'Construction' ? 'selected' : '' }}>Construction
                                    </option>
                                    <option value="Rehabilitation"
                                        {{ old('projectCategory') == 'Rehabilitation' ? 'selected' : '' }}>
                                        Rehabilitation</option>
                                    <option value="Upgrading"
                                        {{ old('projectCategory') == 'Upgrading' ? 'selected' : '' }}>Upgrading
                                    </option>
                                    <option value="Additional Work"
                                        {{ old('projectCategory') == 'Additional Work' ? 'selected' : '' }}>Additional
                                        Work</option>
                                </select>
                                @error('projectCategory')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-3 mt-3">
                            <div>
                                <label for="fundSource">Fund Source <span class="dark:text-red-500">*</span></label>
                                <select name="fundSource" id="fundSource"
                                    class="block border-1 rounded-md border-gray-700 bg-gray-900 w-full mt-1">
                                    <option value="" {{ old('fundSource') == '' ? 'selected' : '' }} disabled
                                        selected>Select a fund source</option>
                                    <option value="PRDP Scale-up"
                                        {{ old('fundSource') == 'PRDP Scale-up' ? 'selected' : '' }}>PRDP Scale-up
                                    </option>
                                </select>
                                @error('fundSource')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="indicativeCost">Indicative Cost <span
                                        class="dark:text-red-500">*</span></label>
                                <input type="text" name="indicativeCost" id="indicativeCost"
                                    class="block border-1 rounded-md border-gray-700 bg-gray-900 w-full mt-1"
                                    step=".01"
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\..*/,'$1');"
                                    value="{{ old('indicativeCost') }}">
                                @error('indicativeCost')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="letterOfInterest">Letter of Interest/Request/Endorsement <span
                                        class="dark:text-red-500">*</span></label>
                                <input type="file" name="letterOfInterest" id="letterOfInterest"
                                    class="block border-1 rounded-md border-gray-700 bg-gray-900 w-full mt-1 py-1 px-2">
                                @error('letterOfInterest')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <h1 class="dark:text-lime-500 text-xl mt-4 mb-4">Linked to Commodity Investment Plan</h1>
                        <hr class="border-2 dark:border-lime-500 mb-2">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-3 mt-3">
                            <div>
                                <label for="commodity">Commodity <span class="dark:text-red-500">*</span></label>
                                <select name="commodity" id="commodity"
                                    class="block border-1 rounded-md border-gray-700 bg-gray-900 w-full mt-1">
                                    <option value="" {{ old('commodity') == '' ? 'selected' : '' }} disabled
                                        selected>Select a commodity</option>
                                    <option value="Mango" {{ old('commodity') == 'Mango' ? 'selected' : '' }}>Mango</option>
                                    <option value="Coffee" {{ old('commodity') == 'Coffee' ? 'selected' : '' }}>Coffee</option>
                                    <option value="Hogs" {{ old('commodity') == 'Hogs' ? 'selected' : '' }}>Hogs</option>
                                </select>
                                @error('commodity')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="commodityReport">Report <span class="dark:text-red-500">*</span></label>
                                <input type="file" name="commodityReport" id="commodityReport"
                                    class="block border-1 rounded-md border-gray-700 bg-gray-900 w-full mt-1 py-1 px-2">
                                @error('commodityReport')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="flex justify-end">
                            <button type="submit"
                                class="flex items-center gap-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray dark:text-white bg-gray-400 dark:bg-lime-500 hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 px-3 py-2">
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
