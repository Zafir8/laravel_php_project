<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Vehicle Categories') }}
        </h2>
    </x-slot>

    <div>
        <form
            action="{{ $category->id ? route('vehicle-categories.update', $category->id) : route('vehicle-categories.store') }}"
            method="post">
            @csrf
            @if ($category->id)
                @method('PUT')
            @endif

            <input type="text" name="name" id="name" value="{{ old('name', $category->name) }}">


            <textarea name="description" id="description" cols="30" rows="10">{{ old('description', $category->description) }}</textarea>

            <input type="checkbox" name="status" id="status" value="1" {{  old('status', $category->status) ? 'checked' : '' }}>

            <button type="submit">
                Submit
            </button>
        </form>
    </div>

</x-app-layout>
