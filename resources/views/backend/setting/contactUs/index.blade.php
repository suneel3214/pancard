@extends('layouts.app')
@extends('partial.header')
@extends('partial.sidevar')

@section('content')
<div class="main-panel" style="width:100% !important">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-home"></i>
                </span> All Contact list
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
                                <th>Email</th>
                                <th>Message</th>
                                </tr>
                              </thead>
                              <?php $count = 1; ?>
                                  @if(isset($data))
                                  @foreach($data as $items)
                                  <tbody>
                                      <tr>
                                      <td>{{$count ++}}</td>
                                      <td>{{$items->name}}</td>
                                      <td>{{$items->email}}</td>
                                      <td>{{$items->message}}</td>
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
          <!-- content-wrapper ends -->
@extends('partial.footer')

@endsection
