<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ProfileController extends Controller
{
    // Halaman Data Diri dan Foto
    public function index()
    {
        $profileData = [
            'nama' => 'Rizal Muhammad Rosyid',
            'foto' => 'images/p2.jpeg',
            'profesi' => 'Web Developer',
            'deskripsi' => 'Saya adalah seorang web developer dengan pengalaman 2 tahun dalam pengembangan aplikasi web menggunakan Laravel, PHP, dan JavaScript. Saya passionate dalam menciptakan solusi digital yang kreatif dan efisien.',
            'email' => 'rizalmhmd45@gmail.com',
            'telepon' => '+62 813-3315-4367',
            'umur' => 21,
            'lokasi' => 'Jawa Tengah, Indonesia',
            'pendidikan' => 'S1 Teknik Informatika'
        ];
        
        return view('profile', compact('profileData'));
    }

    // Halaman Aktivitas
    public function aktivitas()
    {
        $aktivitas = [
            [
                'judul' => 'Project Laravel E-Commerce', 
                'deskripsi' => 'Membangun website e-commerce lengkap dengan sistem cart, checkout, dan payment gateway',
                'tahun' => '2024'
            ],
            [
                'judul' => 'Web Development Bootcamp', 
                'deskripsi' => 'Mengikuti bootcamp intensif selama 3 bulan untuk meningkatkan skill web development',
                'tahun' => '2023'
            ],
            [
                'judul' => 'Freelance Web Developer', 
                'deskripsi' => 'Mengerjakan berbagai project website untuk klien dari berbagai industri',
                'tahun' => '2022-2024'
            ],
            [
                'judul' => 'Mobile App Development', 
                'deskripsi' => 'Mengembangkan aplikasi mobile menggunakan React Native untuk platform iOS dan Android',
                'tahun' => '2023'
            ]
        ];
        
        return view('aktivitas.index', compact('aktivitas'));
    }

    // Halaman Kontak
    public function contact()
    {
        $contactInfo = [
            'email' => 'rizalmhmd45@gmail.com',
            'telepon' => '+62 813-3315-4367',
            'alamat' => 'Pakuncen, Larangankulon, Mojotengah, Wonosobo, Jawa Tengah, Indonesia',
            'linkedin' => 'https://linkedin.com/in/rozoul',
            'github' => 'https://github.com/rizalmhmd',
            'instagram' => '@zallzall02'
        ];
        
        return view('contact', compact('contactInfo'));
    }

    // Method kirim pesan dari form kontak
public function send(Request $request)
{
    $name = $request->input('name');
    $email = $request->input('email');
    $whatsapp = $request->input('whatsapp');
    $message = $request->input('message');

    $text = "Nama: $name\nEmail: $email\nNomor: $whatsapp\nPesan: $message";
    $no_tujuan = "6282220618853"; 
    $url = "https://api.whatsapp.com/send?phone=$no_tujuan&text=" . urlencode($text);
    
    return redirect()->away($url);
}
    

    // Method untuk upload foto (optional)
    public function upload(Request $request)
    {
        $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('images', 'public');
            session(['foto_profile' => $path]);
            
            return redirect('/profile')->with('success', 'Foto berhasil diupload!');
        }
        
        return back()->with('error', 'Gagal mengupload foto.');
    }
}