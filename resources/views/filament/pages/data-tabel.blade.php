<x-filament-panels::page>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($this->getIndikators() as $indikator)
            <x-filament::section>
                <x-slot name="heading">
                    {{ $indikator->nama }}
                </x-slot>

                <div class="space-y-2 text-sm">
                    <p class="flex justify-between">
                        <span class="text-gray-400">Tanggal Ditambahkan:</span>
                        <span>{{ $indikator->created_at ? $indikator->created_at->format('d M Y') : '-' }}</span>
                    </p>
                    <p class="flex justify-between">
                        <span class="text-gray-400">Jumlah Baris:</span>
                        <span>{{ $indikator->data_indikators_count }}</span>
                    </p>
                    <p class="flex justify-between">
                        <span class="text-gray-400">Jumlah Kolom:</span>
                        <span>5</span>
                    </p>
                    <p class="flex justify-between">
                        <span class="text-gray-400">Tentang:</span>
                        <span>{{ Str::limit($indikator->deskripsi ?? 'Tidak ada deskripsi', 30) }}</span>
                    </p>
                </div>

                <div class="mt-4 pt-4 border-t border-gray-700 flex justify-end">
                    <x-filament::button
                        tag="a"
                        href="{{ \App\Filament\Resources\Indikators\IndikatorResource::getUrl('edit', ['record' => $indikator]) }}"
                        size="sm"
                        color="gray"
                        icon="heroicon-m-arrow-right"
                        icon-position="after"
                    >
                        Detail
                    </x-filament::button>
                </div>
            </x-filament::section>
        @endforeach
    </div>
</x-filament-panels::page>