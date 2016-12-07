<h3>Danh sách giảng viên</h3>

<table class="table">

    <thead>
      <tr>
        <th>Mã giảng viên</th>
        <th>Họ và tên</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody>
    <?php
      $list = DB::select('select * from giangvien');
      foreach ($list as $gv) {
          echo '<tr>
            <td>'.$gv->magiangvien.'</td>
            <td>Doe</td>
            <td>john@example.com</td>
          </tr>';
      }

      ?>
    </tbody>

</table>