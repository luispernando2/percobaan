<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
{
    // -------------------------
    // 🏠 Halaman utama (tampilkan gambar upload)
    // -------------------------
    public function index()
    {
        // Ambil semua gambar dari folder uploads
        $imageFiles = File::files(public_path('uploads'));
        $images = array_map(fn($file) => 'uploads/' . basename($file), $imageFiles);

        return view('welcome', compact('images'));
    }

    // -------------------------
    // 📤 Form upload gambar
    // -------------------------
    public function create()
    {
        return view('upload');
    }

    // -------------------------
    // 💾 Simpan gambar upload
    // -------------------------
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|mimes:jpg,jpeg,png|max:2048',
        ]);

        $file = $request->file('image');
        $name = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('uploads'), $name);

        return redirect('/')->with('success', 'Gambar berhasil diupload!');
    }

    // -------------------------
    // 🛍️ Halaman daftar produk
    // -------------------------
    public function products()
    {
        // Contoh data produk (bisa diganti ambil dari DB nanti)
        $products = [
            [
                'id' => 1,
                'name' => 'Berlian',
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRAKGZm_HGz4I1UEiHrW329jK47n7dnLeAlOQ&s',
                'price' => 'Rp 35.000.000.000',
                'description' => 'Berlian murni dengan kilau alami dan kualitas tinggi, cocok untuk koleksi istimewa.',
            ],
            [
                'id' => 2,
                'name' => 'Mutiara',
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcScAQ_CHnCHtO1YZI3W4769majXgoGkklyGyg&s',
                'price' => 'Rp 5.500.000',
                'description' => 'Mutiara alami dengan permukaan halus dan warna putih mengkilap.',
            ],
            [
                'id' => 3,
                'name' => 'Berlian Putih',
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTvoX71Knb3_UK9pPjwmoFCiBmE91l_ed3DJA&s',
                'price' => 'Rp 5.500.000.000',
                'description' => 'Berlian putih dengan kejernihan sempurna, simbol kemewahan sejati.',
            ],
        ];

        return view('products', compact('products'));
    }

    // -------------------------
    // 🔍 Halaman detail produk
    // -------------------------
    public function show($id)
    {
        $products = [
            [
                'id' => 1,
                'name' => 'Berlian',
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRAKGZm_HGz4I1UEiHrW329jK47n7dnLeAlOQ&s',
                'price' => 'Rp 35.000.000.000',
                'description' => 'Berlian murni dengan kilau alami dan kualitas tinggi, cocok untuk koleksi istimewa.',
            ],
            [
                'id' => 2,
                'name' => 'Mutiara',
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcScAQ_CHnCHtO1YZI3W4769majXgoGkklyGyg&s',
                'price' => 'Rp 5.500.000',
                'description' => 'Mutiara alami dengan permukaan halus dan warna putih mengkilap.',
            ],
            [
                'id' => 3,
                'name' => 'Berlian Putih',
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTvoX71Knb3_UK9pPjwmoFCiBmE91l_ed3DJA&s',
                'price' => 'Rp 5.500.000.000',
                'description' => 'Berlian putih dengan kejernihan sempurna, simbol kemewahan sejati.',
            ],
        ];

        // Cari produk berdasarkan ID
        $product = collect($products)->firstWhere('id', $id);

        if (!$product) {
            abort(404, 'Produk tidak ditemukan');
        }

        return view('product-detail', compact('product'));
    }
}
