<!-- Sidebar -->
<div class="site-overlay"></div>
<div class="site-sidebar" style="background-color: #373944">
  <div class="custom-scroll custom-scroll-light">
    <ul class="sidebar-menu">
      <li class="menu-title">مینو ها</li>

      <li class="with-sub">
        <a href="/home" class="waves-effect  waves-light">
          <span class="s-icon"><i class="fa fa-home"></i></span>
          <span class="s-text">داشبورد</span>
        </a>
      </li>

      <li class="with-sub <?php if (Auth::user()->isAdmin == '1'): ?>
        <?php echo 'hide' ?>
        <?php endif ?>">
        <a href="{{ route('category') }}" class="waves-effect  waves-light">
          <span class="s-icon"><i class="fa fa-home"></i></span>
          <span class="s-text">کتگوری</span>
        </a>
      </li>


      <li class="with-sub">
        <a href="#" class="waves-effect  waves-light">
          <span class="s-caret"><i class="fa fa-angle-down"></i></span>
          <span class="s-icon"><i class="fa fa-book"></i></span>
          <span class="s-text">کتاب ها</span>
        </a>
        <ul>
          <li class="<?php if (Auth::user()->isAdmin == '1'): ?>
            <?php echo 'hide' ?>
          <?php endif ?>"><a href="{{ route('book') }}">افزودن</a></li>
          <li><a href="{{ route('addUsedBook') }}">افزودن</a></li>
          <li><a href="{{ route('newBooks') }}">کتاب های جدید</a></li>
          <li><a href="{{ route('usedBooks') }}">کتاب های استفاده شده</a></li>
        </ul>
      </li>

      <li class="with-sub <?php if (Auth::user()->isAdmin == '1'): ?>
          <?php echo 'hide' ?>
        <?php endif ?>">
        <a href="#" class="waves-effect  waves-light">
          <span class="s-caret"><i class="fa fa-angle-down"></i></span>
          <span class="s-icon"><i class="fa fa-book"></i></span>
          <span class="s-text">قرطاسیه/محصولات</span>
        </a>
        <ul>
          <li><a href="{{ route('newProduct') }}">افزودن</a></li>
          <li><a href="{{ route('productList') }}">محصولات</a></li>
        </ul>
      </li>

      <li class="with-sub <?php if (Auth::user()->isAdmin == '1'): ?>
          <?php echo 'hide' ?>
        <?php endif ?>">
        <a href="#" class="waves-effect  waves-light">
          <span class="s-caret"><i class="fa fa-angle-down"></i></span>
          <span class="s-icon"><i class="ti-shopping-cart-full"></i></span>
          <span class="s-text">فروشات</span>
        </a>
        <ul>
          <li><a href="{{route('sales')}}">فروش جدید</a></li>
          <li><a href="{{route('salesList')}}">لیست فروشات</a></li>
        </ul>
      </li>



      <li class="with-sub <?php if (Auth::user()->isAdmin == '1'): ?>
          <?php echo 'hide' ?>
        <?php endif ?>">
        <a href="#" class="waves-effect  waves-light">
          <span class="s-caret"><i class="fa fa-angle-down"></i></span>
          <span class="s-icon"><i class="fa fa-th"></i></span>
          <span class="s-text">انبار (گدام)</span>
        </a>
        <ul>
          <li><a href="{{route('inventory')}}">موجودی</a></li>
        </ul>
      </li>


      <li class="with-sub <?php if (Auth::user()->isAdmin == '1'): ?>
          <?php echo 'hide' ?>
        <?php endif ?>">
        <a href="#" class="waves-effect  waves-light">
          <span class="s-caret"><i class="fa fa-angle-down"></i></span>
          <span class="s-icon"><i class="fa fa-money"></i></span>
          <span class="s-text">مالی</span>
        </a>
        <ul>
          <li><a href="{{route('revenues')}}">عواید (فروشات)</a></li>
          <li><a href="{{ route('expense') }}">مصارف</a></li>
          <li><a href="{{ route('blancess') }}">بیلانس مالی</a></li>
        </ul>
      </li>

      <li class="with-sub <?php if (Auth::user()->isAdmin == '1'): ?>
          <?php echo 'hide' ?>
        <?php endif ?>">
        <a href="#" class="waves-effect  waves-light">
          <span class="s-caret"><i class="fa fa-angle-down"></i></span>
          <span class="s-icon"><i class="fa fa-users"></i></span>
          <span class="s-text">کاربران</span>
        </a>
        <ul>
          <li><a href="{{route('userList')}}">لیست کاربران</a></li>
          <li><a href="{{ route('blockList') }}">کاربران بلاک شده</a></li>
        </ul>
      </li>

      <li class="with-sub <?php if (Auth::user()->isAdmin == '1'): ?>
          <?php echo 'hide' ?>
        <?php endif ?>">
        <a href="{{ route('adv') }}" class="waves-effect  waves-light">
          <span class="s-icon"><i class="fa fa-bullhorn"></i></span>
          <span class="s-text">تبلیغات</span>
        </a>
      </li>

      <li class="with-sub <?php if (Auth::user()->isAdmin == '1'): ?>
          <?php echo 'hide' ?>
        <?php endif ?>">
        <a href="{{ route('message') }}" class="waves-effect  waves-light">
          <span class="s-icon"><i class="fa fa-commenting"></i></span>
          <span class="s-text">پیام ها</span>
        </a>
      </li>

      <li class="with-sub">
        <a href="{{ route('profile') }}" class="waves-effect  waves-light">
          <span class="s-icon"><i class="ti-user"></i></span>
          <span class="s-text">پروفایل</span>
        </a>
      </li>

      <li class="with-sub">
        <a href="{{ route('logout') }}"
           onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();"  class="waves-effect  waves-light" style="color: red">
          <span class="s-icon"><i class="ti-power-off"></i></span>
          <span class="s-text">خروج</span>
        </a>
      </li>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
      </form>


    </ul>
  </div>
</div>
<!-- Aside End -->
