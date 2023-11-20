<!-- Form for registering a courier with CSRF protection -->
<form class="grid" action="{{ route('registerCourier') }}" method="post" id="register-courier-form">
    @csrf <!-- Generate a CSRF token -->

    <div class="grid grid-cols-2 gap-4">

        <!-- Sender Information -->
        <div class="bg-slate-200 p-4 rounded-md shadow-md">
            <h3 class="text-lg font-semibold mb-4">Sender Information</h3>

            <!-- Custom input components for sender information -->
            <x-input id="sender_name" label="Sender Name" name="sender_name" type="text" />
            <x-input id="sender_address" label="Sender Address" name="sender_address" type="textarea" />
            <x-input id="sender_contact" label="Sender Contact" name="sender_contact" type="text" />
            <x-input id="sender_pincode" label="Sender Pincode" name="sender_pincode" type="text" />
        </div>

        <!-- Recipient Information -->
        <div class="bg-slate-200 p-4 rounded-md shadow-md">
            <h3 class="text-lg font-semibold mb-4">Recipient Information</h3>

            <!-- Custom input components for recipient information -->
            <x-input id="recipient_name" label="Recipient Name" name="recipient_name" type="text" />
            <x-input id="recipient_address" label="Recipient Address" name="recipient_address" type="textarea" />
            <x-input id="recipient_contact" label="Recipient Contact" name="recipient_contact" type="text" />
            <x-input id="recipient_pincode" label="Recipient Pincode" name="recipient_pincode" type="text" />
        </div>
    </div>

    <!-- Courier Information -->
    <div class="bg-slate-200 p-4 mt-4 rounded-md shadow-md">
        <h3 class="text-lg font-semibold mb-4">Courier Information</h3>

        <table class="table table-bordered" id="courier-details">
            <tbody>
                <tr class="align-top">
                    <td>

                        <!-- Custom input component for weight -->
                        <x-input id="weight" label="Weight (gm)" name="weight" type="text" />
                    </td>
                    <td>

                        <!-- Custom input component for height -->
                        <x-input id="height" label="Height (cm)" name="height" type="text" />
                    </td>
                    <td>

                        <!-- Custom input component for length -->
                        <x-input id="length" label="Length (cm)" name="length" type="text" />
                    </td>
                    <td>

                        <!-- Custom input component for width -->
                        <x-input id="width" label="Width (cm)" name="width" type="text" />
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    @auth
        <div class="bg-slate-200 p-4 mt-4 rounded-md shadow-md ">
            <h3 class="text-lg font-semibold mb-4">Status</h3>
            <x-dropdown id="status" label="Status" name="status">
                @foreach ($statusOptions as $option)
                    <option value="{{ $option }}">{{ $option->toString() }}</option>
                @endforeach
            </x-dropdown>
        </div>
    @endauth


    <!-- Custom primary button component for submitting and paying -->
    <x-primaryButton label="Submit & Pay" class="justify-self-end mt-4"><input type="submit"
            value="@auth Submit @else Submit & Pay @endauth"></x-primaryButton>
</form>
