@if(auth()->user()->is_admin())
    <section>

        @if ($errors->any())
            <div class="mb-4 p-4 rounded-lg bg-red-100 border border-red-400 text-red-700">
                <ul class="mt-2 list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="GET" action="{{route('dashboard')}}" class="mb-6 flex gap-4 items-end">

            <div>
                <label class="block text-sm font-medium">Data Início</label>
                <input type="date" name="start"
                       value="{{ request('start') }}"
                       class="mt-1 block w-full border rounded-lg px-3 py-2 @error('start') border-red-500 @enderror">

            </div>
            <div>
                <label class="block text-sm font-medium">Data Fim</label>
                <input type="date" name="end"
                       value="{{ request('end') }}"
                       class="mt-1 block w-full border rounded-lg px-3 py-2 @error('end') border-red-500 @enderror">

            </div>
            <button type="submit"
                    class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                Filtrar
            </button>
        </form>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                <thead class="bg-gray-50 dark:bg-gray-700">
                <tr class="text-left text-sm font-medium text-gray-500 dark:text-gray-200">
                    <th class="py-2 px-4">ID do Registro</th>
                    <th class="py-2 px-4">Nome do Funcionário</th>
                    <th class="py-2 px-4">Cargo</th>
                    <th class="py-2 px-4">Idade</th>
                    <th class="py-2 px-4">Nome do Gestor</th>
                    <th class="py-2 px-4" colspan="2">Registro de ponto</th>
                </tr>
                </thead>
                <tbody>
                @forelse($records as $record)
                    <tr class="border-t">
                        <td class="py-2 px-4">{{ $record->id }}</td>
                        <td class="py-2 px-4">{{ $record->employee_name }}</td>
                        <td class="py-2 px-4">{{ $record->employee_position }}</td>
                        <td class="py-2 px-4">{{ $record->employee_age }}</td>
                        <td class="py-2 px-4">{{ $record->admin_name }}</td>
                        <td class="py-2 px-4">
                            {!! \App\Enums\TimeRecordType::from($record->record_type)->icon() !!}
                            {{\Carbon\Carbon::parse($record->record_recorded_at)->format('d/m/Y H:i:s') }}
                        </td>
                    </tr>

                @empty
                    <tr>
                        <td colspan="7" class="py-4 px-4 text-center text-gray-500">
                            Nenhum registro encontrado.
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </section>
@endif
