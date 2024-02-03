
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
                 <button type="button" class="btn btn-sm btn-danger px-3 " data-bs-toggle="modal" data-bs-target="#deletemodal">Del</button>
              </td>
            </tr>
            @endforeach
         
          </tbody>

        </table>
 
      </div>
  </section>


  <div class="modal fade" id="deletemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
       <div class="modal-content">
       
          <div class="modal-body mx-auto p-5">
              <h3> Are you sure delete this item? </h3>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Delete</button>
          </div>
       </div>
       
 
    </div>
 </div>
@endsection



@section('script')

    


@endsection