<div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <!-- [ navigation menu ] start -->
                    <nav class="pcoded-navbar">
                        <div class="nav-list">
                            <div class="pcoded-inner-navbar main-menu">
                                <div class="pcoded-navigation-label">Navigation</div>
                                <ul class="pcoded-item pcoded-left-item">
                            
                                    <li class=" @if((request()->is('admin'))) active @endif ">
                                        <a href="{{route('dashboard')}}" class="waves-effect waves-dark">
            								<span class="pcoded-micon"><i class="feather icon-home"></i></span>
                                            <span class="pcoded-mtext">Dashboard</span>
                                        </a>
                                    
                                    </li>
                                    <li class="pcoded-hasmenu @if((request()->is('admin/entities')) || (request()->is('admin/entity/create'))) active pcoded-trigger @endif">
                                        <a href="javascript:void(0)" class="waves-effect waves-dark">
        									<span class="pcoded-micon">
                                            <i class="fa fa-building"></i>
        									</span>
                                            <span class="pcoded-mtext">Entities</span>
                                           
                                        </a>
                                        <ul class="pcoded-submenu">
                                            <li class="{{(request()->is('admin/entities')) ? 'active' : '' }}">
                                                <a href="{{route('entityList')}}" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Entity List</span>
                                                </a>
                                            </li>
                                            <li class="{{ (request()->is('admin/entity/create')) ? 'active' : '' }}">
                                                <a href="{{route('entityCreate')}}" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Create Entity</span>
                                                </a>
                                            </li>
                                          
                                        </ul>
                                    </li>
                                    <li class="pcoded-hasmenu @if((request()->is('admin/companies')) || (request()->is('admin/company/create'))) active pcoded-trigger @endif">
                                        <a href="javascript:void(0)" class="waves-effect waves-dark">
        									<span class="pcoded-micon">
        										<i class="feather icon-layers"></i>
        									</span>
                                            <span class="pcoded-mtext">Companies</span>
                                           
                                        </a>
                                        <ul class="pcoded-submenu">
                                            <li class="{{(request()->is('admin/companies')) ? 'active' : '' }}">
                                                <a href="{{route('companies')}}" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Company List</span>
                                                </a>
                                            </li>
                                            <li class="{{ (request()->is('admin/company/create')) ? 'active' : '' }}">
                                                <a href="{{route('createCompany')}}" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Create Company</span>
                                                </a>
                                            </li>
                                          
                                        </ul>
                                    </li>
                                    <li class="pcoded-hasmenu @if((request()->is('admin/awards')) || (request()->is('admin/award/create'))) active pcoded-trigger @endif">
                                        <a href="javascript:void(0)" class="waves-effect waves-dark">
        									<span class="pcoded-micon">
        										<i class="feather icon-layers"></i>
        									</span>
                                            <span class="pcoded-mtext">Awards</span>
                                           
                                        </a>
                                        <ul class="pcoded-submenu">
                                            <li class="{{ (request()->is('admin/awards')) ? 'active' : '' }}">
                                                <a href="{{route('awards')}}" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Award List</span>
                                                </a>
                                            </li>
                                            <li class="{{ (request()->is('admin/award/create')) ? 'active' : '' }}">
                                                <a href="{{route('createAward')}}" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Create Award</span>
                                                </a>
                                            </li>
                                          
                                        </ul>
                                    </li>
                                </ul>
                               </li>
                                </ul>
                                
                            </div>
                        </div>
                    </nav>