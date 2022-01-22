<?php

namespace App\Http\Controllers;

use App\Algor\Algor;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class MainController extends Controller
{
    public function home()
    {
        return view('home', ['result' => []]);
    }

    /**
     * @throws ValidationException
     */
    public function algor(Request $request)
    {
        $valid = $request->validate([
            'min' => 'required',
            'max' => 'required',
            'deltaX' => 'required|not_in:0',
            'num' => 'required|min:1'
        ]);

        if ($valid['deltaX'] > 0 && $valid['min'] >= $valid['max']) {
            throw ValidationException::withMessages([
                ' ' => 'If deltaX is greater than 0 then min must be greater than max.',
            ]);
        }

        if ($valid['deltaX'] < 0 && $valid['max'] <= $valid['min']) {
            throw ValidationException::withMessages([
                ' ' => 'If deltaX is less than 0 then max must be greater than min.',
            ]);
        }

        $result = Algor::calculate($valid['min'], $valid['max'], $valid['deltaX'], $valid['num']);
        return redirect()->route('home')->with(['result' => $result]);
    }
}
