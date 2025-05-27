<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Senarai Tempahan Dewan</h2>
    </x-slot>

    <div class="container mx-auto mt-10 p-6 bg-white rounded shadow">
        @if(session('success'))
            <div class="bg-green-200 text-green-800 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border border-gray-300 p-2">Nama</th>
                    <th class="border border-gray-300 p-2">Telefon</th>
                    <th class="border border-gray-300 p-2">Emel</th>
                    <th class="border border-gray-300 p-2">Tarikh</th>
                    <th class="border border-gray-300 p-2">Jenis Dewan</th>
                    <th class="border border-gray-300 p-2">Status</th>
                    <th class="border border-gray-300 p-2">Tindakan</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bookings as $booking)
                <tr>
                    <td class="border border-gray-300 p-2">{{ $booking->name }}</td>
                    <td class="border border-gray-300 p-2">{{ $booking->phone }}</td>
                    <td class="border border-gray-300 p-2">{{ $booking->email }}</td>
                    <td class="border border-gray-300 p-2">{{ \Carbon\Carbon::parse($booking->date)->format('d/m/Y') }}</td>
                    <td class="border border-gray-300 p-2">{{ $booking->dewan_type }}</td>
                    <td class="border border-gray-300 p-2">{{ ucfirst($booking->status) }}</td>
                    <td class="border border-gray-300 p-2">
                        <a href="{{ route('tempah.dewan.show', $booking->id) }}" class="text-blue-600 hover:underline">Lihat</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            {{ $bookings->links() }}
        </div>
    </div>
</x-app-layout>
