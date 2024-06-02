<?php

namespace App\Http\Controllers;

use App\Models\FAQ;
use Illuminate\Http\Request;
use App\Http\Requests\StoreFAQRequest;
use App\Http\Requests\UpdateFAQRequest;

class FAQController extends Controller
{
    // Menampilkan daftar FAQ
    public function index()
    {
        $faqs = FAQ::all();
        return view('FAQ.indexFAQ', compact('faqs'));
    }

    public function showAll()
    {
        $faqs = FAQ::all();
        return view('FAQ.showAllFAQ', compact('faqs'));
    }

    public function show(FAQ $faq)
    {
        return true;
    }

    // Menampilkan form untuk membuat FAQ baru
    public function create()
    {
        return view('FAQ.addFAQ');
    }

    // Menyimpan FAQ baru
    public function store(Request $request)
    {
        // return request;
        $validated = $request->validate([
            'question' => 'required',
            'answer' => 'required',
        ]);

        FAQ::create($validated);

        return redirect()->route('faqs.index')
            ->with('success', 'FAQ created successfully.');
    }

    // Menampilkan form untuk mengedit FAQ
    public function edit(FAQ $faq)
    {
        return view('FAQ.editFAQ', compact('faq'));
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
