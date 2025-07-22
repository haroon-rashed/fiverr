<x-layout>
    <x-nav />
    <hr>
    <x-popup />
    @include('seller.partials.skeleton')
    {{-- @include('seller.partials.continue-menu') --}}
    {{-- {{$findGig}} --}}
    <div class="container mt-5 gig-content d-none">
        <div class="row">
            <!-- Image Section -->
            <div class="col-lg-8 col-md-6">
              <img src="..." alt="Cartoon Caricature" class="img-fluid gig-image rounded w-100" style="height: auto; max-height: 450px; object-fit: contain;">

            </div>

            <!-- Details Section -->
            <div class="col-lg-4 col-md-6">
                <h1 class="title">I will draw cartoon caricature for you</h1>
                <div class="d-flex align-items-center mb-2">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ3wxJ0c-jC6VcDASO9aiDWD9zWAeJLKrS5gg&s" alt="Seller" class="rounded-circle me-2" width="50"
                        height="50">
                    <div>
                        <strong class="username"></strong>
                        <div class="rating-stars">
                            &#9733;&#9733;&#9733;&#9733;&#9733; <span class="text-muted">(168 reviews)</span>
                        </div>
                    </div>
                </div>
                <div class="border  rounded mb-3">

                    <div class="d-flex w-100 mb-3 " style="background: #FAFAFA">
                        <div style="cursor: pointer"
                            class="d-flex w-100 package align-items-center bg-white basic border w-25 justify-content-center text-capitalize fw-semibold fs-5 p-3 text-center">
                            Basic
                        </div>
                        <div style="cursor: pointer"
                            class="d-flex w-100 package text-secondary standard bg-light align-items-center border w-25 justify-content-center text-capitalize fw-semibold fs-5 p-3 text-center">
                            standard
                        </div>
                        <div style="cursor: pointer"
                            class="d-flex w-100 package text-secondary premium bg-light align-items-center border w-25 justify-content-center text-capitalize fw-semibold fs-5 p-3 text-center">
                            premium
                        </div>
                    </div>
                    <div class="p-3">
                        <p>1 headshot with 300 dpi and final result in JPG or PNG</p>
                        <ul>
                            <li>1 Figure</li>
                            <li>Include Source File</li>
                            <li>Printable resolution file</li>
                            <li>Add background/scene</li>
                            <li>Include colors in illustration</li>
                            <li>Commercial Use</li>
                            <li>1 Panel</li>
                        </ul>
                        <h3 class="text-success price"></h3>
                        <button class="btn btn-primary order-btn w-100 mb-2">Continue</button>
                        <button class="btn btn-outline-secondary w-100">Contact me</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- About Section -->
        <div class="row mt-4">
            <div class="col-12">
                <h3>About this gig</h3>
                <p>Provide more details about the gig here, such as what the buyer can expect and additional information
                    about the service.</p>
            </div>
        </div>
    </div>

    <x-jquery />




    {{-- <script>
          let package_name
        let package_price;
        let newPrice;
        $(document).ready(function(){
            $('.gig-content').addClass('d-none')
            $('.gig-skeleton').removeClass('d-none')
            let git_id = window.location.pathname.split('/').pop();
            console.log(git_id)
            $.ajax({
                url:"seller/get-single-gig/"+git_id,
                type: 'GET',
                data: {},
                success: function(response){
                    $('.gig-content').removeClass('d-none')
                    $('.gig-skeleton').addClass('d-none')
                    console.log(response)
                       $('.basic').on('click', function() {
                        $('.price').html(`$${response.base_package}`);
                        $('.package').removeClass('bg-white text-dark').addClass(
                            'bg-light text-secondary');
                        $('.package').eq(0).addClass('bg-white text-dark');
                    });
                },
                error:function(xhr){
                    console.log(xhr)
                }
            })
        })
    </script> --}}
    <script>
        let package_name
        let package_price;
        let newPrice;
        $(document).ready(function() {
            $('.gig-content').addClass('d-none')
            $('.gig-skeleton').removeClass('d-none')
            let gig_id = window.location.pathname.split('/').pop()

            $.ajax({
                url: `/seller/get-single-gig/${gig_id}`,
                type: 'GET',
                data: {},
                success: function(response) {
                    console.log(response)
                    $('.username').html(response?.user?.name)
                    $('.order-to').val(response?.user?.id)
                    $('.services').val(response?.title)
                    $('.seller_name').val(response?.user?.name)
                    $('.title').html(response?.title)
                    $('.gig-image').attr('src', `/storage/${response?.images}`)
                    $('.price').html(`$${response.base_package}`)
                    $('.gig-content').removeClass('d-none')
                    $('.gig-skeleton').addClass('d-none')
                    $('.basic').on('click', function() {
                        $('.price').html(`$${response.base_package}`);
                        $('.package').removeClass('bg-white text-dark').addClass(
                            'bg-light text-secondary');
                        $('.package').eq(0).addClass('bg-white text-dark');
                    });
                    package_name = 'basic'
                    package_price = response?.base_package
                    $('.package').val(package_name)

                    $('.price-input').val(package_price)

                    $('.standard').on('click', function() {
                        $('.price').html(`$${response.standard_package}`);
                        $('.package').removeClass('bg-white text-dark').addClass(
                            'bg-light text-secondary');
                        $('.package').eq(1).addClass('bg-white text-dark');
                        package_name = 'standard'
                        package_price = response?.standard_package
                        $('.price-input').val(package_price)
                        $('.package').val(package_name)

                    });
                    $('.basic').on('click', function() {

                        package_name = 'basic'
                        package_price = response?.base_package
                    });

                    $('.premium').on('click', function() {
                        $('.price').html(`$${response.premium_package}`);
                        $('.package').removeClass('bg-white text-dark').addClass(
                            'bg-light text-secondary');
                        $('.package').eq(2).addClass('bg-white text-dark');
                        package_name = 'premium'
                        package_price = response?.premium_package
                        $('.price-input').val(package_price)
                        $('.package').val(package_name)

                    });





                },
                error: function(xhr) {
                    console.log(xhr)
                    $('.gig-skeleton').addClass('d-none')
                }
            })



        })

        $('.order-btn').on('click', function() {
            $('.underlay-order').css('visibility', 'visible')
            $('.order-sidebar').css('transform', 'translateX(0)')
            $('.package_name').html(package_name)
            $('.package_price').html(package_price)
            console.log(package_name, package_price)
        })
        $('.underlay-order').on('click', function() {
            $('.underlay-order').css('visibility', 'hidden')
            $('.order-sidebar').css('transform', 'translateX(100%)')
        })
        $('.btn-close').on('click', function() {
            $('.underlay-order').css('visibility', 'hidden')
            $('.order-sidebar').css('transform', 'translateX(100%)')
        })
        $('.order-sidebar').on('click', function(e) {
            e.stopPropagation()
        })



        // quantity
        let val = 1
        $('.quantity').html(val)
        $('.quantity-input').val(val)
        $('.btn-dec').on('click', function() {
            val--;
            if (val < 1) {
                val = 1
            }
            $('.quantity').html(val)
            $('.quantity-input').val(val)

            newPrice = package_price * val

            $('.package_price').html(newPrice)
            $('.price-input').val(newPrice)


        })
        $('.btn-inc').on('click', function() {
            val++;
            if (val > 20) {
                val = 20
            }
            $('.quantity').html(val)
            $('.quantity-input').val(val)

            newPrice = package_price * val

            $('.package_price').html(newPrice)
            $('.price-input').val(newPrice)


        })
    </script>


</x-layout> 