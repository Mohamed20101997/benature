<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            <li class="nav-item  {{\Request::route()->getName() == 'admin.dashboard' ? 'active' : ''}}"><a href="{{route('admin.dashboard')}}"><i class="la la-mouse-pointer"></i><span
                        class="menu-title" data-i18n="nav.add_on_drag_drop.main">الرئيسية </span></a>
            </li>
            <li class="nav-item  {{\Request::route()->getName() == 'messages.index' ? 'active' : ''}}"><a href="{{route('messages.index')}}"><i class="la la-mouse-pointer"></i>
                <span class="menu-title" data-i18n="nav.add_on_drag_drop.main">الرسائل </span></a>
            </li>
            <li class="nav-item"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main"> الاقسام </span>
                    <span  class="badge badge badge-danger badge-pill float-right mr-2">{{\App\Models\Category::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class="{{\Request::route()->getName() == 'category.index' ? 'active' : ''}}">
                        <a class="mappenu-item " href="{{route('category.index')}}" data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                    <li class="{{\Request::route()->getName() == 'category.create' ? 'active' : ''}}">
                        <a class="menu-item" href="{{route('category.create')}}" data-i18n="nav.dash.crypto">أضافة قسم جديد </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main"> الشحنات </span>
                    <span  class="badge badge badge-danger badge-pill float-right mr-2">{{\App\Models\Shipping::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class="{{\Request::route()->getName() == 'shippings.index' ? 'active' : ''}}">
                        <a class="mappenu-item " href="{{route('shippings.index')}}" data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                    <li class="{{\Request::route()->getName() == 'shippings.create' ? 'active' : ''}}">
                        <a class="menu-item" href="{{route('shippings.create')}}" data-i18n="nav.dash.crypto">أضافة شحنه جديد </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main"> البلاد </span>
                    <span  class="badge badge badge-danger badge-pill float-right mr-2">{{\App\Models\Country::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class="{{\Request::route()->getName() == 'countries.index' ? 'active' : ''}}">
                        <a class="mappenu-item " href="{{route('countries.index')}}" data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                    <li class="{{\Request::route()->getName() == 'countries.create' ? 'active' : ''}}">
                        <a class="menu-item" href="{{route('countries.create')}}" data-i18n="nav.dash.crypto">أضافة بلد جديد </a>
                    </li>
                </ul>
            </li>


            <li class="nav-item"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main"> المدن </span>
                    <span  class="badge badge badge-danger badge-pill float-right mr-2">{{\App\Models\City::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class="{{\Request::route()->getName() == 'cities.index' ? 'active' : ''}}">
                        <a class="mappenu-item " href="{{route('cities.index')}}" data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                    <li class="{{\Request::route()->getName() == 'cities.create' ? 'active' : ''}}">
                        <a class="menu-item" href="{{route('cities.create')}}" data-i18n="nav.dash.crypto">أضافة مدن جديد </a>
                    </li>
                </ul>
            </li>


            <li class="nav-item"><a href=""><i class="la la-group"> </i>
                    <span class="menu-title" data-i18n="nav.dash.main">العلامات التجارية</span>
                    <span  class="badge badge badge-danger badge-pill float-right mr-2">{{\App\Models\Brand::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class="{{\Request::route()->getName() == 'brands.index' ? 'active' : ''}}"><a class="menu-item" href="{{route('brands.index')}}"
                            data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                    <li class="{{\Request::route()->getName() == 'brands.create' ? 'active' : ''}}"><a class="menu-item" href="{{route('brands.create')}}" data-i18n="nav.dash.crypto">أضافة علامه تجاريه جديده  </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">الخامات </span>
                    <span  class="badge badge badge-danger badge-pill float-right mr-2">{{\App\Models\Material::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class="{{\Request::route()->getName() == 'materials.index' ? 'active' : ''}}">
                        <a class="menu-item" href="{{route('materials.index')}}" data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                    <li class="{{\Request::route()->getName() == 'materials.create' ? 'active' : ''}}">
                        <a class="menu-item" href="{{route('materials.create')}}" data-i18n="nav.dash.crypto">أضافه خامات  </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">المنتجات</span>
                    <span  class="badge badge badge-danger badge-pill float-right mr-2">{{\App\Models\Product::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class="{{\Request::route()->getName() == 'products.index' ? 'active' : ''}}">
                        <a class="menu-item" href="{{route('products.index')}}" data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                    <li  class="{{\Request::route()->getName() == 'products.create' ? 'active' : ''}}">
                        <a class="menu-item" href="{{route('products.create')}}" data-i18n="nav.dash.crypto"> اضافة منتج جديد  </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>

