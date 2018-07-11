<a href="https://wm-dev.atlassian.net/wiki/spaces/LAR/pages/3019850?preview=/3019850/6389773/forms.jpg">See screen</a>

<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Forms</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->

    <form class="js-submit " action="" method="post">
        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
        <div class="box-body">
            <div class="form-group margin ">
                <label for="input1" >Название *</label>
                <input type="text" class="form-control" id="input1">
            </div>

            <div class="form-group margin">
                <label>Родительская категория</label>
               <select class="form-control select2 select2-hidden-accessible js_ui-base-select" style="width: 100%;" tabindex="-1" aria-hidden="true">
                    <option selected="selected">Alabama</option>
                    <option>Alaska</option>
                    <option>California</option>
                    <option>Delaware</option>
                    <option>Tennessee</option>
                    <option>Texas</option>
                    <option>Washington</option>
                </select>
            </div>
            <div class="form-group margin ">
                <label for="input1" >Ссылка *</label>
                <div class="input-group">
                    <div class="input-group-btn">
                        <button type="button" class="btn  disabled">http://electro-project.com.ua/category1/</button>
                    </div>
                    <input type="email" class="form-control" id="input1" >
                </div>

            </div>
            <div class="form-group margin ">
                <label for="exampleInputFile">File input</label>
                <input type="file" id="exampleInputFile">
            </div>

            <div class="form-group margin ">
                <div class="checkbox">
                    <label>
                        <input type="checkbox"> default checkbox
                    </label>
                </div>

            </div>
            <div class="form-group  margin">
                <label>Multiple</label>
                <select class="form-control js-select2 js_ui-selected-all" multiple data-placeholder="Select a State" style="width: 100%;" tabindex="-1" aria-hidden="true">
                    <option>Alabama</option>
                    <option>Alaska</option>
                    <option>California</option>
                    <option>Delaware</option>
                    <option>Tennessee</option>
                    <option>Texas</option>
                    <option>Washington</option>
                </select>
            </div>
            <div class="margin">
                <label style="font-weight: normal;">
                    <input type="checkbox" class="minimal-blue js_ui-checkbox-selected-all" data-select='.js_ui-selected-all'>
                    Все категории
                </label>
            </div>
            <div class="margin">
                <label>
                    <input type="checkbox" class="minimal-red" checked>
                    checkbox type2
                </label>
                <br>
                <label>
                    <input type="checkbox" class="minimal">
                    checkbox type3
                </label>
                <br>
                <label style="font-weight: normal;">
                    <input type="radio" class="minimal-blue" checked name="radio">
                   radio type1
                </label>
                <br>
                <label>
                    <input type="radio" class="minimal-red" name="radio">
                    radio type2
                </label>
                <br>
                <label>
                    <input type="radio" class="minimal" name="radio">
                    radio type3
                </label>
            </div>
            <div class="margin ckeditor">
                <textarea name="" id="ckEditor" cols="30" rows="10"></textarea>
            </div>
            <div class="form-group margin">
                <label>Date range:</label>
                <div class="row">
                    <div class="col-md-3">
                        From:
                        <div class="input-group">
                            <div class="input-group-addon datepicker">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input class="form-control js_date_range_picker" data-format="d/m/Y" data-time="false">
                        </div>
                    </div>
                    <div class="col-md-3">
                        To:
                        <div class="input-group">
                            <div class="input-group-addon datepicker">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input class="form-control js_date_range_picker-end" data-format="d/m/Y"  data-time="false">
                        </div>
                    </div>
                </div>

                <!-- /.input group -->
            </div>

        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <button type="submit" class="btn btn-info pull-right">Submit</button>
        </div>
        <!-- /.box-footer -->
    </form>
    <!-- form end -->
</div>
