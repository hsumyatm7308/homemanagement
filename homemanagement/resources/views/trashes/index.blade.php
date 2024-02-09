
@extends('layouts.adminindex')

@section('content')
  <section class="container-fluid mt-5">

  
  

  
      <div class="d-flex justify-content-between mt-5">
   

        <div>
            <button class="btn btn-primary rounded-0">Delete All</button>
        </div>
       
        <div>
          <form action="">
            <div class="form-group">
                <select name="duration" id="duration" class="border-info form-control form-control-sm rounded-0 duration">
                    <option value="">Choose duration</option>
                    <option value="lastweek" class="lastweek"></option>
                    <option value="lastmonth">Last Month</option>
                    <option value="last3months">Last 3 Months</option>
                </select>
            </div>

        </form>
        
        </div>
  



      </div>


      <div class="mt-5">
        <table class="table table-striped">

          <thead>
            <tr class="table-primary">
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
          @foreach($trashes as $idx => $trash)

            <tr class="mb-5">
              <th scope="row"><button class="btn btn-sm">{{++$idx}}</button></th>
              <td><img src="{{asset($trash -> image)}}" class="rounded-circle " width="20" height="20" /> <a href="{{route('trashes.show',$trash->id)}}" class="ms-2">{{Str::limit($trash->name,20)}}</a></td>

              <td><button class="btn btn-sm">
                @if ($trash->category)
                  {{ $trash->category->title }}
                @endif
            </button></td>
              <td><button class="btn btn-sm">{{$trash->amount}}</button></td>

              <td><button class="btn btn-sm">{{$trash->user['name']}}</button></td>
              <td><button class="btn btn-sm">{{$trash->created_at->format('d-M-Y')}}</button></td>
              <td><button class="btn btn-sm">{{Str::limit($trash->remark,30)}}</button></td>
              <td><button class="btn btn-sm">{{$trash->updated_at->format('d-M-Y')}}</button></td>
              <td class="d-flex ">
                 <a href="{{route('trashes.edit',$trash->id)}}"><button class="text-primary btn btn-sm px-3">Edit</button></a>
                 <button type="button" class="btn btn-sm btn-danger px-3 deleteform" data-bs-toggle="modal" data-bs-target="#deletemodal" data-id = "{{$trash->id}}">Del</button>
              </td>

              <form id="formdelete-{{$trash->id}}" action="{{route('trashes.destroy',$trash -> id)}}" method="POST">
                @csrf 
                @method('DELETE')
               
              </form>
             
            </tr>





            @endforeach
         
          </tbody>

        </table>


      </div>

       

      <div class="d-flex justify-content-end mt-5">
        {{ $trashes->appends(request()->only('filter'))->links('pagination::default') }}
     </div>
    
     
      {{-- php artisan vendor:publish --tag=laravel-pagination --}}




    


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

    // Start Delete Form 
    $(document).on('click', '.deleteform', function() {

    let getid = $(this).attr('data-id');

    $('.delete-btns').attr('data-delid', getid);

    let getdelid = $('.delete-btns').attr('data-delid');

    $('#delete-btns').click(function(){
      if(getid == getdelid){
      $(`#formdelete-${getid}`).submit();
    }
    });


    });
    // End Delete form 





  });


    // Start Duration 
    document.getElementById('duration').addEventListener('click',function(){
      var getfilterid = this.value;
      window.location.href = window.location.href.split('?')[0] + "?filter="+getfilterid 
      
    })
    // End Duration 



</script>

@endsection