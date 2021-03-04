<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            <li class="nav-item  {{\Request::route()->getName() == 'admin.dashboard' ? 'active' : ''}}"><a
                    href="{{route('admin.dashboard')}}"><i class="la la-mouse-pointer"></i><span
                        class="menu-title" data-i18n="nav.add_on_drag_drop.main">الرئيسية </span></a>
            </li>

            @if (auth()->guard('admin')->user()->hasPermission('read_messages'))
                <li class="nav-item  {{\Request::route()->getName() == 'messages.index' ? 'active' : ''}}"><a
                        href="{{route('messages.index')}}"><i class="la la-mouse-pointer"></i>
                        <span class="menu-title" data-i18n="nav.add_on_drag_drop.main">الرسائل </span></a>
                </li>
            @endif


{{--            start settings--}}

                <li class="nav-item  {{\Request::route()->getName() == 'messages.index' ? 'active' : ''}}"><a
                        href="{{route('settings.index')}}"><i class="la la-mouse-pointer"></i>
                        <span class="menu-title" data-i18n="nav.add_on_drag_drop.main"> الاعدادات </span></a>
                </li>

{{--            end settings--}}


{{--            start question and answer--}}
            <li class="nav-item"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main"> Q & A </span>
                    <span class="badge badge badge-danger badge-pill float-right mr-2">{{\App\Models\QuestionAndAnswer::count()}}</span>
                </a>
                <ul class="menu-content">

                        <li class="{{\Request::route()->getName() == 'question_and_answer.index' ? 'active' : ''}}">
                            <a class="mappenu-item " href="{{route('question_and_answer.index')}}" data-i18n="nav.dash.ecommerce"> show all </a>
                        </li>


                        <li class="{{\Request::route()->getName() == 'question_and_answer.create' ? 'active' : ''}}">
                            <a class="menu-item" href="{{route('question_and_answer.create')}}" data-i18n="nav.dash.crypto">add new Q & A </a>
                        </li>

                </ul>
            </li>
{{--            end question and answer--}}


            <li class="nav-item"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main"> المشرفين </span>
                    <span
                        class="badge badge badge-danger badge-pill float-right mr-2">{{\App\Models\Admin::whereRoleIs('admin')->count()}}</span>
                </a>
                <ul class="menu-content">
                    @if (auth()->guard('admin')->user()->hasPermission('read_admins'))
                        <li class="{{\Request::route()->getName() == 'admins.index' ? 'active' : ''}}">
                            <a class="mappenu-item " href="{{route('admins.index')}}" data-i18n="nav.dash.ecommerce">
                                عرض
                                الكل </a>
                        </li>
                    @endif

                    @if (auth()->guard('admin')->user()->hasPermission('create_admins'))
                        <li class="{{\Request::route()->getName() == 'admins.create' ? 'active' : ''}}">
                            <a class="menu-item" href="{{route('admins.create')}}" data-i18n="nav.dash.crypto">أضافة
                                مشرف
                                جديد </a>
                        </li>
                    @endif
                </ul>
            </li>

            {{--end of the admins --}}

            <li class="nav-item"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main"> الاقسام </span>
                    <span
                        class="badge badge badge-danger badge-pill float-right mr-2">{{\App\Models\Category::count()}}</span>
                </a>
                <ul class="menu-content">
                    @if (auth()->guard('admin')->user()->hasPermission('read_categories'))
                        <li class="{{\Request::route()->getName() == 'category.index' ? 'active' : ''}}">
                            <a class="mappenu-item " href="{{route('category.index')}}" data-i18n="nav.dash.ecommerce">
                                عرض
                                الكل </a>
                        </li>
                    @endif

                    @if (auth()->guard('admin')->user()->hasPermission('create_categories'))
                        <li class="{{\Request::route()->getName() == 'category.create' ? 'active' : ''}}">
                            <a class="menu-item" href="{{route('category.create')}}" data-i18n="nav.dash.crypto">أضافة
                                قسم
                                جديد </a>
                        </li>
                    @endif
                </ul>
            </li>

            {{--end of the categories--}}

            <li class="nav-item"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main"> البلاد </span>
                    <span
                        class="badge badge badge-danger badge-pill float-right mr-2">{{\App\Models\Country::count()}}</span>
                </a>
                <ul class="menu-content">
                    @if (auth()->guard('admin')->user()->hasPermission('read_countries'))
                        <li class="{{\Request::route()->getName() == 'countries.index' ? 'active' : ''}}">
                            <a class="mappenu-item " href="{{route('countries.index')}}" data-i18n="nav.dash.ecommerce">
                                عرض
                                الكل </a>
                        </li>
                    @endif

                    @if (auth()->guard('admin')->user()->hasPermission('create_countries'))
                        <li class="{{\Request::route()->getName() == 'countries.create' ? 'active' : ''}}">
                            <a class="menu-item" href="{{route('countries.create')}}" data-i18n="nav.dash.crypto">أضافة
                                بلد
                                جديد </a>
                        </li>
                    @endif

                </ul>
            </li>

            {{--end of the countries--}}

            <li class="nav-item"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main"> المدن </span>
                    <span
                        class="badge badge badge-danger badge-pill float-right mr-2">{{\App\Models\City::count()}}</span>
                </a>
                <ul class="menu-content">
                    @if (auth()->guard('admin')->user()->hasPermission('read_cities'))
                        <li class="{{\Request::route()->getName() == 'cities.index' ? 'active' : ''}}">
                            <a class="mappenu-item " href="{{route('cities.index')}}" data-i18n="nav.dash.ecommerce">
                                عرض
                                الكل </a>
                        </li>
                    @endif
                    @if (auth()->guard('admin')->user()->hasPermission('create_cities'))
                        <li class="{{\Request::route()->getName() == 'cities.create' ? 'active' : ''}}">
                            <a class="menu-item" href="{{route('cities.create')}}" data-i18n="nav.dash.crypto">أضافة مدن
                                جديد </a>
                        </li>
                    @endif

                </ul>
            </li>

            {{-- end of the cities --}}

            <li class="nav-item"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main"> الشحنات </span>
                    <span
                        class="badge badge badge-danger badge-pill float-right mr-2">{{\App\Models\Shipping::count()}}</span>
                </a>
                <ul class="menu-content">
                    @if (auth()->guard('admin')->user()->hasPermission('read_shippings'))
                        <li class="{{\Request::route()->getName() == 'shippings.index' ? 'active' : ''}}">
                            <a class="mappenu-item " href="{{route('shippings.index')}}" data-i18n="nav.dash.ecommerce">
                                عرض الكل </a>
                        </li>
                    @endif
                    @if (auth()->guard('admin')->user()->hasPermission('create_shippings'))
                        <li class="{{\Request::route()->getName() == 'shippings.create' ? 'active' : ''}}">
                            <a class="menu-item" href="{{route('shippings.create')}}" data-i18n="nav.dash.crypto">أضافة
                                شحنه
                                جديد </a>
                        </li>
                    @endif
                </ul>
            </li>

