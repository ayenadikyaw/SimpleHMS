@extends('layout.sidebar')

@section('content')

<h1 class="text-2xl font-bold font-sans text-dark dark:text-primary">SAKURA HOSPITAL MANAGEMENT SYSTEM</h1>

@if($errors->any())
@foreach ($errors->all() as $error)
<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-5" role="alert">
    <strong class="font-bold">Error!</strong>
    <span class="block sm:inline">{{ $error }}</span>
    <span class="close absolute top-0 bottom-0 right-0 px-4 py-3">
        <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
    </span>
</div>
@endforeach
@endif

<div class="mt-12 flex flex-col justify-center items-center">
    <h2 class="text-2xl font-bold font-sans mb-4">Add New Room</h2>
    <form action="/rooms" method="POST" class="bg-white dark:bg-dark shadow-md rounded px-8 pt-6 pb-8 mb-4 w-1/2">
        @csrf
        <input type="hidden" name="previous_url" value={{ $previousUrl }}>
        <div class="mb-4">
            <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2" for="room_number">
                Room Number
            </label>
            <input value="{{ old('room_number') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 leading-tight focus:outline-none focus:shadow-outline dark:bg-gray-700 dark:border-gray-600" id="room_number" type="text" name="room_number" placeholder="E.g. Room 100">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2" for="status">
                Status
            </label>
            <select value="{{ old('status') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 leading-tight focus:outline-none focus:shadow-outline dark:bg-gray-700 dark:border-gray-600" id="status" name="status">
                <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                <option value="locked" {{ old('status') == 'locked' ? 'selected' : '' }}>Locked</option>
                <option value="available" {{ old('status') == 'available' ? 'selected' : '' }}>Available</option>
            </select>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2" for="quantity">
                Quantity
            </label>
            <input value="{{ old('quantity') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 leading-tight focus:outline-none focus:shadow-outline dark:bg-gray-700 dark:border-gray-600" id="quantity" type="number" name="quantity" placeholder="Enter quantity">
        </div>
        <div class="mb-6">
            <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2" for="price">
                Price
            </label>
            <input value="{{ old('price') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 leading-tight focus:outline-none focus:shadow-outline dark:bg-gray-700 dark:border-gray-600" id="price" type="number" step="0.01" name="price" placeholder="Enter price">
        </div>
        <div class="flex items-center justify-between">
                <button class="bg-primary hover:bg-primary-dark text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                Add Room
            </button>
            
        </div>
    </form>
</div>

<script>
   document.querySelectorAll('.close').forEach(function(button) {
    button.addEventListener('click', function() {
        this.parentElement.remove();
    });
});
</script>





@endsection