
@extends('layouts.adminindex')

@section('content')
  <section class="container-fluid mt-5">

  
  

  
      <div class="d-flex justify-content-between mt-5">
   

        <div>
          <a href="{{route('dailycosts.create')}}" class="btn btn-primary rounded-0">
            <span>Create</span>
          </a>  
        </div>
       
        <div>
          <form action="" class="d-flex justify-content-center align-items-center">
            <div class="input-group me-3">
              <select name="filter" id="filter" class="form-control form-control-sm rounded-0">
                <option value="">Choose duration</option>
                <option value="lastweek" {{request('filter') == 'lastweek' ? "selected" : "" }}>Last Week</option>
                <option value="lastmonth"  {{ request('filter') == 'lastmonth' ? "selected" : "" }}>Last Month</option>
                <option value="last-3-month" {{request('filter') == 'last-3-month' ? "selected" : "" }}>Last 3 Month</option>
            </select>
            </div>

            <div class="input-group">
              <input type="text" name="filtername" id="filtername" class="form-control form-control-sm rounded-0" placeholder="Search" value="{{request('filtername')}}">
              <button type="button" id="btn-search" class="btn btn-secondary btn-sm"><i class="fas fa-search"></i></button>

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
          @foreach($dailycosts as $idx => $dailycost)

            <tr class="mb-5">
              <th scope="row"><button class="btn btn-sm">{{++$idx}}</button></th>
              <td><img src="{{asset($dailycost -> image)}}" class="rounded-circle " width="20" height="20" /> <a href="{{route('dailycosts.show',$dailycost->id)}}" class="ms-2">{{Str::limit($dailycost->name,20)}}</a></td>

              <td><button class="btn btn-sm">
                @if ($dailycost->category)
                  {{ $dailycost->category->title }}
                @endif
            </button></td>
              <td><button class="btn btn-sm">{{$dailycost->amount}}</button></td>

              <td><button class="btn btn-sm">{{$dailycost->user['name']}}</button></td>
              <td><button class="btn btn-sm">{{$dailycost->created_at->format('d-M-Y')}}</button></td>
              <td><button class="btn btn-sm">{{Str::limit($dailycost->remark,30)}}</button></td>
              <td><button class="btn btn-sm">{{$dailycost->updated_at->format('d-M-Y')}}</button></td>
              <td class="d-flex ">
                 <a href="{{route('dailycosts.edit',$dailycost->id)}}"><button class="text-primary btn btn-sm px-3">Edit</button></a>
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

       

      <div class="d-flex justify-content-end mt-5">
        {{ $dailycosts->appends(request()->only('filter'))->links('pagination::default') }}
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

  //   Start Filter 
  document.getElementById('filter').addEventListener('click',function(){
      let getfilterid = this.value || this.options[this.selectedIndex].value;
      window.location.href = window.location.href.split('?')[0] + '?filter='+getfilterid
    })



    //   Start Filter 
  const getfilterbtn = document.getElementById('btn-search');
  getfilterbtn.addEventListener('click',function(e){
    // console.log('hi')
    const getfiltername = document.getElementById('filtername').value;
    const getcururl = window.location.href;

    window.location.href = getcururl.split('?')[0] + '?filtername='+getfiltername;
    console.log(getfiltername)
    e.preventDefault();
  });
// End Filter 
    // End Duration 



</script>

@endsection