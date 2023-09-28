<x-app-layout>
    <main class="my-8">
        <div class="container px-6 mx-auto">
            <div class="flex justify-center my-6">
                <div class="flex flex-col w-full p-8 text-gray-800 bg-white shadow-lg pin-r pin-y md:w-4/5 lg:w-4/5">
                    <div class="col-sm-10">
                        <div class="">
                        <h2 class="text-2xl font-bold text-gray-900">My Bill</h2>
                        <div class="h-1 bg-gray-800 w-20"></div>
                           <center> @foreach ($orders as $item)
                            <div class="row searched-item cart-list-divider">
                                <div class="col-sm-3">
                                    <a href="detail/{{$item->id}}">
                                        <img class="" src="{{$item->image}}" width="300" height="300"/>
                                    </a>
                                </div>
                                <div class="col-sm-3">
                                        <div class=""> <br>
                                            <h3>ชื่อสินค้า : {{$item->name}}</h3>
                                            <h5>สถานะการจัดส่ง : {{$item->status}}</h5>
                                            <h5>ชื่อ-นามสกุลลูกค้า : {{$item->ctm_name}}</h5>
                                            <h5>ราคา : {{$item->price}} บาท </h5>
                                            <h5>ที่อยู่จัดส่ง : {{$item->address}}</h5>
                                            <h5>เบอร์โทร : {{$item->tel}}</h5>
                                            <h5>สถานะการชำระเงิน : {{$item->payment_status}}</h5>
                                            <h5>วิธีการชำระเงิน : {{$item->payment_method}}</h5>
                                        </div>
                                </div>
                            </div>
                            @endforeach</center>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>