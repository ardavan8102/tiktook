<div class="tiktook-departments wrap nosubsub">

    <h1 class="wp-heading-inline">دپارتمان ها</h1>

    <hr class="wp-header-end">

    <div id="ajax-response"></div>
    <div id="col-container" class="wp-clearfix">

        <div id="col-left">

            <div class="col-wrap">

                <div class="form-wrap">

                    <h2>دپارتمان جدید</h2>

                    <form method="post" id="tiktook-add-department">

                        <div class="form-field">
                            <label for="department-name">عنوان</label>
                            <input type="text" name="name" id="department-name">
                        </div>

                        <div class="form-field term-parent-wrap">
                            <label for="department-parent">والد</label>
                            <select name="parent" id="department-parent">
                                <option value="0">بدون والد</option>
                                <option value="1">عنوان والد</option>
                            </select>
                        </div>
                        
                        <div class="form-field">
                            <label for="department-answerable">کاربران پاسخگو</label>
                            <select name="answerable[]" id="department-answerable" multiple>
                            </select>
                        </div>

                        <div class="form-field">
                            <label for="department-position">موقعیت</label>
                            <input type="number" class="small-text" name="position" id="department-position">
                        </div>

                        <div class="form-field">
                            <label for="department-desc">توضیح کوتاه</label>
                            <textarea name="description" id="department-desc" rows="5" cols="40"></textarea>
                        </div>

                        <p class="submit">
                            <input type="submit" name="submit" class="button button-primary" value="افزودن">
                        </p>

                    </form>

                </div>

            </div>

        </div>

        <div id="col-right">

            <div class="col-wrap">

                <table class="wp-list-table widefat fixed striped">
                    <thead>
                        <tr>
                            <th scope="col" class="manage-column">عنوان</th>
                            <th scope="col" class="manage-column">والد</th>
                            <th scope="col" class="manage-column">کاربران پاسخگو</th>
                            <th scope="col" class="manage-column">موقعیت</th>
                        </tr>
                    </thead>

                    <tbody id="the-list">

                        <tr>
                            <td>
                                <strong>عنوان</strong>
                                <br>
                                <div class="row-actions">
                                    <span class="edit"><a href="">ویرایش</a> | </span>
                                    <span class="delete"><a href="">حذف</a></span>
                                </div>
                            </td>
                            <td></td>
                            <td></td>
                            <td>l</td>
                        </tr>

                    </tbody>

                    <tfoot>
                        <tr>
                            <th scope="col" class="manage-column">عنوان</th>
                            <th scope="col" class="manage-column">والد</th>
                            <th scope="col" class="manage-column">کاربران پاسخگو</th>
                            <th scope="col" class="manage-column">موقعیت</th>
                        </tr>
                    </tfoot>
                </table>

            </div>

        </div>

    </div>

</div>