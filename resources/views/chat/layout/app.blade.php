<!doctype html>
<html lang="en">

<head>
    @include('chat.layout.head')
</head>

<body>

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
                            <a class="dropdown-item d-flex align-items-center justify-content-between"
                                href="auth-logout.html">Log out <i
                                    class="bx bx-log-out-circle text-muted ms-1"></i></a>
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

        {{-- @yield('content') --}}

    </div>
    <!-- end  layout wrapper -->

    @include('chat.layout.script')
    @yield('script-contact')
    @yield('script-setting')

</body>

</html>
