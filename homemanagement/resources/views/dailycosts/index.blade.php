
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
              <td><img src="{{asset($dailycost -> image)}}" class="rounded-circle " width="20" height="20" /> <a href="" class="ms-2">{{Str::limit($dailycost->name,20)}}</a></td>

              <td><button class="btn btn-sm">{{$dailycost->category_id}}</button></td>
              {{-- <td><button class="btn btn-sm">{{$dailycost->category->name}}</button></td> --}}
              <td><button class="btn btn-sm">{{$dailycost->amount}}</button></td>

              <td><button class="btn btn-sm">{{$dailycost->user['name']}}</button></td>
              <td><button class="btn btn-sm">{{$dailycost->created_at->format('d-M-Y')}}</button></td>
              <td><button class="btn btn-sm">{{$dailycost->remark}}</button></td>
              <td><button class="btn btn-sm">{{$dailycost->updated_at->format('d-M-Y')}}</button></td>
              <td class="d-flex ">
                 <a href="{{route('dailycosts.edit',$dailycost->id)}}"><button class=" btn btn-sm px-3">Edit</button></a>
                 <button type="button" class="btn btn-sm btn-danger px-3">Del</button>
              </td>
            </tr>
            @endforeach
         
          </tbody>

        </table>
 
      </div>
  </section>
@endsection