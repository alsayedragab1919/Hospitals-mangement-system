<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\laboratorieEmployeeRequest;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
class LaboratoriesEmployeeController extends Controller
{
    public function store(laboratorieEmployeeRequest $request){

        if($request->authenticate()){

            $request->session()->regenerate();

            return redirect()->intended(RouteServiceProvider:: LABORATORIEEMPLOYEE);
        }
        return redirect()->back()->withErrors(['name' => (trans('Dashboard/auth.failed'))]);
    }
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('laboratories_Employee')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
