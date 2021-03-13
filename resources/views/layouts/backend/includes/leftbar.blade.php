
<div class="leftbar">
    <!-- Start Sidebar -->
    <div class="sidebar">
        <!-- Start Logobar -->
        <div class="logobar">
            <a href="{{url('/template/panel-vertical/')}}" class="logo logo-large"><img src="{{ asset(get_static_option('website_logo')) }}" class="img-fluid" alt="logo"></a>
            <a href="{{url('/template/panel-vertical/')}}" class="logo logo-small"><img src="assets/panel/vertical/images/small_logo.svg" class="img-fluid" alt="logo"></a>
        </div>
        <!-- End Logobar -->
        <!-- Start Profilebar -->
        <div class="profilebar text-center">
            <img src="assets/panel/vertical/images/users/profile.svg" class="img-fluid" alt="profile">
            <div class="profilename">
              <h5 class="text-white">{{ auth()->user()->name }}</h5>
              <p>{{ auth()->user()->email }}</p>
            </div>
            <div class="userbox">
                <ul class="list-inline mb-0">
                    <li class="list-inline-item"><a href="{{ route('profile') }}" class="profile-icon"><img src="assets/panel/vertical/images/svg-icon/user.svg" class="img-fluid" alt="user"></a></li>
                    <li class="list-inline-item"><a href="#" class="profile-icon"><img src="assets/panel/vertical/images/svg-icon/email.svg" class="img-fluid" alt="email"></a></li>
                    <li class="list-inline-item logout-btn" onclick="logout()"><a href="javascript:0" class="profile-icon"><img src="assets/panel/vertical/images/svg-icon/logout.svg" class="img-fluid" alt="logout"></a></li>
                </ul>
              </div>
        </div>
        <!-- End Profilebar -->
        <!-- Start Navigationbar -->
        <div class="navigationbar" >
            <ul class="vertical-menu">
                <li class="vertical-header">Main</li>

                <li>
                    <a href="{{ route('dashboard') }}">
                      <img src="assets/panel/vertical/images/svg-icon/dashboard.svg" class="img-fluid" alt="dashboard"><span>Dashboard</span>
                    </a>
                </li>
                 {{--Contact--}}
                <li>
                    <a href="{{ route('userToAdminContactList') }}">
                      <img src="assets/panel/vertical/images/svg-icon/dashboard.svg" class="img-fluid" alt="dashboard"><span>Website contact</span><span class="badge badge-danger-inverse font-16">{{ website_contacts()->where('is_process_complete', false)->count() }}</span>
                    </a>
                </li>
                 {{--nonMaskingSmsOrder--}}
                <li>
                    <a href="{{ route('nonMaskingSmsOrder.index') }}">
                      <img src="assets/panel/vertical/images/svg-icon/dashboard.svg" class="img-fluid" alt="dashboard"><span>Non Masking SMS</span><span class="badge badge-danger-inverse font-16">{{ website_contacts()->where('is_process_complete', false)->count() }}</span>
                    </a>
                </li>
                 {{--maskingSmsOrder--}}
                <li>
                    <a href="{{ route('maskingSmsOrder.index') }}">
                      <img src="assets/panel/vertical/images/svg-icon/dashboard.svg" class="img-fluid" alt="dashboard"><span>Masking SMS</span><span class="badge badge-danger-inverse font-16">{{ website_contacts()->where('is_process_complete', false)->count() }}</span>
                    </a>
                </li>
                {{--Communication--}}
                <li>
                    <a href="javaScript:void();">
                        <img src="assets/panel/vertical/images/svg-icon/dashboard.svg" class="img-fluid" alt="dashboard"><span>Communication</span><i class="feather icon-chevron-right pull-right"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="{{ route('communication.getSmsSenderPage') }}"><i class="mdi mdi-circle"></i>SMS</a></li>
                        <li><a href="{{ route('communication.getEmailSenderPage') }}"><i class="mdi mdi-circle"></i>Email</a></li>
                    </ul>
                </li>
                {{--Sales--}}
                <li>
                    <a href="javaScript:void();">
                        <img src="assets/panel/vertical/images/svg-icon/dashboard.svg" class="img-fluid" alt="dashboard"><span>Sales</span><i class="feather icon-chevron-right pull-right"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="{{ route('sales.invoice.create') }}"><i class="mdi mdi-circle"></i>Create invoice</a></li>
                        <li><a href="{{ route('sales.invoice.index') }}"><i class="mdi mdi-circle"></i>Invoice  list</a></li>
                        <li><a href="{{ route('sales.payment.create') }}"><i class="mdi mdi-circle"></i>Create payment</a></li>
                        <li><a href="{{ route('sales.payment.index') }}"><i class="mdi mdi-circle"></i>Payment  list</a></li>
                        <li><a href="{{ route('sales.proposal.create') }}"><i class="mdi mdi-circle"></i>Create proposal</a></li>
                        <li><a href="{{ route('sales.proposal.index') }}"><i class="mdi mdi-circle"></i>Proposal  list</a></li>
                    </ul>
                </li>
                {{--Project--}}
                <li>
                    <a href="javaScript:void();">
                        <img src="assets/panel/vertical/images/svg-icon/dashboard.svg" class="img-fluid" alt="dashboard"><span>Project</span><i class="feather icon-chevron-right pull-right"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="{{ route('project.create') }}"><i class="mdi mdi-circle"></i>Create project</a></li>
                        <li><a href="{{ route('project.index') }}"><i class="mdi mdi-circle"></i>Project list</a></li>
                    </ul>
                </li>
                 {{--Company pad--}}
                 <li>
                    <a href="javaScript:void();">
                        <img src="assets/panel/vertical/images/svg-icon/dashboard.svg" class="img-fluid" alt="dashboard"><span>Company pad</span><i class="feather icon-chevron-right pull-right"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="{{ route('companyPad.create') }}"><i class="mdi mdi-circle"></i>Create Company pad</a></li>
                        <li><a href="{{ route('companyPad.index') }}"><i class="mdi mdi-circle"></i>Company pad  list</a></li>
                    </ul>
                </li>

                {{--Users--}}
                <li>
                    <a href="javaScript:void();">
                        <img src="assets/panel/vertical/images/svg-icon/dashboard.svg" class="img-fluid" alt="dashboard"><span>User</span><i class="feather icon-chevron-right pull-right"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="{{ route('user.create') }}"><i class="mdi mdi-circle"></i>Create User</a></li>
                        <li><a href="{{ route('user.index') }}"><i class="mdi mdi-circle"></i>User  list</a></li>
                    </ul>
                </li>


                 {{--Account--}}
                 <li>
                    <a href="javaScript:void();">
                        <img src="assets/panel/vertical/images/svg-icon/dashboard.svg" class="img-fluid" alt="dashboard"><span>Account</span><i class="feather icon-chevron-right pull-right"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="{{ route('account.expense.create') }}"><i class="mdi mdi-circle"></i>Expense Create</a></li>
                        <li><a href="{{ route('account.expense.index') }}"><i class="mdi mdi-circle"></i>Expense list</a></li>
                        <li><a href="{{ route('account.asset.create') }}"><i class="mdi mdi-circle"></i>Asset Create</a></li>
                        <li><a href="{{ route('account.asset.index') }}"><i class="mdi mdi-circle"></i>Asset list</a></li>
                    </ul>
                </li>
                {{--Visitor--}}
                <li>
                    <a href="javaScript:void();">
                        <img src="assets/panel/vertical/images/svg-icon/dashboard.svg" class="img-fluid" alt="dashboard"><span>Visitor</span><i class="feather icon-chevron-right pull-right"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="{{ route('visitorInfo.index') }}"><i class="mdi mdi-circle"></i>Visitor list</a></li>
                    </ul>
                    <ul class="vertical-submenu">
                        <li><a href="{{ route('visitor.today') }}"><i class="mdi mdi-circle"></i>Visitor today</a></li>
                    </ul>
                    <ul class="vertical-submenu">
                        <li><a href="{{ route('visitor.last_seven_day') }}"><i class="mdi mdi-circle"></i>Visitor last 7 day</a></li>
                    </ul>
                    <ul class="vertical-submenu">
                        <li><a href="{{ route('visitor.last_thirty_day') }}"><i class="mdi mdi-circle"></i>Visitor last 30 day</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javaScript:void();">
                        <img src="assets/panel/vertical/images/svg-icon/layouts.svg" class="img-fluid" alt="layouts"><span>Website</span><i class="feather icon-chevron-right pull-right"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li>
                            <a href="javaScript:void();">
                               <span>Banner</span><i class="feather icon-chevron-right pull-right"></i>
                            </a>
                            <ul class="vertical-submenu">
                                <li><a href="{{ route('website.websiteBanner.index') }}"><i class="mdi mdi-circle"></i>Banners</a></li>
                                <li><a href="{{ route('website.websiteBanner.create') }}"><i class="mdi mdi-circle"></i>Create</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javaScript:void();">
                               <span>Social link</span><i class="feather icon-chevron-right pull-right"></i>
                            </a>
                            <ul class="vertical-submenu">
                                <li><a href="{{ route('website.socialLink.index') }}"><i class="mdi mdi-circle"></i>Social links</a></li>
                                <li><a href="{{ route('website.socialLink.create') }}"><i class="mdi mdi-circle"></i>Create</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javaScript:void();">
                               <span>Seo</span><i class="feather icon-chevron-right pull-right"></i>
                            </a>
                            <ul class="vertical-submenu">
                                <li><a href="{{ route('website.websiteSeo.index') }}"><i class="mdi mdi-circle"></i>Seo list</a></li>
                                <li><a href="{{ route('website.websiteSeo.create') }}"><i class="mdi mdi-circle"></i>Create</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javaScript:void();">
                               <span>Website service</span><i class="feather icon-chevron-right pull-right"></i>
                            </a>
                            <ul class="vertical-submenu">
                                <li><a href="{{ route('website.websiteService.index') }}"><i class="mdi mdi-circle"></i>Service list</a></li>
                                <li><a href="{{ route('website.websiteService.create') }}"><i class="mdi mdi-circle"></i>Create</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javaScript:void();">
                                <span>Website pages</span><i class="feather icon-chevron-right pull-right"></i>
                            </a>
                            <ul class="vertical-submenu">
                                <li><a href="{{ route('website.customPage.create') }}"><i class="mdi mdi-circle"></i>Create new page</a></li>
                                @foreach(custom_pages() as $page)
                                <li><a href="{{ route('website.customPage.edit', $page) }}"><i class="mdi mdi-circle"></i>{{ $page->name }}</a></li>
                                @endforeach

                            </ul>
                        </li>
                        <li>
                            <a href="{{ route('website.websiteCounter') }}"><i class="mdi mdi-circle"></i>
                               <span>Website counter</span>
                            </a>
                        </li>
                        <li>
                            <a href="javaScript:void();">
                                <span>Website team</span><i class="feather icon-chevron-right pull-right"></i>
                            </a>
                            <ul class="vertical-submenu">
                                <li><a href="{{ route('website.websiteTeam.index') }}"><i class="mdi mdi-circle"></i>Team list</a></li>
                                <li><a href="{{ route('website.websiteTeam.create') }}"><i class="mdi mdi-circle"></i>Create</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javaScript:void();">
                                <span>Website product</span><i class="feather icon-chevron-right pull-right"></i>
                            </a>
                            <ul class="vertical-submenu">
                                <li><a href="{{ route('website.websiteProduct.index') }}"><i class="mdi mdi-circle"></i>Product list</a></li>
                                <li><a href="{{ route('website.websiteProduct.create') }}"><i class="mdi mdi-circle"></i>Create</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javaScript:void();">
                                <span>Website counter</span><i class="feather icon-chevron-right pull-right"></i>
                            </a>
                            <ul class="vertical-submenu">
                                <li><a href="{{ route('website.websiteCounter.index') }}"><i class="mdi mdi-circle"></i>Counter list</a></li>
                                <li><a href="{{ route('website.websiteCounter.create') }}"><i class="mdi mdi-circle"></i>Create</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javaScript:void();">
                                <span>Website client</span><i class="feather icon-chevron-right pull-right"></i>
                            </a>
                            <ul class="vertical-submenu">
                                <li><a href="{{ route('website.websiteClient.index') }}"><i class="mdi mdi-circle"></i>Client list</a></li>
                                <li><a href="{{ route('website.websiteClient.create') }}"><i class="mdi mdi-circle"></i>Create</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javaScript:void();">
                      <img src="assets/panel/vertical/images/svg-icon/apps.svg" class="img-fluid" alt="apps"><span>Leads</span><i class="feather icon-chevron-right pull-right"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li>
                            <a href="javaScript:void();"><i class="mdi mdi-circle"></i>Setting<i class="feather icon-chevron-right pull-right"></i></a>
                            <ul class="vertical-submenu">
                                <li><a href="{{ route('lead.leadCategory.index') }}"><i class="mdi mdi-circle"></i>Category</a></li>
                                <li><a href="{{ route('lead.leadService.index') }}"><i class="mdi mdi-circle"></i>Service</a></li>
                                <li><a href="{{ route('lead.leadDistrict.index') }}"><i class="mdi mdi-circle"></i>District</a></li>
                                <li><a href="{{ route('lead.leadThana.index') }}"><i class="mdi mdi-circle"></i>Thana</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javaScript:void();"><i class="mdi mdi-circle"></i>Leads<i class="feather icon-chevron-right pull-right"></i></a>
                            <ul class="vertical-submenu">
                                <li><a href="{{ route('lead.lead.index') }}"><i class="mdi mdi-circle"></i>All Leads</a></li>
                                @foreach(lead_categories() as $lead_category)
                                <li><a href="{{ route('lead.getByCategory', $lead_category->id) }}"><i class="mdi mdi-circle"></i>{{ $lead_category->name }} &nbsp; <span class="badge badge-success pull-right">{{ $lead_category->leads->count() }}</span></a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li>
                            <a href="javaScript:void();"><i class="mdi mdi-circle"></i>Campaign<i class="feather icon-chevron-right pull-right"></i></a>
                            <ul class="vertical-submenu">
                                <li><a href="{{ route('campaign.emailCampaign.index') }}"><i class="mdi mdi-circle"></i>Instant Email</a></li>
                                <li><a href="{{ route('campaign.emailCampaign.create') }}"><i class="mdi mdi-circle"></i>Create email</a></li>
                                <li><a href="{{ route('campaign.smsCampaign.index') }}"><i class="mdi mdi-circle"></i>Instant SMS</a></li>
                                <li><a href="{{ route('campaign.smsCampaign.index') }}"><i class="mdi mdi-circle"></i>Create SMS</a></li>
                            </ul>
                        </li>
                        <li><a href="#"><i class="mdi mdi-circle"></i>Kanban Board</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javaScript:void();">
                      <img src="assets/panel/vertical/images/svg-icon/apps.svg" class="img-fluid" alt="apps"><span>SETTING</span><i class="feather icon-chevron-right pull-right"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="{{ route('setting.getGeneralPage') }}"><i class="mdi mdi-circle"></i>General</a></li>
                        <li><a href="{{ route('setting.getContactSettingPage') }}"><i class="mdi mdi-circle"></i>Coontact page info</a></li>
                        <li><a href="{{ route('setting.getSmtpPage') }}"><i class="mdi mdi-circle"></i>SMTP</a></li>
                        <li><a href="{{ route('setting.getSmsPage') }}"><i class="mdi mdi-circle"></i>Sms</a></li>
                        <li><a href="#"><i class="mdi mdi-circle"></i>Identity</a></li>
                        <li><a href="#"><i class="mdi mdi-circle"></i>Seo</a></li>
                        <li><a href="#"><i class="mdi mdi-circle"></i>Permissions</a></li>
                    </ul>
                </li>
                <br>
                <br>
            </ul>
        </div>
        <!-- End Navigationbar -->
    </div>
    <!-- End Sidebar -->
</div>
