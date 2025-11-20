<div style="padding: 40px;">

    {{-- VISI --}}
    <div class="section-box text-center" style="border-color: #4CAF50;">
        <h2 class="title-text">Visi</h2>

        <p class="visi-text">
            {{ $visiMisi->visi ?? 'Belum ada visi.' }}
        </p>
    </div>

    {{-- MISI --}}
    <div class="section-box text-center">
        <h2 class="title-text">Misi</h2>

        <ul class="misi-list">
            @if ( $visiMisi->misi)
                @foreach (explode("\n", $visiMisi->misi) as $index => $item)
                    @if (trim($item) != '')
                        <li class="misi-item">{{ $index + 1 }}. {{ $item }}</li>
                    @endif
                @endforeach
            @else
                <li class="misi-item">Belum ada misi.</li>
            @endif
        </ul>
    </div>

</div>
<style>
    .section-box {
        border: 2px solid #2196F3;
        border-radius: 8px;
        padding: 20px;
        margin-bottom: 30px;
        background-color: #f9f9f9;
    }

    .title-text {
        font-size: 28px;
        color: #333;
        margin-bottom: 15px;
        font-weight: bold;
    }

    .visi-text {
        font-size: 18px;
        color: #555;
        line-height: 1.6;
    }

    .misi-list {
        list-style-type: none;
        padding-left: 0;
    }

    .misi-item {
        font-size: 18px;
        color: #555;
        margin-bottom: 10px;
        line-height: 1.6;
    }
</style>