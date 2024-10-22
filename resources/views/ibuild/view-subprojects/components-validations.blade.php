<div class="flex items-center gap-2">
    <label for="component" class="dark:text-green-600">Components</label>
    <input class="dark:bg-gray-900" type="radio" name="econ" value="Econ" x-model="selectedComponent">
    <label class="form-check-label" for="econ">
        Econ
    </label>
    <input class="dark:bg-gray-900" type="radio" name="GGU" value="GGU" x-model="selectedComponent">
    <label class="form-check-label" for="GGU">
        GGU
    </label>
    <input class="dark:bg-gray-900" type="radio" name="iBUILD" value="iBUILD" x-model="selectedComponent">
    <label class="form-check-label" for="iBUILD">
        iBUILD
    </label>
    <input class="dark:bg-gray-900" type="radio" name="iPLAN" value="iPLAN" x-model="selectedComponent">
    <label class="form-check-label" for="iPLAN">
        iPLAN
    </label>
    <input class="dark:bg-gray-900" type="radio" name="SES" value="SES" x-model="selectedComponent">
    <label class="form-check-label" for="SES">
        SES
    </label>
</div>
<div x-show="selectedComponent === 'Econ'">
    <h1>Econ</h1>
</div>
<div x-show="selectedComponent === 'GGU'">
    <h1>GGU</h1>
</div>
<div x-show="selectedComponent === 'iBUILD'">
    <h1>iBUILD</h1>
</div>
<div x-show="selectedComponent === 'iPLAN'">
    <h1>iPLAN</h1>
</div>
<div x-show="selectedComponent === 'SES'">
    <h1>SES</h1>
</div>