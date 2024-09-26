@extends('layouts.app')
@section('content')
    <h1 class="text-3xl font-medium text-blue-900">Create Catagories</h1>
    <hr class="h-1 bg-red-500">

    <form action="{{ route('catagory.store') }}" class="mt-5" method="POST">
        {{-- @csrf   means form lai tokan dinin kam garxa jaila token chai banako huna parxa --}}



        @csrf
        <input type="text" name="priority" id="" placeholder="enter priority" class="w-full my-2 rounded"
            value="{{ old('priority') }}">
        @error('priority')
            <p class="-mt-2 text-red-500">{{ $message }}</p>
        @enderror
        <input type="text" name="name" id="" placeholder="enter catagory name" class="w-full my-2 rounded"
            value="{{ old('name') }}">
        @error('name')
            <p class="-mt-2 text-red-500">{{ $message }}</p>
        @enderror
        <div class="flex justify-center gap-4 mt-4">
            <input type="submit" value="Add Catagory" class="px-5 py-3 text-white bg-blue-900 rounded cursor-pointer">
            <a href="{{ route('catagory.index') }}" class="px-10 py-3 font-medium text-white bg-red-900 rounded">Exit</a>
        </div>
    </form>
@endsection
