<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('E-Asnaf Management') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">

                {{-- Example: Button to Add New Asnaf --}}
                <div class="flex justify-between items-center mb-4">
                    <a href="{{ route('asnaf.export.excel') }}"
                        class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                        📥 Export Excel
                    </a>

                    <a href="{{ route('asnaf.create') }}"
                        class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                        + Add New Asnaf
                    </a>
                </div>

                {{-- Display list of Asnaf here --}}
                <table class="table-auto w-full border">
                    <thead>
                        <tr class="bg-gray-100 text-left">
                            <th class="p-2 border">Name</th>
                            <th class="p-2 border">IC</th>
                            <th class="p-2 border">Status</th>
                            <th class="p-2 border">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($asnafs as $asnaf)
                        <tr>
                            <td class="p-2 border">{{ $asnaf->name }}</td>
                            <td class="p-2 border">{{ $asnaf->ic }}</td>
                            <td class="p-2 border">{{ $asnaf->status }}</td>
                            <td class="p-2 border">
                                <a href="{{ route('asnaf.edit', $asnaf->id) }}"
                                    class="text-blue-600 hover:underline">Edit</a> |
                                <form action="{{ route('asnaf.destroy', $asnaf->id) }}" method="POST"
                                    style="display:inline-block" onsubmit="return confirm('Confirm delete?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-600 hover:underline" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>