@extends('layouts.app')

@section('title')
{{__('2021 - PRESENT TRANSPARANCY SEAL')}}
@endsection

@section('breadcrumb')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">
                    <i class="fa fa-cogs nav-icon"></i>
                    {{__('2021 - PRESENT TRANSPARANCY SEAL')}}
                </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('admin.index')}}">{{__('Home')}}</a></li>
                    <li class="breadcrumb-item active">{{__('Transparancy Seal')}}</li>
                    <li class="breadcrumb-item active">{{__('2021 - PRESENT TRANSPARANCY SEAL')}}</li>
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
                            {{__('AGENCY’S MANDATE AND FUNCTIONS; NAMES OF ITS OFFICIALS WITH THEIR POSITION AND DESIGNATION, AND CONTACT INFORMATION')}} 
                        </h5>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body table-responsive">
                      
                       <h6> <a href="{{route('admin.mvsv')}}">● Vision, Mission, and Goals</a></h6>
                       <h6> <a href="{{route('admin.pof')}}">● Powers, and Functions</a></h6>
                       <h6>  <a href="{{route('admin.contactus')}}">● Key Officials and Contact Details</a></h6>

                    </div>
                </div>
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
                      <h6 style="font-weight:bold">PHYSICAL AND FINANCIAL PLAN (OPERATIONS PLAN AND BUDGET)</h6>
                       <h6> <a href="https://drive.google.com/drive/folders/186p7r4w_m0yWRGF_D7hp91LfNtwkXXph" target="_blank" >● Physical and Financial Plan 2023</a></h6>
                       <h6> <a href="https://drive.google.com/file/d/1ngodXBLHNwcELklOSsKAO1Yi76H8sh5j/view" target="_blank" >● Physical and Financial Plan 2022</a></h6>
                       <h6>  <a href="https://drive.google.com/file/d/1LREgS9BjuA31u7DTfJONuLqHmWW4TT7f/view" target="_blank">● Physical and Financial Plan 2021</a></h6>
                     <br>
                       <h6 style="font-weight:bold">MONTHLY CASH PROGRAM</h6>
                       <h6> <a href="https://drive.google.com/file/d/1KJXcUVYHrI3YCv1FunpRNJhqsODEuTkn/view" target="_blank" >● Monthly Cash Program 2023</a></h6>
                       <h6> <a href="https://drive.google.com/file/d/1m8KfhgpjenQxsZ9znVGifWe-8Iba1Q5P/view" target="_blank" >● Monthly Cash Program 2022</a></h6>
                       <h6>  <a href="https://drive.google.com/file/d/1XDtOANLomZ8GUos03fZYNliltkZL_d3a/view" target="_blank">● Monthly Cash Program 2021</a></h6>
                    <br>
                       <h6 style="font-weight:bold">STATEMENT OF ALLOTMENT, OBLIGATION, and BALACES (SAOB)</h6>
                       <h6> <a href="https://drive.google.com/drive/folders/1AzuL_CG3aefb8kFTaN9w2ym0EEjcB9FY" target="_blank" >● SAOB 2023</a></h6>
                       <h6> <a href="https://drive.google.com/drive/folders/1SxwVEQj8HBGKXZVv09Z7B2ja9vNFyjdA" target="_blank" >● SAOB 2022</a></h6>
                       <h6>  <a href="https://drive.google.com/drive/folders/1I0UpQrCzueNhWcTGxwW3PVu_m1zC0_sv" target="_blank">● SAOB 2021</a></h6>
                       <br>
                       <h6 style="font-weight:bold">DISBURSEMENT AND INCOME</h6>
                       <h6> <a href="https://drive.google.com/drive/folders/1kDvw89G8V0ff211_N36FCxVVMO8-9mzj" target="_blank" >● Disbursement and Income 2023</a></h6>
                       <h6> <a href="https://drive.google.com/drive/folders/1Rf2KYJdhxZcRe0nfAJfX59BWc4be6PtZ" target="_blank" >● Disbursement and Income 2022</a></h6>
                       <h6>  <a href="https://drive.google.com/drive/folders/1AnJXn0fObrGpZFiMs9zByfy-qyiAAnlJ" target="_blank">● Disbursement and Income 2021</a></h6>
                       <br>
                       <h6 style="font-weight:bold">FINANCIAL ACCOUNTABILITY REPORTS (FARs)</h6>
                       <h6> <a href="https://drive.google.com/drive/folders/1pPgV3Wes19RO1DMFfc-A_ijcPeYp2jza" target="_blank" >● FARs 2023</a></h6>
                       <h6> <a href="https://drive.google.com/drive/folders/1QEU2YrtKbAXT-iIAjsYa8Q0Gsq-asQ0c" target="_blank" >● FARs 2022</a></h6>
                       <h6>  <a href="https://drive.google.com/drive/folders/1kx2gyx7yIfr9OaD27o0Iv33_AQ3Mvl5v" target="_blank">● FARs 2021</a></h6>
                       <br>
                       <h6 style="font-weight:bold">FINANCIAL STATEMENTS</h6>
                       <h6>● Financial Statements 2022</h6>
                       <h6> <a href="https://drive.google.com/file/d/1TYYbVVjh3HhdjgQH-fSETk2MVrnC4jXz/view" target="_blank" >● Financial Statements 2021</a></h6>
                       

                    </div>
                </div>
                <div class="card card-danger">
                    <div class="card-header">
                        <h5 class="card-title">
                            <i class="fas fa-file-contract nav-icon"></i>
                            {{__('DILG APPROVED BUDGETS, CORRESPONDING TARGETS, AND ACCOMPLISHMENTS')}} 
                        </h5>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body table-responsive">
                      
                        <h6 style="font-weight:bold">APPROVED BUDGET</h6>
                        <h6> <a href="https://drive.google.com/file/d/1uu8euaDIwK8YSIsdoSnC_niwR-pVB-xL/view" target="_blank" >● Approved Budget 2023</a></h6>
                        <h6> <a href="https://drive.google.com/file/d/1pCTvUNml0PwRTbpf_sklpBP7OXGmCBOP/view" target="_blank" >● Approved Budget 2022</a></h6>
                        <h6>  <a href="https://drive.google.com/file/d/1xemoz_EGpfYdYug_qSS1eDG4TKrgmvQa/view" target="_blank">● Approved Budget 2021</a></h6>
                        <br>
                        <h6 style="font-weight:bold">CORRESPONDING TARGETS</h6>
                        <h6> ● Corresponding Targets 2023</h6>
                        <h6> <a href="https://drive.google.com/file/d/1ngodXBLHNwcELklOSsKAO1Yi76H8sh5j/view" target="_blank" >● Corresponding Targets 2022</a></h6>
                        <h6>  <a href="https://drive.google.com/file/d/1LREgS9BjuA31u7DTfJONuLqHmWW4TT7f/view" target="_blank">● Corresponding Targets 2021</a></h6>
                        <br>
                        <h6 style="font-weight:bold">ACCOMPLISHMENT REPORT</h6>
                        <h6> <a href="https://drive.google.com/drive/folders/1bjakngfRq-c_rz01nfe6LbSZTFvB3bGT" target="_blank" >● Accomplishment Report 2022</a></h6>
                        <h6> <a href="https://drive.google.com/drive/folders/1fOUUFhO12CWkhfYKl67v1M6Mys4N7-tE" target="_blank" >● Accomplishment Report 2021</a></h6>
                        

                    </div>
                </div>
                <div class="card card-danger">
                    <div class="card-header">
                        <h5 class="card-title">
                            <i class="fas fa-file-contract nav-icon"></i>
                            {{__('MAJOR PROJECTS, PROGRAMS AND ACTIVITIES, BENEFICIARIES AND STATUS OF IMPLEMENTATION')}} 
                        </h5>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body table-responsive">
                      
                        
                        <h6 style="font-weight:bold">MAJOR PROGRAMS AND PROJECTS</h6>
                        <h6>● Major Programs and Projects 2022</h6>
                        <h6>● Major Programs and Projects 2021</h6>
                        

                    </div>
                </div>
                <div class="card card-danger">
                    <div class="card-header">
                        <h5 class="card-title">
                            <i class="fas fa-file-contract nav-icon"></i>
                            {{__('STATUS OF IMPLEMENTATION AND PROGRAM IMPLEMENTATION')}} 
                        </h5>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body table-responsive">
                      
                        
                     
                        <h6>No Content</h6>
                   

                    </div>
                </div>
                <div class="card card-danger">
                    <div class="card-header">
                        <h5 class="card-title">
                            <i class="fas fa-file-contract nav-icon"></i>
                            {{__('ANNUAL PROCUREMENT PLAN, CONTRACTS AWARDED, AND AMONG OTHERS')}} 
                        </h5>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body table-responsive">
                      
                        
                        <h6 style="font-weight:bold"> ANNUAL PROCUREMENT PLAN (APP)</h6>
                        <h6> <a href="https://drive.google.com/file/d/1Ee0yCW5sPFnnSbWUuGj_DG7DGclnK3is/view" target="_blank" >● APP 2023</a></h6>
                        <h6> <a href="https://drive.google.com/file/d/1HW-X0ttkaen9OSw3wnu9x5nHtx0v_pbo/view" target="_blank" >● APP 2022</a></h6>
                        <h6> <a href="https://drive.google.com/file/d/1YF0MhqjBhWuaHrcmbHHbi97ZIwlK4tPi/view" target="_blank" >● APP 2021</a></h6>
                        <h6> <a href="https://drive.google.com/drive/folders/1RoZuQtktCRiLVv8vmCbnMDT7A584Rmq0" target="_blank" >● APP Provinces 2023</a></h6>
                        <h6> <a href="https://drive.google.com/drive/folders/1MTQBlP5F8Ik_lQIVc2197tliZc0phHHL" target="_blank" >● APP Provinces 2022</a></h6>
                        <h6> <a href="https://drive.google.com/drive/folders/1ZCWq58rijo7BxL6PUENcOYfVUOHezbHp" target="_blank" >● APP Provinces 2021</a></h6>
                     
                        <br>
                        <h6 style="font-weight:bold">ANNUAL PROCUREMENT PLAN – COMMON SUPPLIES AND EQUIPMENT (APP-CSE / APP-Non CSE) and Indicative</h6>
                        <h6> <a href="https://drive.google.com/file/d/14HqTHjeHd5ThKOmDkq7PXGeclr44hAVS/view" target="_blank" >● APP-CSE 2023</a></h6>
                        <h6> <a href="https://drive.google.com/file/d/1tQYRhM1A1bXCKnKhR7ZDO7ErG95dEvpO/view" target="_blank" >● APP-Indicative Non-CSE 2023 2nd Revision</a></h6>
                        <h6> <a href="https://drive.google.com/file/d/1JWUmHhEP3tHNxxssW4FEVX5PCNDRV1zA/view" target="_blank" >● APP-Indicative 2023 Revised</a></h6>
                        <h6> <a href="https://drive.google.com/file/d/1eNWtIngH_X7R3o1UQ5MFBVQjZmOhxmx2/view" target="_blank" >● APP-Indicative 2023</a></h6>
                        <h6> <a href="https://drive.google.com/drive/folders/1aWc1EWnLgJVG4uYaxF_LJ0aVIov5VZGO" target="_blank" >● APP-Indicative Provinces 2023</a></h6>
                        <h6> <a href="https://drive.google.com/file/d/1vW7eB7EdYWWnvBHwjvzo9ohDkAKaAK_z/view" target="_blank" >● APP-Indicative 2022</a></h6>
                        <h6> <a href="https://drive.google.com/file/d/1h2Li-iRs189llzrM0D6lKQZt5-PepTDY/view" target="_blank" >● APP-Indicative Provinces 2022</a></h6>
                        <h6> <a href="https://drive.google.com/file/d/1qBFfzKio7gp8jvv6z9Y2tMVIToZgNDGM/view" target="_blank" >● APP-Indicative 2021</a></h6>
                        <br>
                        <h6 style="font-weight:bold">ANNUAL PROCUREMENT PLAN – SUPPLEMENTAL (APP-SUPPLEMENTAL)</h6>
                        <h6> <a href="https://drive.google.com/file/d/1NHa1l8pv0p5YyR3ybSP97X2_xHfJ4Hvv/view" target="_blank" >● APP – Supplemental 2022 2nd Semester</a></h6>
                        <h6> <a href="https://drive.google.com/file/d/1K1rTRQAoBJrOWQmnCm01x5TkUwEGfHSX/view" target="_blank" >● APP – Supplemental 2022</a></h6>
                        <h6> <a href="https://drive.google.com/drive/folders/1PV6WPB6nowzjduU_xTTOwTsf3EkwPkB5" target="_blank" >● APP – Supplemental Provinces 2022</a></h6>
                        <br>
                        <h6 style="font-weight:bold">BIDDING DOCUMENTS</h6>
                        <h6> <a href="https://drive.google.com/file/d/1wXmaKC5o5zOMXQOsYFbcJJPWsQghUyw2/view" target="_blank" >● 2022-07-06 Disposal of Unserviceable Property through Public Auction</a></h6>
                        <h6> <a href="https://drive.google.com/file/d/12OG3O9YKrqpcYRFdMEcNZgHss3Al_wbj/view" target="_blank" >● 2022-07-20 Disposal of Unserviceable Property through Public Auction</a></h6>
                        <h6> <a href="https://drive.google.com/file/d/1KDH9hspvIP_57x7VJOGjIA1ieCA9oZ2_/view" target="_blank" >● 2022-08-03 Disposal of Unserviceable Property through Public Auction</a></h6>
                        <br>
                        <h6 style="font-weight:bold">PROCUREMENT MONITORING REPORT (PMR)</h6>
                        <h6> <a href="https://drive.google.com/drive/folders/1q5fxbMv3uGgGrQZDWzw22bOH7axYWIyM" target="_blank" >● PMR 2022</a></h6>
                        <h6> <a href="https://drive.google.com/drive/folders/1l2eMhFLPvholZyYL0MvQgnaCxTyDFB5L" target="_blank" >● PMR 2021</a></h6>
                        <h6> <a href="https://drive.google.com/drive/folders/1VMl9JBBb57umjWnq231A4YK5J1LRs8gf" target="_blank" >● PMR Provinces 2022</a></h6>
                        <br>
                        <h6 style="font-weight:bold">REQUEST FOR QUOTATIONS (RFQ)</h6>
                        <h6> <a href="https://drive.google.com/drive/folders/1Psv_NCbbCOlNNrDnzVE4ngrJxkvGdC3q" target="_blank" >● RFQ 2023</a></h6>
                        <h6> <a href="https://drive.google.com/drive/folders/1MJc7pJV_FjG7gJ825TbfCWc3B4FB20SU" target="_blank" >● RFQ 2022</a></h6>
                        <h6> <a href="https://drive.google.com/drive/folders/1mMcwZZRLB60hJ1SHkIGGmwm9Zg25jinp" target="_blank" >● RFQ 2021</a></h6>
                        <br>
                        <h6 style="font-weight:bold">PURCHASE ORDER (PO)</h6>
                        <h6> <a href="https://drive.google.com/drive/folders/1TX3z3FXjSQn0rHoz94cErULwmyizN67M" target="_blank" >● PO 2023</a></h6>
                        <h6> <a href="https://drive.google.com/drive/folders/1LzZ04aGlnoNs16k7v9EDMky7ElYidSTY" target="_blank" >● PO 2022</a></h6>
                        <h6> <a href="https://drive.google.com/drive/folders/1cEW18m9DigphoDBLEH6Ba-w_QchJ1nwa" target="_blank" >● PO 2021</a></h6>
                        

                    </div>
                </div>
                <div class="card card-danger">
                    <div class="card-header">
                        <h5 class="card-title">
                            <i class="fas fa-file-contract nav-icon"></i>
                            {{__('SYSTEM OF AGENCY RANKING DELIVERY UNITS')}} 
                        </h5>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body table-responsive">
                      
                        
                     
                        <h6>No Content</h6>
                   

                    </div>
                </div>
                <div class="card card-danger">
                    <div class="card-header">
                        <h5 class="card-title">
                            <i class="fas fa-file-contract nav-icon"></i>
                            {{__('AGENCY REVIEW AND COMPLIANCE PROCEDURE OF SALN')}} 
                        </h5>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body table-responsive">
                      
                      
                        <h6> <a href="https://drive.google.com/file/d/1FVhhAiA5CnBrp8Re_sJ-y6hqsONi4qbZ/view" target="_blank" >● 2019 Reconstitution of the Regional SALN Review and Compliance Committee</a></h6>
                        <h6> <a href="https://drive.google.com/file/d/1TWmQDbt4xmHxc2nNHI5HSeW7QbQcqPMl/view" target="_blank" >● Regional Circular 2019-12 DILG VI SALN Standard Review and Compliance Procedure</a></h6>
                       
                   

                    </div>
                </div>
                <div class="card card-danger">
                    <div class="card-header">
                        <h5 class="card-title">
                            <i class="fas fa-file-contract nav-icon"></i>
                            {{__('DILG PEOPLE’S FREEDOM OF INFORMATION (FOI)')}} 
                        </h5>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body table-responsive">
                      
                      
                        <h6>● DILG FOI Reports as of 2022</h6>
                        <h6>● 2016-2020 FOI Report</h6>
                        <h6>● 2019 FOI Report</h6>
                        <h6>● 2017-2019 FOI REPORT</h6>
                        <h6> <a href="https://dilg.gov.ph/PDF_File/reports_resources/dilg-reports-resources-201765_e1df4a82fa.pdf" target="_blank" >● DILG People’s Freedom of Information (FOI) Manual</a></h6>
                        <h6>● 2016-2020 FOI Report update</h6>
                        <h6> <a href="https://dilg.gov.ph/PDF_File/transparency/dilg_one-page_foi.pdf" target="_blank" >● DILG One-Page FOI Manual</a></h6>
                      
                   

                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- /.card-body -->
</div>

@endsection
