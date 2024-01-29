
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