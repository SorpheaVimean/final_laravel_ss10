<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Hello
        </h2>
    </x-slot>

 


    <div class="py-5 ">
        <div class="max-w-screen-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-5 ">
                
                <div
                class="block max-w-[18rem] rounded-lg bg-white text-surface shadow-secondary-1 dark:bg-surface-dark dark:text-black">
                <div class="relative overflow-hidden bg-cover bg-no-repeat">
                  <img
                    class="rounded-t-lg"
                    src="https://tecdn.b-cdn.net/img/new/standard/nature/182.jpg"
                    alt="" />
                </div>
                <div class="p-6 flex justify-center items-center gap-5">
                    <h1>$ <span class="text-red-500">4</span></h1>
                  <p class="text-base text-center">
                    Hot cafe
                  </p>
                </div>
              </div>
            </div>
        </div>
    </div>
</x-app-layout>