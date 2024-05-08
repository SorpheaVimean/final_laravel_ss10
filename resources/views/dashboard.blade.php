
<x-app-layout>
    <x-slot name="header">
            <div class="flex justify-start items-center gap-10">
            <form  action="{{ route('dashboard') }}" method="GET">
                <input type="hidden" name="category_id" id="categoryIdInput" value="">
                <button type="submit" class="min-w-24  flex flex-col justify-center items-center p-2 bg-gray-300 rounded-lg cursor-pointer hover:scale-105 duration-300">
                    <div class="">
                        <svg class="w-7" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 24 24"><path fill="currentColor" d="M19 11h-6V5h6m0 14h-6v-6h6m-8-2H5V5h6m0 14H5v-6h6m-8 8h18V3H3z"/></svg>
                    </div>
                    <div class="">All</div>
               </button>
            </form>
            <form  action="{{ route('dashboard') }}" method="GET">
                <input type="hidden" name="category_id" id="categoryIdInput" value="1">
                <button type="submit" class="min-w-24 flex flex-col justify-center items-center p-2 bg-gray-300 rounded-lg cursor-pointer hover:scale-105 duration-300">
                    <div class="">
                        <svg class="w-7" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 16 16">
                            <g fill="currentColor"><path fill-rule="evenodd" d="M.5 6a.5.5 0 0 0-.488.608l1.652 7.434A2.5 2.5 0 0 0 4.104 16h5.792a2.5 2.5 0 0 0 2.44-1.958l.131-.59a3 3 0 0 0 1.3-5.854l.221-.99A.5.5 0 0 0 13.5 6zM13 12.5a2 2 0 0 1-.316-.025l.867-3.898A2.001 2.001 0 0 1 13 12.5M2.64 13.825L1.123 7h11.754l-1.517 6.825A1.5 1.5 0 0 1 9.896 15H4.104a1.5 1.5 0 0 1-1.464-1.175"/><path d="m4.4.8l-.003.004l-.014.019a4 4 0 0 0-.204.31a2 2 0 0 0-.141.267c-.026.06-.034.092-.037.103v.004a.6.6 0 0 0 .091.248c.075.133.178.272.308.445l.01.012c.118.158.26.347.37.543c.112.2.22.455.22.745c0 .188-.065.368-.119.494a3 3 0 0 1-.202.388a5 5 0 0 1-.253.382l-.018.025l-.005.008l-.002.002A.5.5 0 0 1 3.6 4.2l.003-.004l.014-.019a4 4 0 0 0 .204-.31a2 2 0 0 0 .141-.267c.026-.06.034-.092.037-.103a.6.6 0 0 0-.09-.252A4 4 0 0 0 3.6 2.8l-.01-.012a5 5 0 0 1-.37-.543A1.53 1.53 0 0 1 3 1.5c0-.188.065-.368.119-.494c.059-.138.134-.274.202-.388a6 6 0 0 1 .253-.382l.025-.035A.5.5 0 0 1 4.4.8m3 0l-.003.004l-.014.019a4 4 0 0 0-.204.31a2 2 0 0 0-.141.267c-.026.06-.034.092-.037.103v.004a.6.6 0 0 0 .091.248c.075.133.178.272.308.445l.01.012c.118.158.26.347.37.543c.112.2.22.455.22.745c0 .188-.065.368-.119.494a3 3 0 0 1-.202.388a5 5 0 0 1-.253.382l-.018.025l-.005.008l-.002.002A.5.5 0 0 1 6.6 4.2l.003-.004l.014-.019a4 4 0 0 0 .204-.31a2 2 0 0 0 .141-.267c.026-.06.034-.092.037-.103a.6.6 0 0 0-.09-.252A4 4 0 0 0 6.6 2.8l-.01-.012a5 5 0 0 1-.37-.543A1.53 1.53 0 0 1 6 1.5c0-.188.065-.368.119-.494c.059-.138.134-.274.202-.388a6 6 0 0 1 .253-.382l.025-.035A.5.5 0 0 1 7.4.8m3 0l-.003.004l-.014.019a4 4 0 0 0-.204.31a2 2 0 0 0-.141.267c-.026.06-.034.092-.037.103v.004a.6.6 0 0 0 .091.248c.075.133.178.272.308.445l.01.012c.118.158.26.347.37.543c.112.2.22.455.22.745c0 .188-.065.368-.119.494a3 3 0 0 1-.202.388a5 5 0 0 1-.252.382l-.019.025l-.005.008l-.002.002A.5.5 0 0 1 9.6 4.2l.003-.004l.014-.019a4 4 0 0 0 .204-.31a2 2 0 0 0 .141-.267c.026-.06.034-.092.037-.103a.6.6 0 0 0-.09-.252A4 4 0 0 0 9.6 2.8l-.01-.012a5 5 0 0 1-.37-.543A1.53 1.53 0 0 1 9 1.5c0-.188.065-.368.119-.494c.059-.138.134-.274.202-.388a6 6 0 0 1 .253-.382l.025-.035A.5.5 0 0 1 10.4.8"/>
                            </g>
                        </svg>
                    </div>
                    <div class="">Hot Drink</div>
               </button>
            </form>
            <form  action="{{ route('dashboard') }}" method="GET">
                <input type="hidden" name="category_id" id="categoryIdInput" value="2">
                <button type="submit" class="min-w-24 flex flex-col justify-center items-center p-2 bg-gray-300 rounded-lg cursor-pointer hover:scale-105 duration-300">
                    <div class="">
                        <svg class="w-7" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 14 14"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" d="m5 .5l2 2l2-2M.5 9l2-2l-2-2M9 13.5l-2-2l-2 2M13.5 5l-2 2l2 2m-10-5.5L5 5m0 4l-1.5 1.5m7-7L9 5m0 4l1.5 1.5M7 2.5v9M2.5 7h9"/></svg>
                    </div>
                    <div  class="">Cold Drink</div>
               </button>
            </form>
            <form  action="{{ route('dashboard') }}" method="GET">
                <input type="hidden" name="category_id" id="categoryIdInput" value="3">
                <button type="submit"  class="min-w-24 flex flex-col justify-center items-center p-2 bg-gray-300 rounded-lg cursor-pointer hover:scale-105 duration-300">
                    <div class="">
                        <svg class="w-7" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="currentColor" d="M8 17.85C8 19.04 7.11 20 6 20s-2-.96-2-2.15C4 16.42 6 14 6 14s2 2.42 2 3.85M16.46 12v-1.44l2-1.13l2.33.62l.52-1.93l-1.77-.47l.46-1.77l-1.93-.52l-.62 2.33l-2 1.13L13 7.38V5.12l1.71-1.71L13.29 2L12 3.29L10.71 2L9.29 3.41L11 5.12v2.26L8.5 8.82l-2-1.13l-.58-2.33L4 5.88l.47 1.77l-1.77.47l.52 1.93l2.33-.62l2 1.13V12H2v1h20v-1zM9.5 12v-1.44L12 9.11l2.5 1.45V12zM20 17.85c0 1.19-.89 2.15-2 2.15s-2-.96-2-2.15c0-1.43 2-3.85 2-3.85s2 2.42 2 3.85m-6 3c0 1.19-.89 2.15-2 2.15s-2-.96-2-2.15c0-1.43 2-3.85 2-3.85s2 2.42 2 3.85"/></svg>
                    </div>
                    <div  class="">Frappe</div>
               </button>
            </form>
            <form  action="{{ route('dashboard') }}" method="GET">
                <input type="hidden" name="category_id" id="categoryIdInput" value="4">
                <button type="submit"  class="min-w-24 flex flex-col justify-center items-center p-2 bg-gray-300 rounded-lg cursor-pointer hover:scale-105 duration-300">
                    <div class="">
                        <svg class="w-7" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48"><defs><mask id="ipTCakeOne0"><g fill="none" stroke="#fff" stroke-width="4"><path stroke-linecap="round" stroke-linejoin="round" d="M27 14L9 21.9h30L34 15"/><circle cx="31" cy="13" r="4" fill="#fff"/><path stroke-linecap="round" d="m33 9l2-5"/><path d="M9.5 26.957c-.602.3-1.162.62-1.678.956C5.418 29.481 4 31.412 4 33.5c0 5.247 8.954 9.5 20 9.5s20-4.253 20-9.5c0-2.14-1.488-4.113-4-5.701"/><path fill="#555" stroke-linecap="round" stroke-linejoin="round" d="M9 22h30v12H9z"/><path d="M9 22h31"/></g></mask></defs><path fill="currentColor" d="M0 0h48v48H0z" mask="url(#ipTCakeOne0)"/></svg>
                    </div>
                    <div  class="">cake</div>
               </button>
            </form>
            <form  action="{{ route('dashboard') }}" method="GET">
                <input type="hidden" name="category_id" id="categoryIdInput" value="5">
                <button type="submit"  class="min-w-24 flex flex-col justify-center items-center p-2 bg-gray-300 rounded-lg cursor-pointer hover:scale-105 duration-300">
                    <div class="">
                        <svg class="w-7" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256"><g fill="currentColor"><path d="M160 122.22V216a8 8 0 0 1-8 8H56a8 8 0 0 1-8-8v-93.78a8 8 0 0 1 1.14-4.12l20.53-34.22A8 8 0 0 1 76.53 80h54.94a8 8 0 0 1 6.86 3.88l20.53 34.22a8 8 0 0 1 1.14 4.12" opacity="0.2"/><path d="M224 160a16 16 0 0 1-16-16V64a56 56 0 0 0-112 0v8H76.53a16.09 16.09 0 0 0-13.72 7.77L42.28 114a16.06 16.06 0 0 0-2.28 8.22V216a16 16 0 0 0 16 16h96a16 16 0 0 0 16-16v-93.78a16.06 16.06 0 0 0-2.28-8.24l-20.53-34.21A16.09 16.09 0 0 0 131.47 72H112v-8a40 40 0 0 1 80 0v80a32 32 0 0 0 32 32a8 8 0 0 0 0-16m-92.53-72L152 122.22V216H56v-93.78L76.53 88H96v48a8 8 0 0 0 16 0V88Z"/></g></svg>
                    </div>
                    <div  class="">Milk Tea</div>
               </button>
            </form>
            
            </div>
           
    </x-slot>

    <div class="py-2">
        <div class=" sm:px-6 lg:px-8 ">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-5 h-[800px] ">
                <div class="flex justify-start items-start">
                    <div class="flex flex-wrap justify-start items-start gap-5 overflow-scroll hidden-scrollbar h-[800px] cursor-pointer mr-[380px]">
                        @foreach($products as $product)
                            <div class="col-span-2 block max-w-[16rem] min-w-[16rem] rounded-lg bg-gray-300 text-surface shadow-secondary-1 dark:bg-surface-dark dark:text-black hover:scale-105 duration-300">
                                <form id="productForm{{ $product->id }}" method="POST" action="{{ route('carts.store') }}">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <input type="hidden" name="quantity" value="1" min="1">
                                    <div class="relative overflow-hidden bg-cover bg-no-repeat h-60">
                                        <img class="rounded-t-lg object-cover" src="{{ url('storage/images/'.$product->image) }}" alt="" />
                                    </div>
                                    <div class="p-6 flex flex-col justify-center items-center gap-5">
                                        <h1 class="text-2xl text-center">
                                            {{ $product->name }}
                                        </h1>
                                        <h1 class="bg-gray-700 w-full text-center text-white p-2 rounded-lg">$ <span class="">{{ $product->price }}</span></h1>
                                    </div>
                                </form>
                                <script>
                                    // Add event listener to automatically submit the form when the product is clicked
                                    document.getElementById("productForm{{ $product->id }}").addEventListener("click", function() {
                                        this.submit();
                                    });
                                </script>
                            </div>
                        @endforeach
                    </div>
                    
                   
                    
                        <div class="h-[770px] min-w-[370px] bg-gray-400 ml-4 rounded-lg p-3  fixed right-12">
                            <p class="text-center text-2xl mb-5"> Payment Summary</p>
                            <hr class="border border-gray-200 mb-2" />
                            
                            {{-- {/* Payment */} --}}
                            <div class="p-2 h-[400px] overflow-scroll hidden-scrollbar space-y-2 ">
                                @if($carts->isNotEmpty())
                                    @foreach ($carts as $cart )
                                        @if($cart->getproduct)
                                        <div class="flex justify-between items-center gap-5 bg-gray-200 p-3 rounded-lg">
                                            <div class="flex flex-col justify-center items-center gap-2">
                                                <div class="font-bold">{{ $cart->getproduct->name }}</div>
                                                <div class=""><img src="{{ url('storage/images/'.$cart->getproduct->image) }}" alt="" class="w-20 rounded-lg"></div>
                                            </div>
                                            <form id="updateForm{{ $cart->id }}" method="POST" action="{{ route('carts.update', $cart->id) }}">
                                                @csrf
                                                @method('PUT')
                                                <div class="">
                                                    <input
                                                    type="number"
                                                    min="1"
                                                    name="quantity" 
                                                    value="{{ $cart->quantity }}"
                                                    onchange="submitForm('{{ $cart->id }}')"
                                                    class="block w-20 rounded-md py-1.5 px-2 ring-1 ring-inset ring-gray-400 focus:text-gray-800"
                                                  />
                                                </div>
                                            </form>
                                            
                                            <script>
                                                function submitForm(cartId) {
                                                    var formId = "updateForm" + cartId;
                                                    document.getElementById(formId).submit();
                                                }
                                            </script>
                                            
                                            <div class="flex justify-center items-center gap-5">
                                                <div class="text-red-500">${{ $cart->quantity * $cart->getproduct->price }}</div>
                                                <form action="{{ route('carts.destroy', $cart->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="text-red-500 text-2xl font-bold cursor-pointer hover:bg-gray-400 p-1 rounded-full duration-300">
                                                        <svg class="w-10" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 24 24">
                                                            <path fill="currentColor" d="M12 3c-4.963 0-9 4.038-9 9s4.037 9 9 9s9-4.038 9-9s-4.037-9-9-9m0 16c-3.859 0-7-3.14-7-7s3.141-7 7-7s7 3.14 7 7s-3.141 7-7 7m.707-7l2.646-2.646a.502.502 0 0 0 0-.707a.502.502 0 0 0-.707 0L12 11.293L9.354 8.646a.5.5 0 0 0-.707.707L11.293 12l-2.646 2.646a.5.5 0 0 0 .707.708L12 12.707l2.646 2.646a.5.5 0 1 0 .708-.706z"/>
                                                        </svg>
                                                    </button>
                                                </form>
                                                
                                            </div>
                                        </div>
                                        @else
                                            <li>No product associated</li>
                                        @endif
                                    @endforeach
                                    @else
                                    <p class="flex justify-center items-center text-2xl h-full ">No products found.</p>
                                @endif
                            
                            </div>

                            <div class="text-lg  font-bold space-y-2 p-2 ">
                            
                            <div class="flex justify-between items-center">
                                <p>Items</p>
                                <p>{{ count($carts) }}</p>
                            </div>
                            <div class="flex justify-between items-center">
                                <p>Subtotal</p>
                                <p class="text-red-500">${{ $subtotal }} </p>
                            </div>
                            <div class="flex justify-between items-center">
                                <p>Discount</p>
                                <p>%-</p>
                            </div>

                            <div class="flex justify-between items-center">
                                <p>Order Total</p>
                                <p name="total_order" class="text-red-500">$ {{ $subtotal }}</p>
                            </div>

                            {{-- process order --}}
                            <form method="POST" action="{{ route('orders.store') }}">
                                @csrf
                                    <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                                    
                                <select name="payment_method_id" class="border-gray-300 mb-1 focus:border-indigo-500 focus:ring-indigo-500  rounded-md shadow-sm w-full" >
                                    @foreach($payments as $payment)
                                         <option  value="{{ $payment->id }}" {{ request('payment_id') == $payment->id ? 'selected' : '' }}>{{ $payment->name}}</option>
                                    @endforeach
                                </select>
                                <div class="w-96 mt-2">
                                    <div class="relative w-full min-w-[200px]">
                                      <textarea
                                      name="comment"
                                        class="peer h-full min-h-[50px] w-full resize-none rounded-[7px] border border-blue-gray-200 border-t-transparent "
                                        placeholder="comment"></textarea>
                                     
                                    </div>
                                </div>
                                <input type="hidden" name="total_order" value="{{ $subtotal }}">
                                <div class="flex justify-center  items-center flex-col gap-y-3">
                                    <button type="submit" class="login-form-button bg-blue-500 rounded-xl p-3 w-full text-white duration-300 hover:bg-blue-400">
                                    Proceed to Order
                                    </button>
                                 </div>
                            </form>

                            </div>
                        </div>
                </div>
                
            </div>
        </div>
    </div>
</x-app-layout>
