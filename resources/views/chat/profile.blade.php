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
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center p-3 p-lg-4 border-bottom pt-2 pt-lg-2 mt-n5 position-relative">
            <div class="mb-lg-3 mb-2">
                @if (auth()->user()->avatar)
                    <img src="{{ Storage::url(auth()->user()->avatar) }}" class="rounded-circle avatar-lg img-thumbnail"
                        alt="">
                @else
                    <img src="{{ asset('assets-1/images/user.png') }}" class="rounded-circle avatar-lg img-thumbnail"
                        alt="">
                @endif
            </div>

            <h5 class="font-size-16 mb-1 text-truncate">{{ auth()->user()->username }}</h5>
            <p class="text-muted font-size-14 text-truncate mb-0">.Net Developer</p>
        </div>

        <!-- End profile user -->

        <!-- Start user-profile-desc -->
        <div class="p-4 profile-desc" style="height: unset !important;" data-simplebar>
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
                        <p class="mb-0">{{ auth()->user()->username }}</p>
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
                        <p class="mb-0">{{ auth()->user()->full_name }}</p>
                    </div>
                </div>
            </div>
            {{-- <hr class="my-4">

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
            </div> --}}

        </div>
        <!-- end user-profile-desc -->
    </div>
    <!-- End profile content -->
</div>

@section('script-profile')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/4.4.1/socket.io.min.js"></script>
    <script>
        const socket = io("http://localhost:3008", {
            transports: ["websocket"],
        });

        let userId = $("#user").val();

        socket.emit('user_connected', userId);

        socket.on("user_list", (users) => {
            let userIdChat = $("#id-user-current").attr("data-user-id-current");
            console.log("user đang online", userIdChat)
            var isUserOnline = users.some(function(user) {
                return +user.userId === +userIdChat;
            });

            $("#status-online-current").text(isUserOnline ? "Online" : "Offline");
            $(".chat-user-img.online .user-status").css("background-color", isUserOnline ? "#06d6a0" : "red")

            console.log(isUserOnline)
        });

        socket.on("send_message_response", (data1) => {
            console.log("day la ca 2 nhe", data1)
            $.get('/messages/' + data1?.userId, {}, function(data) {
                console.log(data)
                if (data.status) {
                    let messages = data?.data;
                    console.log("Day laf", messages, "user la", +data?.receiverUserId)

                    var conversationList = $(
                        "#users-conversation-1");
                    conversationList.empty();

                    messages.forEach(function(message) {
                        var chatList = `
            <li class="chat-list ${+message?.sender?.id === +data1?.receiverUserId ? 'right' : 'left'}" id="${message.id}">
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

        socket.on('connect', () => {
            console.log('Connected to server');
        });

        $('#send').click(function() {
            const message = $('#input').val().trim();
            console.log(message)
            if (message !== '') {
                sendMessage(message);
                $('#input').val('');
            }
        });

        $('#send-btn').click(function() {
            let userIdCurrent = $("#id-user-current").data("user-id-current");
            let message = $("#chat-input-1").val();
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                }
            });

            $.post('/messages', {
                "friendId": userIdCurrent,
                "message": message
            }, function(data) {
                if (data.status) {
                    console.log(data)
                    $.get('/messages/' + userIdCurrent, {}, function(data) {
                        console.log(data)
                        if (data.status) {
                            let messages = data?.data;

                            var conversationList = $(
                                "#users-conversation-1");
                            conversationList.empty();
                            let userAuthId = $("#user-auth").val();

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
                            let userIdCurrent = $("#id-user-current").data("user-id-current");
                            let userId = $('#user-auth').val();
                            console.log("ddaay la usser", userId)
                            console.log("ddaay la usser nhan", userIdCurrent)
                            socket.emit('send_message_request', userId, userIdCurrent);
                        }
                    }).fail(function(xhr, status, error) {
                        var errorMessage = 'Lỗi từ máy chủ: ' + xhr.responseText;
                        alert(errorMessage);
                        console.log(errorMessage);
                    });
                }
            }).fail(function(xhr, status, error) {
                var errorMessage = 'Lỗi từ máy chủ: ' + xhr.responseText;
                alert(errorMessage);
                console.log(errorMessage);
            });
            $("#chat-input-1").val('');
        });

        socket.on('friend_request_received', (data) => {
            console.log(data)
            const shouldAccept = confirm("Bạn nhận được yêu cầu kết bạn từ user có id:", data?.senderUserId);

            if (shouldAccept) {
                console.log("Đã chấp nhận kết bạn")
                var csrfToken = $('meta[name="csrf-token"]').attr('content');
                console.log("Người chap nhan", data?.senderUserId)
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    }
                });
                $.post('/friendship/accept', {
                    "friend_id": data?.senderUserId,
                }, function(data) {
                    if (data.status) {
                        console.log(data)
                        alert("Chấp nhận kết bạn thành công")
                    } else {
                        console.log("Thâtgs bại chấp nhận")
                    }
                }).fail(function(xhr, status, error) {
                    var errorMessage = 'Lỗi từ máy chủ: ' + xhr.responseText;
                    alert(errorMessage);
                    console.log(errorMessage);
                });

                // Sau khi xác nhận kết bạn, bạn có thể emit sự kiện để thông báo lại phía server
                socket.emit('friend_request_accepted', {
                    sender_id: data.senderUserId
                });
            }
            console.log("Chưa chấp nhận kết bạn")
        });

        function sendMessage(message) {
            socket.emit('user_send_message', message, 1, 1);
        }
    </script>
@endsection
