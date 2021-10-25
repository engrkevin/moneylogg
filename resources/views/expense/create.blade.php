@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <h4 class="card-header font-weight-bold text-white bg-primary">新規作成</h4>
                {{-- 入力フォーム --}}
                <form class="card-body" action="{{ route('store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="font-weight-bold" for="title">タイトル</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="(例)コンビニ" />
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold" for="buy_date">購入日</label>
                        <input type="date" class="form-control" id="buy_date" name="buy_date" />
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold" for="amount">金額</label>
                        <input type="number" class="form-control" id="amount" name="amount" placeholder="(例)1500" />
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold" for="content">メモ</label>
                        <textarea class="form-control" id="content" name="content" rows="3" placeholder="(例)弁当、コーヒー、雑誌"></textarea>
                    </div>
                    {{-- エラーメッセージ --}}
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <button type="submit" class="btn btn-primary font-weight-bold">保存</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
