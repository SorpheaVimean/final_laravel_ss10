
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
                    <div class="flex flex-wrap justify-start items-start gap-5 overflow-scroll hidden-scrollbar h-[800px] cursor-pointer">
                        @foreach($products as $product)
                            <div class="col-span-2 block max-w-[16rem] min-w-[16rem] rounded-lg bg-gray-300 text-surface shadow-secondary-1 dark:bg-surface-dark dark:text-black hover:scale-105 duration-300">
                                <form id="productForm{{ $product->id }}" method="POST" action="{{ route('carts.store') }}">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <input type="hidden" name="quantity" value="1" min="1">
                                    <div class="relative overflow-hidden bg-cover bg-no-repeat h-48">
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
                    
                   
                    
                        <div class="h-[770px] min-w-[370px] bg-gray-400 ml-4 rounded-lg p-3 ">
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
                                                    <input type="number" min="1" name="quantity" value="{{ $cart->quantity }}" class="w-20" onchange="submitForm('{{ $cart->id }}')">
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
                                                    <button type="submit" class="text-red-500 text-2xl font-bold cursor-pointer">X</button>
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
                            <form method="POST" action="{{ route('orders.store') }}">
                                @csrf
                                    <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                                    <div class="w-96">
                                        <div class="relative w-full min-w-[200px]">
                                          <textarea
                                          name="comment"
                                            class="peer h-full min-h-[50px] w-full resize-none rounded-[7px] border border-blue-gray-200 border-t-transparent "
                                            placeholder="comment"></textarea>
                                         
                                        </div>
                                      </div>
                                <select name="payment_method_id" class="border-gray-300 mb-1 focus:border-indigo-500 focus:ring-indigo-500  rounded-md shadow-sm w-full" >
                                    <option value="1">ABA</option>
                                    <option value="2">AC</option>
                                </select>
                                <input type="hidden" name="total_order" value="{{ $subtotal }}">
                                <div class="flex justify-center  items-center flex-col gap-y-3">
                                    <button type="submit" class="login-form-button bg-blue-500 rounded-full p-3 w-full text-white duration-300 hover:bg-blue-400">
                                    Proceed to Checkout
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
