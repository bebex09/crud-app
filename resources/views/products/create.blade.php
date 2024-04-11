<!-- <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Create</title>
</head>
<body>
	<h1>Create Product</h1>
	<div>
	@if($errors->any())
		<ul>
			@foreach($errors->all() as $error)
			<li>{{$error}}</li>
			@endforeach
		</ul>
	@endif
	</div>
	<a href="{{route('product.index')}}"><<-back to index</a>
	<form method="POST" action="{{route('product.store')}}">
		@csrf
		@method('post')
		<div>
			<label>Name</label>
			<input type="text" name="name">
		</div>
		<div>
			<label>Qty</label>
			<input type="text" name="qty">	
		</div>
		<div>
			<label>Price</label>
			<input type="text" name="price">
		</div>
		<div>
			<label>Description</label>
			<input type="text" name="description">
		</div>
		<div>
			<input type="submit" name="submit" value="save new product">
		</div>
	</form>
</body>
</html> -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create') }}
        </h2>
    </x-slot>
    <div class="py-3">
	    <div class="sm:px-12 flex justify-center">
	    <div class="p-4 sm:p-9 bg-white shadow sm:rounded-lg w-1/2">
	        <div class="max">
	        	<div>
				@if($errors->any())
					<ul>
						@foreach($errors->all() as $error)
						<li class="peer-invalid:visible text-red-700 font-light">{{$error}}</li>
						@endforeach
					</ul>
				@endif
				</div>
	        	<form method="POST" action="{{route('product.store')}}">
					@csrf
					@method('post')
		            <div>
		                <x-input-label for="product" :value="__('Product Name')" />
		                <x-text-input id="name" class="block mt-1 w-full" name="name" required autofocus />
		            </div>
		            <div>
		                <x-input-label for="qty" :value="__('Quantity')" />
		                <x-text-input id="qty" class="block mt-1 w-full" name="qty" required />
		            </div>
		            <div>
		                <x-input-label for="price" :value="__('Price')" />
		                <x-text-input id="price" class="block mt-1 w-full" name="price" required />
		            </div>
		            <div>
		                <x-input-label for="description" :value="__('Description')" />
		                <x-text-input id="description" class="block mt-1 w-full" name="description" required />
		            </div>
		            <div>
		                <x-primary-button class="mt-4">
			                {{ __('Add') }}
			            </x-primary-button>
		            </div>
	        	</form>
	        </div>
	    </div>
	</div>
    </div>
</x-app-layout>