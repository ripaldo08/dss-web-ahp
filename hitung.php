<div class="page-header">
    <h1>Perhitungan</h1>
</div>

<div class="panel panel-primary">
    <div style="background-color: #981A40;" class="panel-heading">
        <h3 class="panel-title">Mengukur Konsistensi Kriteria</h3>
    </div>
    <div class="panel-body">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Matriks Perbandingan Kriteria</h3>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Kode</th>
                            <th>Nama</th>
                            <?php
                            $matriks = get_relkriteria();
                            $total = get_baris_total($matriks);
                            foreach ($matriks as $key => $val) : ?>
                                <th><?= $key ?></th>
                            <?php endforeach ?>
                        </tr>
                    </thead>
                    <?php foreach ($matriks as $key => $val) : ?>
                        <tr>
                            <td><?= $key ?></td>
                            <td><?= $KRITERIA[$key] ?></td>
                            <?php foreach ($val as $k => $v) : ?>
                                <td><?= round($v, 3) ?></td>
                            <?php endforeach ?>
                        </tr>
                    <?php endforeach ?>
                    <tfoot>
                        <td>&nbsp;</td>
                        <td>Total</td>
                        <?php foreach ($total as $k => $v) : ?>
                            <td><?= round($v, 3) ?></td>
                        <?php endforeach ?>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Normalisasi</h3>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Kode</th>
                            <?php
                            $normal = normalize($matriks, $total);
                            $rata = get_rata($normal);
                            // $mmult = mmult($matriks, $rata);
                            $cm = consistency_measure($matriks, $rata);
                            foreach ($matriks as $key => $val) : ?>
                                <th><?= $key ?></th>
                            <?php endforeach ?>
                            <th>Jumlah</th>
                            <th>Prioritas</th>
                            <th>Eigen</th>

                        </tr>
                    </thead>
                    <?php foreach ($normal as $key => $val) : ?>
                        <tr>
                            <td><?= $key ?></td>
                            <?php foreach ($val as $k => $v) : ?>
                                <td><?= round($v, 3) ?></td>
                            <?php endforeach ?>
                            <td><?= round(array_sum($val), 3) ?></td>
                            <td><?= round($rata[$key], 3) ?></td>
                            <td><?= round($cm[$key], 3) ?></td>
                        </tr>
                    <?php endforeach ?>
                </table>
            </div>
        </div>
        <div class="panel panel-default">
            <?php
            $mmult = mmult($matriks, $rata);
            $cm = consistency_measure($matriks, $rata);
            foreach ($matriks as $key => $val) : ?>
                <th><?= $key ?></th>
            <?php endforeach ?>
            <?php foreach ($mmult as $key => $val) : ?>
                <tr>
                    <td><?= $key ?></td>
                    <?php foreach ($val as $k => $v) : ?>
                        <td><?= round($v, 3) ?></td>
                    <?php endforeach ?>
                    <td><?= round(array_sum($val), 3) ?></td>
                    <td><?= round($cm[$key], 3) ?></td>
                </tr>
            <?php endforeach ?>
            <div class="panel-body">
                Berikut tabel ratio index berdasarkan ordo matriks.
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <tr>
                        <th>Ordo matriks</th>
                        <?php
                        foreach ($nRI as $key => $value) {
                            if (count($matriks) == $key)
                                echo "<td class='text-primary'>$key</td>";
                            else
                                echo "<td>$key</td>";
                        }
                        ?>
                    </tr>
                    <tr>
                        <th>Ratio index</th>
                        <?php
                        foreach ($nRI as $key => $value) {
                            if (count($matriks) == $key)
                                echo "<td class='text-primary'>$value</td>";
                            else
                                echo "<td>$value</td>";
                        }
                        ?>
                    </tr>
                </table>
            </div>
            <div class="panel-body">
                <?php
                $JML = array_sum($cm);
                $LMD = ((array_sum($cm) / count($cm)) - count($cm));
                $CI = ((array_sum($cm) / count($cm)) - count($cm)) / (count($cm) - 1);
                $RI = $nRI[count($matriks)];
                $CR = $CI / $RI;
                echo "<p>Jumlah: " . round($JML, 3) . "<br />";
                echo "&lambda;max: " . round($LMD, 3) . "<br />";
                echo "Consistency Index: " . round($CI, 3) . "<br />";
                echo "Ratio Index: " . round($RI, 3) . "<br />";
                echo "Consistency Ratio: " . round($CR, 3);
                if ($CR > 0.10) {
                    echo " (Tidak konsisten)<br />";
                } else {
                    echo " (Konsisten)<br />";
                }
                ?>
            </div>
        </div>
    </div>
