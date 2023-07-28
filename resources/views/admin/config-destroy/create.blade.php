@extends('admin.layout.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group row">
                        <label htmlFor="example-text-input" class="col-md-10 col-form-label">Cấu
                            hình cho phép huỷ yêu
                            cầu chứng thư số</label>
                    </div>
                    <form action="admin.config_destroy.create.post" method="POST" id="configFormContainer">
                        @csrf
                        @foreach ($configs as $config)
                            <div class="mb-3">
                                <div class="main-config-destroy">
                                    <input hidden type="text" value="{{ $config->id }}"
                                        class="input-type-id custom-control-input">
                                    <div class="d-flex justify-content-between">
                                        <span class="font-weight-bold">Cho phép khách hàng huỷ cầu CTS</span>
                                        <div class="custom-control custom-switch mb-2" dir="ltr">
                                            <input type="checkbox" class="custom-control-input"
                                                id="customSwitch{{ $config->id }}" {{ $config->status ? 'checked' : '' }}>
                                            <label class="custom-control-label"
                                                for="customSwitch{{ $config->id }}"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="body-config-destroy border rounded p-2">
                                    <div class="d-flex align-items-center mb-3">
                                        <span class="pl-3 mr-2">Trạng thái được huỷ</span>
                                        <select name="service_status" class="custom-select col-3" name="service_status">
                                            <option selected="" disabled>Lựa chọn trạng thái được huỷ</option>
                                            <option value="1" {{ $config->service_status == 1 ? 'selected' : '' }}>Chờ
                                                xử lý CTS</option>
                                            <option value="2" {{ $config->service_status == 2 ? 'selected' : '' }}>Chờ
                                                duyệt CTS</option>
                                            <option value="3" {{ $config->service_status == 3 ? 'selected' : '' }}>Chờ
                                                gen CTS</option>
                                            <option value="4" {{ $config->service_status == 4 ? 'selected' : '' }}>Hoàn
                                                thành CTS</option>
                                        </select>
                                    </div>
                                    <div class="main-config-destroy-detail" data-config-id="{{ $config->id }}">
                                        @foreach ($config->configDestroyDetails as $detail)
                                            <div class="d-flex align-items-center mb-3 detail-config">
                                                <input value="{{ $detail->id }}"
                                                    class="form-control mr-2 input-type-detail-id" style="width: 48px"
                                                    type="text" hidden>
                                                <span class="pl-3 mr-2">Tiền phạt khi huỷ</span>
                                                <span class="mr-2 ml-3">Từ ngày</span>
                                                <input value="{{ $detail->from }}" class="form-control mr-2"
                                                    style="width: 48px" type="text">
                                                <span class="mr-2">Đến ngày</span>
                                                <input value="{{ $detail->to }}" class="form-control mr-2"
                                                    style="width: 48px" type="text">
                                                <span class="mr-2">Kể từ ngày</span>
                                                <select class="custom-select mr-2" style="width: 120px">
                                                    <option>Lựa chọn thời gian</option>
                                                    <option value="1" {{ $detail->date_type == 1 ? 'selected' : '' }}>
                                                        Đăng ký dịch vụ</option>
                                                    <option value="2" {{ $detail->date_type == 2 ? 'selected' : '' }}>
                                                        Gen CTS</option>
                                                    <option value="3" {{ $detail->date_type == 3 ? 'selected' : '' }}>
                                                        Ngày hiệu lực</option>
                                                    <option value="4" {{ $detail->date_type == 4 ? 'selected' : '' }}>
                                                        Ngày duyệt yêu cầu CTS</option>
                                                </select>
                                                <select class="custom-select mr-2 penalty-type-select" style="width: 120px">
                                                    <option selected="">Kiểu phạt</option>
                                                    <option value="1"
                                                        {{ $detail->penalty_type == 1 ? 'selected' : '' }}>Số tiền VND
                                                    </option>
                                                    <option value="2"
                                                        {{ $detail->penalty_type == 2 ? 'selected' : '' }}>Số tiền %
                                                    </option>
                                                </select>
                                                <span class="mr-2">Tiền phạt</span>
                                                @if ($detail->penalty_type == 1)
                                                    <input value="{{ $detail->penalty_money }}" class="form-control mr-2"
                                                        style="width: 48px" type="text">
                                                @else
                                                    <input value="{{ $detail->penalty_rate }}" class="form-control mr-2"
                                                        style="width: 48px" type="text">
                                                @endif

                                                <span style="display:{{ $detail->penalty_type == 2 ? 'block' : 'none' }}"
                                                    class="mr-2 minimum-money-text">Tối
                                                    thiểu</span>
                                                <input value="{{ $detail->minimum_money }}"
                                                    class="form-control mr-2 minimum-money-input"
                                                    style="width: 48px; display:{{ $detail->penalty_type == 2 ? 'block' : 'none' }}"
                                                    type="text">
                                                <a href="#" class="text-danger ml-auto" data-toggle="tooltip"
                                                    data-placement="top" title="" data-original-title="Xoá"><i
                                                        class="mdi mdi-trash-can font-size-18"></i></a>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <span class="add-config-destroy-detail-btn justify-content-end text-primary px-2"
                                            style="cursor:pointer; text-align: end"
                                            data-config-id="{{ $config->id }}">+Thêm
                                            mức
                                            phạt</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </form>
                    <button id="addConfigButton" type="button" class="btn btn-primary waves-effect waves-light">Thêm cấu
                        hình huỷ CTS</button>
                    <button id="btn-submit" type="button" class="btn btn-primary waves-effect waves-light">Lưu</button>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
@endsection

@section('script')
    <script>
        let configCount = 0;
        // Lắng nghe sự kiện click của nút "Thêm cấu hình huỷ CTS"
        $('#addConfigButton').click(function() {
            const formHTML = `
            <div class="mb-3">
                <div class="main-config-destroy">
                    <input hidden type="text"
                                    class="input-type-id custom-control-input">
                    <div class="d-flex justify-content-between">
                        <span class="font-weight-bold">Cho phép khách hàng huỷ cầu CTS</span>
                        <div class="custom-control custom-switch mb-2" dir="ltr">
                            <input type="checkbox" class="custom-control-input" id="customSwitch${configCount}" checked>
                            <label class="custom-control-label" for="customSwitch${configCount}"></label>
                        </div>
                    </div>
                </div>
                <div class="body-config-destroy border rounded p-2">
                    <div class="d-flex align-items-center mb-3">
                        <span class="pl-3 mr-2">Trạng thái được huỷ</span>
                        <select name="service_status" class="custom-select col-3">
                            <option selected="">Lựa chọn trạng thái được huỷ</option>
                            <option value="1">Chờ xử lý CTS</option>
                            <option value="2">Chờ duyệt CTS</option>
                            <option value="3">Chờ gen CTS</option>
                            <option value="4">Hoàn thành CTS</option>
                        </select>
                    </div>
                    <div class="main-config-destroy-detail" data-config-id="${configCount}">
                        
                    </div>
                    <span class="add-config-destroy-detail-btn d-flex justify-content-end text-primary px-2" style="cursor:pointer" data-config-id="${configCount}">+Thêm mức phạt</span>
                </div>
            </div>
            `;
            $('#configFormContainer').append(formHTML);

            const configId = configCount;

            applyEventListenersToNewConfigDetail(configId);

            configCount++;
        });

        function applyEventListenersToNewConfigDetail(configId) {
            $(`.main-config-destroy-detail[data-config-id="${configId}"]`).on('click', '.add-config-destroy-detail-btn',
                function() {
                    const configId = $(this).data('config-id');
                    // Tạo HTML của các phần tử mới
                    const newDiv = `
                <div class="d-flex align-items-center mb-3">
                    <span class="pl-3 mr-2">Tiền phạt khi huỷ</span>
                    <span class="mr-2 ml-3">Từ ngày</span>
                    <input class="form-control mr-2" style="width: 48px" type="text">
                    <span class="mr-2">Đến ngày</span>
                    <input class="form-control mr-2" style="width: 48px" type="text">
                    <span class="mr-2">Kể từ ngày</span>
                    <select class="custom-select mr-2" style="width: 120px">
                        <option selected="">Lựa chọn thời gian</option>
                        <option value="1">Đăng ký dịch vụ</option>
                        <option value="2">Gen CTS</option>
                        <option value="3">Ngày hiệu lực</option>
                        <option value="4">Ngày duyệt yêu cầu CTS</option>
                    </select>
                    <select class="penalty-type-select custom-select mr-2" style="width: 120px">
                        <option selected="">Kiểu phạt</option>
                        <option value="1">Số tiền VND</option>
                        <option value="2">Số tiền %</option>
                    </select>
                    <span class="mr-2">Tiền phạt</span>
                    <input class="penalty-money-input form-control mr-2" style="width: 48px" type="text">
                    <span class="mr-2">Tối thiểu</span>
                    <input class="penalty-money-input form-control mr-2" style="width: 48px" type="text">
                    <a href="#" class="text-danger ml-auto" data-toggle="tooltip" data-placement="top"
                        title="" data-original-title="Xoá"><i
                            class="mdi mdi-trash-can font-size-18"></i></a>
                </div>
                `;
                    $(`.main-config-destroy-detail[data-config-id="${configId}"]`).append(newDiv);
                });
        }

        $('#configFormContainer').on('click', '.add-config-destroy-detail-btn', function() {
            const configId = $(this).data('config-id');
            // Tạo HTML của các phần tử mới
            const newDiv = `
            <div class="d-flex align-items-center mb-3 detail-config">
                <input
                                                    class="form-control mr-2 input-type-detail-id" style="width: 48px"
                                                    type="text" hidden>
                <span class="pl-3 mr-2">Tiền phạt khi huỷ</span>
                <span class="mr-2 ml-3">Từ ngày</span>
                <input class="form-control mr-2" style="width: 48px" type="text">
                <span class="mr-2">Đến ngày</span>
                <input class="form-control mr-2" style="width: 48px" type="text">
                <span class="mr-2">Kể từ ngày</span>
                <select class="custom-select mr-2" style="width: 120px">
                    <option selected="">Lựa chọn thời gian</option>
                    <option value="1">Đăng ký dịch vụ</option>
                    <option value="2">Gen CTS</option>
                    <option value="3">Ngày hiệu lực</option>
                    <option value="4">Ngày duyệt yêu cầu CTS</option>
                </select>
                <select class="penalty-type-select custom-select mr-2" style="width: 120px">
                    <option selected="">Kiểu phạt</option>
                    <option value="1">Số tiền VND</option>
                    <option value="2">Số tiền %</option>
                </select>
                <span class="mr-2">Tiền phạt</span>
                <input class="penalty-money-input form-control mr-2" style="width: 48px" type="text">
                <span class="mr-2 minimum-money-text" style="display: none;">Tối thiểu</span>
                <input class="minimum-money-input form-control mr-2" style="width: 48px;display: none" type="text">
                <span class="text-danger ml-auto" data-toggle="tooltip" data-placement="top"
                    title="" data-original-title="Xoá"><i
                        class="mdi mdi-trash-can font-size-18"></i></span>
            </div>
        `;
            $(`.main-config-destroy-detail[data-config-id="${configId}"]`).append(newDiv);
        });

        $('#configFormContainer').on('change', '.penalty-type-select', function() {
            const minimumMoneyInput = $(this).closest('.detail-config').find('.minimum-money-input');
            const minimumMoneyText = $(this).closest('.detail-config').find('.minimum-money-text');
            const penaltyType = $(this).val();
            if (penaltyType === '2') {
                minimumMoneyText.css('display', 'block');
                minimumMoneyInput.css('display', 'block');
            } else {
                minimumMoneyText.css('display', 'none');
                minimumMoneyInput.css('display', 'none');
            }
            minimumMoneyInput.val(null);
        });

        function collectFormData() {
            const configDestroy = [];
            $('.main-config-destroy').each(function() {
                const config = {
                    id: +$(this).find('.input-type-id').val(),
                    service: 1, // Replace with actual service value
                    service_status: +$(this).parent().find('select[name="service_status"]').val(),
                    status: $(this).find('input[type="checkbox"]').prop('checked'),
                    config_destroy_details: []
                };

                $(this).siblings('.body-config-destroy').find('.detail-config').each(function() {
                    const detail = {
                        id: +$(this).find('.input-type-detail-id').val(),
                        from: +$(this).find('input:eq(0)').val(),
                        to: +$(this).find('input:eq(1)').val(),
                        date_type: +$(this).find('select:eq(0)').val(),
                        penalty_type: +$(this).find('select:eq(1)').val(),
                        penalty_money: +$(this).find('input:eq(2)').val(),
                        penalty_rate: +$(this).find('input:eq(3)').val(),
                        minimum_money: +$(this).find('input:eq(4)').val()
                    };
                    config.config_destroy_details.push(detail);
                });

                configDestroy.push(config);
            });

            return configDestroy;
        }

        $('#btn-submit').click(function() {
            const configDestroyData = collectFormData();
            console.log(configDestroyData);
            const jsonData = JSON.stringify(configDestroyData);
            const csrfToken = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                type: 'POST',
                url: '/admin/config-destroy/create', // Thêm dấu phẩy ở đây
                data: jsonData,
                contentType: 'application/json',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                },
                success: function(response) {
                    alert("Thành công");
                    window.location.href = 'http://127.0.0.1:8000/admin/config-destroy';
                },
                error: function(xhr, status, error) {
                    console.error('Lỗi khi gửi yêu cầu AJAX:', error);
                }
            });
        });

        $('#configFormContainer').on('click', '.detail-config .text-danger', function() {
            const configId = $(this).closest('.main-config-destroy-detail').data('config-id');
            $(this).closest('.detail-config').remove(); // Xoá bản ghi chi tiết trên giao diện
            applyEventListenersToNewConfigDetail(configId);
        });
    </script>
@endsection
