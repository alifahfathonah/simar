<?php
foreach ($cetaksertifikat as $admin) {
    $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);

    // set document information
    $pdf->SetCreator('Pegawai Perputakaan Universitas Ahmad Dahlan');
    $pdf->SetAuthor('Perputakaan Universitas Ahmad Dahlan');
    $pdf->SetTitle('Arsip Sertifikat - No Surat - ' . $admin['name']  . ' ');
    $pdf->SetSubject('Arsip Sertifikat');

    // set default header data
    $pdf->SetHeaderData(NULL, NULL, 'Data Arsip Sertifikat Perpustakaan Universitas Ahmad Dahlan' . NULL,  NULL, array(0, 64, 255), array(0, 64, 128));
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
    <th width="30%">Pemilik</th>
    <td> ' . $admin['name'] . ' </td>
</tr>
<tr>
    <th>Tanggal Diterima</th>
    <td> '  . $admin['tanggal_diterima'] . ' </td>
</tr>
<tr>
    <th>Tanggal Kegiatan</th>
    <td> ' . $admin['tanggal_kegiatan'] . '</td>
</tr>
<tr>
    <th>Nama Kegiatan</th>
    <td> ' . $admin['nama_kegiatan'] . ' </td>
</tr>
<tr>
    <th>Asal Sertifikat</th>
    <td> '  . $admin['asal_sertifikat'] . ' </td>
</tr>
<tr>
    <th>Sebagai</th>
    <td> ' . $admin['sebagai'] . ' </td>
</tr>
<tr>
    <th>Jumlah Jam</th>
    <td> ' . $admin['jumlah_jam'] . ' </td>
</tr>
<tr>
    <th>File</th>
</tr>';
    $pdf->Image('arsip/sertifikat/' . $admin['file'] . '', 75, 100, 120, 160.42, '', '', '', false, 300, '', false, false, 1, false, false, false);
    $pdf->writeHTML($html, true, false, true, false, '');
    $pdf->Output('ArsipSertifikat-' . $admin['name'] . '.pdf', 'I');
    $html .= '</table>';
}
