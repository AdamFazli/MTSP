<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Tempahan Dewan</h2>
    </x-slot>

    <div class="max-w-md mx-auto mt-10 p-6 bg-white rounded shadow">
        @if(session('success'))
        <div class="bg-green-200 text-green-800 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
        @endif

        @if($errors->any())
        <div class="bg-red-200 text-red-800 p-3 rounded mb-4">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form method="POST" action="{{ route('tempah.dewan.store') }}">
            @csrf

            <label for="name" class="block mb-2 font-semibold">Nama</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" required
                class="w-full p-2 border rounded mb-4" />

            <label for="phone" class="block mb-2 font-semibold">Nombor Telefon</label>
            <input type="text" name="phone" id="phone" value="{{ old('phone') }}" required
                class="w-full p-2 border rounded mb-4" />

            <label for="email" class="block mb-2 font-semibold">Emel</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" required
                class="w-full p-2 border rounded mb-4" />

            <label for="date" class="block mb-2 font-semibold">Tarikh Tempahan</label>
            <input type="date" name="date" id="date" value="{{ old('date') }}" required min="{{ date('Y-m-d') }}"
                class="w-full p-2 border rounded mb-4" />

            <label for="dewan_type" class="block mb-2 font-semibold">Jenis Dewan</label>
            <select name="dewan_type" id="dewan_type" required class="w-full p-2 border rounded mb-4">
                <option value="">-- Pilih Jenis Dewan --</option>
                @foreach($dewanTypes as $type)
                <option value="{{ $type }}" @if(old('dewan_type')==$type) selected @endif>{{ $type }}</option>
                @endforeach
            </select>

            <label for="description" class="block mb-2 font-semibold">Keterangan (optional)</label>
            <textarea name="description" id="description" rows="3" class="w-full p-2 border rounded mb-4">{{ old('description') }}</textarea>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Hantar Tempahan</button>
        </form>
    </div>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Booking list -->
    @if(count($userBookings) > 0)
    <h2 class="mt-6 font-bold">Senarai Tempahan Anda</h2>
    <table class="border-collapse border border-gray-300 mt-2 w-full">
        <thead>
            <tr>
                <th class="border border-gray-300 p-2">Tarikh</th>
                <th class="border border-gray-300 p-2">Jenis Dewan</th>
                <th class="border border-gray-300 p-2">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($userBookings as $booking)
            <tr>
                <td class="border border-gray-300 p-2">{{ \Carbon\Carbon::parse($booking->date)->format('d/m/Y') }}</td>
                <td class="border border-gray-300 p-2">{{ $booking->dewan_type }}</td>
                <td class="border border-gray-300 p-2">
                    @if($booking->status == 'pending')
                    <span class="text-yellow-600 font-semibold">Pending</span>
                    @elseif($booking->status == 'approved')
                    <span class="text-green-600 font-semibold">Approved</span>
                    @elseif($booking->status == 'rejected')
                    <span class="text-red-600 font-semibold">Rejected</span>
                    @else
                    {{ ucfirst($booking->status) }}
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</x-app-layout>