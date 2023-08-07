<div class="user-setting" data-simplebar>
    <div id="settingprofile" class="accordion accordion-flush">
        <div class="accordion-item">
            <div class="accordion-header" id="headerpersonalinfo">
                <button class="accordion-button font-size-14 fw-medium" type="button" data-bs-toggle="collapse"
                    data-bs-target="#personalinfo" aria-expanded="true" aria-controls="personalinfo">
                    <i class="bx bxs-user text-muted me-3"></i> Thông tin cá nhân
                </button>
            </div>
            <div id="personalinfo" class="accordion-collapse collapse show" aria-labelledby="headerpersonalinfo"
                data-bs-parent="#settingprofile">
                <div class="accordion-body">
                    <div class="float-end">
                        {{-- <button type="button" class="btn btn-soft-primary btn-sm"><i
                                class="bx bxs-pencil align-middle"></i></button> --}}
                        <div data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="bottom"
                            title="Thêm liên lạc">

                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-soft-primary btn-sm" data-bs-toggle="modal"
                                data-bs-target="#btn-edit-info-user">
                                <i class="bx bx-plus"></i>
                            </button>
                        </div>
                    </div>

                    <div id="userInfo">
                        <div>
                            <p class="text-muted mb-1">Họ tên</p>
                            <h5 class="font-size-14">{{ auth()->user()->full_name }}</h5>
                        </div>

                        <div class="mt-4">
                            <p class="text-muted mb-1">Email</p>
                            <h5 class="font-size-14">{{ auth()->user()->email }}</h5>
                        </div>

                        <div class="mt-4">
                            <p class="text-muted mb-1">Username</p>
                            <h5 class="font-size-14 mb-0">{{ auth()->user()->username }}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end personal info card -->

        <div class="accordion-item">
            <div class="accordion-header" id="headerhelp">
                <button class="accordion-button font-size-14 fw-medium collapsed" type="button"
                    data-bs-toggle="collapse" data-bs-target="#collapsehelp" aria-expanded="false"
                    aria-controls="collapsehelp">
                    <i class="bx bxs-help-circle text-muted me-3"></i> Trợ giúp
                </button>
            </div>
            <div id="collapsehelp" class="accordion-collapse collapse" aria-labelledby="headerhelp"
                data-bs-parent="#settingprofile">
                <div class="accordion-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item py-3 px-0 pt-0">
                            <h5 class="font-size-13 mb-0"><a href="#" class="text-body d-block">Người dùng VIP</a>
                            </h5>
                            <small>Người dùng vip có thể tạo > 10 group chat</small>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- end profile-setting-accordion -->
</div>

<div class="modal fade" id="btn-edit-info-user" tabindex="-1" role="dialog" aria-labelledby="btn-edit-info-user"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content modal-header-colored shadow-lg border-0">
            <div class="modal-header">
                <h5 class="modal-title text-white font-size-16" id="addContact-exampleModalLabel">Thay đổi thông tin cá
                    nhân</h5>
                {{-- <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close">
                </button> --}}
            </div>
            <div class="modal-body p-4">
                <form id="editAccountForm">
                    <div class="mb-3">
                        <label for="edit-email-input" class="form-label">Email</label>
                        <input type="email" class="form-control" id="edit-email-input" placeholder="Nhập email"
                            name="email">
                    </div>
                    <div class="mb-3">
                        <label for="edit-fullname-input" class="form-label">Họ và tên</label>
                        <input type="text" class="form-control" id="edit-fullname-input" placeholder="Nhập họ và tên"
                            name="full_name">
                    </div>
                    {{-- <button type="button" class="btn btn-primary" id="edit-account-btn">Lưu thay đổi</button> --}}
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link close-request-btn" data-bs-dismiss="modal">Đóng</button>
                <button id="edit-account-btn" type="button" class="btn btn-primary" data-bs-dismiss="modal">Xác
                    nhận</button>
            </div>
        </div>
    </div>
</div>

@section('script-setting')
    <script>
        $(document).ready(function() {
            $('#edit-account-btn').click(function() {
                var email = $('#edit-email-input').val();
                var fullName = $('#edit-fullname-input').val();
                var csrfToken = $('meta[name="csrf-token"]').attr('content');

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    }
                });

                $.post('/edit-account', {
                    email: email,
                    full_name: fullName
                }, function(response) {
                    console.log(response)
                    if (response.status) {
                        $('#userInfo h5:eq(0)').text(fullName);
                        $('#userInfo h5:eq(1)').text(email);
                        alert('Thông tin đã được cập nhật thành công!');
                    } else {
                        alert(response?.message);
                    }
                }).fail(function(xhr, status, error) {
                    var errorMessage = 'Lỗi từ máy chủ: ' + xhr.responseText;
                    console.log("ok")
                    alert(errorMessage);
                    console.log(errorMessage);
                });
            });
        });
    </script>
@endsection
