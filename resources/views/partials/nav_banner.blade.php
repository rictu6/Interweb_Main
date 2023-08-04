<nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>


    </ul>
    <a href="https://www.gov.ph/">
        <div class="logoWrapper">
            <span class="stylish">GOV</span>
            <span class="logo">PH</span>
        </div>
    </a>
    <!-- for use with <use> -->
    <svg xmlns="http://www.w3.org/2000/svg" hidden>
        <symbol id="arrow" viewbox="0 0 16 16">
            <polyline points="4 6, 8 10, 12 6" stroke="#000" stroke-width="2" fill="transparent"
                stroke-linecap="round" />
        </symbol>
    </svg>

    <!-- In the real world, all hrefs would have go to real, unique URLs, not a "#" -->
    <nav id="site-navigation" class="site-navigation" aria-label="Clickable Menu Demonstration">
        <ul class="main-menu clicky-menu no-js">
            <li>
                <a href="{{route('admin.index')}}">HOME</a>
            </li>
            <li>
                <a href="#">
                    ABOUT US
                    <svg aria-hidden="true" width="16" height="16">
                        <use xlink:href="#arrow" />
                    </svg>
                </a>
                <ul>
                    <li><a href="{{route('admin.whoweare')}}">WHO WE ARE</a></li>
                    <li><a href="{{route('admin.mvsv')}}">MISSION, VISION, & SHARED VALUES</a></li>
                    <li><a href="{{route('admin.pof')}}">POWERS AND FUNCTIONS</a></li>
                    <li><a href="{{route('admin.keyofficials')}}">KEY OFFICIALS</a></li>
                    <li><a href="#">ORGANIZATIONAL CHART</a></li>
                    <li><a href="{{asset('assets/menus/dilg6_CitizensCharterBookUpdated20230117.pdf')}}"
                            target="_blank">CITIZEN'S CHARTER</a></li>
                    <li><a href="{{asset('assets/menus/dilg_document_20221212_8f36cc577f.pdf')}}" target="_blank">DILG
                            DATA PRIVACY NOTICE</a></li>
                </ul>
            </li>
            {{-- {{ public_path("storage/images/".$user->profile_pic) }} --}}

            {{-- <li>
                <a href="{{route('admin.newsandupdate')}}">NEWS AND UPDATES</a>
            </li> --}}
            {{-- <li>
                <a href="#">
                    TRANSPARANCY SEAL
                    <svg aria-hidden="true" width="16" height="16">
                        <use xlink:href="#arrow" />
                    </svg>
                </a>
                <ul>
                    <li><a href="{{route('admin.seal2021')}}">2021 - PRESENT TRANSPARANCY SEAL</a></li>
                    <li><a href="{{route('admin.seal2016')}}">2016 - 2020 TRANSPARANCY SEAL</a></li>
                    <li><a href="{{route('admin.seal2010')}}">2010 - 2015 TRANSPARANCY SEAL</a></li>

                </ul>
            </li> --}}
            <li>
                <a href="#">
                    KNOWLEDGE CENTER
                    <svg aria-hidden="true" width="16" height="16">
                        <use xlink:href="#arrow" />
                    </svg>
                </a>
                <ul>
                    <li><a href="{{route('admin.pubandnot')}}">PUBLICATION AND NOTICES</a></li>
                    <li><a href="#">VIDEOS</a></li>
                    <li><a href="#">JOB VACANCIES</a></li>
                </ul>
            </li>
            <li>
                <a href="{{route('admin.contactus')}}">CONTACT US</a>
            </li>
        </ul>
    </nav>


</nav>