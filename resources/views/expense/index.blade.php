@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <h4 class="card-header d-flex justify-content-between font-weight-bold text-white bg-primary">支出一覧<a href="{{ route('create') }}"><i class="fas fa-plus plus-button"></i></a></h4>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                            <th scope="col">タイトル</th>
                            <th scope="col">金額</th>
                            <th scope="col">購入日</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($expenses as $expense)
                            <tr>
                            <td class="font-weight-bold"><a href="/edit/{{ $expense['id'] }}">{{ $expense['title'] }}</a></td>
                            <td class="font-weight-bold">¥{{ number_format($expense['amount']) }}</td>
                            <td class="font-weight-bold">{{ $expense['buy_date']->format('Y/m/d') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        </table>
                        {{ $expenses->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container my-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <h4 class="card-header font-weight-bold text-white bg-primary">今月の支出</h4>
                <div class="card-body">
                    <h3 class="card-title font-weight-bold">¥{{ number_format($monthly_expenses) }}</h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
