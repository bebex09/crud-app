<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>
    <div class="py-3">
    <div class="sm:px-6 lg:px-8">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
        	@if(session()->has('success'))
				<div class="flex items-center bg-green-500 text-white text-sm font-bold px-4 py-3" role="alert">
				  <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
				  <p>{{session('success')}}</p>
				</div>
			@endif
		<div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-2">
		    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
		        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
		            <tr>
		                <th scope="col" class="px-6 py-3">
		                    Product name
		                </th>
		                <th scope="col" class="px-6 py-3">
		                    Quantity
		                </th>
		                <th scope="col" class="px-6 py-3">
		                    Price
		                </th>
		                <th scope="col" class="px-6 py-3">
		                    Description
		                </th>
		                <th scope="col" class="px-6 py-3" colspan="2">
		                    Action
		                </th>
		            </tr>
		        </thead>
		        <tbody>
		        	@foreach($products as $product)
		            <tr class="bg-white border-b dark:bg-white-800 dark:border-black-700">
		                <th scope="row" class="px-6 py-4 font-medium text-black-900 whitespace-nowrap dark:text-black">
		                    {{$product->name}}
		                </th>
		                <td class="px-6 py-4">
		                    {{$product->qty}}
		                </td>
		                <td class="px-6 py-4">
		                    {{$product->price}}
		                </td>
		                <td class="px-6 py-4">
		                    {{$product->description}}
		                </td>
		                <td class="px-6 py-4">
		                	<a href="{{route('product.edit', ['product' => $product])}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
		                </td>
		                <td class="px-6 py-4">
		                	<form method="post" action="{{route('product.delete', ['product' => $product])}}">	
									@csrf
									@method('delete')
									<x-danger-button>
										{{ __('Delete') }}
									</x-danger-button>
								</form>
		                </td>

		            </tr>
		            @endforeach
		        </tbody>
		    </table>
		</div>
		<div class="mt-4">
			{{$products->links()}}
		</div>
        </div>
    </div>
</x-app-layout>