@extends('layouts.app')

@section('title')
{{__('Contact Us')}}
@endsection

@section('breadcrumb')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">
                    <i class="fa fa-cogs nav-icon"></i>
                    {{__('Contact Us')}}
                </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('admin.index')}}">{{__('Home')}}</a></li>
                    <li class="breadcrumb-item active">{{__('Contact Us')}}</li>
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

                <div class="row">

                    <div class="col-lg-6">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h5 class="card-title">
                                    {{__('Address')}}
                                </h5>
                            </div>
                            <div class="card-body tests">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="input-group form-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-search-location"></i>
                                                </span>
                                            </div>
                                            <label class="form-control-settings">{{$settings['address']}}</label>

                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h5 class="card-title">
                                    {{__('Contact Us')}}
                                </h5>
                            </div>
                            <div class="card-body tests">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="input-group form-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-phone-square-alt"></i>
                                                </span>
                                            </div>


                                            <label class="form-control-settings">{{$settings['phone']}}</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="input-group form-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-envelope-square"></i>
                                                </span>
                                            </div>


                                            <label class="form-control-settings">{{$settings['email']}}</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="input-group form-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fab fa-facebook"></i>
                                                </span>
                                            </div>
                                            <label
                                                class="form-control-settings">{{$settings['socials']['facebook']}}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <table class="table table-striped table-hover table-bordered"  width="100%">
                    <thead>
                      <tr>
                        
                        <th width="50px" style="text-align: left;">{{__('OFFICE')}}</th>
                        <th width="50px" style="text-align: left;">{{__('HEAD')}}</th>
                        <th width="50px" style="text-align: left;">{{__('POSITION')}}</th>
                        <th width="50px" style="text-align: left;">{{__('EMAIL')}}</th>
                        <th width="50px" style="text-align: left;">{{__('CONTACT DETAILS')}}</th>
                        
                      
                      </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{'Office of the Regional Director'}}</td>
                            <td>{{'JUAN JOVIAN E. INGENIERO, CESO IV'}}</td>
                            <td>{{'Director IV'}}</td>
                            <td>{{'jeingeniero@dilg.gov.ph / dilgr6.ord@gmail.com'}}</td>
                            <td>{{'(033) 323-8206'}}</td>
                        </tr>
                        <tr>
                            <td>{{'Office of the Assistant Regional Director'}}</td>
                            <td>{{'MARIA CALPIZA J. SARDUA, CESO IV'}}</td>
                            <td>{{'Director'}}</td>
                            <td>{{'mjsardua@dilg.gov.ph / dilgr6.oard@gmail.com'}}</td>
                            <td>{{'(033) 326-0360'}}</td>
                        </tr>
                        <tr>
                            <td>{{'Finance and Administrative Division'}}</td>
                            <td>{{'MARIA ELEANOR T. ANTIQUIERA'}}</td>
                            <td>{{'Chief Administrative Officer'}}</td>
                            <td>{{'dilgr6.fad2@gmail.com'}}</td>
                            <td>{{'(033) 337-3674'}}</td>
                        </tr>
                        <tr>
                            <td>{{'Local Government Capability Development Division'}}</td>
                            <td>{{'CHRISTIAN M. NAGAYNAY'}}</td>
                            <td>{{'LGOO VII'}}</td>
                            <td>{{'r6lgcdd@gmail.com'}}</td>
                            <td>{{'(033) 326-0638'}}</td>
                        </tr>
                        <tr>
                            <td>{{'Local Government Monitoring and Evaluation Division'}}</td>
                            <td>{{'MARICEL M. BECHAYDA'}}</td>
                            <td>{{'LGOO VII'}}</td>
                            <td>{{'dilgr6.lgmed@gmail.com'}}</td>
                            <td>{{'(033) 326-0638'}}</td>
                        </tr>
                        <tr>
                            <td>{{'AKLAN - Site, Estancia, Kalibo, Aklan'}}</td>
                            <td>{{'DINO A. PONSARAN, CESE'}}</td>
                            <td>{{'LGOO VIII / Provincial Director'}}</td>
                            <td>{{'dilgr6.aklan@gmail.com'}}</td>
                            <td>{{'(036) 268-3047'}}</td>
                        </tr>
                        <tr>
                            <td>{{'ANTIQUE - Ground Flr., Provincial Sports Development Office Bldg. Binirayan Sports Complex, Brgy. 5, San Jose de Buenavista, Antique'}}</td>
                            <td>{{'JOHN ACE A. AZARCON, CESE'}}</td>
                            <td>{{'LGOO VIII / Provincial Director'}}</td>
                            <td>{{'dilgr6.antique@gmail.com'}}</td>
                            <td>{{'(036) 540-8520'}}</td>
                        </tr>
                        <tr>
                            <td>{{'CAPIZ - Provincial Park, Roxas City, Capiz'}}</td>
                            <td>{{'CHERRYL P. TACDA, CESE'}}</td>
                            <td>{{'LGOO VIII / Provincial Director'}}</td>
                            <td>{{'dilgr6.capiz@gmail.com'}}</td>
                            <td>{{'(036) 621-0592'}}</td>
                        </tr>
                        <tr>
                            <td>{{'GUIMARAS - San Miguel, Jordan, Province of Guimaras'}}</td>
                            <td>{{'ROSELYN B. QUINTANA, CESE'}}</td>
                            <td>{{'LGOO VIII / Provincial Director'}}</td>
                            <td>{{'dilgr6.guimaras@gmail.com'}}</td>
                            <td>{{'(033) 581-2035'}}</td>
                        </tr>
                        <tr>
                            <td>{{'ILOILO - Gaisano Iloilo City Center (ICC) Diversion Road, Mandurriao, Iloilo City'}}</td>
                            <td>{{'ENGR. CARMELO F. ORBISTA, CESO V'}}</td>
                            <td>{{'LGOO VIII / Provincial Director'}}</td>
                            <td>{{'dilgr6.iloilo@gmail.com'}}</td>
                            <td>{{'(033) 337-4270'}}</td>
                        </tr>
                        <tr>
                            <td>{{'NEGROS OCCIDENTAL 2F East 4 Center, Burgos Extension,Villamonte, Bacolod City'}}</td>
                            <td>{{'TEODORA P. SUMAGAYSAY, CESO V'}}</td>
                            <td>{{'LGOO VIII / Provincial Director'}}</td>
                            <td>{{'dilgr6.negrosoccidental@gmail.com'}}</td>
                            <td>{{'(034) 432-9163'}}</td>
                        </tr>
                        <tr>
                            <td>{{'BACOLOD CITY'}}</td>
                            <td>{{'MA. JOY MAREDITH M. MADAYAG'}}</td>
                            <td>{{'LGOO VIII / City Director'}}</td>
                            <td>{{'dilgr6.bacolodcity@gmail.com'}}</td>
                            <td>{{'(034) 434-7223'}}</td>
                        </tr>
                        <tr>
                            <td>{{'ILOILO CITY - 5th Floor Iloilo City Hall, Plaza Libertad, Iloilo City'}}</td>
                            <td>{{'OSCAR T. LIM, JR., CESE'}}</td>
                            <td>{{'LGOO VIII / City Director'}}</td>
                            <td>{{'dilgr6.iloilocity@gmail.com'}}</td>
                            <td>{{'(033) 337-6647'}}</td>
                        </tr>
                    </tbody>
                  </table>
            </div>

        </div>
    </div>
    <!-- /.card-body -->
</div>

@endsection
