<div class="tab-pane" id="pills-contacts" role="tabpanel" aria-labelledby="pills-contacts-tab">
    <!-- Start Contact content -->
    <div>
        <div class="px-4 pt-4">
            <div class="d-flex align-items-start">
                <div class="flex-grow-1">
                    <h4 class="mb-4">Liên lạc</h4>
                </div>
                <div class="flex-shrink-0">
                    <div data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="bottom"
                        title="Thêm liên lạc">

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-soft-primary btn-sm" data-bs-toggle="modal"
                            data-bs-target="#addContact-exampleModal">
                            <i class="bx bx-plus"></i>
                        </button>
                    </div>
                </div>
            </div>

            <form>
                <div class="input-group mb-4">
                    <input type="text" class="form-control bg-light border-0 pe-0" id="searchContact"
                        placeholder="Tìm kiếm liên lạc.." aria-label="Search Contacts..."
                        aria-describedby="button-searchcontactsaddon">
                    <button class="btn btn-light" type="button" id="button-searchcontactsaddon"><i
                            class='bx bx-search align-middle'></i></button>
                </div>
            </form>
        </div>

        <!-- end p-4 -->

        <div class="chat-message-list chat-group-list" data-simplebar>
            <div class="sort-contact">
                <ul class="list-unstyled chat-list px-3">
                    @foreach ($friends as $friend)
                        <li>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 avatar-xs ms-1 me-3">
                                    <div class="avatar-title bg-soft-primary text-primary rounded-circle">
                                        <i class="bx bx-file"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 overflow-hidden">
                                    <h5 class="font-size-14 mb-1"><a href="#"
                                            class="text-truncate p-0">{{ $friend->email }}</a></h5>
                                    <p class="text-muted text-truncate font-size-13 mb-0">{{ $friend->username }}</p>
                                </div>

                                {{-- <div class="flex-shrink-0 ms-3">
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
                                                href="#">Edit <i class="bx bx-pencil ms-2 text-muted"></i></a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item d-flex align-items-center justify-content-between"
                                                href="#">Delete <i class="bx bx-trash ms-2 text-muted"></i></a>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <!-- end contact lists -->
    </div>
    <!-- Start Contact content -->
</div>

<div class="modal fade" id="addContact-exampleModal" tabindex="-1" role="dialog"
    aria-labelledby="addContact-exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content modal-header-colored shadow-lg border-0">
            <div class="modal-header">
                <h5 class="modal-title text-white font-size-16" id="addContact-exampleModalLabel">Yêu cầu kết bạn</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body p-4">
                <form id="sendFriendRequestForm">
                    <div class="mb-3">
                        <label for="addcontactemail-input" class="form-label">Email</label>
                        <input type="email" class="form-control" id="addcontactemail-input" placeholder="Nhập email"
                            name="email">
                    </div>
                    {{-- <div class="mb-0">
                        <label for="addcontact-invitemessage-input" class="form-label">Tin nhắn</label>
                        <textarea class="form-control" id="addcontact-invitemessage-input" rows="3" placeholder="Nhập tin nhắn"
                            name="message"></textarea>
                    </div> --}}
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link close-request-btn" data-bs-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-primary send-request-btn" data-bs-dismiss="modal">Xác
                    nhận</button>
            </div>
        </div>
    </div>
</div>

@section('script')
    <script>
        $(document).ready(function() {
            $('.send-request-btn').click(function() {
                var email = $('#addcontactemail-input').val();
                var message = $('#addcontact-invitemessage-input').val();
                var csrfToken = $('meta[name="csrf-token"]').attr('content');

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    }
                });

                $.post('/friendship/send-request-by-email', {
                    email: email,
                    message: message
                }, function(data) {
                    console.log(data)
                    if (data.success) {
                        alert('Lời mời kết bạn đã được gửi.');
                    } else {
                        alert(data.message);
                    }
                    $('#addcontactemail-input').val('');
                }).fail(function(xhr, status, error) {
                    var errorMessage = 'Lỗi từ máy chủ: ' + xhr.responseText;
                    alert(errorMessage);
                    console.log(errorMessage);
                });
            });

            $('#searchContact').on('change', function() {
                var inputValue = $('#searchContact').val();
                var csrfToken = $('meta[name="csrf-token"]').attr('content');

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    }
                });

                $.get('/chat/search-friend-contact', {
                    name: inputValue
                }, function(data) {
                    if (data.status) {
                        var friends = data.data;
                        console.log(friends)
                        var friendsList = $('.chat-list'); // Chọn danh sách bạn bè

                        // Xóa bỏ danh sách bạn bè cũ (nếu có)
                        friendsList.empty();

                        // Thêm các bản ghi bạn bè vào danh sách
                        friends.forEach(function(friend) {
                            var listItem = $('<li>');
                            var listItemContent = `
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0 avatar-xs ms-1 me-3">
                            <div class="avatar-title bg-soft-primary text-primary rounded-circle">
                                <i class="bx bx-file"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 overflow-hidden">
                            <h5 class="font-size-14 mb-1"><a href="#" class="text-truncate p-0">${friend.email}</a></h5>
                            <p class="text-muted text-truncate font-size-13 mb-0">${friend.username}</p>
                        </div>
                    </div>`;
                            listItem.html(listItemContent);
                            friendsList.append(listItem);
                        });
                    }
                }).fail(function(xhr, status, error) {
                    var errorMessage = 'Lỗi từ máy chủ: ' + xhr.responseText;
                    alert(errorMessage);
                    console.log(errorMessage);
                });
                // console.log(inputValue)
                // // Gọi API bằng jQuery.ajax() hoặc jQuery.get(), ví dụ:
                // $.get('/search-friends', {
                //     name: inputValue
                // }, function(response) {
                //     // Xử lý dữ liệu trả về từ API ở đây
                //     console.log(response);
                // });
            });
        });
    </script>
@endsection
