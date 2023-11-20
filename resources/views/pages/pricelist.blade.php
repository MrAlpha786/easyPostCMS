@extends('layouts.home')

@section('title', 'Price List')

@section('content')

    @php
        $data = [
            ['max_weight' => '50.00', 'max_distance' => '200.00', 'rate' => '35.00'],
            ['max_weight' => '50.00', 'max_distance' => '1000.00', 'rate' => '35.00'],
            ['max_weight' => '50.00', 'max_distance' => '2000.00', 'rate' => '35.00'],
            ['max_weight' => '50.00', 'max_distance' => '10000.00', 'rate' => '35.00'],
            ['max_weight' => '200.00', 'max_distance' => '200.00', 'rate' => '35.00'],
            ['max_weight' => '200.00', 'max_distance' => '1000.00', 'rate' => '40.00'],
            ['max_weight' => '200.00', 'max_distance' => '2000.00', 'rate' => '60.00'],
            ['max_weight' => '200.00', 'max_distance' => '10000.00', 'rate' => '70.00'],
            ['max_weight' => '500.00', 'max_distance' => '200.00', 'rate' => '50.00'],
            ['max_weight' => '500.00', 'max_distance' => '1000.00', 'rate' => '60.00'],
            ['max_weight' => '500.00', 'max_distance' => '2000.00', 'rate' => '80.00'],
            ['max_weight' => '500.00', 'max_distance' => '10000.00', 'rate' => '90.00'],
            ['max_weight' => '501.00', 'max_distance' => '200.00', 'rate' => '15.00'],
            ['max_weight' => '501.00', 'max_distance' => '1000.00', 'rate' => '30.00'],
            ['max_weight' => '501.00', 'max_distance' => '2000.00', 'rate' => '40.00'],
            ['max_weight' => '501.00', 'max_distance' => '10000.00', 'rate' => '50.00'],
        ];
    @endphp
    <h2 class="text-2xl font-semibold mb-6">Courier Price List</h2>
    <div class="overflow-x-auto bg-gray-300 rounded-md shadow-md p-2">
        <table>
            <thead>
                <tr class="border-b-2 border-gray-800">
                    <th class="py-2 px-4 border-r-2 border-gray-800">Max Weight</th>
                    <th class="py-2 px-4">Up to 200 Kms.</th>
                    <th class="py-2 px-4">201 to 1000 Kms.</th>
                    <th class="py-2 px-4">1001 to 2000 Kms.</th>
                    <th class="py-2 px-4">Above 2000 Kms.</th>
                </tr>
            </thead>

            <tbody>
                @php
                    // Extract unique max_distance values
                    $maxDistances = array_unique(array_column($data, 'max_distance'));
                    // Create table rows and fill in values
                    $maxWeights = array_unique(array_column($data, 'max_weight'));
                @endphp

                @foreach ($maxWeights as $maxWeight)
                    <tr>
                        <th class="py-2 px-4 w-3/12 border-r-2 border-gray-800">
                            @if ($maxWeight == '501.00')
                                Additional 500 grams or part thereof
                            @else
                                {{ $maxWeight }} grams
                            @endif
                        </th>

                        @foreach ($maxDistances as $maxDistance)
                            @php
                                $value = '';
                                foreach ($data as $item) {
                                    if ($item['max_weight'] == $maxWeight && $item['max_distance'] == $maxDistance) {
                                        $value = $item['rate'];
                                        break;
                                    }
                                }
                            @endphp
                            <td class="py-2 px-4">&#8377; {{ number_format($value, 2, '.', ',') }}</td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <p class="text-red-500 mt-2">* Please be aware that prices may differ from the current rates and are subject to
        change in the future.</p>
@endsection
