<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact; // Model untuk menyimpan data pesan, jika ada

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::all(); // Ambil semua data dari tabel contacts
        return response()->json([
            'success' => true,
            'data' => $contacts,
        ], 200);
    }
    
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string|max:1000',
        ]);

        // Simpan data ke database atau kirim email
        // Contoh menyimpan ke database
        $contact = new Contact();
        $contact->name = $validated['name'];
        $contact->email = $validated['email'];
        $contact->message = $validated['message'];
        $contact->save();

        // Kirim response JSON
        return response()->json([
            'message' => 'Pesan Anda telah dikirim. Terima kasih!',
            'data' => $contact,
        ]);
    }
}
