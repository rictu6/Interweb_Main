@extends('layouts.app')

@section('title')
{{__('2016 - 2020 TRANSPARANCY SEAL')}}
@endsection

@section('breadcrumb')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">
                    <i class="fa fa-cogs nav-icon"></i>
                    {{__('2016 - 2020 TRANSPARANCY SEAL')}}
                </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('admin.index')}}">{{__('Home')}}</a></li>
                    <li class="breadcrumb-item active">{{__('Transparancy Seal')}}</li>
                    <li class="breadcrumb-item active">{{__('2016 - 2020 TRANSPARANCY SEAL')}}</li>
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
                       <h6> <a href="https://drive.google.com/file/d/1GJT3eEIMj24RS83CSDnFeTocO-gR3p40/view" target="_blank" >● Physical and Financial Plan 2020</a></h6>
                       <h6> <a href="https://drive.google.com/file/d/1_jTF515JouY19xHVkjDwYrzndbLx5W5c/view" target="_blank" >● Physical and Financial Plan 2019</a></h6>
                       <h6>  <a href="https://drive.google.com/file/d/1AooFq4dV46jHYqY6QulypXquwLhySaB9/view" target="_blank">● Physical and Financial Plan 2018</a></h6>
                       <h6> <a href="https://drive.google.com/file/d/104K__72CZY3g9WKfgDWdcEYVN237i_ie/view" target="_blank" >● Physical and Financial Plan 2017</a></h6>
                       <h6>  <a href="https://drive.google.com/file/d/1X94ndbxv3_Ii5V7_gsCAgjoqLsjnaZie/view" target="_blank">● Physical and Financial Plan 2016</a></h6>
                       <br>
                       <h6 style="font-weight:bold">MONTHLY CASH PROGRAM</h6>
                       <h6> <a href="https://drive.google.com/file/d/1Yu1rpHWktNMBVdjX1ukUUr8v9mjPjOxm/view" target="_blank" >● Monthly Cash Program 2020</a></h6>
                       <h6> <a href="https://drive.google.com/file/d/1eaIM9YQrN-w4aruBMtquuQ2tAbUB7-Ai/view" target="_blank" >● Monthly Cash Program 2019</a></h6>
                       <h6>  <a href="https://drive.google.com/file/d/1YlyLKOFInX73fvd60MaMtak-7y0rIVq4/view" target="_blank">● Monthly Cash Program 2018</a></h6>
                       <h6> <a href="https://drive.google.com/file/d/1dXco-81UL3_4x1pHLN6ZZyDqN6RMBaFH/view" target="_blank" >● Monthly Cash Program 2017</a></h6>
                       <h6>  <a href="https://drive.google.com/file/d/1lf5pTrZj3Wf7cDPdGnlt0YBlB6Kuc3da/view" target="_blank">● Monthly Cash Program 2016</a></h6>
                    <br>
                       <h6 style="font-weight:bold">STATEMENT OF ALLOTMENT, OBLIGATION, and BALANCES (SAOB)</h6>
                       <h6> <a href="https://drive.google.com/drive/folders/1M55z1CxSZ-2-Dazjd0MWmsIkzSHt8FHP" target="_blank" >● SAOB 2020</a></h6>
                       <h6> <a href="https://drive.google.com/drive/folders/1b8ERCEhorsuAr9gyW1Q1zCI_PpKtQhcX" target="_blank" >● SAOB 2019</a></h6>
                       <h6>  <a href="https://drive.google.com/file/d/1YlyLKOFInX73fvd60MaMtak-7y0rIVq4/view" target="_blank">● SAOB 2018</a></h6>
                       <h6> <a href="https://drive.google.com/drive/folders/1qz0lMj8jExoBDkrLpdfut1u4IYhs98Xd" target="_blank" >● SAOB 2017</a></h6>
                       <h6>  <a href="https://drive.google.com/drive/folders/1FUzpnvitoLIgJy66i54mq70cd0CYiNnE" target="_blank">● SAOB 2016</a></h6>
                       <br>
                       <h6 style="font-weight:bold">DISBURSEMENT AND INCOME</h6>
                       <h6> <a href="https://drive.google.com/drive/folders/1YJi3kLNFczlOyOb5Bt6TED8kx3WwnAwL" target="_blank" >● Disbursement and Income 2020</a></h6>
                       <h6> <a href="https://drive.google.com/drive/folders/1ilYnFsOVWx3rmhCI_RBHHkot30nGHGR4" target="_blank" >● Disbursement and Income 2019</a></h6>
                       <h6>  <a href="https://drive.google.com/drive/folders/1Rj1L6CUHfBu74JzXFhRb3F-AS_xo8VJ0" target="_blank">● Disbursement and Income 2018</a></h6>
                       <h6> <a href="https://drive.google.com/drive/folders/1Av5dFJuoTXaE-AwlHcSzQaBz0kRjaAxA" target="_blank" >● Disbursement and Income 2017</a></h6>
                       <h6>  <a href="https://drive.google.com/drive/folders/1vxy2cnhlBjKUNoUI39eZpxX2IFkIKIYV" target="_blank">● Disbursement and Income 2016</a></h6>
                      
                       
                       <br>
                       <h6 style="font-weight:bold">FINANCIAL ACCOUNTABILITY REPORTS (FARs)</h6>
                       <h6> <a href="https://drive.google.com/drive/folders/1Y6foGUmQGryFmVdN5GXWqjPEUqXSCKnc" target="_blank" >● FARs 2020</a></h6>
                       <h6> <a href="https://drive.google.com/drive/folders/1MBA2dxopCtGn7F77-hvvN9oxR77ZmnJM" target="_blank" >● FARs 2019</a></h6>
                       <h6>  <a href="https://drive.google.com/drive/folders/15orMQgvX_4vrZYPr7Jhq5lpbGYezO8WE" target="_blank">● FARs 2018</a></h6>
                       <h6> <a href="https://drive.google.com/drive/folders/1kVyiUbsqQoF5J5xBfK_UwqCpcNSiAwH9" target="_blank" >● FARs 2017</a></h6>
                       <h6>  <a href="https://drive.google.com/drive/folders/1DX9vw25j9Ua4-9agwvlbFOwRmLPFqXhz" target="_blank">● FARs 2016</a></h6>
                       <br>
                       <h6 style="font-weight:bold">FINANCIAL STATEMENTS</h6>
                      
                       <h6> <a href="https://drive.google.com/file/d/1HIiOqPZbYdmCCmJivunxjlkL3UYasnF3/view" target="_blank" >● Financial Statements 2020</a></h6>
                       <h6> ● Financial Statements 2019</h6>
                       <h6> <a href="https://drive.google.com/file/d/18ZkWlof1OCUzoeBWqHVwbRBEdC7GQg29/view" target="_blank" >● Financial Statements 2018</a></h6>
                       <h6> <a href="https://drive.google.com/file/d/1v462pjZjjEAfTWyFvmYgFuejIxgF9mPP/view" target="_blank" >● Financial Statements 2017</a></h6>
                       <h6> <a href="https://drive.google.com/file/d/1-DsQq5JVUZkvFZTab_6PlvNswqs9KOiG/view" target="_blank" >● Financial Statements 2016</a></h6>
                       

                    </div>
                </div>
                <div class="card card-danger">
                    <div class="card-header">
                        <h5 class="card-title">
                            <i class="fas fa-file-contract nav-icon"></i>
                            {{__('DILG APPROVED BUDGETS, CORRESPONDING TARGETS')}} 
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
                        <h6> <a href="https://drive.google.com/file/d/1vt7smNlq0bNMrpG62wqian98qfhKHhaV/view" target="_blank" >● Approved Budget 2020</a></h6>
                        <h6> <a href="https://drive.google.com/file/d/1cZ7c1Jsv1wQJCeQfgNjJm4hMH5X4xXss/view" target="_blank" >● Approved Budget 2019</a></h6>
                        <h6>  <a href="https://drive.google.com/file/d/1Vqac8BM0QQbvABHOaCQ-oFd79VTz1ZQ_/view" target="_blank">● Approved Budget 2018</a></h6>
                        <h6> <a href="https://drive.google.com/file/d/1ABemTi0IoiDyIbBxuXekN8IDosxcj-ge/view" target="_blank" >● Approved Budget 2017</a></h6>
                        <h6>  <a href="https://drive.google.com/file/d/1pJBz6hlSPR-L7nH1IA0LBj5GRH-d45Bs/view" target="_blank">● Approved Budget 2016</a></h6>
                        <br>
                        <h6 style="font-weight:bold">CORRESPONDING TARGETS</h6>
                       
                        <h6> <a href="https://drive.google.com/drive/folders/1DgWWYEAJBPGYI-LBbbQWwZ5suISeY5mE" target="_blank" >● Corresponding Targets 2020</a></h6>
                        <h6>  <a href="https://drive.google.com/drive/folders/1DSZvmDGuVFVmlY7pPJcdf-o3FWw85mY3" target="_blank">● Corresponding Targets 2019</a></h6>
                        <h6>  <a href="https://drive.google.com/drive/folders/1QizBkh_pOF3UnJGZNL3rX1nHktVnkyX3" target="_blank">● Corresponding Targets 2018</a></h6>
                        <h6> <a href="https://drive.google.com/drive/folders/1XpEOofMr4cQRfqwKNwkdFoq_QRb6PmmN" target="_blank" >● Corresponding Targets 2017</a></h6>
                        <h6>  <a href="https://drive.google.com/drive/folders/1UsV15MpX4KlAnoaCcLVL37UAxHswd0va" target="_blank">● Corresponding Targets 2016</a></h6>
                        <br>
                        <h6 style="font-weight:bold">ACCOMPLISHMENT REPORT</h6>
                        <h6> <a href="https://drive.google.com/drive/folders/1N6MpA55UypZfAt3V6g-335AVTrgb4Rud" target="_blank" >● Accomplishment Report 2020</a></h6>
                        <h6> <a href="https://drive.google.com/drive/folders/14XD6QBVQbfTpERqPxHnwDKg8n701QDBa" target="_blank" >● Accomplishment Report 2019</a></h6>
                        <h6> <a href="https://drive.google.com/drive/folders/1puUHNq1-kTiCuvq3kd3glLLO1XUcDCdb" target="_blank" >● Accomplishment Report 2018</a></h6>
                        <h6> <a href="https://drive.google.com/drive/folders/1JbjXujeOPewj6uhveaXYeCa9y-j1kGui" target="_blank" >● Accomplishment Report 2017</a></h6>
                        <h6> <a href="https://drive.google.com/drive/folders/1Pv-so5qHShIEVPysiXBMpoiLeDsvTJkx" target="_blank" >● Accomplishment Report 2016</a></h6>
                        

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
                        <h6> <a href="https://drive.google.com/file/d/1iWZTR_fxAOW2ZH2d7VW5oqm1HrgUBKbf/view" target="_blank" >● APP 2020</a></h6>
                        <h6> <a href="https://drive.google.com/file/d/1ilhfli14NDiIZHAdjrtcA-OqUFmbYcYd/view" target="_blank" >● APP 2020 - Iloilo Province</a></h6>
                        <h6> <a href="https://drive.google.com/file/d/1MVaTtJ1BYVPdSpAEHq73yZnDqJWUSRWU/view" target="_blank" >● APP 2019</a></h6>
                        <h6> <a href="https://drive.google.com/file/d/15shw6RWBnFa25KdmVZUw6VKeO8rvRukN/view" target="_blank" >● APP 2018</a></h6>
                        <h6> <a href="https://drive.google.com/file/d/1PV7fLiiB_AU_cdsQSJOJ1WYYDUecxbYM/view" target="_blank" >● APP 2017</a></h6>
                        <h6> <a href="https://drive.google.com/file/d/1uRmPI4_gJDgEr9LTy_uXS5HtPY0L9rld/view" target="_blank" >● APP 2016</a></h6>
                     
                        <br>
                        <h6 style="font-weight:bold">ANNUAL PROCUREMENT PLAN – COMMON SUPPLIES AND EQUIPMENT (APP-CSE)</h6>
                        <h6> <a href="https://drive.google.com/file/d/109iYQZMeCXPv_abc6FSyUGyEs2faN8GU/view" target="_blank" >● APP-CSE 2020</a></h6>
                        <h6> <a href="https://drive.google.com/file/d/1rixF541nxEaz4yofvVMfBfj8FTaOdCTh/view" target="_blank" >● APP-CSE 2019</a></h6>
                        <br>
                        <h6 style="font-weight:bold">ANNUAL PROCUREMENT PLAN – INDICATIVE</h6>
                        <h6> <a href="https://drive.google.com/file/d/1XwMFmxJ7_iOkq4Rz_1MRQ4S61Nk4nEku/view" target="_blank" >● APP-Indicative 2020</a></h6>
                        <h6> <a href="https://drive.google.com/file/d/17cb9rpj08U8-gjICKiWWfljn95XGTdEe/view" target="_blank" >● APP-Indicative 2019</a></h6>
                        <br>
                        <h6 style="font-weight:bold">ANNUAL PROCUREMENT PLAN – SUPPLEMENTAL (APP-SUPPLEMENTAL)</h6>
                        <h6> <a href="https://drive.google.com/file/d/1W7KSe8f2NX6EaoYqSobdRFw1tLuvdzS5/view" target="_blank" >● APP – Supplemental 2019</a></h6>
                        <h6> <a href="https://drive.google.com/file/d/1F1B059Sqd045PVFX3NDBfr7xxGu-x878/view" target="_blank" >● APP – Supplemental 2017</a></h6>
                        <h6> <a href="https://drive.google.com/file/d/1a5-8hj9au71cMVm5hZP1BZ4C4htR6NAW/view" target="_blank" >● APP – Supplemental 2016</a></h6>
                        <br>
                        <h6 style="font-weight:bold">BIDDING DOCUMENTS</h6>
                        <h6> <a href="https://drive.google.com/file/d/1BEPJVz9W0wldZJKRhJv9WnEaT6GsjQ0E/view" target="_blank" >● 2020 Implementation of TV Aralan – RCSP</a></h6>
                        <h6> <a href="https://drive.google.com/file/d/1Dxp4a3iVYBkYJWK4sWZbYFKY4EVQLVks/view" target="_blank" >● 2020-05 Security, Janitorial, and Driving Services</a></h6>
                        <h6> <a href="https://drive.google.com/file/d/159UPuS5PrGoj63UR3gy4S4iWg5qTzQZt/view" target="_blank" >● 2020 DOH IEC Materials</a></h6>
                        <h6> <a href="https://drive.google.com/file/d/1JPYw3SLd3jkdU_UZ4wrfI8vqWzGZWpKi/view" target="_blank" >● 2019-04 Training on CBMC-CMGP</a></h6>
                        <h6> <a href="https://drive.google.com/file/d/1E2eQfK9hIz4hKzsmkwZiYSQkqC4upBjZ/view" target="_blank" >● 2019-04-02 Bid Supplement – Training on CBMC-CMGP</a></h6>
                        <h6> <a href="https://drive.google.com/file/d/160GdBwGm3mgSevxXqthilhS2rBYfLhSf/view" target="_blank" >● 2019-04-01 Bid Supplement – Training on CBMC-CMGP</a></h6>
                        <h6> <a href="https://drive.google.com/file/d/1htaz1hFrUY_71ybMcXj_e4JKm6cQwriO/view" target="_blank" >● 2019 Job Order of Personnel Render Services</a></h6>
                        <h6> <a href="https://drive.google.com/file/d/1UIpjfyZ_-oKtJ2ErPMhE-YpnJ_ePraA7/view" target="_blank" >● 2018 General Security Services</a></h6>
                        <h6> <a href="https://drive.google.com/file/d/1VBpyjfmMy1PTwB8a8MNarVaY0UFi42u_/view" target="_blank" >● 2016 Katarungang Pambarangay Training – Antique ReBid</a></h6>
                        <h6> <a href="https://drive.google.com/file/d/10y7tUtiYqGnd5Rzu6Gu7t2CGjoJbzih0/view" target="_blank" >● 2016 Katarungang Pambarangay Training – Capiz ReBid</a></h6>
                        <h6> <a href="https://drive.google.com/file/d/10UrktDle4aUABPEEzkQsl4LaUnbDgdMM/view" target="_blank" >● 2016 Katarungang Pambarangay Training – Iloilo ReBid</a></h6>
                        <h6> <a href="https://drive.google.com/file/d/15Ws-lnV7XK73r1Fym-Aau-RZEel1-qYc/view" target="_blank" >● 2016 LCCAP Training Activity</a></h6>
                        <h6> <a href="https://drive.google.com/file/d/1_dNzrfVdK8wxK-dgi9XPEp15WVRwqXb2/view" target="_blank" >● 2016 LCCAP Training Activity ReBid</a></h6>
                        <h6> <a href="https://drive.google.com/file/d/1gSYrp3yiOksytn1tkt9AINST7TevRZ8n/view" target="_blank" >● 2016 Office Supplies</a></h6>
                        <h6> <a href="https://drive.google.com/file/d/1wqEb_UFgGbMlCmYdxGS0HwYNs4ndXNga/view" target="_blank" >● 2016 Office Supplies ReBid</a></h6>
                        <h6> <a href="https://drive.google.com/file/d/1E1dCQclvYNv1gdSOeiiwRHmFjCFy2f30/view" target="_blank" >● 2016 Procurement of Vehicles</a></h6>
                      
                       
                       
                       
                       
                       
                        <br>
                        <h6 style="font-weight:bold">PROCUREMENT MONITORING REPORT (PMR)</h6>
                        <h6> <a href="https://drive.google.com/drive/folders/1KetPj2tTIdF0RsAOOOIcrawhdn5v-D0t" target="_blank" >● PMR 2020</a></h6>
                        <h6> <a href="https://drive.google.com/file/d/1RU3CrpMusFhkyl5O63OBI0O9LsigashO/view" target="_blank" >● PMR 2019 1st Semester</a></h6>
                        <h6> <a href="https://drive.google.com/file/d/1ghVIOXFmuLyXZXQHAmWYhibBhCptXFxb/view" target="_blank" >● PMR 2019 2nd Semester</a></h6>
                        <h6> <a href="https://drive.google.com/file/d/1oTww1za_MmRMNw20_iOFgafad5RhqE6K/view" target="_blank" >● PMR 2018 1st Semester</a></h6>
                        <h6> <a href="https://drive.google.com/file/d/1MnJZJtkVL4sHkHryXMQjhZR4xUWaxoy9/view" target="_blank" >● PMR 2021PMR 2018 2nd Semester</a></h6>
                        <h6> <a href="https://drive.google.com/file/d/11IfCGVv8wY6Qv4_OKRdCHuhweVEu7w5z/view" target="_blank" >● PMR 2017 1st Semester</a></h6>
                        <h6> <a href="https://drive.google.com/file/d/192tDLi4WGgAUwFFLExi4aKcNM9KmDA0A/view" target="_blank" >● PMR 2017 2nd Semester</a></h6>
                        <h6> <a href="https://drive.google.com/file/d/1ezq2OBzkZj-x0KtpJMz7a5OwElUGBlWd/view" target="_blank" >● PMR 2016 1st Semester</a></h6>
                        <h6> <a href="https://drive.google.com/file/d/17k_nRzSg6UQLaABHORE0dhukqY7mr_XT/view" target="_blank" >● PMR 2016 2nd Semester</a></h6>
                        <br>
                        <h6 style="font-weight:bold">REQUEST FOR QUOTATIONS (RFQ)</h6>
                        <h6> <a href="https://drive.google.com/drive/folders/182dWitPNsYF7jOmw3KCaSD_0r70IdtMd" target="_blank" >● RFQ 2020</a></h6>
                        <h6> <a href="https://drive.google.com/drive/folders/1bTYCEOTg0UZLawcrvHx6lukVI8sI2Hh0" target="_blank" >● RFQ 2019</a></h6>
                        <h6> <a href="https://drive.google.com/drive/folders/13z5ETWTdDzX-FtDJkR-bMdjsZwHWFK-N" target="_blank" >● RFQ 2018</a></h6>
                        <h6> <a href="https://drive.google.com/drive/folders/1LxYzFS7KOsgLi5OWOj-2weR5lxQVa1RM" target="_blank" >● RFQ 2017</a></h6>
                        <h6> <a href="https://drive.google.com/drive/folders/1XuwEZkqizesWTdnrIaVLy38YLUusraed" target="_blank" >● RFQ 2016</a></h6>
                        <br>
                        <h6 style="font-weight:bold">PURCHASE ORDER (PO)</h6>
                        <h6> <a href="https://drive.google.com/drive/folders/1DrAQE75bqgDdoNt0Q2pB729W3OB1DatV" target="_blank" >● PO 2020</a></h6>
                        <h6> <a href="https://drive.google.com/drive/folders/1S6ASrwti4f7UkMgcnm2EF-qPsCntBSRc" target="_blank" >● PO 2019</a></h6>
                        <h6> <a href="https://drive.google.com/drive/folders/1eNW15FpN5dwIsuaCSNrLrexvxQfWpb6u" target="_blank" >● PO 2018</a></h6>
                        <h6> <a href="https://drive.google.com/drive/folders/1ROtoru2ePBy8c4B1mjnp6tTgd0-u_cwK" target="_blank" >● PO 2017</a></h6>
                        <h6> <a href="https://drive.google.com/drive/folders/17j8e1ax5J5z7W6sMHn2V1DfN98Uxacxj" target="_blank" >● PO 2016</a></h6>
                        <br>
                        <h6 style="font-weight:bold">LETTER ORDER (LO)</h6>
                        <h6> <a href="https://drive.google.com/drive/folders/1OEhcByk_H676oYSDNLpMO_XiG6arvzRw" target="_blank" >● LO 2019</a></h6>
                        <h6> <a href="https://drive.google.com/drive/folders/1zmLDUnNMv-hnWM4BWH4RSEvhYFRdSq8q" target="_blank" >● LO 2018</a></h6>
                        <h6> <a href="https://drive.google.com/drive/folders/1O7OnfWYkb8VySTJ2U-gSKVAmuWnWwODZ" target="_blank" >● LO 2017</a></h6>
                        <h6> <a href="https://drive.google.com/drive/folders/1WJ_X8XSC3a5EQp3Pm52AnuiECbdH3poW" target="_blank" >● LO 2016</a></h6>
                     

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
                      
                        <br>
                     
                        <h6> <a href="https://drive.google.com/file/d/1KohEzZo4qetyR2bPQOYpF3SgX0VgnTX5/view" target="_blank" >● 2017 Ranking Delivery Units</a></h6>
                   

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
                       
                       <br>
                        <h6 style="font-weight:bold">SUMMARY OF LIST OF FILERS</h6>
                        <br>

                        <h6> <a href="https://drive.google.com/file/d/1eBmhjOJb6N0vETmxRTQ-Kb2iWoE2mkMw/view" target="_blank" >● 2020 Summary of List of Filers</a></h6>
                        <h6> <a href="https://drive.google.com/file/d/1C1neeaWOAoeImFMNg7bU4XIkLtblRuW-/view" target="_blank" >● 2019 Summary of List of Filers</a></h6>
                      

                    </div>
                </div>
              
            </div>
        </div>
    </div>
    
    <!-- /.card-body -->
</div>

@endsection
