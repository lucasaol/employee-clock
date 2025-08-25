@if(auth()->user()->is_employee())
    <section class="mt-6 space-y-6">
        @include('components.success-message')

        <form method="post" action="{{ route('time_records.store') }}">
            @csrf
            <div class="space-y-4 flex justify-center-safe">
                <button type="submit"
                        class="w-2xl bg-blue-600 text-white px-4 py-2 rounded-md shadow hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-900">
                    {{ __('Ok') }}
                </button>
            </div>
        </form>
    </section>
@endif
