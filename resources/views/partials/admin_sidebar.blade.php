<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        @can('view_dashboard')
        <li class="nav-item">
            <a href="{{route('admin.index')}}" class="nav-link" id="dashboard">
                <i class="nav-icon fas fa-th"></i>
                <p>
                    {{__('MY DASHBOARD')}}
                </p>
            </a>
        </li>
        @endcan





        @canany(['view_profile','view_profileaccount'])
        <li class="nav-item has-treeview" id="users_profiles">
            <a href="#" class="nav-link" id="users_profiles_link">
                <i class="nav-icon fas fa-user-circle"></i>
                <p>
                    {{__('MY ACCOUNT PROFILE')}}
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">

                @can('view_profile')
                <li class="nav-item">
                    <a href="{{route('admin.profile.edit')}}" class="nav-link" id="profiles">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{__('MY PROFILE')}}</p>
                    </a>
                </li>
                @endcan

                @can('view_profileaccount')
                <li class="nav-item">
                    <a href="{{route('admin.profileaccount.edit')}}" class="nav-link" id="profileaccounts">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{__('MY ACCOUNT')}}</p>
                    </a>
                </li>
                @endcan

            </ul>
        </li>
        @endcan
        @can('view_branch')
        <li class="nav-item">
            <a href="{{route('admin.branches.index')}}" class="nav-link" id="branches">
                <i class="fas fa-map-marked-alt nav-icon"></i>
                <p>{{__('Branches')}}</p>
            </a>
        </li>
        @endcan


        @canany(['view_hrmis','view_user','view_fta','view_legal'])
        <li class="nav-item has-treeview" id="users_roles">
            <a href="#" class="nav-link" id="users_roles_link">
                <i class="nav-icon fas fa-layer-group"></i>
                <p>
                    {{__('MY APPLICATION')}}
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">

                @can('view_user')
                <li class="nav-item">
                    <a href="{{route('admin.users.index')}}" class="nav-link" id="users">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{__('USER MANAGEMENT')}}</p>
                    </a>
                </li>
                @endcan

                @can('view_hrmis')
                <li class="nav-item">

                        <a href="http://hrmis.region6.dilg.gov.ph" target="_blank" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>{{__('HRMIS')}}
                            </p>


                        </a>

                </li>
                @endcan
                {{-- @can('view_pms') --}}
                <li class="nav-item">

                        <a href="https://pms.region6.dilg.gov.ph/" target="_blank" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>{{__('PMS')}}
                            </p>


                        </a>

                </li>
                {{-- @endcan --}}
                @can('view_fta')
                <li class="nav-item">
                    <a href="{{route('admin.ftas.index')}}" class="nav-link" id="ftas">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{__('FOREIGN TRAVEL AUTHORITY')}}
                        </p>
                    </a>
                </li>
                @endcan

                <li class="nav-item">
                    <a href="{{route('admin.property_issued.index')}}" class="nav-link" id="ftas">
                                          <i class="far fa-circle nav-icon"></i>
                                          <p>{{__('Property Management System')}}
                                          </p>
                                      </a>
                                      <ul class="nav nav-treeview">


                                          <li class="nav-item">
                                              <a href="{{route('admin.property_issued.index')}}" class="nav-link">
                                                  {{-- <i class="fas fa-edit fa-lg"></i> --}}
                                                  <i class="fas fa-edit fa-2x"></i>
                                                  <p>{{__('Property Issued Dashboard')}}
                                                  </p>
                                              </a>
                                          </li>

                                     <li class="nav-item">
                                      <a class="nav-link">
                                          <i class="fas fa-chart-line nav-icon"></i> <!-- Change the icon here -->
                                          <p>{{ __('Inventory Reports') }}</p>
                                      </a>
                                      <ul class="nav nav-treeview">
                                          <li class="nav-item">
                                              <a href="{{ route('admin.regsepi.index') }}" class="nav-link">
                                                  <i class="fas fa-file-alt nav-icon"></i> <!-- Change the icon here -->
                                                  <p>{{ __('Registry of Semi-Expendable Property Issued') }}</p>
                                              </a>
                                          </li>
                                      </ul>
                                      <ul class="nav nav-treeview">
                                          <li class="nav-item">
                                              <a href="{{ route('admin.property_issued.index') }}" class="nav-link">
                                                  <i class="fas fa-file-alt nav-icon"></i> <!-- Change the icon here -->
                                                  <p>{{ __('Semi-Expendable Property Card') }}</p>
                                              </a>
                                          </li>
                                      </ul>


                                  </li>

                                      </ul>
                                    </li>
                {{-- @can('CSS') --}}
                <li class="nav-item">
                    <a href="{{route('admin.citcha.index')}}" class="nav-link" id="ftas">
                                          <i class="far fa-circle nav-icon"></i>
                                          <p>{{__('DILG 6 Client Satisfaction Survey')}}
                                          </p>
                                      </a>
                                      <ul class="nav nav-treeview">


                                          <li class="nav-item">
                                              <a href="{{route('admin.citcha.index')}}" class="nav-link">
                                                  {{-- <i class="fas fa-edit fa-lg"></i> --}}
                                                  <i class="fas fa-edit fa-2x"></i>
                                                  <p>{{__('Client Satisfaction Survey')}}
                                                  </p>
                                              </a>
                                          </li>

                                     <li class="nav-item">
                                      <a class="nav-link">
                                          <i class="fas fa-chart-line nav-icon"></i> <!-- Change the icon here -->
                                          <p>{{ __('CSS REPORTS') }}</p>
                                      </a>
                                      <ul class="nav nav-treeview">
                                          <li class="nav-item">
                                              <a href="{{ route('admin.citcha_report.index') }}" class="nav-link">
                                                  <i class="fas fa-file-alt nav-icon"></i> <!-- Change the icon here -->
                                                  <p>{{ __('Consolidated CSR page 1') }}</p>
                                              </a>
                                          </li>
                                      </ul>
                                      <ul class="nav nav-treeview">
                                          <li class="nav-item">
                                              <a href="{{ route('admin.accounting.field') }}" class="nav-link">
                                                  <i class="fas fa-file-alt nav-icon"></i> <!-- Change the icon here -->
                                                  <p>{{ __('Consolidated CSR page 2') }}</p>
                                              </a>
                                          </li>
                                      </ul>
                                      <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{ route('admin.accounting.field') }}" class="nav-link">
                                                <i class="fas fa-file-alt nav-icon"></i> <!-- Change the icon here -->
                                                <p>{{ __('Consolidated CSR page 3') }}</p>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{ route('admin.accounting.field') }}" class="nav-link">
                                                <i class="fas fa-file-alt nav-icon"></i> <!-- Change the icon here -->
                                                <p>{{ __('Consolidated CSR page 4') }}</p>
                                            </a>
                                        </li>
                                    </ul>
                                  </li>

                                      </ul>
                                  </li>
                {{-- @endcan --}}

                <li class="nav-item">
                    {{-- <a href="{{route('admin.files.index')}}" class="nav-link" id="legalopinion">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{__('LEGAL OPINION')}}
                        </p>
                    </a> --}}
                    <a href="#" class="nav-link" id="legalopinion">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{__('LEGAL OPINION')}}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                         @can('view_legal_dash')
                        <li class="nav-item">
                            <a href="{{route('admin.files.index')}}" class="nav-link">
                                <i class="far fa-square nav-icon"></i>
                                <p>{{__('DASHBOARD')}}
                                </p>
                            </a>
                        </li>
                        @endcan
                        @can('view_legal')
                        <li class="nav-item">
                            <a href="{{route('admin.file_list')}}" class="nav-link">
                                <i class="far fa-square nav-icon"></i>
                                <p>{{__('INITIATE LEGAL')}}
                                </p>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>

                  {{-- @can('view_schedule') --}}
                  <li class="nav-item">
                    <a href="#" class="nav-link" id="schedule">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{__('SCHEDULE')}}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        {{-- @can('view_agenda') --}}
                        <li class="nav-item">
                            <a href="{{route('admin.schedules.index')}}" class="nav-link">
                                <i class="far fa-square nav-icon"></i>
                                <p>{{__('DASHBOARD')}}
                                </p>
                            </a>
                        </li>
                        {{-- @endcan --}}

                        {{-- @can('view_timetable') --}}
                        <li class="nav-item">
                            <a href="{{route('admin.schedule_list')}}" class="nav-link">
                                <i class="far fa-square nav-icon"></i>
                                <p>{{__('PLAN A SCHEDULE')}}
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">

                                <a href="{{route('admin.calendar_show')}}" class="nav-link">
                                <i class="far fa-square nav-icon"></i>
                                {{-- calendar_show --}}
                                <p>{{__('CALENDAR')}}
                                </p>
                            </a>
                        </li>

                    </ul>
                    </li>


                @can('view_orsheader','view_dvreceive')
                <li class="nav-item">
                    <a href="{{route('admin.orsheaders.index')}}" class="nav-link" id="orsheaders">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{__('FUND DISBURSEMENT MONITORING SYSTEM')}}
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        {{-- @can('view_agenda') --}}
                        <li class="nav-item">
                            <a href="{{route('admin.orsheader_list')}}" class="nav-link">
                                {{-- <i class="fas fa-edit fa-lg"></i> --}}
                                <i class="fas fa-edit fa-2x"></i>
                                <p>{{__('ORS ENCODING')}}
                                </p>
                            </a>
                        </li>
                        {{-- @endcan --}}

                        {{-- @can('view_timetable') --}}
                        <li class="nav-item">
                            <a href="{{route('admin.suballotments.index')}}" class="nav-link">
                                <i class="fas fa-edit fa-2x"></i>
                                <p>{{__('SUB-ALLOTMENT ENCODING')}}
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">

                                <a href="{{route('admin.allotments.index')}}" class="nav-link">
                                    <i class="fas fa-edit fa-2x"></i>
                                {{-- calendar_show --}}
                                <p>{{__('ALLOTMENT ENCODING')}}
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">

                            <a href="{{route('admin.dvreceivings.index')}}" class="nav-link">
                                <i class="fas fa-edit fa-2x"></i>
                            {{-- calendar_show --}}
                            <p>{{__('DV ENCODING')}}
                            </p>
                        </a>
                    </li>
                   {{-- @can('view_agenda') --}}
                   {{-- href="{{route('admin.accounting.index')}}"  --}}
                   <li class="nav-item">
                    <a class="nav-link">
                        <i class="fas fa-chart-line nav-icon"></i> <!-- Change the icon here -->
                        <p>{{ __('FDMS REPORTS') }}</p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.accounting.index') }}" class="nav-link">
                                <i class="fas fa-file-alt nav-icon"></i> <!-- Change the icon here -->
                                <p>{{ __('RO Report') }}</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.accounting.field') }}" class="nav-link">
                                <i class="fas fa-file-alt nav-icon"></i> <!-- Change the icon here -->
                                <p>{{ __('SARO Incurred of Field Report') }}</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.accounting.cash_register') }}" class="nav-link">
                                <i class="fas fa-file-alt nav-icon"></i> <!-- Change the icon here -->
                                <p>{{ __('Cash Register Report') }}</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- @endcan --}}
                    </ul>
                </li>
                @endcan

                {{-- @can('view_schedule','view_agenda','view_timetable','view_calendar')
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            {{__('SCHEDULE')}}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        @can('view_agenda')
                        <li class="nav-item">
                            <a href="{{route('admin.agendas.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('AGENDAS')}}
                                </p>
                            </a>
                        </li>
                        @endcan

                        @can('view_timetable')
                        <li class="nav-item">
                            <a href="{{route('admin.timetables.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('TIMETABLE')}}
                                </p>
                            </a>
                        </li>
                        @endcan

                        @can('view_calendar')
                        <li class="nav-item">
                            <a href="{{route('admin.divisions.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('CALENDAR')}}
                                </p>
                            </a>
                        </li>
                        @endcan

                    </ul>
                </li>
                @endcan --}}




            </ul>
        </li>
        @endcan
        @canany(['view_division','view_filecategory','view_role','view_empstatus','view_muncit','view_office','view_position','view_section','view_province'])
        <li class="nav-item has-treeview" id="maintenance">
            <a href="#" class="nav-link" id="maintenance_link">
                <i class="fa fa-cogs nav-icon"></i>
                <p>
                    {{__('MY MAINTENANCE')}}
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">


                @can('view_division')
                <li class="nav-item">
                    <a href="{{route('admin.divisions.index')}}" class="nav-link" id="divisions">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{__('DIVISIONS')}}
                        </p>
                    </a>
                </li>
                @endcan

                @can('view_position')
                <li class="nav-item">
                    <a href="{{route('admin.positions.index')}}" class="nav-link" id="positions">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{__('POSITIONS')}}
                        </p>
                    </a>
                </li>
                @endcan
                @can('view_office')
                <li class="nav-item">
                    <a href="{{route('admin.offices.index')}}" class="nav-link" id="offices">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{__('OFFICES')}}
                        </p>
                    </a>
                </li>
                @endcan
                @can('view_empstatus')
                <li class="nav-item">
                    <a href="{{route('admin.empstatuss.index')}}" class="nav-link" id="empstatuss">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{__('EMPLOYEE STATUS')}}
                        </p>
                    </a>
                </li>
                @endcan
                @can('view_muncit')
                <li class="nav-item">
                    <a href="{{route('admin.muncits.index')}}" class="nav-link" id="muncits">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{__('MUNICIPALITY')}}
                        </p>
                    </a>
                </li>
                @endcan
                @can('view_province')
                <li class="nav-item">
                    <a href="{{route('admin.provinces.index')}}" class="nav-link" id="provinces">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{__('PROVINCE')}}
                        </p>
                    </a>
                </li>
                @endcan
                @can('view_section')
                <li class="nav-item">
                    <a href="{{route('admin.sections.index')}}" class="nav-link" id="sections">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{__('SECTION')}}
                        </p>
                    </a>
                </li>
                @endcan

                @can('view_filecategory')
                <li class="nav-item">
                    <a href="{{route('admin.filecategories.index')}}" class="nav-link" id="filecategories">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{__('FILE CATEGORIES')}}
                        </p>
                    </a>
                </li>
                @endcan


            </ul>
        </li>
        @endcan

        @can('view_doctor')
        <li class="nav-item">
            <a href="{{route('admin.doctors.index')}}" class="nav-link" id="doctors">
                <i class="nav-icon fa fa-user-md"></i>
                <p>
                    {{__('Doctors')}}
                </p>
            </a>
        </li>
        @endcan

        @canany(['view_test_prices','view_culture_prices'])
        <li class="nav-item has-treeview" id="prices">
            <a href="#" class="nav-link" id="prices_link">
                <i class="nav-icon fas fa-list"></i>
                <p>
                    {{__('Price List')}}
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">

                @can('view_test_prices')
                <li class="nav-item">
                    <a href="{{route('admin.prices.tests')}}" class="nav-link" id="tests_prices">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{__('Tests')}}</p>
                    </a>
                </li>
                @endcan

                @can('view_culture_prices')
                <li class="nav-item">
                    <a href="{{route('admin.prices.cultures')}}" class="nav-link" id="cultures_prices">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{__('Cultures')}}</p>
                    </a>
                </li>
                @endcan

            </ul>
        </li>
        @endcan

        @can('view_contract')
        <li class="nav-item">
            <a href="{{route('admin.contracts.index')}}" class="nav-link" id="contracts">
                <i class="fas fa-file-contract nav-icon"></i>
                <p>{{__('Contracts')}}</p>
            </a>
        </li>
        @endcan

        @can('view_patient')
        <li class="nav-item">
            <a href="{{route('admin.patients.index')}}" class="nav-link" id="patients">
                <i class="nav-icon fas fa-user-injured"></i>
                <p>
                    {{__('Patients')}}
                </p>
            </a>
        </li>
        @endcan

        @can('view_visit')
        <li class="nav-item">
            <a href="{{route('admin.visits.index')}}" class="nav-link" id="visits">
                <i class="nav-icon fas fa-home"></i>
                <p>
                    {{__('Home Visits')}}
                </p>
            </a>
        </li>
        @endcan

        @can('view_group')
        <li class="nav-item">
            <a href="{{route('admin.groups.index')}}" class="nav-link" id="groups">
                <i class="nav-icon fas fa-layer-group"></i>
                <p>
                    {{__('Group Tests')}}
                </p>
            </a>
        </li>
        @endcan

        @can('view_report')
        <li class="nav-item">
            <a href="{{route('admin.reports.index')}}" class="nav-link" id="reports">
                <i class="nav-icon fas fa-flag"></i>
                <p>
                    {{__('Reports')}}
                </p>
            </a>
        </li>
        @endcan

        @can('view_chat')
        <li class="nav-item">
            <a href="{{route('admin.chat.index')}}" class="nav-link" id="chat">
                <i class="nav-icon far fa-comment-dots"></i>
                <p>
                    {{__('Chat')}}
                </p>
            </a>
        </li>
        @endcan

        {{-- @canany(['view_accounting_reports','view_expense','view_expense_category'])
        <li class="nav-item has-treeview" id="accounting">
            <a href="#" class="nav-link" id="accounting_link">
                <i class="nav-icon fas fa-calculator"></i>
                <p>
                    {{__('Accounting')}}
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">

                @can('view_expense_category')
                <li class="nav-item">
                    <a href="{{route('admin.expense_categories.index')}}" class="nav-link" id="expense_categories">
                        <i class="far fa-circle nav-icon"></i>
                        <p>
                            {{__('Expense Categories')}}
                        </p>
                    </a>
                </li>
                @endcan

                @can('view_expense')
                <li class="nav-item">
                    <a href="{{route('admin.expenses.index')}}" class="nav-link" id="expenses">
                        <i class="far fa-circle nav-icon"></i>
                        <p>
                            {{__('Expenses')}}
                        </p>
                    </a>
                </li>
                @endcan



            </ul>
        </li>
        @endcan --}}



        {{-- @canany(['view_user','view_role'])
        <li class="nav-item has-treeview" id="users_roles">
            <a href="#" class="nav-link" id="users_roles_link">
                <i class="nav-icon fas fa-user"></i>
                <p>
                    {{__('Roles And Users')}}
        <i class="right fas fa-angle-left"></i>
        </p>
        </a>
        <ul class="nav nav-treeview">

            @can('view_role')
            <li class="nav-item">
                <a href="{{route('admin.roles.index')}}" class="nav-link" id="roles">
                    <i class="far fa-circle nav-icon"></i>
                    <p>{{__('Roles')}}</p>
                </a>
            </li>
            @endcan

            @can('view_user')
            <li class="nav-item">
                <a href="{{route('admin.users.index')}}" class="nav-link" id="users">
                    <i class="far fa-circle nav-icon"></i>
                    <p>{{__('Users')}}</p>
                </a>
            </li>
            @endcan

        </ul>
        </li>
        @endcan --}}


        @canany(['view_role','view_module','view_permission'])
        <li class="nav-item has-treeview" id="authorization">
            <a href="#" class="nav-link" id="authorization_link">
                <i class="nav-icon fas fa-lock"></i>
                <p>
                    {{__('MY AUTHORIZATION')}}
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">

                @can('view_role')
                <li class="nav-item">
                    <a href="{{route('admin.roles.index')}}" class="nav-link" id="roles">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{__('ROLES')}}</p>
                    </a>
                </li>
                @endcan

                @can('view_module')
                <li class="nav-item">
                    <a href="{{route('admin.modules.index')}}" class="nav-link" id="modules">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{__('MODULES')}}</p>
                    </a>
                </li>
                @endcan
                @can('view_permission')
                <li class="nav-item">
                    <a href="{{route('admin.permissions.index')}}" class="nav-link" id="permissions">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{__('PERMISSIONS')}}</p>
                    </a>
                </li>
                @endcan


            </ul>
        </li>
        @endcan

        @can('view_setting')
        <li class="nav-item">
            <a href="{{route('admin.settings.index')}}" class="nav-link" id="settings">
                <i class="fa fa-cogs nav-icon"></i>
                <p>{{__('Settings')}}</p>
            </a>
        </li>
        @endcan

        @can('view_translation')
        <li class="nav-item">
            <a href="{{route('admin.translations.index')}}" class="nav-link" id="translations">
                <i class="fa fa-book nav-icon"></i>
                <p>{{__('Translations')}}</p>
            </a>
        </li>
        @endcan

        @can('view_activity_log')
        <li class="nav-item">
            <a href="{{route('admin.activity_logs.index')}}" class="nav-link" id="activity_logs">
                <i class="fa fa-server nav-icon"></i>
                <p>{{__('Activity Logs')}}</p>
            </a>
        </li>
        @endcan

        @can('view_backup')
        <li class="nav-item">
            <a href="{{route('admin.backups.index')}}" class="nav-link" id="backups">
                <i class="fa fa-database nav-icon"></i>
                <p>{{__('Database Backups')}}</p>
            </a>
        </li>
        @endcan
        {{-- <li class="nav-item">
            <a href="{{route('admin.logout')}}" class="nav-link" onclick="document.getElementById('sign_out').submit();">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>
                    {{__('LOGOUT')}}
                </p>
            </a>


        </li> --}}





        <li class="nav-item">
            <a href="#" class="nav-link"  role="button" onclick="document.getElementById('sign_out').submit();" >
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>
                    {{__('LOGOUT')}}
                </p>
            </a>
              <form id="sign_out" method="POST" action="{{route('admin.logout')}}">
                @csrf
              </form>
        </li>

 <li class="nav-item">
        <a href="#" class="nav-link" role="button" onclick="document.getElementById('sign_out').submit();">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>
                {{__('LOGOUT')}}
            </p>
        </a>
        <form id="sign_out" method="POST" action="{{route('admin.logout')}}">
            @csrf
        </form>
    </li>






    </ul>
</nav>
