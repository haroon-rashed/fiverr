<x-layout>
    <x-nav />
    <div class="container-fluid bg-light py-4">
        <div class="container mt-4">
            <div class="row">
                <!-- Left Sidebar -->
                <div class="col-md-3">
                    <div class="card shadow mb-4">
                        <div class="card-body text-center">
                            <img src="https://fiverr-res.cloudinary.com/t_profile_original,q_auto,f_auto/attachments/profile/photo/f73f36c92e49717450a28ca3fd018de4-1706100210964/67d2dfee-aece-43a2-a055-14d9ae0af0df.jpg"
                                alt="Profile" class="rounded-circle mb-2" style="width: 80px; height: 80px;">
                            <h5>Aqqaqa</h5>
                            <p>@aqua7</p>
                            <button class="btn btn-outline-primary w-100">View Profile</button>
                        </div>
                    </div>
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <h6>Level Overview</h6>
                            <p>My level: <strong>Level 0</strong></p>
                            <p>Success score: -</p>
                            <p>Rating: <span>&#9733;</span></p>
                            <p>Response rate: -</p>
                            <button class="btn btn-outline-primary w-100">View Progress</button>
                        </div>
                    </div>
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <h6>Availability</h6>
                            <p>While unavailable, your gigs are hidden, and you will not receive new orders.</p>
                            <button class="btn btn-outline-primary w-100">Set Your Availability</button>
                        </div>
                    </div>
                    <div class="card shadow">
                        <div class="card-body">
                            <h6>Earned in December</h6>
                            <p><strong>$0</strong></p>
                        </div>
                    </div>
                </div>

                <!-- Main Content -->
                <div class="col-md-9">
                    <div
                        class="d-flex bg-white shadow border p-4 rounded-2 justify-content-between align-items-center mb-4">
                        <h5>Active Orders - 0 ($0)</h5>
                        <button class="btn btn-outline-secondary">Active Orders (0)</button>
                    </div>
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <h5>3 steps to become a top seller on Fiverr</h5>
                            <p>The key to your success on Fiverr is the brand you build for yourself through your Fiverr
                                reputation. We gathered some tips and resources to help you become a leading seller on
                                Fiverr.</p>
                            <div class="row text-center">
                                <div class="col-md-4">
                                    <div class="mb-2">&#128227;</div>
                                    <h6>Get noticed</h6>
                                    <p>Tap into the power of social media by sharing your gig and getting expert help to
                                        grow your impact.</p>
                                    <button class="btn btn-outline-primary">Share Your Gig</button>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-2">&#128218;</div>
                                    <h6>Get more skills & exposure</h6>
                                    <p>Hone your skills and expand your knowledge with online courses. Gain more
                                        exposure
                                        with every course completed.</p>
                                    <button class="btn btn-outline-primary">Explore Learn</button>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-2">&#127942;</div>
                                    <h6>Become a successful seller</h6>
                                    <p>Watch this free online course to learn how to create an outstanding service
                                        experience for your buyer.</p>
                                    <button class="btn btn-outline-primary">Watch Free Course</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card bg-white shadow">
                        <div class="card-body bg-white d-flex">
                            <div class="bg-white">
                                <h5>The 7 secrets</h5>
                                <p>Create story content that sells.</p>
                            </div>
                            <img src="image.jpg" alt="Secrets" class="ms-auto" style="width: 150px; height: auto;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('seller.partials.footer')


</x-layout>