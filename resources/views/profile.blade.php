<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xxl text-gray-800 leading-tight">
            {{ $user -> name }}
        </h2>
    </x-slot>

    <div class="py-1"></div>
    <div class="py-12 bg-white">
        <div class="bg-white max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 bg-white border-b border-gray-200">
               Inwentarz tu
            </div>
        </div>
    </div>
</x-app-layout>
