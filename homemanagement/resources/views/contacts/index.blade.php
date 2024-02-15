
@extends('layouts.adminindex')
@section('content')

<!--Start Page Content Area-->

    <div class="container-fluid mt-5">
        <div class="col-md-12"> 

            <a href="#createmodal" class="btn btn-primary btn-sm rounded-0" data-bs-toggle="modal">Create</a>


        <table id="mytable" class="mydata table table-striped table-hover border mt-5">
        <thead>
            <tr class="table-primary">
                <th>No</td>
                <th>Name</th>
                <th>Phone</th>
                <th>Status</th>
                <th>relative</th>
                <th>By</th>
                <th>Crated At</th>
                <th>Update At</th>
                <th>Action</th>
               
            </tr>
        </thead>
        <tbody>
            
            @foreach($contacts as $idx=>$contact)
            <tr>
                <td>{{++$idx}}</td>
               

                <td><a href="{{route('contacts.show',$contact->id)}}"> {{$contact['title']}}</a></td>
                <td>{{$contact['number']}}</td>
                <td>
                    <div>
                        <div class="form-check form-switch">
                            <input type="checkbox" class="form-check-input change-btn" {{ $contact->status_id === 1 ? 'checked' : ''}}  data-id="{{$contact->id}}" />
                        </div>
                    </div>
                </td>
                <td>relative</td>
                <td>{{$contact->user['name']}}</td>
                <td>{{$contact->created_at->format('d-M-Y')}}</td>
                <td>{{$contact->updated_at->format('d-M-Y')}}</td>
               
                <td>
                    <a href="javascript:void(0);" class="text-primary me-3 editform" data-bs-toggle="modal" data-bs-target="#editmodal" data-id="{{$contact->id}}" data-title="{{$contact->title}}" data-birthday="{{$contact->birthday}}"   data-relative="{{$contact->relative_id}}" data-status="{{$contact->status_id}}">Edit</a>
                    
                    <button type="button" class="btn btn-sm btn-danger px-3 deleteform" data-bs-toggle="modal" data-bs-target="#deletemodal" data-id = "{{$contact->id}}">Del</button>
                </td>
  
                <form id="formdelete-{{$contact->id}}" action="{{route('contacts.destroy',$contact -> id)}}" method="POST">
                  @csrf 
                  @method('DELETE')
                 
                </form>
            
            </tr> 
            @endforeach

        </tbody>
        </table>

        </div>

    </div>
               
<!--End Page Content Area-->

 <!--Start create model-->
 <div id="createmodal" class="modal fade">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-0">

            <div class="modal-header">
                <h6 class="modal-title">Create Form</h6>
                <button type="type" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <form id="{{route('contacts.store')}}" action="" method="POST" enctype="multipart/form-data">
       
                    {{csrf_field()}}

                   <div class="row align-items-end">
                       <div class="col-md-6 form-group mt-2">
                           <label for="title"> Name <span class="text-danger">*</span></label>

                           <input type="text" name="title" id="title" class="form-control form-control-sm rounded-0" placeholder="Enter your name" value="{{old('title')}}" />
                       </div>

                       <div class="col-md-6 form-group mt-2">
                        <label for="phnumber"> Number <span class="text-danger">*</span></label>

                        <input type="text" name="number" id="phnumber" class="form-control form-control-sm rounded-0" placeholder="Enter your number" value="{{old('number')}}" />
                       </div>

               
                       <div class="col-md-6 form-group mt-2">
                        <label for="birthday"> Birthday <span class="text-danger">*</span></label>

                        <input type="date" name="birthday" id="birthday" class="form-control form-control-sm rounded-0" placeholder="Enter your number" value="{{old('number')}}" />
                       </div>




                       <div class="col-md-6 form-group mt-2">
                        <label for="status_id"> Status <span class="text-danger">*</span></label>
                        <select name="status_id" id="status_id" class="form-control form-control-sm rounded-0">
                            
                             @foreach($statuses as $status)
                                <option value="{{$status['id']}}">{{$status['title']}}</option>
                            @endforeach
                            
                        </select>
                       </div>

                       <div class="col-md-8 form-group mt-2">
                        <label for="relative_id"> Relative <span class="text-danger">*</span></label>
                        <select name="relative_id" id="relative_id" class="form-control form-control-sm rounded-0">
                            
                             @foreach($relatives as $relative)
                                <option value="{{$relative['id']}}">{{$relative['title']}}</option>
                            @endforeach
                            
                        </select>
                       </div>


                  

                       <div class="col-md-4 d-flex justify-content-end mt-2">
                            <button type="button" class="btn btn-secondary btn-sm rounded-0 me-2">Cancle</button>                             
                            <button type="submit" class="btn btn-primary btn-sm rounded-0">Create</button>                             
                       </div>                  
                   </div>
    
               </form>
            </div>

        </div>
    </div>
