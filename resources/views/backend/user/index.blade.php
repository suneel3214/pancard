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
                </span> User
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
                  <a href="{{route('admin.register')}}" class='btn  btn-sm my-btn'><i class="mdi mdi-plus-box"></i>New User</a>
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
                                <th>Name</th>
                                <th>Email</th>
                                <th>Roles</th>
                                <th>Mobile</th>
                                <th>State</th>
                                <th>Action</th>
                                </tr>
                              </thead>
                              <?php $count = 1; ?>
                              @if(isset($data))
                              @foreach($data as $item)
                              @if($authId == $item->created_by)
                                  <tbody>
                                      <tr>
                                      <td>{{$count ++}}</td>
                                      <td>{{$item->name}}</td>
                                      <td>{{$item->email}}</td>
                                      <td><span class="role-style">{{$item->roles ? $item->roles->display_name : ''}}</span></td>
                                      <td>{{$item->mobile}}</td>
                                      <td>{{$item->state}}</td>
                                      <td>
                                      @if($item->status == 1)
                                        <a href="{{route('admin.activate', $item->id)}}" style="width: 102px" class="btn btn-success btn-sm">Activate</a>
                                        @else
                                        <a href="{{route('admin.activate', $item->id)}}" class="btn btn-danger btn-sm">UnActivate</a>
                                      @endif
                                      <a href="{{route('admin.user.edit',$item->id)}}" class="btn btn-info btn-sm">Edit</a>
                                      </td>
                                      </tr>
                                  </tbody>
                              @endif
                              @endforeach
                              @endif
                            </table>
                          </div>
                     </div>
                     {!! $data->links() !!}
                  </div>
                </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
   
@extends('partial.footer')

@endsection
