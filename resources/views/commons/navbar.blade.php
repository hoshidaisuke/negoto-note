<header class="mb-4">
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        {{-- トップページへのリンク --}}
        <a class="navbar-brand" href="/"><img src="">寝言ノート</a>

        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav">
                @if (Auth::check())
                    {{-- ユーザ一覧ページへのリンク --}}
                    <li class="nav-item">
                        <div class="nav-link">ニックネーム：{{ Auth::user()->name }}</div>
                    </li>
                    <li class="nav-item"><a href="{{ route('logout.get') }}" class="nav-link">ログアウト</a></li>
                @else
                    {{-- ユーザ登録ページへのリンク --}}
                    <li class="nav-item"><a href="{{ route('signup.get') }}" class="nav-link">新規登録</a></li>
                    <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">ログイン</a></li>
                    {{-- ログインページへのリンク --}}

                @endif
            </ul>
        </div>
    </nav>
</header>