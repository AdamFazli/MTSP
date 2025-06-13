<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Kemaskini Asnaf</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">
                <form action="{{ route('asnaf.update', $asnaf->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Nav tabs 
                    <ul class="nav nav-tabs mb-4" id="asnafTab" role="tablist">
                        <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#personal">Peribadi</a></li>
                        <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#household">Isi Rumah & Kewangan</a></li>
                        <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#zakat">Status Zakat</a></li>
                        <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#admin">Catatan</a></li>
                    </ul>-->

                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="personal">
                            <div class="bg-blue-100 text-blue-700 font-bold px-4 py-2 rounded mb-4 shadow-sm">
                                Peribadi
                            </div>

                            <x-input-label for="name" value="Nama Penuh" />
                            <x-text-input name="name" class="block w-full mb-3" value="{{ old('name', $asnaf->name) }}" required />

                            <x-input-label for="ic" value="No. IC / Passport" />
                            <x-text-input name="ic" class="block w-full mb-3" value="{{ old('ic', $asnaf->ic) }}" required />

                            <x-input-label for="gender" value="Jantina" />
                            <select name="gender" class="block w-full mb-3 border-gray-300 rounded-md">
                                <option value="">-- Pilih --</option>
                                <option value="Lelaki" {{ $asnaf->gender === 'Lelaki' ? 'selected' : '' }}>Lelaki</option>
                                <option value="Perempuan" {{ $asnaf->gender === 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                            </select>

                            <x-input-label for="dob" value="Tarikh Lahir" />
                            <x-text-input type="date" name="dob" class="block w-full mb-3" value="{{ old('dob', $asnaf->dob) }}" required />

                            <x-input-label for="phone" value="No. Telefon" />
                            <x-text-input name="phone" class="block w-full mb-3" value="{{ old('phone', $asnaf->phone) }}" required />

                            <x-input-label for="email" value="Email (Optional)" />
                            <x-text-input name="email" class="block w-full mb-3" value="{{ old('email', $asnaf->email) }}" />

                            <x-input-label for="address" value="Alamat" />
                            <textarea name="address" class="block w-full mb-3 border-gray-300 rounded-md" rows="3">{{ old('address', $asnaf->address) }}</textarea>

                            <x-input-label for="photo" value="Gambar (Tukar jika perlu)" />
                            <x-text-input type="file" name="photo" class="block w-full mb-3" />
                        </div>

                        <div class="tab-pane fade" id="household">
                            <div class="bg-blue-100 text-blue-700 font-bold px-4 py-2 rounded mb-4 shadow-sm">
                                Isi Rumah & Kewangan
                            </div>

                            <x-input-label for="household_size" value="Bilangan Isi Rumah" />
                            <x-text-input type="number" name="household_size" class="block w-full mb-3" value="{{ old('household_size', $asnaf->household_size) }}" required />

                            <x-input-label for="income" value="Pendapatan Bulanan (RM)" />
                            <x-text-input type="number" name="income" class="block w-full mb-3" value="{{ old('income', $asnaf->income) }}" required />

                            <x-input-label for="expenses" value="Perbelanjaan Bulanan (RM)" />
                            <x-text-input type="number" name="expenses" class="block w-full mb-3" value="{{ old('expenses', $asnaf->expenses) }}" required />

                            <x-input-label for="job_status" value="Status Pekerjaan" />
                            <select name="job_status" class="block w-full mb-3 border-gray-300 rounded-md">
                                <option>-- Pilih --</option>
                                <option {{ $asnaf->job_status === 'Berkerja' ? 'selected' : '' }}>Berkerja</option>
                                <option {{ $asnaf->job_status === 'Tidak Berkerja' ? 'selected' : '' }}>Tidak Berkerja</option>
                                <option {{ $asnaf->job_status === 'Sambilan' ? 'selected' : '' }}>Sambilan</option>
                                <option {{ $asnaf->job_status === 'Sendiri' ? 'selected' : '' }}>Sendiri</option>
                            </select>

                            <x-input-label for="assets" value="Aset (Jika Ada)" />
                            <textarea name="assets" class="block w-full mb-3 border-gray-300 rounded-md" rows="2">{{ old('assets', $asnaf->assets) }}</textarea>

                            <x-input-label for="debts" value="Hutang (Jika Ada)" />
                            <textarea name="debts" class="block w-full mb-3 border-gray-300 rounded-md" rows="2">{{ old('debts', $asnaf->debts) }}</textarea>
                        </div>

                        <div class="tab-pane fade" id="zakat">
                            <div class="bg-blue-100 text-blue-700 font-bold px-4 py-2 rounded mb-4 shadow-sm">
                                Status Zakat
                            </div>

                            <x-input-label for="category" value="Kategori Asnaf" />
                            <select name="category" class="block w-full mb-3 border-gray-300 rounded-md" required>
                                <option>-- Pilih --</option>
                                @foreach (['Fakir', 'Miskin', 'Amil', 'Muallaf', 'Gharimin'] as $cat)
                                <option value="{{ $cat }}" {{ $asnaf->category === $cat ? 'selected' : '' }}>{{ $cat }}</option>
                                @endforeach
                            </select>

                            <x-input-label for="status" value="Status Kelayakan Zakat" />
                            <select name="status" class="block w-full mb-3 border-gray-300 rounded-md" required>
                                <option>Layak</option>
                                <option {{ $asnaf->status === 'Tidak Layak' ? 'selected' : '' }}>Tidak Layak</option>
                                <option {{ $asnaf->status === 'Sedang Dinilai' ? 'selected' : '' }}>Sedang Dinilai</option>
                            </select>

                            <x-input-label for="documents" value="Dokumen Sokongan (PDF)" />
                            <x-text-input type="file" name="documents" class="block w-full mb-3" />

                            <x-input-label for="notes" value="Catatan Penilaian" />
                            <textarea name="notes" class="block w-full mb-3 border-gray-300 rounded-md" rows="2">{{ old('notes', $asnaf->notes) }}</textarea>
                        </div>

                        <div class="tab-pane fade" id="admin">
                            <div class="bg-blue-100 text-blue-700 font-bold px-4 py-2 rounded mb-4 shadow-sm">
                                Catatan
                            </div>

                            <x-input-label for="officer" value="Pegawai Bertugas" />
                            <x-text-input name="officer" class="block w-full mb-3" value="{{ old('officer', $asnaf->officer) }}" />

                            <x-input-label for="remarks" value="Catatan Tambahan" />
                            <textarea name="remarks" class="block w-full mb-3 border-gray-300 rounded-md" rows="2">{{ old('remarks', $asnaf->remarks) }}</textarea>

                            <x-input-label for="follow_up" value="Tindakan Susulan" />
                            <textarea name="follow_up" class="block w-full mb-3 border-gray-300 rounded-md" rows="2">{{ old('follow_up', $asnaf->follow_up) }}</textarea>
                        </div>
                    </div>

                    <x-primary-button class="mt-4">
                        Kemaskini
                    </x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>