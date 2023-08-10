<!doctype html>
<html lang="en">

<head>
    @include('chat.layout.head')
</head>

<body class="overflow-hidden">

    <div class="layout-wrapper d-lg-flex">

        <!-- Start left sidebar-menu -->
        <div class="side-menu flex-lg-column">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="{{ route('chat') }}" class="logo logo-dark">
                    <span class="logo-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24">
                            <path
                                d="M8.5,18l3.5,4l3.5-4H19c1.103,0,2-0.897,2-2V4c0-1.103-0.897-2-2-2H5C3.897,2,3,2.897,3,4v12c0,1.103,0.897,2,2,2H8.5z M7,7h10v2H7V7z M7,11h7v2H7V11z" />
                        </svg>
                    </span>
                </a>

                <a href="{{ route('chat') }}" class="logo logo-light">
                    <span class="logo-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24">
                            <path
                                d="M8.5,18l3.5,4l3.5-4H19c1.103,0,2-0.897,2-2V4c0-1.103-0.897-2-2-2H5C3.897,2,3,2.897,3,4v12c0,1.103,0.897,2,2,2H8.5z M7,7h10v2H7V7z M7,11h7v2H7V11z" />
                        </svg>
                    </span>
                </a>
            </div>
            <!-- end navbar-brand-box -->

            <!-- Start side-menu nav -->
            <div class="flex-lg-column my-0 sidemenu-navigation">
                <ul class="nav nav-pills side-menu-nav" role="tablist">
                    <li class="nav-item d-none d-lg-block" data-bs-toggle="tooltip" data-bs-placement="right"
                        data-bs-trigger="hover" data-bs-container=".sidemenu-navigation" title="Thông tin cá nhân">
                        <a class="nav-link active" id="pills-user-tab" data-bs-toggle="pill" href="#pills-user"
                            role="tab">
                            <i class='bx bx-user-circle'></i>
                        </a>
                    </li>
                    <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-trigger="hover"
                        data-bs-container=".sidemenu-navigation" title="Trờ chuyện">
                        <a class="nav-link" id="pills-chat-tab" data-bs-toggle="pill" href="#pills-chat" role="tab">
                            <i class='bx bx-conversation'></i>
                        </a>
                    </li>
                    <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-trigger="hover"
                        data-bs-container=".sidemenu-navigation" title="Liên lạc">
                        <a class="nav-link" id="pills-contacts-tab" data-bs-toggle="pill" href="#pills-contacts"
                            role="tab">
                            <i class='bx bxs-user-detail'></i>
                        </a>
                    </li>
                    <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-trigger="hover"
                        data-bs-container=".sidemenu-navigation" title="Calls">
                        <a class="nav-link" id="pills-calls-tab" data-bs-toggle="pill" href="#pills-calls"
                            role="tab">
                            <i class='bx bx-phone-call'></i>
                        </a>
                    </li>
                    <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-trigger="hover"
                        data-bs-container=".sidemenu-navigation" title="Bookmark">
                        <a class="nav-link" id="pills-bookmark-tab" data-bs-toggle="pill" href="#pills-bookmark"
                            role="tab">
                            <i class='bx bx-bookmarks'></i>
                        </a>
                    </li>
                    <li class="nav-item d-none d-lg-block" data-bs-toggle="tooltip" data-bs-placement="right"
                        data-bs-container=".sidemenu-navigation" data-bs-trigger="hover" title="Settings">
                        <a class="nav-link" id="pills-setting-tab" data-bs-toggle="pill" href="#pills-setting"
                            role="tab">
                            <i class='bx bx-cog'></i>
                        </a>
                    </li>
                    <li class="nav-item mt-auto">
                        <a class="nav-link light-dark" href="#" data-bs-toggle="tooltip" data-bs-trigger="hover"
                            data-bs-placement="right" data-bs-container=".sidemenu-navigation" data-bs-html="true"
                            title="<span class='light-mode'>Light</span> <span class='dark-mode'>Dark</span> Mode">
                            <i class='bx bx-moon'></i>
                        </a>
                    </li>
                    <li class="nav-item dropdown profile-user-dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <img src="assets/images/users/avatar-1.jpg" alt=""
                                class="profile-user rounded-circle">
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item d-flex align-items-center justify-content-between"
                                id="pills-user-tab" data-bs-toggle="pill" href="#pills-user" role="tab">Profile
                                <i class="bx bx-user-circle text-muted ms-1"></i></a>
                            <a class="dropdown-item d-flex align-items-center justify-content-between"
                                id="pills-setting-tab" data-bs-toggle="pill" href="#pills-setting"
                                role="tab">Setting <i class="bx bx-cog text-muted ms-1"></i></a>
                            <a class="dropdown-item d-flex align-items-center justify-content-between"
                                href="auth-changepassword.html">Change Password <i
                                    class="bx bx-lock-open text-muted ms-1"></i></a>
                            <div class="dropdown-divider"></div>
                            <form action="{{ route('logout.post') }}" method="POST">
                                @csrf
                                <button class="dropdown-item d-flex align-items-center justify-content-between"
                                    type="submit">Đăng xuất <i
                                        class="bx bx-log-out-circle text-muted ms-1"></i></button>
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
            <!-- end side-menu nav -->
        </div>
        <!-- end left sidebar-menu -->

        <!-- start chat-leftsidebar -->
        <div class="chat-leftsidebar">

            <div class="tab-content">
                <!-- Start Profile tab-pane -->
                @include('chat.profile')
                <!-- End Profile tab-pane -->

                <!-- Start chats tab-pane -->
                @include('chat.chat')
                <!-- End chats tab-pane -->

                <!-- Start contacts tab-pane -->
                @include('chat.contact')
                <!-- End contacts tab-pane -->

                <!-- Start calls tab-pane -->
                <div class="tab-pane" id="pills-calls" role="tabpanel" aria-labelledby="pills-calls-tab">
                    <!-- Start Contact content -->
                    <div>
                        <div class="px-4 pt-4">
                            <div class="d-flex align-items-start">
                                <div class="flex-grow-1">
                                    <h4 class="mb-3">Calls</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end p-4 -->

                        <!-- Start contact lists -->
                        <div class="chat-message-list chat-call-list" data-simplebar>
                            <ul class="list-unstyled chat-list" id="callList">

                            </ul>
                        </div>
                        <!-- end contact lists -->
                    </div>
                    <!-- Start Contact content -->
                </div>
                <!-- End calls tab-pane -->

                <!-- Start bookmark tab-pane -->
                <div class="tab-pane" id="pills-bookmark" role="tabpanel" aria-labelledby="pills-bookmark-tab">
                    <!-- Start Contact content -->
                    <div>
                        <div class="px-4 pt-4">
                            <div class="d-flex align-items-start">
                                <div class="flex-grow-1">
                                    <h4 class="mb-3">Bookmark</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end p-4 -->

                        <!-- Start contact lists -->
                        <div class="chat-message-list chat-bookmark-list" data-simplebar>
                            <ul class="list-unstyled chat-list">
                                <li>
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0 avatar-xs ms-1 me-3">
                                            <div class="avatar-title bg-soft-primary text-primary rounded-circle">
                                                <i class="bx bx-file"></i>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 overflow-hidden">
                                            <h5 class="font-size-14 mb-1"><a href="#"
                                                    class="text-truncate p-0">design-phase-1-approved.pdf</a></h5>
                                            <p class="text-muted text-truncate font-size-13 mb-0">12.5 MB</p>
                                        </div>

                                        <div class="flex-shrink-0 ms-3">
                                            <div class="dropdown">
                                                <a class="dropdown-toggle font-size-16 text-muted px-1" href="#"
                                                    role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <i class="bx bx-dots-horizontal-rounded"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item d-flex align-items-center justify-content-between"
                                                        href="#">Open <i
                                                            class="bx bx-folder-open ms-2 text-muted"></i></a>
                                                    <a class="dropdown-item d-flex align-items-center justify-content-between"
                                                        href="#">Edit <i
                                                            class="bx bx-pencil ms-2 text-muted"></i></a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item d-flex align-items-center justify-content-between"
                                                        href="#">Delete <i
                                                            class="bx bx-trash ms-2 text-muted"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0 avatar-xs ms-1 me-3">
                                            <div class="avatar-title bg-soft-primary text-primary rounded-circle">
                                                <i class="bx bx-pin"></i>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 overflow-hidden">
                                            <h5 class="font-size-14 mb-1"><a href="#"
                                                    class="text-truncate p-0">Bg Pattern</a></h5>
                                            <p class="text-muted text-truncate font-size-13 mb-0">
                                                https://bgpattern.com/</p>
                                        </div>

                                        <div class="flex-shrink-0 ms-3">
                                            <div class="dropdown">
                                                <a class="dropdown-toggle font-size-18 text-muted px-1" href="#"
                                                    role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <i class="bx bx-dots-horizontal-rounded"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item d-flex align-items-center justify-content-between"
                                                        href="#">Open <i
                                                            class="bx bx-folder-open ms-2 text-muted"></i></a>
                                                    <a class="dropdown-item d-flex align-items-center justify-content-between"
                                                        href="#">Edit <i
                                                            class="bx bx-pencil ms-2 text-muted"></i></a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item d-flex align-items-center justify-content-between"
                                                        href="#">Delete <i
                                                            class="bx bx-trash ms-2 text-muted"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0 avatar-xs ms-1 me-3">
                                            <div class="avatar-title bg-soft-primary text-primary rounded-circle">
                                                <i class="bx bx-image"></i>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 overflow-hidden">
                                            <h5 class="font-size-14 mb-1"><a href="#"
                                                    class="text-truncate p-0">Image-001.jpg</a></h5>
                                            <p class="text-muted text-truncate font-size-13 mb-0">4.2 MB</p>
                                        </div>

                                        <div class="flex-shrink-0 ms-3">
                                            <div class="dropdown">
                                                <a class="dropdown-toggle font-size-16 text-muted px-1" href="#"
                                                    role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <i class="bx bx-dots-horizontal-rounded"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item d-flex align-items-center justify-content-between"
                                                        href="#">Open <i
                                                            class="bx bx-folder-open ms-2 text-muted"></i></a>
                                                    <a class="dropdown-item d-flex align-items-center justify-content-between"
                                                        href="#">Edit <i
                                                            class="bx bx-pencil ms-2 text-muted"></i></a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item d-flex align-items-center justify-content-between"
                                                        href="#">Delete <i
                                                            class="bx bx-trash ms-2 text-muted"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0 avatar-xs ms-1 me-3">
                                            <div class="avatar-title bg-soft-primary text-primary rounded-circle">
                                                <i class="bx bx-pin"></i>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 overflow-hidden">
                                            <h5 class="font-size-14 mb-1"><a href="#"
                                                    class="text-truncate p-0">Images</a></h5>
                                            <p class="text-muted text-truncate font-size-13 mb-0">
                                                https://images123.com/</p>
                                        </div>

                                        <div class="flex-shrink-0 ms-3">
                                            <div class="dropdown">
                                                <a class="dropdown-toggle font-size-18 text-muted px-1" href="#"
                                                    role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <i class="bx bx-dots-horizontal-rounded"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item d-flex align-items-center justify-content-between"
                                                        href="#">Open <i
                                                            class="bx bx-folder-open ms-2 text-muted"></i></a>
                                                    <a class="dropdown-item d-flex align-items-center justify-content-between"
                                                        href="#">Edit <i
                                                            class="bx bx-pencil ms-2 text-muted"></i></a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item d-flex align-items-center justify-content-between"
                                                        href="#">Delete <i
                                                            class="bx bx-trash ms-2 text-muted"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0 avatar-xs ms-1 me-3">
                                            <div class="avatar-title bg-soft-primary text-primary rounded-circle">
                                                <i class="bx bx-pin"></i>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 overflow-hidden">
                                            <h5 class="font-size-14 mb-1"><a href="#"
                                                    class="text-truncate p-0">Bg Gradient</a></h5>
                                            <p class="text-muted text-truncate font-size-13 mb-0">
                                                https://bggradient.com/</p>
                                        </div>

                                        <div class="flex-shrink-0 ms-3">
                                            <div class="dropdown">
                                                <a class="dropdown-toggle font-size-18 text-muted px-1" href="#"
                                                    role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <i class="bx bx-dots-horizontal-rounded"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item d-flex align-items-center justify-content-between"
                                                        href="#">Open <i
                                                            class="bx bx-folder-open ms-2 text-muted"></i></a>
                                                    <a class="dropdown-item d-flex align-items-center justify-content-between"
                                                        href="#">Edit <i
                                                            class="bx bx-pencil ms-2 text-muted"></i></a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item d-flex align-items-center justify-content-between"
                                                        href="#">Delete <i
                                                            class="bx bx-trash ms-2 text-muted"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0 avatar-xs ms-1 me-3">
                                            <div class="avatar-title bg-soft-primary text-primary rounded-circle">
                                                <i class="bx bx-image"></i>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 overflow-hidden">
                                            <h5 class="font-size-14 mb-1"><a href="#"
                                                    class="text-truncate p-0">Image-012.jpg</a></h5>
                                            <p class="text-muted text-truncate font-size-13 mb-0">3.1 MB</p>
                                        </div>

                                        <div class="flex-shrink-0 ms-3">
                                            <div class="dropdown">
                                                <a class="dropdown-toggle font-size-16 text-muted px-1" href="#"
                                                    role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <i class="bx bx-dots-horizontal-rounded"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item d-flex align-items-center justify-content-between"
                                                        href="#">Open <i
                                                            class="bx bx-folder-open ms-2 text-muted"></i></a>
                                                    <a class="dropdown-item d-flex align-items-center justify-content-between"
                                                        href="#">Edit <i
                                                            class="bx bx-pencil ms-2 text-muted"></i></a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item d-flex align-items-center justify-content-between"
                                                        href="#">Delete <i
                                                            class="bx bx-trash ms-2 text-muted"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0 avatar-xs ms-1 me-3">
                                            <div class="avatar-title bg-soft-primary text-primary rounded-circle">
                                                <i class="bx bx-file"></i>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 overflow-hidden">
                                            <h5 class="font-size-14 mb-1"><a href="#"
                                                    class="text-truncate p-0">analytics dashboard.zip</a></h5>
                                            <p class="text-muted text-truncate font-size-13 mb-0">6.7 MB</p>
                                        </div>

                                        <div class="flex-shrink-0 ms-3">
                                            <div class="dropdown">
                                                <a class="dropdown-toggle font-size-16 text-muted px-1" href="#"
                                                    role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <i class="bx bx-dots-horizontal-rounded"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item d-flex align-items-center justify-content-between"
                                                        href="#">Open <i
                                                            class="bx bx-folder-open ms-2 text-muted"></i></a>
                                                    <a class="dropdown-item d-flex align-items-center justify-content-between"
                                                        href="#">Edit <i
                                                            class="bx bx-pencil ms-2 text-muted"></i></a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item d-flex align-items-center justify-content-between"
                                                        href="#">Delete <i
                                                            class="bx bx-trash ms-2 text-muted"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0 avatar-xs ms-1 me-3">
                                            <div class="avatar-title bg-soft-primary text-primary rounded-circle">
                                                <i class="bx bx-image"></i>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 overflow-hidden">
                                            <h5 class="font-size-14 mb-1"><a href="#"
                                                    class="text-truncate p-0">Image-031.jpg</a></h5>
                                            <p class="text-muted text-truncate font-size-13 mb-0">4.2 MB</p>
                                        </div>

                                        <div class="flex-shrink-0 ms-3">
                                            <div class="dropdown">
                                                <a class="dropdown-toggle font-size-16 text-muted px-1" href="#"
                                                    role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <i class="bx bx-dots-horizontal-rounded"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item d-flex align-items-center justify-content-between"
                                                        href="#">Open <i
                                                            class="bx bx-folder-open ms-2 text-muted"></i></a>
                                                    <a class="dropdown-item d-flex align-items-center justify-content-between"
                                                        href="#">Edit <i
                                                            class="bx bx-pencil ms-2 text-muted"></i></a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item d-flex align-items-center justify-content-between"
                                                        href="#">Delete <i
                                                            class="bx bx-trash ms-2 text-muted"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0 avatar-xs ms-1 me-3">
                                            <div class="avatar-title bg-soft-primary text-primary rounded-circle">
                                                <i class="bx bx-file"></i>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 overflow-hidden">
                                            <h5 class="font-size-14 mb-1"><a href="#"
                                                    class="text-truncate p-0">Changelog.txt</a></h5>
                                            <p class="text-muted text-truncate font-size-13 mb-0">6.7 MB</p>
                                        </div>

                                        <div class="flex-shrink-0 ms-3">
                                            <div class="dropdown">
                                                <a class="dropdown-toggle font-size-16 text-muted px-1" href="#"
                                                    role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <i class="bx bx-dots-horizontal-rounded"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item d-flex align-items-center justify-content-between"
                                                        href="#">Open <i
                                                            class="bx bx-folder-open ms-2 text-muted"></i></a>
                                                    <a class="dropdown-item d-flex align-items-center justify-content-between"
                                                        href="#">Edit <i
                                                            class="bx bx-pencil ms-2 text-muted"></i></a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item d-flex align-items-center justify-content-between"
                                                        href="#">Delete <i
                                                            class="bx bx-trash ms-2 text-muted"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0 avatar-xs ms-1 me-3">
                                            <div class="avatar-title bg-soft-primary text-primary rounded-circle">
                                                <i class="bx bx-file"></i>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 overflow-hidden">
                                            <h5 class="font-size-14 mb-1"><a href="#"
                                                    class="text-truncate p-0">Widgets.zip</a></h5>
                                            <p class="text-muted text-truncate font-size-13 mb-0">6.7 MB</p>
                                        </div>

                                        <div class="flex-shrink-0 ms-3">
                                            <div class="dropdown">
                                                <a class="dropdown-toggle font-size-16 text-muted px-1" href="#"
                                                    role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <i class="bx bx-dots-horizontal-rounded"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item d-flex align-items-center justify-content-between"
                                                        href="#">Open <i
                                                            class="bx bx-folder-open ms-2 text-muted"></i></a>
                                                    <a class="dropdown-item d-flex align-items-center justify-content-between"
                                                        href="#">Edit <i
                                                            class="bx bx-pencil ms-2 text-muted"></i></a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item d-flex align-items-center justify-content-between"
                                                        href="#">Delete <i
                                                            class="bx bx-trash ms-2 text-muted"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0 avatar-xs ms-1 me-3">
                                            <div class="avatar-title bg-soft-primary text-primary rounded-circle">
                                                <i class="bx bx-image"></i>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 overflow-hidden">
                                            <h5 class="font-size-14 mb-1"><a href="#"
                                                    class="text-truncate p-0">logo-light.png</a></h5>
                                            <p class="text-muted text-truncate font-size-13 mb-0">4.2 MB</p>
                                        </div>

                                        <div class="flex-shrink-0 ms-3">
                                            <div class="dropdown">
                                                <a class="dropdown-toggle font-size-16 text-muted px-1" href="#"
                                                    role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <i class="bx bx-dots-horizontal-rounded"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item d-flex align-items-center justify-content-between"
                                                        href="#">Open <i
                                                            class="bx bx-folder-open ms-2 text-muted"></i></a>
                                                    <a class="dropdown-item d-flex align-items-center justify-content-between"
                                                        href="#">Edit <i
                                                            class="bx bx-pencil ms-2 text-muted"></i></a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item d-flex align-items-center justify-content-between"
                                                        href="#">Delete <i
                                                            class="bx bx-trash ms-2 text-muted"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0 avatar-xs ms-1 me-3">
                                            <div class="avatar-title bg-soft-primary text-primary rounded-circle">
                                                <i class="bx bx-image"></i>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 overflow-hidden">
                                            <h5 class="font-size-14 mb-1"><a href="#"
                                                    class="text-truncate p-0">Image-2.jpg</a></h5>
                                            <p class="text-muted text-truncate font-size-13 mb-0">3.1 MB</p>
                                        </div>

                                        <div class="flex-shrink-0 ms-3">
                                            <div class="dropdown">
                                                <a class="dropdown-toggle font-size-16 text-muted px-1" href="#"
                                                    role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <i class="bx bx-dots-horizontal-rounded"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item d-flex align-items-center justify-content-between"
                                                        href="#">Open <i
                                                            class="bx bx-folder-open ms-2 text-muted"></i></a>
                                                    <a class="dropdown-item d-flex align-items-center justify-content-between"
                                                        href="#">Edit <i
                                                            class="bx bx-pencil ms-2 text-muted"></i></a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item d-flex align-items-center justify-content-between"
                                                        href="#">Delete <i
                                                            class="bx bx-trash ms-2 text-muted"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0 avatar-xs ms-1 me-3">
                                            <div class="avatar-title bg-soft-primary text-primary rounded-circle">
                                                <i class="bx bx-file"></i>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 overflow-hidden">
                                            <h5 class="font-size-14 mb-1"><a href="#"
                                                    class="text-truncate p-0">Landing-A.zip</a></h5>
                                            <p class="text-muted text-truncate font-size-13 mb-0">6.7 MB</p>
                                        </div>

                                        <div class="flex-shrink-0 ms-3">
                                            <div class="dropdown">
                                                <a class="dropdown-toggle font-size-16 text-muted px-1" href="#"
                                                    role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <i class="bx bx-dots-horizontal-rounded"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item d-flex align-items-center justify-content-between"
                                                        href="#">Open <i
                                                            class="bx bx-folder-open ms-2 text-muted"></i></a>
                                                    <a class="dropdown-item d-flex align-items-center justify-content-between"
                                                        href="#">Edit <i
                                                            class="bx bx-pencil ms-2 text-muted"></i></a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item d-flex align-items-center justify-content-between"
                                                        href="#">Delete <i
                                                            class="bx bx-trash ms-2 text-muted"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                            </ul>
                        </div>
                        <!-- end contact lists -->
                    </div>
                    <!-- Start Contact content -->
                </div>
                <!-- End bookmark tab-pane -->

                <!-- Start settings tab-pane -->
                <div class="tab-pane" id="pills-setting" role="tabpanel" aria-labelledby="pills-setting-tab">
                    <!-- Start Settings content -->
                    <div>
                        <div class="user-profile-img">
                            <img src="assets/images/small/img-4.jpg" class="profile-img profile-foreground-img"
                                style="height: 160px;" alt="">
                            <div class="overlay-content">
                                <div>
                                    <div class="user-chat-nav p-3">

                                        <div class="d-flex w-100 align-items-center">
                                            <div class="flex-grow-1">
                                                <h5 class="text-white mb-0">Settings</h5>
                                            </div>
                                            <div class="flex-shrink-0">
                                                <div class="avatar-xs p-0 rounded-circle profile-photo-edit"
                                                    data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                    data-bs-placement="bottom" title="Change Background">
                                                    <input id="profile-foreground-img-file-input" type="file"
                                                        class="profile-foreground-img-file-input">
                                                    <label for="profile-foreground-img-file-input"
                                                        class="profile-photo-edit avatar-xs">
                                                        <span class="avatar-title rounded-circle bg-light text-body">
                                                            <i class="bx bxs-pencil"></i>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="text-center p-3 p-lg-4 border-bottom pt-2 pt-lg-2 mt-n5 position-relative">
                            <div class="mb-3 profile-user">
                                <img src="assets/images/users/avatar-1.jpg"
                                    class="rounded-circle avatar-lg img-thumbnail user-profile-image"
                                    alt="user-profile-image">
                                <div class="avatar-xs p-0 rounded-circle profile-photo-edit">
                                    <input id="profile-img-file-input" type="file" class="profile-img-file-input">
                                    <label for="profile-img-file-input" class="profile-photo-edit avatar-xs">
                                        <span class="avatar-title rounded-circle bg-light text-body">
                                            <i class="bx bxs-camera"></i>
                                        </span>
                                    </label>
                                </div>
                            </div>

                            <h5 class="font-size-16 mb-1 text-truncate"></h5>

                            <div class="dropdown d-inline-block">
                                <a class="text-muted dropdown-toggle d-block" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="bx bxs-circle text-success font-size-10 align-middle"></i> Active <i
                                        class="mdi mdi-chevron-down"></i>
                                </a>

                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#"><i
                                            class="bx bxs-circle text-success font-size-10 me-1 align-middle"></i>
                                        Active</a>
                                    <a class="dropdown-item" href="#"><i
                                            class="bx bxs-circle text-warning font-size-10 me-1 align-middle"></i>
                                        Away</a>
                                    <a class="dropdown-item" href="#"><i
                                            class="bx bxs-circle text-danger font-size-10 me-1 align-middle"></i> Do
                                        not disturb</a>
                                </div>
                            </div>


                        </div>
                        <!-- End profile user -->

                        <!-- Start User profile description -->
                        @include('chat.setting')
                        <!-- End User profile description -->
                    </div>
                    <!-- Start Settings content -->
                </div>
                <!-- End settings tab-pane -->
            </div>
            <!-- end tab content -->
        </div>
        <!-- end chat-leftsidebar -->

        <!-- Start User chat -->
        <div id="user-chat" class="user-chat w-100 overflow-hidden" style="display: none;">
            <div class="user-chat-overlay"></div>

            <div class="chat-content d-lg-flex">
                <!-- start chat conversation section -->
                <div class="w-100 overflow-hidden position-relative">
                    <!-- conversation user -->
                    <div id="users-chat" class="position-relative">
                        <div class="p-3 p-lg-4 user-chat-topbar">
                            <div class="row align-items-center">
                                <div class="col-sm-4 col-8">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0 d-block d-lg-none me-3">
                                            <a href="javascript: void(0);"
                                                class="user-chat-remove font-size-18 p-1"><i
                                                    class="bx bx-chevron-left align-middle"></i></a>
                                        </div>
                                        <div class="flex-grow-1 overflow-hidden">
                                            <div class="d-flex align-items-center">
                                                <div
                                                    class="flex-shrink-0 chat-user-img online user-own-img align-self-center me-3 ms-0">
                                                    <img src="assets/images/users/avatar-2.jpg"
                                                        class="rounded-circle avatar-sm avatar-user" alt="">
                                                    <span class="user-status"></span>
                                                </div>
                                                <div class="flex-grow-1 overflow-hidden">
                                                    <h6 class="text-truncate mb-0 font-size-18"><a href="#"
                                                            class="username-user user-profile-show text-reset">Bella
                                                            Cote</a></h6>
                                                    <p id="id-user-current" data-user-id-current="0"
                                                        data-user-id-status=""
                                                        class="text-truncate text-muted mb-0 user-id-current">
                                                        <small id="status-online-current">Online</small>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-8 col-4">
                                    <ul class="list-inline user-chat-nav text-end mb-0">
                                        <li class="list-inline-item">
                                            <div class="dropdown">
                                                <button class="btn nav-btn dropdown-toggle" type="button"
                                                    data-bs-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <i class='bx bx-search'></i>
                                                </button>
                                                <div class="dropdown-menu p-0 dropdown-menu-end dropdown-menu-lg">
                                                    <div class="search-box p-2">
                                                        <input type="text" class="form-control"
                                                            placeholder="Search.." id="searchChatMessage">
                                                    </div>
                                                </div>
                                            </div>
                                        </li>

                                        <li class="list-inline-item d-none d-lg-inline-block me-2 ms-0">
                                            <button type="button" class="btn nav-btn" data-bs-toggle="modal"
                                                data-bs-target=".audiocallModal">
                                                <i class='bx bxs-phone-call'></i>
                                            </button>
                                        </li>

                                        <li class="list-inline-item d-none d-lg-inline-block me-2 ms-0">
                                            <button type="button" class="btn nav-btn" data-bs-toggle="modal"
                                                data-bs-target=".videocallModal">
                                                <i class='bx bx-video'></i>
                                            </button>
                                        </li>

                                        <li class="list-inline-item d-none d-lg-inline-block me-2 ms-0">
                                            <button type="button" class="btn nav-btn user-profile-show">
                                                <i class='bx bxs-info-circle'></i>
                                            </button>
                                        </li>

                                        <li class="list-inline-item">
                                            <div class="dropdown">
                                                <button class="btn nav-btn dropdown-toggle" type="button"
                                                    data-bs-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <i class='bx bx-dots-vertical-rounded'></i>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item d-flex justify-content-between align-items-center d-lg-none user-profile-show"
                                                        href="#">View Profile <i
                                                            class="bx bx-user text-muted"></i></a>
                                                    <a class="dropdown-item d-flex justify-content-between align-items-center d-lg-none"
                                                        href="#" data-bs-toggle="modal"
                                                        data-bs-target=".audiocallModal">Audio <i
                                                            class="bx bxs-phone-call text-muted"></i></a>
                                                    <a class="dropdown-item d-flex justify-content-between align-items-center d-lg-none"
                                                        href="#" data-bs-toggle="modal"
                                                        data-bs-target=".videocallModal">Video <i
                                                            class="bx bx-video text-muted"></i></a>
                                                    <a class="dropdown-item d-flex justify-content-between align-items-center"
                                                        href="#">Archive <i
                                                            class="bx bx-archive text-muted"></i></a>
                                                    <a class="dropdown-item d-flex justify-content-between align-items-center"
                                                        href="#">Muted <i
                                                            class="bx bx-microphone-off text-muted"></i></a>
                                                    <a class="dropdown-item d-flex justify-content-between align-items-center"
                                                        href="#">Delete <i
                                                            class="bx bx-trash text-muted"></i></a>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="alert alert-warning alert-dismissible topbar-bookmark fade show p-1 px-3 px-lg-4 pe-lg-5 pe-5"
                                role="alert">
                                <div class="d-flex align-items-start bookmark-tabs">
                                    <div class="tab-list-link">
                                        <a href="#" class="tab-links" data-bs-toggle="modal"
                                            data-bs-target=".pinnedtabModal"><i
                                                class="ri-pushpin-fill align-middle me-1"></i> 10 Pinned</a>
                                    </div>
                                    <div>
                                        <a href="#" class="tab-links border-0 px-3" data-bs-toggle="tooltip"
                                            data-bs-trigger="hover" data-bs-placement="bottom"
                                            title="Add Bookmark"><i class="ri-add-fill align-middle"></i></a>
                                    </div>
                                </div>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>

                        </div>
                        <!-- end chat user head -->

                        <!-- start chat conversation -->

                        <div class="chat-conversation p-3 p-lg-4 " id="chat-conversation" data-simplebar>
                            <ul class="list-unstyled chat-conversation-list" id="users-conversation-1">
                                <!-- messages here -->
                            </ul>
                        </div>

                        <div class="alert alert-warning alert-dismissible copyclipboard-alert px-4 fade show "
                            id="copyClipBoard" role="alert">
                            message copied
                        </div>


                        <!-- end chat conversation end -->
                    </div>

                    <!-- conversation group -->
                    <div id="channel-chat" class="position-relative">
                        <div class="p-3 p-lg-4 user-chat-topbar">
                            <div class="row align-items-center">
                                <div class="col-sm-4 col-8">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0 d-block d-lg-none me-3">
                                            <a href="javascript: void(0);"
                                                class="user-chat-remove font-size-18 p-1"><i
                                                    class="bx bx-chevron-left align-middle"></i></a>
                                        </div>
                                        <div class="flex-grow-1 overflow-hidden">
                                            <div class="d-flex align-items-center">
                                                <div
                                                    class="flex-shrink-0 chat-user-img online user-own-img align-self-center me-3">
                                                    <img src="assets/images/users/user-dummy-img.jpg"
                                                        class="rounded-circle avatar-sm" alt="">
                                                </div>
                                                <div class="flex-grow-1 overflow-hidden">
                                                    <h6 class="text-truncate mb-0 font-size-18"><a href="#"
                                                            class="user-profile-show text-reset">Design Phase 2</a>
                                                    </h6>
                                                    <p class="text-truncate text-muted mb-0"><small>24 Members</small>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-8 col-4">
                                    <ul class="list-inline user-chat-nav text-end mb-0">
                                        <li class="list-inline-item">
                                            <div class="dropdown">
                                                <button class="btn nav-btn dropdown-toggle" type="button"
                                                    data-bs-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <i class='bx bx-search'></i>
                                                </button>
                                                <div class="dropdown-menu p-0 dropdown-menu-end dropdown-menu-lg">
                                                    <div class="search-box p-2">
                                                        <input type="text" class="form-control"
                                                            placeholder="Search..">
                                                    </div>
                                                </div>
                                            </div>
                                        </li>

                                        <li class="list-inline-item d-none d-lg-inline-block me-2 ms-0">
                                            <button type="button" class="btn nav-btn user-profile-show">
                                                <i class='bx bxs-info-circle'></i>
                                            </button>
                                        </li>

                                        <li class="list-inline-item">
                                            <div class="dropdown">
                                                <button class="btn nav-btn dropdown-toggle" type="button"
                                                    data-bs-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <i class='bx bx-dots-vertical-rounded'></i>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item d-flex justify-content-between align-items-center d-lg-none user-profile-show"
                                                        href="#">View Profile <i
                                                            class="bx bx-user text-muted"></i></a>
                                                    <a class="dropdown-item d-flex justify-content-between align-items-center d-lg-none"
                                                        href="#" data-bs-toggle="modal"
                                                        data-bs-target=".audiocallModal">Audio <i
                                                            class="bx bxs-phone-call text-muted"></i></a>
                                                    <a class="dropdown-item d-flex justify-content-between align-items-center d-lg-none"
                                                        href="#" data-bs-toggle="modal"
                                                        data-bs-target=".videocallModal">Video <i
                                                            class="bx bx-video text-muted"></i></a>
                                                    <a class="dropdown-item d-flex justify-content-between align-items-center"
                                                        href="#">Archive <i
                                                            class="bx bx-archive text-muted"></i></a>
                                                    <a class="dropdown-item d-flex justify-content-between align-items-center"
                                                        href="#">Muted <i
                                                            class="bx bx-microphone-off text-muted"></i></a>
                                                    <a class="dropdown-item d-flex justify-content-between align-items-center"
                                                        href="#">Delete <i
                                                            class="bx bx-trash text-muted"></i></a>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="alert alert-warning alert-dismissible topbar-bookmark fade show p-1 px-3 px-lg-4 pe-lg-5 pe-5"
                                role="alert">
                                <div class="d-flex align-items-start bookmark-tabs">
                                    <div class="tab-list-link">
                                        <a href="#" class="tab-links" data-bs-toggle="modal"
                                            data-bs-target=".pinnedtabModal"><i
                                                class="ri-pushpin-fill align-middle me-1"></i> 10 Pinned</a>
                                    </div>
                                    <div>
                                        <a href="#" class="tab-links border-0 px-3" data-bs-toggle="tooltip"
                                            data-bs-trigger="hover" data-bs-placement="bottom"
                                            title="Add Bookmark"><i class="ri-add-fill align-middle"></i></a>
                                    </div>
                                </div>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        </div>
                        <!-- end chat user head -->

                        <!-- start chat conversation -->

                        <div class="chat-conversation p-3 p-lg-4" id="chat-conversation" data-simplebar>
                            <ul class="list-unstyled chat-conversation-list" id="channel-conversation-1">
                                <li class="chat-list left" id="8">
                                    <div class="conversation-list">
                                        <div class="chat-avatar"><img src="assets/images/users/avatar-2.jpg"
                                                alt=""></div>
                                        <div class="user-chat-content">
                                            <div class="ctext-wrap">
                                                <div class="ctext-wrap-content" id="8">
                                                    <p class="mb-0 ctext-content">Hello...</p>
                                                </div>
                                            </div>
                                            <div class="conversation-name"><small class="text-muted time"></small>
                                                <span class="text-success check-message-icon"><i
                                                        class="bx bx-check-double"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="chat-list left" id="3">
                                    <div class="conversation-list">
                                        <div class="chat-avatar"><img src="assets/images/users/avatar-2.jpg"
                                                alt=""></div>
                                        <div class="user-chat-content">
                                            <div class="ctext-wrap">
                                                <div class="ctext-wrap-content" id="3">
                                                    <p class="mb-0 ctext-content">Kẹc</p>
                                                </div>
                                                <div class="dropdown align-self-start message-box-drop"> <a
                                                        class="dropdown-toggle" href="#" role="button"
                                                        data-bs-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false"> <i class="ri-more-2-fill"></i> </a>
                                                    <div class="dropdown-menu"> <a
                                                            class="dropdown-item d-flex align-items-center justify-content-between reply-message"
                                                            href="#" id="reply-message-0"
                                                            data-bs-toggle="collapse"
                                                            data-bs-target=".replyCollapse">Reply <i
                                                                class="bx bx-share ms-2 text-muted"></i></a> <a
                                                            class="dropdown-item d-flex align-items-center justify-content-between"
                                                            href="#" data-bs-toggle="modal"
                                                            data-bs-target=".forwardModal">Forward <i
                                                                class="bx bx-share-alt ms-2 text-muted"></i></a> <a
                                                            class="dropdown-item d-flex align-items-center justify-content-between copy-message"
                                                            href="#" id="copy-message-0">Copy <i
                                                                class="bx bx-copy text-muted ms-2"></i></a> <a
                                                            class="dropdown-item d-flex align-items-center justify-content-between"
                                                            href="#">Bookmark <i
                                                                class="bx bx-bookmarks text-muted ms-2"></i></a> <a
                                                            class="dropdown-item d-flex align-items-center justify-content-between"
                                                            href="#">Mark as Unread <i
                                                                class="bx bx-message-error text-muted ms-2"></i></a> <a
                                                            class="dropdown-item d-flex align-items-center justify-content-between delete-item"
                                                            href="#">Delete <i
                                                                class="bx bx-trash text-muted ms-2"></i></a> </div>
                                                </div>
                                            </div>
                                            <div class="ctext-wrap">
                                                <div class="ctext-wrap-content" id="4">
                                                    <p class="mb-0 ctext-content">Vãi chưởng.</p>
                                                </div>
                                                <div class="dropdown align-self-start message-box-drop"> <a
                                                        class="dropdown-toggle" href="#" role="button"
                                                        data-bs-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false"> <i class="ri-more-2-fill"></i> </a>
                                                    <div class="dropdown-menu"> <a
                                                            class="dropdown-item d-flex align-items-center justify-content-between reply-message"
                                                            href="#" id="reply-message-0"
                                                            data-bs-toggle="collapse"
                                                            data-bs-target=".replyCollapse">Reply <i
                                                                class="bx bx-share ms-2 text-muted"></i></a> <a
                                                            class="dropdown-item d-flex align-items-center justify-content-between"
                                                            href="#" data-bs-toggle="modal"
                                                            data-bs-target=".forwardModal">Forward <i
                                                                class="bx bx-share-alt ms-2 text-muted"></i></a> <a
                                                            class="dropdown-item d-flex align-items-center justify-content-between copy-message"
                                                            href="#" id="copy-message-0">Copy <i
                                                                class="bx bx-copy text-muted ms-2"></i></a> <a
                                                            class="dropdown-item d-flex align-items-center justify-content-between"
                                                            href="#">Bookmark <i
                                                                class="bx bx-bookmarks text-muted ms-2"></i></a> <a
                                                            class="dropdown-item d-flex align-items-center justify-content-between"
                                                            href="#">Mark as Unread <i
                                                                class="bx bx-message-error text-muted ms-2"></i></a>
                                                        <a class="dropdown-item d-flex align-items-center justify-content-between delete-item"
                                                            href="#">Delete <i
                                                                class="bx bx-trash text-muted ms-2"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="conversation-name"><small class="text-muted time">10:13
                                                    am</small> <span class="text-success check-message-icon"><i
                                                        class="bx bx-check-double"></i></span></div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="alert alert-warning alert-dismissible copyclipboard-alert px-4 fade show "
                            id="copyClipBoardChannel" role="alert">
                            message copied
                        </div>
                        <!-- end chat conversation end -->
                    </div>

                    <!-- start chat input section -->
                    <div class="position-relative">
                        <div class="chat-input-section p-3 p-lg-4">

                            <form id="chatinput-form" enctype="multipart/form-data">
                                <div class="row g-0 align-items-center">
                                    <div class="file_Upload"></div>
                                    <div class="col-auto">
                                        <div class="chat-input-links me-md-2">
                                            <div class="links-list-item" data-bs-toggle="tooltip"
                                                data-bs-trigger="hover" data-bs-placement="top" title="More">
                                                <button type="button"
                                                    class="btn btn-link text-decoration-none btn-lg waves-effect"
                                                    data-bs-toggle="collapse" data-bs-target="#chatinputmorecollapse"
                                                    aria-expanded="false" aria-controls="chatinputmorecollapse">
                                                    <i class="bx bx-dots-horizontal-rounded align-middle"></i>
                                                </button>
                                            </div>
                                            <div class="links-list-item" data-bs-toggle="tooltip"
                                                data-bs-trigger="hover" data-bs-placement="top" title="Emoji">
                                                <button type="button"
                                                    class="btn btn-link text-decoration-none btn-lg waves-effect emoji-btn"
                                                    id="emoji-btn">
                                                    <i class="bx bx-smile align-middle"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="position-relative">
                                            <div class="chat-input-feedback">
                                                Nhập tin nhắn
                                            </div>
                                            <input autocomplete="off" type="text"
                                                class="form-control form-control-lg chat-input" autofocus
                                                id="chat-input-1" placeholder="Nhập tin nhắn của bạn...">
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="chat-input-links ms-2 gap-md-1">
                                            <div class="links-list-item d-none d-sm-block"
                                                data-bs-container=".chat-input-links" data-bs-toggle="popover"
                                                data-bs-trigger="focus" data-bs-html="true" data-bs-placement="top"
                                                data-bs-content="<div class='loader-line'><div class='line'></div><div class='line'></div><div class='line'></div><div class='line'></div><div class='line'></div></div>">
                                                <button type="button"
                                                    class="btn btn-link text-decoration-none btn-lg waves-effect"
                                                    onclick="audioPermission()">
                                                    <i class="bx bx-microphone align-middle"></i>
                                                </button>
                                            </div>
                                            <div class="links-list-item">
                                                <button id="send-btn"
                                                    class="btn btn-primary btn-lg chat-send waves-effect waves-light"
                                                    data-bs-toggle="collapse"
                                                    data-bs-target=".chat-input-collapse1.show">
                                                    <i class="bx bxs-send align-middle" id="submit-btn"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="chat-input-collapse chat-input-collapse1 collapse" id="chatinputmorecollapse">
                                <div class="card mb-0">
                                    <div class="card-body py-3">
                                        <!-- Swiper -->
                                        <div class="swiper chatinput-links">
                                            <div class="swiper-wrapper">
                                                <div class="swiper-slide">
                                                    <div class="text-center px-2 position-relative">
                                                        <div>
                                                            <input id="attachedfile-input" type="file"
                                                                class="d-none" accept=".zip,.rar,.7zip,.pdf" multiple>
                                                            <label for="attachedfile-input"
                                                                class="avatar-sm mx-auto stretched-link">
                                                                <span
                                                                    class="avatar-title font-size-18 bg-soft-primary text-primary rounded-circle">
                                                                    <i class="bx bx-paperclip"></i>
                                                                </span>
                                                            </label>
                                                        </div>
                                                        <h5
                                                            class="font-size-11 text-uppercase mt-3 mb-0 text-body text-truncate">
                                                            Attached</h5>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide">
                                                    <div class="text-center px-2">
                                                        <div class="avatar-sm mx-auto">
                                                            <div
                                                                class="avatar-title font-size-18 bg-soft-primary text-primary rounded-circle">
                                                                <i class="bx bxs-camera"></i>
                                                            </div>
                                                        </div>
                                                        <h5
                                                            class="font-size-11 text-uppercase text-truncate mt-3 mb-0">
                                                            <a href="#" class="text-body stretched-link"
                                                                onclick="cameraPermission()">Camera</a>
                                                        </h5>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide">
                                                    <div class="text-center px-2 position-relative">
                                                        <div>
                                                            <input id="galleryfile-input" type="file"
                                                                class="d-none"
                                                                accept="image/png, image/gif, image/jpeg" multiple>
                                                            <label for="galleryfile-input"
                                                                class="avatar-sm mx-auto stretched-link">
                                                                <span
                                                                    class="avatar-title font-size-18 bg-soft-primary text-primary rounded-circle">
                                                                    <i class="bx bx-images"></i>
                                                                </span>
                                                            </label>
                                                        </div>
                                                        <h5
                                                            class="font-size-11 text-uppercase text-truncate mt-3 mb-0">
                                                            Gallery</h5>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide">
                                                    <div class="text-center px-2">
                                                        <div>
                                                            <input id="audiofile-input" type="file"
                                                                class="d-none" accept="audio/*" multiple>
                                                            <label for="audiofile-input"
                                                                class="avatar-sm mx-auto stretched-link">
                                                                <span
                                                                    class="avatar-title font-size-18 bg-soft-primary text-primary rounded-circle">
                                                                    <i class="bx bx-headphone"></i>
                                                                </span>
                                                            </label>
                                                        </div>
                                                        <h5
                                                            class="font-size-11 text-uppercase text-truncate mt-3 mb-0">
                                                            Audio</h5>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide">
                                                    <div class="text-center px-2">
                                                        <div class="avatar-sm mx-auto">
                                                            <div
                                                                class="avatar-title font-size-18 bg-soft-primary text-primary rounded-circle">
                                                                <i class="bx bx-current-location"></i>
                                                            </div>
                                                        </div>

                                                        <h5
                                                            class="font-size-11 text-uppercase text-truncate mt-3 mb-0">
                                                            <a href="#" class="text-body stretched-link"
                                                                onclick="getLocation()">Location</a>
                                                        </h5>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide">
                                                    <div class="text-center px-2">
                                                        <div class="avatar-sm mx-auto">
                                                            <div
                                                                class="avatar-title font-size-18 bg-soft-primary text-primary rounded-circle">
                                                                <i class="bx bxs-user-circle"></i>
                                                            </div>
                                                        </div>
                                                        <h5
                                                            class="font-size-11 text-uppercase text-truncate mt-3 mb-0">
                                                            <a href="#" class="text-body stretched-link"
                                                                data-bs-toggle="modal"
                                                                data-bs-target=".contactModal">Contacts</a>
                                                        </h5>
                                                    </div>
                                                </div>

                                                <div class="swiper-slide d-block d-sm-none">
                                                    <div class="text-center px-2">
                                                        <div class="avatar-sm mx-auto">
                                                            <div
                                                                class="avatar-title font-size-18 bg-soft-primary text-primary rounded-circle">
                                                                <i class="bx bx-microphone"></i>
                                                            </div>
                                                        </div>
                                                        <h5
                                                            class="font-size-11 text-uppercase text-truncate mt-3 mb-0">
                                                            <a href="#"
                                                                class="text-body stretched-link">Audio</a>
                                                        </h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="replyCard">
                            <div class="card mb-0">
                                <div class="card-body py-3">
                                    <div class="replymessage-block mb-0 d-flex align-items-start">
                                        <div class="flex-grow-1">
                                            <h5 class="conversation-name"></h5>
                                            <p class="mb-0"></p>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <button type="button" id="close_toggle"
                                                class="btn btn-sm btn-link mt-n2 me-n3 font-size-18">
                                                <i class="bx bx-x align-middle"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end chat input section -->
                </div>
                <!-- end chat conversation section -->

                <!-- start User profile detail sidebar -->
                <div class="user-profile-sidebar">

                    <div class="p-3 border-bottom">
                        <div class="user-profile-img">
                            <img src="assets/images/users/avatar-2.jpg" class="profile-img rounded"
                                alt="">
                            <div class="overlay-content rounded">
                                <div class="user-chat-nav p-2">
                                    <div class="d-flex w-100">
                                        <div class="flex-grow-1">
                                            <button type="button"
                                                class="btn nav-btn text-white user-profile-show d-none d-lg-block">
                                                <i class="bx bx-x"></i>
                                            </button>
                                            <button type="button"
                                                class="btn nav-btn text-white user-profile-show d-block d-lg-none">
                                                <i class="bx bx-left-arrow-alt"></i>
                                            </button>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <div class="dropdown">
                                                <button class="btn nav-btn text-white dropdown-toggle"
                                                    type="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <i class='bx bx-dots-vertical-rounded'></i>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item d-flex justify-content-between align-items-center d-lg-none user-profile-show"
                                                        href="#">View Profile <i
                                                            class="bx bx-user text-muted"></i></a>
                                                    <a class="dropdown-item d-flex justify-content-between align-items-center d-lg-none"
                                                        href="#" data-bs-toggle="modal"
                                                        data-bs-target=".audiocallModal">Audio <i
                                                            class="bx bxs-phone-call text-muted"></i></a>
                                                    <a class="dropdown-item d-flex justify-content-between align-items-center d-lg-none"
                                                        href="#" data-bs-toggle="modal"
                                                        data-bs-target=".videocallModal">Video <i
                                                            class="bx bx-video text-muted"></i></a>
                                                    <a class="dropdown-item d-flex justify-content-between align-items-center"
                                                        href="#">Archive <i
                                                            class="bx bx-archive text-muted"></i></a>
                                                    <a class="dropdown-item d-flex justify-content-between align-items-center"
                                                        href="#">Muted <i
                                                            class="bx bx-microphone-off text-muted"></i></a>
                                                    <a class="dropdown-item d-flex justify-content-between align-items-center"
                                                        href="#">Delete <i
                                                            class="bx bx-trash text-muted"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-auto p-3">
                                    <h5 class="user-name mb-1 text-truncate">Bella Cote</h5>
                                    <p class="font-size-14 text-truncate mb-0"><i
                                            class="bx bxs-circle font-size-10 text-success me-1 ms-0"></i> Online</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End profile user -->

                    <!-- Start user-profile-desc -->
                    <div class="p-4 user-profile-desc" data-simplebar>

                        <div class="text-center border-bottom">
                            <div class="row">
                                <div class="col-sm col-4">
                                    <div class="mb-4">
                                        <button type="button" class="btn avatar-sm p-0">
                                            <span class="avatar-title rounded bg-light text-body">
                                                <i class="bx bxs-message-alt-detail"></i>
                                            </span>
                                        </button>
                                        <h5 class="font-size-11 text-uppercase text-muted mt-2">Message</h5>
                                    </div>
                                </div>
                                <div class="col-sm col-4">
                                    <div class="mb-4">
                                        <button type="button" class="btn avatar-sm p-0 favourite-btn">
                                            <span class="avatar-title rounded bg-light text-body">
                                                <i class="bx bx-heart"></i>
                                            </span>
                                        </button>
                                        <h5 class="font-size-11 text-uppercase text-muted mt-2">Favourite</h5>
                                    </div>
                                </div>
                                <div class="col-sm col-4">
                                    <div class="mb-4">
                                        <button type="button" class="btn avatar-sm p-0" data-bs-toggle="modal"
                                            data-bs-target=".audiocallModal">
                                            <span class="avatar-title rounded bg-light text-body">
                                                <i class="bx bxs-phone-call"></i>
                                            </span>
                                        </button>
                                        <h5 class="font-size-11 text-uppercase text-muted mt-2">Audio</h5>
                                    </div>
                                </div>
                                <div class="col-sm col-4">
                                    <div class="mb-4">
                                        <button type="button" class="btn avatar-sm p-0" data-bs-toggle="modal"
                                            data-bs-target=".videocallModal">
                                            <span class="avatar-title rounded bg-light text-body">
                                                <i class="bx bx-video"></i>
                                            </span>
                                        </button>
                                        <h5 class="font-size-11 text-uppercase text-muted mt-2">Video</h5>
                                    </div>
                                </div>
                                <div class="col-sm col-4">
                                    <div class="mb-4">
                                        <div class="dropdown">
                                            <button class="btn avatar-sm p-0 dropdown-toggle" type="button"
                                                data-bs-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <span class="avatar-title bg-light text-body rounded">
                                                    <i class='bx bx-dots-horizontal-rounded'></i>
                                                </span>
                                            </button>

                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item d-flex justify-content-between align-items-center"
                                                    href="#">Archive <i
                                                        class="bx bx-archive text-muted"></i></a>
                                                <a class="dropdown-item d-flex justify-content-between align-items-center"
                                                    href="#">Muted <i
                                                        class="bx bx-microphone-off text-muted"></i></a>
                                                <a class="dropdown-item d-flex justify-content-between align-items-center"
                                                    href="#">Delete <i class="bx bx-trash text-muted"></i></a>
                                            </div>
                                        </div>
                                        <h5 class="font-size-11 text-uppercase text-muted mt-2">More</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-muted pt-4">
                            <h5 class="font-size-11 text-uppercase">Status :</h5>
                            <p class="mb-4">If several languages coalesce, the grammar of the resulting.</p>
                        </div>

                        <div class="pb-2">
                            <h5 class="font-size-11 text-uppercase mb-2">Info :</h5>
                            <div>
                                <div class="d-flex align-items-end">
                                    <div class="flex-grow-1">
                                        <p class="text-muted font-size-14 mb-1">Name</p>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <button type="button" class="btn btn-sm btn-soft-primary">Edit</button>
                                    </div>
                                </div>
                                <h5 class="font-size-14 text-truncate">Bella Cote</h5>
                            </div>

                            <div class="mt-4">
                                <p class="text-muted font-size-14 mb-1">Email</p>
                                <h5 class="font-size-14">adc@123.com</h5>
                            </div>

                            <div class="mt-4">
                                <p class="text-muted font-size-14 mb-1">Location</p>
                                <h5 class="font-size-14 mb-0">California, USA</h5>
                            </div>
                        </div>
                        <hr class="my-4">

                        <div>
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <h5 class="font-size-11 text-muted text-uppercase">Group in common</h5>
                                </div>
                            </div>

                            <ul class="list-unstyled chat-list mx-n4">
                                <li>
                                    <a href="javascript: void(0);">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0 avatar-xs me-2">
                                                <span class="avatar-title rounded-circle bg-soft-light text-dark">
                                                    #
                                                </span>
                                            </div>
                                            <div class="flex-grow-1 overflow-hidden">
                                                <p class="text-truncate mb-0">Landing Design</p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript: void(0);">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0 avatar-xs me-2">
                                                <span class="avatar-title rounded-circle bg-soft-light text-dark">
                                                    #
                                                </span>
                                            </div>
                                            <div class="flex-grow-1 overflow-hidden">
                                                <p class="text-truncate mb-0">Design Phase 2</p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <hr class="my-4">

                        <div>
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <h5 class="font-size-11 text-muted text-uppercase">Media</h5>
                                </div>
                                <div class="flex-shrink-0">
                                    <a href="#" class="font-size-12 d-block mb-2">Show all</a>
                                </div>
                            </div>
                            <div class="profile-media-img">
                                <div class="media-img-list">
                                    <a href="#">
                                        <img src="assets/images/small/img-1.jpg" alt="media img"
                                            class="img-fluid">
                                    </a>
                                </div>
                                <div class="media-img-list">
                                    <a href="#">
                                        <img src="assets/images/small/img-2.jpg" alt="media img"
                                            class="img-fluid">
                                    </a>
                                </div>
                                <div class="media-img-list">
                                    <a href="#">
                                        <img src="assets/images/small/img-3.jpg" alt="media img"
                                            class="img-fluid">
                                    </a>
                                </div>
                                <div class="media-img-list">
                                    <a href="#">
                                        <img src="assets/images/small/img-4.jpg" alt="media img"
                                            class="img-fluid">
                                        <div class="bg-overlay">+ 15</div>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <hr class="my-4">

                        <div>
                            <div>
                                <h5 class="font-size-11 text-muted text-uppercase mb-3">Attached Files</h5>
                            </div>

                            <div>
                                <div class="card p-2 border mb-2">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0 avatar-xs ms-1 me-3">
                                            <div class="avatar-title bg-soft-primary text-primary rounded-circle">
                                                <i class="bx bx-file"></i>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 overflow-hidden">
                                            <h5 class="font-size-14 text-truncate mb-1">design-phase-1-approved.pdf
                                            </h5>
                                            <p class="text-muted font-size-13 mb-0">12.5 MB</p>
                                        </div>

                                        <div class="flex-shrink-0 ms-3">
                                            <div class="d-flex gap-2">
                                                <div>
                                                    <a href="#" class="text-muted px-1">
                                                        <i class="bx bxs-download"></i>
                                                    </a>
                                                </div>
                                                <div class="dropdown">
                                                    <a class="dropdown-toggle text-muted px-1" href="#"
                                                        role="button" data-bs-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        <i class="bx bx-dots-horizontal-rounded"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item d-flex align-items-center justify-content-between"
                                                            href="#">Share <i
                                                                class="bx bx-share-alt ms-2 text-muted"></i></a>
                                                        <a class="dropdown-item d-flex align-items-center justify-content-between"
                                                            href="#">Bookmark <i
                                                                class="bx bx-bookmarks text-muted ms-2"></i></a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item d-flex align-items-center justify-content-between"
                                                            href="#">Delete <i
                                                                class="bx bx-trash ms-2 text-muted"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card p-2 border mb-2">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0 avatar-xs ms-1 me-3">
                                            <div class="avatar-title bg-soft-primary text-primary rounded-circle">
                                                <i class="bx bx-image"></i>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 overflow-hidden">
                                            <h5 class="font-size-14 text-truncate mb-1">Image-1.jpg</h5>
                                            <p class="text-muted font-size-13 mb-0">4.2 MB</p>
                                        </div>

                                        <div class="flex-shrink-0 ms-3">
                                            <div class="d-flex gap-2">
                                                <div>
                                                    <a href="#" class="text-muted px-1">
                                                        <i class="bx bxs-download"></i>
                                                    </a>
                                                </div>
                                                <div class="dropdown">
                                                    <a class="dropdown-toggle text-muted px-1" href="#"
                                                        role="button" data-bs-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        <i class="bx bx-dots-horizontal-rounded"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item d-flex align-items-center justify-content-between"
                                                            href="#">Share <i
                                                                class="bx bx-share-alt ms-2 text-muted"></i></a>
                                                        <a class="dropdown-item d-flex align-items-center justify-content-between"
                                                            href="#">Bookmark <i
                                                                class="bx bx-bookmarks text-muted ms-2"></i></a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item d-flex align-items-center justify-content-between"
                                                            href="#">Delete <i
                                                                class="bx bx-trash ms-2 text-muted"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card p-2 border mb-2">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0 avatar-xs ms-1 me-3">
                                            <div class="avatar-title bg-soft-primary text-primary rounded-circle">
                                                <i class="bx bx-image"></i>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 overflow-hidden">
                                            <h5 class="font-size-14 text-truncate mb-1">Image-2.jpg</h5>
                                            <p class="text-muted font-size-13 mb-0">3.1 MB</p>
                                        </div>

                                        <div class="flex-shrink-0 ms-3">
                                            <div class="d-flex gap-2">
                                                <div>
                                                    <a href="#" class="text-muted px-1">
                                                        <i class="bx bxs-download"></i>
                                                    </a>
                                                </div>
                                                <div class="dropdown">
                                                    <a class="dropdown-toggle text-muted px-1" href="#"
                                                        role="button" data-bs-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        <i class="bx bx-dots-horizontal-rounded"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item d-flex align-items-center justify-content-between"
                                                            href="#">Share <i
                                                                class="bx bx-share-alt ms-2 text-muted"></i></a>
                                                        <a class="dropdown-item d-flex align-items-center justify-content-between"
                                                            href="#">Bookmark <i
                                                                class="bx bx-bookmarks text-muted ms-2"></i></a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item d-flex align-items-center justify-content-between"
                                                            href="#">Delete <i
                                                                class="bx bx-trash ms-2 text-muted"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card p-2 border mb-2">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0 avatar-xs ms-1 me-3">
                                            <div class="avatar-title bg-soft-primary text-primary rounded-circle">
                                                <i class="bx bx-file"></i>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 overflow-hidden">
                                            <h5 class="font-size-14 text-truncate mb-1">Landing-A.zip</h5>
                                            <p class="text-muted font-size-13 mb-0">6.7 MB</p>
                                        </div>

                                        <div class="flex-shrink-0 ms-3">
                                            <div class="d-flex gap-2">
                                                <div>
                                                    <a href="#" class="text-muted px-1">
                                                        <i class="bx bxs-download"></i>
                                                    </a>
                                                </div>
                                                <div class="dropdown">
                                                    <a class="dropdown-toggle text-muted px-1" href="#"
                                                        role="button" data-bs-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        <i class="bx bx-dots-horizontal-rounded"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item d-flex align-items-center justify-content-between"
                                                            href="#">Share <i
                                                                class="bx bx-share-alt ms-2 text-muted"></i></a>
                                                        <a class="dropdown-item d-flex align-items-center justify-content-between"
                                                            href="#">Bookmark <i
                                                                class="bx bx-bookmarks text-muted ms-2"></i></a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item d-flex align-items-center justify-content-between"
                                                            href="#">Delete <i
                                                                class="bx bx-trash ms-2 text-muted"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end user-profile-desc -->
                </div>
                <!-- end User profile detail sidebar -->
            </div>
            <!-- end user chat content -->
        </div>
        <!-- End User chat -->

        {{-- @yield('content') --}}

    </div>
    <!-- end  layout wrapper -->

    @include('chat.layout.script')
    @yield('script-profile')
    @yield('script-contact')
    @yield('script-setting')

</body>

</html>
