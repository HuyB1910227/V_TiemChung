<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once __DIR__ . '/../layouts/meta.php'; ?>
    <title>Lịch sử tiêm chủng</title>
    <?php include_once __DIR__ . '/../layouts/styles.php'; ?>
</head>
<body class="container-fluid">
    <?php include_once __DIR__ . '/../layouts/partials/header.php'; ?>
    <main class="row">
      <div class="container-lg">
         <h2 class="text-center">Lịch sử tiêm chủng Covid-19</h2>
         <table class="table table-bordered">
            <tr>
               <th>Mũi số</th>
               <th>Tên vắc xin</th>
               <th>Ngày tiêm</th>
               <th>Cơ sở tiêm chủng</th>
            </tr>
           
            <?php foreach($arrLST as $lst):?>
            <?php $tt->find($lst->tc_id);?>
            <tr>
               <td><?= $tt->lantiem?></td>
               <td><?= $vaccine->find($tt->v_id)->ten ?></td>
               <td><?= $tt->ngaytiem?></td>
               <td><?= $coso->find($tt->cs_id)->ten?></td>
            </tr>
            
           <?php endforeach; ?>
         
         </table>
      </div>
  </main>

    <?php include_once __DIR__ . '/../layouts/partials/footer.php'; ?>
    


    <?php include_once __DIR__ . '/../layouts/script.php'; ?>
</body>
</html>