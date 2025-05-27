<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Maklumat Tempahan Dewan</h2>
    </x-slot>

    <div class="container mx-auto mt-10 p-6 bg-white rounded shadow max-w-lg">
        <p><strong>Nama:</strong> {{ $booking->name }}</p>
        <p><strong>Telefon:</strong> {{ $booking->phone }}</p>
        <p><strong>Emel:</strong> {{ $booking->email }}</p>
        <p><strong>Tarikh Tempahan:</strong> {{ \Carbon\Carbon::parse($booking->date)->format('d/m/Y') }}</p>
        <p><strong>Jenis Dewan:</strong> {{ $booking->dewan_type }}</p>
        <p><strong>Keterangan:</strong> {{ $booking->description ?? '-' }}</p>
        <p><strong>Status:</strong> {{ ucfirst($booking->status) }}</p>

        <form action="{{ route('tempah.dewan.update', $booking->id) }}" method="POST" class="mt-4">
            @csrf
            <label for="status" class="block font-semibold mb-2">Kemaskini Status:</label>
            <select name="status" id="status" class="w-full p-2 border rounded mb-4">
                <option value="approved" @if($booking->status == 'approved') selected @endif>Diluluskan</option>
                <option value="pending" @if($booking->status == 'pending') selected @endif>Tertunggak</option>
                <option value="rejected" @if($booking->status == 'rejected') selected @endif>Ditolak</option>
            </select>

            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Kemaskini</button>
            <a href="{{ route('tempah.dewan.index') }}" class="ml-4 text-gray-600 hover:underline">Kembali</a>
        </form>
    </div>
</x-app-layout>
