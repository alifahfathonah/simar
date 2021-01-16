<?php
function konversiBulan($angka){
    $bulanStatistik=array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Augustus', 'September', 'Oktober', 'November', 'Desember');
    $index=$angka-1;
    return $bulanStatistik[$index];

}
