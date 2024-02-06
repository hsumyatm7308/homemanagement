@extends('layouts.adminindex')
@section('caption',"Category List")
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
                <th>Status</th>
                <th>By</th>
                <th>Crated At</th>
                <th>Update At</th>
                <th>Action</th>
               
            </tr>
        </thead>
        <tbody>
            
            @foreach($categories as $idx=>$category)
            <tr>
                <td>{{++$idx}}</td>
               

                <td>{{$category['title']}}</td>
                <td>
                    <div>
                        <div class="form-check form-switch">
                            {{-- <input type="checkbox" class="form-check-input" {{ $category->status_id === 3 ? 'checked' : ''}} /> --}}
                        </div>
                    </div>
                </td>
                <td>{{$category->user['name']}}</td>
                <td>{{$category->created_at->format('d-M-Y')}}</td>
                <td>{{$category->updated_at->format('d-M-Y')}}</td>
               
                <td>
                    <a href="javascript:void(0);" class="text-info editform" data-bs-toggle="modal" data-bs-target="#editmodal" data-id="{{$category->id}}" data-name="{{$category->name}}" data-status="{{$category->status_id}}"><i class="fas fa-pen"></i></a>
                    
                    <button type="button" class="btn btn-sm btn-danger px-3 deleteform" data-bs-toggle="modal" data-bs-target="#deletemodal" data-id = "{{$category->id}}">Del</button>
                </td>
  
                <form id="formdelete-{{$category->id}}" action="{{route('categories.destroy',$category -> id)}}" method="POST">
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
                <form id="{{route('categories.store')}}" action="" method="POST" enctype="multipart/form-data">
       
                    {{csrf_field()}}

                   <div class="row align-items-end">
                       <div class="col-md-7 form-group">
                           <label for="title"> Name <span class="text-danger">*</span></label>

                           <input type="text" name="title" id="title" class="form-control form-control-sm rounded-0" placeholder="Enter your name" value="{{old('title')}}" />
                       </div>

                       <div class="col-md-3 form-group">
                        <label for="status_id"> Status <span class="text-danger">*</span></label>
                        <select name="status_id" id="status_id" class="form-control form-control-sm rounded-0">
{{--                             
                             @foreach($statuses as $status)
                                <option value="{{$status['id']}}">{{$status['name']}}</option>
                            @endforeach
                             --}}
                        </select>
                       </div>
               
                       <div class="col-md-2">
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
                <button type="category" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <form id="formaction" action="" method="POST">
           
                    {{csrf_field()}}
                    {{method_field('PUT')}}
            
                   <div class="row align-items-end">
                       <div class="col-md-7 form-group">
                           <label for="editname"> Name <span class="text-danger">*</span></label>

                           <input type="text" name="title" id="editname" class="form-control form-control-sm rounded-0" placeholder="Enter your name" value="{{old('title')}}" />
                       </div>

                       <div class="col-md-3 form-group">
                        <label for="editstatus_id"> Status <span class="text-danger">*</span></label>
                        
                        <select name="status_id" id="editstatus_id" class="form-control form-control-sm rounded-0">
                            {{-- @foreach($statuses as $status)
                                <option value="{{$status['id']}}">{{$status['name']}}</option>
                            @endforeach
                             --}}
                        </select>
                       </div>
               
                       <div class="col-md-2">
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
              <h3> Are you sure delete this item? </h3>
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

{{-- Str = string --}}
{{-- Str::limit($categories -> remark,10) --}}

@section('script')

<script type="text/javascript">

$(document).ready(function(){

         //start edit form 
$(document).on('click','.editform',function(e){
            // console.log($(this).attr('data-name'),$(this).attr('data-id'))

            $("#editname").val($(this).attr('data-name'));
            $("#editstatus_id").val($(this).data('status'));

            const getid = $(this).attr('data-id');
            
            $("#formaction").attr("action",`/categories/${getid}`);

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
});
    

</script>

@endsection 

{{-- home work --}}
 {{-- category == categories  == types --}}