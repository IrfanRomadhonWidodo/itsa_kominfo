<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;

class DownloadController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'File Syarat dan Ketentuan ITSA',
            'content' => 'Ini adalah isi laporan yang ditampilkan dan bisa diunduh dalam format Word.'
        ];

        return view('pages.download', $data);
    }

    public function downloadWord()
    {
        $phpWord = new PhpWord();
        $section = $phpWord->addSection();
        $section->addText('File Syarat dan Ketentuan ITSA');
        $section->addText('Ini adalah isi laporan yang akan diunduh sebagai dokumen Word.');

        $fileName = 'laporan.docx';
        $tempFile = tempnam(sys_get_temp_dir(), 'word');
        $writer = IOFactory::createWriter($phpWord, 'Word2007');
        $writer->save($tempFile);

        return response()->download($tempFile, $fileName)->deleteFileAfterSend(true);
    }
}