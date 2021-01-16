<?php
foreach ($cetaksuratmasuk as $admin) {
    $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);

    // set document information
    $pdf->SetCreator('Pegawai Perputakaan Universitas Ahmad Dahlan');
    $pdf->SetAuthor('Perputakaan Universitas Ahmad Dahlan');
    $pdf->SetTitle('Arsip Surat Masuk - No Surat - ' . $admin['no_surat']  . ' ');
    $pdf->SetSubject('Arsip Surat Masuk');

    // set default header data
    $pdf->SetHeaderData(NULL, NULL, 'Data Arsip Surat Masuk Perpustakaan Universitas Ahmad Dahlan' . NULL,  NULL, array(0, 64, 255), array(0, 64, 128));
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
    <th width="30%">Tanggal Diterima</th>
    <td> ' . $admin['tanggal_diterima'] . ' </td>
</tr>
<tr>
    <th>Tanggal Surat</th>
    <td> '  . $admin['tanggal_surat'] . ' </td>
</tr>
<tr>
    <th>No Surat</th>
    <td> ' . $admin['no_surat'] . '</td>
</tr>
<tr>
    <th>Perihal</th>
    <td> ' . $admin['perihal'] . ' </td>
</tr>
<tr>
    <th>Asal Surat</th>
    <td> '  . $admin['asal_surat'] . ' </td>
</tr>
<tr>
    <th>Disposisi</th>
    <td> ' . $admin['disposisi'] . ' </td>
</tr>
<tr>
    <th>Keterangan Disposisi</th>
    <td> ' .  $admin['keterangan_dis'] . ' </td>
</tr>
<tr>
    <th>File</th>
</tr>';
    $pdf->Image('arsip/suratmasuk/' . $admin['file'] . '', 75, 100, 120, 160.42, '', '', '', false, 300, '', false, false, 1, false, false, false);
    $pdf->writeHTML($html, true, false, true, false, '');
    $pdf->Output('ArsipSuratMasuk-' . $admin['no_surat'] . '.pdf', 'I');
    $html .= '</table>';
}
