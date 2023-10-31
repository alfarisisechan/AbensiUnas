<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=$data[username]-$data[namaMK].xls");
?>
        <table border="1" align="center">
            <thead>
                <tr class="fw-bold">
                    <th width="150">Nama Mata Kuliah</th>
                    <th width="150">Kode Kelas</th>
                    <th width="150">Nim</th>
                    <th width="150">Nama</th>
                    <th width="150">Tanggal</th>
                    <th width="150">Jam</th>
                    <th width="207" class="text-center">Bukti Foto</th>
                    <th width="150">Status</th>
                    <th width="150">Jumlah Kehadiran</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($data['MhsKodeMK'] as $rowss) :?>
                <tr height="126">
                    <td align="center" style="vertical-align: middle;"><?= $rowss['nama_mk'];?></td>
                    <td align="center" style="vertical-align: middle;"><?= $rowss['kode_kelas'];?></td>
                    <td align="center" style="vertical-align: middle;">&nbsp;<?= $rowss['nim_mahasiswa'];?>&nbsp;</td>
                    <td align="center" style="vertical-align: middle;"><?= $rowss['nama_mahasiswa'];?></td>
                    <td align="center" style="vertical-align: middle;"><?= $rowss['tanggal'];?></td>
                    <td align="center" style="vertical-align: middle;"><?= $rowss['jam'];?></td>
                    <td style="text-align: center;"><img height="100" width="auto" style="text-align: center;"
                            src="<?= base_url; ?>/image/bukti_kehadiran/<?= $rowss['bukti_absensi'];?>"></td>
                    <td align="center" style="vertical-align: middle;"><?= $rowss['status_absensi'];?></td>
                    <td align="center" style="vertical-align: middle;"><?= $rowss['total'];?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
