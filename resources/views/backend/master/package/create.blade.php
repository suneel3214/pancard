@extends('layouts.app')
@extends('partial.header')
@extends('partial.sidevar')

@section('content')
@include('sweetalert::alert')
<style>
   .style-btn{
    border: navajowhite;
    background-color: #fff;
    color: #000;
  }
</style>
<div class="main-panel" style="width:100% !important">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-home"></i>
                </span> Packages
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
              <div class="container">
                  <div class="row">
                     <div class="col-md-7">
                        <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                <th>#</th>
                                                <th>Package Name</th>
                                                <th>Role</th>
                                                <th>Amount</th>
                                                <th>Discount</th>
                                                <th>Action</th>
                                                </tr>
                                            </thead>
                                            <?php $count = 1; ?>
                                                @if(isset($package))
                                                @foreach($package as $packages)
                                                <tbody>
                                                    <tr>
                                                    <td>{{$count ++}}</td>
                                                    <td>{{$packages->name}}</td>
                                                    <td>{{$packages->roles ? $packages->roles->display_name : ''}}</td>
                                                    <td>{{$packages->amount}}</td>
                                                    <td>{{$packages->discount}}</td>
                                                    <td>
                                                        <button value="{{$packages->id}}" class="style-btn edit-btn"><i class="fa-solid fa-pen-to-square"></i></button>
                                                        <form action="{{ route('packages.destroy',$packages->id) }}" method="POST">
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
                                {!! $package->links() !!}
                            </div>
                        </div>
                     </div>
                    </div>
                     <div class="col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="{{route('packages.store')}}" enctype="multipart/form-data" id="regForm">
                                    @csrf
                                    <div class="form-outline mb-4">
                                    <label class="form-label" for="">Package Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name" id="name" placeholder="Package Name" class="form-control" />
                                    </div>
                                    <div class="form-outline mb-4">
                                    <label class="form-label" for="">Amount<span class="text-danger">*</span></label>
                                    <input type="text" name="amount" placeholder="Amount" id="amount" class="form-control" />
                                    </div>
                                    <div class="form-outline mb-4">
                                    <label class="form-label" for="">Discount <span class="text-danger">*</span></label>
                                    <input type="text" id="discount" name="discount" placeholder="Discount" class="form-control" />
                                    </div>
                                    <div class="form-outline mb-4">
                                    <label class="form-label" for="">Role <span class="text-danger">*</span></label>
                                    <select name="role_id" id="role_id"  class="form-control select-type">
                                        <option value="">Select Role</option>
                                        @foreach($role as $roles)
                                        <option value="{{$roles->id}}">{{$roles->display_name}}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                    <div class="form-outline mb-4">
                                    <label class="form-label" for="">Description <span class="text-danger">*</span></label>
                                    <textarea class="summernote" name="description" id="description"></textarea>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                    <button type="submit"
                                        class="btn  btn-sm my-btn">Submit</button>
                                    </div>
                                </form>
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
                                    <form method="POST" action="{{route('package.update')}}" enctype="multipart/form-data" id="regForm">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-outline mb-4">
                                            <input type="hidden" name="id" id="pack_id" value="">
                                        <label class="form-label" for="">Package Name <span class="text-danger">*</span></label>
                                        <input type="text" name="name" required id="pack-name" placeholder="Package Name" class="form-control" />
                                        </div>
                                        <div class="form-outline mb-4">
                                        <label class="form-label" for="">Amount<span class="text-danger">*</span></label>
                                        <input type="text" name="amount" required placeholder="Amount" id="pack-amount" class="form-control" />
                                        </div>
                                        <div class="form-outline mb-4">
                                        <label class="form-label" for="">Discount <span class="text-danger">*</span></label>
                                        <input type="text" id="pack-discount" required name="discount" placeholder="Discount" class="form-control" />
                                        </div>
                                        <div class="form-outline mb-4">
                                        <label class="form-label" for="">Role <span class="text-danger">*</span></label>
                                        <select name="role_id" id="pack-role_id" required class="form-control select-type">
                                            <option value="">Select Role</option>
                                            @foreach($role as $roles)
                                            <option  value="{{$roles->id}}">{{$roles->display_name}}</option>
                                            @endforeach
                                        </select>
                                        </div>
                                        <div class="form-outline mb-4">
                                        <label class="form-label" for="">Description <span class="text-danger">*</span></label>
                                        <textarea class="summernote" name="description" id="textarea"></textarea>
                                        </div>
                                        <div class="d-flex justify-content-center">
                                        <button type="submit"
                                            class="btn  btn-sm my-btn">Submit</button>
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
                  </div>
              </div>
          </div>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
          <!-- content-wrapper ends -->
    <script type="text/javascript">
    $(document).ready(function() {
    $('.summernote').summernote();
    });
    </script>

    <script>
        $(document).ready(function() {
            $("#regForm").validate({
                rules: {
                    name: "required",
                    amount: "required",
                    discount: "required",
                    role_id: "required",
                    description:"required",
                }
            });
        });
    </script>
   <script>
     $(document).ready(function() {
           $(document).on('click','.edit-btn',function (){
            var pack_id = $(this).val();
            // alert(pack_id);
            $('#edit-modal').modal('show');

            $.ajax({
                type: "GET",
                url: "/edit-package/"+pack_id,
                success: function (response){
                    // console.log(response.package.description);
                    $('#pack-name').val(response.package.name);
                    $('#pack-amount').val(response.package.amount);
                    $('#pack-discount').val(response.package.discount);
                    $('#pack-role_id').val(response.package.role_id);
                    $('#textarea').summernote('code',response.package.description);
                    $('#pack_id').val(pack_id);

                }
            })
           })
        });
   </script>
@extends('partial.footer')

@endsection
