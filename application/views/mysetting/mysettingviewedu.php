 <div class="ui segment">
    <h4>教育信息：</h4>
    <table class="ui compact table segment">
        <thead>
            <tr>
                <th>起止时间</th>
                <th>学校</th>
                <th>专业</th>
                <th>学历</th>
                <th>GPA</th>
                <th>管理</th>
            </tr>
        </thead>
        <tbody id="edutbody">
            <?php
            if($edu_items)
            {                   
                foreach($edu_items as $row)
                {
                    echo "<tr>";
                    echo "<td>";
                    echo $row[''];
                    echo "</td>";
                    echo "<td>";
                    echo $row[''];
                    echo "</td>";
                    echo "<td>";
                    echo $row[''];
                    echo "</td>";
                    echo "<td>";
                    echo $row[''];
                    echo "</td>";
                    echo "<td>";
                    echo $row[''];
                    echo "</td>";
                    echo ' <td>
                    <div class="ui red mini button">';

                        echo '<a href="';
                        echo base_url('/resume/deleteedubyid/'.$row['id']);
                        echo '">删除</a></div></td>';
                        echo "</tr>";
                    }
                }
                ?>
            </tbody>
        </table>
        <div class="ui teal  aedu button">
            <i class="ui add icon"></i>
            添加
        </div>
    </div>


    <div class="ui small aedu modal">
        <i class="close icon"></i>
        <div class="header">添加教育信息</div>
        <div class="content">
            <div class="left">
                <i class="massive tags  icon"></i>
            </div>
            <div class="right">
                <form>
                    <div class="ui form">
                        <div class="inline field">
                            <label>入学时间：</label>
                            <input type="text"  class="form-control" onfocus="HS_setDate(this)"  id="in"></div>

                            <div class="inline field">
                                <label>毕业时间：</label>
                                <input type="text"  class="form-control" onfocus="HS_setDate(this)"  id="out"></div>
                                <div class="inline field">
                                    <label>就读学校：</label>
                                    <input type="text" ></div>
                                    <div class="inline field">
                                        <label>所学专业：</label>
                                        <input type="text" ></div>
                                        <div class="inline field">
                                            <label>学&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;历：</label>
                                            <input type="text" ></div>

                                        </div>

                                    </form>
                                </div>
                            </div>