<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('/')}}" class="brand-link" class="text-align:center">
        <img src="{{asset('upload').'/'.$settings['logo']}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
       <br/>
        <span class="brand-text font-weight-light">{{ $settings->ar_title }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
         @if(auth()->user()->photo != null)
                    <img src="<?php echo asset('upload/adminProfile/') . '/' .auth()->user()->photo ?>" class="img-circle elevation-2" alt="User Image">
                @else
                    <img src="{{ asset('admin/img/image.jpg') }}" class="img-circle elevation-2" alt="User Image">
                @endif
            </div>
            <div class="info">

                <a href="{{url('/admin/editAccount')}}" class="d-block">{{ auth()->user()->name }}</a>

            </div>
        </div>
        <?php
        $navList = [
            [
                "href" => ('/admin/dashboard'),
                "title" => trans("main.Dashboard"),
                "icon" => "fa-tachometer-alt",

            ],
            [
                "href" => "#",
                "title" => trans("main.Categories"),
                "icon" => "fa-edit",
                "child" => [
                  /*  [
                        "href" => ("admin/adminStores"),
                        "title" => trans("main.stores"),
                    ],*/
                    [
                        "href" => ('admin/adminCategories'),
                        "title" => trans("main.Categories"),
                    ],  [
                        "href" => ('admin/adminUnits'),
                        "title" => trans("main.Units"),
                        "icon" => "fa-tachometer-alt",

                    ],
                ]
            ],
              [
                "href" => "#",
                "title" => trans("main.Products"),
                "icon" => "fa-newspaper",
                "child" => [
                    [
                        "href" => ("admin/adminProducts"),
                        "title" => trans("main.Products"),
                    ]
                ]
            ],

            [
                "href" => "#",
                "title" => trans("main.Customers and Suppliers"),
                "icon" => "fa-book",
                "child" => [
                    [
                        "href" => ("admin/adminCustomers"),
                        "title" => trans("main.Customers"),
                    ],
                    [
                        "href" => ('admin/adminSuppliers'),
                        "title" => trans("main.Suppliers"),
                    ],
                ]
            ],    [
                "href" => "#",
                "title" => trans("main.Bills And Balances"),
                "icon" => "fa-briefcase",
                "child" => [
                    [
                        "href" => ("admin/adminBills"),
                        "title" => 'فاوتير البيع',
                    ],
                       [
                        "href" => ("admin/spluersBill"),
                        "title" => 'فاوتير الشراء',
                    ],
                     [
                        "href" => ("admin/billsreback"),
                        "title" => 'فاوتير المرتجع',
                    ],
                      [
                        "href" => ("admin/spluersBack"),
                        "title" => 'فاوتير اعاده للمورد',
                    ],
                      [
                        "href" => ("admin/damagebill"),
                        "title" => ' الهوالك',
                    ],

                ]
            ],

            [
                "href" => "#",
                "title" => 'حركة الحسابات',
                "icon" => "fa-address-book",
                "child" => [
                    [
                        "href" => ("admin/blances"),
                        "title" => 'الحسابات',
                    ],

                ]
            ], 
        ];
        $adminList = [


            [
                "href" => ('/admin/settings'),
                "title" => trans("main.Settings"),
                "icon" => "fa-cog"
            ],
       /* ["href" => "#", "title" => trans("main.adminSalaries"), "icon" => "fa-newspaper", "child" => [["href" => ("admin/adminSalaries"), "title" => trans("main.adminSalaries"), "icon" => "fa-newspaper", ] ] ], ["href" => "#", "title" => trans("main.adminSalaries"), "icon" => "fa-newspaper", "child" => [["href" => ("admin/adminSalaries"), "title" => trans("main.adminSalaries"), "icon" => "fa-newspaper", ] ] ],*/ [
                "href" => ('/admin/listUsers'),
                "title" => trans("main.User Management"),
                "icon" => "fa-user"
            ],



        ];
        function menu($navList)
        {
            foreach ($navList as $item) {
                $active = "";
                //echo $item["href"]." lll";

                //  var_dump($href,request()->is($href));
                $href = ltrim(($item["href"]), "/");
                if ($item["href"] == "#") {
                    if (array_key_exists("child", $item)) {

                        foreach ($item["child"] as $i) {
                            $href = ltrim(($i["href"]), "/");
                            if (request()->is($href)) {
                                $active = "active";
                            }
                        }
                    }
                } else if (request()->is($href)) {

                    $active = "active";
                }
        ?>
                <li class="nav-item ">
                    <a href="{{ url($item['href']) }}" class="nav-link {{ $active }}">
                        <i class="nav-icon fas {{ $item['icon'] }}"></i>
                        <p>
                            {{ $item["title"] }}
                            <?php if (array_key_exists("child", $item)) { ?>
                                <i class="right fas fa-angle-left"></i>
                            <?php } ?>
                        </p>
                    </a>
                    <?php if (array_key_exists("child", $item)) { ?>
                        <ul class="nav nav-treeview" <?php if ($active == "active") { ?>style="display: block;" <?php } ?>>
                            <?php foreach ($item["child"] as $child) { ?>
                                <li class="nav-item">
                                    <a href="{{ url($child['href']) }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{ $child['title'] }}</p>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    <?php } ?>
                </li>
        <?php
            }
        }
        ?>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->

{{--

--}}




   <?php

                menu($navList);
                if (auth()->user()->hasRole('admin'))
                    menu($adminList);


                ?>





            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
        <h5>{{ trans("main.Title") }}</h5>
        <p>{{ trans("main.Sidebar content") }}</p>
    </div>
</aside>
<!-- /.control-sidebar -->
