@extends('layouts.app')

@section('title')
{{__('Who We Are')}}
@endsection

@section('breadcrumb')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">
                    <i class="fa fa-cogs nav-icon"></i>
                    {{__('Who We Are')}}
                </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('admin.index')}}">{{__('Home')}}</a></li>
                    <li class="breadcrumb-item active">{{__('About Us')}}</li>
                    <li class="breadcrumb-item active">{{__('Who We Are')}}</li>
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
                <h5>Who We Are</h5>

                <br>
                <h6><p  style="text-indent: 25px;">The present Department of the Interior and Local Government (DILG) traces its roots from the Philippine Revolution of 1897. On March 22, 1897, the Katipunan Government established the first Department of Interior at the Tejeros Convention.

                A revolutionary government was also established at that time and the new government elected General Emilio Aguinaldo as President and Andres Bonifacio as Director of Interior, although Bonifacio did not assume the post. At the Naic Assembly held on April 17, 1897, President Aguinaldo appointed General Pascual Alvarez as Secretary of the Interior.
                
                The Department of Interior was enshrined in the Biak-na-Bato Constitution signed on November 1, 1897. Article XV of the said Constitution defined the powers and functions of the Department that included statistics, roads and bridges, agriculture, public information and posts, and public order.
                
                As the years of struggle for independence and self-government continued, the Interior Department became the premier office of the government tasked with various functions ranging from supervision over local units, forest conservation, public instructions, control and supervision over the police, counter-insurgency, rehabilitation, community development and cooperatives development programs.
                
                In 1950, the Department was abolished and its functions were transferred to the Office of Local Government (later renamed Local Government and Civil Affairs Office) under the Office of the President. On January 6, 1956, President Ramon Magsaysay created the Presidential Assistant on Community Development (PACD) to implement the Philippine Community Development Program that will coordinate and integrate on a national scale the efforts of various governmental and civic agencies to improve the living conditions in the barrio residents nationwide and make them self-reliant.
                
                In 1972, Presidential Decree No. 1 created the Department of Local Government and Community Development (DLGCD) through Letter of Implementation No. 7 on November 1, 1972. Ten years later or in 1982, the
                
                DLGCD was reorganized and renamed Ministry of Local Government (MLG) by virtue of Executive Order No. 777; and in 1987, it was further reorganized and this time, renamed Department of Local Government (DLG) by virtue of Executive Order No. 262.
                
                Again, on December 13, 1990, the DLG underwent reorganization into what is now known as the Department of the Interior and Local Government (DILG) by virtue of Republic Act No. 6975. The law also created the Philippine National Police (PNP) out of the Philippine Constabulary-Integrated National Police (PC-INP), which, together with the National Police Commission, was integrated under the new DILG, the Bureau of Fire Protection, Bureau of Jail Management and Penology and the Philippine Public Safety College; and absorbed the National Action Committee on Anti-Hijacking from the Department of National Defense (DND).
                
                The passage of RA 6975 paved the way for the union of the local governments and the police force after more than 40 years of separation.
                
                Today, the Department faces a new era of meeting the challenges of local autonomy, peace and order, and public safety.</p>
                
            </h6>
             
            </div>

        </div>
    </div>
    <!-- /.card-body -->
</div>

@endsection
