<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Carta Organisasi') }}
        </h2>
    </x-slot>

    <div class="container mx-auto my-6">

        <!-- Barisan Ahli Jawatankuasa Section Before Pasukan Pengurusan Jenazah -->
        <div class="bg-white p-6 rounded-lg shadow-lg flex justify-between items-center">
            <div class="w-2/3">
                <h3 class="text-2xl font-bold text-center">Barisan Ahli Jawatankuasa Masjid Taman Sri Pulai (Sesi 2023-2025)</h3>

                <!-- Display the data for Barisan Ahli Jawatankuasa -->
                <div class="mt-6">
                    <ul class="list-none">
                        <li class="text-lg font-semibold">Pengerusi: <strong>Hj. Kamaruddin Bin Hamat</strong> – Contact: 019-777 4136</li>
                        <li class="text-lg font-semibold mt-4">Timbalan Pengerusi: <strong>Hj. Naam Bin Parlan</strong> – Contact: 012-434 3441</li>
                        <li class="text-lg font-semibold mt-4">Bendahari: <strong>Hj. Mohamad Nor Bin Said</strong> – Contact: 019-753 5160</li>
                        <li class="text-lg font-semibold mt-4">Setiausaha: <strong>Hj. Mohd Mazuan Bin Abu</strong> – Contact: 013-744 4175</li>
                        <li class="text-lg font-semibold mt-4">Penolong Setiausaha: <strong>En. Musa Bin Abdullah</strong> – Contact: 012-764 4260</li>
                        <li class="text-lg font-semibold mt-4">Biro Penerbitan & Teknologi Maklumat: <strong>Hj. Mohd Mazuan Bin Abu</strong> – Contact: 013-744 4175</li>
                        <li class="text-lg font-semibold mt-4">Biro Kebersihan & Kecantikan: <strong>Hj. Paiman Bin Johari</strong> – Contact: 019-700 9323</li>
                        <li class="text-lg font-semibold mt-4">Biro Aset & Prasarana: <strong>En. Saruan Bin Sohadi</strong> – Contact: 012-779 9500</li>
                        <li class="text-lg font-semibold mt-4">Biro Pengimarahan & Dakwah: <strong>Hj. Ahmad Bin Kasman</strong> – Contact: 013-736 2980</li>
                        <li class="text-lg font-semibold mt-4">Biro Keselamatan, Kesukarelawan & Rakan Muda: <strong>Hj. Md Noor Bin Mian</strong> – Contact: 019-717 7053</li>
                        <li class="text-lg font-semibold mt-4">Biro Kebajikan & Sosial: <strong>Hj. Jamaluddin Bin Hassan</strong> – Contact: 019-743 0447</li>
                        <li class="text-lg font-semibold mt-4">Biro Hal Ehwal Wanita: <strong>Hjh. Rabeah Bte Hashim</strong> – Contact: 018-294 4986</li>
                    </ul>
                </div>
            </div>

            <!-- Image of Barisan Ahli Jawatankuasa on the Right -->
            <div class="w-1/3 ml-6">
                <img src="{{ asset('img/CartaOrganisasi/jawantankuasa.jpg') }}" alt="Barisan Ahli Jawatankuasa Masjid Taman Sri Pulai" class="w-full rounded-lg shadow-lg">
            </div>
        </div>

        <!-- Pasukan Pengurusan Jenazah Section -->
        <div class="bg-white p-6 rounded-lg shadow-lg flex justify-between items-center mt-6">
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

        <!-- Pasukan Khairat Kematian Section -->
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