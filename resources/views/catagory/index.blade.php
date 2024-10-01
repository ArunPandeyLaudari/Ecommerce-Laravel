@extends('layouts.app')
@section('content')
    <h1 class="text-3xl font-medium text-blue-900">Catagories</h1>
    <hr class="h-1 bg-red-500">
    <div class="my-5 text-right">
        <a href="{{ route('catagory.create') }}" class="px-5 py-3 text-white bg-blue-900 rounded-lg">Add Catagory</a>
    </div>

    <table class="w-full mt-5">
        <tr>
            <th class="p-2 bg-gray-200 border">Order</th>
            <th class="p-2 bg-gray-200 border">Catagory</th>
            <th class="p-2 bg-gray-200 border">Action</th>
        </tr>

        {{-- // Loop through the catagories and display them in the table --}}
        @foreach ($catagories as $catagory)
            <tr class="text-center">
                <td class="p-2 border">{{ $catagory->priority }}</td>
                <td class="p-2 border">{{ $catagory->name }}</td>
                <td class="p-2 border">
                    <a href="{{ route('catagory.edit', $catagory->id) }}"
                        class="px-3 py-1 font-medium text-white bg-blue-900 rounded">Edit</a>
                    <a class="px-3 py-1 font-medium text-white bg-red-600 rounded cursor-pointer"
                        onclick="showpopup({{ $catagory->id }})">Delete</a>

                </td>
            </tr>
        @endforeach

    </table>

    {{-- Pop up mode --}}

    <div class="fixed inset-0 items-center justify-center hidden bg-gray-600 bg-opacity-50 backdrop-blur-sm" id="popup">
        <form action="{{ route('catagory.delete') }}" class="px-10 py-5 text-center bg-white rounded-lg" method="POST">
            @csrf

            @method('DELETE')

            <h1 class="mb-4 text-2xl font-medium text-blue-900">Confirm Deletion</h1>
            <p class="mb-6 text-gray-700">Are you sure Delete? <br> <span class="text-red-400">This action cannot be
                    undone.</span>
            </p>

            <input type="hidden" name="id" id="catagory_id">
            <div class="flex justify-center space-x-4">
                <button type="submit" class="px-5 py-2 text-white bg-red-600 rounded-lg hover:bg-red-700">Yes,
                    Delete</button>
                <a onclick="hidepopup()"
                    class="px-5 py-2 text-white bg-gray-600 rounded-lg cursor-pointer hover:bg-gray-700">Cancel</a>
            </div>
        </form>
    </div>

    {{-- end pop up model --}}
@endsection

<script>
    function showpopup(catagory_id) {
        document.getElementById('popup').classList.remove('hidden');
        document.getElementById('popup').classList.add('flex');
        document.getElementById('catagory_id').value = catagory_id;
    }

    function hidepopup() {
        document.getElementById('popup').classList.remove('flex');
        document.getElementById('popup').classList.add('hidden');
    }
</script>
