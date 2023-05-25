@inject('request', 'Illuminate\Http\Request')
<header class="main-header bg-success">
    <!-- Logo -->
    <a href="{{ url('/admin/home') }}" class="logo"
       style="font-size: 16px;">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini">
           @lang('global.global_title')</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">
           @lang('global.global_title')</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>
        <div class="user-header ">
            @if (Auth::check())
                <div class="username-header">Hello!, {{ Auth::user()->name }}</div>
            @endif
            @php ($unread = App\MessengerTopic::countUnread())
                    <div class="icon-messenger {{ $request->segment(2) == 'messenger' ? 'active' : '' }} {{ ($unread > 0 ? 'unread' : '') }}">
                        <a href="{{ route('admin.messenger.index') }}">
                            <i class="fa fa-envelope"></i>
                            @if($unread > 0)
                                {{ ($unread > 0 ? '('.$unread.')' : '') }}
                            @endif
                        </a>
            </div>
            <div>
                <span class="fa fa-user icon-header"></span>
                <div class="icon-main">
                    <a href="{{ route('auth.change_password') }}"><i class="fa fa-key"></i><span class="title">@lang('global.app_change_password')</span></a>
                    
                    <a href="#logout" onclick="$('#logout').submit();"><i class="fa fa-arrow-left"></i><span class="title">@lang('global.app_logout')</span></a>
                </div>
            </div>
        </div>
    </nav>
</header>
<script>
    const iconHeader = document.querySelector('.icon-header');
const iconMain = document.querySelector('.icon-main');

iconHeader.addEventListener('click', () => {
  if (iconMain.classList.contains('show')) {
    iconMain.classList.remove('show');
  } else {
    iconMain.classList.add('show');
  }
});

</script>



