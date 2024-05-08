<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
           Create new Products
        </h2>
    </x-slot>

{{-- Alert if success --}}
@if(session('success'))
<div class="fixed z-50 top-0 right-0">
   <div
    role="alert"
    data-dismissible="alert"
    class="relative flex w-full max-w-screen-sm p-4 m-10 text-base text-white bg-green-700 rounded-lg font-regular">
    <div class="shrink-0">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
            <path fill-rule="evenodd"
                d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z"
                clip-rule="evenodd"></path>
        </svg>
    </div>
    <div class="ml-3 mr-12">
        <h5 class="block font-sans text-xl antialiased font-semibold leading-snug tracking-normal text-white">
            Success
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
        <div class="py-5 w-full max-w-2xl mx-auto bg-gray-800 rounded-lg p-3 mt-5">
            <form method="POST"action="/products" enctype="multipart/form-data"  class="space-y-4">
                @csrf

                <!-- Categories -->
                <div>
                    <x-input-label for="category_id" :value="__('Category')" />
                    <select name="category_id" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full" >
                        @foreach($categories as $category)
                        <option  value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name}}</option>
                    @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div>
                    <x-input-label for="name" :value="__('name')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"  autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- price -->
                <div>
                    <x-input-label for="price" :value="__('price')" />
                    <x-text-input id="price" class="block mt-1 w-full" type="number"  name="price"  price="price" :value="old('price')"  autofocus autocomplete="userprice" />
                    <x-input-error :messages="$errors->get('price')" class="mt-2" />
                </div>

                <!-- Description -->
                <div class="relative mb-3">
                    <x-input-label for="description" :value="__('Description')" />
                    <textarea id="description" name="description" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full" rows="4">{{ old('description') }}</textarea>
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>

                <!-- image -->
                <div>
                    <x-input-label for="image" :value="__('image')" />
                    <x-text-input id="image" class="block mt-1 w-full" type="file" name="image" :value="old('image')"    />
                    <x-input-error :messages="$errors->get('image')" class="mt-2" />
                </div>
                <!-- Modal footer -->
                <div
                class="flex flex-shrink-0 gap-2 flex-wrap items-center justify-end rounded-b-md border-t-2 border-neutral-100 p-4 dark:border-white/10">
                <x-secondary-button type="reset" >
                Reset
                </x-secondary-button>
                <x-primary-button class="ms-4">
                    @if(isset($product))
                    Update
                @else
                    Save
                @endif
                </x-primary-button>
            </form>
        </div>

         <!-- Preview Section -->
         <div >
            <h3 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-2">Preview</h3>
                <div class="flex justify-center items-center">
                    <div class="block max-w-[18rem] rounded-lg bg-white text-surface shadow-secondary-1 dark:bg-surface-dark dark:text-black">
                    <div class="relative overflow-hidden bg-cover bg-no-repeat h-60">
                        <img class="rounded-t-lg" id="img" src="https://t4.ftcdn.net/jpg/04/73/25/49/360_F_473254957_bxG9yf4ly7OBO5I0O5KABlN930GwaMQz.jpg" alt=""/>
                    </div>
                   
                    <div class="p-6 flex flex-col justify-center items-center gap-5">
                        <p class="text-2xl text-center"> <span id="preview_name">Product name</span></p>
                        <p  class="bg-gray-700 w-full text-center text-white p-2 rounded-lg">$ <span id="preview_price">price</span></p>
                    
                    </div>
                </div>
            </div>
           
         </div>
    </div>
        
  

</x-app-layout>
<script>
    // JavaScript to update preview based on form input
    document.addEventListener('DOMContentLoaded', function () {
        const nameInput = document.getElementById('name');
        const priceInput = document.getElementById('price');
        const imageInput = document.getElementById('image');
        const img = document.getElementById('img');

        const previewName = document.getElementById('preview_name');
        const previewPrice = document.getElementById('preview_price');

        nameInput.addEventListener('input', updatePreview);
        priceInput.addEventListener('input', updatePreview);
        imageInput.addEventListener("change", (e) => {
            var input = event.target;
            if(input.files && input.files[0]){
                var reader = new FileReader();
                reader.onload = function (e) {
                    img.src = e.target.result;
                }
                reader.readAsDataURL(input.files[0]);
            }
        })
        function updatePreview() {
            previewName.textContent = nameInput.value;
            previewPrice.textContent = priceInput.value;
        }

    });
</script>