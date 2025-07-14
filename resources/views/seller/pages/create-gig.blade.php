<x-layout>
    <style>
        .section-box {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
        }

        h2 {
            color: #343a40;
        }

        .form-label {
            font-weight: bold;
            color: #495057;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
    <x-nav />
    <x-sidebar />

    <div class="container-fluid bg-light p-2">
        <div class="container mt-5">
            <form action="/seller/add-gig" class="form" method="POST" enctype="multipart/form-data">
                
                <div class="row">
                    <div class="col-lg-6">
                        <!-- Overview Section -->
                        <div class="section-box">
                            <h2>Overview</h2>
                            <div class="mb-3">
                                <label for="gigTitle" class="form-label">Gig Title</label>
                                <input name='title' type="text" class="form-control" id="gigTitle"
                                    placeholder="I will do marketing design for your business"
                                    value="">
                            </div>

                            <div class="mb-3">
                                <label for="category" class="form-label">Category</label>
                                <select name='category' class="form-select" id="category">
                                   @foreach ($categories as $category)
                                        <option value="{{ $category->name }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3 ">
                                <label class="form-label">Platform Type</label>
                                <div class="types"></div>
                                {{-- <x-loader /> --}}
                            </div>
                        </div>

                        <!-- Description & FAQ Section -->
                        <div class="section-box">
                            <h2>Description & FAQ</h2>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea name='desc' class="form-control" id="description" rows="4"
                                    placeholder="Write a detailed description of your gig"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="faq" class="form-label">FAQ</label>
                                <textarea name='faq' class="form-control" id="faq" rows="4"
                                    placeholder="Add frequently asked questions"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <!-- Pricing Section -->
                        <div class="section-box">
                            <h2>Pricing</h2>
                            <div class="mb-3">
                                <label for="basicPrice" class="form-label">Basic Package</label>
                                <input name='base_package' type="text" class="form-control" id="basicPrice"
                                    placeholder="Enter basic package price">
                            </div>

                            <div class="mb-3">
                                <label for="standardPrice" class="form-label">Standard Package</label>
                                <input name='standard_package' type="text" class="form-control" id="standardPrice"
                                    placeholder="Enter standard package price">
                            </div>

                            <div class="mb-3">
                                <label for="premiumPrice" class="form-label">Premium Package</label>
                                <input name='premium_package' type="text" class="form-control" id="premiumPrice"
                                    placeholder="Enter premium package price">
                            </div>
                        </div>

                        <!-- Gallery Section -->
                        <div class="section-box">
                            <h2>Gallery</h2>
                            <div class="mb-3">
                                <label for="galleryUpload" class="form-label">Upload Images</label>
                                <input name='images' class="form-control" type="file" id="galleryUpload" multiple>
                            </div>
                        </div>

                        <!-- Tags Section -->
                        <div class="section-box">
                            <h2>Search Tags</h2>
                            <div class="mb-3">
                                <label for="search-tags" class="form-label">Search tags</label>
                                <input name='tags' class="form-control" type="search" id="search-tags">
                            </div>
                        </div>

                        <button type="button" class="btn add-gig btn-primary d-block ms-auto ">Save &
                            Continue</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <x-jquery />

    <script>
        $('#category').on('change', function () {
            let option = $(this).val()
            let _token = 'dummy_token'; // static token

            $.ajax({
                url: '/seller/get-relevant-values',
                type: 'POST',
                data: {
                    option,
                    _token
                },
                beforeSend: function () {
                    $('.skeleton-loader').removeClass('d-none')
                    $('.types').addClass('d-none')
                },
                success: function (response) {
                    // For static example
                    let data = `<div class="form-check">
                                    <input value="Facebook" class="form-check-input" type="checkbox" name='category_values[]' id="checkbox-1">
                                    <label class="form-check-label" for="checkbox-1">Facebook</label>
                                </div>
                                <div class="form-check">
                                    <input value="Instagram" class="form-check-input" type="checkbox" name='category_values[]' id="checkbox-2">
                                    <label class="form-check-label" for="checkbox-2">Instagram</label>
                                </div>`;
                    $('.types').removeClass('d-none')
                    $('.types').html(data)
                    $('.skeleton-loader').addClass('d-none')
                },
                error: function (xhr) {
                    console.log(xhr)
                }
            })
        });

        // add gig
        $('.add-gig').on('click', function () {
            let _token = 'dummy_token';
            let btn = $(this)
            let formData = new FormData();
            formData.append('_token', _token);
            formData.append('title', $('input[name="title"]').val());
            formData.append('category', $('select[name="category"]').val());
            formData.append('desc', $('textarea[name="desc"]').val());
            formData.append('faq', $('textarea[name="faq"]').val());
            formData.append('base_package', $('input[name="base_package"]').val());
            formData.append('standard_package', $('input[name="standard_package"]').val());
            formData.append('premium_package', $('input[name="premium_package"]').val());
            formData.append('images', $('input[name="images"]')[0].files[0]);
            formData.append('tags', $('input[name="tags"]').val());

            $('input[name="category_values[]"]:checked').each(function () {
                formData.append('category_values[]', $(this).val());
            });

            $.ajax({
                url: '/seller/add-gig',
                type: 'POST',
                contentType: false,
                processData: false,
                data: formData,
                beforeSend: function () {
                    btn.html(`<div class="spinner-border" role="status">
                            <span class="visually-hidden">Loading...</span>
                            </div>`)
                },
                success: function (response) {
                    console.log('Success:', response);
                    $('.notification').css('transform', 'translateY(0)')
                    $('.notification').html('Gig inserted successfully!')
                    setTimeout(() => {
                        $('.notification').css('transform', 'translateY(300px)')
                    }, 5000);
                    $('.form')[0].reset()
                    
                    btn.html('Save & Continue')
                },
                error: function (xhr) {
                    console.error('Error:', xhr.responseText);
                }
            });
        });
    </script>
</x-layout>
