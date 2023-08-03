<!-- JAVASCRIPT -->
<script src="{{ asset('assets-1/libs/jquery/jquery.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/4.1.2/socket.io.js"></script>
<script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>

<!-- theme-style init -->
<script src="{{ asset('assets/js/pages/theme-style.init.js') }}"></script>
<script src="{{ asset('assets/js/app.js') }}"></script>

<script>
    // Thay thế URL bằng URL của máy chủ Socket.IO của bạn
</script>

<script>
    var socket = io('http://localhost:3000');
    socket.on('message', function(data) {
        console.log("Da nhan thanh cong");
        var messageDiv = document.createElement('div');
        messageDiv.textContent = data.text;
        document.getElementById('messageContainer').appendChild(messageDiv);
    });
    console.log(socket)
    // Gửi tin nhắn
    document.getElementById('messageForm').addEventListener('submit', function(event) {
        event.preventDefault();
        var message = document.getElementById('messageInput').value;
        socket.emit('sendMessage', {
            text: message
        });
        console.log("Da nhan tin")
        document.getElementById('messageInput').value = ''; // Xóa nội dung trong input
    });
</script>

<script>
    // Lắng nghe sự kiện "message" từ máy chủ và hiển thị tin nhắn
    // socket.on('message', function(data) {
    //     console.log('Received message from server:', data.text);
    //     // Tùy chỉnh mã để hiển thị tin nhắn trên giao diện của bạn
    // });
</script>