{{--            end of shippings--}}
            <li class="nav-item"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main"> الضريبه </span>
                    <span
                        class="badge badge badge-danger badge-pill float-right mr-2">{{\App\Models\Tax::count()}}</span>
                </a>
                <ul class="menu-content">

                    @if (auth()->guard('admin')->user()->hasPermission('read_taxes'))
                    <li class="{{\Request::route()->getName() == 'taxes.index' ? 'active' : ''}}">
                        <a class="mappenu-item " href="{{route('taxes.index')}}" data-i18n="nav.dash.ecommerce"> عرض
                            الكل </a>
                    </li>
                    @endif
                    @if (auth()->guard('admin')->user()->hasPermission('create_taxes'))
                    <li class="{{\Request::route()->getName() == 'taxes.create' ? 'active' : ''}}">
                        <a class="menu-item" href="{{route('taxes.create')}}" data-i18n="nav.dash.crypto">أضافة ضريبه
                            جديد </a>
                    </li>
                        @endif
                </ul>
            </li>
{{--end of the taxes--}}


            <li class="nav-item"><a href=""><i class="la la-group"> </i>
                    <span class="menu-title" data-i18n="nav.dash.main">العلامات التجارية</span>
                    <span
                        class="badge badge badge-danger badge-pill float-right mr-2">{{\App\Models\Brand::count()}}</span>
                </a>
                <ul class="menu-content">
                    @if (auth()->guard('admin')->user()->hasPermission('read_brands'))
                    <li class="{{\Request::route()->getName() == 'brands.index' ? 'active' : ''}}">
                        <a class="menu-item" href="{{route('brands.index')}}" data-i18n="nav.dash.ecommerce">   عرض الكل </a>
                    </li>
                    @endif

                @if (auth()->guard('admin')->user()->hasPermission('create_brands'))
                    <li class="{{\Request::route()->getName() == 'brands.create' ? 'active' : ''}}">
                        <a class="menu-item"href="{{route('brands.create')}}" data-i18n="nav.dash.crypto">أضافة علامه تجاريه جديده </a>
                    </li>
                    @endif
                </ul>
            </li>

            <li class="nav-item"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">الخامات </span>
                    <span
                        class="badge badge badge-danger badge-pill float-right mr-2">{{\App\Models\Material::count()}}</span>
                </a>
                <ul class="menu-content">
                    @if (auth()->guard('admin')->user()->hasPermission('read_material'))
                        <li class="{{\Request::route()->getName() == 'materials.index' ? 'active' : ''}}">
                            <a class="menu-item" href="{{route('materials.index')}}" data-i18n="nav.dash.ecommerce"> عرض
                                الكل </a>
                        </li>
                    @endif
                   @if (auth()->guard('admin')->user()->hasPermission('create_material'))
                        <li class="{{\Request::route()->getName() == 'materials.create' ? 'active' : ''}}">
                        <a class="menu-item" href="{{route('materials.create')}}" data-i18n="nav.dash.crypto">أضافه
                            خامات </a>
                        </li>
                    @endif
                </ul>
            </li>

            <li class="nav-item"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">المنتجات</span>
                    <span
                        class="badge badge badge-danger badge-pill float-right mr-2">{{\App\Models\Product::count()}}</span>
                </a>
                <ul class="menu-content">
                    @if (auth()->guard('admin')->user()->hasPermission('read_products'))
                        <li class="{{\Request::route()->getName() == 'products.index' ? 'active' : ''}}">
                            <a class="menu-item" href="{{route('products.index')}}" data-i18n="nav.dash.ecommerce"> عرض
                                الكل </a>
                        </li>
                    @endif
                    @if (auth()->guard('admin')->user()->hasPermission('create_products'))
                        <li class="{{\Request::route()->getName() == 'products.create' ? 'active' : ''}}">
                            <a class="menu-item" href="{{route('products.create')}}" data-i18n="nav.dash.crypto"> اضافة منتج
                                جديد </a>
                        </li>
                    @endif
                </ul>
            </li>
        </ul>
    </div>
</div>

