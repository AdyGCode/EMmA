<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Equipment Type Details
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-12">

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
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


