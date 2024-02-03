
@extends('layouts.adminindex')

@section('content')
  <section class="container-fluid mt-5">

  
    <div>
        <a href="{{route('dailycosts.create')}}" class="btn btn-primary">
          <span>Create</span>
        </a>
    </div>


      <div class="mt-5">
        <table class="table table-striped">

          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Type</th>
              <th scope="col">Category</th>
              <th scope="col">Cost</th>
              <th scope="col">By</th>
              <th scope="col">Date</th>
              <th scope="col">Remark</th>
              <th scope="col">Update</th>
              <th scope="col">Action</th>
              
            </tr>
          </thead>

          <tbody>
          @foreach($dailycosts as $idx => $dailycost)

            <tr>
              <th scope="row"><button class="btn btn-sm">{{++$idx}}</button></th>
              <td><img src="{{asset($dailycost -> image)}}" class="rounded-circle " width="20" height="20" /> <a href="{{route('dailycosts.show',$dailycost->id)}}" class="ms-2">{{Str::limit($dailycost->name,20)}}</a></td>

              <td><button class="btn btn-sm">{{$dailycost->category_id}}</button></td>
              {{-- <td><button class="btn btn-sm">{{$dailycost->category->name}}</button></td> --}}
              <td><button class="btn btn-sm">{{$dailycost->amount}}</button></td>

              <td><button class="btn btn-sm">{{$dailycost->user['name']}}</button></td>
              <td><button class="btn btn-sm">{{$dailycost->created_at->format('d-M-Y')}}</button></td>
              <td><button class="btn btn-sm">{{Str::limit($dailycost->remark,30)}}</button></td>
              <td><button class="btn btn-sm">{{$dailycost->updated_at->format('d-M-Y')}}</button></td>
              <td class="d-flex ">
                 <a href="{{route('dailycosts.edit',$dailycost->id)}}"><button class=" btn btn-sm px-3">Edit</button></a>
                 <button type="button" class="btn btn-sm btn-danger px-3 deleteform" data-bs-toggle="modal" data-bs-target="#deletemodal" data-id = "{{$dailycost->id}}">Del</button>
              </td>

              <form id="formdelete-{{$dailycost->id}}" action="{{route('dailycosts.destroy',$dailycost -> id)}}" method="POST">
                @csrf 
                @method('DELETE')
               
              </form>
             
            </tr>





            @endforeach
         
          </tbody>

        </table>
 
      </div>
  </section>


@endsection

<div class="modal fade" id="deletemodal" tabindex="-1"  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
       
        <div class="modal-body mx-auto p-5">
            <h3> Are you sure delete this item? </h3>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button id="delete-btns" type="submit" class="btn btn-primary delete-btns" data-delid="">Delete</button>
        </div>

        
  
       
    </div>
    

  </div>
</div>



@section('script')

<script type="text/javascript">

  $(document).ready(function(){

    $(document).on('click', '.deleteform', function() {

    let getid = $(this).attr('data-id');

    $('.delete-btns').attr('data-delid', getid);

    let getdelid = $('.delete-btns').attr('data-delid');

    $('#delete-btns').click(function(){
      if(getid == getdelid){
      $(`#formdelete-${getid}`).submit();
    }
    })
  });


  });


</script>

@endsection