<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Expense;
use App\Http\Requests\ExpenseForm;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $expenses = Expense::select('expenses.*')
            ->where('user_id', '=', \Auth::id())
            ->whereNull('deleted_at')
            ->orderBy('buy_date', 'desc')
            ->paginate(10);

        // 今月の支出
        $start_date = new Carbon();
        $start_date->firstOfMonth();

        $end_date = new Carbon();
        $end_date->endOfMonth();

        $monthly_expenses = Expense::select('expenses.*')
            ->where('user_id', '=', \Auth::id())
            ->whereBetween('buy_date', [$start_date, $end_date])
            ->whereNull('deleted_at')
            ->sum('amount');

        return view('expense.index', compact('expenses', 'monthly_expenses'));
    }

    public function create()
    {
        return view('expense.create');
    }

    public function store(ExpenseForm $request)
    {
        $posts = $request->all();

        Expense::insert(['title' => $posts['title'], 'buy_date' => $posts['buy_date'], 'amount' => $posts['amount'], 'content' => $posts['content'], 'user_id' => \Auth::id()]);

        return redirect( route('home') );
    }

    public function edit($id)
    {
        $edit_expense = Expense::find($id);

        return view('expense.edit', compact('edit_expense'));
    }

    public function update(ExpenseForm $request)
    {
        $posts = $request->all();

        Expense::where('id', $posts['expense_id'])->update(['title' => $posts['title'], 'buy_date' => $posts['buy_date'], 'amount' => $posts['amount'], 'content' => $posts['content']]);

        return redirect( route('home') );
    }

    public function destroy(Request $request)
    {
        $posts = $request->all();

        Expense::where('id', $posts['expense_id'])->update(['deleted_at' => date("Y-m-d H:i:s", time())]);

        return redirect( route('home') );
    }
}
