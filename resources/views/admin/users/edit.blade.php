<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'href' => route('admin.dashboard'),
    ],
    [
        'name' => 'Users',
        'href' => route('admin.users.index'),
    ],
    [
        'name' => 'Edit',
    ],
]">

<x-wire-card>
    <form action="{{ route('admin.users.update', $user) }}" method="POST">
        @csrf
        @method('PUT')

        <x-wire-input label="Name" name="name" placeholder="Full name" value="{{ old('name', $user->name) }}" />
        <x-wire-input label="Email" name="email" placeholder="email@example.com" value="{{ old('email', $user->email) }}" />
        <x-wire-input label="New Password" name="password" type="password" placeholder="Leave blank to keep current" />
        <x-wire-input label="Confirm Password" name="password_confirmation" type="password" placeholder="Confirm password" />

        <div class="flex justify-start mt-3">
            <x-wire-button blue type="submit">Update</x-wire-button>
        </div>
    </form>
</x-wire-card>

</x-admin-layout>
