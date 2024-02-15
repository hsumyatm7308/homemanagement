@extends('layouts.adminindex')
@section('caption','contact Show')
@section('content')

    <!-- Start Page Content Area -->

    <div class="container-fluid mt-5">

   

        <div class="col-md-12">

            <a href="javascript:void(0);" id="btn-back" class="btn btn-secondary btn-sm rounded-0">Back</a>
            <a href="{{route('contacts.index')}}" class="btn btn-secondary btn-sm rounded-0">Close</a>

            <hr/>

            <div class="row">
                
            <div class="col-md-4 col-lg-3 mb-2">   
                <h6>Info</h6>
                <div class="card border-0 rounded-0 shadow">

                    <div class="card-body">

                        <div class="d-flex flex-column align-items-center mb-3">
                            <div class="fw-bold h5 mb-2">{{$contact->title}}</div>
                            <div class="text-muted mb-3">
                                <span class="fw-semibold h6">{{$contact->number}}</span>
                            </div>
                            <div style="width:200px; height:200px; background:#fcf2f2;">
                                <img src="{{ asset($contact->image) }}" alt="{{ $contact->name }}" width="200" />
                            </div>
                            
                        </div>   
                        
                     

                        <div class="mb-5">

                            <div class="row g-0 mb-2">
                                <div class="col-auto">
                                    <i class="fas fa-user"></i>
                                </div>
                                <div class="col ps-3">
                                    <div class="row">
                                        <div class="col">
                                            <div>Relative</div>
                                        </div>
                                        <div class="col-auto">
                                            {{-- <div>{{$contact->relative->name}}</div> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                          
                            
                            <div class="row g-0 mb-2">
                                <div class="col-auto">
                                    <i class="fas fa-user"></i>
                                </div>
                                <div class="col ps-3">
                                    <div class="row">
                                        <div class="col">
                                            <div>By</div>
                                        </div>
                                        <div class="col-auto">
                                            <div>{{$contact['user']['name']}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                                          
                   

                            <div class="row g-0 mb-2">
                                <div class="col-auto">
                                    <i class="fas fa-calendar-alt"></i>
                                </div>
                                <div class="col ps-3">
                                    <div class="row">
                                        <div class="col">
                                            <div>Created</div>
                                        </div>
                                        <div class="col-auto">
                                            <div>{{date('d M Y',strtotime($contact->created_at))}} | {{date('h:i:s A',strtotime($contact->created_at))}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row g-0 mb-2">
                                <div class="col-auto">
                                    <i class="fas fa-edit"></i>
                                </div>
                                <div class="col ps-3">
                                    <div class="row">
                                        <div class="col">
                                            <div>Updated</div>
                                        </div>
                                        <div class="col-auto">
                                            <div>{{date('d M Y',strtotime($contact->updated_at))}} | {{date('h:i:s A',strtotime($contact->updated_at))}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="col-md-8 col-lg-9">  

        


                <h6>Additional Info</h6>
                <div class="card border-0 rounded-0 shadow mb-4">
                        <ul class="nav"> 
                            <li class="nav-item">
                                <button type="button" id="autoclick" class="tablinks active" onclick="gettab(event,'remark')">Remark</button>
                            </li>
                         
                        </ul>
                
                        <div class="tab-content">
                
                            <div id="remark" class="tab-panel">
                                <h6>This is Home informations</h6>
                                <p>{!! $contact->remark !!}</p>
                            </div>
                
                            <div id="following" class="tab-panel">
                                <h6>This is Profile informations</h6>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                            </div>
                
                            <div id="liked" class="tab-panel">
                                <h6>This is Contact informations</h6>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                            </div>
                
                            <div id="remark" class="tab-panel">
                                <p></p>
                            </div>
                
                        </div>

                </div>




            </div>

            </div>



        </div>

    </div>


	<!-- End Page Content Area -->





    
@endsection

@section('style')
    <style type="text/css">

        /* start comment */
        .chat-boxs{
            height: 200px;
            overflow-y:scroll;
        }
        /* end comment */


        /* Start Tab Box */
        .nav{
                display: flex;

                padding: 0;
                margin: 0;
            }

            .nav .nav-item{
                list-style-type: none;
            }

            .nav .tablinks{
                border: none;
                outline: none;
                cursor: pointer;

                padding: 14px 16px;

                transition: background-color 0.3s;
            }

            .nav .tablinks:hover{
                background-color: #f3f3f3;
            }

            .nav .tablinks.active{
                color: blue;
            }


            .tab-panel{
                padding: 6px 12px;
                display: none;
            }

        /* End Tab Box */


    </style>
@endsection

@section('script')
<script type="text/javascript">

        // Start Back Btn
            const getbtnback =  document.getElementById('btn-back');
            getbtnback.addEventListener('click',function(){
                // window.history.back();
                window.history.go(-1);
            });
        // End Back Btn 

        // Start Tab Box
            let gettablinks = document.getElementsByClassName('tablinks'),
                gettabpanels = document.getElementsByClassName('tab-panel');

            // console.log(gettablinks);
            // console.log(gettablinks[0]);

            // console.log(gettabpanels);

        let tabpanels = Array.from(gettabpanels);
        // console.log(tabpanels);


        function gettab(evn,link){
            // console.log(evn.target);
            // console.log(evn.currentTarget);
            // console.log(link);

            // Remove Active 
            for(var x=0; x < gettablinks.length; x++){
                // console.log(x); //0 to 3

                // remove active 
                gettablinks[x].className = gettablinks[x].className.replace(' active','');
            }

            // Add active 

            // evn.target.className = "tablinks active";
            // evn.target.className += " active";
            // evn.currentTarget.className += " active";
            // evn.target.className = evn.target.className.replace('tablinks','tablinks active');
            evn.target.classList.add('active');

            // Hide Panel 
            tabpanels.forEach(function(tabpanel){
                tabpanel.style.display = "none";
            });

            // Show Panel
            document.getElementById(link).style.display= "block";
        }


        document.getElementById('autoclick').click();
        // End Tab Box
    
    </script>
@endsection

