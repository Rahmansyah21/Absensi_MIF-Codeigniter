<table class="table table-bordered dataTable" id="dataTable">
               <thead>
                <tr>
                      <th>NIS</th>
                      <th>Nama</th>
                      <th>
                          Status Kehadiran(Pulang)
                      </th>
                  </tr>

               </thead>
               <tbody>

                <?php
                    foreach($ql as $data){

                ?>
                <tr>
                    <td><?= $data["nis"] ?></td>
                    <td><?= $data["nama"] ?></td>
                    <input type="text" name="kelas" hidden value="<?= $data["id_kelas"] ?>">
                    <input type="text" name="nis[]" hidden value="<?= $data["nis"] ?>">
                    <input type="hidden" name="type" value="2">
                    <?php
                    $now = date('Y-m-d');
                    $ci=& get_instance();
                    $ci->load->database();
                    $d = $ci->db->query("SELECT * FROM tb_absen_harian WHERE id_kelas='$data[id_kelas]'")->row_array();
                    $dd = $ci->db->query("SELECT * FROM tb_absen_harian WHERE tanggal like '%$now%' and nis='$data[nis]' and type='2'")->row_array();
                    ?>
                    <td>
                    <select name="status_absen[]" id="status_absen" class="form-control">
                            <option value="">Pilih Status</option>
                            <option value="Pulang" <?= $dd['status_absen'] == "Pulang" ? 'selected' : '' ?>>Pulang</option>
                        </select>
                    </td>
                </tr>
                    <?php } ?>
                    </tbody>
            </table>
