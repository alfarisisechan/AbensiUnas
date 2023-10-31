<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=$data[username]-$data[namaMK].xls");
?>
        <table border="1" align="center">
            <thead>
                <tr class="fw-bold">
                    <th width="100">No</th>
                    <th width="150">Nama Mata Kuliah</th>
                    <th width="150">Kode Kelas</th>
                    <th width="150">Nim</th>
                    <th width="150">Nama</th>
                    <th width="100">Jumlah Kehadiran</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $no = 1;
                    foreach ($data['MhsKodeMK'] as $rowss) :?>
                <tr height="126">
                    <td align="center" style="vertical-align: middle;"><?= $no++;?></td>
                    <td align="center" style="vertical-align: middle;"><?= $rowss['nama_mk'];?></td>
                    <td align="center" style="vertical-align: middle;"><?= $rowss['kode_kelas'];?></td>
                    <td align="center" style="vertical-align: middle;">&nbsp;<?= $rowss['nim_mahasiswa'];?>&nbsp;</td>
                    <td align="center" style="vertical-align: middle;"><?= $rowss['nama_mahasiswa'];?></td>
                    <td align="center" style="vertical-align: middle;"><?= $rowss['total'];?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
