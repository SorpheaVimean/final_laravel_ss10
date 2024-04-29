<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-2">
        <div class=" sm:px-6 lg:px-8 ">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-5 h-[800px] ">
                <div class="flex justify-start items-start">
                    <div class="flex flex-wrap justify-start items-start  gap-5 overflow-scroll h-[800px] cursor-pointer  ">
                         @foreach($products as $product)
                        <div class="col-span-2 block max-w-[16rem] min-w-[16rem] rounded-lg bg-gray-300 text-surface shadow-secondary-1 dark:bg-surface-dark dark:text-black hover:scale-105 duration-300">
                            <div class="relative overflow-hidden bg-cover bg-no-repeat h-48">
                                <img
                                class="rounded-t-lg object-cover"
                                src="{{ url('storage/images/'.$product->image) }}"
                                alt="" />
                            </div>
                            <div class="p-6 flex justify-center items-center gap-5">
                                <h1>$ <span class="text-red-500">{{ $product->price }}</span></h1>
                            <p class="text-base text-center">
                                {{ $product->name }}
                            </p>
                            </div>
                        </div>
                    @endforeach
                    </div>
                   
                    
                    <div class="h-[770px] min-w-96 bg-gray-300 ml-4 rounded-lg p-3">Hello</div>
                </div>
                
            </div>
        </div>
    </div>
</x-app-layout>
