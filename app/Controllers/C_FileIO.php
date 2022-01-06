<?php

namespace App\Controllers;

use Mpdf\Mpdf;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;


class C_FileIO extends BaseController
{
    function __construct()
    {
        $this->session = \Config\Services::session();
    }

    function readExcel()
    {
        $reader = new Xlsx();
        $spreadsheet = $reader->load("assets/excel/Data Penjualan.xlsx");
        $data = $spreadsheet->getActiveSheet()->toArray();

        return $data;
    }

    public function index()
    {
        $data = $this->readExcel();
        return view('pages/admin/V_Data Penjualan', ['spreadsheet' => $data]);
    }

    function toPDF()
    {
        $data = $this->readExcel();
        $mpdf = new Mpdf();
        $html = view('pages/admin/V_PreviewPDF', ['spreadsheet' => $data]);
        $mpdf->WriteHTML($html);

        $this->response->setContentType('application/pdf');
        $mpdf->Output('Data Penjualan.pdf', 'I');
    }

}
