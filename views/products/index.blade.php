<x-app-layout>
    <div class="container px-12 py-8 mx-auto">
        <h3 class="text-2xl font-bold text-gray-900">Latest Products</h3>
        <div class="h-1 bg-gray-800 w-48"></div><br>
        <div class="container mt-2">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-right mb-10">
                        <a class="px-4 py-2.5 text-white text-sm bg-green-400 rounded" href="{{ route('products.create') }}"> Create item</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-1 gap-6 mt-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">

            

            @foreach ($products as $item)  
            <div class="w-full max-w-sm mx-auto overflow-hidden bg-white rounded-md shadow-md">
                <img src="{{ url($item->image) }}" alt="" class="w-full max-h-60">
                <div class="flex items-end justify-end w-full bg-cover">
                    
                </div>

                <div class="px-5 py-3">
                    
                    <div class="flex items-center justify-between mb-5">
                        <h3 class="text-gray-700 uppercase">product name : {{ $item->name }}</h3>
                      </div>  <h3 class="text-gray-700 uppercase">product details :{{ $item->description }}</h3> <br>
                         <h3 class="text-gray-700 uppercase"> brand: {{ $item->brand->brand_name}}</h3> <br> 
                         <h3 class="text-gray-700 uppercase">category : {{ $item->category->category_name }}</h3> <br>
                        <span class="mt-2 text-red-600 font-semibold">price : {{ $item->price }} baht </span> <br> <br>
                    
                    <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data" class="flex justify-end">
                        @csrf
                        <input type="hidden" value="{{ $item->id }}" name="id">
                        <input type="hidden" value="{{ $item->name }}" name="name">
                        <input type="hidden" value="{{ $item->description  }}" name="description ">
                        <input type="hidden" value="{{ $item->price }}" name="price">
                        <input type="hidden" value="{{ $item->image }}"  name="image">
                        <input type="hidden" value="1" name="quantity">
                        <button class="px-4 py-1.5 text-white text-sm bg-pink-700 rounded">Add To Cart</button>
                    </form>
                    <div class="container mt-2 flex justify-end ">
                        <div class="row">
                            <div class="col-lg-12 margin-tb">
                                <div class="pull-right mb-2">
                                    <form action="{{ route('products.destroy',$item->id) }}" method="Post">
                                        <a class="px-4 py-1.5 text-white text-sm bg-blue-400 rounded" href="{{ route('products.edit',$item->id) }}">Edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-4 py-1.5 text-white text-sm bg-red-400 rounded">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                
            </div>
            @endforeach 
        </div>
    </div>
</x-app-layout>