</div>

<div class="panel panel-primary">
    <div style="background-color: #981A40;" class="panel-heading">
        <h3 class="panel-title">Hasil Analisa</h3>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Nama Alternatif</th>
                    <?php foreach ($KRITERIA as $key => $val) : ?>
                        <th><?= $val ?></th>
                    <?php endforeach ?>
                </tr>
            </thead>
            <?php
            $data = get_rel_alternatif();
            foreach ($data as $key => $val) : ?>
                <tr>
                    <td><?= $key ?></td>
                    <td><?= $ALTERNATIF[$key] ?></td>
                    <?php foreach ($val as $k => $v) : ?>
                        <td><?= $SUB[$v]['nama'] ?></td>
                    <?php endforeach ?>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>
<?php
function get_hasil_bobot($data)
{
    global $SUB;
    $arr = array();
    foreach ($data as $key => $val) {
        foreach ($val as $k => $v) {
            $arr[$key][$k] = $SUB[$v]['nilai_sub'];
        }
    }
    return $arr;
}
$hasil_bobot = get_hasil_bobot($data);
?>
<div class="panel panel-primary">
    <div style="background-color: #981A40;" class="panel-heading">
        <h3 class="panel-title">Hasil Pembobotan</h3>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th rowspan="2">Kode</th>
                    <th rowspan="2">Nama Alternatif</th>
                    <?php foreach ($KRITERIA as $key => $val) : ?>
                        <th><?= $val ?></th>
                    <?php endforeach ?>
                </tr>
                <tr>
                    <?php foreach ($rata as $key => $val) : ?>
                        <th><?= round($val, 4) ?></th>
                    <?php endforeach ?>
                </tr>
            </thead>
            <?php
            foreach ($hasil_bobot as $key => $val) : ?>
                <tr>
                    <td><?= $key ?></td>
                    <td><?= $ALTERNATIF[$key] ?></td>
                    <?php foreach ($val as $k => $v) : ?>
                        <td><?= round($v, 4) ?></td>
                    <?php endforeach ?>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>

<div class="panel panel-primary">
    <div style="background-color: #981A40;" class="panel-heading">
        <h3 class="panel-title">Perangkingan</h3>
    </div>
    <div class="table-responsive">
        <table class="table table-hover table-bordered table-striped">
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Ranking</th>
                    <th>Total</th>
                </tr>
            </thead>
            <?php
            function get_total($hasil_bobot, $rata)
            {
                global $SUB;
                $arr = array();

                foreach ($hasil_bobot as $key => $val) {
                    foreach ($val as $k => $v) {
                        $arr[$key] += $v * $rata[$k];
                    }
                }
                return $arr;
            }
            $total = get_total($hasil_bobot, $rata);
            FAHP_save($total);
            $rows = $db->get_results("SELECT * FROM tb_alternatif  ORDER BY total DESC");
            foreach ($rows as $row) : ?>
                <tr>
                    <td><?= $row->kode_alternatif ?></td>
                    <td><?= $row->nama_alternatif ?></td>
                    <td><?= $row->rank ?></td>
                    <td><?= round($row->total, 4) ?></td>
                </tr>
            <?php endforeach ?>
        </table>
    </div>
    <div class="panel-body">
        <?php
        $best = $rows[0]->kode_alternatif;
        ?>
        <p>Jadi pilihan terbaik adalah <strong><?= $ALTERNATIF[$best] ?></strong> dengan nilai <strong><?= round($total[$best], 3) ?></strong></p>
        <p><a class="btn btn-default" target="_blank" href="cetak.php?m=hitung"><span class="glyphicon glyphicon-print"></span> Cetak</a></p>
    </div>
</div>