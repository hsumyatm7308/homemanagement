@extends('layouts.adminindex')
@section('caption',"Create Post")
@section('content')

<!--Start Page Content Area-->

<div class="container-fluid mt-5">

    <div class="col-md-12">

        <form action="/dailycosts" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')

            <div class="row">

                <div class="col-md-4">

                    <div class="row">

                        <div class="col-md-12 form-group mb-3">
                            <label for="image" class="gallery">Choose Image</label>

                            <input type="file" name="image" id="image" class="form-control form-control-lg rounded-0"
                                placeholder="Enter your image" value="{{old('image')}}" hidden />
                        </div>

                           
                   

                    </div>

                </div>

                <div class="col-md-8">

                    <div class="row">


                      

                        <div class="col-md-6 form-group mb-3">
                            <label for="name"> Type <span class="text-danger">*</span></label>
                            <input type="text" name="name" id="name" class="form-control form-control-sm rounded-0"
                                placeholder="Enter your Title name" value="{{old('name')}}" />
                        </div>


                        <div class="col-md-6 form-group mb-3">

                            <label for="amount"> Amount <span class="text-danger">*</span>
                            </label>

                            <input type="number" name="amount" id="amount" class="form-control form-control-sm rounded-0"
                                placeholder="Class fee" value="{{old('fee')}}" />

                        </div>
                        <div class="col-md-12 form-group mb-3">

                            <label for="remark"> Remark <span class="text-danger">*</span>
                            </label>

                            <textarea name="remark" id="remark" class="form-control form-control-lg rounded-0"
                                rows="5" placeholder="Say Something...">{{old('content')}}</textarea>

                        </div> 



                        <div class="col-md-3 form-group">

                            <label for="category_id"> Categroy <span class="text-danger">*</span>
                            </label>

                            {{-- <select name="category_id" id="category_id" class="form-control form-control-sm rounded"> --}}

                                {{-- @foreach($tags as $tag)
                                <option value="{{$tag->id}}">{{$tag->name}}</option>
                                @endforeach --}}

                            {{-- </select> --}}

                            <input type="text" name="category_id" id="category_id" class="form-control form-control-sm rounded-0"
                                placeholder="Enter your Title name" value="{{old('name')}}" />

                        </div>


                    

                        <div class="col-md-3 d-flex justify-content-end align-items-end">

                            <a href="{{route('dailycosts.index')}}" class="btn btn-secondary btn-sm rounded-0">Cancel</a>
                            <button type="submit" class="btn btn-info btn-sm rounded-0 ms-3">Submit</button>

                        </div>


                    </div>

                </div>

            </div>

        </form>

    </div>

</div>

<!--End Page Content Area-->

@endsection

@section('style')

<style type="text/css">
    /* summernote css1  */
    .gallery {
        width: 100%;

        background-color: #eee;
        color: #aaa;
        text-align: center;
        padding: 10px;
        margin: auto;

        display: flex;
        justify-content: center;
        align-items: center;
    }

    .removetext span {
        display: none;
    }

    .gallery img {
        width: 100px;
        height: 100px;
        object-fit: cover;
        border: 2px dashed #aaa;
        border-radius: 10px;
        padding: 5px;
        margin: 0 5px;
    }
</style>


@endsection

@section('script')
// summernote css1 js1
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

<script type="text/javascript">


    $(document).ready(function () {
        // console.log("hi")

        var previewimages = function (input, output) {
            // console.log(input.files);

            if (input.files) {
                var totalfiles = input.files.length;
                // console.log(totalfiles);

                if (totalfiles > 0) {
                    $('.gallery').addClass('removetext');
                } else {
                    $(".gallery").removeClass('removetext');
                }

                for (var i = 0; i < totalfiles; i++) {
                    var filereader = new FileReader(); filereader.onload = function (e) {
                        $(output).html(""); $($.parseHTML("<img>")).attr("src", e.target.result).appendTo(output);
                    }
                    filereader.readAsDataURL(input.files[i]);
                }
            }
        };

        // for single image

        $("#image").change(function () {
            previewimages(this, ".gallery");
        })

    });


</script>

@endsection