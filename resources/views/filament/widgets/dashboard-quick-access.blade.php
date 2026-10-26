<x-filament-widgets::widget>
    <div
        style="
        background: #ffffff;
        border: 1px solid #e3ebf5;
        border-radius: 18px;
        padding: 24px;
        box-shadow: 0 4px 18px rgba(23,59,104,0.04);
    ">
        <h2
            style="
            font-size: 20px;
            font-weight: 700;
            color: #173b68;
            margin-bottom: 5px;
        ">
            Akses Cepat
        </h2>

        <p style="
            color: #64748b;
            font-size: 13px;
            margin-bottom: 20px;
        ">
            Kelola sumber data AI Agent BPS Batanghari.
        </p>

        <div
            style="
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(min(100%, 240px), 1fr));
            gap: 16px;
        ">
            <a href="{{ \App\Filament\Resources\DataTabels\DataTabelResource::getUrl('index') }}"
                style="
                   display: block;
                   padding: 22px;
                   border: 1px solid #dbeafe;
                   border-radius: 14px;
                   background: #f8fbff;
                   text-decoration: none;
               ">
                <div style="font-size: 30px; margin-bottom: 12px;">
                    📊
                </div>

                <h3
                    style="
                    font-size: 16px;
                    font-weight: 700;
                    color: #1769d2;
                    margin-bottom: 8px;
                ">
                    Data Tabel
                </h3>

                <p
                    style="
                    font-size: 13px;
                    color: #64748b;
                    line-height: 1.6;
                    margin-bottom: 16px;
                ">
                    Kelola file CSV dan Excel sebagai sumber
                    data statistik AI Agent.
                </p>

                <span
                    style="
                    color: #1769d2;
                    font-size: 13px;
                    font-weight: 600;
                ">
                    Buka Data Tabel &rarr;
                </span>
            </a>

            <a href="{{ \App\Filament\Resources\DataParagrafs\DataParagrafResource::getUrl('index') }}"
                style="
                   display: block;
                   padding: 22px;
                   border: 1px solid #e9d5ff;
                   border-radius: 14px;
                   background: #fcfaff;
                   text-decoration: none;
               ">
                <div style="font-size: 30px; margin-bottom: 12px;">
                    📄
                </div>

                <h3
                    style="
                    font-size: 16px;
                    font-weight: 700;
                    color: #7c3aed;
                    margin-bottom: 8px;
                ">
                    Data Paragraf
                </h3>

                <p
                    style="
                    font-size: 13px;
                    color: #64748b;
                    line-height: 1.6;
                    margin-bottom: 16px;
                ">
                    Kelola informasi teks dan paragraf
                    untuk sumber pengetahuan AI Agent.
                </p>

                <span
                    style="
                    color: #7c3aed;
                    font-size: 13px;
                    font-weight: 600;
                ">
                    Buka Data Paragraf &rarr;
                </span>
            </a>
        </div>
    </div>
</x-filament-widgets::widget>
