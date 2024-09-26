@extends('layouts.app')
@section('content')
    <h1 class="text-4xl font-extrabold text-blue-900">Create Banners</h1>
    <hr class="h-1 bg-red-500">

    <form action="{{ route('banner.store') }}" method="POST" class="mt-5" enctype="multipart/form-data">
        @csrf

        <input type="text" name="priority" id="" placeholder="enter priority" class="w-full my-2 rounded"
            value="{{ old('priority') }}">
        @error('priority')
            <p class="-mt-2 text-red-500">{{ $message }}</p>
        @enderror




        <input type="file" name="photopath" class="w-full my-2 rounded-lg">
        @error('photopath')
            <p class="-mt-2 text-red-500">{{ $message }}</p>
        @enderror


        <select type="text" name="status" class="w-full my-2 rounded-lg">
            <option value="show">Show</option>
            <option value="hide">Hide</option>
        </select>

        <div class="flex justify-center">
            <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded-lg">Create Banner</button>
            <a href="{{ route('banner.index') }}" class="px-4 py-2 ml-2 text-white bg-red-500 rounded-lg">Cancel</a>
        </div>
    </form>
@endsection
