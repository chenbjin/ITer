<div  class="ui segment">
  <h4>附件：</h4>
  
  <?php echo form_open_multipart('/index.php/resume/updateattach/'.$basicinfo['ResumeID']);?>
  <input type="file" name="userattach" size="20" />
  <input type="submit" name = "subb" value="upload" />
  <h6 class="alert">只能上传word文档或者pdf...</h6>

  <table class="ui basic table segment">
    <thead>
      <tr>
        <th>提交时间</th>
        <th>附件名称</th>
      </tr>
    </thead>
    <tbody>
      <?php
      if($attach_items)
      {         
        foreach($attach_items as $row)
        {
          echo "<tr>";
          echo "<td>";
          echo $row['attachinfo'];
          echo "</td>";
          echo "<td>";
          echo "<a href = ";
          echo "/iter/uploads/userattach/".$row['id']."_".$row['attachtitle'];
          echo ">";
          echo $row['attachtitle'];
          echo "</a>";
          echo "</td>";
          echo ' <td>
         ';
            echo '<a href="';
            echo base_url('/resume/deleteattachbyid/'.$row['id']);
            echo '"><div class="ui red mini button">删除 </div></a></td>';
            echo "</tr>";
            
          }
        }
        
        ?>
        <tr>
          <!--从数据库中查询，填入下面的表格中！很简单-->
          <td id="attachtitle" name="attachtitle"  ></td>
          <td id="attachinfo"  name="attachinfo"   ></td>
        </tr>
      </tbody>
    </table>


  </div>
</div>
</div>
<div class="two wide column"></div>
</div>
</div>

