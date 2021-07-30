@extends('layouts.app_only_content')

@section('title')
    パスワードリセットリクエスト
@endsection

@section('content')
    <div class="container">
        <div class="card" style="width: 500px">
            <div class="card-body">
                <div class="font-weight-bold text-center border-bottom pb-3" style="font-size: 24px">パスワードをお忘れの方</div>

                <form method="POST" action="{{ route('password.email') }}" class="p-5">
                    {{-- session()関数は、セッションに格納されているデータを取得できる。
                    セッションにstatusというデータを追加している処理は vendor/laravel/ui/auth-backend/SendsPasswordResetEmails.php の77行目
                    文言をカスタマイズしたい場合は resources/lang/ja/passwords.php の sent を変更する --}}
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @csrf

                    <div class="form-group">
                        <label for="email">メールアドレス</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="example@example.com">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group mb-0">
                        <button type="submit" class="btn btn-block btn-secondary">
                            送信する
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection