@extends('layouts.app')

@section('title')
{{__('Publication and Notices')}}
@endsection

@section('breadcrumb')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">
                    <i class="fa fa-cogs nav-icon"></i>
                    {{__('Publication and Notices')}}
                </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('admin.index')}}">{{__('Home')}}</a></li>
                    <li class="breadcrumb-item active">{{__('Knowledge Center')}}</li>
                    <li class="breadcrumb-item active">{{__('Publication and Notices')}}</li>
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
                        <h5 class="card-title">
                            <i class="fas fa-file-contract nav-icon"></i>
                            {{__('ANNUAL REPORT')}} 
                        </h5>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body table-responsive">
                   
                       <h6> <a href="https://drive.google.com/file/d/1JE9F7UamEKQEupd3Bd2wtxNrfAnVIQYq/view" target="_blank" >● 2021 Annual Report</a></h6>
                       <h6> <a href="https://drive.google.com/drive/folders/10m2KQ0xHUWnTg9s600HmzilEkUawE-Ke" target="_blank" >● 2016 – 2020 Annual Report</a></h6>
                       <h6>  <a href="https://drive.google.com/drive/folders/1xDPpE9BBjBIprqWiJsyfB21t8aZdmnt5" target="_blank">● 2011 – 2015 Annual Report</a></h6>
                       <h6> <a href="https://drive.google.com/drive/folders/1594uXRPvvfpqm8_UzR7dV2MBK0OkaAJU" target="_blank" >● 2010 and Previous Years Annual Report</a></h6>
                       

                    </div>
                </div>
                <div class="card card-danger">
                    <div class="card-header">
                        <h5 class="card-title">
                            <i class="fas fa-file-contract nav-icon"></i>
                            {{__('PULSE')}} 
                        </h5>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body table-responsive">
                      
                      
                        <h6> <a >No Content</a></h6>
                      
                    </div>
                </div>
                <div class="card card-danger">
                    <div class="card-header">
                        <h5 class="card-title">
                            <i class="fas fa-file-contract nav-icon"></i>
                            {{__('HR NOTICES')}} 
                        </h5>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body table-responsive">
                      
                        
                      
                        <h6> <a href="https://drive.google.com/drive/folders/15p1xtKxmkwAaCoLvi8x8xEgtpgDV_nU4" target="_blank" >● 2022 List of Newly Hired / Promoted Personnel</a></h6>
                        <h6> <a href="https://drive.google.com/drive/folders/1szysTs1bp2W2RdFOQUfr5bocQ-IfibmK" target="_blank" >● 2021 List of Newly Hired / Promoted Personnel</a></h6>
                        <h6> <a href="https://drive.google.com/drive/folders/1c5TK05BvPipdeRAgrdKkscZ0NnNZYjvc" target="_blank" >● 2020 List of Newly Hired / Promoted Personnel</a></h6>
                        
                        

                    </div>
                </div>
                <div class="card card-danger">
                    <div class="card-header">
                        <h5 class="card-title">
                            <i class="fas fa-file-contract nav-icon"></i>
                            {{__('DOWNLOADABLE FORMS')}} 
                        </h5>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body table-responsive">
                      
                        
                        <h6> <a href="https://docs.google.com/spreadsheets/d/1n1_MYQtPZNPEh3jlWUbK7-EasvMqCoYE/edit#gid=2100403760" target="_blank" >● CSC Form 6 – Leave Form</a></h6>
                        <h6> <a href="https://docs.google.com/spreadsheets/d/1yWpdja8MEy2K5a_0SDoAtHhNT2oJlmBZ/edit#gid=474146917" target="_blank" >● CSC Form 7 – Clearance Form</a></h6>
                        <h6> <a href="https://docs.google.com/document/d/1SkrlYc9NsimZL31WQeh86QeUmYc6MHST/edit" target="_blank" >● DILG Region 6 – Personnel Request Form</a></h6>
                        <h6> <a href="https://drive.google.com/file/d/1ASKCI8GWQTwOiZJ0synqJX56xrd50sy5/view" target="_blank" >● GAD Template Forms</a></h6>

                    </div>
                </div>
               
              

              
            </div>
        </div>
    </div>
    
    <!-- /.card-body -->
</div>

@endsection
