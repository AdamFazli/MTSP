<!-- resources/views/Berita/Aktiviti/ajax.blade.php -->

<h2 class="text-xl font-semibold mb-4">Senarai Aktiviti</h2>

@if($aktiviti->count())
<ul class="space-y-3">
    @foreach($aktiviti as $item)
    <li class="p-4 bg-green-100 rounded shadow">
        <h3 class="text-lg font-bold text-green-700">{{ $item->tajuk }}</h3>
        <p class="text-gray-700">{{ Str::limit($item->keterangan, 150) }}</p>
        <p class="text-sm text-gray-500 mt-2">Tarikh: {{ $item->tarikh }}</p>
    </li>
    @endforeach
</ul>
@else
<p class="text-gray-500">Tiada aktiviti buat masa ini.</p>
@endif