<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{

    public function index()
    {
        $contacts = Contact::all();

        return view('contacts.index', compact('contacts'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:50',
            'email' => 'required|email:rfc,dns',
            'category' => 'required|in:pertanyaan umum,kendala donasi,kerja sama kampanye,laporan kampanye',
            'message' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'message' => 'Harap masukkan data pesan dengan benar.'], 422);
        } else {

            Contact::create([
                'name' => trim($request->input('name')),
                'email' => $request->input('email'),
                'category' => $request->input('category'),
                'message' => trim($request->input('message'))
            ]);

            return response()->json(['success' => true, 'message' => 'Berhasil melakukan kirim pesan.'], 201);
        }
    }
}
