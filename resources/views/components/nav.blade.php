<x-sidebar />
<div
    class="d-flex flex-column flex-md-row col-md-10 col-11 mx-auto  align-items-center justify-content-between gap-md-3 transition-fast">
    <div class="d-flex gap-2 align-items-center justify-content-start align-self-start">
        <div class="cursor-pointer sidebar-btn">
            <i class="bi bi-list fs-2 d-flex   d-lg-none"></i>
        </div>

        <img src="https://brandlogos.net/wp-content/uploads/2022/05/fiverr-logo_brandlogos.net_f2xbf.png" width="100px"
            alt="logo">
    </div>
    <div style="overflow: hidden" class="search d-flex w-100 align-items-center">
        <input type="text" placeholder="What services are you looking for today?"
            class="form-control w-100 rounded-end-0 border-end-0">
        <span style="background:#222325;width:50px"
            class="text-white d-flex justify-content-center align-items-center rounded-start-0 form-control">
            <i class="bi bi-search"></i>
        </span>
    </div>
    <div class="d-lg-flex d-none align-items-center gap-3 ">
        <i class="bi bi-bell"></i>
        <i class="bi bi-envelope"></i>
        <i class="bi bi-heart"></i>
    </div>
     @auth
        <h6 class="fw-semibold d-none d-md-flex text-success" style="width:max-content;white-space: nowrap">Switch to
            selling</h6>
    @endauth



    @guest
        <a href="{{ route('login') }}" class="fw-semibold text-decoration-none d-none d-md-flex cursor-pointer text-success"
            style="width:max-content;white-space: nowrap">
            Login</a>
    @endguest

    @auth

        <img style="object-fit:contain"
            src="https://plus.unsplash.com/premium_photo-1683121366070-5ceb7e007a97?fm=jpg&q=60&w=3000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NXx8dXNlcnxlbnwwfHwwfHx8MA%3D%3D"
            width="30px" height="30px" class="rounded-circle border d-none d-md-flex border-success" alt="user image">
        <h6 style="white-space: nowrap">{{ auth()->user()->name }}</h6>
    @endauth -

</div>