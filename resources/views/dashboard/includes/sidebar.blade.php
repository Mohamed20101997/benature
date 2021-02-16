<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            <li class="nav-item active"><a href="{{route('admin.dashboard')}}"><i class="la la-mouse-pointer"></i><span
                        class="menu-title" data-i18n="nav.add_on_drag_drop.main">الرئيسية </span></a>
            </li>
            <li class="nav-item active"><a href="{{route('messages.index')}}"><i class="la la-mouse-pointer"></i>
                <span class="menu-title" data-i18n="nav.add_on_drag_drop.main">الرسائل </span></a>
            </li>
            <li class="nav-item"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main"> الاقسام  </span>
                    <span  class="badge badge badge-danger badge-pill float-right mr-2">{{\App\Models\Category::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="{{route('category.index')}}"
                            data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                    <li><a class="menu-item" href="{{route('category.create')}}" data-i18n="nav.dash.crypto">أضافة قسم
                            جديد </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item"><a href=""><i class="la la-group">العلامات التجارية</i>
                    <span class="menu-title" data-i18n="nav.dash.main"></span>
                    <span  class="badge badge badge-danger badge-pill float-right mr-2">{{\App\Models\Brand::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="{{route('brands.index')}}"
                            data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                    <li><a class="menu-item" href="{{route('brands.create')}}" data-i18n="nav.dash.crypto">أضافة علامه تجاريه جديده  </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item"><a href=""><i class="la la-group">الخامات</i>
                    <span class="menu-title" data-i18n="nav.dash.main"></span>
                    <span  class="badge badge badge-danger badge-pill float-right mr-2">{{\App\Models\Material::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="{{route('materials.index')}}"
                            data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                    <li><a class="menu-item" href="{{route('materials.create')}}" data-i18n="nav.dash.crypto">أضافه خامات  </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item"><a href=""><i class="la la-group">المنتجات</i>
                    <span class="menu-title" data-i18n="nav.dash.main"></span>
                    <span  class="badge badge badge-danger badge-pill float-right mr-2">{{\App\Models\Product::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="{{route('products.index')}}"
                            data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                    <li><a class="menu-item" href="{{route('products.create')}}" data-i18n="nav.dash.crypto"> اضافة منتج جديد  </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>

