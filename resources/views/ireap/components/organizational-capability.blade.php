<div>
    <label for="accomplishmentReports" class="dark:text-green-600 text-sm md:text-base">Accomplishment Reports</label>
    <input
        class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1 py-1 px-2"
        type="file" name="accomplishmentReports[]" id="accomplishmentReports" multiple>
    @if ($errors->has('accomplishmentReports.*'))
    <div class="text-red-600 mt-2 mb-2">
        {{ $errors->first('accomplishmentReports.*') }}
    </div>
    @endif
</div>

<div>
    <label for="photographs" class="dark:text-green-600 text-sm md:text-base">Photographs of agri-fishery or related projects undertaken for at least one year</label>
    <input
        class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1 py-1 px-2"
        type="file" name="photographs[]" id="photographs" multiple>
    @if ($errors->has('photographs.*'))
    <div class="text-red-600 mt-2 mb-2">
        {{ $errors->first('photographs.*') }}
    </div>
    @endif
</div>

<div>
    <label for="existingOrganizationalStructure" class="dark:text-green-600 text-sm md:text-base">Existing Organizational Structure</label>
    <input
        class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1 py-1 px-2"
        type="file" name="existingOrganizationalStructure" id="existingOrganizationalStructure">
    @if ($errors->has('existingOrganizationalStructure'))
    <div class="text-red-600 mt-2 mb-2">
        {{ $errors->first('existingOrganizationalStructure') }}
    </div>
    @endif
</div>

<div>
    <label for="secretaryCertificate" class="dark:text-green-600 text-sm md:text-base">Secretary's Certificate of Incumbent Officers</label>
    <input
        class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1 py-1 px-2"
        type="file" name="secretaryCertificate" id="secretaryCertificate">
    @if ($errors->has('secretaryCertificate'))
    <div class="text-red-600 mt-2 mb-2">
        {{ $errors->first('secretaryCertificate') }}
    </div>
    @endif
</div>

<div>
    <label for="fcaMembersProfile" class="dark:text-green-600 text-sm md:text-base">FCA/FCA Cluster Profile & Members' Profile</label>
    <input
        class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1 py-1 px-2"
        type="file" name="fcaMembersProfile[]" id="fcaMembersProfile" multiple>
    @if ($errors->has('fcaMembersProfile.*'))
    <div class="text-red-600 mt-2 mb-2">
        {{ $errors->first('fcaMembersProfile.*') }}
    </div>
    @endif
</div>