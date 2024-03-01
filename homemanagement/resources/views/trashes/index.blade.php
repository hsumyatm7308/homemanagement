
@extends('layouts.adminindex')

@section('content')

@if($dailycosttrashes->count() > 0)

<div class="d-flex ">
  <div class="border p-3 mt-5 me-5" style="width:100px;">
    <a href="{{route('dailycosts.transindex')}}" class="fs-6"> dailycost</a>
  </div>

  @else


@endif

  
@if($contacttrashes->count() > 0)
  <div class="border p-3 mt-5 me-5" style="width:100px;">
      <a href="{{ route('contacts.transindex') }}" class="fs-6">contact</a>
  </div>
@endif





</div>
@endsection

<div class="modal fade" id="deletemodal" tabindex="-1"  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
       
        <div class="modal-body mx-auto p-5">
            <h3> Are you sure delete? </h3>
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

    console.log(getid);

    $('.delete-btns').attr('data-delid', getid);

    let getdelid = $('.delete-btns').attr('data-delid');

    $('#delete-btns').click(function(){
      if(getid == getdelid){
        $(`#formdelete-${getid}`).submit();

       }else{
        $(`#formdelete-all`).submit();

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