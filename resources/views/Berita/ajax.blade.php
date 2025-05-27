<!-- resources/views/Berita/ajax.blade.php -->

<h2 class="text-2xl font-semibold mb-4">Senarai Berita Terkini</h2>

@if($berita->count())
    <ul class="space-y-3">
        @foreach($berita as $item)
            <li class="p-4 bg-gray-100 rounded shadow">
                <h3 class="text-lg font-bold text-blue-700">{{ $item->tajuk }}</h3>
                <p class="text-gray-700">{{ Str::limit($item->kandungan, 150) }}</p>
                <p class="text-sm text-gray-500 mt-2">Tarikh: {{ $item->created_at->format('d M Y') }}</p>
            </li>
        @endforeach
    </ul>
@else
    <p class="text-gray-500">Tiada berita buat masa ini.</p>
@endif
