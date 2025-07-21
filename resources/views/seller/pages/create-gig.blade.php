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
<x-popup/>
    <div class="container-fluid bg-light p-2">
        <div class="container mt-5">
            <form action="{{ route('seller-add-gig') }}" method="POST" class="form" enctype="multipart/form-data">

                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <!-- Overview Section -->
                        <div class="section-box">
                            <h2>Overview</h2>
                            <div class="mb-3">
                                <label for="gigTitle" class="form-label">Gig Title</label>
                                <input name='title' type="text" class="form-control" id="gigTitle"
                                    placeholder="I will do marketing design for your business"
                                    value={{ old('title') }}>
                                    @error('title')
                                        <div class="alert alert-danger">{{ $message }}</div>    
                                    @enderror
                            </div>

                            <div class="mb-3">
                                <label for="category" class="form-label">Category</label>
                                <select name='category' class="form-select" id="category" value="{{ old('category') }}">
                                    <option value="" selected disabled>Select a category</option>
                                    <!-- Assuming $categories is passed from the controller -->
                                   @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                    @error('category')
                                        <div class="alert alert-danger">{{ $message }}</div>    
                                    @enderror
                            </div>

                            <div class="mb-3 ">
                                <label class="form-label">Platform Type</label>
                                <div class="types"></div>
                                
                                <x-loader />
                                    @error('category_values')
                                        <div class="alert alert-danger">{{ $message }}</div>    
                                    @enderror
                            </div>
                        </div>

                        <!-- Description & FAQ Section -->
                        <div class="section-box">
                            <h2>Description & FAQ</h2>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea  value="{{old('description')}}" name='description' class="form-control" id="description" rows="4"
                                    placeholder="Write a detailed description of your gig"></textarea>
                                        @error('description')
                                        <div class="alert alert-danger">{{ $message }}</div>    
                                    @enderror
                            </div>

                            <div class="mb-3">
                                <label for="faq" class="form-label">FAQ</label>
                                <textarea name='faq' value='{{old('faq')}}' class="form-control" id="faq" rows="4"
                                    placeholder="Add frequently asked questions"></textarea>
                                        @error('faq')
                                        <div class="alert alert-danger">{{ $message }}</div>    
                                    @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <!-- Pricing Section -->
                        <div class="section-box">
                            <h2>Pricing</h2>
                            <div class="mb-3">
                                <label for="basicPrice" class="form-label">Basic Package</label>
                                <input name='base_price' value="{{old('base_price')}}" type="text" class="form-control" id="basicPrice"
                                    placeholder="Enter basic package price">
                                        @error('base_price')
                                        <div class="alert alert-danger">{{ $message }}</div>    
                                    @enderror
                            </div>

                            <div class="mb-3">
                                <label for="standardPrice" class="form-label">Standard Package</label>
                                <input name='standard_price' value="{{old('standard_price')}}" type="text" class="form-control" id="standardPrice"
                                    placeholder="Enter standard package price">
                                        @error('standard_price')
                                        <div class="alert alert-danger">{{ $message }}</div>    
                                    @enderror
                            </div>

                            <div class="mb-3">
                                <label for="premiumPrice" class="form-label">Premium Package</label>
                                <input name='premium_price' value="{{old('premium_price')}}" type="text" class="form-control" id="premiumPrice"
                                    placeholder="Enter premium package price">
                                        @error('premium_price')
                                        <div class="alert alert-danger">{{ $message }}</div>    
                                    @enderror
                            </div>
                        </div>

                        <!-- Gallery Section -->
                        <div class="section-box">
                            <h2>Gallery</h2>
                            <div class="mb-3">
                                <label for="galleryUpload" class="form-label">Upload Images</label>
                                <input name='images'  class="form-control" type="file" id="galleryUpload">
                                    @error('images')
                                        <div class="alert alert-danger">{{ $message }}</div>    
                                    @enderror
                            </div>
                        </div>

                        <!-- Tags Section -->
                        <div class="section-box">
                            <h2>Search Tags</h2>
                            <div class="mb-3">
                                <label for="search-tags" class="form-label">Search tags</label>
                                <input name='tags' value="{{old('tags')}}" class="form-control" type="search" id="search-tags">
                                    @error('tags')
                                        <div class="alert alert-danger">{{ $message }}</div>    
                                    @enderror
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
    let option = $("#category").val();
    let _token = $('meta[name="csrf-token"]').attr('content')

    $.ajax({
        url:'/seller/get-relevant-values',
        type: 'POST',
        data:{
            option,
            _token
        },
        beforeSend: function () {
             $(".types").addClass('d-none');           
            $(".skeleton-loader").removeClass('d-none');
        },
                  success: function (response) {
          console.log(response);
            let data = '';
            response.forEach(function (item, index) {
                data += `<div>
                            <input type="checkbox" name="category_values[]" value="${item}" id="checkbox-${item}" />
                            <label>${item.trim()}</label>
                        </div>`;
            });
              $(".types").html(data);
            $(".skeleton-loader").addClass('d-none'); 
            $(".types").removeClass('d-none'); 
            
        },
        error:function(err){
            console.log(err)
        }

    })
});

//add gig

$('.add-gig').on('click', function () {
    let formData = new FormData();

    formData.append('title', $('input[name="title"]').val());
    formData.append('category', $('select[name="category"]').val());
    formData.append('description', $('textarea[name="description"]').val());
    formData.append('faq', $('textarea[name="faq"]').val());
    formData.append('base_price', $('input[name="base_price"]').val());
    formData.append('standard_price', $('input[name="standard_price"]').val());
    formData.append('premium_price', $('input[name="premium_price"]').val());
    formData.append('tags', $('input[name="tags"]').val());
    formData.append('_token', $('meta[name="csrf-token"]').attr('content'));

    let imageFile = $('input[name="images"]')[0].files[0];
    formData.append('images', imageFile);

    $('input[name="category_values[]"]:checked').each(function () {
        formData.append('category_values[]', $(this).val());
    });

    $.ajax({
        url: '/seller/add-gig',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false, 
        beforeSend: function () {
            $(".add-gig").text('Saving...').prop('disabled', true);
        },
        success: function (response) {
            console.log(response);
           $(".add-gig").text('Save & Continue').prop('disabled', false);
    $(".message").text(response.message); 

    $("#notification").addClass("show");

    setTimeout(() => {
        $("#notification").removeClass("show");
    }, 5000);
    $('.form')[0].reset();
        },
        error: function (xhr) {
            console.log(xhr.responseJSON); 
        }
    });
});


    </script>
</x-layout>
