<!-- resources/views/admin/editUser.blade.php -->

<form class="grid" action="{{ $formRoute }}" method="post" id="create-user-form">
    @csrf <!-- Generate a CSRF token -->
    @method($method)

    <div class="grid grid-cols-2 gap-4 mb-4">

        <!-- Personal Information -->
        <div class="bg-slate-200 p-6 rounded-md shadow-md">
            <h3 class="text-lg font-semibold mb-4">Personal Information</h3>

            <!-- First Name and Last Name side by side -->
            <div class="grid grid-cols-2 gap-4">
                <x-input id="firstname" label="First Name" name="firstname" type="text" class="col-span-1"
                    :value="old('firstname', $firstname ?? '')" />
                <x-input id="lastname" label="Last Name" name="lastname" type="text" class="col-span-1"
                    :value="old('lastname', $lastname ?? '')" />
            </div>

        </div>

        <!-- Employee Information -->
        <div class="bg-slate-200 p-6 rounded-md shadow-md">
            <h3 class="text-lg font-semibold mb-4">Employee Information</h3>

            <!-- Dropdown for Role -->
            <x-dropdown id="role" label="Role" name="role" :value="old('role', $role ?? '')">
                @foreach ($roleOptions as $option)
                    <option value="{{ $option }}">
                        {{ $option->toString() }}
                    </option>
                @endforeach
            </x-dropdown>

        </div>

    </div>

    <!-- Login Information -->
    <div class="bg-slate-200 p-6 rounded-md shadow-md">
        <h3 class="text-lg font-semibold mb-4">Login Information</h3>
        <div class="grid grid-cols-2 gap-4">
            <x-input id="email" label="Email" name="email" type="email" class="mt-4" :value="old('email', $email ?? '')" />

            <x-input id="password" label="Password" name="password" type="password" class="mt-4" />
            <x-input id="password_confirmation" label="Confirm Password" name="password_confirmation" type="password"
                class="mt-4" />
        </div>
    </div>

    <!-- Custom primary button component for user registration -->
    <x-primaryButton label="Submit" class="justify-self-end mt-6">
        <input type="submit" value="Submit">
    </x-primaryButton>
</form>
