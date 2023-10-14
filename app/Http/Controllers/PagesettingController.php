<?php

namespace App\Http\Controllers;
use App\Models\Pagesetting;
use Illuminate\Http\Request;

class PagesettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pagesettings = Pagesetting::get();
        return view('admin.pagesetting.index',compact('pagesettings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pagesetting.create');
    }

    /**
     * Update the specified resource in storage.
     */
    public function store(Request $request)
    {
        $pagesetting = new Pagesetting;
        $pagesetting->meta_slug = $request->meta_slug;
        $pagesetting->meta_heading = $request->meta_heading;
        $pagesetting->meta_title = $request->meta_title;
        $pagesetting->meta_keyword = $request->meta_keyword;
        $pagesetting->meta_description = $request->meta_description;
        $pagesetting->meta_image = $request->meta_image;
        $pagesetting->meta_robots = $request->meta_robots;
        $pagesetting->meta_canonical = $request->meta_canonical;
        $pagesetting->page_description = $request->page_description;
        $pagesetting->save();

        return redirect('admin/pagesetting');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pagesetting = Pagesetting::findOrfail($id);
        return view('admin.pagesetting.edit',compact('pagesetting'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $pagesetting = Pagesetting::findOrfail($id);

        $pagesetting->meta_heading = $request->meta_heading;
        $pagesetting->meta_title = $request->meta_title;
        $pagesetting->meta_keyword = $request->meta_keyword;
        $pagesetting->meta_description = $request->meta_description;
        $pagesetting->meta_image = $request->meta_image;
        $pagesetting->meta_robots = $request->meta_robots;
        $pagesetting->meta_canonical = $request->meta_canonical;
        $pagesetting->page_description = $request->page_description;
        $pagesetting->save();

        return redirect('admin/pagesetting');
    }
}
