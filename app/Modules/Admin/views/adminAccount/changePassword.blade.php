    <!-- LOGIN SECTION -->
    <div class="modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{trans('Change Password')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alerts">
                    </div>
                    <form class="s12" method="post" action="" id="changepasswrdform">
                        @csrf
                        <div>
                            <div class="form-group s12">
                                <label>{{trans('Old Password')}}</label>
                                <input type="password" data-ng-model="name" required class="validate form-control" id="oldPassword" name="old">

                            </div>
                        </div>
                        <div>
                            <div class="form-group s12">
                                <label>{{trans('New Password')}}</label>
                                <input type="password" class="validate form-control" name="new" id="newPassword" required>

                            </div>
                        </div>

                        <div>
                            <div class="form-group s12">
                                <label>{{trans(' confirm New Password')}}</label>
                                <input type="password" class="validate form-control" name="confirm" id="configPassword" required>

                            </div>
                        </div>

                        <div>
                        </div>
                        <div>
                    </form>
                </div>
                <div class="modal-footer">
                    <input type="button" onclick="changeMe()" id="changePassword" value="{{trans('Save Password')}}" class="btn btn-info"> </div>
            </div>
        </div>
    </div>
    </div>
    @push("js")
    <script type="text/javascript">
        $(document).ready(function(){

        })
        function changeMe() {
            // e.preventDefault();
            let oldPassword = $("#oldPassword");
            let newPassword = $("#newPassword");
            let configPassword = $("#configPassword");
            if (oldPassword.val() == '' && newPassword.val() == '' && configPassword.val() == '') {
                return $('.alerts').append($(`<h3 class="alert alert-danger text-center">Required Fields</h3>`));
            };

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{url('cp/changepassword')}}",
                method: "post",
                "_token": "{{ csrf_token() }}",
                data: {
                    'old': oldPassword.val(),
                    'new': newPassword.val(),
                    'confirm': configPassword.val()
                },
                success(data) {
                    if (data.fail) {
                        $('.alerts').children().remove();
                        $(`<h3 style="color:red;font-size:22px;text-align:center">${data.fail}</h3>`).appendTo($('.alerts'));

                    } else if (data.message) {
                        $('.alerts').children().remove();
                        $(`<h3 style="color:green;font-size:22px;text-align:center">${data.message}</h3>`).appendTo($('.alerts'));
                    } else {
                        $('.alerts').children().remove();
                        $(`<h3 style="color:red;font-size:22px;text-align:center">${data.confirm}</h3>`).appendTo($('.alerts'));
                    }
                },
                error: function() {
                    console.log('error');
                },
                complete: function() {}

            });

        };
    </script>
    @endpush
    @push('css')
    <link rel="stylesheet" href="{{ asset('admin/css/style.css')}}">

    @endpush