</div>
<!--End create model-->

 <!--Start eidt model-->
 <div id="editmodal" class="modal fade">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-0">

            <div class="modal-header">
                <h6 class="modal-title">Edit Form</h6>
                <button type="contact" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <form id="formaction" action="" method="POST">
           
                    {{csrf_field()}}
                    {{method_field('PUT')}}
            
                   <div class="row align-items-end">
                    <div class="col-md-6 form-group mt-2">
                        <label for="edittitle"> Name <span class="text-danger">*</span></label>

                        <input type="text" name="title" id="edittitle" class="form-control form-control-sm rounded-0" placeholder="Enter your name" value="{{old('title')}}" />
                    </div>

                       <div class="col-md-6 form-group mt-2">
                        <label for="editnumber"> Number <span class="text-danger">*</span></label>

                        <input type="text" name="number" id="editnumber" class="form-control form-control-sm rounded-0" placeholder="Enter your number" value="{{$contact->number}}" />
                       </div>

               
                       <div class="col-md-6 form-group mt-2">
                        <label for="editbirthday"> Birthday <span class="text-danger">*</span></label>

                        <input type="date" name="birthday" id="editbirthday" class="form-control form-control-sm rounded-0" placeholder="Enter your number" value="{{$contact->birthday}}" />
                       </div>


                       <div class="col-md-6 form-group">
                        <label for="editstatus_id"> Status <span class="text-danger">*</span></label>
                        
                        <select name="status_id" id="editstatus_id" class="form-control form-control-sm rounded-0">
                            @foreach($statuses as $status)
                                <option value="{{$status['id']}}">{{$status['title']}}</option>
                            @endforeach
                            
                        </select>
                       </div>
               


                       <div class="col-md-8 form-group mt-2">
                        <label for="editrelative_id"> Relative <span class="text-danger">*</span></label>
                        <select name="relative_id" id="editrelative_id" class="form-control form-control-sm rounded-0">
                            
                             @foreach($relatives as $relative)
                                <option value="{{$relative['id']}}">{{$relative['title']}}</option>
                            @endforeach
                            
                        </select>
                       </div>
                       
                       <div class="col-md-4 d-flex justify-content-end">
                            <button type="button" class="btn btn-secondary btn-sm rounded-0 me-2">Cancle</button>                             
                            <button type="submit" class="btn btn-primary btn-sm rounded-0">Update</button>                             
                       </div>                  
                   </div>
    
               </form>
            </div>

            <div class="modal-footer">

            </div>

        </div>
    </div>
</div>
<!--End edit model-->

{{-- delete model  --}}
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
{{-- end delete model    --}}

@endsection



@section('script')

<script type="text/javascript">

$(document).ready(function(){

         //start edit form 
        $(document).on('click','.editform',function(e){

            $("#edittitle").val($(this).attr('data-title'));
            $('#editnumber').val($(this).attr('data-number'));
            $('#editbirthday').val($(this).attr('data-birthday')); 
            $('#editrelative_id').val($(this).attr('data-relative')); 
            $("#editstatus_id").val($(this).data('status'));

            const getid = $(this).attr('data-id');
                    
            $("#formaction").attr("action",`/contacts/${getid}`);

            e.preventDefault();
        });
        //end edit form

        //start delete item
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

        //end delete item


        // change status 
        $(document).on('click', '.change-btn', function() {

            let getid = $(this).attr('data-id');

            let contactstatus = $(this).prop('checked') ? 1 : 2 ;

            $.ajax({
                url : "contactstatus",
                method : "GET",
                dataType: "json",
                data : {"id" : getid ,"status_id" : contactstatus},

                success: function(response){
                    console.log(response.success);
                }
            })
        });
        // change status 
});
    

</script>

@endsection 
