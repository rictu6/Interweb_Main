@extends('layouts.app')

@section('title')
{{__('Mission,Vision and Shared Values')}}
@endsection

@section('breadcrumb')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">
                    <i class="fa fa-cogs nav-icon"></i>
                    {{__('Mission,Vision and Shared Values')}}
                </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('admin.index')}}">{{__('Home')}}</a></li>
                    <li class="breadcrumb-item active">{{__('About Us')}}</li>
                    <li class="breadcrumb-item active">{{__('Mission,Vision and Shared Values')}}</li>
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
                <h4>VISION</h4>

                <h6>A highly trusted Department and Partner in nurturing local governments and sustaining peaceful, safe, progressive, resilient, and inclusive communities towards a comfortable and secure life for Filipinos by 2040.</h6>
                <br>
                <br>
                

                <h4>MISSION</h4>
                
                <h6>The Department shall ensure peace and order, public safety and security, uphold excellence in local governance and enable resilient and inclusive communities.</h6>
                <br>
                <br>
                <h4>SHARED VALUES</h4>
                
                <h6> “Ang DILG ay Matino, Mahusay, at Maaasahan”</h6>
                <br>
                <br>
                <h4>GOALS</h4>
                <h6>Peaceful, safe, self-reliant and development-dominated communities;
                Improve performance of local governments in governance, administration, social and economic development and environmental management;
                Sustain peace and order condition and ensure public safety.</h6>
                <br>
                <br>
                <h4>OBJECTIVES</h4>
                <h6>Reduce crime incidents and improve crime solution efficiency
                Improve jail management and penology services
                Improve fire protection services
                Continue professionalization of PNP, BFP and BJMP personnel and services
                Enhance LGU capacities to improve their performance and enable them to effectively and efficiently deliver services to their constituents
                Continue to initiate policy reforms in support of local autonomy</h6>
                <br>
                <br>
                <h4>DILG Quality Policy</h4>
                <h6>We, the DILG, imbued with the core values of Integrity, Commitment, Teamwork and Responsiveness, commit to formulate sound policies on strengthening local government capacities, performing oversight function over LGUs, and providing rewards and incentives. We pledge to provide effective technical and administrative services to promote excellence in local governance and enhance the service delivery of our Regional and Field Offices for the LGUs to become transparent, resilient, socially-protective and competitive, where people in the community live happily.
                
                We commit to continually improve the effectiveness of our Quality Management System compliant with applicable statutory and regulatory requirements and international standards gearing towards organizational efficiency in pursuing our mandate and achieving our client’s satisfaction.
                
                We commit to consistently demonstrate a “Matino, Mahusay at Maasahang Kagawaran Para sa Mapagkalinga at Maunlad na Pamahalaang Lokal”.</h6>
            </div>

        </div>
    </div>
    <!-- /.card-body -->
</div>

@endsection
