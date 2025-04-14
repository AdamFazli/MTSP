<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Visi dan Misi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-2xl font-bold mb-4">Visi</h3>
                    <p class="mb-8">
                        Terbilang akademik, unggul sahsiah dan diteladani.
                    </p>

                    <h3 class="text-2xl font-bold mb-4">Misi</h3>
                    <p>
                        Melahirkan pelajar yang berilmu, beriman dan beramal dengan sahsiah terpuji, 
                        berketerampilan berurusan berlandaskan Al-Quran dan hadis bagi memenuhi 
                        ciri-ciri "خير الامة", seiring dengan pentadbiran dan pengurusan yang berintegriti, 
                        persekitaran yang kondusif dan sejahtera.
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
