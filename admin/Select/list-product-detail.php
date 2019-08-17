<!-- The Modal detail project -->
<div class="modal" id="myModalDetail">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Chi Tiết Sản Phẩm</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body" *ngIf="detailList">

            <?php 

                if(isset($_GET['masp']))
                {
                    $masp = $_GET['masp'];
                    echo $masp;
                }

            ?>

            <!-- <?php
                $table = query_select("SELECT * FROM sp, video	WHERE sp.MaSP = video.MaSP AND sp.MaSP = '$masp'");
                $count = $table->rowCount();
                foreach ($table as $row) {

                    echo $row['Maloai'];
            ?> -->

                <h1>{{detailList.name}}</h1>
                <p class="title">Status: {{detailList.status}}</p>
                <p>Modified By: {{detailList.modified_by}}</p>
                <p>Modified At: {{detailList.modified_at | date }}</p>
                <p>Created At: {{detailList.created_at | date }}</p>

            
                <!-- <?php
                }
            ?> -->


                
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>