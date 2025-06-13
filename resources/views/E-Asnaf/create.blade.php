<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Tambah Asnaf</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">
                <form action="{{ route('asnaf.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Nav tabs
                    <ul class="nav nav-tabs mb-4" id="asnafTab" role="tablist">
                        <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#personal">Peribadi</a></li>
                        <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#household">Isi Rumah & Kewangan</a></li>
                        <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#zakat">Status Zakat</a></li>
                        <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#admin">Catatan</a></li>
                    </ul>-->

                    <!-- Tab content -->
                    <div class="tab-content">

                        <!-- Peribadi -->
                        <div class="tab-pane fade show active" id="personal">
                            <div class="bg-blue-100 text-blue-700 font-bold px-4 py-2 rounded mb-4 shadow-sm">
                                Peribadi
                            </div>

                            <x-input-label for="name" value="Nama Penuh" />
                            <x-text-input name="name" class="block w-full mb-3" required />

                            <x-input-label for="ic" value="No. IC / Passport" />
                            <x-text-input name="ic" class="block w-full mb-3" required />

                            <x-input-label for="gender" value="Jantina" />
                            <select name="gender" class="block w-full mb-3 border-gray-300 rounded-md">
                                <option value="">-- Pilih --</option>
                                <option value="Lelaki">Lelaki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>

                            <x-input-label for="dob" value="Tarikh Lahir" />
                            <x-text-input type="date" name="dob" class="block w-full mb-3" required />

                            <x-input-label for="phone" value="No. Telefon" />
                            <x-text-input name="phone" class="block w-full mb-3" required />

                            <x-input-label for="email" value="Email (Optional)" />
                            <x-text-input name="email" class="block w-full mb-3" />

                            <x-input-label for="address" value="Alamat" />
                            <textarea name="address" class="block w-full mb-3 border-gray-300 rounded-md" rows="3"></textarea>

                            <x-input-label for="photo" value="Gambar (Optional)" />
                            <x-text-input type="file" name="photo" class="block w-full mb-3" />
                        </div>

                        <!-- Isi Rumah & Kewangan -->
                        <div class="tab-pane fade" id="household">
                            <div class="bg-blue-100 text-blue-700 font-bold px-4 py-2 rounded mb-4 shadow-sm">
                                Isi Rumah & Kewangan
                            </div>

                            <x-input-label for="household_size" value="Bilangan Isi Rumah" />
                            <x-text-input type="number" name="household_size" class="block w-full mb-3" required />

                            <x-input-label for="income" value="Pendapatan Bulanan (RM)" />
                            <x-text-input type="number" name="income" class="block w-full mb-3" required />

                            <x-input-label for="expenses" value="Perbelanjaan Bulanan (RM)" />
                            <x-text-input type="number" name="expenses" class="block w-full mb-3" required />

                            <x-input-label for="job_status" value="Status Pekerjaan" />
                            <select name="job_status" class="block w-full mb-3 border-gray-300 rounded-md">
                                <option>-- Pilih --</option>
                                <option>Berkerja</option>
                                <option>Tidak Berkerja</option>
                                <option>Sambilan</option>
                                <option>Sendiri</option>
                            </select>

                            <x-input-label for="assets" value="Aset (Jika Ada)" />
                            <textarea name="assets" class="block w-full mb-3 border-gray-300 rounded-md" rows="2"></textarea>

                            <x-input-label for="debts" value="Hutang (Jika Ada)" />
                            <textarea name="debts" class="block w-full mb-3 border-gray-300 rounded-md" rows="2"></textarea>
                        </div>

                        <!-- Status Zakat -->
                        <div class="tab-pane fade" id="zakat">
                            <div class="bg-blue-100 text-blue-700 font-bold px-4 py-2 rounded mb-4 shadow-sm">
                                Status Zakat
                            </div>

                            <x-input-label for="category" value="Kategori Asnaf" />
                            <select name="category" class="block w-full mb-3 border-gray-300 rounded-md" required>
                                <option>-- Pilih --</option>
                                <option>Fakir</option>
                                <option>Miskin</option>
                                <option>Amil</option>
                                <option>Muallaf</option>
                                <option>Gharimin</option>
                            </select>

                            <x-input-label for="status" value="Status Kelayakan Zakat" />
                            <select name="status" class="block w-full mb-3 border-gray-300 rounded-md" required>
                                <option>Layak</option>
                                <option>Tidak Layak</option>
                                <option>Sedang Dinilai</option>
                            </select>

                            <x-input-label for="documents" value="Dokumen Sokongan (PDF)" />
                            <x-text-input type="file" name="documents" class="block w-full mb-3" />

                            <x-input-label for="notes" value="Catatan Penilaian" />
                            <textarea name="notes" class="block w-full mb-3 border-gray-300 rounded-md" rows="2"></textarea>
                        </div>

                        <!-- Catatan -->
                        <div class="tab-pane fade" id="admin">
                            <div class="bg-blue-100 text-blue-700 font-bold px-4 py-2 rounded mb-4 shadow-sm">
                                Catatan
                            </div>

                            <x-input-label for="officer" value="Pegawai Bertugas" />
                            <x-text-input name="officer" class="block w-full mb-3" />

                            <x-input-label for="remarks" value="Catatan Tambahan" />
                            <textarea name="remarks" class="block w-full mb-3 border-gray-300 rounded-md" rows="2"></textarea>

                            <x-input-label for="follow_up" value="Tindakan Susulan" />
                            <textarea name="follow_up" class="block w-full mb-3 border-gray-300 rounded-md" rows="2"></textarea>
                        </div>
                    </div>

                    <x-primary-button class="mt-4">
                        Simpan
                    </x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>