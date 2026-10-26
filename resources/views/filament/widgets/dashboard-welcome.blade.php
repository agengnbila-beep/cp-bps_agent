<x-filament-widgets::widget>
    <div
        style="
        background: linear-gradient(120deg, #1769D2, #173B68);
        border-radius: 18px;
        padding: 30px;
        color: white;
        box-shadow: 0 10px 25px rgba(23,105,210,0.15);
    ">
        <div
            style="
            font-size: 12px;
            letter-spacing: 1.5px;
            opacity: 0.85;
            margin-bottom: 10px;
        ">
            CP-BPS BATANGHARI
        </div>

        <h2
            style="
            font-size: 26px;
            font-weight: 750;
            margin-bottom: 10px;
            color: white;
        ">
            Selamat Datang, {{ auth()->user()->name }}!
        </h2>

        <p
            style="
            font-size: 14px;
            opacity: 0.9;
            line-height: 1.7;
            color: white;
        ">
            Kelola sumber data statistik dan informasi
            untuk AI Agent BPS Batanghari melalui
            dashboard administrasi.
        </p>
    </div>
</x-filament-widgets::widget>
