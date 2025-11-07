<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'href' => route('admin.dashboard'),
],
[
        'name' => 'Roles',
        'href' => route('admin.roles.index'),
],
[
        'name' => 'Edit',
],
]">

<x-wire-card>
        <form action="{{ route('admin.roles.store') }}" method="POST">
                @csrf

                <x-wire-input
                label="Name"
                name="name"
                placeholder="Role"
                value="{{ old('name') }}"
                >
                </x-wire-input>
                <div class="flex justify-start mt-3">
                        <x-wire-button blue type="submit">
                        Save
                </x-wire-button>
                </div>
        </form>
</x-wire-card>
</x-admin-layout>