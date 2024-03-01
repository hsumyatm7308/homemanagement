@extends('layouts.adminindex')

@section('content')
<section class="container-fluid mt-5">





    <div class="d-flex justify-content-between mt-5">



        <div>
            <form action="" class="d-flex justify-content-center align-items-center">
                <div class="input-group me-3">
                    <select name="filter" id="filter" class="form-control form-control-sm rounded-0">
                        <option value="">Choose duration</option>
                        <option value="lastweek" {{request('filter')=='lastweek' ? "selected" : "" }}>Last Week</option>
                        <option value="lastmonth" {{ request('filter')=='lastmonth' ? "selected" : "" }}>Last Month
                        </option>
                        <option value="last-3-month" {{request('filter')=='last-3-month' ? "selected" : "" }}>Last 3
                            Month</option>
                    </select>
                </div>

                <div class="input-group">
                    <input type="text" name="filtername" id="filtername" class="form-control form-control-sm rounded-0"
                        placeholder="Search" value="{{request('filtername')}}">
                    <button type="button" id="btn-search" class="btn btn-secondary btn-sm"><i
                            class="fas fa-search"></i></button>

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
                    <td><img src="{{asset($trash -> image)}}" class="rounded-circle " width="20" height="20" /> <a
                            href="{{route('trashes.show',$trash->id)}}"
                            class="ms-2">{{Str::limit($trash->name,20)}}</a></td>

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
                        <a href="{{route('trashes.edit',$trash->id)}}"><button
                                class="text-primary btn btn-sm px-3">Edit</button></a>
                        <a href="{{route('dailycosts.restore',$trash->id)}}"><button class="text-white btn btn-sm btn-secondary px-3">Restore</button></a>
              

                    </td>

                    <form id="formdelete-{{$trash->id}}" action="{{route('trashes.destroy',$trash -> id)}}"
                        method="POST">
                        @csrf
                        @method('DELETE')

                    </form>

                </tr>





                @endforeach

            </tbody>

        </table>


    </div>



    <div class="d-flex justify-content-end mt-5">
        {{-- {{ $trashes->appends(request()->only('filter'))->links('pagination::default') }} --}}
    </div>


    {{-- php artisan vendor:publish --tag=laravel-pagination --}}







</section>


@endsection

<div class="modal fade" id="deletemodal" tabindex="-1" aria-hidden="true">
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

    $(document).ready(function () {

        // Start Delete Form 
        $(document).on('click', '.deleteform', function () {

            let getid = $(this).attr('data-id');

            $('.delete-btns').attr('data-delid', getid);

            let getdelid = $('.delete-btns').attr('data-delid');

            $('#delete-btns').click(function () {
                if (getid == getdelid) {
                    $(`#formdelete-${getid}`).submit();
                }
            });


        });
        // End Delete form 





    });

    //   Start Filter 
    document.getElementById('filter').addEventListener('click', function () {
        let getfilterid = this.value || this.options[this.selectedIndex].value;
        window.location.href = window.location.href.split('?')[0] + '?filter=' + getfilterid
    })



    //   Start Filter 
    const getfilterbtn = document.getElementById('btn-search');
    getfilterbtn.addEventListener('click', function (e) {
        // console.log('hi')
        const getfiltername = document.getElementById('filtername').value;
        const getcururl = window.location.href;

        window.location.href = getcururl.split('?')[0] + '?filtername=' + getfiltername;
        console.log(getfiltername)
        e.preventDefault();
    });
    // End Filter 
    // End Duration 



</script>

@endsection