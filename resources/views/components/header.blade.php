<nav class="navbar navbar-expand-md navbar-light shadow-sm samuraimart-header-container">
    <div class="container">
        <a class="navbar-brand" href="{{ route('stores.index') }}">
            <img width="80" height="80" src="{{asset('img/logo.png')}}">
        </a>
        <form action="{{ route('stores.index') }}" method="GET" class="row g-1">
            <div class="col-auto">
                <input class="form-control samuraimart-header-search-input" name="keyword">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn samuraimart-header-search-button"><i class="fas fa-search samuraimart-header-search-icon"></i></button>
            </div>
        </form>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mr-5 mt-2">
                @guest
                    <li class="nav-item mr-5">
                        <a class="nav-link" href="{{ route('register') }}">登録</a>
                    </li>
                    <li class="nav-item mr-5">
                        <a class="nav-link" href="{{ route('login') }}">ログイン</a>
                    </li>
                    <hr>
                @else
                    <!-- 管理者の表示 -->
                    @if (Auth::user() !== null AND Auth::user()->is_admin)
                        <li class="nav-item mr-5">
                            <a class="nav-link" href="{{ route('users.index') }}"><i class="fas fa-user"></i><label>ユーザ一覧</label></a>
                        </li>
                        <li class="nav-item mr-5">
                            <a class="nav-link" href="{{ route('stores.create') }}"><i class="fas fa-plus"></i><label>店舗作成</label></a>
                        </li>
                        <li class="nav-item mr-5">
                            <a class="nav-link" href="{{ route('category.index') }}"><i class="fas fa-plus"></i><label>カテゴリ登録・編集</label></a>
                        </li>
                        <li class="nav-item mr-5">
                            <a class="nav-link" href="{{ route('basicInfo.show') }}"><i class="fas fa-plus"></i><label>基本情報</label></a>
                        </li>
                        <li class="nav-item mr-5">
                            <a class="nav-link" href="{{ route('salesManagement.index') }}"><i class="fas fa-plus"></i><label>売上管理</label></a>
                        </li>
                        <li class="nav-item mr-5">
                            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-plus"></i><label>ログアウト</label></a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              @csrf
                        </form>
                    @else
                        <li class="nav-item mr-5">
                            <a class="nav-link" href="{{ route('mypage') }}">
                                <i class="fas fa-user mr-1"></i><label>マイページ</label>
                            </a>
                        </li>
                        <!-- 有料会員の表示 -->
                        @if (Auth::user() !== null AND Auth::user()->subscribed('default'))
                            <li class="nav-item mr-5">
                                <a class="nav-link" href="{{ route('favorites.index') }}"><i class="far fa-heart"></i><label>お気に入り</label></a>
                            </li>
                        @endif
                    @endif
                @endguest
            </ul>
        </div>
    </div>
</nav>