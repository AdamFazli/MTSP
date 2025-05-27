<!-- resources/views/Informasi/ajax.blade.php -->

<h2 class="text-xl font-semibold mb-4">Informasi Masjid</h2>

<div class="space-y-6">
    <div class="p-4 bg-purple-100 rounded shadow">
        <h3 class="text-lg font-bold text-purple-700">Carta Organisasi</h3>
        @include('Informasi.carta_organisasi') <!-- Assuming carta_organisasi.blade.php is the content -->
    </div>

    <div class="p-4 bg-purple-100 rounded shadow">
        <h3 class="text-lg font-bold text-purple-700">Visi & Misi</h3>
        @include('Informasi.visi_misi') <!-- Assuming visi_misi.blade.php is the content -->
    </div>
</div>