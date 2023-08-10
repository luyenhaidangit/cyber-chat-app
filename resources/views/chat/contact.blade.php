<div class="tab-pane" id="pills-contacts" role="tabpanel" aria-labelledby="pills-contacts-tab">
    <!-- Start Contact content -->
    <div>
        <div class="px-4 pt-4">
            <div class="d-flex align-items-start">
                <div class="flex-grow-1">
                    <h4 class="mb-4">Liên lạc</h4>
                    <input hidden id="user-auth" value="{{ auth()->user()->id }}">
                    <input hidden id="user" value="{{ auth()->user()->id }}">
                </div>
                <div class="flex-shrink-0">
                    <div data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="bottom"
                        title="Thêm liên lạc">

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-soft-primary btn-sm" data-bs-toggle="modal"
                            data-bs-target="#addContact-exampleModal">
                            <i class="bx bx-plus"></i>
                        </button>
                        <input id="user-auth" hidden value="{{ Auth::id() }}">
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
            <div class="">
                <ul id="user-friends" class="list-unstyled chat-list px-3">
                    @foreach ($friends as $friend)
                        <li class="user-friend" data-id="{{ $friend->id }}" data-user-{{ $friend->id }}-status="0">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 avatar-xs ms-1 me-3">
                                    <div class="avatar-title bg-soft-primary text-primary rounded-circle">
                                        <img height="20" width="20"
                                            data-user-{{ $friend->id }}-avatar="{{ Storage::url($friend->avatar) }}"
                                            src="{{ Storage::url($friend->avatar) }}" />
                                    </div>
                                </div>
                                <div class="flex-grow-1 overflow-hidden">
                                    <h5 class="font-size-14 mb-0"><a href="javascript:void(0)" class="text-truncate p-0"
                                            data-user-{{ $friend->id }}-username="{{ $friend->username }}">{{ $friend->username }}</a>
                                    </h5>
                                </div>

                                <div class="flex-shrink-0 ms-3">
                                    <div class="dropdown">
                                        <a class="dropdown-toggle font-size-16 text-muted px-1"
                                            href="javascript:void(0)" role="button" data-bs-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item d-flex align-items-center justify-content-between">Sửa
                                                <i class="bx bx-folder-open ms-2 text-muted"></i></a>
                                            <a class="dropdown-item d-flex align-items-center justify-content-between">Chặn
                                                <i class="bx bx-pencil ms-2 text-muted"></i></a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item d-flex align-items-center justify-content-between">Xoá
                                                <i class="bx bx-trash ms-2 text-muted"></i></a>
                                        </div>
                                    </div>
                                </div>
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

@section('script-contact')
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

                let userId = $("#user").val();

                $.post('/friendship/send-request-by-email', {
                    email: email,
                    message: message
                }, function(data) {
                    console.log(data)
                    if (data.status) {
                        console.log(data)
                        console.log("Đây là user", data?.data?.user_id)
                        socket.emit('send_friend_request', data?.data?.user_id, data?.data
                            ?.friend_id);
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

            $('#searchContact').on('input', function() {
                console.log("run")
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
                            var listItem = $(
                                `<li class="user-friend" data-id="${friend.id}" data-user-${friend.id}-status="">`
                            );
                            var listItemContent = `
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0 avatar-xs ms-1 me-3">
                            <div class="avatar-title bg-soft-primary text-primary rounded-circle">
                                <img data-user-${friend.id}-avatar="/storage/${friend.avatar}" src="/storage/${friend.avatar}">
                            </div>
                        </div>
                        <div class="flex-grow-1 overflow-hidden">
                            <h5 class="font-size-14 mb-1"><a data-user-${friend.id}-username="${friend.username}" href="javascript:void(0)" class="text-truncate p-0">${friend.username}</a></h5>
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

            $('#user-friends').on('click', '.user-friend', function() {
                $('#user-chat').css('display', 'block');
                socket.emit('user_connected', userId);

                let userAuthId = $("#user-auth").val();
                console.log(userAuthId)
                let friendId = $(this).data('id');

                let username = $('a[data-user-' + friendId + '-username]').data('user-' + friendId +
                    '-username');
                let avatar = $('img[data-user-' + friendId + '-avatar]').data('user-' + friendId +
                    '-avatar');

                $(".username-user").text(username);
                $(".avatar-user").attr('src', avatar);
                let userElements = $("[data-user-id-current]");
                userElements.each(function() {
                    $(this).attr("data-user-id-current", friendId);
                });

                $.get('/messages/' + friendId, {}, function(data) {
                    console.log(data)
                    if (data.status) {
                        let messages = data?.data;

                        var conversationList = $(
                            "#users-conversation-1");
                        conversationList.empty();

                        messages.forEach(function(message) {
                            var chatList = `
            <li class="chat-list ${message?.sender?.id === +userAuthId ? 'right' : 'left'}" id="${message.id}">
            <div class="conversation-list">
                <div class="chat-avatar"><img src="/storage/${message.sender.avatar}" alt=""></div>
                <div class="user-chat-content">
                    <div class="ctext-wrap">
                        <div class="ctext-wrap-content" id="${message.id}">
                            <p class="mb-0 ctext-content">${message.message}</p>
                        </div>
                    </div>
                    <div class="conversation-name"><small class="text-muted time"></small><span class="text-success check-message-icon"><i class="bx bx-check-double"></i></span></div>
                </div>
            </div>
        </li>
    `;
                            conversationList.append(chatList);
                        });
                    }
                }).fail(function(xhr, status, error) {
                    var errorMessage = 'Lỗi từ máy chủ: ' + xhr.responseText;
                    alert(errorMessage);
                    console.log(errorMessage);
                });
            });
        });
    </script>
@endsection
