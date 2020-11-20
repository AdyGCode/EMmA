<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Manage Equipment Types
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-12">

            @if (session()->has('message'))
                <div
                    class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3"
                    role="alert">
                    <div class="flex">
                        <div>
                            <p class="text-sm">{{ session('message') }}</p>
                        </div>
                    </div>
                </div>
            @endif

            <button wire:click="create()"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3">
                Create Equipment Type
            </button>
            @if($isOpen)
                @include('livewire.equipmentTypes.create')
            @endif

            <table class="table-fixed w-full">
                <thead>
                <tr class="bg-gray-100">
                    <th class="px-4 py-2 w-20">No.</th>
                    <th class="px-4 py-2 w-32">Code</th>
                    <th class="px-4 py-2">Name</th>
                    <th class="px-4 py-2 w-16 text-center">Icon</th>
                    <th class="px-4 py-2 w-64 ">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($equipmentTypes as $equipmentType)
                    <tr>
                        <td class="border px-4 py-2">{{ $equipmentType->id }}</td>
                        <td class="border px-4 py-2">{{ $equipmentType->code }}</td>
                        <td class="border px-4 py-2">{{ $equipmentType->name}}</td>
                        <td class="border px-4 py-2 text-center">
                            <i class="fa fa-{{$equipmentType->icon}}"></i>
                        </td>
                        <td class="border px-4 py-2 text-center">
                            <button wire:click="edit({{ $equipmentType->id }})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</button>
                            <button wire:click="delete({{ $equipmentType->id }})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


