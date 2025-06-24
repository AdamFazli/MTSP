<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Carta Organisasi') }}
        </h2>
    </x-slot>

    <div class="container mx-auto my-6">
        <div class="bg-white p-6 rounded-lg shadow-lg flex justify-between items-center">
            <div class="w-2/3">
                <h3 class="text-2xl font-bold">Pasukan Pengurusan Jenazah</h3>
                <p class="text-xl font-semibold">Ketua Pengurus Jenazah</p>
                <p><strong>En. Amiruddin bin Kader</strong> – Contact: 016-741 4860</p>

                <p class="text-xl font-semibold mt-4">Bantu</p>
                <ul class="list-disc pl-5">
                    <li><strong>Hj. Abd Rahim Md. Nor</strong> – Contact: 019-729 3153</li>
                    <li><strong>En. Saruan bin Sohadi</strong> – Contact: 012-779 9500</li>
                </ul>

                <p class="text-xl font-semibold mt-4">Wakil Jalan</p>
                <ul class="list-disc pl-5">
                    <li><strong>Wakil Jalan Pakis:</strong> Hjh. Normah binti Md. Yusof – Contact: 017-7307382</li>
                    <li><strong>Wakil Jalan Ara:</strong> Hj. Jamaluddin bin Hassan – Contact: 019-743 0447</li>
                    <li><strong>Wakil Jalan Meranti:</strong> Hjh. Rosnani binti Badri – Contact: 019-738 5494</li>
                    <li><strong>Wakil Jalan Batai:</strong> Hjh. Rabeah binti Hashim – Contact: 018-294 4986</li>
                    <li><strong>Wakil Jalan Kabung:</strong> En. Subar bin Ali – Contact: 019-795 9174</li>
                    <li><strong>Wakil Jalan Rantau:</strong> En. Hamid bin Ismail – Contact: 013-779 3044</li>
                </ul>
            </div>

            <div class="w-1/3 ml-6">
                <img src="{{ asset('img/CartaOrganisasi/jenazah.jpg') }}" alt="Pasukan Pengurusan Jenazah Image" class="w-full rounded-lg shadow-lg">
            </div>
        </div>

        <div class="my-6"></div>

        <div class="bg-white p-6 rounded-lg shadow-lg flex justify-between items-center">
            <div class="w-2/3">
                <h3 class="text-2xl font-bold">Pasukan Khairat Kematian</h3>
                <p class="text-xl font-semibold">Pengerusi Khairat</p>
                <p><strong>Hj. Kamarudin Hamat</strong> – Contact: 019-777 4136</p>

                <p class="text-xl font-semibold mt-4">Wakil Jalan</p>
                <ul class="list-disc pl-5">
                    <li><strong>Wakil Jalan Ara:</strong> Hj. Jamaluddin bin Hassan – Contact: 019-743 0447</li>
                    <li><strong>Wakil Jalan Pakis:</strong> Hjh. Normah binti Md. Yusof – Contact: 017-7307382</li>
                    <li><strong>Wakil Jalan Batai:</strong> Hjh. Rabeah binti Hashim – Contact: 018-294 4986</li>
                    <li><strong>Wakil Jalan Meranti:</strong> Hjh. Rosnani binti Badri – Contact: 019-738 5494</li>
                    <li><strong>Wakil Jalan Kabung:</strong> En. Subar bin Ali – Contact: 019-795 9174</li>
                    <li><strong>Wakil Jalan Rantau:</strong> En. Hamid bin Ismail – Contact: 013-779 3044</li>
                </ul>

                <p class="text-xl font-semibold mt-4">Yuran Keahlian</p>
                <p>Yuran Keahlian: RM10 (Seumur Hidup)</p>
                <p>Yuran Khairat: RM50 (Setahun bagi diri & tanggungan)</p>
            </div>

            <div class="w-1/3 ml-6">
                <img src="{{ asset('img/CartaOrganisasi/khairat.jpg') }}" alt="Pasukan Khairat Kematian Image" class="w-full rounded-lg shadow-lg">
            </div>
        </div>
    </div>
</x-app-layout>