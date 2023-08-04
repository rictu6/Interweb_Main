@extends('layouts.app')

@section('title')
{{__('Key Officaials')}}
@endsection

@section('breadcrumb')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">
                    <i class="fa fa-cogs nav-icon"></i>
                    {{__('Key Officaials')}}
                </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('admin.index')}}">{{__('Home')}}</a></li>
                    <li class="breadcrumb-item active">{{__('About Us')}}</li>
                    <li class="breadcrumb-item active">{{__('Key Officaials')}}</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
@endsection

@section('content')

<div class="card card-primary card-outline">

    <!-- /.card-header -->
    <div class="card-body">
        <div class="row table-responsive">

          
                <div class="col-lg-12 table-responsive">
                    <div class="card card-danger">
                        <div class="card-header">
                         
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body table-responsive">
                           <h5> <p class="text-center">{{__('KEY OFFICIALS')}}</p></h5>
                           
                           <ul class="social text-center">
                           <li class="d-inline">
                            <a href="">
                              <img src="{{url('img/keyofficials/RDJovi-254x300.png')}}" width="170px">
                            </a>
                          </li>
                        </ul>

                        <ul class="social text-center">
                          <li class="d-inline">
                            <a href="">
                              <img src="{{url('img/keyofficials/ARDMariz-1-254x300.png')}}" width="170px">
                            </a>
                          </li>
                        </ul>

                        <ul class="social text-center">
                            <li class="d-inline">
                              <a href="">
                                <img src="{{url('img/keyofficials/PDDino-264x300.png')}}" width="170px">
                              </a>
                            </li>
                          </ul>

                          <ul class="social text-center">
                            <li class="d-inline">
                              <a href="">
                                <img src="{{url('img/keyofficials/PDAce-254x300.png')}}" width="170px">
                              </a>
                            </li>
                          </ul>

                          <ul class="social text-center">
                            <li class="d-inline">
                              <a href="">
                                <img src="{{url('img/keyofficials/PDCherryl-265x300')}}" width="170px">
                              </a>
                            </li>
                          </ul>
                         
                        <ul class="social text-center">
                            <li class="d-inline">
                              <a href="">
                                <img src="{{url('img/keyofficials/PDRoselyn-261x300.png')}}" width="170px">
                              </a>
                            </li>
                          </ul>

                          <ul class="social text-center">
                            <li class="d-inline">
                              <a href="">
                                <img src="{{url('img/keyofficials/PDCarmelo-264x300.png')}}" width="170px">
                              </a>
                            </li>
                          </ul>

                          <ul class="social text-center">
                            <li class="d-inline">
                             <a href="">
                               <img src="{{url('img/keyofficials/PDTeod-263x300.png')}}" width="170px">
                             </a>
                           </li>
                         </ul>
 
                         <ul class="social text-center">
                           <li class="d-inline">
                             <a href="">
                               <img src="{{url('img/keyofficials/CDJoy-255x300.png')}}" width="170px">
                             </a>
                           </li>
                         </ul>
 
                         <ul class="social text-center">
                             <li class="d-inline">
                               <a href="">
                                 <img src="{{url('img/keyofficials/CDOscar-276x300.png')}}" width="170px">
                               </a>
                             </li>
                           </ul>
 
                           <ul class="social text-center">
                             <li class="d-inline">
                               <a href="">
                                 <img src="{{url('img/keyofficials/CAONor-254x300.png')}}" width="170px">
                               </a>
                             </li>
                           </ul>
 
                           <ul class="social text-center">
                             <li class="d-inline">
                               <a href="">
                                 <img src="{{url('img/keyofficials/DCChristian-242x300.png')}}" width="170px">
                               </a>
                             </li>
                           </ul>
                          
                         <ul class="social text-center">
                             <li class="d-inline">
                               <a href="">
                                 <img src="{{url('img/keyofficials/DCMaricel-247x300.png')}}" width="170px">
                               </a>
                             </li>
                           </ul>
 
                           <ul class="social text-center">      
                             <li class="d-inline">
                               <a href="">
                                 <img src="{{url('img/keyofficials/AttyJava-253x300.png')}}" width="170px">
                               </a>
                             </li>
                           </ul>

                           <ul class="social text-center">
                            <li class="d-inline">
                              <a href="">
                                <img src="{{url('img/keyofficials/ChiefAnthony-246x300.png')}}" width="170px">
                              </a>
                            </li>
                          </ul>




                        </div>
                    </div>
            
                </div>
           
            

        </div>
    </div>
    <!-- /.card-body -->
</div>




@endsection