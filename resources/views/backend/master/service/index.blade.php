@extends('layouts.app')
@extends('partial.header')
@extends('partial.sidevar')

@section('content')
@include('sweetalert::alert')
<style>
  .btn-icon{
    background-color:#fff;
    border:none;
  }
  .fa-solid{
    color:#000;
  }
  
  .ser-img{
    width: 100px;
    height: 100px;
    border-radius: 100%;
  }
  .read-btn{
    color: #000;
    background: none;
    border: none;
    font-weight: 700;
  }
  .service-img{
    width: 100px;
    height: 100px;
    border-radius: 100%;
  }
  .style-btn{
    border: navajowhite;
    background-color: #fff;
  }
</style>
<div class="main-panel" style="width:100% !important">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-home"></i>
                </span> Services
              </h3>
              <nav aria-label="breadcrumb over-view">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page">
                    <span></span>Wallet Amount<i class="mdi mdi-wallet-travel icon-sm text-primary align-middle"></i><br>
                    <span><i class="fa-solid fa-brazilian-real-sign">&nbsp;{{ Auth::user()->points ? Auth::user()->points : '0' }}.00</i></span>
                  </li>
                </ul>
              </nav>
            </div>
              <div class='mb-3 text-end'>
                  <button type="button" class='btn  btn-sm my-btn' data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="mdi mdi-plus-box"></i>Create Services</button>
              </div><hr>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                      <div class="col-md-12">
                          <div class="table-responsive">
                              <table class="table">
                              <thead>
                                <tr>
                                <th>#</th>
                                <th>Service</th>
                                <th>Description</th>
                                <th>Icon</th>
                                <th>Action</th>
                                </tr>
                              </thead>
                             <?php $count = 1; ?>
                              @if(isset($service))
                              @foreach($service as $services)
                                  <tbody>
                                      <tr>
                                      <td>{{$count ++}}</td>
                                      <td>{{$services->service_name}}</td>
                                      <td><div>{{Str::limit($services->description, 50)}}
                                      <button type="button" class="showbtn read-btn" value="{{$services->id}}">Read more</button>
                                      </div></td>
                                      <td><img src="{{asset('/image/'.$services->image)}}" style="width:40%;" alt=""></td>
                                      <td>
                                        <button value="{{$services->id}}" class="style-btn edit-btn"><i class="fa-solid fa-pen-to-square"></i></button>
                                        <form action="{{ route('services.destroy',$services->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="style-btn"><i class="fa-solid fa-trash"></i></button>
                                        </form>
                                      </td>
                                      </tr>
                                  </tbody>
                              @endforeach
                              @endif 
                            </table>
                          </div>
                     </div>
                  </div>
                </div>
            </div>
          </div>
          <!-- Modal create-->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <form method="POST" action="" id="regForm" enctype="multipart/form-data">
                        @csrf
                        <div class="form-outline mb-4">
                        <label class="form-label" for="">Service Name <span class="text-danger">*</span></label>
                        <input type="text" name="service_name" id="service_name" placeholder="Service Name" class="form-control" required />
                        </div>
                        <div class="form-outline mb-4">
                        <label class="form-label" for="">Icon <span class="text-danger">*</span></label>
                        <input type="file" name="image"  id="icon" class="form-control" required/>
                        </div>
                        <div class="form-outline mb-4">
                        <label class="form-label" for="">Description <span class="text-danger">*</span></label>
                        <textarea class="form-control" rows="5" name="description" id="textarea"></textarea>
                        </div>
                        <div class="d-flex justify-content-center">
                        <button type="submit"
                            class="btn  btn-sm my-btn">Add</button>
                        </div>
                    </form>
                    </div>
                    </div>
                </div>
            </div>
            <!-- Modal create-->
            <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Description</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                      <div class="modal-body" id="readMore">
                      
                      </div>
                    </div>
                </div>
            </div>

             <!--Edit Modal -->
             <div class="modal fade" id="edit-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Package Edit</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="text-center">
                                      <img src="#" class="service-img shadow" id="image" alt="">
                                    </div>
                                    <form method="POST" action="{{route('service.update')}}" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-outline mb-4">
                                            <input type="hidden" name="id" id="service_id" value="">
                                        <label class="form-label" for="">Service Name <span class="text-danger">*</span></label>
                                        <input type="text" name="service_name" required id="s-name" placeholder="Service Name" class="form-control" />
                                        </div>
                                        <div class="form-outline mb-4">
                                        <label class="form-label" for="">Icon <span class="text-danger">*</span></label>
                                        <input type="file" name="image"  id="icon" class="form-control"/>
                                        </div>
                                        <div class="form-outline mb-4">
                                        <label class="form-label" for="">Description <span class="text-danger">*</span></label>
                                        <textarea class="form-control" rows="5" required name="description" id="description"></textarea>
                                        </div>
                                        <div class="d-flex justify-content-center">
                                        <button type="submit"
                                            class="btn  btn-sm my-btn">Update</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                                </div>
                            </div>
                        </div>
                        <!--Edit Modal End -->
            <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
            <script>
            $(document).ready(function() {

                $(document).on('click' , '.showbtn' , function() {
                    var id = $(this).val();  
                    // alert(id);    
                    $.ajax({

                        type: "GET",
                        url: "/services/"+id,
                        success: function(response){
                            $('#readMore').html(response)
                            $('#viewModal').modal('show');
                      }
                    });
                });
            });
            </script>
             <script>
              $(document).ready(function() {
                    $(document).on('click','.edit-btn',function (){
                      var service_id = $(this).val();
                      // alert(service_id);
                      var baseUrl = "{{URL::to('/image')}}" + '/';
                      $('#edit-modal').modal('show');

                      $.ajax({
                          type: "GET",
                          url: "/edit-service/"+service_id,
                          success: function (response){
                              console.log(response);
                              $('#s-name').val(response.service.service_name);
                              $('#image').attr('src',baseUrl + response.service.image);
                              $('#description').val(response.service.description);
                              $('#service_id').val(service_id);
                          }
                      })
                    })
                  });
            </script>
@extends('partial.footer')
@endsection

