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
                    <form action="" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="subprojectId" value="{{ $subproject->id }}" hidden>

                        <div class="flex items-center space-x-4 mb-6">
                            <label for="reviewDate" class="dark:text-lime-500 text-black text-sm md:text-base">Date of Review <span
                                    class="text-red-500">*</span></label>
                            <input type="date" name="reviewDate" id="reviewDate" value="{{ old('reviewDate') }}"
                                class="dark:bg-gray-900 rounded-md dark:[color-scheme:dark]">
                            @if ($errors->has('reviewDate'))
                            <div class="text-red-600 mt-2 mb-2">
                                {{ $errors->first('reviewDate') }}
                            </div>
                            @endif
                        </div>

                        <div class="mb-2">
                            <label for="concernArea" class="dark:text-lime-500 text-black text-sm md:text-base">Is the proposed Subproject within/near the following SES Areas of concern?</label>
                        </div>

                        <table class="w-full table-auto border-collapse border border-gray-300">
                            <!-- Row for Certificate of Ancestral Domain -->
                            <tr class="mb-4 border border-gray-300">
                                <td class="align-top dark:text-green-600 text-black text-sm md:text-base border border-gray-300 p-2">
                                    <label for="ancestralDomainCertificate">Certificate of Ancestral Domain Claim/Title (CADC/CADT)</label>
                                </td>
                                <td class="border border-gray-300 p-2">
                                    <div class="flex items-center gap-4">
                                        <div class="flex items-center gap-2">
                                            <input class="dark:bg-gray-800" type="radio" name="ancestralDomainCertificate" id="ancestralDomainCertificateYes"
                                                value="Yes"
                                                {{ old('ancestralDomainCertificate') === 'Yes' ? 'checked' : '' }}>
                                            <label for="ancestralDomainCertificateYes">Yes</label>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <input class="dark:bg-gray-800" type="radio" name="ancestralDomainCertificate" id="ancestralDomainCertificateNo"
                                                value="No"
                                                {{ old('ancestralDomainCertificate') === 'No' ? 'checked' : '' }}>
                                            <label for="ancestralDomainCertificateNo">No</label>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @if ($errors->has('ancestralDomainCertificate'))
                            <tr class="border border-gray-300">
                                <td colspan="2" class="border border-gray-300 p-2">
                                    <div class="text-red-600 mt-2 mb-2">
                                        {{ $errors->first('ancestralDomainCertificate') }}
                                    </div>
                                </td>
                            </tr>
                            @endif

                            <!-- Row for Protected Area -->
                            <tr class="mb-4 border border-gray-300">
                                <td class="align-top dark:text-green-600 text-black text-sm md:text-base border border-gray-300 p-2">
                                    <label for="protectedArea">Protected Area (PA)</label>
                                </td>
                                <td class="border border-gray-300 p-2">
                                    <div class="flex items-center gap-4">
                                        <div class="flex items-center gap-2">
                                            <input class="dark:bg-gray-800" type="radio" name="protectedArea" id="protectedArea"
                                                value="Yes"
                                                {{ old('protectedArea') === 'Yes' ? 'checked' : '' }}>
                                            <label for="protectedAreaYes">Yes</label>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <input class="dark:bg-gray-800" type="radio" name="protectedArea" id="protectedArea"
                                                value="No"
                                                {{ old('protectedArea') === 'No' ? 'checked' : '' }}>
                                            <label for="protectedAreaNo">No</label>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @if ($errors->has('protectedArea'))
                            <tr class="border border-gray-300">
                                <td colspan="2" class="border border-gray-300 p-2">
                                    <div class="text-red-600 mt-2 mb-2">
                                        {{ $errors->first('protectedArea') }}
                                    </div>
                                </td>
                            </tr>
                            @endif

                            <!-- Row for Key Biodiversity Area -->
                            <tr class="mb-4 border border-gray-300">
                                <td class="align-top dark:text-green-600 text-black text-sm md:text-base border border-gray-300 p-2">
                                    <label for="biodiversityArea">Key Biodiversity Area (KBA)</label>
                                </td>
                                <td class="border border-gray-300 p-2">
                                    <div class="flex items-center gap-4">
                                        <div class="flex items-center gap-2">
                                            <input class="dark:bg-gray-800" type="radio" name="biodiversityArea" id="biodiversityArea"
                                                value="Yes"
                                                {{ old('biodiversityArea') === 'Yes' ? 'checked' : '' }}>
                                            <label for="biodiversityAreaYes">Yes</label>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <input class="dark:bg-gray-800" type="radio" name="biodiversityArea" id="biodiversityArea"
                                                value="No"
                                                {{ old('biodiversityArea') === 'No' ? 'checked' : '' }}>
                                            <label for="biodiversityAreaNo">No</label>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @if ($errors->has('biodiversityArea'))
                            <tr class="border border-gray-300">
                                <td colspan="2" class="border border-gray-300 p-2">
                                    <div class="text-red-600 mt-2 mb-2">
                                        {{ $errors->first('biodiversityArea') }}
                                    </div>
                                </td>
                            </tr>
                            @endif

                            <!-- Row for Fault Line -->
                            <tr class="mb-4 border border-gray-300">
                                <td class="align-top dark:text-green-600 text-black text-sm md:text-base border border-gray-300 p-2">
                                    <label for="faultLine">Fault Line</label>
                                </td>
                                <td class="border border-gray-300 p-2">
                                    <div class="flex items-center gap-4">
                                        <div class="flex items-center gap-2">
                                            <input class="dark:bg-gray-800" type="radio" name="faultLine" id="faultLine"
                                                value="Yes"
                                                {{ old('faultLine') === 'Yes' ? 'checked' : '' }}>
                                            <label for="faultLineYes">Yes</label>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <input class="dark:bg-gray-800" type="radio" name="faultLine" id="faultLine"
                                                value="No"
                                                {{ old('faultLine') === 'No' ? 'checked' : '' }}>
                                            <label for="faultLineNo">No</label>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @if ($errors->has('faultLine'))
                            <tr class="border border-gray-300">
                                <td colspan="2" class="border border-gray-300 p-2">
                                    <div class="text-red-600 mt-2 mb-2">
                                        {{ $errors->first('faultLine') }}
                                    </div>
                                </td>
                            </tr>
                            @endif
                        </table>

                        <div class="mb-2 mt-4">
                            <label for="markerMunicipalHall" class="dark:text-lime-500 text-black text-sm md:text-base">Marker of Municipal Hall and geotag photos of municipal hall and surrounding (if available)</label>

                            <textarea name="markerMunicipalHall" id="markerMunicipalHall" rows="4"
                                class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1">{{ old('markerMunicipalHall') }}</textarea>
                        </div>

                        <div class="mb-2 mt-4">
                            <label for="tracedTrack" class="dark:text-lime-500 text-black text-sm md:text-base">GPS or traced track from municipal hall to start of proposed FMR</label>

                            <textarea name="tracedTrack" id="tracedTrack" rows="4"
                                class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1">{{ old('tracedTrack') }}</textarea>
                        </div>

                        <div class="mb-2 mt-4">
                            <label for="gpsTracedTrack" class="dark:text-lime-500 text-black text-sm md:text-base">GPS or traced track of proposed FMR (annotate stationing of proposed and existing structures)</label>

                            <textarea name="gpsTracedTrack" id="gpsTracedTrack" rows="4"
                                class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1">{{ old('gpsTracedTrack') }}</textarea>
                        </div>

                        <div class="mb-2 mt-4">
                            <label for="fmrGeotagPhoto" class="dark:text-lime-500 text-black text-sm md:text-base">Geotag Photos of FMR at 50 meters interval and proposed and existing structures</label>

                            <textarea name="fmrGeotagPhoto" id="fmrGeotagPhoto" rows="4"
                                class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1">{{ old('fmrGeotagPhoto') }}</textarea>
                        </div>

                        <div class="mb-2 mt-4">
                            <label for="digitizedCommodityArea" class="dark:text-lime-500 text-black text-sm md:text-base">Digitized commodity Areas within the Road Influence Area</label>

                            <textarea name="digitizedCommodityArea" id="digitizedCommodityArea" rows="4"
                                class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1">{{ old('digitizedCommodityArea') }}</textarea>
                        </div>

                        <div class="mb-2 mt-4">
                            <label for="geotagPhotoCommodity" class="dark:text-lime-500 text-black text-sm md:text-base">Geotag photos of commodities and commodity areas (sample, random per commodity)</label>

                            <textarea name="geotagPhotoCommodity" id="geotagPhotoCommodity" rows="4"
                                class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1">{{ old('geotagPhotoCommodity') }}</textarea>
                        </div>

                        <div class="mb-2 mt-4">
                            <label for="geotagPhotoaffected" class="dark:text-lime-500 text-black text-sm md:text-base">Geotag Photos of area/s that may be environmentally and socially affected in the implementation of the subproject</label>

                            <textarea name="geotagPhotoaffected" id="geotagPhotoaffected" rows="4"
                                class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1">{{ old('geotagPhotoaffected') }}</textarea>
                        </div>

                        <div class="mb-2 mt-4">
                            <label for="roadInfluenceArea" class="dark:text-lime-500 text-black text-sm md:text-base">Road Influence Area (RIA)</label>

                            <textarea name="roadInfluenceArea" id="roadInfluenceArea" rows="4"
                                class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1">{{ old('roadInfluenceArea') }}</textarea>
                        </div>

                        <div class="mb-2 mt-4">
                            <label for="marker" class="dark:text-lime-500 text-black text-sm md:text-base">Marker of Market/s and barangay centers within the RIA</label>

                            <textarea name="marker" id="marker" rows="4"
                                class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1">{{ old('marker') }}</textarea>
                        </div>

                        <div class="mb-2 mt-4">
                            <label for="roadNetwork" class="dark:text-lime-500 text-black text-sm md:text-base">Road Network within the RIA</label>

                            <textarea name="roadNetwork" id="roadNetwork" rows="4"
                                class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1">{{ old('roadNetwork') }}</textarea>
                        </div>

                        <div class="mb-2 mt-4">
                            <label for="barangayBoundaries" class="dark:text-lime-500 text-black text-sm md:text-base">Barangay boundaries within the RIA</label>

                            <textarea name="barangayBoundaries" id="barangayBoundaries" rows="4"
                                class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1">{{ old('barangayBoundaries') }}</textarea>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>