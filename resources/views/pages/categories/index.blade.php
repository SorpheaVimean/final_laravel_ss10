<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Categories
        </h2>
    </x-slot>

 


    <div class="py-5">
        <div class="">

{{-- Alert if success --}}
@if(session('success'))
<div class="fixed z-50 top-0 right-0">
   <div
    role="alert"
    data-dismissible="alert"
    class="relative flex w-full max-w-screen-sm p-4 m-10 text-base text-white bg-red-700 rounded-lg font-regular">
    <div class="shrink-0"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
      stroke="currentColor" class="w-6 h-6">
      <path stroke-linecap="round" stroke-linejoin="round"
        d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z">
      </path>
    </svg></div>
    <div class="ml-3 mr-12">
        <h5 class="block font-sans text-xl antialiased font-semibold leading-snug tracking-normal text-white">
            Deleted
        </h5>
        <p class="block mt-2 font-sans text-base antialiased font-normal leading-relaxed text-white">
            {{ session('success') }}
        </p>
    </div>

</div> 
</div>

<script>
    // Automatically remove success message after 5 seconds
    setTimeout(function(){
        document.querySelector('[role="alert"]').remove();
    }, 3000);
</script>
@endif
      
        </div>
      
        <div class="max-w-screen-2xl mx-auto sm:px-6 lg:px-8">
          <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold text-white">Total Categories: {{ count($categories) }}</h1>
            <a wire:navigate href="{{ route("categories.create" ) }}">
              <x-primary-button>
                Create Categories
              </x-primary-button>
          </a>
          </div>
             <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                  <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                      <table
                        class="min-w-full text-center text-sm font-light text-surface dark:text-white ">
                        <thead
                          class="border-b border-neutral-200 bg-[#332D2D] font-medium text-white dark:border-white/10">
                          <tr>
                            <th scope="col" class=" px-6 py-4">No</th>
                            <th scope="col" class=" px-6 py-4">name</th>
                            <th scope="col" class=" px-6 py-4">Description</th>
                            <th scope="col" class=" px-6 py-4">status</th>
                            <th scope="col" class=" px-6 py-4">Create At</th>
                            <th scope="col" class=" px-6 py-4"> Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                            <tr class="border-b border-neutral-200 dark:border-white/10">
                                <td class="whitespace-nowrap  px-6 py-4 font-medium">{{ $category->id }}</td>
                                <td class="whitespace-nowrap  px-6 py-4">{{ $category->name }}</td>
                                <td class="whitespace-nowrap  px-6 py-4">{{ $category->description }}</td>
                                <td class="whitespace-nowrap px-6 py-4 {{ $category->status === 1 ? 'text-green-600 font-bold' : 'text-red-600' }}">
                                  {{ $category->status === 1 ? 'Active' : 'Inactive' }}
                              </td>
                                <td class="whitespace-nowrap  px-6 py-4">{{ $category->created_at }}</td>
                                <td class="whitespace-nowrap  px-6 py-4">
                                    <div class="flex gap-5">
                               
                  
                                    {{-- Edit Icon --}}
                                    <a href="{{ route("categories.edit", $category->id) }} ">
                                      <button class="relative h-10 max-h-[40px] w-10 max-w-[40px] select-none rounded-full text-center align-middle font-sans text-xs font-medium uppercase text-gray-900 transition-all hover:bg-gray-900/10 active:bg-gray-900/20 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                              type="button">
                                          <span class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 text-blue-800 hover:bg-gray-800 p-3 rounded-full duration-300">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"
                                            class="w-4 h-4">
                                            <path
                                              d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32L19.513 8.2z">
                                            </path>
                                          </svg>
                                          </span>
                                      </button>
                                    </a>
                                   
                                    
                                    {{-- Delete Icon --}}
                                    <form action="{{ route("categories.destroy", $category->id) }}" method="post">
                                      @csrf
                                      @method("delete")
                                      <button 
                                      onclick="return confirm('Are you sure you want to delete this category?')"  
                                      class="relative h-10 max-h-[40px] w-10 max-w-[40px] select-none rounded-full text-center align-middle font-sans text-xs font-medium uppercase text-gray-900 transition-all hover:bg-gray-900/10 active:bg-gray-900/20 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" type="submit">
                                        <span class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 hover:bg-gray-800 p-3 rounded-full duration-300">
                                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-red-500">
                                            <path fill-rule="evenodd"
                                              d="M16.5 4.478v.227a48.816 48.816 0 013.878.512.75.75 0 11-.256 1.478l-.209-.035-1.005 13.07a3 3 0 01-2.991 2.77H8.084a3 3 0 01-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 01-.256-1.478A48.567 48.567 0 017.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 013.369 0c1.603.051 2.815 1.387 2.815 2.951zm-6.136-1.452a51.196 51.196 0 013.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 00-6 0v-.113c0-.794.609-1.428 1.364-1.452zm-.355 5.945a.75.75 0 10-1.5.058l.347 9a.75.75 0 101.499-.058l-.346-9zm5.48.058a.75.75 0 10-1.498-.058l-.347 9a.75.75 0 001.5.058l.345-9z"
                                              clip-rule="evenodd"></path>
                                          </svg>
                                        </span>
                                      </button>
                                    </form>
                                    </div>
                                  </td>
                              </tr>
                            @endforeach
                          
                       
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
        </div>
        </div>
    </div>
  
</x-app-layout>