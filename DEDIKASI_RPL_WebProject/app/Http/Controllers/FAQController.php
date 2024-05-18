<?php

namespace App\Http\Controllers;

use App\Models\FAQ;
use App\Http\Requests\StoreFAQRequest;
use App\Http\Requests\UpdateFAQRequest;

class FAQController extends Controller
{
    // Menampilkan daftar FAQ
    public function index()
    {
        $faqs = FAQ::all();
        return view('faqs.index', compact('faqs'));
    }

    // Menampilkan form untuk membuat FAQ baru
    public function create()
    {
        return view('faqs.create');
    }

    // Menyimpan FAQ baru
    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required',
            'answer' => 'required',
        ]);

        FAQ::create($request->all());

        return redirect()->route('faqs.index')
            ->with('success', 'FAQ created successfully.');
    }

    // Menampilkan form untuk mengedit FAQ
    public function edit(FAQ $faq)
    {
        return view('faqs.edit', compact('faq'));
    }

    // Memperbarui FAQ
    public function update(Request $request, FAQ $faq)
    {
        $request->validate([
            'question' => 'required',
            'answer' => 'required',
        ]);

        $faq->update($request->all());

        return redirect()->route('faqs.index')
            ->with('success', 'FAQ updated successfully.');
    }

    // Menghapus FAQ
    public function destroy(FAQ $faq)
    {
        $faq->delete();

        return redirect()->route('faqs.index')
            ->with('success', 'FAQ deleted successfully.');
    }
}
