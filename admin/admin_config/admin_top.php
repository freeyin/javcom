    <header class="am-topbar am-topbar-inverse admin-header">
      <div class="am-topbar-brand">
        <a href="javascript:;" class="tpl-logo">
          <img src="<?php echo JCCMS_ADMIN_url;?>assets/img/logo.png" alt=""></a>
      </div>
      <div class="am-icon-list tpl-header-nav-hover-ico am-fl am-margin-right"></div>
      <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only" data-am-collapse="{target: '#topbar-collapse'}">
        <span class="am-sr-only">导航切换</span>
        <span class="am-icon-bars"></span>
      </button>
      <div class="am-collapse am-topbar-collapse" id="topbar-collapse">
        <ul class="am-nav am-nav-pills am-topbar-nav am-topbar-right admin-header-list tpl-header-list">
          <ul class="am-dropdown-content tpl-dropdown-content">
            <li class="tpl-dropdown-content-external"></li>
          </ul>
          </li>
          <ul class="am-dropdown-content tpl-dropdown-content">
            <li>

              <a href="#" class="tpl-dropdown-content-message">
                <span class="tpl-dropdown-content-photo">
                  <img src="<?php echo JCCMS_ADMIN_url;?>assets/img/user03.png" alt=""></span>
                <span class="tpl-dropdown-content-subject"></span>
              </a>
            </li>
          </ul>
          </li>

          <li class="am-hide-sm-only">
            <a href="javascript:;" id="admin-fullscreen" class="tpl-header-list-link">
              <span class="am-icon-arrows-alt"></span>
              <span class="admin-fullText">开启全屏</span></a>
          </li>
          <li class="am-dropdown">
            <a class="am-dropdown-toggle tpl-header-list-link" href="/" target="_blank">
              <span class="tpl-header-list-user-nick">进入主页</span>
              
            </a>

          </li>
          <li>
            <a href="?err=1" class="tpl-header-list-link">
              <span class="am-icon-sign-out tpl-header-list-ico-out-size"></span>
            </a>
          </li>
        </ul>
      </div>
    </header>