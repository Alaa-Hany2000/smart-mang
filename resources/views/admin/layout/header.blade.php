<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>


    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
            <!-- <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div> -->
        </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->

        <li class="nav-item dropdown">
            <a class="nav-link" href="{{url('/admin/editAccount')}}">
                <i class="far fa-user"></i>
            </a>

        </li>
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">
                <i class="far fa-bell"></i>
                <span id="noti-badge" class="badge badge-warning navbar-badge">{{ count(auth()->user()->unreadNotifications) > 0 ? count(auth()->user()->unreadNotifications) : '' }}</span>

            </a>
            @if(count(auth()->user()->unreadNotifications ) > 0)
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                @foreach(auth()->user()->unreadNotifications as $noti)
                @if($noti->type == 'App\Notifications\ProductLowStock')
                <a class="dropdown-item hr" href="#" onclick="notifcationRead({{ "'".$noti->id."'" }},this)"><h5>{{ $noti->data['product']['title'] }} </h5><p>{{ $noti->data['product']['body'] }} </p></a>
                @endif
                @endforeach
            </div>
            @endif
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button"><i class="fas fa-th-large"></i></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{url('/admin/logout')}}">
                <i class="fa fa-sign-out-alt"></i>
            </a>
        </li>
    </ul>
</nav>
<script>
    function notifcationRead(id,ele){
        const data = {};
        data["id"] = id
        fetch(`/admin/notifcation-read/${id}`, {
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json",
                "X-Requested-With": "XMLHttpRequest",
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            credentials: "same-origin",
            method: 'post',
            body: JSON.stringify(data),
        }).then((response) => response.json()).then((data) => {

            if(data === true){
                ele.remove();
                let notiNum = $('#noti-badge').html()-1

                $('#noti-badge').html(notiNum <= 0 ?  '' : notiNum)
                console.log($('#noti-badge').html())
            }
        });
    }
</script>
<!-- /.navbar -->
@include('admin.layout.sidebar')
