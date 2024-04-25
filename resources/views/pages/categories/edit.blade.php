<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
           Update  Category
        </h2>
    </x-slot>
    <div class="flex justify-center items-center ">
        <div class="py-5 w-full max-w-2xl mx-auto bg-gray-800 rounded-lg p-3 mt-5">
            <form method="POST" action="/categories/{{ $category->id }}"   method="post"  class="space-y-4">
                @csrf
                @method('put')

                <!-- name -->
                <div>
                    <x-input-label for="name" :value="__('name')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ $category->name }}"  autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Description -->
                <div class="relative mb-3">
                    <x-input-label for="description" :value="__('Description')" />
                    <textarea id="description" name="description" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full" rows="4">{{ $category->description }}</textarea>
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>

                <!-- Modal footer -->
                <div
                class="flex flex-shrink-0 gap-2 flex-wrap items-center justify-end rounded-b-md border-t-2 border-neutral-100 p-4 dark:border-white/10">
                <x-secondary-button type="reset" >
                Reset
                </x-secondary-button>
                <x-primary-button class="ms-4">
                    Update
                </x-primary-button>
            </form>
        </div>
       
    </div>
        
  

</x-app-layout>
