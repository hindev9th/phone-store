<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Đơn hàng
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-shopping-cart"></i> Đơn hàng/Thông tin đơn hàng
            </li>
        </ol>
    </div>
</div>

<?php if (isset($data)){ ?>
    <select name="Tinh_Trang" class="form-control" onchange="location = this.value;">
        <?php foreach($dataTT as $val){ ?>
            <option value="index.php?ctrl=oder/Info&act=do_edit&id=<?php echo $data['id'] ?>&id_tt=<?php echo $val['id'] ?>" <?php echo $data['id_tinh_trang']==$val['id'] ? 'selected=selected' : '' ?> >
                <?php echo $val['mo_ta'] ?>
            </option>
        <?php } ?>
    </select>
<?php } ?>