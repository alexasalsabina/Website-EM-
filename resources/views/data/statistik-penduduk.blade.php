@extends('layouts.app')

@section('title', 'Statistik Penduduk')

@section('content')
    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold mb-4">Statistik Penduduk Desa Jatisari</h1>

        @php
            $jsonPath = storage_path('app/statistik.json');
            $rows = null;
            if (file_exists($jsonPath)) {
                $content = file_get_contents($jsonPath);
                $rows = json_decode($content, true);
            }
        @endphp

        @if($rows && is_array($rows) && count($rows) > 0)
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border">
                    <thead>
                        <tr class="bg-gray-100">
                            @foreach(array_keys($rows[0]) as $col)
                                <th class="px-4 py-2 border text-left">{{ $col }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($rows as $r)
                            <tr>
                                @foreach($r as $cell)
                                    <td class="px-4 py-2 border">{{ $cell }}</td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p class="mb-4">Data file not found. To display the Excel data here, export the spreadsheet to JSON and place it at <code>storage/app/statistik.json</code>.</p>

            <p class="mb-2">Example instructions:</p>
            <ol class="list-decimal pl-6 mb-6">
                <li>Open the Excel file and save/export it as CSV or JSON.</li>
                <li>Convert CSV to JSON with your preferred tool (many online converters or use Excel / Python / LibreOffice).</li>
                <li>Save the JSON file as <code>storage/app/statistik.json</code> in the project root.</li>
            </ol>

            <h2 class="text-xl font-semibold mb-2">Sample table</h2>
            <div class="grid grid-cols-3 gap-4">
                <div class="p-4 bg-white border">
                    <div class="text-3xl font-bold">0</div>
                    <div class="text-sm text-gray-600">Penduduk</div>
                </div>
                <div class="p-4 bg-white border">
                    <div class="text-3xl font-bold">0</div>
                    <div class="text-sm text-gray-600">Laki-laki</div>
                </div>
                <div class="p-4 bg-white border">
                    <div class="text-3xl font-bold">0</div>
                    <div class="text-sm text-gray-600">Perempuan</div>
                </div>
            </div>
        @endif
    </div>
@endsection
