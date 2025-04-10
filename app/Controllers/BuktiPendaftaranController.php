<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\SiswaModel;
use Dompdf\Dompdf;
use Dompdf\Options;

class BuktiPendaftaranController extends BaseController
{
    protected $siswaModel;
    
    public function __construct()
    {
        $this->siswaModel = new SiswaModel();
    }
    
    public function index($id_siswa)
    {
        // Ambil data siswa dari database berdasarkan ID
        $siswaData = $this->siswaModel->find($id_siswa);

        if (empty($siswaData)) {
            return redirect()->to('/bukti-pendaftaran')->with('error', 'Data siswa tidak ditemukan');
        }

        // Siapkan data untuk view
        $data = [
            'title' => 'Bukti Pendaftaran',
            'page'  => 'buktipendaftaran',
            'siswa' => $siswaData,
        ];
        return view('user/buktipendaftaran', $data); // Pastikan view di folder yang benar
    }    
    
    public function generatePdf($id_siswa)
    {
        // Get student data by ID
        $siswa = $this->siswaModel->find($id_siswa);
        
        if (empty($siswa)) {
            return redirect()->to('/bukti-pendaftaran')->with('error', 'Data siswa tidak ditemukan');
        }
        
        $data = [
            'siswa' => $siswa
        ];
        
        // Generate HTML content
        $html = view('/user/buktipendaftaran', $data);
        
        // Initialize Dompdf
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);
        
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        
        // Generate file name
        $filename = 'Bukti_Pendaftaran_' . $siswa['nama_lengkap'] . '.pdf';
        
        // Stream PDF to browser
        return $dompdf->stream($filename);
    }
}