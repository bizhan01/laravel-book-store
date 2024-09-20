<!-- Header -->
<div class="site-header">
  <nav class="navbar navbar-light">
    <div class="navbar-left">
      <a class="navbar-brand" href="/">
        <span class="avatar box-32" style="margin-top: -25px">
         <img src="/UploadedImages/{{Auth::user()->profileImage}}" style="width: 40px; height: 40px;">
        </span>&nbsp;&nbsp;&nbsp;
        <span style="color: white">{{ Auth::user()->name }}</span>
      </a>
      <div class="toggle-button dark sidebar-toggle-first float-xs-left hidden-md-up">
        <span class="hamburger"></span>
      </div>
      <div class="toggle-button-second dark float-xs-right hidden-md-up">
        <i class="ti-arrow-right"></i>
      </div>
      <div class="toggle-button dark float-xs-right hidden-md-up" data-toggle="collapse" data-target="#collapse-1">
        <span class="more"></span>
      </div>
    </div>
    <div class="navbar-right navbar-toggleable-sm collapse" id="collapse-1">
      <div class="toggle-button light sidebar-toggle-second float-xs-left hidden-sm-down">
        <span class="hamburger"></span>
      </div>

      <ul class="nav navbar-nav">
        <li class="nav-item hidden-sm-down">
          <a class="nav-link toggle-fullscreen" href="#">
            <i class="ti-fullscreen"></i>
          </a>
        </li>

      </ul>
      <!-- <div class="header-form float-md-left ml-md-2">
        <form>
          <input type="text" class="form-control b-a" placeholder="Search for...">
          <button type="submit" class="btn bg-white b-a-0">
            <i class="ti-search"></i>
          </button>
        </form>
      </div> -->
    </div>
  </nav>
</div>
