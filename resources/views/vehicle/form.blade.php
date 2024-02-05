<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New Vehicle') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('vehicles.store') }}" class="space-y-8 divide-y divide-gray-200">
                        @csrf

                        <!-- Vehicle Category ID -->
                        <div>
                            <x-label for="vehicle_category_id" :value="__('Vehicle Category')" />
                            <select id="vehicle_category_id" name="vehicle_category_id" required class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                @foreach ($vehicle as $category)
                                    <option value="{{ $vehicle->id }}">
                                        {{ $vehicle->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Vehicle Number -->
                        <div>
                            <x-label for="number" :value="__('Number')" />
                            <x-input id="number" type="text" name="number" :value="old('number')" required class="mt-1 block w-full" />
                        </div>

                        <!-- Engine Number -->
                        <div>
                            <x-label for="engine_number" :value="__('Engine Number')" />
                            <x-input id="engine_number" type="text" name="engine_number" :value="old('engine_number')" class="mt-1 block w-full" />
                        </div>

                        <!-- Chassis Number -->
                        <div>
                            <x-label for="chassis_number" :value="__('Chassis Number')" />
                            <x-input id="chassis_number" type="text" name="chassis_number" :value="old('chassis_number')" class="mt-1 block w-full" />
                        </div>

                        <!-- Owner Name -->
                        <div>
                            <x-label for="owner_name" :value="__('Owner Name')" />
                            <x-input id="owner_name" type="text" name="owner_name" :value="old('owner_name')" required class="mt-1 block w-full" />
                        </div>

                        <!-- Owner NIC -->
                        <div>
                            <x-label for="owner_nic" :value="__('Owner NIC')" />
                            <x-input id="owner_nic" type="text" name="owner_nic" :value="old('owner_nic')" class="mt-1 block w-full" />
                        </div>

                        <!-- Owner License -->
                        <div>
                            <x-label for="owner_license" :value="__('Owner License')" />
                            <x-input id="owner_license" type="text" name="owner_license" :value="old('owner_license')" class="mt-1 block w-full" />
                        </div>

                        <!-- Owner Address -->
                        <div>
                            <x-label for="owner_address" :value="__('Owner Address')" />
                            <x-input id="owner_address" type="text" name="owner_address" :value="old('owner_address')" class="mt-1 block w-full" />
                        </div>

                        <!-- Owner Mobile -->
                        <div>
                            <x-label for="owner_mobile" :value="__('Owner Mobile')" />
                            <x-input id="owner_mobile" type="text" name="owner_mobile" :value="old('owner_mobile')" class="mt-1 block w-full" />
                        </div>

                        <!-- Vehicle Status -->
                        <div>
                            <x-label for="status" :value="__('Vehicle Status')" />
                            <select id="status" name="status" required class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                <option value="under_maintenance" {{ old('status') == 'under_maintenance' ? 'selected' : '' }}>Under Maintenance</option>
                            </select>
                        </div>

                        <!-- Submit Button -->
                        <div class="flex items-center justify-end mt-4">
                            <a href="{{ route('vehicles.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                                Cancel
                            </a>
                            <button type="submit" class="ml-4 inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-500 active:bg-indigo-700 focus:outline-none focus:border-indigo-700 focus:ring focus:ring-indigo-200 disabled:opacity-25 transition ease-in-out duration-150">
                                Save Vehicle
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

