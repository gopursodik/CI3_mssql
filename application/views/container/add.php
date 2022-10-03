<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<style type="text/css">
    .input-group deep input {
        width: 190px;
    }
</style>
<div class="container pt-5" style="min-height:700px">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Container</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('container'); ?>">List Data</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Data</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-body">
                    <div id="versandz">pick</div>
                    <?php
                    //create form
                    $attributes = array('id' => 'FrmAddContainer', 'method' => "post", "autocomplete" => "off");
                    echo form_open('', $attributes);
                    ?>

                    <div class="form-group row">
                        <label for="container_no" class="col-sm-2 col-form-label">Container Number</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="container_no" name="container_no" value=" <?= set_value('container_no'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('container_no') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="size" class="col-sm-2 col-form-label">Size</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="size" name="size" value=" <?= set_value('size'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('size') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="type" class="col-sm-2 col-form-label">Type</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="type" name="type">
                                <option value="Dry" <?php if (set_value('type') == "Dry") : echo "selected";
                                                        endif; ?>>Dry</option>
                                <option value="Refeer" <?php if (set_value('type') == "Refeer") : echo "selected";
                                                            endif; ?>>Refeer</option>
                            </select>
                            <small class="text-danger">
                                <?php echo form_error('type') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="gate_in" class="col-sm-2 col-form-label">Gate In Date</label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control datepicker" id="gate_in" name="gate_in" value="<?= set_value('gate_in'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('gate_in') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-10 offset-md-2">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a class="btn btn-secondary" href="javascript:history.back()">Kembali</a>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    config = {
        enableTime : true,
        dateFormat : "Y-m-d H:m:s",
        position : "center center"
    }
    flatpickr(".datepicker", config);

</script>