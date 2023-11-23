@extends('layouts.admin')

<!-- Setting the title for the 'About Us' page -->
@section('title', 'Prices')

@section('content')
    <div class="bg-slate-200 p-4 rounded-md shadow-md ">
        <div class="flex justify-between items-center">
            <h3 class="text-lg font-semibold">Price List</h3>
            <x-primaryButton id="edit-menu" class="px-4 py-2" onclick="toggleMenu('edit-menu', 'update-menu')">
                Edit Prices
            </x-primaryButton>
            <div id="update-menu" class="hidden">
                <x-secondaryButton>
                    <a href="{{ route('editPrices') }}" class="px-4 py-2 mx-4">cancel</a>
                </x-secondaryButton>
                <x-primaryButton class="px-4 py-2"
                    onclick="event.preventDefault(); document.getElementById('priceForm').submit();">
                    Update
                </x-primaryButton>
            </div>
        </div>
    </div>
    <p class="text-red-500 my-4">* Please be careful while editing, if any field is wrong whole data will get rejected.</p>
    <div class="overflow-x-auto bg-slate-200 rounded-md shadow-md p-2">
        <form id="priceForm" action="{{ route('updatePrices') }}" method="post">
            @csrf
            @method('PUT')
            <fieldset id="fieldset" disabled>
                <table id="priceTable">
                    <thead>
                        <tr class="py-2 border-b-2 border-gray-800">
                            <th class="px-4 border-r-2 border-gray-800"></th>
                            <th class="px-4">Up to 200 Kms.</th>
                            <th class="px-4">201 to 1000 Kms.</th>
                            <th class="px-4">1001 to 2000 Kms.</th>
                            <th class="px-4">Above 2000 Kms.</th>
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
                                        Upto {{ $maxWeight }} grams
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
                                    <td class="py-2
                px-4">
                                        <input
                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight @error('newData.' . $maxWeight . '.' . $maxDistance) border-red-500 @enderror"
                                            name="newData[{{ $maxWeight }}][{{ $maxDistance }}]"
                                            value="{{ number_format($value, 2, '.', ',') }}" />
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </fieldset>
        </form>
    </div>
@endsection

<script>
    function toggleMenu() {
        event.preventDefault();
        document.getElementById('edit-menu').classList.toggle('hidden');
        document.getElementById('update-menu').classList.replace('hidden', 'flex');

        // Toggle the fieldset
        const fieldset = document.getElementById('fieldset');
        fieldset.disabled = !fieldset.disabled;
    }
</script>
