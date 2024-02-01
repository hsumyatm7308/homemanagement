
@extends('layouts.adminindex')

@section('content')
  <section class="container">
      <div class="mt-5">
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Type</th>
              <th scope="col">Category</th>
              <th scope="col">Cost</th>
              <th scope="col">By</th>
              <th scope="col">Create</th>
              <th scope="col">Update</th>
              <th scope="col">Action</th>
              
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row"><button class="btn btn-sm">1</button></th>
              <td><button class="btn btn-sm">Fish</button></td>
              <td><button class="btn btn-sm">House cost</button></td>
              <td><button class="btn btn-sm">4000</button></td>
              <td><button class="btn btn-sm">Admin</button></td>
              <td><button class="btn btn-sm">22/3/24</button></td>
              <td><button class="btn btn-sm">22/3/24</button></td>
              <td class="d-flex ">
                 <a href=""><button class=" btn btn-sm px-3">Edit</button></a>
                 <button type="button" class="btn btn-sm btn-danger px-3">Del</button>
              </td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>Jacob</td>
              <td>Thornton</td>
              <td>@fat</td>
            </tr>
            <tr>
              <th scope="row">3</th>
              <td colspan="2">Larry the Bird</td>
              <td>@twitter</td>
            </tr>
          </tbody>
        </table>
 
      </div>
  </section>
@endsection