<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Order Detail
        </h2>
    </x-slot>

 


    <div class="py-5">
      
        <div class="max-w-screen-2xl mx-auto sm:px-6 lg:px-8">
          <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold text-white">Total Orders: {{ $totalQty }}</h1>
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
                                <td class="whitespace-nowrap  px-6 py-4">
                                  <div class="flex flex-col justify-center items-center gap-5">
                                    <div class="text-lg"> {{ $order->getproduct->name }}</div>
                                    <img src="{{ url('storage/images/'.$order->getproduct->image) }}" alt="" class="w-36 rounded-lg">
                                  </div>
                                  
                                </td>
                                <td class="whitespace-nowrap  px-6 py-4"> {{ $order->quantity }}</td>
                                <td class="whitespace-nowrap  px-6 py-4 text-red-500 font-bold">$ {{ $order->price }}</td>
                            @endforeach
                          
                       
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <div class="mt-4 flex justify-end items-center gap-20 text-white">
                  <div class="text-3xl">Order Summary</div>
                  <div class="flex gap-20 p-10 ">
                    <div class="space-y-3 text-xl ">
                      <div class="">Total Quantity: </div>
                      <div class="">Discount: </div>
                      <div class="">Discount price: </div>
                      <div class="">Total Price: </div>
                    </div>
                    <div class="space-y-3 text-xl">
                      <div class="">{{ $totalQty }} products</div>
                      <div class="">%-</div>
                      <div class="">$-</div>
                      <div class="text-red-500">$ {{ $totalPrice }}</div>
                    </div>
                  </div>
                 
                </div>
              </div>
             </div>
             
        </div>
    </div>
  
</x-app-layout>