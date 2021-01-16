<?php
foreach ($cetaksuratkeluar as $admin) {
    $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);

    // set document information
    $pdf->SetCreator('Pegawai Perputakaan Universitas Ahmad Dahlan');
    $pdf->SetAuthor('Perputakaan Universitas Ahmad Dahlan');
    $pdf->SetTitle('Arsip Surat Keluar - No Surat - ' . $admin['nomor_surat']  . ' ');
    $pdf->SetSubject('Arsip Surat Keluar');

    // set default header data
    $pdf->SetHeaderData(NULL, NULL, 'Data Arsip Surat Keluar Perpustakaan Universitas Ahmad Dahlan' . NULL,  NULL, array(0, 64, 255), array(0, 64, 128));
    $pdf->setFooterData(array(0, 64, 0), array(0, 64, 128));
    // set margins
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    $pdf->SetHeaderMargin(10);
    $pdf->SetFooterMargin(10);

    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
    $pdf->setFontSubsetting(true);
    $pdf->AddPage();

    $html = '
    <table cellspacing="10" cellpadding="1" >
<tr>
    <th width="30%">Tanggal Surat</th>
    <td> ' . $admin['tanggal_surat'] . ' </td>
</tr>
<tr>
    <th>Pengolah Surat</th>
    <td> '  . $admin['pengolah'] . ' </td>
</tr>
<tr>
    <th>Nomor Surat</th>
    <td> ' . $admin['nomor_surat'] . '</td>
</tr>
<tr>
    <th>Tujuan Surat</th>
    <td> ' . $admin['tujuan'] . ' </td>
</tr>
<tr>
    <th>Perihal</th>
    <td> '  . $admin['perihal'] . ' </td>
</tr>
<tr>
    <th>Jenis Surat</th>
    <td> ' . $admin['jenis'] . ' </td>
</tr>
<tr>
    <th>File</th>
</tr>';
    $pdf->Image('arsip/suratkeluar/' . $admin['file'] . '', 75, 100, 120, 160.42, '', '', '', false, 300, '', false, false, 1, false, false, false);
    $pdf->writeHTML($html, true, false, true, false, '');
    $pdf->Output('ArsipSuratKeluar-' . $admin['nomor_surat'] . '.pdf', 'I');
    $html .= '</table>';
}
