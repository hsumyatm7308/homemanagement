
@extends('layouts.adminuserindex')

@section('usercontent')

<div class="container mx-auto text-[#e0e1dd]">
    <div>
        <div class="px-2 py-10">
            <h1 class="text-2xl">Create Daily Cost</h1>
        </div>
        <form action="" method="POST">
           <div class="grid grid-cols-2 gap-4 ">

            <div class="flex flex-col p-2">
                <label for="image" class="gallery">Choose Image</label>

                <input type="file" name="image" id="image" class="form-control form-control-lg rounded-0"
                    placeholder="Enter your image" value="{{old('image')}}" hidden />
            </div>
                
                <div class="flex flex-col p-2">
                    <label for="goods" class="mb-2">Goods</label>
                    <input type="text" name="goods" id="goods" class="p-3 bg-[#1b263b]" placeholder="goods">
                </div>

                <div class="flex flex-col p-2">
                    <label for="costs" class="mb-2">Cost</label>
                    <input type="text" name="costs" id="costs" class="p-3 bg-[#1b263b]" placeholder="goods">
                </div>
            
                <div class="col-span-2 flex flex-col p-2">
                    <label for="remark" class="mb-2">Remark</label>
                    <textarea name="remark" id="remark" cols="30" rows="10" class="p-3 bg-[#1b263b]" placeholder="Type..."></textarea>
                    
                </div>
                <div class="flex flex-col p-2">
                    <label for="tag_id" class="mb-2">Tag</label>
                    <input type="text" name="tag_id" id="tag_id" class="p-3 bg-[#1b263b]" placeholder="goods">
                </div>

              

                <div class="flex flex-col p-2">
                    <label for="date" class="mb-2">Date</label>
                    <input type="date" name="date" id="date" class="p-3 bg-[#1b263b]" placeholder="goods">
                </div>


                <div class="col-span-2 flex justify-end space-x-4 p-2">
                      <a type="" ><button class="bg-[#1b263b] px-4 py-3">Cancle</button></a>
                      <button type="submit" class="bg-[#e0e1dd] text-black px-4 py-3">Create</button>
                </div>
            
            
            
           </div>
        </form>
    </div>
</div>


@endsection
@section('css')
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
<script>
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