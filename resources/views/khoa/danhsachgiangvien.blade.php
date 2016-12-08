@if( !empty($info) )
    {{ $info }}
@endif

<h3>Danh sách giảng viên</h3>
<div>
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
                  <td>'.$gv->hoten.'</td>
                  <td>'.$gv->email.'</td>
                </tr>';
            }

            ?>
        </tbody>

    </table>
</div>
<div class="row center">
<?php
    use App\Helpers\Pagination;
    $query = DB::select('select count(*) as total from giangvien');
    $total = $query[0]->total;
    $limit = 10;
    $paginationObj = new Pagination(1, $total, $limit);
    $pagination = $paginationObj->getPagination();
?>
</div>