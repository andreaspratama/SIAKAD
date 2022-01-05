<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/home', 'HomeController@index');
Route::get('/home/info/{slug}', 'HomeController@infoLebih');

Route::prefix('/')
    ->namespace('Admin')
    ->group(function(){
        Route::get('/home/admin', 'DashboardController@index')
        ->name('dashboard.admin')
        ->middleware('auth', 'check:admin');
        Route::get('/home/guru', 'DashboardController@index')
        ->name('dashboard.guru')
        ->middleware('auth', 'check:guru');
        Route::get('/', 'AuthController@login')
        ->name('login');
        Route::post('/postlogin', 'AuthController@postlogin')
        ->name('postlogin');
        Route::get('/logout', 'AuthController@logout')
        ->name('logout');
        Route::get('/resetpass', 'AuthController@reset')
        ->name('reset');
        Route::post('/postreset', 'AuthController@postreset')
        ->name('postreset');
        
        Route::group(['middleware' => ['auth', 'check:admin']], function(){
            Route::get('siswa', 'SiswaController@index');
            Route::get('siswa/create', 'SiswaController@create');
            Route::post('siswa/store', 'SiswaController@store');
            Route::get('siswa/{siswa}/show', 'SiswaController@show');
            Route::get('siswa/{siswa}/edit', 'SiswaController@edit');
            Route::put('siswa/{siswa}/update', 'SiswaController@update');
            Route::get('siswa/{siswa}/destroy', 'SiswaController@destroy');
            // Route::post('siswa/{siswa}/nilai', 'SiswaController@nilai');
            // Route::post('/siswa/{id}/nilaiupdate', 'SiswaController@nilaiupdate');
            // Route::get('/siswa/{id}/{idmapel}/nilaitambah', 'SiswaController@nilaitambah');
            // Route::get('/siswa/{siswa}/hapusnilai', 'SiswaController@hapusnilai');
            Route::get('siswa/{siswa}/nilaiedit', 'SiswaController@nilaiedit');
            Route::get('siswa/exportexcel', 'SiswaController@exportExcel');
            Route::post('siswa/importexcel', 'SiswaController@importExcel')->name('importexcel');
            Route::get('siswa/exportpdf', 'SiswaController@exportPdf');
            Route::get('siswa/{siswa}/nilaiexport', 'SiswaController@exportNilaiPdf');
            Route::get('ubahPassword', 'PasswordController@create')->name('password.create');
            Route::put('ubahPassword', 'PasswordController@update')->name('password.update');
            
            Route::get('guru', 'GuruController@index');
            Route::get('guru/create', 'GuruController@create');
            Route::post('guru/store', 'GuruController@store');
            Route::get('guru/{guru}/show', 'GuruController@show');
            Route::get('guru/{guru}/edit', 'GuruController@edit');
            Route::put('guru/{guru}/update', 'GuruController@update');
            Route::get('guru/{guru}/destroy', 'GuruController@destroy');
            Route::post('guru/{guru}/nilai', 'GuruController@nilai');
            Route::get('guru/exportexcel', 'GuruController@exportExcel');
            Route::get('guru/exportpdf', 'GuruController@exportPdf');
            
            Route::get('jadwalmapel', 'JadwalmapelController@index');
            Route::get('jadwalmapel/create', 'JadwalmapelController@create');
            Route::post('jadwalmapel/store', 'JadwalmapelController@store');
            Route::get('jadwalmapel/{jadwalmapel}/show', 'JadwalmapelController@show');
            Route::get('jadwalmapel/{jadwalmapel}/edit', 'JadwalmapelController@edit');
            Route::put('jadwalmapel/{jadwalmapel}/update', 'JadwalmapelController@update');
            Route::get('jadwalmapel/{jadwalmapel}/destroy', 'JadwalmapelController@destroy');
            Route::post('jadwalmapel/{jadwalmapel}/nilai', 'JadwalmapelController@nilai');
            Route::get('jadwalmapel/exportexcel', 'JadwalmapelController@exportExcel');
            Route::get('jadwalmapel/exportpdf', 'JadwalmapelController@exportPdf');
    
            Route::get('mapel/{mapel}/hapus', 'MapelController@hapus');
            Route::resource('mapel', 'MapelController');
            Route::get('cetakTglklsPdf', 'TinggalkelasController@cetakPDF')->name('tglkelas.cetakpdf');
            Route::get('cetakTglklsExcel', 'TinggalkelasController@cetakEXCEL')->name('tglkelas.cetakexcel');
            Route::get('siswa/{tinggalkelas}/tinggalkelas', 'TinggalkelasController@hapus')->name('tglkelas');
            Route::resource('tinggalkelas', 'TinggalkelasController');
            Route::get('exkul/{exkul}/hapus', 'ExkulController@hapus');
            Route::resource('exkul', 'ExkulController');
            Route::get('ruang/{ruang}/hapus', 'RuangController@hapus');
            Route::resource('ruang', 'RuangController');
            Route::get('thnakademik/{thnakademik}/hapus', 'ThnakademikController@hapus');
            Route::resource('thnakademik', 'ThnakademikController');
            Route::resource('sekolah', 'SekolahController');
            Route::get('jenispem/{jenispem}/hapus', 'JenispemController@hapus');
            Route::resource('jenispem', 'JenispemController');
            Route::get('cetakPembayaran', 'PembayaranController@cetakPembayaran')->name('pembayaran.cetak');
            Route::get('cetakPembayaranPertanggal/{tglawal}/{tglakhir}', 'PembayaranController@cetakPembayaranPertanggal')->name('pembayaran.cetaktgl');
            Route::get('cetakPembayaranPdf', 'PembayaranController@cetakPDF')->name('pembayaran.cetakpdf');
            Route::get('cetakPembayaranExcel', 'PembayaranController@cetakEXCEL')->name('pembayaran.cetakexcel');
            Route::get('pembayaran/{pembayaran}/hapus', 'PembayaranController@hapus');
            Route::resource('pembayaran', 'PembayaranController');
            Route::get('info/{info}/hapus', 'InfoController@hapus');
            Route::resource('info', 'InfoController');
            Route::get('cetakAbsen', 'AbsenController@cetakAbsen')->name('absen.cetak');
            Route::get('cetakAbsenPertanggal/{tglawal}/{tglakhir}', 'AbsenController@cetakAbsenPertanggal')->name('absenguru.cetaktgl');
            Route::get('cetakAbsenPdfGuru', 'AbsenController@cetakPDF')->name('absenguru.cetakpdf');
            Route::get('cetakAbsenExcelGuru', 'AbsenController@cetakEXCEL')->name('absenguru.cetakexcel');
            Route::resource('absen', 'AbsenController');
            Route::get('cetakAbsenSiswa', 'AbsensiswaController@cetakAbsen')->name('absensiswa.cetak');
            Route::get('cetakAbsenPertanggalSiswa/{tglawal}/{tglakhir}', 'AbsensiswaController@cetakAbsenPertanggal')->name('absensiswa.cetaktgl');
            Route::get('cetakAbsenPdf', 'AbsensiswaController@cetakPDF')->name('absensiswa.cetakpdf');
            Route::get('cetakAbsenExcel', 'AbsensiswaController@cetakEXCEL')->name('absensiswa.cetakexcel');
            Route::resource('absensiswa', 'AbsensiswaController');
            Route::get('cetakPembayaranOnlinePdf', 'OnlinepembController@cetakPDF')->name('pembayaranonline.cetakpdf');
            Route::get('cetakPembayaranOnlineExcel', 'OnlinepembController@cetakEXCEL')->name('pembayaranonline.cetakexcel');
            Route::get('buktiPembOnline', 'OnlinepembController@indexadmin')->name('online.pemb');
            Route::get('buktiPembOnline/{id}/detail', 'OnlinepembController@detail')->name('detail.pemb');
            Route::resource('penilaianguru', 'Penilaianguruc');

            // Route::get('nilai', 'NilaiController@index');
            // Route::get('siswa/{siswa}/nilai', 'NilaiController@detail');
            // Route::post('siswa/{siswa}/nilaitambah', 'NilaiController@nilai');
            // Route::get('/siswa/{id}/{idmapel}/nilaitambah', 'NilaiController@nilaitambah');
            // Route::post('/siswa/{id}/nilaiupdate', 'NilaiController@nilaiupdate');
            Route::get('user/{user}/hapus', 'UserController@hapus');
            Route::resource('user', 'UserController');
        });

        Route::group(['middleware' => ['auth', 'check:siswa']], function(){
            Route::get('siswa/profile', 'SiswaController@profile');
            Route::get('siswa/absen', 'SiswaController@absen');
            Route::post('absensiswa', 'SiswaController@absenpros');
            // Route::get('info', 'HomeController@index');
            // Route::get('/info/{slug}', 'HomeController@infoLebih');
            Route::get('siswa/profile/edit/{id}', 'SiswaController@profileedit');
            Route::get('siswa/nilai', 'SiswaController@lihatNilai');
            Route::get('siswa/jadwal', 'SiswaController@jadwal');
            Route::get('siswa/tugas', 'SiswaController@tugas');
            Route::get('siswa/cetaknilai', 'SiswaController@cetakNilai');
            Route::resource('upload', 'OnlinepembController');
        });

        Route::group(['middleware' => ['auth', 'check:guru']], function(){
            Route::get('guru/profile', 'GuruController@profile');
            Route::get('guru/jadwal', 'JadwalmapelController@jadwal');
            Route::get('guru/tugas', 'TugasController@tugas');
            Route::get('guru/absen', 'GuruController@absen');
            Route::post('absen', 'GuruController@absenpros');
            Route::get('guru/nilai', 'NilaiController@index');
            Route::get('guru/nilaiProses/{kelas}', 'NilaiController@proses');
            Route::get('siswa/{siswa}/nilai', 'NilaiController@detail');
            Route::get('siswa/{siswa}/nilai/detail', 'NilaiController@detailNilai');
            Route::post('siswa/{siswa}/nilaitambah', 'NilaiController@nilai');
            Route::get('/siswa/{id}/{idmapel}/nilaitambah', 'NilaiController@nilaitambah');
            Route::get('/siswa/{id}/{idmapel}/hapus', 'NilaiController@nilaihapus');
            Route::post('/siswa/{id}/nilaiupdate', 'NilaiController@nilaiupdate');
            Route::get('cetakNilai/{id}', 'NilaiController@cetakNilai')->name('nilai.cetak');
            Route::get('cetakNilaiPeraka/{id}/{thnakademik}', 'NilaiController@cetakNilaiPeraka')->name('cetaknilai.cetakaka');
            // Route::post('guru/store', 'TugasController@store');
        });
    });
