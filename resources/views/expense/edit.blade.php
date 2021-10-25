@extends('layouts.app')

@section('javascript')
<script src="/js/confirm.js"></script>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <h4 class="card-header d-flex justify-content-between font-weight-bold text-white bg-primary">
                    編集
                    {{-- 削除ボタン --}}
                    <form id="delete-form" action="{{ route('destroy') }}" method="POST">
                        @csrf
                        <input type="hidden" name="expense_id" value="{{ $edit_expense['id'] }}" />
                        <i class="fas fa-trash-alt" onclick="deleteHandle(event);"></i>
                    </form>
                </h4>
                {{-- 入力フォーム --}}
                <form class="card-body" action="{{ route('update') }}" method="POST">
                    @csrf
                    <input type="hidden" name="expense_id" value="{{ $edit_expense['id'] }}" />
                    <div class="form-group">
                        <label class="font-weight-bold" for="title">タイトル</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ $edit_expense['title'] }}" placeholder="(例)コンビニ" />
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold" for="buy_date">購入日</label>
                        <input type="date" class="form-control" id="buy_date" name="buy_date" value="{{ $edit_expense['buy_date']->format('Y-m-d') }}" />
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold" for="amount">金額</label>
                        <input type="number" class="form-control" id="amount" name="amount" value="{{ $edit_expense['amount'] }}" placeholder="(例)1500" />
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold" for="content">メモ</label>
                        <textarea class="form-control" id="content" name="content" rows="3" placeholder="(例)弁当、コーヒー、雑誌">{{ $edit_expense['content'] }}</textarea>
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
                    <button type="submit" class="btn btn-primary font-weight-bold">更新</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
