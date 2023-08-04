@extends('layouts.app')

@section('title')
{{__('2010 - 2015 TRANSPARANCY SEAL')}}
@endsection

@section('breadcrumb')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">
                    <i class="fa fa-cogs nav-icon"></i>
                    {{__('2010 - 2015 TRANSPARANCY SEAL')}}
                </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('admin.index')}}">{{__('Home')}}</a></li>
                    <li class="breadcrumb-item active">{{__('Transparancy Seal')}}</li>
                    <li class="breadcrumb-item active">{{__('2010 - 2015 TRANSPARANCY SEAL')}}</li>
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
                       <h6> <a href="https://drive.google.com/file/d/1SsEx8aULK0okh5JnhHiguwTW9gw4EDgj/view" target="_blank" >● Physical and Financial Plan 2015</a></h6>
                       <h6> <a href="https://drive.google.com/file/d/1flk_GQ-XzybGz7M3Jvk-Ig5trSEE2MHt/view" target="_blank" >● Physical and Financial Plan 2014</a></h6>
                       <h6>  <a href="https://drive.google.com/drive/folders/1b9fIdBRVsopAytGNz3H15o2h6lxHvOLk" target="_blank">● Physical and Financial Plan 2013</a></h6>
                       <h6> <a href="https://drive.google.com/drive/folders/1h95iD6DmDY2l6qbJsqZ6-4xqHobFah3_" target="_blank" >● Physical and Financial Plan 2012</a></h6>
                       <h6>  <a href="https://drive.google.com/drive/folders/1LBUMQYDRpvwS2Hf2kb_wDzvYlWc_s4_S" target="_blank">● Physical and Financial Plan 2011</a></h6>
                       <h6>  <a href="https://drive.google.com/drive/folders/1vzTEG5_Gniok1zrrJPXhJl4eTHDwGVSl" target="_blank">● Physical and Financial Plan 2010</a></h6>
                     
                       <br>
                       <h6 style="font-weight:bold">MONTHLY CASH PROGRAM</h6>
                       <h6> <a href="https://drive.google.com/file/d/1Ic6lQAyqxGhhP31icdspJT7ml3M8hR8u/view" target="_blank" >● Monthly Cash Program 2015</a></h6>
                       <h6> <a href="https://drive.google.com/file/d/1MFI_28FEKPXsMZ3qNuWjdq6wa0_eaqgK/view" target="_blank" >● Monthly Cash Program 2014</a></h6>
                       <h6> <a href="https://drive.google.com/file/d/1qWVleGEUVgzMIqY0RDUT8g08lCzaWDkx/view" target="_blank" >● Monthly Cash Program 2013</a></h6>
                       <h6>  <a href="https://drive.google.com/file/d/1quBDyW6asDpiZCV9OVvEPwSArr1SFfLb/view" target="_blank">● Monthly Cash Program 2012</a></h6>
                       <h6> <a href="https://drive.google.com/file/d/1qAPWBVMSlAGJQoewvhdptxuA9Y_M1wXd/view" target="_blank" >● Monthly Cash Program 2011</a></h6>
                       <h6>  <a href="https://drive.google.com/file/d/1f8ohybsndSEst8wLpG99P7VpsqCtE53f/view" target="_blank">● Monthly Cash Program 2010</a></h6>
                    <br>
                       <h6 style="font-weight:bold">STATEMENT OF ALLOTMENT, OBLIGATION, and BALANCES (SAOB)</h6>
                       <h6> <a href="https://drive.google.com/drive/folders/1cbYTb4IXNYE6A5eN_OeKSSnzVoBu9zf8" target="_blank" >● SAOB 2015</a></h6>
                       <h6> <a href="https://drive.google.com/drive/folders/13t0QQGG0C1yY98yAyZ9dURuYJ5qq_Nfb" target="_blank" >● SAOB 2014</a></h6>
                       <h6>  <a href="https://drive.google.com/drive/folders/1lwvSew3zPSTPORdDpVYVisMpoy6-ZG5a" target="_blank">● SAOB 2013</a></h6>
                       <h6> <a href="https://drive.google.com/drive/folders/1TBelQH5rkxFEh1pdYe0j4ogwBB80Ey0r" target="_blank" >● SAOB 2012</a></h6>
                       <h6>  <a href="https://drive.google.com/drive/folders/1M_wK1-EQZp4yO2AN-dSdZvaBdKUPASb9" target="_blank">● SAOB 2011</a></h6>
                       <h6>  <a href="https://drive.google.com/drive/folders/1lpZOxt2gVmJtP3ZXiMVWLgcVYlOaEMZ1" target="_blank">● SAOB 2010</a></h6>
                       <br>
                       <h6 style="font-weight:bold">DISBURSEMENT AND INCOME</h6>
                       <h6> <a href="https://drive.google.com/drive/folders/1dAssQCUBS2EELiMyYjjMNzUvh9MYeKgw" target="_blank" >● Disbursement and Income 2015</a></h6>
                       <h6> <a href="https://drive.google.com/drive/folders/1W_e2DiQ3pGK1fCcVlnORukPUUkwO4s7v" target="_blank" >● Disbursement and Income 2014</a></h6>
                       <h6>  <a href="https://drive.google.com/drive/folders/1jwosUAuNVTrHnSmG5EZCwGEvag7vw904" target="_blank">● Disbursement and Income 2013</a></h6>
                       <h6> <a href="https://drive.google.com/file/d/14FRvbGsmPZF6Rrse6t64Glo8sQXKnG1C/view" target="_blank" >● Disbursement and Income 2012</a></h6>
                       <h6>  <a href="https://drive.google.com/file/d/1XqiL6AWff1nCYLntdN2SyZWEIdIZg5nq/view" target="_blank">● Disbursement and Income 2011</a></h6>
                       <h6>  <a href="https://drive.google.com/file/d/1mMLs5VYxXvaApoF1A-SOi0mn9Y3b4siH/view" target="_blank">● Disbursement and Income 2010</a></h6>
                      
                       
                       <br>
                       <h6 style="font-weight:bold">FINANCIAL ACCOUNTABILITY REPORTS (FARs) / FINANCIAL REPORT OF OPERATION</h6>
                       <h6> <a href="https://drive.google.com/drive/folders/1HSs32-0OJHuhCXplFDLI4CaCOkrwuYnQ" target="_blank" >● FARs 2015</a></h6>
                       <h6> <a href="https://drive.google.com/drive/folders/1lD9pmQqoaCRfuuRYVux8rOKm2E5ZpM5i" target="_blank" >● FARs 2014</a></h6>
                       <h6> <a href="https://drive.google.com/drive/folders/13OEk5SVpKJPF6zf16-79m1gpQqnmSpmC" target="_blank" >● FARs 2013</a></h6>
                       <h6> <a href="https://drive.google.com/file/d/1q6V9-WhT5oUqW3b5CuztjU7TjC2yADCR/view" target="_blank" >● Financial Report of Operation 2012</a></h6>
                       <h6>  <a href="https://drive.google.com/file/d/1gJGc7-EqteDT_Zwbhi4ZYD7G3rKFflXk/view" target="_blank">● Financial Report of Operation 2011</a></h6>
                       <h6> <a href="https://drive.google.com/file/d/1Fma86fDE15Nwgj_awJdnRgOq7IRfqGx1/view" target="_blank" >● Financial Report of Operation 2010</a></h6>
                       
                       <br>
                       <h6 style="font-weight:bold">FINANCIAL STATEMENTS</h6>
                      
                       <h6> <a href="https://drive.google.com/file/d/1io4zNtOhkf3ByJdVI5FUvHFM0Xg2znFu/view" target="_blank" >● Financial Statements 2015</a></h6>
                       <h6> <a href="https://drive.google.com/file/d/1SVQNT2MbEs--A36l9IvBl34k3n29nkYV/view" target="_blank" >● Financial Statements 2014</a></h6>
                       <h6> <a href="https://drive.google.com/file/d/15pLqGZVr6whCwk6LGRu7VVikmzKfpamA/view" target="_blank" >● Financial Statements 2013</a></h6>
                       <h6> <a href="https://drive.google.com/file/d/1cNvEnOY6hUc8hm1Dz9-QtLYY1jBVwfcm/view" target="_blank" >● Financial Statements 2012</a></h6>
                       <h6> <a href="https://drive.google.com/file/d/1vzvamUDZ0xq_mkZLnQjiPjo9U1hc15fE/view" target="_blank" >● Financial Statements 2011</a></h6>
                       <h6> <a href="https://drive.google.com/file/d/17qOjzCZlknyStjHe-FsDLwhpfXc2Al2U/view" target="_blank" >● Financial Statements 2010</a></h6>
                       <h6> <a href="https://drive.google.com/file/d/15RT4bZJbyZ_m0DfDWMHMYxtLFgs9NmFz/view" target="_blank" >● Financial Statements 2009</a></h6>
                       

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
                        <h6> <a href="https://drive.google.com/file/d/1H4YkWWubuPFEtvXqogWaVHIHXd7_QlfU/view" target="_blank" >● Approved Budget 2015</a></h6>
                        <h6> <a href="https://drive.google.com/file/d/1n9T7KDJg-gjrZCHES1gR9JWVrCuzWpbJ/view" target="_blank" >● Approved Budget 2014</a></h6>
                        <h6>  <a href="https://drive.google.com/file/d/1v6DsF8B-1oIA-BA6usfEPYm3NDNHGIZ4/view" target="_blank">● Approved Budget 2013</a></h6>
                        <h6> <a href="https://drive.google.com/file/d/1NU3KEu49LO5rTtQ2jaiMR9BZMsDoZ6wd/view" target="_blank" >● Approved Budget 2012</a></h6>
                        <h6>  <a href="https://drive.google.com/file/d/1s-y-QgaC2K5nURw3Rxd0dvNvXgXxAli6/view" target="_blank">● Approved Budget 2011</a></h6>
                        <h6>  <a href="https://drive.google.com/file/d/1EYqjvq7jZP2hAsEUdhu8c8gGqPhXHd0K/view" target="_blank">● Approved Budget 2010</a></h6>
                        <br>
                        <h6 style="font-weight:bold">CORRESPONDING TARGETS</h6>
                       
                        <h6> <a href="https://drive.google.com/drive/folders/1OPA0RMcgrXY_pA6ujt1RDSJm1Ca-yGzW" target="_blank" >● Corresponding Targets 2015</a></h6>
                        <h6> <a href="https://drive.google.com/drive/folders/1ysWrUcdY_j2s-GsR-szwZRnmbhN7-xC0" target="_blank" >● Corresponding Targets 2014</a></h6>
                        <h6>  <a href="https://drive.google.com/drive/folders/1b9fIdBRVsopAytGNz3H15o2h6lxHvOLk" target="_blank">● Corresponding Targets 2013</a></h6>
                        <h6>  <a href="https://drive.google.com/drive/folders/1h95iD6DmDY2l6qbJsqZ6-4xqHobFah3_" target="_blank" >● Corresponding Targets 2012</a></h6>
                        <h6>  <a href="https://drive.google.com/drive/folders/1LBUMQYDRpvwS2Hf2kb_wDzvYlWc_s4_S" target="_blank">● Corresponding Targets 2010</a></h6>
                        <h6>  <a href="https://drive.google.com/drive/folders/1vzTEG5_Gniok1zrrJPXhJl4eTHDwGVSl" target="_blank">● Corresponding Targets 2010</a></h6>
                        <br>
                        <h6 style="font-weight:bold">ACCOMPLISHMENT REPORT</h6>
                        <h6> <a href="https://drive.google.com/drive/folders/1vxY896MtmUq7erbNWU8db2yJeOi_3gEQ" target="_blank" >● Accomplishment Report 2015</a></h6>
                        <h6> <a href="https://drive.google.com/drive/folders/14EJzcmg9lvEBLDqZpfHl3R7Hd0fk_foW" target="_blank" >● Accomplishment Report 2014</a></h6>
                        <h6> <a href="https://drive.google.com/drive/folders/105O60zNHNDkX7phm4HbNMgz7dPUoJFR3" target="_blank" >● Accomplishment Report 2013</a></h6>
                        <h6> <a href="https://drive.google.com/drive/folders/1ZvG3qOlQ-u7Q0WN8Kbgaa7nfO7zxlu4F" target="_blank" >● Accomplishment Report 2012</a></h6>
                        <h6> <a href="https://drive.google.com/drive/folders/1g53Lz2izhJZRxsaawHVlrmpTcfjUJaNa" target="_blank" >● Accomplishment Report 2011</a></h6>
                        <h6> <a href="https://drive.google.com/drive/folders/1hyIqpG0BrPQLWGmtbk2bUe5HXkV-yW8N" target="_blank" >● Accomplishment Report 2010</a></h6>
                        

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
                        <br>
                        <h6> <a href="https://drive.google.com/file/d/1j3KscVndYTa4DOumDH5xItCVlG86Bqlt/view" target="_blank" >● Stories of Six – Annual Report 2015</a></h6>
                        <h6> <a href="https://drive.google.com/file/d/1NEEUWaZ4jBnidvVyUAQYtC5s_IsxsiN8/view" target="_blank" >● Stories of Six – Annual Report 2014</a></h6>
                        <h6> <a href="https://drive.google.com/file/d/1tNffhy2o0JDQviYzwavIrAhPhW4o2cgZ/view" target="_blank" >● Stories of Six – Annual Report 2013</a></h6>
                        <h6> <a href="https://drive.google.com/file/d/1R6Hlm3uqrvjKB1W45YGxdOVx96h1eMvp/view" target="_blank" >● Annual Report 2012</a></h6>
                        <h6> <a href="https://drive.google.com/file/d/10JzJo_qFAjdOvWW9ziBfduvm4-BfAxdR/view" target="_blank" >● Annual Report 2011</a></h6>
                        <h6> <a href="https://drive.google.com/file/d/145TJDYKSVyHa5zXC4h08TN_3CADOazuO/view" target="_blank" >● Annual Report 2010</a></h6>
                        <h6> <a href="https://drive.google.com/file/d/1N2ci4ekyOXUr3bTyeglxKR3BqDfT0ABM/view" target="_blank" >● Annual Report 2009</a></h6>
                        
                       
                        

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
                      
                        <h6> <a href="https://drive.google.com/file/d/1yYnpodaCoMV4zt9GkAQMa6JkUQ8dkq9s/view" target="_blank" >● APP 2015</a></h6>
                        <h6> <a href="https://drive.google.com/file/d/1_0GaM_dya9MAZD7SvcssxOP_PxDiP-oZ/view" target="_blank" >● APP 2014</a></h6>
                        <h6> <a href="https://drive.google.com/file/d/1TlUuHHFhviZ0VGKJ_7E2ShQRT5iTImQg/view" target="_blank" >● APP 2013</a></h6>
                        <h6> <a href="https://drive.google.com/file/d/1a9ajdfF3iOe8kxCLM9yymgxaPD3joM6B/view" target="_blank" >● APP 2012</a></h6>
                        <h6> <a href="https://drive.google.com/file/d/1IDYX44rq6vq_GiYNWNmWrVHTvUlYqb6y/view" target="_blank" >● APP 2011</a></h6>
                        <h6> <a href="https://drive.google.com/file/d/19DOkvKPELgM33IiQFlyyKO2bW1YV_6Gb/view" target="_blank" >● APP 2010</a></h6>
                     
                        <br>
                        <h6 style="font-weight:bold">ANNUAL PROCUREMENT PLAN – SUPPLEMENTAL (APP-SUPPLEMENTAL)</h6>
                        <h6> <a href="https://drive.google.com/file/d/1mJwAeNZhTwx3gLgBLFW6mzC-fk8vacni/view" target="_blank" >● APP – Supplemental 2015</a></h6>
                        <h6> <a href="https://drive.google.com/file/d/1IrusbhBNlm7y9s3uTriXGGNCGA-kpYHW/view" target="_blank" >● APP – Supplemental 2013</a></h6>
                        <br>
                        <h6 style="font-weight:bold">BIDDING DOCUMENTS</h6>
                        <h6> <a href="https://drive.google.com/file/d/1rEpEmxfXA_yMKU3p4wmuMY3Si56MJmR0/view" target="_blank" >● 2015 Procurement of Vehicles</a></h6>
                        <h6> <a href="https://drive.google.com/file/d/1EkoAxwB6ctzUMW0fRYtkrsjXi1xV0jsj/view" target="_blank" >● 2015 Procurement of Computer Laptops</a></h6>
                        <h6> <a href="https://drive.google.com/drive/folders/1w9OTkdPggxP3btOP6NcfioHC6KuIku1n" target="_blank" >● 2011 Police Patrol  Equipment</a></h6>
                        <br>
                        <h6 style="font-weight:bold">PROCUREMENT MONITORING REPORT (PMR)</h6>
                        <h6> <a href="https://drive.google.com/file/d/1CiZDbNa6glqfo4dB13Mb2AZMAMJ9qoPM/view" target="_blank" >● PMR 2015 1st Semester</a></h6>
                        <br>
                      
                        <h6 style="font-weight:bold">REQUEST FOR QUOTATIONS (RFQ)</h6>
                        <h6> <a href="https://drive.google.com/drive/folders/1xia1AEAZK5YGmcOn7cGFVaNzSFsJZbj_" target="_blank" >● RFQ 2015</a></h6>
                        <h6> <a href="https://drive.google.com/drive/folders/1SbhUY4ob6rcOHH4iluabwtuMPN9kolbX" target="_blank" >● RFQ 2014</a></h6>
                        <h6> <a href="https://drive.google.com/drive/folders/18MOPKEF7XF0oWL6VyYW2NEtfSX8YPlsh" target="_blank" >● RFQ 2013</a></h6>
                        <h6> <a href="https://drive.google.com/drive/folders/1x30QdbEL-IUlOkhjY_nC4r3dCxE_RY1a" target="_blank" >● RFQ 2012</a></h6>
                        <br>
                        <h6 style="font-weight:bold">PURCHASE ORDER (PO)</h6>
                       
                        <h6> <a href="https://drive.google.com/drive/folders/1SYwoBhznCzg_kK5hSuPh7wdcWsnLCKOm" target="_blank" >● PO 2015</a></h6>
                        <h6> <a href="https://drive.google.com/drive/folders/18vYNqvJq2oBGKtx9EeHd57DxxoITj5e1" target="_blank" >● PO 2014</a></h6>
                        <h6> <a href="https://drive.google.com/drive/folders/1EGWzHoeqEkWGEeDv4llReSCndrN9-Tm2" target="_blank" >● PO 2013</a></h6>
                        <h6> <a href="https://drive.google.com/drive/folders/1zh4ZI0ggL07WpFwV46Qm0QehzPtqiVrF" target="_blank" >● PO 2012</a></h6>
                        <br>
                        <h6 style="font-weight:bold">LETTER ORDER (LO)</h6>
                        <h6> <a href="https://drive.google.com/drive/folders/1dSArpBSAQdtMvBeTZ8ULcj1kXQR93Ahm" target="_blank" >● LO 2015</a></h6>
                        <h6> <a href="https://drive.google.com/drive/folders/1zLKilnZLXsn1GAJ39tUulEZc57L-qbza" target="_blank" >● LO 2014</a></h6>
                        <h6> <a href="https://drive.google.com/drive/folders/1PxJ8wXbZhJ5DG7Cx7FfjWTcWGIBn_F73" target="_blank" >● LO 2013</a></h6>
                        <h6> <a href="https://drive.google.com/drive/folders/1OjTwgkic2BP-1aCAIwqP3WOVfhMg_1Gu" target="_blank" >● LO 2012</a></h6>
                     

                    </div>
                </div>
              

              
            </div>
        </div>
    </div>
    
    <!-- /.card-body -->
</div>

@endsection
