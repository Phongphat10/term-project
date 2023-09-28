<x-app-layout>
    <main class="my-8">
        <div class="container px-6 mx-auto">
            <div class="flex justify-center my-6">
                <div class="flex flex-col w-full p-8 text-gray-800 bg-white shadow-lg pin-r pin-y md:w-4/5 lg:w-4/5">
                    @if ($message = Session::get('success'))
                        <div class="p-4 mb-3 bg-blue-400 rounded">
                            <p class="text-white">{{ $message }}</p>
                        </div>
                    @endif
                    <h3 class="text-3xl font-bold">Order</h3>
                    <div class="flex-1">
                        <a>------------------------------------------------------------------------------------------------------------------------------------</a>
                        <br> <br> 
                        <form action="/orderplace" method="POST">
                            @csrf
                        <h3 class="text-xl font-bold text-black">**กรุณา!! กรอกข้อมูลการจัดส่งและรายละเอียดการชำระเงิน **</h3>
                            <br>
                            <div class="form-group">
                                <h2>ชื่อ-นามสกุล</h2>
                                <input type="text" name="name" class="form-control" id="exampleInputName1" placeholder="Your Name">
                            </div><br>
                            <div class="form-group">
                                <h2>ที่อยู่จัดส่ง</h2>
                                <textarea name="address" placeholder="Enter your Address" class="form-control"></textarea>
                            </div><br>
                            <div class="form-group">
                                <h2>เบอร์โทร</h2>
                                <input type="text" name="tel" class="form-control" id="exampleInputtel" placeholder="Your Tel">
                            </div><br><br>
                            
                            <div class="form-group">
                                <label for="pwd">** วิธีการชำระเงิน **</label><br><br>
                                <input type="radio" value="cash" name="payment"><span>Online payment</span><br><br>
                                <input type="radio" value="cash" name="payment"><span>EMI payment</span><br><br>
                                <input type="radio" value="cash" name="payment"><span>Payment on delivery</span><br><br>
                            </div> <br>
                            <button class="px-6 py-2 text-sm  rounded shadow text-red-100 bg-red-500">Confirm</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>