<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Order Detail
        </h2>
    </x-slot>

 
<h1>Hello</h1>

    {{-- <div class="py-5">
      
        <div class="max-w-screen-2xl mx-auto sm:px-6 lg:px-8">
          <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold text-white">Total Orders: {{ count($orderDetail) }}</h1>
            <a wire:navigate href="{{ route("dashboard" ) }}">
              <x-primary-button>
                Create orders
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
                            <th scope="col" class=" px-6 py-4">Order ID</th>
                            <th scope="col" class=" px-6 py-4">Product </th>
                            <th scope="col" class=" px-6 py-4">Quantity</th>
                            <th scope="col" class=" px-6 py-4">Price</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($orderDetails as $order)
                            <tr class="border-b border-neutral-200 dark:border-white/10">
                                <td class="whitespace-nowrap  px-6 py-4 font-medium">{{ $order->id }}</td>
                                <td class="whitespace-nowrap  px-6 py-4">{{ $order->order_id }}</td>
                                <td class="whitespace-nowrap  px-6 py-4">{{ $order->product_id }}</td>
                                <td class="whitespace-nowrap  px-6 py-4">$ {{ $order->quantity }}</td>
                                <td class="whitespace-nowrap  px-6 py-4">{{ $order->price }}</td>
                            @endforeach
                          
                       
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
        </div>
        </div>
    </div> --}}
  
</x-app-layout>