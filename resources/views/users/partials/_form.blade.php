@csrf

<section class="border rounded p-4 mb-4">
    @include('users.partials._form-user-data')
</section>

<section class="border rounded p-4 mb-4">
    @include('users.partials._form-address-data')
</section>

<div class="space-y-4">
    <button type="submit"
            class="w-full bg-blue-600 text-white px-4 py-2 rounded-md shadow hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-900">
        {{ $submitLabel ?? __('Save') }}
    </button>
</div>
