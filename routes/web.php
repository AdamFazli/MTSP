<?php

use App\Http\Controllers\AktivitiController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\InfaqController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\TempahDewanController;
use App\Http\Controllers\AsnafController;
use App\Http\Controllers\ChatbotController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('dashboard');

/* Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard'); */

Route::get('/home', [HomeController::class, 'index'])->name('home');


// Admin Routes
Route::middleware([])->group(function () {
    Route::get('/Ekhairat/Senarai', [MembershipController::class, 'index'])->name('membership.index');
    Route::get('/Ekhairat/Senarai/{membership}', [MembershipController::class, 'show'])->name('membership.semak');
    Route::get('/Ekhairat/Search', [MembershipController::class, 'search'])->name('membership.search');
    Route::post('/Ekhairat/Approve/{membership}', [MembershipController::class, 'approve'])->name('membership.approve');
    Route::post('/Ekhairat/Reject/{membership}', [MembershipController::class, 'reject'])->name('membership.reject');

    // Berita Umum Routes (Admin-only)
    Route::get('/create_berita', [BeritaController::class, 'create'])->name('create.berita');
    Route::post('/create_berita', [BeritaController::class, 'store'])->name('berita.store');
    Route::get('/edit_berita/{berita}', [BeritaController::class, 'edit'])->name('edit.berita');
    Route::put('/update_berita/{berita}', [BeritaController::class, 'update'])->name('update.berita');
    Route::get('/delete_berita/{berita}', [BeritaController::class, 'destroy'])->name('delete.berita');
    Route::get('/tab-content/berita', [BeritaController::class, 'partial']);

    // Informasi Routes (Admin-only)
    Route::get('/tab-content/informasi', [InformasiController::class, 'partial']);

    // Tempah Dewan Routes (Admin-only)
    Route::middleware(['auth'])->prefix('admin')->group(function () {
        Route::get('admin/tempah-dewan', [TempahDewanController::class, 'adminIndex'])->name('tempah.dewan.index');
        Route::get('admin/tempah-dewan/{id}', [TempahDewanController::class, 'adminShow'])->name('tempah.dewan.show');
        Route::post('admin/tempah-dewan/{id}/update', [TempahDewanController::class, 'adminUpdate'])->name('tempah.dewan.update');
    });

    // Asnaf Routes (Admin-only)
    Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
        Route::get('/e-asnaf', [AsnafController::class, 'index'])->name('asnaf.index');
        Route::get('/e-asnaf/create', [AsnafController::class, 'create'])->name('asnaf.create');
        Route::post('/e-asnaf', [AsnafController::class, 'store'])->name('asnaf.store');
        Route::get('/e-asnaf/{id}/edit', [AsnafController::class, 'edit'])->name('asnaf.edit');
        Route::put('/e-asnaf/{id}', [AsnafController::class, 'update'])->name('asnaf.update');
        Route::delete('/e-asnaf/{id}', [AsnafController::class, 'destroy'])->name('asnaf.destroy');
        Route::resource('asnaf', AsnafController::class);
        Route::get('/admin/e-asnaf/export/excel', [AsnafController::class, 'exportExcel'])->name('asnaf.export.excel');
    });

    // Aktiviti Masjid Routes (Admin-only)
    Route::get('/berita-masjid/tambah-aktiviti', [AktivitiController::class, 'create'])->name('aktiviti.create');
    Route::post('/berita-masjid/tambah-aktiviti', [AktivitiController::class, 'store'])->name('aktiviti.store');
    Route::get('/berita-masjid/edit-aktiviti/{aktiviti}', [AktivitiController::class, 'edit'])->name('aktiviti.edit');
    Route::put('/berita-masjid/edit-aktiviti/{aktiviti}', [AktivitiController::class, 'update'])->name('aktiviti.update');
    Route::delete('/berita-masjid/delete-aktiviti/{aktiviti}', [AktivitiController::class, 'destroy'])->name('aktiviti.destroy');
    Route::get('/tab-content/aktiviti', [AktivitiController::class, 'partial']);
});


