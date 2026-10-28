<x-filament-panels::page>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($this->getIndikators() as $indikator)
            <div class="bg-gray-800 rounded-xl p-6 shadow-lg border border-gray-700 flex flex-col justify-between">
                <div>
                    <h3 class="text-lg font-bold text-white mb-4">{{ $indikator->nama }}</h3>
                    
                    <div class="text-sm text-gray-400 space-y-2 mb-6">
                        <p><span class="font-semibold text-gray-300">Tanggal Ditambahkan:</span> {{ $indikator->created_at ? $indikator->created_at->format('d M Y') : '-' }}</p>
                        <p><span class="font-semibold text-gray-300">Jumlah Baris:</span> {{ $indikator->data_indikators_count }}</p>
                        <p><span class="font-semibold text-gray-300">Jumlah Kolom:</span> 5</p>
                        <p><span class="font-semibold text-gray-300">Tentang:</span> {{ Str::limit($indikator->deskripsi ?? 'Tidak ada deskripsi', 60) }}</p>
                    </div>
                </div>

                <div class="flex justify-end mt-4 pt-4 border-t border-gray-700">
                    <a href="{{ \App\Filament\Resources\Indikators\IndikatorResource::getUrl('edit', ['record' => $indikator]) }}" class="text-sm font-medium text-blue-400 hover:text-blue-300 flex items-center gap-1">
                        Detail <x-heroicon-m-arrow-right class="w-4 h-4"/>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</x-filament-panels::page>