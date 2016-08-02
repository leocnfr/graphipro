<?php

namespace App\Http\Controllers;

use App\Format;
use Illuminate\Http\Request;

use App\Http\Requests;

class FormatController extends Controller
{
    //
    public function show()
    {
        return Format::all();
    }

    public function store(Request $request)
    {
        Format::create($request->all());
        return redirect()->back();
    }

	public function destroy($id)
	{
		Format::destroy($id);
    }

	public function update(Request $request)
	{
		dd($request->all());
		Format::find($request->get('id'))->update([
			'format'=>$request->get('format'),
			'img'=>$request->file('img')->getClientOriginalName()
		]);
		if ($request->hasFile('img')) {
			$request->file('img')->move(('storage/uploads'), $request->file('img')->getClientOriginalName());
		}
		return redirect()->back();
    }
}