// Logged In User Routes
Route::middleware('auth')->group(function () {
    // Profile Routes (Logged-in User)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Membership Routes (Logged-in User)
    Route::get('/Ekhairat/Daftar', [MembershipController::class, 'create'])->name('membership.create');
    Route::get('/Ekhairat/Semak', [MembershipController::class, 'index'])->name('membership.index');
    Route::get('/Ekhairat', [MembershipController::class, 'store'])->name('membership.store');
    Route::post('/Ekhairat/confirmation', [MembershipController::class, 'confirmation'])->name('membership.confirmation');
    Route::get('/Ekhairat/confirmation', [MembershipController::class, 'editConfirmation'])->name('membership.editConfirmation');
    Route::get('/Ekhairat/edit/{membership}', [MembershipController::class, 'edit'])->name('membership.edit');
    Route::put('/Ekhairat/update/{membership}', [MembershipController::class, 'update'])->name('membership.update');
    Route::get('/Ekhairat/pelan', function () {
        return view('E-khairat.pelanAhli');
    })->name('membership.pelan');
    Route::post('/Ekhairat/Bayar', [MembershipController::class, 'bayar'])->name('membership.bayar');
    Route::get('/Ekhairat/success', [MembershipController::class, 'success'])->name('membership.success');
    Route::get('/Ekhairat/cancel', [MembershipController::class, 'cancel'])->name('membership.cancel');
    Route::get('send-email', [MailController::class, 'sendEmail'])->name('send.email');

    Route::get('/Ekhairat/renew', [MembershipController::class, 'renew'])->name('membership.renew');
    Route::get('/home/removeNotif/{id}', [NotificationController::class, 'removeNotif'])->name('removeNotif');
});


// Informasi Routes (Public)
Route::get('/visi_misi', [InformasiController::class, 'visi_misi'])->name('visi misi');
Route::get('/carta_organisasi', [InformasiController::class, 'carta_organisasi'])->name('carta organisasi');
Route::get('/tab-content/informasi', [InformasiController::class, 'partial']);

// Berita Umum Routes (Public)
Route::get('/berita_umum', [BeritaController::class, 'index'])->name('berita umum');
Route::get('/search', [BeritaController::class, 'search'])->name('search.berita');
Route::get('/details_berita/{berita}', [BeritaController::class, 'show'])->name('details.berita');
Route::get('/tab-content/berita', [BeritaController::class, 'partial']);

// Aktiviti Masjid Routes (Public)
Route::get('/berita-masjid', [BeritaController::class, 'beritaMasjid'])->name('berita-masjid');
Route::get('/berita-masjid/aktiviti', [AktivitiController::class, 'index'])->name('aktiviti.index');
Route::get('/berita-masjid/aktiviti/{aktiviti}', [AktivitiController::class, 'show'])->name('aktiviti.show');
Route::get('/berita-masjid/aktiviti/search', [AktivitiController::class, 'search'])->name('aktiviti.search');
Route::get('/tab-content/aktiviti', [AktivitiController::class, 'partial']);


Route::get('/Ekhairat/Polisi', [MembershipController::class, 'info'])->name('membership.polisi');
Route::get('/Ekhairat/LatarBelakang', function () {
    return view('E-khairat.latarBelakang');
})->name('membership.latarBelakang');

// Chatbot Routes (Public)
Route::post('/chatbot', [ChatbotController::class, 'handle']);

// Infaq routes (Public and Logged-in User)
Route::get('/infaq', [InfaqController::class, 'derma'])->name('infaq.derma');
Route::post('/infaq/bayar', [InfaqController::class, 'bayar'])->name('infaq.bayar');
Route::get('/infaq/success', [InfaqController::class, 'success'])->name('infaq.success');
Route::get('/infaq/cancel', [InfaqController::class, 'cancel'])->name('infaq.cancel');
Route::post('/webhook', [InfaqController::class, 'webhook'])->name('infaq.webhook');

// Hubungi Kami Routes (Public)
Route::get('/hubungi_kami', [ContactController::class, 'index'])->name('hubungi.kami');
Route::get('/contact/submit', [ContactController::class, 'submitForm'])->name('contact.submit');

// Tempah Dewan Routes (Public)
Route::get('/tempah-dewan', [TempahDewanController::class, 'create'])->name('tempah.dewan.create');
Route::post('/tempah-dewan', [TempahDewanController::class, 'store'])->name('tempah.dewan.store');

// Catch-all route for debugging
Route::fallback(function () {
    return '404 - Not Found';
});

require __DIR__ . '/auth.php';
