<div class="mt-10 sm:mt-0">
    <div class="md:grid md:grid-cols-3 md:gap-6">
        <div class="md:col-span-1">
            <div class="px-4 sm:px-0">
                <h5 class="text-lg font-medium leading-6 text-gray-900">Dapatkan Doorprize Menarik!</h5>
                <hr>
                <p class="mt-1 text-sm text-gray-600">
                    Silahkan Masukkan User ID Anda, kemudian klik tombol cek untuk melihat peluang hadiah apa <b>yang akan Anda Dapatkan</b>
                </p>
            </div>
            <hr>
            <br/>
            
            <div class="grid grid-cols-6 gap-6">
                <div class="col-span-6 sm:col-span-3">
                    <label for="userId" class="block text-sm font-medium text-gray-700">User ID</label>
                    <input type="text" name="userId" id="userId" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
            </div>
            
            <div class="px-4 py-3 text-center sm:px-6">
                <button onclick="fetchUser()" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Check
                </button>
            </div>
            <br>
            <div id="informasi"></div>
           
        </div>
        <div class="mt-5 md:mt-0 md:col-span-2 text-center" id="user-not-found" style="display:none"></div>
        <!-- Form right -->
        <div class="mt-5 md:mt-0 md:col-span-2" id="form-right" style="display:none">
        <h5 class="text-lg font-medium leading-6 text-gray-900 text-center">Formulir Pengiriman Doorprize</h5>
            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <div class="grid grid-cols-6 gap-6">
                    
                        <div class="col-span-6 sm:col-span-3">
                            <label for="delivery_address" class="block text-sm font-medium text-gray-700">Delivery Address</label>
                            <textarea id="delivery_address" name="delivery_address" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" ></textarea>
                        </div>

                        <div class="col-span-6">
                            <label for="contact_number" class="block text-sm font-medium text-gray-700">Contact Number</label>
                            <input type="number" name="contact_number" id="contact_number" autocomplete="email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>
                        <div class="col-span-6">
                            <label for="contact_person" class="block text-sm font-medium text-gray-700">Contact Person</label>
                            <input type="text" name="contact_person" id="contact_person" autocomplete="street-address" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>
                </div>
            </div>
            <div class="px-4 py-3 bg-gray-50 text-center sm:px-6">
                <button id="btn-submit" type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Submit
                </button>
            </div>
            </div>
            
        </div>
    </div>
</div>

<div class="hidden sm:block" aria-hidden="true">
    <div class="py-5">
        <div class="border-t border-gray-200"></div>
    </div>
</div>
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<script>
async function fetchUser() {
    var x = document.getElementById("form-right");
    var y = document.getElementById("user-not-found");
    var userId = $('#userId').val();
    const response = await fetch('https://us-central1-silicon-airlock-153323.cloudfunctions.net/rg-package-dummy?userId='+userId);
    const user = await response.json();
    console.log(user);
    // console.log(user.packages.length);
    var message = user.message;
    var status = user.status;
    if (message === "User found" && status === "success" ) {
        $('#informasi').empty();
        y.style.display = "none";
        x.style.display = "block";
        console.log(user.packages.length);
        for(var i = 0; i < user.packages.length; i++){
            console.log(user.packages[i])
            if(user.packages[i].orderStatus === "SUCCEED"){
                if(user.packages[i].packageTag === "ruangguru"){
                    $('#informasi').append('<div class="px-4 sm:px-0"><h5 class="text-md font-medium leading-6 text-gray-900">Selamat Anda Berpeluang Mendapatkan Hadiah <b>Pensil Spesial Ruang Guru</b></h5><hr><p class="mt-1 text-sm text-gray-600">*Silahkan Isi Formulir Pengiriman di Samping!</p></div> ');
                }else if(user.packages[i].packageTag === "skillacademy"){
                    $('#informasi').append('<div class="px-4 sm:px-0"><h5 class="text-md font-medium leading-6 text-gray-900">Selamat Anda Berpeluang Mendapatkan Hadiah <b>Tas Spesial Ruang Guru</b></h5><hr><p class="mt-1 text-sm text-gray-600">*Silahkan Isi Formulir Pengiriman di Samping!</p></div> ');
                }else{
                    $('#informasi').append('<div class="px-4 sm:px-0"><h5 class="text-md font-medium leading-6 text-gray-900">Selamat Anda Berpeluang Mendapatkan Hadiah <b>Sepatu Spesial Ruang Guru</b></h5><hr><p class="mt-1 text-sm text-gray-600">*Silahkan Isi Formulir Pengiriman di Samping!</p></div> ');
                }
             
            var user_id = user.user.userId; 
            var user_name = user.user.userName;
            var email = user.user.userEmail;   
            var order_status =  user.packages[i].orderStatus;
            var packag_name = user.packages[i].packageName;
            var package_serial = user.packages[i].packageSerial;
            var package_tag = user.packages[i].packageTag;
            

            $(document).on('click', '#btn-submit', function(e){
                var url = '{{ route('pelanggan.store') }}';
                var delivery_address = $('#delivery_address').val();
                var contact_number = $('#contact_number').val();
                var contact_person = $('#contact_person').val();
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url:url,
                    method:'POST',
                    data:
                    {
                        _token: "{{ csrf_token() }}",
                        user_id,
                        user_name,
                        email,
                        order_status,
                        packag_name,
                        package_serial,
                        package_tag,
                        delivery_address,
                        contact_number,
                        contact_person,
                    },
                    success:function (response) {
                        location.reload();
                        alert("Submit Berhasil");
                    }
                    

                })
            })
            // postData(user_id, user_name, email, order_status, packag_name, package_serial, package_tag, delivery_address, contact_number, contact_person);

            }else if(user.packages[i].orderStatus === "IN_PROGRESS"){
                $('#informasi').append('<br><div class="px-4 sm:px-0"><hr><p class="mt-1 text-sm text-gray-900">-Order Kelas <b>'+user.packages[i].packageName+'</b> status <b>'+user.packages[i].orderStatus+'</b></p></div> ');
            }else{
                $('#informasi').append('<br><div class="px-4 sm:px-0"><hr><p class="mt-1 text-sm text-gray-900">-Order Kelas <b>'+user.packages[i].packageName+'</b> status <b>'+user.packages[i].orderStatus+'</b></p></div> ');
            }
            
        }
        $('#informasi').append('<br><div class="px-4 sm:px-0"><p class="mt-1 text-sm text-gray-600">**Dapatkan Lebih banyak Hadiah Lainnya!!</p></div> '); 
    }else if(message === "User not found" && status === "error"){
        $('#user-not-found').empty();
        y.style.display = "block";
        $("#user-not-found").append('<h1 class="text-gray-600 text-lg" align="center">USER ID TIDAK DITEMUKAN!</h1>');
        x.style.display = "none";
        $('#informasi').empty();
    }else{
        $('#user-not-found').empty();
        y.style.display = "block";
        $("#user-not-found").append('<h1 class="text-gray-600 text-lg">Anda Belum Berlangganan Kelas Apapun, Silahkan Berlanggan!!!</h1>');
        x.style.display = "none";
        $('#informasi').empty();
    }
}

function postData(user_id, user_name, email, order_status, packag_name, package_serial, package_tag, delivery_address, contact_number, contact_person)
{
    var url = '{{ route('pelanggan.store') }}';
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url:url,
        method:'POST',
        data:
        {
            user_id,
            user_name,
            email,
            order_status,
            packag_name,
            package_serial,
            package_tag,
            delivery_address,
            contact_number,
            contact_person,
        }
    })
}
</script>