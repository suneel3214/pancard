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
                                      <td><div>{!!Str::words($services->description,40)!!}</div></td>
                                      <td><img src="{{asset('/image/'.$services->image)}}" style="width:40%;" alt=""></td>
                                      <td>
                                        <button class="btn btn-success btn-sm btn-icon" data-bs-toggle="modal" data-bs-target="#viewModal"><i class="fa-solid fa-eye"></i></button>
                                        <button class="btn btn-info btn-sm btn-icon"><i class="fa-solid fa-pen-to-square"></i></button>
                                        <button class="btn btn-danger btn-sm btn-icon"><i class="fa-solid fa-trash"></i></button>
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
                    <form method="POST" action="{{route('services.store')}}" id="regForm" enctype="multipart/form-data">
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
                        <textarea class="summernote" name="description" id="textarea"></textarea>
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
                        <h5 class="modal-title" id="exampleModalLabel">VIew</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <table  class="table">
                  <tr>
                    <th>Service Name:</th>
                    <td><span id="name"></span></td>
                  </tr>
                  <tr>
                    <th>Description:</th>
                    <td><span id="country"></td>
                  </tr>
                  <tr>
                    <th>Image:</th>
                    <td><span id="about"></span></td>
                  </tr>
                </table>
                    </div>
                    </div>
                </div>
            </div>
          <!-- content-wrapper ends -->
          <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
          <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
                <!-- content-wrapper ends -->
          <script type="text/javascript">
          $(document).ready(function() {
          $('.summernote').summernote();
          });
          </script>
@extends('partial.footer')

@endsection

