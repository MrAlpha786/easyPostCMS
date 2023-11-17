@extends('layouts.homeLayout')

@section('title', 'Courier Registration')

@section('content')

    <h2 class="text-2xl font-semibold mb-6">Courier Information Form</h2>

    <form action="/register-courier" method="post" id="register-courier-form">
        @csrf <!-- Add this line to include CSRF protection -->

        <div class="grid grid-cols-2 gap-4">
            <!-- Sender Information -->
            <div class="bg-slate-200 p-4 ml-0 m-4 rounded-md">
                <h3 class="text-lg font-semibold mb-4">Sender Information</h3>

                @include('partials.formInput', [
                    'inputId' => 'sender_name',
                    'labelText' => 'Sender Name',
                    'inputName' => 'sender_name',
                    'inputType' => 'text',
                ])

                @include('partials.formInput', [
                    'inputId' => 'sender_address',
                    'labelText' => 'Sender Address',
                    'inputName' => 'sender_address',
                    'inputType' => 'textarea',
                ])

                @include('partials.formInput', [
                    'inputId' => 'sender_contact',
                    'labelText' => 'Sender Contact',
                    'inputName' => 'sender_contact',
                    'inputType' => 'text',
                ])

                @include('partials.formInput', [
                    'inputId' => 'sender_pincode',
                    'labelText' => 'Sender Pincode',
                    'inputName' => 'sender_pincode',
                    'inputType' => 'text',
                ])
            </div>

            <!-- Recipient Information -->
            <div class="bg-slate-200 p-4 m-4 ml-0 rounded-md">
                <h3 class="text-lg font-semibold mb-4">Recipient Information</h3>

                @include('partials.formInput', [
                    'inputId' => 'recipient_name',
                    'labelText' => 'Recipient Name',
                    'inputName' => 'recipient_name',
                    'inputType' => 'text',
                ])

                @include('partials.formInput', [
                    'inputId' => 'recipient_address',
                    'labelText' => 'Recipient Address',
                    'inputName' => 'recipient_address',
                    'inputType' => 'textarea',
                ])

                @include('partials.formInput', [
                    'inputId' => 'recipient_contact',
                    'labelText' => 'Recipient Contact',
                    'inputName' => 'recipient_contact',
                    'inputType' => 'text',
                ])

                @include('partials.formInput', [
                    'inputId' => 'recipient_pincode',
                    'labelText' => 'Recipient Pincode',
                    'inputName' => 'recipient_pincode',
                    'inputType' => 'text',
                ])
            </div>
        </div>

        <!-- Parcel Information -->
        <div class="bg-slate-200 p-4 m-4 ml-0 rounded-md">
            <h3 class="text-lg font-semibold mb-4">Parcel Information</h3>

            <table class="table table-bordered" id="parcel-items">
                <tbody>
                    <tr class="align-top">
                        <td>
                            @include('partials.formInput', [
                                'inputId' => 'weight',
                                'labelText' => 'Weight (gm)',
                                'inputName' => 'weight',
                                'inputType' => 'text',
                            ])
                        </td>
                        <td>
                            @include('partials.formInput', [
                                'inputId' => 'height',
                                'labelText' => 'Height (cm)',
                                'inputName' => 'height',
                                'inputType' => 'text',
                            ])
                        </td>
                        <td>
                            @include('partials.formInput', [
                                'inputId' => 'length',
                                'labelText' => 'Length (cm)',
                                'inputName' => 'length',
                                'inputType' => 'text',
                            ])
                        </td>
                        <td>
                            @include('partials.formInput', [
                                'inputId' => 'width',
                                'labelText' => 'Width (cm)',
                                'inputName' => 'width',
                                'inputType' => 'text',
                            ])
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Submit Button -->
        <div class="text-center mt-6">
            <button type="submit"
                class="bg-gray-800 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:shadow-outline-blue active:bg-blue-800">
                Submit & Pay
            </button>
        </div>
    </form>
@endsection
