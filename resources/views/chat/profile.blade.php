<div class="tab-pane show active" id="pills-user" role="tabpanel" aria-labelledby="pills-user-tab">
    <!-- Start profile content -->
    <div>
        <div class="user-profile-img">
            <img src="{{ asset('assets-1/images/cyber.png') }}" class="profile-img" style="height: 160px;" alt="">
            <div class="overlay-content">
                <div>
                    <div class="user-chat-nav p-2 ps-3">

                        <div class="d-flex w-100 align-items-center">
                            <div class="flex-grow-1">
                                <h5 class="text-white mb-0">Thông tin cá nhân</h5>
                            </div>
                            <div class="flex-shrink-0">
                                <div class="dropdown">
                                    <button class="btn nav-btn text-white dropdown-toggle" type="button"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class='bx bx-dots-vertical-rounded'></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item d-flex align-items-center justify-content-between"
                                            href="#">Info <i class="bx bx-info-circle ms-2 text-muted"></i></a>
                                        <a class="dropdown-item d-flex align-items-center justify-content-between"
                                            href="#">Setting <i class="bx bx-cog text-muted ms-2"></i></a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item d-flex align-items-center justify-content-between"
                                            href="#">Help <i class="bx bx-help-circle ms-2 text-muted"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center p-3 p-lg-4 border-bottom pt-2 pt-lg-2 mt-n5 position-relative">
            <div class="mb-lg-3 mb-2">
                <img src="{{ Storage::url(auth()->user()->avatar) }}" class="rounded-circle avatar-lg img-thumbnail"
                    alt="">
            </div>

            <h5 class="font-size-16 mb-1 text-truncate">{{ auth()->user()->username }}</h5>
            <p class="text-muted font-size-14 text-truncate mb-0">.Net Developer</p>
        </div>

        <div id="messageContainer"></div>

        <!-- Form gửi tin nhắn -->
        <form id="messageForm">
            <input type="text" id="messageInput" placeholder="Nhập tin nhắn">
            <button type="submit">Gửi</button>
        </form>

        <!-- End profile user -->

        <!-- Start user-profile-desc -->
        <div class="p-4 profile-desc" data-simplebar>
            <div class="text-muted">
                <p class="mb-4">CyberLotus sánh bước cùng cộng đồng doanh nghiệp phát triển vì nền kinh tế số Việt Nam
                    với bộ giải pháp toàn diện giúp hiện đại hóa hạ tầng,...</p>
            </div>

            <div>
                <div class="d-flex py-2">
                    <div class="flex-shrink-0 me-3">
                        <i class="bx bx-user align-middle text-muted"></i>
                    </div>
                    <div class="flex-grow-1">
                        <p class="mb-0">{{ auth()->user()->full_name }}</p>
                    </div>
                </div>

                <div class="d-flex py-2">
                    <div class="flex-shrink-0 me-3">
                        <i class="bx bx-message-rounded-dots align-middle text-muted"></i>
                    </div>
                    <div class="flex-grow-1">
                        <p class="mb-0">{{ auth()->user()->email }}</p>
                    </div>
                </div>

                <div class="d-flex py-2">
                    <div class="flex-shrink-0 me-3">
                        <i class="bx bx-location-plus align-middle text-muted"></i>
                    </div>
                    <div class="flex-grow-1">
                        <p class="mb-0">{{ auth()->user()->address }}</p>
                    </div>
                </div>
            </div>
            <hr class="my-4">

            <div>
                <div class="d-flex">
                    <div class="flex-grow-1">
                        <h5 class="font-size-11 text-muted text-uppercase">Media</h5>
                    </div>
                    <div class="flex-shrink-0">
                        <a href="javascript:void(0);" class="font-size-12 d-block mb-2">Tất cả</a>
                    </div>
                </div>
                <div class="profile-media-img">
                    <div class="media-img-list">
                        <a href="#">
                            <img src="assets/images/small/img-1.jpg" alt="media img" class="img-fluid">
                        </a>
                    </div>
                    <div class="media-img-list">
                        <a href="#">
                            <img src="assets/images/small/img-2.jpg" alt="media img" class="img-fluid">
                        </a>
                    </div>
                    <div class="media-img-list">
                        <a href="#">
                            <img src="assets/images/small/img-4.jpg" alt="media img" class="img-fluid">
                            <div class="bg-overlay">+ 15</div>
                        </a>
                    </div>
                </div>
            </div>

            <hr class="my-4">

            <div>
                <div>
                    <h5 class="font-size-11 text-muted text-uppercase mb-3">Files</h5>
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
                                        <a class="dropdown-toggle text-muted px-1" href="#" role="button"
                                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="bx bx-dots-horizontal-rounded"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item d-flex align-items-center justify-content-between"
                                                href="#">Share <i
                                                    class="bx bx-share-alt ms-2 text-muted"></i></a>
                                            <a class="dropdown-item d-flex align-items-center justify-content-between"
                                                href="#">Lưu <i class="bx bx-bookmarks text-muted ms-2"></i></a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item d-flex align-items-center justify-content-between"
                                                href="#">Xoá <i class="bx bx-trash ms-2 text-muted"></i></a>
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
                                        <a class="dropdown-toggle text-muted px-1" href="#" role="button"
                                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="bx bx-dots-horizontal-rounded"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item d-flex align-items-center justify-content-between"
                                                href="#">Share <i
                                                    class="bx bx-share-alt ms-2 text-muted"></i></a>
                                            <a class="dropdown-item d-flex align-items-center justify-content-between"
                                                href="#">Lưu <i class="bx bx-bookmarks text-muted ms-2"></i></a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item d-flex align-items-center justify-content-between"
                                                href="#">Xoá <i class="bx bx-trash ms-2 text-muted"></i></a>
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
                                        <a class="dropdown-toggle text-muted px-1" href="#" role="button"
                                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="bx bx-dots-horizontal-rounded"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item d-flex align-items-center justify-content-between"
                                                href="#">Share <i
                                                    class="bx bx-share-alt ms-2 text-muted"></i></a>
                                            <a class="dropdown-item d-flex align-items-center justify-content-between"
                                                href="#">Lưu <i class="bx bx-bookmarks text-muted ms-2"></i></a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item d-flex align-items-center justify-content-between"
                                                href="#">Xoá <i class="bx bx-trash ms-2 text-muted"></i></a>
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
                                        <a class="dropdown-toggle text-muted px-1" href="#" role="button"
                                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="bx bx-dots-horizontal-rounded"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item d-flex align-items-center justify-content-between"
                                                href="#">Share <i
                                                    class="bx bx-share-alt ms-2 text-muted"></i></a>
                                            <a class="dropdown-item d-flex align-items-center justify-content-between"
                                                href="#">Lưu <i class="bx bx-bookmarks text-muted ms-2"></i></a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item d-flex align-items-center justify-content-between"
                                                href="#">Xoá <i class="bx bx-trash ms-2 text-muted"></i></a>
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
    <!-- End profile content -->
</div>
