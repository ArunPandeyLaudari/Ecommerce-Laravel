@extends('layouts.app')
@section('content')
    <h1 class="text-4xl font-extrabold text-blue-900">Edit Banners</h1>
    <hr class="h-1 bg-red-500">

    <form action="{{ route('banner.update', $banner->id) }}" method="POST" class="mt-5" enctype="multipart/form-data">
        @csrf

        <input type="text" name="priority" id="" placeholder="enter priority" class="w-full my-2 rounded"
            value="{{ $banner->priority }}">
        @error('priority')
            <p class="-mt-2 text-red-500">{{ $message }}</p>
        @enderror


        <select type="text" name="status" class="w-full my-2 rounded-lg">
            <option value="show" @if ($banner->status == 'show') selected @endif>Show</option>
            <option value="hide" @if ($banner->status == 'hide') selected @endif>Hide</option>
        </select>

        <input type="file" name="photopath" class="w-full my-2 rounded-lg">
        @error('photopath')
            <p class="-mt-2 text-red-500">{{ $message }}</p>
        @enderror

        <p>Current Picture:</p>
        <img src="{{ asset('images/banners/' . $banner->photopath) }}" alt="" class="w-44">

        <div class="flex justify-center">
            <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded-lg">Update Banner</button>
            <a href="{{ route('banner.index') }}" class="px-4 py-2 ml-2 text-white bg-red-500 rounded-lg">Cancel</a>
        </div>
    </form>
@endsection
