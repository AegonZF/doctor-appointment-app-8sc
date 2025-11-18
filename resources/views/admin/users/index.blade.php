<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'href' => route('admin.dashboard'),
    ],
    [
        'name' => 'Users',
    ],
]">
     <x-slot name="action">
                <x-wire-button blue href="{{ route('admin.users.index') }}">
                        <i class="fa-solid fa-plus-circle"></i>
                        New
                </x-wire-button>
        </x-slot>

    
        @livewire('admin.datatables.user-table')
</x-admin-layout>
