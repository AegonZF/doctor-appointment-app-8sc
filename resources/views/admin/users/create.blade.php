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
        'name' => 'Create',
    ],
]">

<x-wire-card>
    <form action="{{ route('admin.users.store') }}" method="POST">
        @csrf

        <x-wire-input label="Name" name="name" placeholder="Full name" value="{{ old('name') }}" />
        <x-wire-input label="Email" name="email" placeholder="email@example.com" value="{{ old('email') }}" />
        <x-wire-input label="Password" name="password" type="password" placeholder="Password" />
        <x-wire-input label="Confirm Password" name="password_confirmation" type="password" placeholder="Confirm password" />

        <div class="flex justify-start mt-3">
            <x-wire-button blue type="submit">Create</x-wire-button>
        </div>
    </form>
</x-wire-card>

</x-admin-layout>
