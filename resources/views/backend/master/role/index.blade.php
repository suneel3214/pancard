@extends('layouts.app')
@extends('partial.header')
@extends('partial.sidevar')

@section('content')
@include('sweetalert::alert')

<div class="main-panel" style="width:100% !important">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-home"></i>
                </span> Roles
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
            <div class="card">
                <div class="card-body">
                    <div class="row">
                      <div class="col-md-12">
                          <div class="table-responsive">
                              <table class="table">
                              <thead>
                                <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Display Name</th>
                                <th>Percentage</th>
                                <th>Description</th>
                                <th>Action</th>
                                </tr>
                              </thead>
                              <?php $count = 1; ?>
                                  @if(isset($data))
                                  @foreach($data as $roles)
                                  <tbody>
                                      <tr>
                                      <td>{{$count ++}}</td>
                                      <td>{{$roles->name}}</td>
                                      <td>{{$roles->display_name}}</td>
                                      <td>{{$roles->percentage_amount}} %</td>
                                      <td>{{$roles->description}}</td>
                                      <td>
                                        <button value="{{$roles->id}}" class="btn btn-success btn-sm edit-btn" style="color:#000;">Percentage Change</button>
                                      </td>
                                      </tr>
                                  </tbody>
                                  @endforeach
                                  @endif
                            </table>
                          </div>
                     </div>
                  </div>
                   <!--Edit Modal -->
                   <div class="modal fade" id="edit-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="{{route('role.update')}}">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-outline mb-4">
                                        <input type="hidden" name="id" id="role_id" value="">
                                        <label class="form-label" for="">Percenatge<span class="text-danger">*</span></label>
                                        <input type="text" name="percentage_amount" required placeholder="Percentage Amount" id="percentage" class="form-control" />
                                        </div>
                                      
                                        <div class="d-flex justify-content-center">
                                        <button type="submit"
                                            class="btn  btn-sm my-btn">Submit</button>
                                        </div>
                                    </form>
                                </div>
                                </div>
                            </div>
                        </div>
                        <!--Edit Modal End -->
                </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
          <script>
     $(document).ready(function() {
           $(document).on('click','.edit-btn',function (){
            var role_id = $(this).val();
            // alert(role_id);
            $('#edit-modal').modal('show');

            $.ajax({
                type: "GET",
                url: "/edit-percent_amount/"+role_id,
                success: function (response){
                    console.log(response);

                    $('#percentage').val(response.role.percentage_amount);
                    $('#role_id').val(role_id);

                }
            })
           })
        });
   </script>
@extends('partial.footer')

@endsection
