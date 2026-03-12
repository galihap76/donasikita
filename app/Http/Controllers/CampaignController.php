<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CampaignController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $campaigns = Campaign::select(
            'campaign_id',
            'title',
            'slug',
            'target_amount',
            'collected_amount',
            'status'
        )->get();

        return view('campaigns.index', compact('campaigns'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('campaigns.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'title' => 'required|max:100',
                'target_amount' => 'required|numeric',
                'image' => 'required|extensions:png,jpg,jpeg|mimes:png,jpg,jpeg',
                'description' => 'required'
            ],
            [
                'title.required' => 'Judul tidak boleh kosong.',
                'title.max' => 'Judul tidak boleh lebih dari :max karakter.',

                'target_amount.required' => 'Target donasi tidak boleh kosong.',
                'target_amount.numeric' => 'Target donasi harus berupa angka.',

                'image.required' => 'Gambar kampanye wajib diupload.',
                'image.extensions' => 'Format gambar harus png, jpg, atau jpeg.',
                'image.mimes' => 'File gambar harus bertipe png, jpg, atau jpeg.',

                'description.required' => 'Deskripsi kampanye tidak boleh kosong.'
            ]
        );

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        } else {

            Campaign::create([
                'title' => trim($request->input('title')),
                'slug' => Str::slug(trim($request->input('title')), '-'),
                'target_amount' => (int)$request->input('target_amount'),
                'image' => $request->file('image')->store('campaigns', 'public'),
                'description' => trim($request->input('description'))
            ]);

            Session::flash('success', 'Berhasil menambahkan kampanye baru.');
            return redirect('/campaigns');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Menyusul
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $campaign = Campaign::findOrFail($id);

        return view('campaigns.edit', compact('campaign'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $campaign = Campaign::findOrFail($id);

        $validator = Validator::make(
            $request->all(),
            [
                'title' => 'required|max:100',
                'target_amount' => 'required|numeric',
                'image' => 'nullable|extensions:png,jpg,jpeg|mimes:png,jpg,jpeg',
                'description' => 'required'
            ],
            [
                'title.required' => 'Judul tidak boleh kosong.',
                'title.max' => 'Judul tidak boleh lebih dari :max karakter.',

                'target_amount.required' => 'Target donasi tidak boleh kosong.',
                'target_amount.numeric' => 'Target donasi harus berupa angka.',

                'image.extensions' => 'Format gambar harus png, jpg, atau jpeg.',
                'image.mimes' => 'File gambar harus bertipe png, jpg, atau jpeg.',

                'description.required' => 'Deskripsi kampanye tidak boleh kosong.'
            ]
        );

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        } else {

            $imagePath = $campaign->image;

            if ($request->hasFile('image')) {

                if ($campaign->image && Storage::disk('public')->exists($campaign->image)) {
                    Storage::disk('public')->delete($campaign->image);
                }

                $imagePath = $request->file('image')->store('campaigns', 'public');
            }

            $campaign->update([
                'title' => trim($request->input('title')),
                'slug' => Str::slug(trim($request->input('title')), '-'),
                'target_amount' => (int)$request->input('target_amount'),
                'image' => $imagePath,
                'description' => trim($request->input('description'))
            ]);

            Session::flash('success', 'Berhasil memperbarui kampanye.');

            return redirect('/campaigns');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $campaign = Campaign::findOrFail($id);

        // Hapus gambar lama jika ada
        if ($campaign->image && Storage::disk('public')->exists($campaign->image)) {
            Storage::disk('public')->delete($campaign->image);
        }

        $campaign->delete();

        Session::flash('success', 'Berhasil menghapus kampanye.');
        return redirect('/campaigns');
    }
}
