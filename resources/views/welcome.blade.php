<x-layout>
    <x-nav />
   <div class="hero my-4">
    <div class="container p-4">
      <h1 class="display-4 font-bold text-white">Welcome back, Username</h1>
      <div class="row">
        <div class="col-md-6">
          <div class="card mb-3 p-4 shadow border-0 rounded-4">
            <p class="text-uppercase text-secondary fw-semibold">Recommended for you</p>
            <div class="d-flex align-items-center">
              <div class="p-3 clip-circle d-flex justify-content-center align-items-center bg-light shadow">
                <i class="bi bi-book"></i>
              </div>
              <div>
                <h6>Post a project brief</h6>
                <p class="text-secondary">Get tailored offers for your need</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card p-4 shadow border-0 rounded-4">
            <p class="text-uppercase text-secondary fw-semibold">Recommended for you</p>
            <div class="d-flex align-items-center">
              <div class="p-3 clip-circle d-flex justify-content-center align-items-center bg-light shadow">
                <i class="bi bi-book"></i>
              </div>
              <div>
                <h6>Post a project brief</h6>
                <p class="text-secondary">Get tailored offers for your need</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Jobs section -->
  <div class="container">
    <h4>Based on your browsing history</h4>
    <ul class="mt-4 mb-1 text-secondary list-unstyled text-capitalize fw-semibold fs-6 d-flex gap-3">
      <li class="active relevent-li cursor-pointer">keep exploring</li>
      <li class="relevent-li cursor-pointer">Python development</li>
      <li class="relevent-li cursor-pointer">JS</li>
      <li class="relevent-li cursor-pointer">Web</li>
      <li class="relevent-li cursor-pointer">AI</li>
    </ul>
    <hr class="m-0">

    <div class="row p-3">

      <!-- Static gig card 1 -->
      @foreach ($gigs as $gig)
          
      <div class="col-lg-3 col-md-4 col-sm-6 my-2">
        <a href="/seller/single-gig/{{$gig->id}}" class="card text-decoration-none shadow-lg rounded-3 border-0">
          <img class="rounded-3 rounded-bottom-0" width="100%" height="200px" style="object-fit: cover" src="{{ asset('/storage/'. $gig->images) }}" alt="Gig 1">
          <div class="py-4 px-2">
            <div class="d-flex gap-2 align-items-center">
              <div class="img user-image">
                <img src="{{ asset('/storage/'. $gig->images) }}" width="20" height="20" class="rounded-circle border border-success" alt="user image">
              </div>
              <h6 class="username m-0 text-capitalize">john_doe</h6>
            </div>
            <p class="text-secondary-emphasis fw-semibold my-2">
              {{ $gig->description }}
            </p>
            <div class="d-flex">
              ⭐ <span class="fw-bolder">5.0</span> <span class="text-secondary">(24)</span>
            </div>
            <h6>From $135</h6>
          </div>
        </a>
      </div>
      
      @endforeach
      <!-- More static cards can be added here if needed -->

    </div>
  </div>












    <x-jquery />

    <script>
        let btn = $('.sidebar-btn')
        $('.sidebar').on('click', (e) => {
            e.stopPropagation()
        })
        btn.on('click', function() {
            $('.underlay').removeClass('translate-nx-100')
            setTimeout(() => {
                $('.sidebar').removeClass('translate-nx-100')
            }, 400);
        })

        $('.underlay').on('click', function() {
            $('.sidebar').addClass('translate-nx-100')
            setTimeout(() => {
                $('.underlay').addClass('translate-nx-100')

            }, 400);
        })
        $('.close-sidebar').on('click', function() {
            $('.sidebar').addClass('translate-nx-100')
            setTimeout(() => {
                $('.underlay').addClass('translate-nx-100')

            }, 400);
        })


        // get the relevent li

        $('.relevent-li').each(function(index) {

            $(this).on('click', function() {
                $('.relevent-li').each(function() {
                    $(this).removeClass('active')
                })
                $(this).addClass('active')
            })


        })
    </script>

</x-layout>