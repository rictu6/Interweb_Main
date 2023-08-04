@extends('layouts.app')

@section('title')
{{__('Power and Functions')}}
@endsection

@section('breadcrumb')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">
                    <i class="fa fa-cogs nav-icon"></i>
                    {{__('Power and Functions')}}
                </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('admin.index')}}">{{__('Home')}}</a></li>
                    <li class="breadcrumb-item active">{{__('About Us')}}</li>
                    <li class="breadcrumb-item active">{{__('Power and Functions')}}</li>
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

            <div class="col-12">
                <h6>● Assist the President in the exercise of general supervision over local governments; </h6>
                <br>
                <h6>● Advise the President in the promulgation of policies, rules, regulations and other issuances on the general supervision over local governments and on public order and safety;</h6>
                <br>
                <h6>● Establish and prescribe rules, regulations and other issuances implementing laws on public order and safety, the general supervision over local governments and the promotion of local autonomy and community empowerment and monitor compliance thereof;</h6>
                <br>
                <h6>● Provide assistance towards legislation regarding local governments, law enforcement and public safety; </h6>
                <br>
                <h6>● Establish and prescribe plans, policies, programs and projects to promote peace and order, ensure public safety and further strengthen the administrative, technical and fiscal capabilities of local government offices and personnel;</h6>
                <br>
                <h6>● Formulate plans, policies and programs which will meet local emergencies arising from natural and man-made disasters; </h6>
                <br>
                <h6>● Establish a system of coordination and cooperation among the citizenry, local executives and the Department, to ensure effective and efficient delivery of basic services to the public;</h6>
                <br>
                <h6>● Organize, train and equip primarily for the performance of police functions, a police force that is national in scope and civilian in character.</h6>


                 </div>

        </div>
    </div>
    <!-- /.card-body -->
</div>

@endsection
