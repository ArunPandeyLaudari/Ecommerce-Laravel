@extends('layouts.app')
@section('content')
    <h1 class="text-3xl font-medium text-blue-900">Banners</h1>
    <hr class="h-1 bg-red-500">
    <div class="my-5 text-right">
        <a href="{{ route('banner.create') }}" class="px-5 py-3 text-white bg-blue-900 rounded-lg">Add Banner</a>
    </div>

    <table class="w-full mt-5">
        <tr>
            <th class="p-2 bg-gray-200 border">Priority</th>
            <th class="p-2 bg-gray-200 border">Photo</th>
            <th class="p-2 bg-gray-200 border">Status</th>
            <th class="p-2 bg-gray-200 border">Action</th>

        </tr>

        @foreach ($banners as $banner)
            <tr class="text-center">
                <td class="p-2 border">{{ $banner->priority }}</td>
                <td class="p-2 border"><img src="{{ asset('images/banners/' . $banner->photopath) }}" alt="banner image"
                        class="object-cover w-16 h-16 mx-auto">
                <td class="p-2 border">{{ $banner->status }}</td>
                <td class="p-2 border">
                    <a href="{{ route('banner.edit', $banner->id) }}"
                        class="px-3 py-1 font-medium text-white bg-blue-900 rounded">Edit</a>
                    <a href="{{ route('banner.delete', $banner->id) }}"
                        class="px-3 py-1 font-medium text-white bg-red-900 rounded"
                        onclick="return confirm('Are you sure?')">Delete</a>

                </td>
            </tr>
        @endforeach

    </table>
@endsection
